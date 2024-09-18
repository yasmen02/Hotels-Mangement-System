<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    //
    public function index(){
        $contact_details= Contact::all();
        return view('contacts.index',compact('contact_details'));
    }
    public function edit($id){
        $contacts= Contact::where('id', $id)->firstOrFail();
        return view('contacts.edit', compact('contacts'));
    }
    public function update(Request $request, $id){
        $contact_details= Contact::findOrFail($id);
        $validatedData = $request->validate([
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'website' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
//        $validatedData['image'] = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image'); // Ensure this matches the name of the file input
            $validatedData['image'] = $file->store('contact_images', 'public');
        }
        $contact_details->update($validatedData);
        return redirect()->route('contacts.index');
    }
}
