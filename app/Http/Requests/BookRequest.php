<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // only admin have access
        return auth()->user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'cover'         => 'image|file|max:1024',
            'judul'         => 'required|max:255',
            'penulis'       => 'required',
            'deskripsi'     => 'required|max:1000',
            'halaman'       => 'required|min:0|max:5000',
            'tipe'          => 'required',
            'penerbit'      => 'required',
            // 'file_pdf'      => 'mimes:pdf|max:10240',
            'category_id'   => 'required',
            'populer'       => 'required',
            'rekomendasi'   => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'required'          => 'Kolom wajib diisi!',
            'slug.unique'       => 'Permalink telah digunakan, bersifat unik. Tambahkan karakter lagi di akhir!',
            // 'cover.max'         => 'Upload gambar sampul maksimal 1mb.',
            // 'cover.image'       => 'File harus berformat gambar!',
            // 'file_pdf.mimes'    => 'File harus berformat pdf!',
            // 'file_pdf.max'      => 'Upload file pdf maksimal 10mb.'
        ];
    }
}
