<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        $emailRule = 'required|email|unique:users';

        if ($this->student) {
            $emailRule .= ",email,{$this->student->id}";
        }

        if ($this->librarian) {
            $emailRule .= ",email,{$this->librarian->id}";
        }

        if ($this->admin) {
            $emailRule .= ",email,{$this->admin->id}";
        }

        return [
            'name' => 'required|string',
            'jmbg' => 'required|regex:/[0-9]+/|digits:13',
            'email' => $emailRule,
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
            'jmbg.digits' => __('JMBG must have :digits digits.'),
            'email.required' => __('Email is required.'),
            'email.email' => __('Invalid email.'),
            'email.unique' => __('Email must be unique.')
        ];
    }
}
