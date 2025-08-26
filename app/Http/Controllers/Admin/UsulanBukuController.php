<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UsulanBuku;
use Illuminate\Http\Request;

class UsulanBukuController extends Controller
{
    public function index()
    {
        $usulans = UsulanBuku::latest()->paginate(5);
        return view('admin.layanan.suggestions.index', compact('usulans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pengusul' => 'required|string|max:255',
            'status' => 'required|in:mahasiswa,dosen',
            'judul_buku' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'alasan' => 'required|string',
        ]);

        UsulanBuku::create($request->all());

        return redirect()->back()->with('success', 'Usulan buku berhasil ditambahkan.');
    }

    public function show(UsulanBuku $usulanBuku)
    {
        return response()->json($usulanBuku);
    }

    public function update(Request $request, $id)
    {
        $usulan = UsulanBuku::findOrFail($id);

        $request->validate([
            'nama_pengusul' => 'required|string|max:255',
            'status' => 'required|in:mahasiswa,dosen',
            'judul_buku' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'alasan' => 'required|string',
            'verifikasi' => 'required|in:pending,diterima,ditolak',
        ]);

        $usulan->update($request->all());

        return redirect()->back()->with('success', 'Usulan buku berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $usulan = UsulanBuku::findOrFail($id);
        $usulan->delete();

        return redirect()->back()->with('success', 'Usulan buku berhasil dihapus.');
    }
}
