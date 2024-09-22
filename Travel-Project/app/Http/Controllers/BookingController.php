<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hotels;
use App\Models\payments;
use App\Models\Rooms;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index($slug, $id)
    {
        $hotel = Hotels::where('slug', $slug)->firstOrFail();
        $room = Rooms::where('id', $id)->firstOrFail();
        $user = Auth::user();
        return view('booking.index', compact('hotel', 'room', 'user'));;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'user_id' => 'required|exists:users,id',
            'check_in_date' => 'required',
            'check_out_date' => 'required',
            'no_of_adults' => 'required',
            'no_of_children' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'total_price' => 'required',
        ]);
        Booking::create($validated);
        return redirect('carts');
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
            'user_id' => 'required|exists:users,id',
            'booking_id' => 'required|array',
            'booking_id.*' => 'exists:bookings,id',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
        ]);

        DB::beginTransaction();

        try {
            foreach ($validated['booking_id'] as $bookingId) {
                // Store the payment details for each booking
                $payment = Payments::create([
                    'user_id' => $validated['user_id'],
                    'booking_id' => $bookingId,
                    'amount' => $validated['amount'],
                    'payment_date' => $validated['payment_date'],
                ]);

                $booking = Booking::find($bookingId);
                if ($booking) {
                    $hotel = $booking->room->hotel; // Assuming there's a hotel relationship
                    $hotel->revenue += $validated['amount'];
                    $hotel->save();
                }

                // Optionally, you can delete the booking here if needed
                // $booking->delete();
            }

            DB::commit();
            return redirect('carts');
        } catch (\Exception $e) {
            DB::rollBack();
            // Handle the error (log it, return a response, etc.)
            return back()->withErrors(['error' => 'Failed to process payment.']);
        }
    }
}
