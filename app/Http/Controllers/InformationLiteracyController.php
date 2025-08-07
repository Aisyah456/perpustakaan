<?php

namespace App\Http\Controllers;

use App\Models\InformationLiteracy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformationLiteracyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = InformationLiteracy::orderBy('tanggal', 'desc')->paginate(10);
        return view('home.layanan.literasi.informasi', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.literasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_pelatihan' => 'required|string|max:255',
            'deskripsi' => 'required',
            'narasumber' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'link_pendaftaran' => 'nullable|url',
            'poster' => 'nullable|image|max:2048',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $data = $request->all();

        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('poster-literasi', 'public');
        }

        InformationLiteracy::create($data);

        return redirect()->route('literasi.index')->with('success', 'Informasi pelatihan berhasil ditambahkan.');
    }
    /**
     * Display the specified resource.
     */
    public function show(InformationLiteracy $informationLiteracy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Form edit data
    public function edit($id)
    {
        $data = InformationLiteracy::findOrFail($id);
        return view('admin.literasi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Simpan perubahan data
    // Simpan perubahan data
    public function update(Request $request, $id)
    {
        $data = InformationLiteracy::findOrFail($id);

        $request->validate([
            'judul_pelatihan' => 'required|string|max:255',
            'deskripsi' => 'required',
            'narasumber' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'link_pendaftaran' => 'nullable|url',
            'poster' => 'nullable|image|max:2048',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $updateData = $request->all();

        if ($request->hasFile('poster')) {
            // Hapus poster lama jika ada
            if ($data->poster) {
                Storage::disk('public')->delete($data->poster);
            }
            $data['poster'] = $request->file('poster')->store('poster-literasi', 'public');
        }

        $data->update($updateData);

        return redirect()->route('literasi.index')->with('success', 'Informasi pelatihan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Hapus data
    public function destroy($id)
    {
        $data = InformationLiteracy::findOrFail($id);
        if ($data->poster) {
            Storage::disk('public')->delete($data->poster);
        }
        $data->delete();

        return redirect()->route('literasi.index')->with('success', 'Informasi pelatihan berhasil dihapus.');
    }
}
