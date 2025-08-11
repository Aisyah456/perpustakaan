<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AskLibrarian;

class AskLibrarianController extends Controller
{
    /**
     * Tampilkan form tanya pustakawan
     */
    public function create()
    {
        return view('home.layanan.ask-librarian.index');
    }

    /**
     * Simpan pertanyaan ke database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'       => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'fakultas'   => 'required|string|max:255',
            'prodi'      => 'required|string|max:255',
            'kategori'   => 'required|string|max:255',
            'pertanyaan' => 'required|string',
        ]);

        AskLibrarian::create($validated);

        return redirect()->back()->with('success', 'Pertanyaan Anda berhasil dikirim. Pustakawan akan segera menjawab.');
    }
}
