<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Hotels;
use Illuminate\Http\Request;
use App\Models\Rooms;
use App\Models\Users;
use Illuminate\Support\Facades\Storage;

class RoomsController extends Controller
{
    //
    public function show($slug) {
        $hotel = Hotels::where('slug', $slug)->firstOrFail();
        $rooms = Rooms::where('hotel_id', $hotel->id)->get();

       return view('Rooms/show', compact('hotel', 'rooms'));
    }
    public function create($slug){
        $hotel = Hotels::where('slug', $slug)->firstOrFail();
        return view('Rooms/create', compact('hotel'));
    }
    public function store(Request $request){
//        dd($request->all());

        $validated = $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'room_number' => 'required|numeric',
            'room_description' => 'required|string|max:255',
            'room_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'room_price' => 'required|numeric|regex:/^\d*(\.\d{1,2})?$/',
            'room_type' => 'required|string',
            'room_status' => 'required|string',
        ]);
        $validated['room_image'] = null;
        if ($request->hasFile('room_image')) {
            $file = $request->file('room_image');
            $validated['room_image']= $file->store('room_images', 'public');
        }
        Rooms::create($validated);
        $hotel = Hotels::find($validated['hotel_id']);
        $slug = $hotel->slug;

        return redirect()->route('rooms.show', ['slug' => $slug]);
    }
    public function edit($id) {
        $room=Rooms::where('id', $id)->firstOrFail();
        return view('Rooms/edit', compact('room'));
    }
    public function update(Request $request, $id) {
        $room= Rooms::findOrFail($id);
        $validatedData = $request->validate([
            'room_type' => 'required',
            'room_price' => 'required',
            'room_description' => 'required',
            'room_image' => 'required',
            'room_status' => 'required',
        ]);
        $validatedData['room_image'] = null;
        if ($request->hasFile('room_image')) {
            if ($room->room_image) {
                Storage::delete('public/room_images/' . $room->room_image);
            }else {
                $file = $request->file('room_image');
                $validatedData['room_image'] = $file->store('room_images', 'public');
            } }
        $room->update($validatedData);
        $hotel = Hotels::findOrFail($room->hotel_id);
        $slug = $hotel->slug;

        // Redirect to the show method with the hotel slug
        return redirect()->route('rooms.show', ['slug' => $slug]);
    }
    public function destroy($id){
        $room= Rooms::findOrFail($id);
        Rooms::destroy($id);
        $hotel = Hotels::findOrFail($room->hotel_id);
        $slug = $hotel->slug;

        // Redirect to the show method with the hotel slug
        return redirect()->route('rooms.show', ['slug' => $slug]);

    }
}
