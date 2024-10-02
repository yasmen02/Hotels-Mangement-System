<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;
use Illuminate\Support\Str;


class RegisteredUserController extends Controller
{
    //
    public function create(){
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone_number' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|string|min:6|same:password',
            ]);

        $user = User::create($validated);
        $user->remember_token=Str::random(30);
        Mail::to($user->email)->queue(
            new RegisterMail($user)
        );

        Auth::login($user);
        return redirect('/login');
    }
    public function showForgetPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function reset(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|string|min:6|same:password',
        ]);

        try {
            $user = User::where('email', $validated['email'])->firstOrFail();
            $user->password = $validated['password'];
            $user->save();

            return redirect()->route('login')->with('status', 'Password has been reset!');
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'An error occurred while resetting your password.']);
        }
    }
}
