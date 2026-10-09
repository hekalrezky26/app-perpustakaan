<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\StoreMemberRequest;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $members = Member::when($request->search, function ($query, $search) {
            return $query->where('nama', 'like', "%{$search}%")
                         ->orWhere('nim', 'like', "%{$search}%");
        })->paginate(10)->withQueryString();

        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(StoreMemberRequest $request)
    {
        Member::create($request->validated());

        return redirect()->route('members.index')
            ->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $member = Member::findOrFail($id);

        return view('members.show', compact('member'));
    }

    public function edit(string $id)
    {
        $member = Member::findOrFail($id);

        return view('members.edit', compact('member'));
    }

    public function update(Request $request, string $id)
    {
        $member = Member::findOrFail($id);

        $validated = $request->validate([
            'nama'          => 'required|string|max:100',
            'nim'           => 'required|string|max:20|unique:members,nim,' . $id,
            'email'         => 'required|email|max:100|unique:members,email,' . $id,
            'nomor_telepon' => 'required|string|max:15',
            'alamat'        => 'required|string',
            'status'        => 'required|in:aktif,nonaktif',
        ], [
            'nim.unique'   => 'NIM sudah digunakan oleh anggota lain.',
            'email.unique' => 'Email sudah digunakan oleh anggota lain.',
        ]);

        $member->update($validated);

        return redirect()->route('members.index')
            ->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('members.index')
            ->with('success', 'Anggota berhasil dihapus.');
    }
}