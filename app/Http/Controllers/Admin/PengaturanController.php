<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
{
    public function edit()
    {
        // Ambil semua settings dan ubah jadi array key => value
        // dari [ ['key' => 'visi', 'value' => '...'] ]
        // menjadi [ 'visi' => '...' ]
        $pengaturans = Pengaturan::pluck('value', 'key');

        // Tampilkan view dan kirim data settings
        return view('admin.pengaturan.edit', compact('pengaturans'));
    }

    public function update(Request $request)
    {
        // 1. Validasi
        $request->validate([
            'info_ppdb' => 'nullable|string',
            'brosur_ppdb_path' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:25000',
            'struktur_organisasi_path' => 'nullable|image|mimes:jpg,jpeg,png|max:25000',
            'email_sekolah' => 'nullable|email',
        ]);

        // 2. SIMPAN SEMUA DATA TEKS
        //    Pastikan file input DIKECUALIKAN dari loop ini
        foreach ($request->except([
            '_token', 
            '_method', 
            'brosur_ppdb_path',
            'struktur_organisasi_path' // <-- FIX #1: Pastikan ini ada di 'except'
        ]) as $key => $value) {
            Pengaturan::updateOrCreate(
                ['key' => $key],
                ['value' => $value ?? '']
            );
        }

        // 3. HANDLE BROSUR PPDB
        if ($request->hasFile('brosur_ppdb_path')) {
            $oldBrosur = Pengaturan::where('key', 'brosur_ppdb_path')->first();
            if ($oldBrosur && $oldBrosur->value) {
                // FIX #2: Gunakan cara ini untuk menghapus
                Storage::disk('public')->delete($oldBrosur->value);
            }
            $path = $request->file('brosur_ppdb_path')->store('ppdb-brosur', 'public');
            Pengaturan::updateOrCreate(
                ['key' => 'brosur_ppdb_path'],
                ['value' => $path]
            );
        }

        // 4. HANDLE STRUKTUR ORGANISASI
        if ($request->hasFile('struktur_organisasi_path')) {
            $oldImage = Pengaturan::where('key', 'struktur_organisasi_path')->first();
            if ($oldImage && $oldImage->value) {
                // FIX #2: Gunakan cara ini untuk menghapus
                Storage::disk('public')->delete($oldImage->value);
            }
            $path = $request->file('struktur_organisasi_path')->store('profil-gambar', 'public');
            Pengaturan::updateOrCreate(
                ['key' => 'struktur_organisasi_path'],
                ['value' => $path]
            );
        }

        // 4. HANDLE FOTO KEPALA SEKOLAH
        if ($request->hasFile('foto_kepsek')) {
            // Cari path lama
            $oldImage = Pengaturan::where('key', 'foto_kepsek')->first();

            // Hapus file lama jika ada
            if ($oldImage && $oldImage->value) {
                Storage::disk('public')->delete($oldImage->value);
            }

            // Simpan file baru
            $path = $request->file('foto_kepsek')->store('profil-images', 'public');

            // Update path di database
            Pengaturan::updateOrCreate(
                ['key' => 'foto_kepsek'],
                ['value' => $path]
            );
        }

        // 6. Redirect
        return redirect()->back()->with('success', 'Pengaturan sekolah berhasil diperbarui!');
    }

    public function deleteImage($key)
    {
        // 1. Daftar key yang diizinkan untuk dihapus gambarnya (agar aman)
        $allowedKeys = ['foto_kepsek', 'struktur_organisasi_path', 'brosur_ppdb_path'];

        if (!in_array($key, $allowedKeys)) {
            return redirect()->back()->with('error', 'Aksi tidak diizinkan.');
        }

        // 2. Cari data pengaturan
        $pengaturans = Pengaturan::where('key', $key)->first();

        // 3. Hapus file jika ada
        if ($pengaturans && $pengaturans->value) {
            Storage::disk('public')->delete($pengaturans->value);
            
            // 4. Set nilai di database menjadi NULL
            $pengaturans->update(['value' => null]);
        }

        return redirect()->back()->with('success', 'Gambar berhasil dihapus!');
    }
}