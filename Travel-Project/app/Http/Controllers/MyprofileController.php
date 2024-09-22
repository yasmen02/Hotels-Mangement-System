<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\payments;
use Illuminate\Support\Facades\Auth;

class MyprofileController extends Controller
{
    //
    public function index(){
        $transactions=payments::where('user_id',Auth::user()->id)->get();
        return view('Myprofile/index',compact('transactions'));
    }
    public function edit(){
        return view('Myprofile/edit');
    }
    public function update(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
            'phone_number' => 'required',
            'password' => 'nullable|min:8',
            'confirm_password' => 'nullable|min:8|same:password',
        ]);
        $user = User::findOrFail(auth()->id());
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone_number = $validated['phone_number'];
        $user->save();
        // Redirect with a success message
        return redirect()->route('myprofile.index', auth()->id());
    }
}
