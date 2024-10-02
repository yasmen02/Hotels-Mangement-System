<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AboutsController extends Controller
{
    public function index(){
        $about_details= About::all();
        return view('abouts.index',compact('about_details'));
    }

    public function create(){
        return view('abouts.create');
    }
    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'website' => 'nullable|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);


        $validatedData['image'] = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('images/about_images'), $file_name, 'public');
            $validatedData['image'] = $file_name;
        }
        About::create($validatedData);

        return redirect()->route('abouts.index')->with('success', 'About entry created successfully.');
    }

    public function edit($id){
        $about=About::where('id', $id)->firstOrFail();
        return view('abouts.edit', compact('about'));
    }
    public function update(Request $request, $id)
    {
        // Find the About entry
        $about = About::findOrFail($id);

        // Validate incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'website' => 'nullable|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // New image is uploaded
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('images/about_images'), $file_name);

            // Update the hotel_image in the validate array
            $validatedData['image'] = $file_name;
        } else {
            // No new image is uploaded, keep the old image
            $validatedData['image'] = $about->image; // Preserve the old image
        }

        // Update the About entry
        $about->update($validatedData);

        return redirect()->route('abouts.index');
    }
}
