<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreReservationRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'book_id' => 'required|exists:books,id',
            'student_id' => 'required|exists:users,id',
            'start_time' => 'required|date|after:today'
        ];
    }

    public function messages()
    {
        return [
            'book_id.required' => __('Book is required.'),
            'book_id.exists' => __('Select an existing book.'),
            'student_id.required' => __('Student is required.'),
            'student_id.exists' => __('Select an existing students.'),
            'start_time.required' => __('Reserve date is required.'),
            'start_time.date' => __('Reserve date must be a date.'),
            'start_time.after' => __('Reserve date must be after today.')
        ];
    }
}
