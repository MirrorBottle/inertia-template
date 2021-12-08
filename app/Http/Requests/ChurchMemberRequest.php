<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChurchMemberRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'address' => 'required',
            'phone_number' => 'required|min:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi!',
            'address.required' => 'Alamat wajib diisi!',
            'phone_number.required' => 'Kontak wajib diisi!',
        ];
    }
}
