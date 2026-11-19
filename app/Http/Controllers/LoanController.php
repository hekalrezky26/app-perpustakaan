<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['member', 'user', 'books'])->latest()->get();

        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        $members = Member::all();
        $books = Book::all();

        return view('loans.create', compact('members', 'books'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|integer|exists:members,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'book_ids' => 'required|array|min:1',
            'book_ids.*' => 'integer|exists:books,id',
        ]);

        $loan = Loan::create([
            'member_id' => $validated['member_id'],
            'user_id' => Auth::id(),
            'tanggal_pinjam' => $validated['tanggal_pinjam'],
            'tanggal_kembali' => $validated['tanggal_kembali'],
        ]);

        $loan->books()->attach($validated['book_ids']);

        return redirect()->route('loans.index')
            ->with('success', 'Data peminjaman berhasil ditambahkan.');
    }

    public function show(Loan $loan)
    {
        $loan->load(['member', 'user', 'books']);

        return view('loans.show', compact('loan'));
    }

    public function edit(Loan $loan)
    {
        $members = Member::all();
        $books = Book::all();

        return view('loans.edit', compact('loan', 'members', 'books'));
    }

    public function update(Request $request, Loan $loan)
    {
        $validated = $request->validate([
            'member_id' => 'required|integer|exists:members,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'book_ids' => 'required|array|min:1',
            'book_ids.*' => 'integer|exists:books,id',
        ]);

        $loan->update([
            'member_id' => $validated['member_id'],
            'tanggal_pinjam' => $validated['tanggal_pinjam'],
            'tanggal_kembali' => $validated['tanggal_kembali'],
        ]);

        $loan->books()->sync($validated['book_ids']);

        return redirect()->route('loans.index')
            ->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    public function destroy(Loan $loan)
    {
        $loan->books()->detach();
        $loan->delete();

        return redirect()->route('loans.index')
            ->with('success', 'Data peminjaman berhasil dihapus.');
    }

    public function kembalikan($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->update([
            'tanggal_dikembalikan' => now(),
        ]);

        return redirect()->route('loans.index')
            ->with('success', 'Buku berhasil dikembalikan.');
    }
}