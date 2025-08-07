<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Major;
use App\Models\LibraryFree;
use Illuminate\Support\Facades\Storage;


class PustakaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $entries = LibraryFree::with('faculty', 'major')->latest()->get();
        $faculties = Faculty::all();
        $majors = Major::all();
        return view('admin.plagiat.pustaka', compact('entries', 'faculties', 'majors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:library_free_teble',
            'faculty_id' => 'required|exists:faculties,id',
            'major_id' => 'required|exists:majors,id',
            'no_hp' => 'required|string|max:20',
            'email' => 'required|email',
            'jenjang' => 'required|string',
            'keperluan' => 'required|string',
            'tahun_masuk' => 'required|string',
            'tahun_lulus' => 'required|string',
            'file_karya_ilmiah' => 'required|file|mimes:pdf|max:2048',
            'scan_ktm' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'bukti_upload' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();
        $data['file_karya_ilmiah'] = $request->file('file_karya_ilmiah')->store('karya-ilmiah', 'public');
        $data['scan_ktm'] = $request->file('scan_ktm')->store('ktm', 'public');
        if ($request->hasFile('bukti_upload')) {
            $data['bukti_upload'] = $request->file('bukti_upload')->store('bukti', 'public');
        }

        LibraryFree::create($data);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $record = LibraryFree::with(['faculty', 'major'])->findOrFail($id);
        return response()->json($record);
    }

    public function update(Request $request, $id)
    {
        $entries = LibraryFree::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50',
            'faculty_id' => 'required|exists:faculties,id',
            'major_id' => 'required|exists:majors,id',
            'no_hp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'jenjang' => 'nullable|in:D3,S1,S2',
            'keperluan' => 'nullable|string|max:255',
            'tahun_masuk' => 'nullable|digits:4|integer',
            'tahun_lulus' => 'nullable|digits:4|integer',
            'file_karya_ilmiah' => 'nullable|mimes:pdf|max:2048',
            'scan_ktm' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'bukti_upload' => 'nullable|string|max:255',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        // Upload file jika ada
        if ($request->hasFile('file_karya_ilmiah')) {
            $file = $request->file('file_karya_ilmiah');
            $filePath = $file->store('karya_ilmiah', 'public');
            $validated['file_karya_ilmiah'] = $filePath;
        }

        if ($request->hasFile('scan_ktm')) {
            $file = $request->file('scan_ktm');
            $filePath = $file->store('scan_ktm', 'public');
            $validated['scan_ktm'] = $filePath;
        }

        // // Update data
        // $entries->update($validated);

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $record = LibraryFree::findOrFail($id);

        Storage::disk('public')->delete([$record->file_karya_ilmiah, $record->scan_ktm, $record->bukti_upload]);

        $record->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
