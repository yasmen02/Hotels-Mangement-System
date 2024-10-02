<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hotels;
use App\Models\payments;
use App\Models\Rooms;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BookingController extends Controller
{

    public function availableDays(Request $request, $id)
    {
        $room_id = $id;
        $bookings = Booking::where('room_id', $room_id)->where('status', 'booked')->get();

        $startDate = now();
        $endDate = now()->addMonths(3);

        $bookedDates = [];
        foreach ($bookings as $booking) {
            $dateRange = $this->getDateRange($booking->check_in_date, $booking->check_out_date);
            if (is_array($dateRange)) {
                $bookedDates = array_merge($bookedDates, $dateRange);
            } else {
                error_log("getDateRange did not return an array for booking ID: {$booking->id}");
            }
        }

        // Generate the calendar for the entire year
        $calendar = $this->generateCalendar($startDate, $endDate, $bookedDates);

        return view('booking.availableDays', compact('calendar', 'room_id'));
    }

    private function getDateRange($startDate, $endDate)
    {
        $dates = [];
        $start = \Carbon\Carbon::parse($startDate);
        $end = \Carbon\Carbon::parse($endDate);

        while ($start <= $end) {
            $dates[] = $start->format('Y-m-d');
            $start->addDay();
        }

        return $dates;
    }

    private function generateCalendar($startDate, $endDate, $bookedDates)
    {
        $calendar = [];
        for ($month = $startDate; $month <= $endDate; $month->addMonth()) {
            $monthData = [];
            $daysInMonth = \Carbon\Carbon::parse($month)->daysInMonth;
            //the number of days in the month->daysInMonth

            // Start the month view
            $firstDayOfMonth = \Carbon\Carbon::parse($month)->startOfMonth();
            $lastDayOfMonth = \Carbon\Carbon::parse($month)->endOfMonth();

            // Prepare days with availability status
            for ($day = 1; $day <= $daysInMonth; $day++) {
                $currentDate = $firstDayOfMonth->copy()->setDay($day)->format('Y-m-d');
                //The code checks if the current date is in the $bookedDates array to determine if it’s booked
                $isBooked = in_array($currentDate, $bookedDates);
                $monthData[] = [
                    'date' => $currentDate,
                    'isBooked' => $isBooked,
                ];
            }
            $calendar[] = [
                'month' => $month->format('F Y'),
                'days' => $monthData,
            ];
        }
        return $calendar;
    }

    public function index($slug, $id)
    {
        $hotel = Hotels::where('slug', $slug)->firstOrFail();
        $room = Rooms::where('id', $id)->firstOrFail();
        $user = Auth::user();
        return view('booking.index', compact('hotel', 'room', 'user'));;
    }

    public function store(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'user_id' => 'required|exists:users,id',
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'no_of_adults' => 'required|integer|min:1',
            'no_of_children' => 'required|integer|min:0',
            'email' => 'required|email',
            'phone' => 'required|string',
            'total_price' => 'required|numeric|min:0',
        ]);

        // Check for room availability
        $existingBooking = Booking::where('room_id', $validated['room_id'])
            ->where(function ($query) use ($validated) {
                $query->whereBetween('check_in_date', [$validated['check_in_date'], $validated['check_out_date']])
                    ->orWhereBetween('check_out_date', [$validated['check_in_date'], $validated['check_out_date']]);
            })
            ->exists();

        if ($existingBooking) {
            return back()->with(['error' => 'The selected dates are not available.']);
        }

        // Create the booking
        Booking::create($validated);

        // Optionally, you can redirect to a success page or the cart
        return redirect('carts')->with('success', 'Booking successful!');
    }

    public function cart()
    {
        if (Auth::guest()) {
            return redirect()->route('login');
        }
        $user = Auth::user();
        $cart_items = Booking::with('user')->where('user_id', $user->id)->get();
        return view('Booking/cart', compact('cart_items'));
    }

    public function destroy($id)
    {
        Booking::destroy($id);
        return redirect('carts');
    }

    public function edit($id)
    {
        $room = Rooms::where('id', $id)->firstOrFail();
        $booking_item = Booking::where('id', $id)->firstOrFail();
        return view('Booking/edit', compact('booking_item', 'room'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'user_id' => 'required',
            'check_in_date' => 'required',
            'check_out_date' => 'required',
            'no_of_adults' => 'required',
            'no_of_children' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'total_price' => 'required',
        ]);

        $booking_item = Booking::find($id);
        $booking_item->update($validated);
        return redirect('carts');
    }

    public function payment()
    {
        $user = Auth::user();
        $cart_items = Booking::with('user')->where('user_id', $user->id)->get();
        return view('Booking/payment', compact('cart_items'));
    }

    public function paymentstore(Request $request)
    {
        $validated = $request->validate([
            'booking_id' => 'required|array',
            'booking_id.*' => 'exists:bookings,id',
            'user_id' => 'required|exists:users,id',
            'payment_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string',
            'payment_type' => 'required|string',
            'card_holder' => 'required|string|max:255',
            'exp_month' => 'required|numeric|min:1|max:12',
            'exp_year' => 'required|numeric|min:24',
            'card_number' => 'required|string|max:19',
            'cvc' => 'required|string|size:3',
        ]);

        $validated['transaction_id'] = Str::uuid()->toString(); // Use UUID for transaction ID

        DB::beginTransaction();
        try {
            $bookings = Booking::with('room.hotel')->whereIn('id', $validated['booking_id'])->get();

            if ($bookings->isEmpty()) {
                throw new \Exception('No bookings found.');
            }

            $firstHotelId = $bookings->first()->room->hotel->id;

            // Check if all bookings belong to the same hotel
            foreach ($bookings as $booking) {
                if ($booking->room->hotel->id !== $firstHotelId) {
                    return back()->with(['error' => 'All bookings must be from the same hotel.']);
                }
            }
            foreach ($bookings as $booking) {
//                dd(array_merge($validated, ['booking_id' => $booking->id]));

                $payment = payments::create(array_merge($validated, ['booking_id' => $booking->id]));
//               dd($payment);
                if ($payment) {
                    $hotel = $booking->room->hotel;
                    $hotel->revenue += $validated['amount'];
                    $hotel->save();

                    $booking->status = 'booked';
                    $booking->save();
                }
            }

            DB::commit();
            return redirect('/myprofile')->with('success', 'Payment processed successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Payment processing error: ' . $e->getMessage());
            return back()->with(['error' => 'Failed to process payment.']);
        }
    }
}
