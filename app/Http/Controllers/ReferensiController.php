<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReferensiRequest;

class ReferensiController extends Controller
{
    public function index()
    {
        $data = ReferensiRequest::latetst()->paginate(10);
        return view('home.layanan.referensi.index', compact('data'));
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

        return back()->with('success', 'Permintaan referensi berhasil dikirim.');
    }

    public function destroy($id)
    {
        ReferensiRequest::destroy($id);
        return back()->with('success', 'Data berhasil dihapus.');
    }
    public function kirim(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'topik' => 'required|string|max:255',
        ]);

        ReferensiRequest::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'topik' => $request->topik,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Permintaan referensi berhasil dikirim.');
    }
}
