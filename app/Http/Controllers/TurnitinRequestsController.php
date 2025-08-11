<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Faculty;
use App\Models\Program;
use Illuminate\Http\Request;
use App\Models\turnitin_requests;
use Illuminate\Support\Facades\Storage;

class TurnitinRequestsController extends Controller
{
    public function create()
    {
        $faculties = Faculty::all();
        $majors = Major::all();

        return view('home.turnitin.from', compact('faculties', 'majors'));
    }


    public function getMajors($faculty_id)
    {
        $majors = Program::where('faculty_id', $faculty_id)->pluck('nama_prodi', 'id');
        return response()->json($majors);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'nim_nidn' => 'required|string',
            'email' => 'required|email',
            'faculty_id' => 'required|exists:faculties,id',
            'program_id' => 'required|exists:majors,id',
            'judul_naskah' => 'required|string',
            'jenis_dokumen' => 'required|in:Skripsi,Tesis,Artikel,Lainnya',
            'catatan_pengguna' => 'nullable|string',
            'file' => 'required|mimes:pdf,doc,docx|max:20480', // 20MB
        ]);

        $filePath = $request->file('file')->store('turnitin', 'public');

        turnitin_requests::create([
            'nama' => $request->nama,
            'nim_nidn' => $request->nim_nidn,
            'email' => $request->email,
            'faculty_id' => $request->faculty_id,
            'program_id' => $request->program_id,
            'judul_naskah' => $request->judul_naskah,
            'jenis_dokumen' => $request->jenis_dokumen,
            'catatan_pengguna' => $request->catatan_pengguna,
            'file_path' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Permohonan Turnitin berhasil dikirim.');
    }
}
