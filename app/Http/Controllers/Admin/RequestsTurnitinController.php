<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Faculty;
// use App\Models\Major;
use App\Models\turnitin_requests;
use Illuminate\Support\Facades\Storage;

class RequestsTurnitinController extends Controller
{

    // public function create()
    // {
    //     $faculties = Faculty::all();
    //     $majors = Major::all();

    //     return view('admin.layanan.facility.index', compact('faculties', 'majors'));
    // }

    public function index()
    {
        $data = turnitin_requests::latest()->paginate(10);
        return view('admin.layanan.facility.index', compact('data'));
    }

    public function create()
    {
        return view('admin.layanan.turnitin.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50',
            'faculty_id' => 'required|exists:faculties,id',
            'major_id' => 'required|exists:majors,id',
            'no_hp' => 'required|string|max:20',
            'email' => 'required|email',
            'jenjang' => 'required|in:D3,S1,S2',
            'keperluan' => 'required|in:Wisuda,Yudisium,Lainnya',
            'tahun_masuk' => 'required|numeric',
            'tahun_lulus' => 'required|numeric',
            'file_karya_ilmiah' => 'required|file|mimes:pdf|max:5120',
            'scan_ktm' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'bukti_upload' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Simpan file
        $file_karya_ilmiah = $request->file('file_karya_ilmiah')->store('bebas_pustaka/karya_ilmiah', 'public');
        $scan_ktm = $request->file('scan_ktm')->store('bebas_pustaka/scan_ktm', 'public');
        $bukti_upload = $request->hasFile('bukti_upload')
            ? $request->file('bukti_upload')->store('bebas_pustaka/bukti_upload', 'public')
            : null;

        // Simpan data
        turnitin_requests::create([
            'nama' => $validated['nama'],
            'nim' => $validated['nim'],
            'faculty_id' => $validated['faculty_id'],
            'major_id' => $validated['major_id'],
            'no_hp' => $validated['no_hp'],
            'email' => $validated['email'],
            'jenjang' => $validated['jenjang'],
            'keperluan' => $validated['keperluan'],
            'tahun_masuk' => $validated['tahun_masuk'],
            'tahun_lulus' => $validated['tahun_lulus'],
            'file_karya_ilmiah' => $file_karya_ilmiah,
            'scan_ktm' => $scan_ktm,
            'bukti_upload' => $bukti_upload,
        ]);

        return redirect()->route('admin.turnitin.index')->with('success', 'Permohonan berhasil dikirim.');
    }

    public function edit($id)
    {
        $turnitin = turnitin_requests::findOrFail($id);
        return view('admin.layanan.turnitin.edit', compact('turnitin'));
    }

    public function update(Request $request, $id)
    {
        $turnitin = turnitin_requests::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50',
            'faculty_id' => 'required|exists:faculties,id',
            'major_id' => 'required|exists:majors,id',
            'no_hp' => 'required|string|max:20',
            'email' => 'required|email',
            'jenjang' => 'required|in:D3,S1,S2',
            'keperluan' => 'required|in:Wisuda,Yudisium,Lainnya',
            'tahun_masuk' => 'required|numeric',
            'tahun_lulus' => 'required|numeric',
        ]);

        $turnitin->update($validated);

        return redirect()->route('admin.turnitin.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $turnitin = turnitin_requests::findOrFail($id);

        if ($turnitin->file_karya_ilmiah) {
            Storage::disk('public')->delete($turnitin->file_karya_ilmiah);
        }
        if ($turnitin->scan_ktm) {
            Storage::disk('public')->delete($turnitin->scan_ktm);
        }
        if ($turnitin->bukti_upload) {
            Storage::disk('public')->delete($turnitin->bukti_upload);
        }

        $turnitin->delete();

        return redirect()->route('admin.turnitin.index')->with('success', 'Data berhasil dihapus.');
    }
}
