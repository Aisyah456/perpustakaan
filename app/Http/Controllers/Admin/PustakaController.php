<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Major;
use App\Models\LibraryFree;
use Illuminate\Http\Request;

class PustakaController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $documents = LibraryFree::with(['faculty', 'major'])->latest()->get();
        $faculties = Faculty::all();
        $majors = Major::all();

        return view('admin.pustaka.index', compact('documents', 'faculties', 'majors'));
    }

    // Form edit data
    public function edit($id)
    {
        $document = LibraryFree::findOrFail($id);
        $faculties = Faculty::all();
        $majors = Major::all();

        return view('admin.pustaka.index', compact('document', 'faculties', 'majors'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50|unique:library_frees,nim,' . $id,
            'faculty_id' => 'required|exists:faculties,id',
            'major_id' => 'required|exists:majors,id',
            'jenjang' => 'required|string|max:50',
            'keperluan' => 'required|string|max:255',
            'tahun_masuk' => 'required|numeric',
            'tahun_lulus' => 'required|numeric',
            'status' => 'required|in:pending,disetujui,ditolak'
        ]);

        $document = LibraryFree::findOrFail($id);
        $document->update($request->all());

        return redirect()->route('admin.pustaka.index')->with('success', 'Data berhasil diperbarui');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:library_frees,nim',
            'faculty_id' => 'required|exists:faculties,id',
            'major_id' => 'required|exists:majors,id',
            'no_hp' => 'required',
            'email' => 'required|email',
            'jenjang' => 'required',
            'keperluan' => 'required',
            'tahun_masuk' => 'required|numeric',
            'tahun_lulus' => 'required|numeric',
            'file_karya_ilmiah' => 'required|file|mimes:pdf',
            'scan_ktm' => 'required|file|mimes:pdf,jpg,jpeg,png',
            'bukti_upload' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
        ]);

        // Simpan file
        $validated['file_karya_ilmiah'] = $request->file('file_karya_ilmiah')->store('karya_ilmiah', 'public');
        $validated['scan_ktm'] = $request->file('scan_ktm')->store('ktm', 'public');

        if ($request->hasFile('bukti_upload')) {
            $validated['bukti_upload'] = $request->file('bukti_upload')->store('bukti_upload', 'public');
        }

        $validated['status'] = 'pending'; // default status

        LibraryFree::create($validated);

        return redirect()->route('admin.pustaka.index')->with('success', 'Pengajuan berhasil ditambahkan.');
    }
}
