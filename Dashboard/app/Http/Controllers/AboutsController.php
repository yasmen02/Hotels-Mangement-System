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

        // Handle the image upload if provided
        $validatedData['image']= null;
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('about_images', 'public');
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

        // Handle the image upload if provided
        $validatedData['image']= $about->image; // keep the existing image
        if ($request->hasFile('image')) {
            // Delete the old image if necessary
            if ($about->image) {
                Storage::disk('public')->delete($about->image);
            }
            $validatedData['image'] = $request->file('image')->store('about_images', 'public');
        }

        // Update the About entry
        $about->update($validatedData);

        return redirect()->route('abouts.index');
    }
}
