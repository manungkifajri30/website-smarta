<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanRuang;
use Illuminate\Http\Request;

class RuangRapatController extends Controller
{
    public function store(Request $request)
    {
        PeminjamanRuang::create([
            'pegawai_id' => auth()->id(),
            'nama_ruangan' => $request->nama_ruangan,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'booking_konsumsi' => $request->booking_konsumsi,
        ]);

        return redirect()->back()->with('success', 'Ruangan berhasil dipesan.');
    }
}