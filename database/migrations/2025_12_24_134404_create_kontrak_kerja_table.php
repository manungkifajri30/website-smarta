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
        Schema::create('kontrak_kerja', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perencanaan_id')->constrained('perencanaan')->onDelete('cascade');
            $table->string('nomor_kontrak'); // Untuk nomor surat
            $table->decimal('nilai_kontrak', 15, 2); // Contoh: 5000000.00
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');

            // Data Pihak Ke-3 untuk PKS
            $table->string('pihak_kedua');
            $table->string('nama_pimpinan');
            $table->string('jabatan_pimpinan');

            // Data Konten untuk KAK
            $table->text('latar_belakang')->nullable();
            $table->text('tujuan_pekerjaan')->nullable();
            $table->text('ruang_lingkup')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontrak_kerja');
    }
};
