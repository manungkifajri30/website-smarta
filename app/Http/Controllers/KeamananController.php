<?php

namespace App\Http\Controllers;

use App\Models\LaporanKeamanan;
use Illuminate\Http\Request;

class KeamananController extends Controller
{
    public function store(Request $request)
    {
        LaporanKeamanan::create([
            'satpam_id' => auth()->id(),
            'pelapor' => $request->pelapor,
            'nama_kejadian' => $request->nama_kejadian,
            'waktu_kejadian' => $request->waktu_kejadian,
            'permasalahan' => $request->permasalahan,
            'penanganan' => $request->penanganan,
            'catatan' => $request->catatan,
        ]);

        return redirect()->back()->with('success', 'Laporan keamanan berhasil disimpan.');
    }
}