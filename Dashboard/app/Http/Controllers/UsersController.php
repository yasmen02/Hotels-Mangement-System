<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    //
    public function index(){
       $users= User::all();
        return view('users.index', compact('users'));
    }

    public function create(){
        return view('Users/create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);
        User::create($validatedData);
        return redirect()->route('users.index');
    }
    public function edit(User $user)
    {
        return view('Users/edit',compact('user'));
    }
    public function update(Request $request,User $user){
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);
       $user->update($validatedData);
        return redirect()->route('users.index');
    }
    public function destroy($id){
        User::destroy($id);
        return redirect()->route('users.index');
    }
}
