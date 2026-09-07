@extends('layouts.main')

@section('content')

    <div class="bg-gradient-to-br from-sekolah-biru-muda via-sekolah-biru to-sekolah-biru-tua py-16">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-white font-montserrat">
                Galeri
            </h1>
            <p class="mt-2 text-lg text-blue-100">
                Dokumentasi kegiatan dan momen berharga di sekolah.
            </p>
        </div>
    </div>

    <div class="py-16 md:py-24">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-lg p-8 md:p-12">
                <h2 class="text-3xl font-bold text-center text-sekolah-biru-tua font-montserrat mb-10">
                    Galeri Foto
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    
                    @forelse ($galeris as $galeri)
                        <div class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden group">
                            <a href="{{ $galeri->path_gambar ? asset('storage/' . $galeri->path_gambar) : 'https://via.placeholder.com/400x400?text=No+Image' }}" 
                               data-fancybox="galeri" 
                               data-caption="{{ $galeri->judul }}">
                                <img src="{{ $galeri->path_gambar ? asset('storage/' . $galeri->path_gambar) : 'https://via.placeholder.com/400x400?text=No+Image' }}" 
                                     alt="{{ $galeri->judul }}" 
                                     class="w-full h-48 object-cover transition duration-300 transform group-hover:scale-110">
                            </a>
                            <div class="p-4">
                                <h3 class="text-sm font-semibold text-gray-800 truncate" title="{{ $galeri->judul }}">
                                    {{ $galeri->judul }}
                                </h3>
                                <p class="text-xs text-gray-500">
                                    {{ $galeri->kategori ?? 'Kegiatan' }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center text-gray-500 py-10">
                            <p>Belum ada foto yang di-upload ke galeri.</p>
                        </div>
                    @endforelse

                </div>
                
                <div class="mt-16">
                    {{ $galeris->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection