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
        Schema::create('kartu_kendali', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perencanaan_id')->constrained('perencanaan');
            $table->foreignId('pekerja_id')->constrained('users'); // Pihak Ke-3
            $table->timestamp('waktu_pelaksanaan');
            $table->text('permasalahan');
            $table->text('penanganan');
            $table->string('foto_dokumentasi')->nullable();
            $table->string('tagging_lokasi')->nullable(); // Koordinat GPS
            $table->string('kwitansi_tagihan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kartu_kendali');
    }
};
