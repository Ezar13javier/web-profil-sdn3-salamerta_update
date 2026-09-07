<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Pengaturan; 
use Illuminate\Support\Facades\View; 

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);

        // 3. TAMBAHKAN BLOK INI
        try {
            // Ambil data dari 'Pengaturan'
            // dan bagikan secara global sebagai variabel '$settings'
            $pengaturans = Pengaturan::pluck('value', 'key'); 

            // Bagikan sebagai '$settings' untuk konsistensi di file publik
            View::share('pengaturans', $pengaturans); 

        } catch (\Exception $e) {
            // Mencegah error saat migrasi
        }
    }
}