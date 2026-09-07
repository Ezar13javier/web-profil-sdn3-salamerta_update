@props(['active'])

@php
// Ini adalah style baru untuk SIDEBAR
$classes = ($active ?? false)
            // Style jika Aktif: Latar biru muda, teks biru tua
            ? 'flex items-center w-full px-3 py-2 rounded-md text-sm font-medium bg-blue-100 text-sekolah-biru-tua'
            // Style jika Tidak Aktif: Teks abu-abu
            : 'flex items-center w-full px-3 py-2 rounded-md text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-900';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>