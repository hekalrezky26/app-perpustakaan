@extends('layouts.app')

@section('content')
    <h2>Profil Pengguna</h2>

    @if (session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 10px 14px; border-radius: 4px; margin-bottom: 16px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; margin-bottom: 24px; max-width: 500px;">
        <p><strong>Nama:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
    </div>

    <h3>Ganti Password</h3>
    <div style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; max-width: 500px;">
        <form action="{{ route('profile.password') }}" method="POST">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 12px;">
                <label for="current_password" style="display: block; font-weight: bold;">Password Lama</label>
                <input type="password" name="current_password" id="current_password" style="width: 100%; padding: 8px; margin-top: 4px; box-sizing: border-box;">
                @error('current_password')
                    <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            <div style="margin-bottom: 12px;">
                <label for="password" style="display: block; font-weight: bold;">Password Baru</label>
                <input type="password" name="password" id="password" style="width: 100%; padding: 8px; margin-top: 4px; box-sizing: border-box;">
                @error('password')
                    <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            <div style="margin-bottom: 16px;">
                <label for="password_confirmation" style="display: block; font-weight: bold;">Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" id="password_confirmation" style="width: 100%; padding: 8px; margin-top: 4px; box-sizing: border-box;">
            </div>

            <button type="submit" style="padding: 10px 16px; background: #2563eb; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                Simpan Password Baru
            </button>
        </form>
    </div>
@endsection