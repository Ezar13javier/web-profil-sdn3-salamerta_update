@extends('layouts.main')

@section('content')

    <div class="bg-gradient-to-br from-sekolah-biru-muda via-sekolah-biru to-sekolah-biru-tua py-16">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-white font-montserrat">
                Berita & Kegiatan
            </h1>
            <p class="mt-2 text-lg text-blue-100">
                Informasi terkini seputar kegiatan dan prestasi sekolah.
            </p>
        </div>
    </div>

    <div class="py-16 md:py-24">
        <div class="container mx-auto max-w-9xl px-4 sm:px-6 lg:px-8">
            
            <div>
                <div class="space-y-5">
                    
                    @forelse ($posts as $post)
                        <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 flex flex-col md:flex-row gap-6 hover:shadow-xl transition-shadow duration-300">
                            
                            <a href="{{ route('berita.show', $post->slug) }}" class="flex-shrink-0 w-full md:w-48">
                                <img src="{{ $post->gambar ? asset('storage/' . $post->gambar) : 'https://via.placeholder.com/800x400?text=No+Image' }}" 
                                     alt="{{ $post->judul }}" 
                                     class="h-48 w-full object-cover rounded-lg">
                            </a>
                            
                            <div class="flex flex-col flex-grow">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm font-semibold text-sekolah-biru">
                                        {{ $post->kategori ?? 'Kegiatan' }}
                                    </span>
                                    <span class="text-sm text-gray-500">
                                        {{ optional($post->tanggal_dipublikasikan)->translatedFormat('d F Y') ?? '-' }}
                                    </span>
                                </div>
                                
                                <h2 class="text-xl font-semibold text-gray-900 mb-3 font-montserrat">
                                    <a href="{{ route('berita.show', $post->slug) }}" class="hover:text-sekolah-biru">
                                        {{ $post->judul }}
                                    </a>
                                </h2>
                                
                                <p class="text-gray-600 text-sm mb-4 flex-grow">
                                    {!! Str::limit(strip_tags($post->isi), 150) !!}
                                </p>
                                
                                <div class="mt-auto">
                                    <a href="{{ route('berita.show', $post->slug) }}" class="font-semibold text-sekolah-biru hover:text-sekolah-biru-tua transition duration-150">
                                        Baca Selengkapnya &rarr;
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white rounded-xl shadow-lg p-8 text-center text-gray-500">
                            <p>Belum ada berita yang dipublikasikan.</p>
                        </div>
                    @endforelse
                </div>
                
                <div class="mt-16">
                    {{ $posts->links() }}
                </div>
            </div>
            
        </div>
    </div>

@endsection