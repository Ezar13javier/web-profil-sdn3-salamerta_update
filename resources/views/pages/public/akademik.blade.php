@extends('layouts.main')

@section('content')

    <div class="bg-gradient-to-br from-sekolah-biru-muda via-sekolah-biru to-sekolah-biru-tua py-16">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-white font-montserrat">
                Program Akademik
            </h1>
            <p class="mt-2 text-lg text-blue-100">
                Kurikulum dan kegiatan di SD Negeri 3 Salamerta.
            </p>
        </div>
    </div>

    <div class="py-16 md:py-24">
        <div class="container mx-auto max-w-8xl px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-lg p-8 md:p-12">

                <div>
                    <h2 class="text-3xl font-bold text-center text-sekolah-biru-tua font-montserrat mb-8">
                        Kurikulum
                    </h2>
                    
                    <div class="max-w-6xl mx-auto p-6 bg-slate-50 border border-slate-200 rounded-lg">
                        <p class="text-center text-gray-700 mb-6">
                            {{ $pengaturans['akademik_kurikulum'] ?? 'Penjelasan kurikulum belum diatur...' }}
                        </p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="font-semibold text-gray-800 mb-2">Mata Pelajaran Utama:</h3>
                                <ul class="list-disc list-inside text-sm text-gray-600 space-y-1">
                                    <li>Pendidikan Agama dan Budi Pekerti</li>
                                    <li>Pendidikan Pancasila dan Kewarganegaraan</li>
                                    <li>Bahasa Indonesia</li>
                                    <li>Matematika</li>
                                    <li>Ilmu Pengetahuan Alam dan Sosial</li>
                                    <li>Pendidikan Jasmani dan Olahraga</li>
                                    <li>Seni Budaya dan Prakarya</li>
                                </ul>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 mb-2">Muatan Lokal:</h3>
                                <ul class="list-disc list-inside text-sm text-gray-600 space-y-1">
                                    <li>Bahasa Sunda</li>
                                    <li>Teknologi Informasi dan Komunikasi</li>
                                    <li>Pendidikan Lingkungan Hidup</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-16 border-t pt-10">
                    <h2 class="text-3xl font-bold text-center text-sekolah-biru-tua font-montserrat mb-10">
                        Kegiatan Ekstrakurikuler
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        
                        @forelse ($ekskuls as $ekskul)
                            <div class="bg-slate-50 border border-slate-200 rounded-lg p-6 hover:shadow-md transition-shadow duration-300">
                                <h3 class="text-xl font-semibold text-gray-900 mb-2 font-montserrat">
                                    {{ $ekskul->nama }}
                                </h3>
                                <p class="text-sm text-gray-600 mb-3">
                                    {{ $ekskul->deskripsi_singkat }}
                                </p>
                                <p class="text-sm font-semibold text-sekolah-biru">
                                    {{ $ekskul->jadwal ?? 'Jadwal akan diumumkan' }}
                                </p>
                            </div>
                        @empty
                            <p class="col-span-full text-center text-gray-500">
                                Data ekstrakurikuler akan segera ditampilkan.
                            </p>
                        @endforelse
                    </div>
                </div>
                
                <div class="mt-16 border-t pt-10">
                    <h2 class="text-3xl font-bold text-center text-sekolah-biru-tua font-montserrat mb-10">
                        Kalender Pendidikan 2024/2025
                    </h2>
                    
                    <div class="max-w-4xl mx-auto">
                        <div class="space-y-3">
                            <div class="flex items-center bg-slate-50 border border-slate-200 rounded-lg p-4">
                                <div class="text-center w-20 flex-shrink-0 border-r pr-4">
                                    <p class="text-lg font-bold text-sekolah-biru">Juli</p>
                                    <p class="text-3xl font-bold text-gray-800">15</p>
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-semibold text-gray-800">Tahun Ajaran Baru 2024/2025</h3>
                                    <p class="text-sm text-gray-600">Awal semester ganjil</p>
                                </div>
                            </div>
                            <div class="flex items-center bg-slate-50 border border-slate-200 rounded-lg p-4">
                                <div class="text-center w-20 flex-shrink-0 border-r pr-4">
                                    <p class="text-lg font-bold text-sekolah-biru">Agu</p>
                                    <p class="text-3xl font-bold text-gray-800">17</p>
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-semibold text-gray-800">Peringatan HUT RI</h3>
                                    <p class="text-sm text-gray-600">Upacara dan lomba</p>
                                </div>
                            </div>
                            <div class="flex items-center bg-slate-50 border border-slate-200 rounded-lg p-4">
                                <div class="text-center w-20 flex-shrink-0 border-r pr-4">
                                    <p class="text-lg font-bold text-sekolah-biru">Des</p>
                                    <p class="text-3xl font-bold text-gray-800">1-15</p>
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-semibold text-gray-800">Ujian Akhir Semester Ganjil</h3>
                                    <p class="text-sm text-gray-600">Evaluasi pembelajaran semester 1</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection