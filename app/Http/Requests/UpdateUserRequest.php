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
            'jmbg' => 'required|regex:/[0-9]+/|digits:13',
            'email' => 'sometimes|email',
//            TODO: Ako u formi unesemo korisnikov trenutni mejl, baci error email must be unique, a ako ne stavimo unique pravilo, baci gresku kad drugom korisniku dodijelimo postojeci mejl
            'picture' => 'sometimes'
        ];
    }
}
