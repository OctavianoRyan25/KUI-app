<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthAdmin extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            Alert::toast('Welcome Back Admin', 'success');
            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect()->route('admin.loginForm')->with('error', 'Invalid Credentials');
        Alert::toast('Invalid Credentials', 'error');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'You have been logged out');
    }
}
