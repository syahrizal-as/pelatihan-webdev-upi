<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:borrow_date',
            'status' => 'required|string|in:dipinjam,dikembalikan,terlambat',
            'notes' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'User harus dipilih.',
            'user_id.exists' => 'User yang dipilih tidak valid.',
            'book_id.required' => 'Buku harus dipilih.',
            'book_id.exists' => 'Buku yang dipilih tidak valid.',
            'borrow_date.required' => 'Tanggal pinjam harus diisi.',
            'borrow_date.date' => 'Format tanggal pinjam tidak valid.',
            'return_date.date' => 'Format tanggal kembali tidak valid.',
            'return_date.after_or_equal' => 'Tanggal kembali harus sama dengan atau setelah tanggal pinjam.',
            'status.required' => 'Status transaksi harus dipilih.',
            'status.in' => 'Status transaksi tidak valid.',
        ];
    }
}
