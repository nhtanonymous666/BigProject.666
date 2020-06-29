<?php

namespace App\Traits;
use Illuminate\Support\Facades\Hash;
use App\User;

trait RegisterUser
{
    public function registerUser($fields)
    {
        $user = User::create([
    		'user_first_name' => $fields['user_first_name'],
    		'user_last_name' => $fields['user_last_name'],
            'user_user_name' => $fields['user_user_name'],
            'user_email' => $fields['user_email'],
            'user_password' => Hash::make($fields['password']),
            'user_phone' => $fields['user_phone'],
            'user_nation' => $fields['user_nation'],
            'user_address' => $fields['user_address'],
            'user_date_of_birth' => $fields['user_date_of_birth'],
            'ru_id' => $fields['role_user']
        ]);
        return $user;
    }
}