<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateBindingRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Name of the binding must be specified.')
        ];
    }
}
