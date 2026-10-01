@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
    <p><a href="{{ route('categories.index') }}">&larr; Kembali ke daftar</a></p>

    <h1>Tambah Kategori Baru</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama_kategori">Nama Kategori</label>
            <input type="text" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}">
            @error('nama_kategori')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn">Simpan Kategori</button>
    </form>
@endsection