<?php

namespace App\Http\Controllers;

use App\Models\bebas_pustaka;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BebasPustakaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        return view('home.layanan.pustaka.from');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:bebas_pustakas,nim',
            'prodi' => 'required',
            'email' => 'required|email',
            'kontak' => 'required',
            'file' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('bebaspustaka_files', 'public');
        }

        bebas_pustaka::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'prodi' => $request->prodi,
            'email' => $request->email,
            'kontak' => $request->kontak,
            'file_path' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Pengajuan Bebas Pustaka berhasil dikirim.');
    }

    public function index()
    {
        $request = bebas_pustaka::latest()->paginate(10);
        return view('home.layanan.pustaka.from', compact('request'));
    }

    public function updateStatus(Request $request, $id)
    {
        $requestData = bebas_pustaka::findOrFail($id);
        $requestData->status = $request->status;
        $requestData->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }


    /**
     * Display the specified resource.
     */
    public function show(bebas_pustaka $bebas_pustaka)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bebas_pustaka $bebas_pustaka)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bebas_pustaka $bebas_pustaka)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bebas_pustaka $bebas_pustaka)
    {
        //
    }
}
