<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
   
    public function index()
    {
    // 1. Ambil semua data foto, urutkan dari yang terbaru
    $galeris = Galeri::latest()->paginate(12); // Tampilkan 12 foto per halaman

    // 2. Kirim data ke view
    // view path uses Indonesian folder 'admin/galeri/index.blade.php'
    return view('admin.galeri.index', compact('galeris'));
    }

   
    public function create()
    {
    // Cukup tampilkan view form-nya
    return view('admin.galeri.create');
    }
  
    public function store(Request $request)
    {
        // 1. Validasi input
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'path_gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:25000',// Maks 25MB
        ]);

        // 2. Simpan file ke disk public
        $path = $request->file('path_gambar')->store('galeri-gambar', 'public');

        // 3. Simpan record ke database
        Galeri::create([
            'judul' => $validated['judul'],
            'kategori' => $validated['kategori'] ?? null,
            'path_gambar' => $path,
        ]);

        // 4. Redirect kembali
        return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil di-upload ke galeri.');
    }

    
    public function show(string $id)
    {
        //
    }

   
    public function edit(string $id)
    {
        //
    }

    
    public function update(Request $request, string $id)
    {
        //
    }

    
    public function destroy(string $id)
    {
        $galeri = Galeri::findOrFail($id);
        // Hapus file dari storage jika ada
        if ($galeri->path_gambar) {
            Storage::disk('public')->delete($galeri->path_gambar);
        }
        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil dihapus dari galeri.');
    }
}
