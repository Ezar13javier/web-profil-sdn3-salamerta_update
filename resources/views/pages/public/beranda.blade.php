@extends('layouts.main')

@section('content')

    <div class="relative h-[400px] md:h-[500px] bg-cover bg-center" 
         style="background-image: url('{{ asset('images/sekolah.png') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 h-full flex items-center">
            <div class="relative z-10 max-w-lg">
                <h1 class="text-3xl md:text-5xl text-white font-bold font-montserrat leading-tight">
                    Selamat Datang di
                    <br>
                    SD Negeri 3 Salamerta
                </h1>
                <p class="text-lg md:text-xl text-white mt-4">
                    Membentuk Generasi Cerdas, Berkarakter, dan Berprestasi
                </p>
                <div class="mt-8 flex gap-4 animate-fade-in">
                    <a href="{{ route('ppdb') }}" 
                       class="inline-flex items-center px-6 py-3 bg-sekolah-biru text-white font-semibold rounded-lg shadow-md hover:bg-gray-200 transition duration-150">
                        PPDB 2025/2026 &rarr;
                    </a>
                    <a href="{{ route('profil') }}" 
                       class="inline-flex items-center px-6 py-3 bg-transparent text-white font-semibold rounded-lg border border-white hover:bg-white hover:text-sekolah-biru-tua transition duration-150">
                        Tentang Kami
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-16 md:py-24">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden p-8 md:p-12">
                <div class="flex flex-col md:flex-row items-center gap-8 md:gap-12">
                    <div class="w-full md:w-1/3 flex justify-center">
                        <img src="{{ $pengaturans['foto_kepsek'] ? asset('storage/' . $pengaturans['foto_kepsek']) : 'https://via.placeholder.com/400x400.png/E0E0E0/AAAAAA?text=Foto+Kepala+Sekolah' }}" 
                             alt="Kepala Sekolah" 
                             class="h-48 w-48 md:h-64 md:w-64 rounded-full object-cover shadow-md">
                    </div>
                    
                    <div class="w-full md:w-2/3 text-center md:text-left">
                        <h2 class="text-3xl md:text-4xl font-bold text-sekolah-biru-tua font-montserrat mb-4">
                            Sambutan Kepala Sekolah
                        </h2>
                        <div class="text-gray-700 space-y-4 leading-relaxed">
                            {!! nl2br(e( \Illuminate\Support\Str::limit($pengaturans['sambutan_kepsek'] ?? 'Sambutan...', 500) )) !!}
                            
                            <p class="font-semibold mt-4">
                                {{ $pengaturans['nama_kepsek'] ?? 'Nama Kepala Sekolah, S.Pd, M.Pd' }}
                                <br>
                                <span class="font-normal text-sm">Kepala Sekolah</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pb-16 md:pb-24">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-sekolah-biru-tua font-montserrat mb-4">
                Program Unggulan
            </h2>
            <p class="text-lg text-center text-gray-600 mb-12 max-w-2xl mx-auto">
                Berbagai program unggulan untuk mengembangkan potensi siswa secara optimal.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <div class="bg-white rounded-xl shadow-lg p-8 text-center hover:shadow-xl transition-shadow duration-300">
                    <svg class="h-12 w-12 text-sekolah-biru mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-15.572a8.967 8.967 0 016 2.292c1.052 0 2.062-.18 3-.512v-14.25A8.987 8.987 0 0018 6c-2.305 0-4.408-.867-6-2.292m0 15.572V6.042z" /></svg>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2 font-montserrat">
                        Kurikulum Merdeka
                    </h3>
                    <p class="text-gray-600 text-sm">
                        {{ \Illuminate\Support\Str::limit($pengaturans['akademik_kurikulum'] ?? 'Pembelajaran yang berpusat pada siswa...', 120) }}
                    </p>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg p-8 text-center hover:shadow-xl transition-shadow duration-300">
                    <svg class="h-12 w-12 text-sekolah-biru mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" /></svg>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2 font-montserrat">
                        Literasi Digital
                    </h3>
                    <p class="text-gray-600 text-sm">
                        Program pengenalan teknologi informasi dan komputer untuk mempersiapkan siswa di era digital.
                    </p>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-8 text-center hover:shadow-xl transition-shadow duration-300">
                    <svg class="h-12 w-12 text-sekolah-biru mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.31h5.408a.563.563 0 01.321.988l-4.368 3.185a.563.563 0 00-.22.518l1.654 5.396a.563.563 0 01-.82.623l-4.368-3.185a.563.563 0 00-.651 0l-4.368 3.185a.563.563 0 01-.82-.623l1.654-5.396a.563.563 0 00-.22-.518l-4.368-3.185a.563.563 0 01.321-.988h5.408a.563.563 0 00.475-.31l2.125-5.111z" /></svg>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2 font-montserrat">
                        Ekstrakurikuler
                    </h3>
                    <p class="text-gray-600 text-sm">
                        {{ \Illuminate\Support\Str::limit($pengaturans['akademik_ekstrakurikuler'] ?? 'Beragam kegiatan untuk mengembangkan bakat...', 120) }}
                    </p>
                </div>

            </div>
        </div>
    </div>

    <div class="pb-16 md:pb-24">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-sekolah-biru-tua font-montserrat">
                        Berita Terbaru
                    </h2>
                    <p class="text-gray-600 mt-1">Informasi dan kegiatan terkini.</p>
                </div>
                <a href="{{ route('berita.index') }}" 
                   class="hidden md:inline-flex items-center px-5 py-2 bg-white text-sekolah-biru font-semibold rounded-lg shadow-md hover:bg-gray-100 transition duration-150 border border-gray-200">
                   Lihat Semua &rarr;
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                @forelse ($latestPosts as $post)
                    <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col hover:shadow-xl transition-shadow duration-300">
                        <span class="text-sm font-semibold text-sekolah-biru mb-2">
                            {{ $post->kategori ?? 'Kegiatan' }}
                        </span>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3 font-montserrat">
                            <a href="{{ route('berita.show', $post->slug) }}" class="hover:text-sekolah-biru">
                                {{ $post->judul }}
                            </a>
                        </h3>
                        <p class="text-sm text-gray-500 mb-4">
                            {{ optional($post->tanggal_diterbitkan)->translatedFormat('d F Y') ?? '-' }}
                        </p>
                        <div class="mt-auto">
                            <a href="{{ route('berita.show', $post->slug) }}" class="font-semibold text-sekolah-biru hover:text-sekolah-biru-tua transition duration-150">
                                Baca Selengkapnya &rarr;
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="md:col-span-3 text-center text-gray-500 bg-white rounded-xl shadow-lg p-8">
                        <p>Belum ada berita terbaru yang dipublikasikan.</p>
                    </div>
                @endforelse

            </div>
            
            <div class="text-center mt-12 md:hidden">
                <a href="{{ route('berita.index') }}" 
                   class="inline-flex items-center px-6 py-3 bg-sekolah-biru text-white font-semibold rounded-lg shadow-md hover:bg-sekolah-biru-tua transition duration-150">
                   Lihat Semua Berita
                </a>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-br from-sekolah-biru-muda via-sekolah-biru to-sekolah-biru-tua">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16 text-center">
            <h2 class="text-3xl font-bold text-white font-montserrat">
                Mari bergabung bersama kami!
            </h2>
            <p class="text-lg text-white mt-4 max-w-2xl mx-auto">
                Membangun masa depan cerah untuk putra-putri Anda. Lihat informasi pendaftaran
                atau hubungi kami untuk detail lebih lanjut.
            </p>
            <a href="{{ route('ppdb') }}" 
               class="inline-flex items-center px-6 py-3 bg-white text-sekolah-biru-tua font-semibold rounded-lg shadow-md hover:bg-gray-200 transition duration-150 mt-8">
                Info PPDB &rarr;
            </a>
        </div>
    </div>

@endsection