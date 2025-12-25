<?php

namespace App\Http\Controllers;

use App\Models\Perencanaan;
use App\Models\ItemLayanan;
use Illuminate\Http\Request;

class PerencanaanController extends Controller
{
    public function create()
    {
        $items = ItemLayanan::all();
        return view('admin.perencanaan.create', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate(['dokumen_kak' => 'nullable|mimes:pdf|max:2048']);
        
        $path = $request->file('dokumen_kak') ? $request->file('dokumen_kak')->store('kak', 'public') : null;

        Perencanaan::create([
            'item_id' => $request->item_id,
            'admin_id' => auth()->id(),
            'dokumen_kak' => $path,
            'status' => 'rencana'
        ]);

        return redirect()->back()->with('success', 'Perencanaan berhasil dibuat.');
    }
}