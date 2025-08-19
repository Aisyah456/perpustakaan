<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\turnitin_requests;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\TurnitinStatusNotification;

class RequestsTurnitinController extends Controller
{
    public function index()
    {
        $turnitinRequests = turnitin_requests::latest()->paginate(10);
        return view('admin.layanan.turnitin.index', compact('turnitinRequests'));
    }

    public function create()
    {
        return view('turnitin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim_nidn' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'fakultas_prodi' => 'required|string|max:255',
            'judul_naskah' => 'required|string|max:255',
            'jenis_dokumen' => 'required|in:Skripsi,Tesis,Artikel,Lainnya',
            'file' => 'required|file|mimes:pdf,doc,docx|max:10240',
            'catatan_pengguna' => 'nullable|string',
        ]);

        if ($request->hasFile('file')) {
            $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('turnitin_files', $fileName, 'public');
            $validated['file'] = $filePath;
        }

        $turnitinRequest = turnitin_requests::create($validated);

        // Send email notification to admin
        $this->sendEmailNotification($turnitinRequest, 'new_request');

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Permintaan berhasil dibuat']);
        }

        return redirect()->route('turnitin.index')
            ->with('success', 'Permintaan Turnitin berhasil dibuat.');
    }

    public function show(turnitin_requests $turnitinRequest)
    {
        if (request()->ajax()) {
            return response()->json($turnitinRequest);
        }
        return view('turnitin.show', compact('turnitinRequest'));
    }

    public function edit(turnitin_requests $turnitinRequest)
    {
        if (request()->ajax()) {
            return response()->json($turnitinRequest);
        }
        return view('turnitin.edit', compact('turnitinRequest'));
    }

    public function update(Request $request, turnitin_requests $turnitinRequest)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim_nidn' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'fakultas_prodi' => 'required|string|max:255',
            'judul_naskah' => 'required|string|max:255',
            'jenis_dokumen' => 'required|in:Skripsi,Tesis,Artikel,Lainnya',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'catatan_pengguna' => 'nullable|string',
            'status' => 'required|in:pending,diproses,selesai,ditolak',
            'hasil_turnitin' => 'nullable|string',
            'catatan_admin' => 'nullable|string',
        ]);

        $oldStatus = $turnitinRequest->status;

        if ($request->hasFile('file')) {
            // Delete old file
            if ($turnitinRequest->file) {
                Storage::disk('public')->delete($turnitinRequest->file);
            }

            $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('turnitin_files', $fileName, 'public');
            $validated['file'] = $filePath;
        }

        $turnitinRequest->update($validated);

        // Send email if status changed
        if ($oldStatus !== $turnitinRequest->status) {
            $this->sendEmailNotification($turnitinRequest, 'status_update');
        }

        return redirect()->route('turnitin.index')
            ->with('success', 'Permintaan Turnitin berhasil diperbarui.');
    }

    public function destroy(turnitin_requests $turnitinRequest)
    {
        // Delete file
        if ($turnitinRequest->file) {
            Storage::disk('public')->delete($turnitinRequest->file);
        }

        $turnitinRequest->delete();

        return redirect()->route('turnitin.index')
            ->with('success', 'Permintaan Turnitin berhasil dihapus.');
    }

    private function sendEmailNotification(turnitin_requests $turnitinRequest, $type)
    {
        try {
            if ($type === 'new_request') {
                // Kirim email ke admin
                Mail::to(config('mail.admin_email', 'admin@university.ac.id'))
                    ->send(new TurnitinStatusNotification($turnitinRequest, $type));
            } else {
                // Kirim email ke user
                Mail::to($turnitinRequest->email)
                    ->send(new TurnitinStatusNotification($turnitinRequest, $type));
            }
        } catch (\Exception $e) {
            Log::error('Failed to send email: ' . $e->getMessage());
        }
    }


    // public function downloadFile(turnitin_requests $turnitinRequest)
    // {
    //     if ($turnitinRequest->file && Storage::disk('public')->exists($turnitinRequest->file)) {
    //         return Storage::disk('public')->download($turnitinRequest->file);
    //     }

    //     return redirect()->back()->with('error', 'File tidak ditemukan.');
    // }

    public function download($id)
    {
        $file = turnitin_requests::findOrFail($id);

        $path = storage_path('app/public/' . $file->document);

        if (!file_exists($path)) {
            abort(404, 'File tidak ditemukan.');
        }

        return response()->download($path, $file->document);
    }
}
