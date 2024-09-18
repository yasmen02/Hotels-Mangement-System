<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hotels;
use App\Models\Rooms;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index($slug,$id)
    {
        $hotel = Hotels::where('slug', $slug)->firstOrFail();
        $room=Rooms::where('id', $id)->firstOrFail();
        $defaultUserId = 1;
        $user = $defaultUserId;
        return view('Booking/index', compact('hotel', 'room','user'));  ;
    }
    public function store(Request $request){
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'user_id' => 'required|exists:users,id',
            'check_in_date' => 'required',
            'check_out_date' => 'required',
            'no_of_adults'=>'required',
            'no_of_children'=>'required',
            'email' => 'required',
            'phone' => 'required',
            'total_price'=>'required',
        ]);
        Booking::create($validated);
        return redirect('carts/{user}');
    }
    public function cart(){
        $user_id=1;
      $cart_items= Booking::with('user')->where('user_id',$user_id)->get();

        return view('Booking/cart', compact('cart_items'));
    }
    public  function destroy($id){
        Booking::destroy($id);
        return redirect('carts');
    }
    public function edit($id){
        $room=Rooms::where('id', $id)->firstOrFail();
       $booking_item=Booking::where('id', $id)->firstOrFail();
        return view('Booking/edit', compact('booking_item','room'));
    }
    public function update(Request $request, $id){

        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'user_id' => 'required',
            'check_in_date' => 'required',
            'check_out_date' => 'required',
            'no_of_adults'=>'required',
            'no_of_children'=>'required',
            'email' => 'required',
            'phone' => 'required',
            'total_price'=>'required',
        ]);
        $validated['user_id'] = 1;
        $booking_item= Booking::find($id);
        $booking_item->update($validated);
        return redirect('cart');
    }
    public function payment($id){
        return view('Payment/index');
    }
}
