<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LaporanKeamanan extends Model
{
    protected $table = 'laporan_keamanan';
    protected $guarded = [];

    public function satpam(): BelongsTo
    {
        return $this->belongsTo(User::class, 'satpam_id');
    }
}