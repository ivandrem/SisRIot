<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /* Determine if the user is authorized to make this request. @return bool */
    public function authorize()
    {
        return (bool) auth()->user()->enabled;
    }

    /* Get the validation rules that apply to the request. @return array */
    public function rules()
    {
        return [
            'dni' => 'required|string|max:10|unique:users,dni',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'max:15'
        ];
    }
}
