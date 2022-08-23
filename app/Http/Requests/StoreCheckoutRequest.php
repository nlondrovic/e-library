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

    public function messages()
    {
        return [
            'book_id.required' => __('Book is required.'),
            'book_id.exists' => __('Select an existing book.'),
            'checkout_librarian_id.required' => __('Checkout librarian is required.'),
            'checkout_librarian_id.exists' => __('This checkout librarian does not exits.'),
            'student_id.required' => __('Student is required.'),
            'student_id.exists' => __('Select an existing students.')
        ];
    }
}
