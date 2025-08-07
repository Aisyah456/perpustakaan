<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Major;
use App\Models\LibraryFree;
use Illuminate\Http\Request;

class PustakaController extends Controller
{
    public function index()
    {
        $documents = LibraryFree::with(['faculty', 'major'])->latest()->get();
        $faculties = Faculty::all();
        $majors = Major::all();

        return view('admin.pustaka.index', compact('documents', 'faculties', 'majors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
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
