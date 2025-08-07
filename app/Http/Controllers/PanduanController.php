<?php

namespace App\Http\Controllers;

use App\Models\PanduanPerpustakaan;
use Illuminate\Http\Request;


class PanduanController extends Controller
{
    public function index()
    {
        $panduan = PanduanPerpustakaan::orderBy('created_at', 'desc')->get();

        return view('home.dokumen.panduan.index', compact('panduan'));
    }


    public function show($id)
    {
        $panduan = PanduanPerpustakaan::findOrFail($id);

        // Optional: Log access or track clicks
        // You can add analytics here if needed

        return redirect($panduan->link);
    }
}
