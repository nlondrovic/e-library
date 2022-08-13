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
        $emailRule = 'required|unique:users';

        if ($this->student) {
            $emailRule .= ",email,{$this->student->id}";
        }

        if ($this->librarian) {
            $emailRule .= ",email,{$this->librarian->id}";
        }

        return [
            'name' => 'required|string',
            'jmbg' => 'required|regex:/[0-9]+/|digits:13',
            'email' => $emailRule,
            'picture' => 'sometimes'
        ];
    }
}
