<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void {
        Schema::create('ekstrakurikulers', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Cth: "Pramuka"
            $table->text('deskripsi_singkat'); // Cth: "Kegiatan wajib..."
            $table->string('jadwal')->nullable(); // Cth: "Setiap Jumat, 14:00-16:00"
            $table->string('ikon')->nullable(); // Cth: nama ikon/SVG
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('ekstrakurikulers');
    }
};
