<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use App\Models\Rooms;
use Illuminate\Http\Request;

class BannersController extends Controller
{
    public function index(){
       $banners= Banners::all();
        return view('banners.index',compact('banners'));
    }
    public function create(){
        $rooms=Rooms::with('hotel')->get();
//        dd($rooms);
        return view('banners.create',compact('rooms'));
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'discount'=>'required',
        ]);
        Banners::create($validatedData);
        return redirect()->route('banners.index');
    }
    public function edit($id){
        $banner=Banners::where('id', $id)->firstOrFail();
        $rooms=Rooms::with('hotel')->get();
        return view('banners.edit', compact('banner','rooms'));
    }
    public function update(Request $request,$id){
        $banner = Banners::findOrFail($id);
        $validatedData = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'discount'=>'required',
        ]);

        $banner->update($validatedData);
        return redirect()->route('banners.index');
    }
    public function destroy($id){
        Banners::destroy($id);
        return redirect()->route('banners.index');
    }
}
