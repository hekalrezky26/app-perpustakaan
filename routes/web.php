<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;

// Otomatis dialihkan ke halaman buku saat membuka http://127.0.0.1:8000
Route::get('/', function () {
    return redirect()->route('books.index');
});

// Resource routes untuk CRUD Buku, Kategori, dan Anggota
Route::resource('books', BookController::class);
Route::resource('categories', CategoryController::class);
Route::resource('members', MemberController::class);

// Route peminjaman untuk navbar (modul pertemuan berikutnya)
Route::get('/loans', function () {
    return "Halaman Peminjaman (Akan dibuat di pertemuan berikutnya)";
})->name('loans.index');