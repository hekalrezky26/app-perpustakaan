<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Anggota</title>
    <style>
        body { font-family: sans-serif; margin: 40px; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        th { background: #f3f4f6; }
        .alert { background: #dcfce7; color: #166534; padding: 10px; border-radius: 4px; margin-bottom: 16px; }
        .btn { padding: 6px 12px; background: #2563eb; color: #fff; text-decoration: none; border-radius: 4px; display: inline-block; }
        .btn-danger { background: #dc2626; border: none; cursor: pointer; color: #fff; padding: 6px 12px; border-radius: 4px; }
        .search-container { margin-top: 16px; display: flex; gap: 8px; }
        .search-input { padding: 6px; width: 250px; }
    </style>
</head>
<body>
    <h1>Daftar Anggota Perpustakaan</h1>

    @if (session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <a href="{{ route('members.create') }}" class="btn">+ Tambah Anggota</a>

    <form action="{{ route('members.index') }}" method="GET" class="search-container">
        <input type="text" name="search" class="search-input" placeholder="Cari nama atau NIM..." value="{{ request('search') }}">
        <button type="submit" class="btn">Cari</button>
        @if(request('search'))
            <a href="{{ route('members.index') }}" class="btn" style="background: #6b7280;">Reset</a>
        @endif
    </form>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($members as $index => $member)
                <tr>
                    <td>{{ $members->firstItem() + $index }}</td>
                    <td>{{ $member->nim }}</td>
                    <td>{{ $member->nama }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->nomor_telepon }}</td>
                    <td><strong>{{ ucfirst($member->status) }}</strong></td>
                    <td>
                        <a href="{{ route('members.show', $member->id) }}">Detail</a> |
                        <a href="{{ route('members.edit', $member->id) }}">Edit</a> |
                        <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus anggota ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Tidak ada data anggota.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 16px;">
        {{ $members->links() }}
    </div>
</body>
</html>