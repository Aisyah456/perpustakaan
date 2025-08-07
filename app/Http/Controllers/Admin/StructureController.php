<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class StructureController extends Controller
{
    public function index()
    {
        $structures = Structure::with('parent')->get();
        return view('admin.konten.index', compact('structures'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'nullable|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'parent_id' => 'nullable|exists:struktur_organisasi,id',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('struktur', 'public');
        }

        Structure::create($data);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, Structure $structure)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'nullable|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'parent_id' => 'nullable|exists:struktur_organisasi,id',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($structure->foto && Storage::disk('public')->exists($structure->foto)) {
                Storage::disk('public')->delete($structure->foto);
            }
            $data['foto'] = $request->file('foto')->store('struktur', 'public');
        }

        $structure->update($data);

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Structure $structure)
    {
        if ($structure->foto && Storage::disk('public')->exists($structure->foto)) {
            Storage::disk('public')->delete($structure->foto);
        }

        $structure->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
