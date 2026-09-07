<?php

namespace Database\Seeders;

use App\Models\Pengaturan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    
    public function run(): void
    {
    $pengaturans = [
        // Profil Sekolah
        ['key' => 'sejarah', 'value' => 'Isi sejarah singkat sekolah di sini...'],
        ['key' => 'visi', 'value' => 'Isi visi sekolah di sini...'],
        ['key' => 'misi', 'value' => 'Isi misi sekolah di sini...'],
        ['key' => 'sambutan_kepsek', 'value' => 'Isi sambutan kepala sekolah di sini...'],

        // Kontak & Alamat
        ['key' => 'alamat_sekolah', 'value' => 'Jl. Raya Salamerta No. 1, Desa Salamerta'],
        ['key' => 'telepon_sekolah', 'value' => '0812-XXXX-XXXX'],
        ['key' => 'email_sekolah', 'value' => 'info@sdn3salamerta.sch.id'],
        ['key' => 'google_maps_link', 'value' => 'https://maps.google.com/...'],

        // Media Sosial & Link Eksternal
        ['key' => 'link_facebook', 'value' => 'https://facebook.com/sekolah'],
        ['key' => 'link_instagram', 'value' => 'https://instagram.com/sekolah'],
        ['key' => 'link_youtube', 'value' => 'https://youtube.com/sekolah'],
        ['key' => 'link_kemdikbud_nisn', 'value' => 'https://nisn.data.kemdikbud.go.id/'],

        // PENGATURAN PPDB
        ['key' => 'info_ppdb', 'value' => 'Isi informasi singkat PPDB di sini. Pendaftaran dibuka...'],
        ['key' => 'brosur_ppdb_path', 'value' => null], // Path untuk file brosur
        ['key' => 'struktur_organisasi_path', 'value' => null], // Path untuk file struktur organisasi

        // Akademik
        ['key' => 'akademik_kurikulum', 'value' => 'Isi penjelasan singkat tentang kurikulum yang digunakan di sini...'],
        ['key' => 'akademik_ekstrakurikuler', 'value' => 'Isi daftar ekstrakurikuler (cth: 1. Pramuka, 2. Voli) di sini...'],

        // Tampilan Depan
        ['key' => 'nama_kepsek', 'value' => 'Nama Kepala Sekolah, S.Pd, M.Pd'],
        ['key' => 'foto_kepsek', 'value' => null], // Path untuk foto kepsek

        // 
        ['key' => 'ppdb_jadwal', 'value' => '1 Juni - 30 Juni 2025'],
        ['key' => 'ppdb_kuota', 'value' => '60 siswa baru'],
        ['key' => 'ppdb_pengumuman', 'value' => '5 Juli 2025'],
        ['key' => 'ppdb_syarat_umum', 'value' => '- Berusia minimal 6 tahun\n- Memiliki Akta Kelahiran'],
        ['key' => 'ppdb_syarat_dokumen', 'value' => '- Fotokopi Akta Kelahiran\n- Fotokopi Kartu Keluarga'],
        ['key' => 'ppdb_alur', 'value' => '1. Pengisian Formulir\n2. Melengkapi Berkas\n3. Penyerahan Berkas'],

    ];

    foreach ($pengaturans as $pengaturan) {
        Pengaturan::firstOrCreate(['key' => $pengaturan['key']], ['value' => $pengaturan['value']]);
    }
    }
}