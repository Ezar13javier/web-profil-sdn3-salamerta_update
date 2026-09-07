@extends('layouts.main')

@section('content')

    <div class="bg-gradient-to-br from-sekolah-biru-muda via-sekolah-biru to-sekolah-biru-tua py-16">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-white font-montserrat">
                Guru & Staf
            </h1>
            <p class="mt-2 text-lg text-blue-100">
                Tim pendidik dan tenaga kependidikan SD Negeri 3 Salamerta.
            </p>
        </div>
    </div>

    <div class="py-16 md:py-24">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <h2 class="text-3xl font-bold text-center text-sekolah-biru-tua font-montserrat mb-10">
                Dewan Guru
            </h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                
                @forelse ($guru as $Guru)
                    <div class="bg-white rounded-xl shadow-lg p-6 text-center hover:shadow-xl transition-shadow duration-300">
                        <img src="{{ $Guru->foto ? asset('storage/' . $Guru->foto) : 'https://via.placeholder.com/300x300.png/E0E0E0/AAAAAA?text=Foto' }}" 
                             alt="{{ $Guru->nama }}" 
                             class="h-32 w-32 rounded-full object-cover object-center mx-auto shadow-md mb-4">
                        
                        <h3 class="text-lg font-semibold text-gray-900 mb-1">
                            {{ $Guru->nama }}
                        </h3>
                        <p class="text-sekolah-biru font-medium text-sm mb-1">
                            {{ $Guru->posisi }} </p>
                        <p class="text-gray-500 text-xs">
                            NIP: {{ $Guru->nip ?? '-' }}
                        </p>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-500">
                        Data guru akan segera ditampilkan.
                    </p>
                @endforelse
            </div> <div class="mt-20"> <h2 class="text-3xl font-bold text-center text-sekolah-biru-tua font-montserrat mb-10">
                    Tenaga Kependidikan
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @forelse ($staf as $staff_member)
                        <div class="bg-white rounded-xl shadow-lg p-6 text-center hover:shadow-xl transition-shadow duration-300">
                            <img src="{{ $staff_member->foto ? asset('storage/' . $staff_member->foto) : 'https://via.placeholder.com/300x300.png/E0E0E0/AAAAAA?text=Foto' }}" 
                                 alt="{{ $staff_member->nama }}" 
                                 class="h-32 w-32 rounded-full object-cover object-center mx-auto shadow-md mb-4">
                            
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">
                                {{ $staff_member->nama }}
                            </h3>
                            <p class="text-sekolah-biru font-medium text-sm mb-1">
                                {{ $staff_member->posisi }} </p>
                            <p class="text-gray-500 text-xs">
                                NIP: {{ $staff_member->nip ?? '-' }}
                            </p>
                        </div>
                    @empty
                        <p class="col-span-full text-center text-gray-500">
                            Data tenaga kependidikan akan segera ditampilkan.
                        </p>
                    @endforelse
                </div> </div>

        </div>
    </div>

@endsection