<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_first_name' => ['required'],
            'user_last_name' => ['required'],
            'user_user_name' => ['required', 'unique:tb_users,user_user_name'],
            'user_email' => ['required', 'email', 'unique:tb_users,user_email'],
            'password' => ['required', 'confirmed', 'min:6', 'max:26'],
            'user_phone' => ['required', 'min:6', 'max:20'],
            'user_nation' => ['required'],
            'user_address' => ['required'],
            'user_date_of_birth' => ['required', 'date'],
            'role_user' => ['required'],
        ]; 
    }
}
