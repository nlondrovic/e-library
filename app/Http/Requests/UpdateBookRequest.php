<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateBookRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'content' => 'required|min:20',
            'isbn' => 'required|regex:/[0-9]+/|digits:13',
            'author_id' => 'required',
            'picture' => 'sometimes'
        ];
    }
}
