<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InternalDocument;
use Illuminate\Support\Facades\Storage;

class InternalArchivesController extends Controller
{
    public function index()
    {
        $documents = InternalDocument::latest()->paginate(5);
        return view('admin.dokumen.internal.index', compact('documents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'file' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $filename = $request->file('file')->store('docs', 'public');

        InternalDocument::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'file' => basename($filename),
        ]);

        return redirect()->back()->with('success', 'Dokumen berhasil ditambahkan.');
    }

    // Menampilkan detail dokumen (JSON, misal untuk modal)
    public function show($id)
    {
        $document = InternalDocument::findOrFail($id);
        return response()->json($document);
    }

    // Memperbarui dokumen
    public function update(Request $request, $id)
    {
        $document = InternalDocument::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($document->file && Storage::disk('public')->exists('docs/' . $document->file)) {
                Storage::disk('public')->delete('docs/' . $document->file);
            }

            $filename = $request->file('file')->store('docs', 'public');
            $document->file = basename($filename);
        }

        $document->update([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'file' => $document->file, // file bisa null jika tidak diunggah ulang
        ]);

        return redirect()->back()->with('success', 'Dokumen berhasil diperbarui.');
    }

    // Menghapus dokumen
    public function destroy($id)
    {
        $document = InternalDocument::findOrFail($id);

        if ($document->file && Storage::disk('public')->exists('docs/' . $document->file)) {
            Storage::disk('public')->delete('docs/' . $document->file);
        }

        $document->delete();

        return redirect()->back()->with('success', 'Dokumen berhasil dihapus.');
    }
}
