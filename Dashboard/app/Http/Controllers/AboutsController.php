<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\About;

use Illuminate\Http\Request;

class AboutsController extends Controller
{
    public function index(){
        $about_details= About::all();
        return view('abouts.index',compact('about_details'));
    }
    public function edit($id){
        $about=About::where('id', $id)->firstOrFail();
        return view('abouts.edit', compact('about'));
    }
    public function update(Request $request, $id){
        $about_details= About::findOrFail($id);
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image1' =>'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'image2'=>'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        $validatedData['image1'] = null;
        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $validatedData['image1'] = $file->store('about_images', 'public');
        }
        $validatedData['image2'] = null;
        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            $validatedData['image2'] = $file->store('about_images', 'public');
        }

        $about_details->update($validatedData);
        return redirect()->route('abouts.index');
    }
}
