<?php

namespace App\Http\Controllers;

use App\Models\LiterasiRequest;
use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\Major;


class LiterasiRequestController extends Controller
{
    public function create()
    {
        $majors = Major::all();
        $faculties = Faculty::all(); // Ambil semua data fakultas

        return view('home.layanan.literasi.index', compact('faculties', 'majors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_peserta' => 'required|string|max:255',
            'nim_nip' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'faculty_id' => 'required|exists:faculties,id',
            'program_id' => 'required|exists:majors,id',
            'instansi' => 'nullable|string|max:255',
            'jenis_pelatihan' => 'required|in:Literasi Informasi,E-Resources,Turnitin,Manajemen Referensi',
            'tanggal_pelatihan' => 'required|date',
            'catatan' => 'nullable|string',
        ]);

        LiterasiRequest::create($request->all());

        return redirect()->back()->with('success', 'Pendaftaran berhasil dikirim!');
    }
}
