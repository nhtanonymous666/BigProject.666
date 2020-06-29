<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Traits\RegisterUser;
use Mail;
use App\Mail\VerifyMail;

class RegisterController extends Controller
{
    use RegisterUser;

    protected $RegistrationRequest;

    public function __construct()
    {
        
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(RegistrationRequest $requestFields)
    {
        $user = $this->registerUser($requestFields);
        return redirect()->back()->with('register-success', 'Đăng ký thành công');
    }
}
