@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <h1>Update Transaksi</h1>
        <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Pilih User</label>
                <select name="user_id" class="form-control">
                    <option value="">-- Pilih User --</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}"
                            {{ old('user_id', $transaction->user_id) == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Pilih Buku</label>
                <select name="book_id" class="form-control">
                    <option value="">-- Pilih Buku --</option>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}"
                            {{ old('book_id', $transaction->book_id) == $book->id ? 'selected' : '' }}>
                            {{ $book->title }} ({{ $book->author }})
                        </option>
                    @endforeach
                </select>
                @error('book_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Tanggal Pinjam</label>
                <input type="date" name="borrow_date" class="form-control"
                    value="{{ old('borrow_date', $transaction->borrow_date?->format('Y-m-d')) }}">
                @error('borrow_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Tanggal Kembali (Opsional)</label>
                <input type="date" name="return_date" class="form-control"
                    value="{{ old('return_date', $transaction->return_date?->format('Y-m-d')) }}">
                @error('return_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Status Transaksi</label>
                <select name="status" class="form-control">
                    <option value="dipinjam"
                        {{ old('status', $transaction->status) == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    <option value="dikembalikan"
                        {{ old('status', $transaction->status) == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan
                    </option>
                    <option value="terlambat"
                        {{ old('status', $transaction->status) == 'terlambat' ? 'selected' : '' }}>Terlambat</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Catatan (Opsional)</label>
                <textarea name="notes" class="form-control" rows="3">{{ old('notes', $transaction->notes) }}</textarea>
                @error('notes')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
