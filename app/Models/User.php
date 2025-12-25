<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Tambahkan 'role' ke dalam fillable agar bisa diisi
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Penting untuk Admin, Pekerja, Pegawai, Satpam 
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relasi sesuai fitur yang diminta
    public function perencanaans(): HasMany {
        return $this->hasMany(Perencanaan::class, 'admin_id');
    }

    public function kartuKendalis(): HasMany {
        return $this->hasMany(KartuKendali::class, 'pekerja_id');
    }

    public function laporanKeamanans(): HasMany {
        return $this->hasMany(LaporanKeamanan::class, 'satpam_id');
    }
}