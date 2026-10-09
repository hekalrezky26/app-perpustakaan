@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
    <p><a href="{{ route('books.index') }}">&larr; Kembali ke daftar</a></p>

    <h1>Edit Buku</h1>

    <form action="{{ route('books.update', $book['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="judul">Judul Buku</label>
            <input type="text" id="judul" name="judul" value="{{ old('judul', $book['judul']) }}">
            @error('judul')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="penulis">Penulis</label>
            <input type="text" id="penulis" name="penulis" value="{{ old('penulis', $book['penulis']) }}">
            @error('penulis')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="penerbit">Penerbit</label>
            <input type="text" id="penerbit" name="penerbit" value="{{ old('penerbit', $book['penerbit']) }}">
            @error('penerbit')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit</label>
            <input type="number" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit', $book['tahun_terbit']) }}">
            @error('tahun_terbit')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" id="isbn" name="isbn" value="{{ old('isbn', $book['isbn']) }}">
            @error('isbn')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" id="stok" name="stok" value="{{ old('stok', $book['stok']) }}">
            @error('stok')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="category_id">Kategori</label>
            <select id="category_id" name="category_id">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id', $book['category_id']) == $cat->id ? 'selected' : '' }}>
                        {{ $cat->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn">Perbarui Buku</button>
    </form>
@endsection