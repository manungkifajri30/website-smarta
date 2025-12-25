<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class KartuKendali extends Model
{
    protected $table = 'kartu_kendali';
    protected $guarded = [];

    public function perencanaan(): BelongsTo
    {
        return $this->belongsTo(Perencanaan::class, 'perencanaan_id');
    }

    public function pekerja(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pekerja_id');
    }

    public function verifikasi(): HasOne
    {
        return $this->hasOne(Verifikasi::class, 'kartu_kendali_id');
    }
}