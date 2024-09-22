<?php
namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    /**
     * @throws ValidationException
     */
    public function login(Request $request)
    {
         $attributes = request()->validate([
        'email' => ['required', 'email'],
        'password' => ['required']
    ]);
        if (!Auth::guard('admin')->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match.'
            ]);
        }

        request()->session()->regenerate();

        return redirect('/');
        }
        public function register()
        {
            return view('auth.register');
        }
        public function createacount(Request $request)
        {
            $attributes = request()->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
                'name'=> ['required', 'string', 'max:255'],
            ]);
            Admin::create($attributes);
            return redirect('/');
        }
    public function destroy()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
