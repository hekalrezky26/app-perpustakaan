@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
    <p><a href="{{ route('books.index') }}">&larr; Kembali ke daftar</a></p>

    <h1>Tambah Buku Baru</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="judul">Judul Buku</label>
            <input type="text" id="judul" name="judul" value="{{ old('judul') }}">
            @error('judul')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="penulis">Penulis</label>
            <input type="text" id="penulis" name="penulis" value="{{ old('penulis') }}">
            @error('penulis')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="penerbit">Penerbit</label>
            <input type="text" id="penerbit" name="penerbit" value="{{ old('penerbit') }}">
            @error('penerbit')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit</label>
            <input type="number" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit') }}">
            @error('tahun_terbit')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" id="stok" name="stok" value="{{ old('stok') }}">
            @error('stok')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="kategori">Kategori</label>
            <input type="text" id="kategori" name="kategori" value="{{ old('kategori') }}">
            @error('kategori')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn">Simpan Buku</button>
    </form>
@endsection