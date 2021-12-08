<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'category_id' => 'required',
            // 'user_id' => 'required',
            'title' => 'required|min:3',
            'slug' => 'required',
            // 'image' => 'required',
            'publish_date' => 'required',
            'published' => 'required',
            'content' => 'required|min:10',
            'excerpt' => 'required|max:160'
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Kategori wajib dipilih!',
            // 'user_id.required' => 'Pengarang wajib dipilih!',
            'title.required' => 'Judul wajib diisi!',
            'title.min' => 'Judul minimal 3 karakter!',
            'slug.required' => 'Slug wajib diisi!',
            // 'image.required' => 'Gambar wajib diisi!',
            'publish_date.required' => 'Tanggal publikasi wajib diisi!',
            'published.required' => 'Status publikasi wahib diisi!',
            'content.required' => 'Kontent wajib diisi!',
            'content.min' => 'Kontent minimal 10 karakter!',
            'excerpt.required' => 'Kutipan wajib diisi!',
            'excerpt.min' => 'Kutipan max 160 karakter!',
        ];
    }
}
