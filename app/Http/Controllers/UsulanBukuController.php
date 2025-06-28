<?php

namespace App\Http\Controllers;

use App\Models\UsulanBuku;
use Illuminate\Http\Request;

class UsulanBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usulan = UsulanBuku::latest()->paginate(10);
        return view('admin.usulan_buku.index', compact('usulan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'verifikasi' => 'required|in:pending,diterima,ditolak',
        ]);

        $usulan = UsulanBuku::findOrFail($id);
        $usulan->update(['verifikasi' => $request->verifikasi]);

        return back()->with('success', 'Status usulan diperbarui.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.layanan.usulan.from');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pengusul' => 'required',
            'status' => 'required|in:mahasiswa,dosen',
            'judul_buku' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'alasan' => 'required',
        ]);

        UsulanBuku::create($request->all());

        return back()->with('success', 'Usulan buku berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show(UsulanBuku $usulanBuku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UsulanBuku $usulanBuku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UsulanBuku $usulanBuku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UsulanBuku $usulanBuku)
    {
        //
    }
}
