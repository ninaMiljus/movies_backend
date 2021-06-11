<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email:rfc|unique:users',
            'password' => 'required|confirmed|min:6'
        ];
    }
    public function messages()
    {
        return  [ 'name.required' => 'Unesite ime',
        'email.required' => 'Unesite email','password.required' => 'Unesite password', 'email.unique' => 'Korisnik sa unetim emailom vec postoji'];
    }
}
