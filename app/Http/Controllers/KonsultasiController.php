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
            'email' => 'required|email',
            'topik_konsultasi' => 'required|string|max:200',
            'pesan' => 'required|string',
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
