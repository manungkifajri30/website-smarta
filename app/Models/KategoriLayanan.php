<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriLayanan extends Model
{
    protected $table = 'kategori_layanan';
    protected $guarded = [];

    public function items(): HasMany
    {
        return $this->hasMany(ItemLayanan::class, 'kategori_id');
    }
}