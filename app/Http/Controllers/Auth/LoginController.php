<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{

    protected $LoginRequest;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $requestFields)
    {
        $attributes = $requestFields->only(['user_user_name', 'password']);
        if (Auth::attempt($attributes)) {
            return redirect()->route('home');
        }
        else
        {
            return redirect()->back()->with('login-false', 'Đăng nhập thất bại');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
