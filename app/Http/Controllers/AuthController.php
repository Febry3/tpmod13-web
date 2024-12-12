<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public static function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (!Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ]));

        return redirect('/');
    }
    public static function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required'
        ]);

        User::create([
            'username' => $request->username,
            'password' => $request->password,
        ]);

        // Auth::attempt([
        //     'username' => $request->username,
        //     'password' => $request->password,
        // ]);
        return redirect('/login');
    }
    public static function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
