@extends('layouts.main')

@section('content')

    <div class="bg-gradient-to-br from-sekolah-biru-muda via-sekolah-biru to-sekolah-biru-tua py-16">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-white font-montserrat">
                Kontak Kami
            </h1>
            <p class="mt-2 text-lg text-blue-100">
                Hubungi SD Negeri 3 Salamerta untuk informasi lebih lanjut.
            </p>
        </div>
    </div>

    <div class="py-16 md:py-24">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-lg p-8 md:p-12">

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    
                    <div class="bg-slate-50 border border-slate-200 rounded-lg p-6">
                        <svg class="h-10 w-10 text-sekolah-biru mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Alamat</h3>
                        <p class="text-sm text-gray-600">
                            {{ $pengaturans['alamat_sekolah'] ?? 'Alamat belum diatur...' }}
                        </p>
                    </div>
                    
                    <div class="bg-slate-50 border border-slate-200 rounded-lg p-6">
                        <svg class="h-10 w-10 text-sekolah-biru mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-2.63C14.505 15.06 13.495 13.99 11.935 12.43c-1.56-1.56-2.63-2.57-3.99-3.99l1.293-.97c.362-.271.527-.734.417-1.173L9.352 3.103c-.125-.5-.675-.852-1.091-.852H6.75A2.25 2.25 0 004.5 4.5v2.25z" /></svg>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Telepon</h3>
                        <p class="text-sm text-gray-600">
                            {{ $pengaturans['telepon_sekolah'] ?? 'Telepon belum diatur...' }}
                        </p>
                    </div>

                    <div class="bg-slate-50 border border-slate-200 rounded-lg p-6">
                        <svg class="h-10 w-10 text-sekolah-biru mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" /></svg>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Email</h3>
                        <p class="text-sm text-gray-600">
                            {{ $pengaturans['email_sekolah'] ?? 'Email belum diatur...' }}
                        </p>
                    </div>

                    <div class="bg-slate-50 border border-slate-200 rounded-lg p-6">
                        <svg class="h-10 w-10 text-sekolah-biru mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Jam Operasional</h3>
                        <p class="text-sm text-gray-600">
                            Senin - Jumat: 07:00 - 14:00
                            <br>
                            Sabtu: 07:00 - 11:00
                        </p>
                    </div>
                </div>

                <div class="mt-12 border-t pt-10">
                    <h2 class="text-3xl font-bold text-center text-sekolah-biru-tua font-montserrat mb-8">
                        Lokasi Kami
                    </h2>
                    
                    @if (!empty($pengaturans['google_maps_link']))
                        <div class="w-full h-96 rounded-lg shadow-lg overflow-hidden border">
                            <iframe
                                src="{{ $pengaturans['google_maps_link'] }}"
                                width="100%" height="100%" style="border:0;"
                                allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    @else
                        <div class="w-full h-96 rounded-lg shadow-lg bg-gray-200 flex items-center justify-center">
                            <p class="text-gray-500">Peta lokasi belum diatur.</p>
                        </div>
                    @endif
                </div>

                <div class="mt-12 border-t pt-10">
                    <h2 class="text-3xl font-bold text-center text-sekolah-biru-tua font-montserrat mb-8">
                        Link Berguna
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-w-2xl mx-auto">
                        <a href="{{ $pengaturans['link_kemdikbud_nisn'] ?? '#' }}" target="_blank" class="flex justify-between items-center bg-slate-50 border border-slate-200 rounded-lg p-4 hover:bg-slate-100">
                            <span>Cek NISN Kemdikbud</span>
                            <span>&rarr;</span>
                        </a>
                        <a href="#" target="_blank" class="flex justify-between items-center bg-slate-50 border border-slate-200 rounded-lg p-4 hover:bg-slate-100">
                            <span>Data Pokok Pendidikan</span>
                            <span>&rarr;</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection