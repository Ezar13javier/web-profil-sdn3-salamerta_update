<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('judul'); // Kolom untuk Judul Berita
        $table->string('slug')->unique(); // Kolom untuk URL unik (penting untuk SEO)
        $table->text('isi'); // Kolom untuk isi artikel (bisa panjang)
        $table->string('gambar')->nullable(); // Kolom untuk path gambar (nullable = boleh kosong)
        $table->timestamp('tanggal_dipublikasikan')->nullable(); // Kapan dipublikasikan
        $table->timestamps(); // Membuat kolom created_at dan updated_at  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
