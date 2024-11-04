<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Auth extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'     => 'required|email:rfc',
            'password'  => 'required',
            'captcha'   => 'required|captcha'
        ];
    }

    public function messages()
    {
        return [
            'email.required'    => 'Mohon masukkan email',
            'email.email'       => 'Domain email yang anda masukkan tidak valid',
            'password.required' => 'Mohon masukkan password',
            'captcha.required'  => 'Mohon isi captcha',
            'captcha.captcha'   => 'Captcha Salah'
        ];
    }
}
