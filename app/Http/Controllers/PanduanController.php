<?php

namespace App\Http\Controllers;

use App\Models\PanduanPerpustakaan;
use Illuminate\Http\Request;

class PanduanController extends Controller
{
    /**
     * Tampilkan daftar panduan (halaman publik)
     */
    public function index()
    {
        $panduan = PanduanPerpustakaan::latest()->get();
        return view('home.dokumen.panduan.index', compact('panduan'));
    }

    /**
     * Tampilkan detail panduan (langsung redirect ke link panduan)
     */
    public function show($id)
    {
        $panduan = PanduanPerpustakaan::findOrFail($id);

        // Jika link tersedia, redirect ke halaman/link tersebut
        if (!empty($panduan->link)) {
            return redirect()->away($panduan->link);
        }

        // Jika tidak ada link, kembalikan ke daftar panduan dengan pesan error
        return redirect()->route('panduan.index')->with('error', 'Link panduan tidak tersedia.');
    }
}
