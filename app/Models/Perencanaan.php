<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Perencanaan extends Model
{
    protected $table = 'perencanaan';
    protected $guarded = [];

    public function item(): BelongsTo
    {
        return $this->belongsTo(ItemLayanan::class, 'item_id');
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function kontrak(): HasOne
    {
        return $this->hasOne(KontrakKerja::class, 'perencanaan_id');
    }

    public function kartuKendali(): HasMany
    {
        return $this->hasMany(KartuKendali::class, 'perencanaan_id');
    }
}