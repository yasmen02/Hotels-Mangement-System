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
            $validate['hotel_image'] = $file->store('hotel_images', 'public');
        }

        Hotels::create($validate);
        return redirect()->route('hotels.index');
    }
    public function edit($id){
        $hotel=Hotels::where('id', $id)->firstOrFail();
        return view('Hotels/edit',compact('hotel'));
    }
    public function update(Request $request, $id){
        $hotel = Hotels::findOrFail($id);

        $validate = request()->validate([
            'name' => 'required',
            'address' => 'required',
            'stars' => 'required',
            'hotel_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'contact_number' => 'required',
        ]);
        if ($request->hasFile('hotel_image')) {
            if ($hotel->hotel_image) {
                Storage::delete('public/hotel_images/' . $hotel->hotel_image);
            }
            $validate['hotel_image'] = $request->file('hotel_image')->store('hotel_images', 'public');
        } else {
            $validate['hotel_image'] = $hotel->hotel_image; // Retain the existing image
        }

        $hotel->update($validate);
        return redirect()->route('hotels.index');
    }
    public function destroy($id){
        Hotels::destroy($id);
        return redirect()->route('hotels.index');
    }
}
