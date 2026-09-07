@extends('layouts.main')

@section('content')

    <div class="bg-gradient-to-br from-sekolah-biru-muda via-sekolah-biru to-sekolah-biru-tua py-16">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-white font-montserrat">
                {{ $post->judul }}
            </h1>
            <p class="mt-2 text-lg text-blue-100">
                Dipublikasikan pada {{ optional($post->tanggal_dipublikasikan)->translatedFormat('d F Y') ?? '-' }}
            </p>
        </div>
    </div>

    <div class="py-16 md:py-24">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row gap-8">

                <div class="w-full md:w-3/4">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        @if ($post->gambar)
                            <img src="{{ $post->gambar ? asset('storage/' . $post->gambar) : 'https://via.placeholder.com/1200x600?text=No+Image' }}" 
                                 alt="{{ $post->judul }}" 
                                 class="w-full h-auto object-cover">
                        @endif
                        
                        <div class="p-8 md:p-10">
                            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 font-montserrat mb-6 md:hidden">
                                {{ $post->judul }}
                            </h2>
                            <div class="text-gray-700 text-base leading-relaxed space-y-6 break-words">
                                {!! nl2br(e($post->isi)) !!}
                            </div>
                        </div>
                    </div>
                </div> <div class="w-full md:w-1/4">
                    <div class="bg-white rounded-xl shadow-lg p-6 sticky top-28">
                        <h3 class="text-xl font-semibold text-sekolah-biru-tua font-montserrat mb-4">
                            Berita Terbaru Lainnya
                        </h3>
                        
                        <div class="space-y-4">
                            @forelse ($recentPosts as $recent)
                                <a href="{{ route('berita.show', $recent->slug) }}" class="block group">
                                    <div class="flex items-center gap-4">
                                        <img src="{{ $recent->gambar ? asset('storage/' . $recent->gambar) : 'https://via.placeholder.com/100x100?text=No+Image' }}" 
                                             alt="{{ $recent->judul }}"
                                             class="h-16 w-16 object-cover rounded-md flex-shrink-0">
                                        <div>
                                            <p class="text-sm font-semibold text-gray-800 group-hover:text-sekolah-biru">
                                                {{ $recent->judul }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <p class="text-sm text-gray-500">Tidak ada berita lainnya.</p>
                            @endforelse
                        </div>
                    </div>
                </div> </div> </div>
    </div>

@endsection