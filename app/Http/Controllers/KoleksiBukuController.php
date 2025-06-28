<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KoleksiBukuController extends Controller
{
    public function index(Request $request)
    {
        $query = Buku::query();

        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%')
                ->orWhere('penulis', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('kategori')) {
            $query->where('kategori_id', $request->kategori);
        }

        $bukus = $query->paginate(9); // Panggil hasil query ke variabel $bukus
        $kategoris = Kategori::all(); // Ambil semua kategori

        return view('home.koleksi.buku.index', compact('bukus', 'kategoris'));
    }

    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        return view('home.koleksi.buku.detail-buku', compact('buku'));
    }
}
