@extends('layouts.app')

@section('content')
    <h2>Tambah Peminjaman Baru</h2>

    <p><em>Petugas pencatat: {{ auth()->user()->name }} (otomatis dari akun yang login).</em></p>

    <form action="{{ route('loans.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 12px;">
            <label for="member_id" style="display: block; font-weight: bold;">Anggota Peminjam</label>
            <select name="member_id" id="member_id" style="width: 100%; max-width: 400px; padding: 8px; margin-top: 4px;">
                <option value="">-- Pilih Anggota --</option>
                @foreach ($members as $member)
                    <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                        {{ $member->nama ?? $member->name }}
                    </option>
                @endforeach
            </select>
            @error('member_id')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 12px;">
            <label for="tanggal_pinjam" style="display: block; font-weight: bold;">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" value="{{ old('tanggal_pinjam', date('Y-m-d')) }}" style="width: 100%; max-width: 400px; padding: 8px; margin-top: 4px;">
            @error('tanggal_pinjam')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 12px;">
            <label for="tanggal_kembali" style="display: block; font-weight: bold;">Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" id="tanggal_kembali" value="{{ old('tanggal_kembali') }}" style="width: 100%; max-width: 400px; padding: 8px; margin-top: 4px;">
            @error('tanggal_kembali')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 16px;">
            <label style="display: block; font-weight: bold; margin-bottom: 6px;">Pilih Buku yang Dipinjam</label>
            @foreach ($books as $book)
                <div style="margin-bottom: 4px;">
                    <label style="font-weight: normal;">
                        <input type="checkbox" name="book_ids[]" value="{{ $book->id }}" {{ is_array(old('book_ids')) && in_array($book->id, old('book_ids')) ? 'checked' : '' }}>
                        {{ $book->judul ?? $book->title }}
                    </label>
                </div>
            @endforeach
            @error('book_ids')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" style="padding: 10px 16px; background: #2563eb; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
            Simpan Peminjaman
        </button>
        <a href="{{ route('loans.index') }}" style="margin-left: 10px;">Batal</a>
    </form>
@endsection