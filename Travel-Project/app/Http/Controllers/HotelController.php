<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Hotels;
use App\Models\Rooms;

class HotelController extends Controller
{
    //

    public function index(){
        $hotels = Hotels::with('rooms')->get();
        return view('Hotels.index', compact('hotels'));
    }
    public function show($slug){
        if (Auth::guest()) {
            return redirect()->route('login');
        }
        $hotel = Hotels::where('slug', $slug)->firstOrFail();
        $rooms = Rooms::where('hotel_id', $hotel->id)->get();
        return view('Hotels.show', compact('hotel','rooms'));
    }
}
