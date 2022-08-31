<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateAuthorRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'about' => 'required|min:10',
            'picture' => 'sometimes'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('An author must have a name.'),
            'about.required' => __('Write something about this author.'),
            'about.min' => __('About must be at least :min characters.')
        ];
    }
}
