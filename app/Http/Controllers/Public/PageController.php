<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Guru;
use App\Models\Galeri;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // Kita akan isi ini nanti
    public function home() { 
        // 1. Ambil 3 berita terbaru (yang sudah dipublish)
        $latestPosts = Post::whereNotNull('tanggal_dipublikasikan')
                   ->orderBy('tanggal_dipublikasikan', 'desc')
                   ->take(3)
                   ->get();

        // 2. Kirim data $latestPosts ke view
        // Variabel $pengaturan sudah global dari AppServiceProvider
            return view('pages.public.beranda', compact('latestPosts'));
        }

    // --- BUAT FUNGSI KOSONG UNTUK SETIAP RUTE ---

    public function profil() {
        // Kita tidak perlu mengirim data apa-apa,
        // karena $settings sudah tersedia global.
        return view('pages.public.profil'); 
    }

    public function guruStaf() {
            // 1. Ambil semua data 'Guru'
            //    Gunakan model 'Guru' (atau 'Teacher'?) dan kolom 'posisi' Anda
            //    Pastikan nama variabelnya '$guru' (singular)
            $guru = \App\Models\Guru::where('posisi', 'LIKE', '%Guru%')
                                   ->orderBy('nama', 'asc')
                                   ->get();
            
            // 2. Ambil semua data 'Staf'
            //    FIX: Logikanya adalah 'NOT LIKE %Guru%'
            $staf = \App\Models\Guru::where('posisi', 'NOT LIKE', '%Guru%')
                                   ->orderBy('nama', 'asc')
                                   ->get();
            
            // 3. Kirim kedua variabel ke view
            //    Sekarang variabel '$guru' (singular) sudah ada
            return view('pages.public.guru', compact('guru', 'staf')); 
        }

    public function beritaIndex() {
            // 1. Ambil SEMUA berita yg sudah publish, urutkan dari terbaru
            //    Gunakan paginate() untuk membagi per halaman (misal: 9 per halaman)
            $posts = Post::whereNotNull('tanggal_dipublikasikan')
                            ->latest('tanggal_dipublikasikan')
                            ->paginate(9); // <-- 9 berita per halaman
                
            // 2. Kirim data $posts ke view
            return view('pages.public.berita-index', compact('posts')); 
        }

    public function beritaShow($slug) {
            // 1. Ambil 1 berita berdasarkan $slug.
            //    firstOrFail() akan otomatis error 404 jika slug tidak ditemukan
            $post = Post::where('slug', $slug)
                        ->whereNotNull('tanggal_dipublikasikan') // Pastikan sudah publish
                        ->firstOrFail();
            
            // 2. Ambil 4 berita terbaru lainnya untuk sidebar
            //    Kita kecualikan berita yang sedang dibuka (pakai '!=')
            $recentPosts = Post::whereNotNull('tanggal_dipublikasikan')
                               ->where('id', '!=', $post->id) // <-- Kecualikan post ini
                               ->latest('tanggal_dipublikasikan')
                               ->take(4) // Ambil 4 saja
                               ->get();

            // 3. Kirim kedua data ke view
            return view('pages.public.berita-show', compact('post', 'recentPosts')); 
        }

    public function galeri() {
            // 1. Ambil SEMUA data foto, urutkan dari terbaru
            //    Gunakan paginate (12 foto per halaman)
            $galeris = Galeri::latest() // <-- Ganti 'Gallery' ke 'Galeri' jika perlu
                               ->paginate(12); // <-- 12 foto per halaman
            
            // 2. Kirim data $galeris ke view
            return view('pages.public.galeri', compact('galeris')); 
        }

    public function ppdb() {
            // Nanti kita akan ambil data info & brosur dari Settings
            return view('pages.public.ppdb'); 
        }

    public function kontak() {
            // Nanti kita akan ambil data alamat, email, map dari Settings
            return view('pages.public.kontak'); 
        }
        
    public function akademik() {
            // 1. Ambil semua data ekskul
            $ekskuls = Ekstrakurikuler::orderBy('nama', 'asc')->get();
            
            // 2. Kirim data $ekskuls ke view
            //    ($settings sudah global dari AppServiceProvider)
            return view('pages.public.akademik', compact('ekskuls')); 
        }
}