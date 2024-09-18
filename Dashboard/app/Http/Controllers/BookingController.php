<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Hotels;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function index(){
       $bookings= Booking::with('users','rooms')->get();
        return view('Booking.index',compact('bookings'));
    }
    public function edit($id){
        $booking=Booking::where('id', $id)->firstOrFail();
        return view('Booking/edit',compact('booking'));
    }
    public function update(Request $request,$id){
        $booking = Booking::findOrFail($id);
        $validated = $request->validate([
            'status' => 'required',
        ]);
        $booking->update($validated);
        return redirect()->route('booking.index');
    }
    public function destroy($id){
        Booking::destroy($id);
        return redirect()->route('booking.index');
    }
}
