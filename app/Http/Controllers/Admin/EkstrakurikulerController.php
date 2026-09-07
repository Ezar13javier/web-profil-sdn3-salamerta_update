<?php

namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller; // Pastikan namespace sudah benar
use App\Models\Ekstrakurikuler; // Pastikan model Ekstrakurikuler di-import
use Illuminate\Http\Request; // Import Request

class EkstrakurikulerController extends Controller
{
    // Menampilkan daftar ekstrakurikuler
    public function index() {
        // 1. Ambil semua data ekskul, urutkan dari yang terbaru
        $ekskuls = Ekstrakurikuler::latest()->paginate(10);

        // 2. Kirim data ke view
        return view('admin.ekskul.index', compact('ekskuls'));
    }

    // Menampilkan form untuk membuat ekstrakurikuler baru
    public function create() {
        return view('admin.ekskul.create'); // Tampilkan view untuk form create
    }

    // Menyimpan data ekstrakurikuler baru
    public function store(Request $request) {
        // 1. Validasi Input
        $validatedData = $request->validate([
            'nama'               => 'required|string|max:255|unique:ekstrakurikulers,nama',
            'deskripsi_singkat'  => 'required|string|max:1000',
            'jadwal'             => 'nullable|string|max:255',
        ]);

        // 2. Simpan ke Database
        Ekstrakurikuler::create($validatedData);

        // 3. Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('admin.ekskul.index')
                        ->with('success', 'Ekstrakurikuler baru berhasil ditambahkan!');
        }

    
    public function show(string $id)
    {
        //
    }

    // Menampilkan form untuk mengedit ekstrakurikuler
    public function edit(string $id) {
        // 1. Cari ekskul berdasarkan ID
        $ekskul = Ekstrakurikuler::findOrFail($id);

        // 2. Tampilkan view 'edit' dan kirim data 'ekskul' ke dalamnya
        return view('admin.ekskul.edit', compact('ekskul'));
    }

    // Memperbarui data ekstrakurikuler
    public function update(Request $request, string $id){
        // 1. Cari ekskul yang mau di-update
        $ekskul = Ekstrakurikuler::findOrFail($id);

        // 2. Validasi Input
        $validatedData = $request->validate([
            // Trik validasi unique: abaikan nama milik ekskul ini sendiri
            'nama' => 'required|string|max:255|unique:ekstrakurikulers,nama,' . $ekskul->id,
            'deskripsi_singkat' => 'required|string|max:1000',
            'jadwal' => 'nullable|string|max:255',
        ]);

        // 3. Update data di database
        $ekskul->update($validatedData);

        // 4. Redirect kembali ke halaman index
        return redirect()->route('admin.ekskul.index')
                        ->with('success', 'Ekstrakurikuler berhasil diperbarui!');
    }

    // Menghapus data ekstrakurikuler
    public function destroy(string $id) {
        // 1. Cari data ekskul
        $ekskul = Ekstrakurikuler::findOrFail($id);

        // 2. Hapus data dari database
        $ekskul->delete();

        // 3. Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('admin.ekskul.index')
                         ->with('success', 'Ekstrakurikuler berhasil dihapus!');
    }
}
