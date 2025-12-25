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
        Schema::create('perencanaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('item_layanan');
            $table->foreignId('admin_id')->constrained('users'); // Admin Umum
            $table->string('dokumen_kak')->nullable(); // Path file KAK
            $table->enum('status', ['rencana', 'proses', 'selesai'])->default('rencana');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perencanaan');
    }
};
