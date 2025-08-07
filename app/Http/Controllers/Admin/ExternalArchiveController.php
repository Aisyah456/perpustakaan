<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExternalDocument;
use Illuminate\Support\Facades\Storage;

class ExternalArchiveController extends Controller
{
    public function index()
    {
        $documents = ExternalDocument::latest()->paginate(10);
        return view('admin.dokumen.eksternal.index', compact('documents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'link' => 'required|url|max:500',
        ]);

        ExternalDocument::create($request->all());

        return redirect()->back()->with('success', 'Dokumen berhasil ditambahkan.');
    }

    public function show($id)
    {
        $doc = ExternalDocument::findOrFail($id);
        return response()->json($doc);
    }

    public function update(Request $request, $id)
    {
        $doc = ExternalDocument::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'link' => 'required|url|max:500',
        ]);

        $doc->update($request->all());

        return redirect()->back()->with('success', 'Dokumen berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $doc = ExternalDocument::findOrFail($id);
        $doc->delete();

        return redirect()->back()->with('success', 'Dokumen berhasil dihapus.');
    }
}
