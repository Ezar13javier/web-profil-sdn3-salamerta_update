<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        // 1. Ambil semua data guru
        $gurus = Guru::latest()->paginate(10); // Ambil data terbaru, 10 per halaman

        // 2. Kirim data ke view
        return view('admin.guru.index', compact('gurus'));
    }

    public function create()
    {
        // Cukup tampilkan view form-nya
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi Input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'nullable|string|unique:gurus,nip',
            'posisi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:25000',
        ]);

        // 2. Handle File Upload (jika ada)
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('guru-foto', 'public');
        }

        // 3. Simpan ke Database
        Guru::create([
            'nama' => $validatedData['nama'],
            'nip' => $validatedData['nip'] ?? null,
            'posisi' => $validatedData['posisi'],
            'foto' => $fotoPath,
        ]);

        // 4. Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('admin.guru.index')
                        ->with('success', 'Data guru berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Guru $guru)
    {
        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        // 1. Validasi Input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'nullable|string|unique:gurus,nip,' . $guru->id,
            'posisi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:25000', 
        ]);

        // 2. Handle File Upload (jika ada file baru)
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($guru->foto) {
                Storage::disk('public')->delete($guru->foto);
            }
            $fotoPath = $request->file('foto')->store('guru-foto', 'public');
            $validatedData['foto'] = $fotoPath;
        }

        // 3. Update ke Database
        $guru->update($validatedData);

        // 4. Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('admin.guru.index')
                        ->with('success', 'Data guru berhasil diperbarui!');
    }

    public function destroy(Guru $guru)
    {
        // Hapus foto dari storage (jika ada)
        if ($guru->foto) {
            Storage::disk('public')->delete($guru->foto);
        }

        // Hapus data guru dari database
        $guru->delete();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('admin.guru.index')
                        ->with('success', 'Data guru berhasil dihapus!');
    }
}
