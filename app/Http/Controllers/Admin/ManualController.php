<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guide;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ManualController extends Controller
{
    public function index()
    {
        $guides = Guide::latest()->paginate(10);
        return view('admin.dokumen.panduan.index', compact('guides'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'category'    => 'nullable|string|max:100',
            'file'        => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        $filePath = null;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/guides', $fileName);
        }

        $guide = Guide::create([
            'title'       => $request->title,
            'description' => $request->description,
            'category'    => $request->category,
            'file_path'   => $filePath ? str_replace('public/', '', $filePath) : null,
            'is_active'   => true,
        ]);

        return response()->json(['success' => true, 'message' => 'Panduan berhasil ditambahkan']);
    }

    public function show($id)
    {
        $guide = Guide::findOrFail($id);
        return response()->json($guide);
    }

    public function edit($id)
    {
        $guide = Guide::findOrFail($id);
        return response()->json($guide);
    }

    public function update(Request $request, $id)
    {
        $guide = Guide::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'category'    => 'nullable|string|max:100',
            'file'        => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($guide->file_path && Storage::exists('public/' . $guide->file_path)) {
                Storage::delete('public/' . $guide->file_path);
            }

            $file = $request->file('file');
            $fileName = time() . '_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/guides', $fileName);
            $guide->file_path = str_replace('public/', '', $path);
        }

        $guide->update([
            'title'       => $request->title,
            'description' => $request->description,
            'category'    => $request->category,
        ]);

        return response()->json(['success' => true, 'message' => 'Panduan berhasil diperbarui']);
    }

    public function destroy($id)
    {
        $guide = Guide::findOrFail($id);

        if ($guide->file_path && Storage::exists('public/' . $guide->file_path)) {
            Storage::delete('public/' . $guide->file_path);
        }

        $guide->delete();

        return response()->json(['success' => true, 'message' => 'Panduan berhasil dihapus']);
    }

    public function toggleStatus($id)
    {
        $guide = Guide::findOrFail($id);
        $guide->is_active = !$guide->is_active;
        $guide->save();

        return response()->json(['success' => true, 'message' => 'Status berhasil diperbarui']);
    }
}
