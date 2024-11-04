<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'      => 'required',
            'email'     => 'required|email:rfc',
            'role'      => 'required',
            'password'  => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'      => 'Harap isi Nama',
            'email.required'     => 'Harap isi Email',
            'role.required'      => 'Harap isi Role',
            'password.required'  => 'Harap isi Password'
        ];
    }
}
