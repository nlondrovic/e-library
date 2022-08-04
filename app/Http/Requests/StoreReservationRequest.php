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
            'start_time' => 'required|after:today',
        ];
    }
}
