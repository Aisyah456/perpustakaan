<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PanduanPerpustakaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PanduanPerpustakaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $panduans = PanduanPerpustakaan::latest()->paginate(10);

        return view('admin.dok.panduan.index', compact('panduans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(['success' => true]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'link' => 'required|url|max:255',
        ], [
            'judul.required' => 'Judul panduan wajib diisi.',
            'judul.max' => 'Judul panduan maksimal 255 karakter.',
            'deskripsi.required' => 'Deskripsi panduan wajib diisi.',
            'link.required' => 'Link panduan wajib diisi.',
            'link.url' => 'Link harus berupa URL yang valid.',
            'link.max' => 'Link maksimal 255 karakter.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $panduan = PanduanPerpustakaan::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'link' => $request->link,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Panduan berhasil ditambahkan.',
                'data' => $panduan
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data.'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PanduanPerpustakaan $panduan)
    {
        return response()->json($panduan);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PanduanPerpustakaan $panduan)
    {
        return response()->json($panduan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PanduanPerpustakaan $panduan)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'link' => 'required|url|max:255',
        ], [
            'judul.required' => 'Judul panduan wajib diisi.',
            'judul.max' => 'Judul panduan maksimal 255 karakter.',
            'deskripsi.required' => 'Deskripsi panduan wajib diisi.',
            'link.required' => 'Link panduan wajib diisi.',
            'link.url' => 'Link harus berupa URL yang valid.',
            'link.max' => 'Link maksimal 255 karakter.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $panduan->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'link' => $request->link,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Panduan berhasil diupdate.',
                'data' => $panduan
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengupdate data.'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PanduanPerpustakaan $panduan)
    {
        try {
            $judul = $panduan->judul;
            $panduan->delete();

            return response()->json([
                'success' => true,
                'message' => "Panduan '{$judul}' berhasil dihapus."
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus data.'
            ], 500);
        }
    }

    /**
     * Get panduan for public view
     */
    public function publicIndex()
    {
        $panduans = PanduanPerpustakaan::latest()->get();

        return view('panduan.index', compact('panduans'));
    }
}
