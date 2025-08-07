<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plagiat;

class PlagiatController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $plagiats = Plagiat::when($search, function ($query, $search) {
            $query->where('nama', 'like', "%{$search}%")
                ->orWhere('nim', 'like', "%{$search}%");
        })->paginate(10);

        return view('admin.plagiat.index', compact('plagiats'));
    }

    public function create()
    {
        return view('admin.plagiat.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'id_fakultas' => 'required',
            'id_prodi' => 'required',
            'kat_karya' => 'required',
            'kat_mhs' => 'required',
            'tujuan' => 'required',
            'jdl_karya_1' => 'required',
            'nm_pembimbing1' => 'required',
            'email_pembimbing1' => 'required|email',
            'nm_pembimbing2' => 'nullable',
            'email_pembimbing2' => 'nullable|email',
            'upload1' => 'required',
            'jdl_karya_ilmiah' => 'required',
            'upload2' => 'required',
        ]);

        $validated['status'] = 'pending';
        Plagiat::create($validated);
        return back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $plagiat = Plagiat::findOrFail($id);
        return view('admin.plagiat.edit', compact('plagiat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'status' => 'required',
        ]);

        $plagiat = Plagiat::findOrFail($id);
        $plagiat->update($request->all());

        return redirect()->route('admin.plagiat.index')->with('success', 'Plagiat updated successfully.');
    }


    public function destroy($id)
    {
        $data = Plagiat::findOrFail($id);
        $data->delete();
        return back()->with('success', 'Data berhasil dihapus.');
    }
}
