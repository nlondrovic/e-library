<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCheckoutRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'book_id' => 'required|exists:books,id',
            'checkout_librarian_id' => 'required|exists:users,id',
            'student_id' => 'required|exists:users,id'
        ];
    }
}
