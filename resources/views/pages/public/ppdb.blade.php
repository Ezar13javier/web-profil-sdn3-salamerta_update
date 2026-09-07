@extends('layouts.main')

@section('content')

    <div class="bg-gradient-to-br from-sekolah-biru-muda via-sekolah-biru to-sekolah-biru-tua py-16">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-white font-montserrat">
                PPDB 2025/2026
            </h1>
            <p class="mt-2 text-lg text-blue-100">
                Informasi Penerimaan Peserta Didik Baru SD Negeri 3 Salamerta.
            </p>
        </div>
    </div>

    <div class="py-16 md:py-24">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            
            <h2 class="text-2xl font-bold text-sekolah-biru-tua font-montserrat mb-8">
                Informasi Pendaftaran
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
                
                <div class="bg-white rounded-xl shadow-md p-6 flex items-start gap-4 border-l-4 border-sekolah-biru">
                    <div class="p-3 bg-blue-50 rounded-lg text-sekolah-biru">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" /></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">Jadwal Pendaftaran</h3>
                        <p class="text-gray-600 text-sm mt-1">
                            {{ $pengaturans['ppdb_jadwal'] ?? 'Belum ditentukan' }}
                        </p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 flex items-start gap-4 border-l-4 border-sekolah-biru">
                    <div class="p-3 bg-blue-50 rounded-lg text-sekolah-biru">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.003c0 1.113.285 2.16.786 3.07M15 19.128c.331.18.681.303 1.047.372M4.5 4.5a3.75 3.75 0 00-3.75 3.75v6c0 1.312.564 2.508 1.483 3.334a6.75 6.75 0 008.017-4.66c.33.18.68.303 1.047.372m-9.5 0a4.125 4.125 0 00-7.533 2.493M4.5 4.5a3.75 3.75 0 017.5 0v.003c0 1.113.285 2.16.786 3.07M4.5 4.5v.003c0 1.113-.285 2.16-.786-3.07M4.5 4.5c.331-.18.681-.303 1.047-.372" /></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">Kuota Tersedia</h3>
                        <p class="text-gray-600 text-sm mt-1">
                            {{ $pengaturans['ppdb_kuota'] ?? 'Belum ditentukan' }}
                        </p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 flex items-start gap-4 border-l-4 border-sekolah-biru">
                    <div class="p-3 bg-blue-50 rounded-lg text-sekolah-biru">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z" /></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">Pengumuman</h3>
                        <p class="text-gray-600 text-sm mt-1">
                            {{ $pengaturans['ppdb_pengumuman'] ?? 'Belum ditentukan' }}
                        </p>
                    </div>
                </div>
            </div>


            <div class="bg-white rounded-xl shadow-lg p-8 md:p-10 mb-16">
                <h2 class="text-2xl font-bold text-sekolah-biru-tua font-montserrat mb-8 flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-sekolah-biru"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z" /></svg>
                    Persyaratan Pendaftaran
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 border-b pb-2">Persyaratan Umum:</h3>
                        <ul class="space-y-3">
                            @php
                                // Memecah teks berdasarkan baris baru (Enter)
                                $syaratUmum = explode("\n", $pengaturans['ppdb_syarat_umum'] ?? '');
                            @endphp
                            @foreach ($syaratUmum as $item)
                                @if (trim($item))
                                    <li class="flex items-start gap-3 text-gray-700 text-sm">
                                        <span class="w-1.5 h-1.5 bg-sekolah-biru rounded-full mt-2 flex-shrink-0"></span>
                                        <span>{{ $item }}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 border-b pb-2">Dokumen yang Diperlukan:</h3>
                        <ul class="space-y-3">
                            @php
                                $syaratDokumen = explode("\n", $pengaturans['ppdb_syarat_dokumen'] ?? '');
                            @endphp
                            @foreach ($syaratDokumen as $item)
                                @if (trim($item))
                                    <li class="flex items-start gap-3 text-gray-700 text-sm">
                                        <span class="w-1.5 h-1.5 bg-sekolah-biru rounded-full mt-2 flex-shrink-0"></span>
                                        <span>{{ $item }}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>


            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 bg-white rounded-xl shadow-lg p-8 md:p-10">
                    <h2 class="text-2xl font-bold text-sekolah-biru-tua font-montserrat mb-8">
                        Alur Pendaftaran
                    </h2>
                    
                    <div class="space-y-8 relative">
                        <div class="absolute left-5 top-2 bottom-2 w-0.5 bg-gray-200"></div>

                        @php
                            $alur = explode("\n", $pengaturans['ppdb_alur'] ?? '');
                        @endphp
                        @foreach ($alur as $index => $item)
                            @if (trim($item))
                                <div class="relative flex gap-6">
                                    <div class="flex-shrink-0 w-10 h-10 bg-sekolah-biru text-white font-bold rounded-full flex items-center justify-center z-10 border-4 border-white shadow-sm">
                                        {{ $index + 1 }}
                                    </div>
                                    <div class="pt-2">
                                        <p class="text-gray-800 font-medium">{{ $item }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <div class="bg-sekolah-biru rounded-xl shadow-lg p-8 text-center text-white sticky top-28">
                        <h3 class="text-xl font-bold font-montserrat mb-4">
                            Download Brosur PPDB
                        </h3>
                        <p class="text-blue-100 text-sm mb-8">
                            Unduh brosur lengkap untuk informasi lebih detail mengenai pendaftaran.
                        </p>
                        
                        @if (!empty($pengaturans['brosur_ppdb_path']))
                            <a href="{{ asset('storage/' . $pengaturans['brosur_ppdb_path']) }}" 
                               target="_blank" 
                               class="inline-flex items-center justify-center w-full px-6 py-3 bg-white text-sekolah-biru font-bold rounded-lg hover:bg-gray-100 transition duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" /></svg>
                                Download Brosur
                            </a>
                        @else
                            <button disabled class="inline-flex items-center justify-center w-full px-6 py-3 bg-blue-400 text-blue-100 font-bold rounded-lg cursor-not-allowed">
                                Belum Tersedia
                            </button>
                        @endif
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection