<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Major;
use Illuminate\Http\Request;
use App\Models\TurnitinSubmission;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TurnitinController extends Controller
{
    public function index()
    {
        $faculties = Faculty::orderBy('id')->get();

        $majors = Major::with('faculty')
            ->orderByDesc('created_at')
            ->get();

        return view('home.turnitin.from', [
            'faculties' => $faculties,
            'majors' => $majors,
        ]);

        // $faculties = Faculty::orderBy('name')->get();
        // return view('home.turnitin.from', compact('faculties'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:bebas_pustakas,nim',
            'faculty_id' => 'required|exists:faculties,id',
            'major_id' => 'required|exists:majors,id',
            'no_hp' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'jenjang' => 'required|in:D3,S1,S2',
            'keperluan' => 'required|in:Wisuda,Yudisium,Lainnya',
            'tahun_masuk' => 'required|integer|min:2000|max:' . date('Y'),
            'tahun_lulus' => 'required|integer|min:2000|max:' . (date('Y') + 10),
            'file_karya_ilmiah' => 'required|file|mimes:pdf|max:10240',
            'scan_ktm' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'bukti_upload' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Upload files
            $karyaIlmiahPath = $request->file('file_karya_ilmiah')->store('bebas-pustaka/karya-ilmiah', 'public');
            $scanKtmPath = $request->file('scan_ktm')->store('bebas-pustaka/scan-ktm', 'public');
            $buktiUploadPath = null;

            if ($request->hasFile('bukti_upload')) {
                $buktiUploadPath = $request->file('bukti_upload')->store('bebas-pustaka/bukti-upload', 'public');
            }

            // Create record
            TurnitinSubmission::create([
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
                'file_karya_ilmiah' => $karyaIlmiahPath,
                'scan_ktm' => $scanKtmPath,
                'bukti_upload' => $buktiUploadPath,
                'status' => 'pending',
            ]);

            return redirect()->route('bebas-pustaka.create')
                ->with('success', 'Permohonan bebas pustaka berhasil dikirim! Kami akan memproses permohonan Anda dalam 1-3 hari kerja.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.')
                ->withInput();
        }
    }

    // public function adminIndex()
    // {
    //     $submissions = TurnitinSubmission::latest()->paginate(10);
    //     return view('home.turnitin.from', compact('submissions'));
    // }

    // public function updateStatus(Request $request, $id)
    // {
    //     $submission = TurnitinSubmission::findOrFail($id);
    //     $submission->status = $request->status;
    //     $submission->save();

    //     return redirect()->back()->with('success', 'Status diperbarui.');
    // }

    public function getMajorsByFaculty($facultyId)
    {
        $majors = Major::where('faculty_id', $facultyId)
            ->orderBy('name')
            ->get(['id', 'name']);

        return response()->json($majors);
    }

    public function status($id)
    {
        $faculties = TurnitinSubmission::with(['faculty', 'major'])->findOrFail($id);
        return view('home.bebas-pustaka.status', compact('faculties'));
    }
}
