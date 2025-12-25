<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Verifikasi extends Model
{
    // Nama tabel sesuai migration yang kita buat sebelumnya
    protected $table = 'verifikasi'; 

    // Mengizinkan pengisian massal untuk semua kolom [cite: 4]
    protected $guarded = []; 

    /**
     * Relasi ke Kartu Kendali (Kebalikan dari hasOne)
     */
    public function kartuKendali(): BelongsTo
    {
        return $this->belongsTo(KartuKendali::class, 'kartu_kendali_id');
    }

    /**
     * Relasi ke Admin yang menyetujui pekerjaan (Organik BPS) 
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}