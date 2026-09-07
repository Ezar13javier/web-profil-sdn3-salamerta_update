<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengaturan Profil Sekolah') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.pengaturan.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="p-6 text-gray-900 space-y-6">
                        
                        <h3 class="text-lg font-medium text-gray-900">Profil Utama</h3>
                        
                        <div class="mb-4">
                            <label for="sambutan_kepsek" class="block text-sm font-medium text-gray-700">Sambutan Kepala Sekolah</label>
                            <textarea name="sambutan_kepsek" id="sambutan_kepsek" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('sambutan_kepsek', $pengaturans['sambutan_kepsek'] ?? '') }}</textarea>
                        </div>

                        <div class="mb-4">
                        </div>

                    <div class="mb-4">
                        <label for="nama_kepsek" class="block text-sm font-medium text-gray-700">Nama Kepala Sekolah</label>
                        <input type="text" name="nama_kepsek" id="nama_kepsek" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" 
                               value="{{ old('nama_kepsek', $pengaturans['nama_kepsek'] ?? '') }}" 
                               placeholder="Contoh: Drs. Ahmad Suryadi, M.Pd">
                    </div>

                    <div class="mb-4">
                        <label for="foto_kepsek" class="block text-sm font-medium text-gray-700">Upload Foto Kepala Sekolah</label>
                        <input type="file" name="foto_kepsek" id="foto_kepsek" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                        <p class="mt-1 text-sm text-gray-500">Kosongkan jika tidak ingin mengubah foto. (Format: JPG, PNG).</p>

                        @if (!empty($pengaturans['foto_kepsek']))
                                <div class="mt-4">
                                    <p class="text-sm font-medium text-gray-700">Foto Saat Ini:</p>
                                    
                                    <img src="{{ asset('storage/' . $pengaturans['foto_kepsek']) }}" alt="Foto Kepala Sekolah" class="h-40 w-40 object-cover rounded-full mt-2 border mb-2">
                                    
                                    <div class="flex items-center">
                                        <button type="submit" form="delete-foto-kepsek" 
                                                class="text-red-600 hover:text-red-800 text-sm font-medium underline"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
                                            Hapus Foto
                                        </button>
                                    </div>
                                </div>
                            @endif
                    </div>
                    <div class="mb-4">
                        <label for="sejarah" class="block text-sm font-medium text-gray-700">Sejarah</label>

                        <div class="mb-4">
                            <label for="sejarah" class="block text-sm font-medium text-gray-700">Sejarah</label>
                            <textarea name="sejarah" id="sejarah" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('sejarah', $pengaturans['sejarah'] ?? '') }}</textarea>
                        </div>
                        
                        <div class="mb-4">
                            <label for="visi" class="block text-sm font-medium text-gray-700">Visi</label>
                            <textarea name="visi" id="visi" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('visi', $pengaturans['visi'] ?? '') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="misi" class="block text-sm font-medium text-gray-700">Misi</label>
                            <textarea name="misi" id="misi" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('misi', $pengaturans['misi'] ?? '') }}</textarea>
                        </div>

                        <div class="mb-4">
                        </div>

                        <hr class="my-6">
                        <h3 class="text-lg font-medium text-gray-900">Struktur Organisasi</h3>

                            <div class="mb-4">
                                <label for="struktur_organisasi_path" class="block text-sm font-medium text-gray-700">Upload Gambar Struktur Organisasi</label>
                                <input type="file" name="struktur_organisasi_path" id="struktur_organisasi_path" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                                <p class="mt-1 text-sm text-gray-500">Kosongkan jika tidak ingin mengubah gambar. (Format: JPG, PNG).</p>

                                @if (!empty($pengaturans['struktur_organisasi_path']))
                            <div class="mt-4">
                                <p class="text-sm font-medium text-gray-700">Gambar Saat Ini:</p>
                                <a href="{{ asset('storage/' . $pengaturans['struktur_organisasi_path']) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $pengaturans['struktur_organisasi_path']) }}" alt="Struktur Organisasi" class="h-48 w-auto object-cover rounded-md mt-2 border">
                                </a>
                            </div>
                        @endif

                        <div class="flex items-center mt-2">
                            <button type="submit" form="delete-struktur" 
                                    class="text-red-600 hover:text-red-800 text-sm font-medium underline"
                                    onclick="return confirm('Hapus struktur organisasi?')">
                                Hapus Gambar
                            </button>
                        </div>
                    </div>

                    <hr class="my-6">
                    <h3 class="text-lg font-medium text-gray-900">Akademik</h3>

                    <div class="mb-4">
                        <label for="akademik_kurikulum" class="block text-sm font-medium text-gray-700">Kurikulum</label>
                        <textarea name="akademik_kurikulum" id="akademik_kurikulum" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('akademik_kurikulum', $pengaturans['akademik_kurikulum'] ?? '') }}</textarea>
                        <p class="mt-1 text-sm text-gray-500">Jelaskan kurikulum yang digunakan.</p>
                    </div>

                    <div class="mb-4">
                        <label for="akademik_ekstrakurikuler" class="block text-sm font-medium text-gray-700">Ekstrakurikuler</label>
                        <textarea name="akademik_ekstrakurikuler" id="akademik_ekstrakurikuler" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('akademik_ekstrakurikuler', $pengaturans['akademik_ekstrakurikuler'] ?? '') }}</textarea>
                        <p class="mt-1 text-sm text-gray-500">Sebutkan daftar ekstrakurikuler yang tersedia.</p>
                    </div>


                        <hr class="my-6">
                        <h3 class="text-lg font-medium text-gray-900">Kontak & Alamat</h3>

                        <div class="mb-4">
                            <label for="alamat_sekolah" class="block text-sm font-medium text-gray-700">Alamat Sekolah</label>
                            <input type="text" name="alamat_sekolah" id="alamat_sekolah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('alamat_sekolah', $pengaturans['alamat_sekolah'] ?? '') }}">
                        </div>
                        <div class="mb-4">
                            <label for="telepon_sekolah" class="block text-sm font-medium text-gray-700">Telepon</label>
                            <input type="text" name="telepon_sekolah" id="telepon_sekolah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('telepon_sekolah', $pengaturans['telepon_sekolah'] ?? '') }}">
                        </div>
                        <div class="mb-4">
                            <label for="email_sekolah" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email_sekolah" id="email_sekolah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('email_sekolah', $pengaturans['email_sekolah'] ?? '') }}">
                        </div>
                        <div class="mb-4">
                            <label for="google_maps_link" class="block text-sm font-medium text-gray-700">Link Google Maps (Embed URL)</label>
                            <input type="text" name="google_maps_link" id="google_maps_link" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('google_maps_link', $pengaturans['google_maps_link'] ?? '') }}">
                        </div>

                        <hr class="my-6">
                        <h3 class="text-lg font-medium text-gray-900">Media Sosial & Tautan</h3>
                        
                        <div class="mb-4">
                            <label for="link_facebook" class="block text-sm font-medium text-gray-700">Link Facebook</label>
                            <input type="text" name="link_facebook" id="link_facebook" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('link_facebook', $pengaturans['link_facebook'] ?? '') }}">
                        </div>
                        <div class="mb-4">
                            <label for="link_instagram" class="block text-sm font-medium text-gray-700">Link Instagram</label>
                            <input type="text" name="link_instagram" id="link_instagram" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('link_instagram', $pengaturans['link_instagram'] ?? '') }}">
                        </div>
                        <div class="mb-4">
                            <label for="link_youtube" class="block text-sm font-medium text-gray-700">Link YouTube</label>
                            <input type="text" name="link_youtube" id="link_youtube" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('link_youtube', $pengaturans['link_youtube'] ?? '') }}">
                        </div>
                        <div class="mb-4">
                            <label for="link_kemdikbud_nisn" class="block text-sm font-medium text-gray-700">Link Cek NISN (Kemdikbud)</label>
                            <input type="text" name="link_kemdikbud_nisn" id="link_kemdikbud_nisn" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('link_kemdikbud_nisn', $pengaturans['link_kemdikbud_nisn'] ?? '') }}">
                        </div>
                        
                        <hr class="my-6">
                        <h3 class="text-lg font-medium text-gray-900">Pengaturan PPDB</h3>

                        <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="mb-4">
                                <label for="ppdb_jadwal" class="block text-sm font-medium text-gray-700">Jadwal Pendaftaran</label>
                                <input type="text" name="ppdb_jadwal" id="ppdb_jadwal" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('ppdb_jadwal', $pengaturans['ppdb_jadwal'] ?? '') }}" placeholder="1 Juni - 30 Juni 2025">
                            </div>
                            <div class="mb-4">
                                <label for="ppdb_kuota" class="block text-sm font-medium text-gray-700">Kuota Tersedia</label>
                                <input type="text" name="ppdb_kuota" id="ppdb_kuota" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('ppdb_kuota', $pengaturans['ppdb_kuota'] ?? '') }}" placeholder="60 siswa baru">
                            </div>
                            <div class="mb-4">
                                <label for="ppdb_pengumuman" class="block text-sm font-medium text-gray-700">Tanggal Pengumuman</label>
                                <input type="text" name="ppdb_pengumuman" id="ppdb_pengumuman" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('ppdb_pengumuman', $pengaturans['ppdb_pengumuman'] ?? '') }}" placeholder="5 Juli 2025">
                            </div>
                        </div>

                        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-4">
                                <label for="ppdb_syarat_umum" class="block text-sm font-medium text-gray-700">Persyaratan Umum</label>
                                <textarea name="ppdb_syarat_umum" id="ppdb_syarat_umum" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('ppdb_syarat_umum', $pengaturans['ppdb_syarat_umum'] ?? '') }}</textarea>
                                <p class="mt-1 text-sm text-gray-500">Gunakan tanda minus (-) untuk daftar list.</p>
                            </div>
                            <div class="mb-4">
                                <label for="ppdb_syarat_dokumen" class="block text-sm font-medium text-gray-700">Dokumen yang Diperlukan</label>
                                <textarea name="ppdb_syarat_dokumen" id="ppdb_syarat_dokumen" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('ppdb_syarat_dokumen', $pengaturans['ppdb_syarat_dokumen'] ?? '') }}</textarea>
                                <p class="mt-1 text-sm text-gray-500">Gunakan tanda minus (-) untuk daftar list.</p>
                            </div>
                        </div>

                        <div class="mt-4">
                             <div class="mb-4">
                                <label for="ppdb_alur" class="block text-sm font-medium text-gray-700">Alur Pendaftaran</label>
                                <textarea name="ppdb_alur" id="ppdb_alur" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('ppdb_alur', $pengaturans['ppdb_alur'] ?? '') }}</textarea>
                                <p class="mt-1 text-sm text-gray-500">Gunakan penomoran (1., 2., 3.) untuk daftar alur.</p>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                             <div class="mb-4">
                                <label for="brosur_ppdb_path" class="block text-sm font-medium text-gray-700">Upload Brosur PPDB</label>
                                <input type="file" name="brosur_ppdb_path" id="brosur_ppdb_path" class="mt-1 block w-full text-sm ...">
                                @if (!empty($pengaturans['brosur_ppdb_path']))
                                    @endif
                            </div>
                            <div class="flex items-center mt-2">
                                <button type="submit" form="delete-brosur" 
                                        class="text-red-600 hover:text-red-800 text-sm font-medium underline"
                                        onclick="return confirm('Hapus brosur PPDB?')">
                                    Hapus Brosur
                                </button>
                        </div>
                        
                    </div>
                </form>
                <form id="delete-foto-kepsek" action="{{ route('admin.pengaturan.deleteImage', 'foto_kepsek') }}" method="POST" class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
                <form id="delete-struktur" action="{{ route('admin.pengaturan.deleteImage', 'struktur_organisasi_path') }}" method="POST" class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
                <form id="delete-brosur" action="{{ route('admin.pengaturan.deleteImage', 'brosur_ppdb_path') }}" method="POST" class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
</x-app-layout>