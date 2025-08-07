<?php

namespace App\Http\Controllers;

use App\Models\LibraryFree;
use App\Models\Faculty;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LibraryFreeController extends Controller
{
    // Tampilkan data pemohon bebas pustaka (admin)
    public function index()
    {
        $faculties = Faculty::all();
        $majors = Major::all();

        return view('home.library_free.index', compact('faculties', 'majors'));
    }

    // Form pengajuan bebas pustaka (user/mahasiswa)
    public function create()
    {
        $faculties = Faculty::all();
        $majors = Major::all();

        return view('home.library_free.create', compact('faculties', 'majors'));
    }

    // Simpan data pengajuan
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50|unique:library_free_teble,nim',
            'faculty_id' => 'required|exists:faculties,id',
            'major_id' => 'required|exists:majors,id',
            'no_hp' => 'required|string|max:20',
            'email' => 'required|email',
            'jenjang' => 'required|in:D3,S1,S2',
            'keperluan' => 'required|in:Wisuda,Yudisium,Lainnya',
            'tahun_masuk' => 'required|digits:4',
            'tahun_lulus' => 'required|digits:4',
            'file_karya_ilmiah' => 'required|mimes:pdf|max:5120',
            'scan_ktm' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
            'bukti_upload' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $file_karya_ilmiah = $request->file('file_karya_ilmiah')->store('bebas_pustaka/karya_ilmiah');
        $scan_ktm = $request->file('scan_ktm')->store('bebas_pustaka/scan_ktm');
        $bukti_upload = $request->file('bukti_upload')
            ? $request->file('bukti_upload')->store('bebas_pustaka/bukti_upload')
            : null;

        LibraryFree::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'faculty_id' => $request->faculty_id,
            'major_id' => $request->major_id,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'jenjang' => $request->jenjang,
            'keperluan' => $request->keperluan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_lulus' => $request->tahun_lulus,
            'file_karya_ilmiah' => $file_karya_ilmiah,
            'scan_ktm' => $scan_ktm,
            'bukti_upload' => $bukti_upload,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Permohonan Bebas Pustaka berhasil dikirim.');
    }

    // Hapus data (admin)
    public function destroy(LibraryFree $libraryFree)
    {
        Storage::delete([
            $libraryFree->file_karya_ilmiah,
            $libraryFree->scan_ktm,
            $libraryFree->bukti_upload,
        ]);

        $libraryFree->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }

    // Update status pengajuan
    public function updateStatus(LibraryFree $libraryFree, $status)
    {
        if (!in_array($status, ['pending', 'disetujui', 'ditolak'])) {
            return redirect()->back()->with('error', 'Status tidak valid.');
        }

        $libraryFree->update(['status' => $status]);

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
}
