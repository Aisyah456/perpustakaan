<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $artikels = Artikel::when($search, function ($query, $search) {
            return $query->where('judul', 'like', "%$search%");
        })->paginate(10);

        return view('admin.artikel.index', compact('artikels'));
    }

    public function create()
    {
        return view('admin.artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal' => 'required|date',
            'img' => 'required|image|max:2048',
            'isi' => 'required',
            'admin' => 'required',
            'category' => 'required|in:Berita,Artikel,Agenda,Koleksi Terbaru',
        ]);

        $filePath = $request->file('img')->store('images', 'public');

        Artikel::create(array_merge($request->except('img'), ['img' => $filePath]));

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit(Artikel $artikel)
    {
        return view('admin.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal' => 'required|date',
            'img' => 'nullable|image|max:2048',
            'isi' => 'required',
            'admin' => 'required',
            'category' => 'required|in:Berita,Artikel,Agenda,Koleksi Terbaru',
        ]);

        if ($request->hasFile('img')) {
            $filePath = $request->file('img')->store('images', 'public');
            $artikel->img = $filePath;
        }

        $artikel->update($request->except('img'));

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Artikel $artikel)
    {
        $artikel->delete();

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
