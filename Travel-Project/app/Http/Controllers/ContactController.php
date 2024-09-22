<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function store(Request $request)
    {
//        dd($request->all());

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ]);
        if (auth()->check()) {
            $validatedData['user_id'] = auth()->user()->id;
        }else{
            return redirect('/login');
        }
        Contact::create($validatedData);
        return redirect('contact')->with('success', 'Thanks for contacting us!');
}
}
