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
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'description' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul buku harus diisi.',
            'title.min' => 'Judul buku minimal 3 karakter.',
            'title.max' => 'Judul buku maksimal 255 karakter.',
            'author.required' => 'Penulis harus diisi.',
            'publisher.required' => 'Penerbit harus diisi.',
            'year.required' => 'Tahun terbit harus diisi.',
            'year.integer' => 'Tahun terbit harus berupa angka.',
            'year.min' => 'Tahun terbit tidak valid.',
            'year.max' => 'Tahun terbit tidak valid.',
        ];
    }
}
