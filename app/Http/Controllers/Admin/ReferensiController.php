<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ReferensiRequest;
use App\Http\Controllers\Controller;

class ReferensiController extends Controller
{
    public function index()
    {
        $data = ReferensiRequest::latest()->paginate(10);
        return view('admin.layanan.referensi.index', compact('data'));
    }

    public function create()
    {
        return view('admin.layanan.referensi.create');
    }
    public function show($id)
    {
        $data = ReferensiRequest::findOrFail($id);
        return view('admin.referensi.show', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'topik' => 'required',
            'pesan' => 'required',
        ]);

        ReferensiRequest::create($request->all());
        return redirect()->route('referensi.index')->with('success', 'Permintaan referensi berhasil dikirim.');
    }

    public function edit(ReferensiRequest $referensi)
    {
        return view('admin.referensi.edit', compact('referensi'));
    }

    public function update(Request $request, ReferensiRequest $referensi)
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,selesai',
        ]);

        $referensi->update($request->all());
        return redirect()->route('referensi.index')->with('success', 'Status referensi diperbarui.');
    }

    public function destroy(ReferensiRequest $referensi)
    {
        $referensi->delete();
        return back()->with('success', 'Data berhasil dihapus.');
    }
}
