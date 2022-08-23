<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'icon' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => __('Name is required.'),
            'icon.required' => __('Icon is required.')
        ];
    }
}
