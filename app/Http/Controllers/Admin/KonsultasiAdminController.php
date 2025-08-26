<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Konsultasi;

class KonsultasiAdminController extends Controller
{
    public function index()
    {
        $konsultasis = Konsultasi::latest()->paginate(5);
        return view('admin.layanan.consultasion.index', compact('konsultasis'));
    }

    // Tampilkan data konsultasi tunggal (untuk view/edit via fetch)
    public function show($id)
    {
        $konsultasis = Konsultasi::findOrFail($id);
        return response()->json($konsultasis);
    }

    // Simpan konsultasi baru (jika admin ingin create)
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim_nidn' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'topik_konsultasi' => 'required|string|max:255',
            'pesan' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
            'status' => 'nullable|in:pending,diproses,selesai,ditolak',
            'catatan_admin' => 'nullable|string',
        ]);

        Konsultasi::create($request->all());

        return redirect()->back()->with('success', 'Data konsultasi berhasil ditambahkan.');
    }

    // Update konsultasi
    public function update(Request $request, $id)
    {
        $konsultasis = Konsultasi::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'nim_nidn' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'topik_konsultasi' => 'required|string|max:255',
            'pesan' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
            'status' => 'required|in:pending,diproses,selesai,ditolak',
            'catatan_admin' => 'nullable|string',
        ]);

        $konsultasis->update($request->all());

        return redirect()->back()->with('success', 'Data konsultasi berhasil diupdate.');
    }

    // Hapus konsultasi
    public function destroy($id)
    {
        $konsultasis = Konsultasi::findOrFail($id);
        $konsultasis->delete();

        return redirect()->back()->with('success', 'Data konsultasi berhasil dihapus.');
    }
}
