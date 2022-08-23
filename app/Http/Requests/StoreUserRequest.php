<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'jmbg' => 'required|regex:/[0-9]+/|digits:13',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required_with:password|same:password',
            'picture' => 'sometimes'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Name is required.'),
            'name.string' => __('Name must be a string.'),
            'jmbg.required' => __('JMBG is required.'),
            'jmbg.regex' => __('JMBG format is invalid.'),
            'jmbg.digits' => __('JMBG must have 13 digits.'),
            'email.required' => __('Email is required.'),
            'email.email' => __('Invalid email.'),
            'email.unique' => __('Email must be unique.'),
            'password.required' => __('Password is required.'),
            'password.min' => __('Password must be at least 8 characters.'),
            'confirm_password.required_with' => __('Confirm password is required.'),
            'confirm_password.same' => __('Passwords do not match.')
        ];
    }
}
