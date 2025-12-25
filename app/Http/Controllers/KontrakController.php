<?php

namespace App\Http\Controllers;

use App\Models\KontrakKerja;
use Illuminate\Http\Request;

class KontrakController extends Controller
{
    public function store(Request $request)
    {
        KontrakKerja::create([
            'perencanaan_id' => $request->perencanaan_id,
            'nomor_kontrak' => $request->nomor_kontrak,
            'nilai_kontrak' => $request->nilai_kontrak,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'pihak_kedua' => $request->pihak_kedua,
            'latar_belakang' => $request->latar_belakang,
        ]);

        return redirect()->back()->with('success', 'Kontrak Kerja berhasil disimpan.');
    }
}