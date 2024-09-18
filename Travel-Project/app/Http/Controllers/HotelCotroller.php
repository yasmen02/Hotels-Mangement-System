<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotels;
use App\Models\Rooms;

class hotelCotroller extends Controller
{
    //

    public function index(){
        $hotels = Hotels::with('rooms')->get();
        return view('Hotels.index', compact('hotels'));
    }
    public function show($slug){
        $hotel = Hotels::where('slug', $slug)->firstOrFail();
        $rooms = Rooms::where('hotel_id', $hotel->id)->get();
        return view('Hotels.show', compact('hotel','rooms'));
    }
}
