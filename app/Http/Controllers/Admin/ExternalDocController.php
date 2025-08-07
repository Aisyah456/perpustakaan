<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ExternalDocument;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ExternalDocController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = ExternalDocument::query();

            if ($request->filled('kategori')) {
                $query->where('kategori', $request->kategori);
            }

            if ($request->filled('search')) {
                $query->where(function ($q) use ($request) {
                    $q->where('judul', 'like', '%' . $request->search . '%')
                        ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
                });
            }

            $documents = $query->latest()->paginate(10);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'data' => $documents,
                    'html' => view('admin.dok.eksternal.index', compact('documents'))->render()
                ]);
            }

            return view('admin.dok.eksternal.index', compact('documents')); // ✅ pastikan nama view benar
        } catch (\Exception $e) {
            Log::error('Error in ExternalDocumentController@index: ' . $e->getMessage());

            return $request->ajax()
                ? response()->json(['success' => false, 'message' => 'Terjadi kesalahan.'], 500)
                : back()->with('error', 'Terjadi kesalahan.');
        }
    }

    public function create()
    {
        $categories = method_exists(ExternalDocument::class, 'getCategories')
            ? ExternalDocument::getCategories()
            : ['Jurnal', 'Publikasi', 'Buku', 'Artikel', 'Thesis', 'Laporan', 'Lainnya'];

        return response()->json(['success' => true, 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255|unique:external_documents,judul',
            'kategori' => 'required|string|in:Jurnal,Publikasi,Buku,Artikel,Thesis,Laporan,Lainnya',
            'deskripsi' => 'nullable|string|max:1000',
            'link' => 'required|url|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();
        try {
            $document = ExternalDocument::create($request->only('judul', 'kategori', 'deskripsi', 'link'));

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Dokumen eksternal berhasil ditambahkan.',
                'redirect' => route('admin.external-documents.index')
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Store error: ' . $e->getMessage());

            return response()->json(['success' => false, 'message' => 'Gagal menyimpan dokumen.'], 500);
        }
    }

    public function show($id)
    {
        $document = ExternalDocument::find($id);

        if (!$document) {
            return response()->json(['success' => false, 'message' => 'Dokumen tidak ditemukan.'], 404);
        }

        return response()->json(['success' => true, 'data' => $document]);
    }

    public function edit($id)
    {
        $document = ExternalDocument::find($id);
        if (!$document) {
            return response()->json(['success' => false, 'message' => 'Dokumen tidak ditemukan.'], 404);
        }

        $categories = method_exists(ExternalDocument::class, 'getCategories')
            ? ExternalDocument::getCategories()
            : ['Jurnal', 'Publikasi', 'Buku', 'Artikel', 'Thesis', 'Laporan', 'Lainnya'];

        return response()->json(['success' => true, 'data' => $document, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $document = ExternalDocument::find($id);
        if (!$document) {
            return response()->json(['success' => false, 'message' => 'Dokumen tidak ditemukan.'], 404);
        }

        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255|unique:external_documents,judul,' . $id,
            'kategori' => 'required|string|in:Jurnal,Publikasi,Buku,Artikel,Thesis,Laporan,Lainnya',
            'deskripsi' => 'nullable|string|max:1000',
            'link' => 'required|url|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();
        try {
            $document->update($request->only('judul', 'kategori', 'deskripsi', 'link'));

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Dokumen berhasil diupdate.',
                'data' => $document->fresh()
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Update error: ' . $e->getMessage());

            return response()->json(['success' => false, 'message' => 'Gagal mengupdate dokumen.'], 500);
        }
    }

    public function destroy($id)
    {
        $document = ExternalDocument::find($id);
        if (!$document) {
            return response()->json(['success' => false, 'message' => 'Dokumen tidak ditemukan.'], 404);
        }

        try {
            $judul = $document->judul;
            $document->delete();

            return response()->json(['success' => true, 'message' => "Dokumen '{$judul}' berhasil dihapus."]);
        } catch (\Exception $e) {
            Log::error('Delete error: ' . $e->getMessage());

            return response()->json(['success' => false, 'message' => 'Gagal menghapus dokumen.'], 500);
        }
    }

    public function publicIndex(Request $request)
    {
        try {
            $query = ExternalDocument::query();

            if ($request->filled('kategori')) {
                $query->where('kategori', $request->kategori);
            }

            if ($request->filled('search')) {
                $query->where(function ($q) use ($request) {
                    $q->where('judul', 'like', '%' . $request->search . '%')
                        ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
                });
            }

            $documents = $query->latest()->get()->groupBy('kategori');

            return view('external-documents.index', [
                'documents' => $documents,
                'categories' => ExternalDocument::getCategories() ?? [],
                'totalDocuments' => ExternalDocument::count(),
                'categoryStats' => ExternalDocument::getCategoryStats() ?? []
            ]);
        } catch (\Exception $e) {
            Log::error('PublicIndex error: ' . $e->getMessage());
            return back()->with('error', 'Gagal memuat dokumen.');
        }
    }

    public function bulkDelete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ids' => 'required|array|min:1',
            'ids.*' => 'exists:external_documents,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        try {
            $deleted = ExternalDocument::whereIn('id', $request->ids)->delete();

            return response()->json([
                'success' => true,
                'message' => "{$deleted} dokumen berhasil dihapus."
            ]);
        } catch (\Exception $e) {
            Log::error('BulkDelete error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Gagal menghapus dokumen.'], 500);
        }
    }

    public function getStats()
    {
        try {
            $stats = [
                'total' => ExternalDocument::count(),
                'by_category' => ExternalDocument::getCategoryStats() ?? [],
                'recent' => ExternalDocument::latest()->take(5)->get(['id', 'judul', 'kategori', 'created_at']),
            ];

            return response()->json(['success' => true, 'data' => $stats]);
        } catch (\Exception $e) {
            Log::error('GetStats error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Gagal memuat statistik.'], 500);
        }
    }
}
