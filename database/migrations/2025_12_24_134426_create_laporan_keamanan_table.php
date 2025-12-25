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
        Schema::create('laporan_keamanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('satpam_id')->constrained('users');
            $table->string('pelapor');
            $table->string('nama_kejadian');
            $table->dateTime('waktu_kejadian');
            $table->text('permasalahan');
            $table->text('penanganan');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_keamanan');
    }
};
