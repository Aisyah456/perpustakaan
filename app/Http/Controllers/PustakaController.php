<?php

namespace App\Http\Controllers;

use App\Models\Pustaka;
use Illuminate\Http\Request;

class PustakaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $pustakas = Pustaka::latest()->get();
        // return view('home.pustaka.pustaka', [
        //     'pustakas' => PustakaController::collection($pustakas)
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.pustaka.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:pustaka',
            'jurusan' => 'required',
            'tanggal_permohonan' => 'required|date',
            'status' => 'required|in:pending,disetujui,ditolak',
        ]);

        Pustaka::create($request->all());
        return redirect()->route('home.pustaka.pustaka')->with('success', 'Permohonan Bebas Pustaka Berhasil di simpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pustaka $pustaka)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pustaka $pustaka)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pustaka $pustaka)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pustaka $pustaka)
    {
        //
    }
}
