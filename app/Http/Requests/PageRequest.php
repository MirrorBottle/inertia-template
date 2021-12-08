<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'title' => 'required|min:3',
            'slug' => 'required',
            'caption' => 'max:100',
            'published' => 'required',
            'content' => 'required|min:10',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Judul wajib diisi!',
            'title.min' => 'Judul minimal 3 karakter!',
            'slug.required' => 'Slug wajib diisi!',
            'caption.max' => 'Caption terlalu panjang!',
            'published.required' => 'Status publikasi wahib diisi!',
            'content.required' => 'Kontent wajib diisi!',
            'content.min' => 'Kontent minimal 10 karakter!',
        ];
    }
}
