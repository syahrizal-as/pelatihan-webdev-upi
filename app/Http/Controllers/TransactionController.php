<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Book;
use App\Http\Requests\TransactionRequest;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaction::with(['user', 'book']);

        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        $transactions = $query->latest()->paginate(10)->withQueryString();
        $users = User::orderBy('name')->get();
        $selectedUserId = $request->user_id;

        return view('transactions.index', compact('transactions', 'users', 'selectedUserId'));
    }

    public function create(Request $request)
    {
        $users = User::orderBy('name')->get();
        $books = Book::orderBy('title')->get();
        $selectedUserId = $request->query('user_id');

        return view('transactions.create', compact('users', 'books', 'selectedUserId'));
    }

    public function store(TransactionRequest $request)
    {
        Transaction::create($request->validated());
        return to_route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function edit(Transaction $transaction)
    {
        $users = User::orderBy('name')->get();
        $books = Book::orderBy('title')->get();

        return view('transactions.edit', compact('transaction', 'users', 'books'));
    }

    public function update(TransactionRequest $request, Transaction $transaction)
    {
        $transaction->update($request->validated());
        return to_route('transactions.index')->with('success', 'Transaksi berhasil diupdate!');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return to_route('transactions.index')->with('success', 'Transaksi berhasil dihapus!');
    }
}
