<?php

namespace App\Http\Controllers;


use App\Models\Hotels;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class HotelsController extends Controller
{
    public function index(){
        $hotels= Hotels::all();
        return view('Hotels.index', compact('hotels'));
    }
    public function show($slug)
    {
        $hotel = Hotels::where('slug', $slug)->firstOrFail();
        $rooms = Rooms::where('hotel_id', $hotel->id)->get();
        return view('Hotels.show', compact('hotel', 'rooms'));
    }


    public function create(){
        return view('Hotels.create');
    }
    public function store(Request $request){
        $validate = request()->validate([
            'name' => 'required',
            'address' => 'required',
            'stars' => 'required',
            'hotel_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'contact_number' => 'required',
        ]);
        $validate['hotel_image'] = null;
        if ($request->hasFile('hotel_image')) {
            $file = $request->file('hotel_image');
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('images/hotel_images'), $file_name, 'public');
            $validate['hotel_image'] = $file_name;
        }

        Hotels::create($validate);
        return redirect()->route('hotels.index');
    }
    public function edit(Hotels $hotel){
        return view('Hotels/edit',compact('hotel'));
    }
    public function update(Request $request, Hotels $hotel){

        $validate = request()->validate([
            'name' => 'required',
            'address' => 'required',
            'stars' => 'required',
            'hotel_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'contact_number' => 'required',
        ]);
        if ($request->hasFile('hotel_image')) {
            // New image is uploaded
            $file = $request->file('hotel_image');
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('images/hotel_images'), $file_name);

            // Update the hotel_image in the validate array
            $validate['hotel_image'] = $file_name;
        } else {
            // No new image is uploaded, keep the old image
            $validate['hotel_image'] = $hotel->hotel_image; // Preserve the old image
        }

        $hotel->update($validate);
        return redirect()->route('hotels.index');
    }
    public function destroy($id){
        Hotels::destroy($id);
        return redirect()->route('hotels.index');
    }
}
