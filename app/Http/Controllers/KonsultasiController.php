<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    public function index()
    {
        $konsultasis = Konsultasi::latest()->paginate(10);
        return view('home.layanan.konsultasi.index', compact('konsultasis'));
    }

    public function create()
    {
        return view('home.layanan.konsultasi.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'nim_nidn' => 'required|string|max:30',
            'tahun_masuk' => 'nullable|integer|min:1900|max:2100',
            'fakultas' => 'nullable|string|max:100',
            'program_studi' => 'nullable|string|max:100',
            'no_hp' => 'nullable|string|max:20',
            'email' => 'required|email|max:100',
            'topik_konsultasi' => 'required|string|max:200',
            'pesan' => 'required|string',
            'dosen_pembimbing' => 'nullable|string|max:100',
        ]);

        Konsultasi::create($request->all());

        return redirect()->back()->with('success', 'Permintaan konsultasi berhasil dikirim.');
    }

    public function updateStatus(Request $request, Konsultasi $konsultasi)
    {
        $konsultasi->update(['status' => $request->status]);

        return back()->with('success', 'Status diperbarui.');
    }
}
