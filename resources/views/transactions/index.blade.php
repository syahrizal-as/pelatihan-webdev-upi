@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <h1>Daftar Transaksi</h1>

        <!-- Filter berdasarkan User -->
        <div class="card mb-3">
            <div class="card-body py-2">
                <form method="GET" action="{{ route('transactions.index') }}" class="form-inline">
                    <label class="mr-2 font-weight-bold">Filter User:</label>
                    <select name="user_id" class="form-control form-control-sm mr-2" onchange="this.form.submit()">
                        <option value="">-- Semua User --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $selectedUserId == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                    @if ($selectedUserId)
                        <a href="{{ route('transactions.index') }}" class="btn btn-secondary btn-sm">Reset Filter</a>
                    @endif
                </form>
            </div>
        </div>

        <a href="{{ route('transactions.create', $selectedUserId ? ['user_id' => $selectedUserId] : []) }}"
            class="btn btn-primary mb-2">Tambah Transaksi</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Buku</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                    <th>Status</th>
                    <th>Catatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->user?->name ?? '-' }}</td>
                        <td>{{ $transaction->book?->title ?? '-' }}</td>
                        <td>{{ $transaction->borrow_date?->format('d-m-Y') }}</td>
                        <td>{{ $transaction->return_date ? $transaction->return_date->format('d-m-Y') : '-' }}</td>
                        <td>
                            @if ($transaction->status === 'dipinjam')
                                <span class="badge badge-warning text-dark">Dipinjam</span>
                            @elseif($transaction->status === 'dikembalikan')
                                <span class="badge badge-success">Dikembalikan</span>
                            @elseif($transaction->status === 'terlambat')
                                <span class="badge badge-danger">Terlambat</span>
                            @else
                                <span class="badge badge-secondary">{{ $transaction->status }}</span>
                            @endif
                        </td>
                        <td>{{ $transaction->notes ?? '-' }}</td>
                        <td>
                            <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('transactions.destroy', $transaction) }}" method="POST"
                                style="display:inline;">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Yakin hapus transaksi ini?')"
                                    class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data transaksi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $transactions->links() }}
    </div>
@endsection
