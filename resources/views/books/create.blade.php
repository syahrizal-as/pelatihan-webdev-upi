@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <h1>Tambah Buku</h1>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Judul Buku</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label>Penulis</label>
                <input type="text" name="author" class="form-control" value="{{ old('author') }}">
                @error('author')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label>Penerbit</label>
                <input type="text" name="publisher" class="form-control" value="{{ old('publisher') }}">
                @error('publisher')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label>Tahun Terbit</label>
                <input type="number" name="year" class="form-control" value="{{ old('year') }}">
                @error('year')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label>Deskripsi (Opsional)</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
