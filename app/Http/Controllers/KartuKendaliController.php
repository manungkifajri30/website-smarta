<?php

namespace App\Http\Controllers;

use App\Models\KartuKendali;
use App\Models\Perencanaan;
use Illuminate\Http\Request;

class KartuKendaliController extends Controller
{
    public function create()
    {
        $perencanaans = Perencanaan::with('item')->get();

        return view('kartu-kendali.create', compact('perencanaans'));
    }
    public function store(Request $request)
    {
        $request->validate(['foto_dokumentasi' => 'image|max:2048', 'kwitansi_tagihan' => 'mimes:pdf,jpg,png|max:2048']);
        $request->validate([
            'perencanaan_id' => 'required|exists:perencanaans,id',
            'permasalahan' => 'required|string',
            'penanganan' => 'required|string',
            'tagging_lokasi' => 'nullable|string',
            'foto_dokumentasi' => 'nullable|image|max:2048',
            'kwitansi_tagihan' => 'nullable|mimes:pdf,jpg,png|max:2048',
        ]);

        $foto = $request->file('foto_dokumentasi') ? $request->file('foto_dokumentasi')->store('dokumentasi', 'public') : null;
        $kwitansi = $request->file('kwitansi_tagihan') ? $request->file('kwitansi_tagihan')->store('kwitansi', 'public') : null;

        KartuKendali::create([
            'perencanaan_id' => $request->perencanaan_id,
            'pekerja_id' => $request->user()->id(),
            'waktu_pelaksanaan' => now(),
            'permasalahan' => $request->permasalahan,
            'penanganan' => $request->penanganan,
            'tagging_lokasi' => $request->tagging_lokasi,
            'foto_dokumentasi' => $foto,
            'kwitansi_tagihan' => $kwitansi,
        ]);

        return redirect()->back()->with('success', 'Laporan kartu kendali berhasil dikirim.');
    }
}
