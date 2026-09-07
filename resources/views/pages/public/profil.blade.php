@extends('layouts.main')

@section('content')

    <div class="bg-gradient-to-br from-sekolah-biru-muda via-sekolah-biru to-sekolah-biru-tua py-16">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-white font-montserrat">
                Profil Sekolah
            </h1>
            <p class="mt-2 text-lg text-blue-100">
                Mengenal lebih dekat SD Negeri 3 Salamerta.
            </p>
        </div>
    </div>

    <div class="py-16 md:py-24">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-lg p-8 md:p-12">
                
                <div class->
                    <h2 class="text-2xl font-semibold text-sekolah-biru-tua font-montserrat mb-4">
                        Sejarah Sekolah
                    </h2>
                    <div class="text-gray-700 leading-relaxed space-y-4">
                        {!! nl2br(e($pengaturans['sejarah'] ?? 'Sejarah sekolah belum diatur...')) !!}
                    </div>
                </div>

                <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8 border-t pt-12">
                    <div>
                        <h2 class="text-2xl font-semibold text-sekolah-biru-tua font-montserrat mb-4">
                            Visi
                        </h2>
                        <div class="text-gray-700 leading-relaxed space-y-4">
                            {!! nl2br(e($pengaturans['visi'] ?? 'Visi sekolah belum diatur...')) !!}
                        </div>
                    </div>
                    <div>
                        <h2 class="text-2xl font-semibold text-sekolah-biru-tua font-montserrat mb-4">
                            Misi
                        </h2>
                        <div class="text-gray-700 leading-relaxed space-y-4">
                            {!! nl2br(e($pengaturans['misi'] ?? 'Misi sekolah belum diatur...')) !!}
                        </div>
                    </div>
                </div>

                <div class="mt-12 border-t pt-12">
                    <h2 class="text-2xl font-semibold text-sekolah-biru-tua font-montserrat mb-8 text-center">
                        Struktur Organisasi
                    </h2>
                    
                    @if (!empty($pengaturans['struktur_organisasi_path']))
                        <div class="text-gray-700">
                            <img src="{{ asset('storage/' . $pengaturans['struktur_organisasi_path']) }}" 
                                 alt="Struktur Organisasi SDN 3 Salamerta" 
                                 class="w-full h-auto object-contain rounded-lg border shadow-sm">
                        </div>
                    @else
                        <p class="text-center text-gray-500 mb-8">
                            Gambar struktur organisasi belum di-upload.
                            <br>
                            (Contoh tampilan akan seperti di bawah ini)
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-center">
                            @php
                                $placeholders = [
                                    ['nama' => 'Kepala Sekolah', 'jabatan' => 'Nama... S.Pd'],
                                    ['nama' => 'Wakil Kepala Sekolah', 'jabatan' => 'Nama... S.Pd'],
                                    ['nama' => 'Kepala Tata Usaha', 'jabatan' => 'Nama... S.Pd'],
                                    ['nama' => 'Koordinator Kurikulum', 'jabatan' => 'Nama... S.Pd'],
                                ];
                            @endphp
                            @foreach ($placeholders as $p)
                                <div class="bg-slate-50 border border-slate-200 rounded-lg p-4">
                                    <h3 class="font-semibold text-gray-800">{{ $p['nama'] }}</h3>
                                    <p class="text-sm text-gray-600">{{ $p['jabatan'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>

@endsection