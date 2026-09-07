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
    Schema::create('gurus', function (Blueprint $table) {
        $table->id();
        $table->string('nama'); // Nama lengkap
        $table->string('nip')->nullable()->unique(); // NIP (boleh kosong dan harus unik)
        $table->string('posisi'); // Jabatan (Kepala Sekolah, Guru Kelas)
        $table->string('foto')->nullable(); // Path ke foto
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};
