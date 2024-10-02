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

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }

    public function resetPassword()
    {
        return view('auth.forgot-password');
    }

    public function profile(Request $request)
    {
        $admins = Admin::all();
        return view('auth.profile', compact('admins'));
    }

    public function createAdmin()
    {
        return view('admin.create');
    }

    public function addAdmin(Request $request)
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'name' => ['required', 'string', 'max:255'],
        ]);
        Admin::create($attributes);
        return redirect('/');
    }

    public function editAdmin($id)
    {
        $admin = Admin::where('id', $id)->first();
        return view('admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
//        dd($request->all());
        $admin = Admin::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admins,email,' . $id,
            'password' => 'nullable|string|min:8',
            'role' => 'required|in:admin,superadmin',
            'status' => 'required|in:active,inactive',
        ]);
        $admin->update($validatedData);
        return redirect()->route('profile')->with('success', 'Admin updated successfully!');
    }

    public function deleteAdmin($id)
    {
        Admin::destroy($id);
        return redirect()->route('profile');
    }
}
