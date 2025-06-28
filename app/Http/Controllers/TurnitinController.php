<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TurnitinSubmission;

class TurnitinController extends Controller
{
    public function index()
    {
        return view('home.layanan.turnitin.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim_nidn' => 'required',
            'email' => 'required|email',
            'judul' => 'required',
            'file' => 'required|mimes:doc,docx|max:5120',
        ]);

        $fileName = time() . '-' . $request->file('file')->getClientOriginalName();
        $request->file('file')->move(public_path('uploads/turnitin'), $fileName);

        TurnitinSubmission::create([
            'nama' => $request->nama,
            'nim_nidn' => $request->nim_nidn,
            'email' => $request->email,
            'judul' => $request->judul,
            'file' => $fileName,
        ]);

        return redirect()->back()->with('success', 'Permohonan berhasil dikirim.');
    }

    public function adminIndex()
    {
        $submissions = TurnitinSubmission::latest()->paginate(10);
        return view('admin.turnitin.index', compact('submissions'));
    }

    public function updateStatus(Request $request, $id)
    {
        $submission = TurnitinSubmission::findOrFail($id);
        $submission->status = $request->status;
        $submission->save();

        return redirect()->back()->with('success', 'Status diperbarui.');
    }
}
