<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ItemLayanan extends Model
{
    protected $table = 'item_layanan';
    protected $guarded = [];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriLayanan::class, 'kategori_id');
    }

    public function perencanaans(): HasMany
    {
        return $this->hasMany(Perencanaan::class, 'item_id');
    }
}