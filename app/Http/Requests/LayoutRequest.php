<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LayoutRequest extends FormRequest
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
            'app_name'       => 'required',
            'short_app_name' => 'required',
            'header'         => 'required',
            'footer'         => 'required',
            'fullscreen'     => 'required',
            'img_login_bg'   => 'max:2048|mimes:jpg,jpeg,png,svg',
            'icon'           => 'max:2048|mimes:jpg,jpeg,png,svg,ico',
            'login_position' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'app_name.required'       => 'Harap isi nama lengkap aplikasi',
            'short_app_name.required' => 'Harap isi nama pendek aplikasi',
            'header.required'         => 'Mohon pilih opsi header',
            'footer.required'         => 'Mohon pilih opsi footer',
            'fullscreen.required'     => 'Mohon pilih opsi fullscreen',
            'img_login_bg.max'        => 'Ukuran gambar tidak boleh melebihi 2mb',
            'img_login_bg.mimes'      => 'Ekstensi file hanya diperbolehkan jpg,jpeg,png',
            'icon.max'                => 'Ukuran gambar tidak boleh melebihi 2mb',
            'icon.mimes'              => 'Ekstensi file hanya diperbolehkan jpg,jpeg,png,svg,ico',
            'login_position.required' => 'Mohon pilih opsi position'
        ];
    }
}
