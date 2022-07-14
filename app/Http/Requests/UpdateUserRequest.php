<?php

namespace App\Http\Requests;

use App\Models\User;
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
        return [
            'name' => 'required|string',
            'jmbg' => 'required',
            'email' => 'sometimes|email',
//            TODO: Ako u formi unesemo korisnikov trenutni mejl, baci error email must be unique

//            'email' => 'required,email_address,'.User::where('email', $this->email)->first()->id,
            'picture' => 'sometimes'
        ];
    }
}
