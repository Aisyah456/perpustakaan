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
        // Validasi semua input termasuk array buku
        $request->validate([
            'nama_pengusul' => 'required|string',
            'nim' => 'required|string',
            'fakultas' => 'required|string',
            'program_studi' => 'required|string',
            'status' => 'required|in:mahasiswa,dosen',

            'judul_buku' => 'required|array|max:2',
            'judul_buku.*' => 'required|string',
            'pengarang' => 'required|array|max:2',
            'pengarang.*' => 'required|string',
            'penerbit' => 'required|array|max:2',
            'penerbit.*' => 'required|string',
            'tahun_terbit' => 'required|array|max:2',
            'tahun_terbit.*' => 'required|digits:4',
            'alasan' => 'required|array|max:2',
            'alasan.*' => 'required|string',
        ]);

        // Simpan masing-masing usulan buku
        foreach ($request->judul_buku as $index => $judul) {
            UsulanBuku::create([
                'nama_pengusul' => $request->nama_pengusul,
                'nim' => $request->nim,
                'fakultas' => $request->fakultas,
                'program_studi' => $request->program_studi,
                'status' => $request->status,
                'judul_buku' => $judul,
                'pengarang' => $request->pengarang[$index],
                'penerbit' => $request->penerbit[$index],
                'tahun_terbit' => $request->tahun_terbit[$index],
                'alasan' => $request->alasan[$index],
                'verifikasi' => 'pending',
            ]);
        }

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
