<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChurchRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'latitude' => 'required',
            'longitude' => 'required',
            'contact' => 'required',
            'address' => 'required|min:4',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi!',
            'latitude.required' => 'Latitude wajib diisi!',
            'longitude.required' => 'Longitude wajib diisi!',
            'contact.required' => 'Kontak wajib diisi!',
            'address.required' => 'Alamat wajib diisi',
        ];
    }
}
