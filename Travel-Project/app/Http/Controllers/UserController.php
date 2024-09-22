<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Users\User;


class UserController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }
}
