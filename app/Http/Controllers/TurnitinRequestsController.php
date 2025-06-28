<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\turnitin_requests;
use App\Http\Requests\TurnitinRequest;

class TurnitinRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $turnitin_requests = turnitin_requests::latest()->paginate(10);
        return view('home.turnitin.from', compact('TurnitinRequests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.turnitin.from');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20',
            'email' => 'required|email',
            'judul' => 'required|string|max:255',
            'file' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $filePath = $request->file('file')->store('turnitin_uploads', 'public');

        turnitin_requests::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'judul' => $request->judul,
            'file_path' => $filePath,
        ]);

        return redirect()->route('turnitin.form')->with('success', 'Berhasil mengirimkan Pengajuan berhasil dikirim. Hasil akan dikirim melalui email.');
    }
    /**
     * Display the specified resource.
     */

    public function show(turnitin_requests $turnitin_requests)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(turnitin_requests $turnitin_requests)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, turnitin_requests $turnitin_requests)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(turnitin_requests $turnitin_requests)
    {
        //
    }
}
