<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $pengaturans['nama_sekolah'] ?? config('app.name', 'Laravel') }} - SD Negeri 3 Salamerta</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-poppins bg-slate-50 antialiased min-h-screen flex flex-col">

    <header x-data="{ open: false }" class="bg-white shadow-md sticky top-0 z-50">
        <nav class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <img class="h-12 w-auto" src="{{ asset('images/LOGO UMP BW.png') }}" alt="Logo SDN 3 Salamerta">
                        <span class="font-bold text-lg text-sekolah-biru-tua block">
                            SDN 3 Salamerta
                        </span>
                    </a>
                </div>

                <div class="hidden md:flex md:items-center md:space-x-6">
                    @php
                        // Array ini sudah kita perbaiki (termasuk 'kontak')
                        $navLinks = [
                            'home' => 'Beranda',
                            'profil' => 'Profil',
                            'guru.staf' => 'Guru & Staf',
                            'akademik' => 'Akademik',
                            'berita.index' => 'Berita',
                            'galeri' => 'Galeri',
                            'ppdb' => 'PPDB',
                            'kontak' => 'Kontak',
                        ];
                    @endphp

                    @foreach ($navLinks as $route => $label)
                        <a href="{{ route($route) }}" 
                           class="text-gray-700 hover:text-sekolah-biru px-1 py-2 text-sm font-medium border-b-2
                                  {{ request()->routeIs($route.'*') ? 'border-sekolah-biru text-sekolah-biru' : 'border-transparent' }}
                                  transition duration-150">
                           {{ $label }}
                        </a>
                    @endforeach
                </div>

                <div class="-mr-2 flex md:hidden">
                    <button @click="open = !open" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-sekolah-biru focus:outline-none focus:ring-2 focus:ring-inset focus:ring-sekolah-biru" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Buka menu</span>
                        <svg x-show="!open" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                        <svg x-show="open" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>
            </div>

            <div x-show="open" @click.away="open = false" class="md:hidden" id="mobile-menu" x-transition>
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    @foreach ($navLinks as $route => $label)
                        <a href="{{ route($route) }}" 
                           class="block px-3 py-2 rounded-md text-base font-medium
                                  {{ request()->routeIs($route.'*') ? 'bg-blue-50 text-sekolah-biru-tua' : 'text-gray-700 hover:bg-gray-50 hover:text-sekolah-biru' }}">
                           {{ $label }}
                        </a>
                    @endforeach
                    
                    @guest
                        <a href="{{ route('login') }}" class="block w-full text-left px-3 py-2 rounded-md text-base font-medium bg-sekolah-biru text-white hover:bg-sekolah-biru-tua">
                            Login
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="block w-full text-left px-3 py-2 rounded-md text-base font-medium bg-gray-700 text-white hover:bg-gray-800">
                            Dashboard
                        </a>
                    @endguest
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-gradient-to-r from-sekolah-biru to-sekolah-biru-tua text-white">
        <div class="border-t border-blue-800 opacity-20"></div>
        <div class="container mx-auto max-w-7xl py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-9">
                
                <div>
                    <h3 class="text-lg font-semibold font-montserrat">Kontak Kami</h3>
                    <p class="mt-4 text-sm text-white-300 leading-relaxed">
                        {{ $pengaturans['alamat_sekolah'] ?? 'Alamat belum diatur' }}
                    </p>
                    <p class="mt-3 text-sm text-white-300">
                        Email: {{ $pengaturans['email_sekolah'] ?? 'Email belum diatur' }}
                    </p>
                    <p class="mt-1 text-sm text-white-300">
                        Telepon: {{ $pengaturans['telepon_sekolah'] ?? 'Telepon belum diatur' }}
                    </p>
                </div>

                <div class="md:text-center">
                    <h3 class="text-lg font-semibold font-montserrat">Link Cepat</h3>
                    <ul class="mt-4 space-y-2 text-sm md:inline-block md:text-left">
                        <li><a href="{{ route('profil') }}" class="text-white-300 hover:underline text-white">Profil Sekolah</a></li>
                        <li><a href="{{ route('akademik') }}" class="text-white-300 hover:underline text-white">Akademik</a></li>
                        <li><a href="{{ route('berita.index') }}" class="text-white-300 hover:underline text-white">Berita Terbaru</a></li>
                        <li><a href="{{ route('galeri') }}" class="text-white-300 hover:underline text-white ">Galeri Kegiatan</a></li>
                        <li><a href="{{ route('ppdb') }}" class="text-white-300 hover:underline text-white">Info PPDB</a></li>
                        <li><a href="{{ $pengaturans['link_kemdikbud_nisn'] ?? '#' }}" target="_blank" class="text-white-300 hover:underline text-white">Cek NISN</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold font-montserrat">Ikuti Kami</h3>
                    <p class="mt-4 text-sm text-white-300">
                        Dapatkan informasi terbaru melalui media sosial kami.
                    </p>
                    <div class="flex space-x-4 mt-4">
                        @if (!empty($pengaturans['link_facebook']))
                            <a href="{{ $pengaturans['link_facebook'] }}" target="_blank" class="text-white-300 hover:text-white">
                                <span class="sr-only">Facebook</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                            </a>
                        @endif
                        @if (!empty($pengaturans['link_instagram']))
                            <a href="{{ $pengaturans['link_instagram'] }}" target="_blank" class="text-white-300 hover:text-white">
                                <span class="sr-only">Instagram</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.024.06 1.378.06 3.808s-.012 2.784-.06 3.808c-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.024.048-1.378.06-3.808.06s-2.784-.012-3.808-.06c-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.048-1.024-.06-1.378-.06-3.808s.012-2.784.06-3.808c.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.47 2.525c.636-.247 1.363-.416 2.427-.465C8.93 2.013 9.284 2 12.315 2zM12 7a5 5 0 100 10 5 5 0 000-10zm0 8a3 3 0 110-6 3 3 0 010 6zm5.75-10.5a1.25 1.25 0 100-2.5 1.25 1.25 0 000 2.5z" clip-rule="evenodd" /></svg>
                            </a>
                        @endif
                        @if (!empty($pengaturans['link_youtube']))
                             <a href="{{ $pengaturans['link_youtube'] }}" target="_blank" class="text-white-300 hover:text-white">
                                <span class="sr-only">YouTube</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.506 2.506 0 01-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.506 2.506 0 01-1.768-1.768C2 15.255 2 12 2 12s0-3.255.418-4.814a2.506 2.506 0 011.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418zM9.999 15v-6l5.197 3-5.197 3z" clip-rule="evenodd" /></svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="mt-8 border-t border-blue-800 opacity-20 "></div>
            <div class="mt-8 pt-6 text-center">
                <p class="text-sm text-white-300">
                    &copy; {{ date('Y') }} SD Negeri 3 Salamerta. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

</body>
</html>