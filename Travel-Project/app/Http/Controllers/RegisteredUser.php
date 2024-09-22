<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredUser extends Controller
{
    //
    public function create(){
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255',
            'password'=>'required|string|min:8',
            'confirm_password'=>'required|string|min:8|same:password',
            'email_verified_at'=>'required|date'
        ]);

        $user = User::create($validated);

        Auth::login($user);
        return redirect('/login');
    }
    public function showForgetPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function forgetPassword(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email|exists:users,email',
        ]);
//        dd($validated);
        // Send the password reset link
        $response = Password::sendResetLink($validated);

        return $response == Password::RESET_LINK_SENT
            ? back()->with('status', trans($response))
            : back()->withErrors(['email' => trans($response)]);
    }
    public function showResetForm($token)
    {
        return view('auth.passwords.reset', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required|string|min:8|confirmed',
            'token' => 'required|string',
        ]);

        // Reset the password using the token
        $response = Password::reset($validated, function ($user, $password) {
            $user->password = bcrypt($password);
            $user->save();
        });

        return $response == Password::PASSWORD_RESET
            ? redirect('/login')->with('status', trans($response))
            : back()->withErrors(['email' => trans($response)]);
    }
}
