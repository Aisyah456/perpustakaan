<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pustaka;

class PustakaController extends Controller
{
    public function index()
    {
        $pustakas = Pustaka::paginate(10);
        return view('admin.pustaka.index', compact('pustakas'));
    }

    public function create()
    {
        return view('admin.pustaka.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:pustakas,nim',
            'jurusan' => 'required',
            'tanggal_permohonan' => 'required|date',
            'status' => 'required|in:pending,disetujui,ditolak'
        ]);

        Pustaka::create($request->all());
        return redirect()->route('pustaka.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Pustaka $pustaka)
    {
        return view('admin.pustaka.edit', compact('pustaka'));
    }

    public function update(Request $request, Pustaka $pustaka)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:pustakas,nim,' . $pustaka->id,
            'jurusan' => 'required',
            'tanggal_permohonan' => 'required|date',
            'status' => 'required|in:pending,disetujui,ditolak'
        ]);

        $pustaka->update($request->all());
        return redirect()->route('pustaka.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Pustaka $pustaka)
    {
        $pustaka->delete();
        return redirect()->route('pustaka.index')->with('success', 'Data berhasil dihapus');
    }
}
