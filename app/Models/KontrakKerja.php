<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KontrakKerja extends Model
{
    protected $table = 'kontrak_kerja';
    protected $guarded = [];

    public function perencanaan(): BelongsTo
    {
        return $this->belongsTo(Perencanaan::class, 'perencanaan_id');
    }
}