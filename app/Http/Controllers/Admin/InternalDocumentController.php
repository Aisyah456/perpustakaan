<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InternalDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class InternalDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = InternalDocument::orderBy('created_at', 'desc')->get();
        return view('admin.dokumen.internal', compact('documents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul'     => 'required|string|max:255',
            'kategori'  => 'required|string|in:SOP,Panduan,Memo,Kebijakan,Formulir',
            'deskripsi' => 'nullable|string|max:1000',
            'file'      => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:10240',
        ]);

        if ($validator->fails()) {
            return $request->ajax()
                ? response()->json(['success' => false, 'errors' => $validator->errors()])
                : redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $filePath = null;
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '_' . time() . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('internal-documents', $fileName, 'public');
            }

            $document = InternalDocument::create([
                'judul'     => $request->judul,
                'kategori'  => $request->kategori,
                'deskripsi' => $request->deskripsi,
                'file'      => $filePath,
            ]);

            return $request->ajax()
                ? response()->json(['success' => true, 'message' => 'Dokumen berhasil ditambahkan.', 'document' => $document])
                : redirect()->route('admin.internal-documents.index')->with('success', 'Dokumen berhasil ditambahkan.');
        } catch (\Exception $e) {
            if ($filePath && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }

            return $request->ajax()
                ? response()->json(['success' => false, 'message' => 'Gagal menyimpan dokumen.'])
                : redirect()->back()->with('error', 'Gagal menyimpan dokumen.')->withInput();
        }
    }

    /**
     * Show a single document detail.
     */
    public function show(InternalDocument $internalDocument)
    {
        return response()->json([
            'success' => true,
            'document' => $internalDocument
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InternalDocument $internalDocument)
    {
        $validator = Validator::make($request->all(), [
            'judul'     => 'required|string|max:255',
            'kategori'  => 'required|string|in:SOP,Panduan,Memo,Kebijakan,Formulir',
            'deskripsi' => 'nullable|string|max:1000',
            'file'      => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:10240',
        ]);

        if ($validator->fails()) {
            return $request->ajax()
                ? response()->json(['success' => false, 'errors' => $validator->errors()])
                : redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $oldFile = $internalDocument->file;
            $filePath = $oldFile;

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '_' . time() . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('internal-documents', $fileName, 'public');
            }

            $internalDocument->update([
                'judul'     => $request->judul,
                'kategori'  => $request->kategori,
                'deskripsi' => $request->deskripsi,
                'file'      => $filePath,
            ]);

            if ($request->hasFile('file') && $oldFile && Storage::disk('public')->exists($oldFile)) {
                Storage::disk('public')->delete($oldFile);
            }

            return $request->ajax()
                ? response()->json(['success' => true, 'message' => 'Dokumen berhasil diperbarui.', 'document' => $internalDocument->fresh()])
                : redirect()->route('admin.internal-documents.index')->with('success', 'Dokumen berhasil diperbarui.');
        } catch (\Exception $e) {
            if ($request->hasFile('file') && isset($filePath) && $filePath !== $oldFile && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }

            return $request->ajax()
                ? response()->json(['success' => false, 'message' => 'Terjadi kesalahan saat memperbarui dokumen.'])
                : redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui dokumen.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InternalDocument $internalDocument)
    {
        try {
            $filePath = $internalDocument->file;

            $internalDocument->delete();

            if ($filePath && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }

            return request()->ajax()
                ? response()->json(['success' => true, 'message' => 'Dokumen berhasil dihapus.'])
                : redirect()->route('admin.internal-documents.index')->with('success', 'Dokumen berhasil dihapus.');
        } catch (\Exception $e) {
            return request()->ajax()
                ? response()->json(['success' => false, 'message' => 'Gagal menghapus dokumen.'])
                : redirect()->back()->with('error', 'Gagal menghapus dokumen.');
        }
    }

    /**
     * Download the specified document file.
     */
    public function download(InternalDocument $internalDocument)
    {
        if (!$internalDocument->file || !Storage::disk('public')->exists($internalDocument->file)) {
            abort(404, 'File tidak ditemukan.');
        }

        $filePath = Storage::disk('public')->path($internalDocument->file);
        $fileName = $internalDocument->judul . '.' . pathinfo($internalDocument->file, PATHINFO_EXTENSION);

        return response()->download($filePath, $fileName);
    }

    /**
     * Get documents by category for AJAX/API.
     */
    public function getByCategory(Request $request)
    {
        $kategori = $request->get('kategori');

        $query = InternalDocument::query()->orderBy('created_at', 'desc');

        if ($kategori && $kategori !== 'all') {
            $query->where('kategori', $kategori);
        }

        return response()->json([
            'success' => true,
            'documents' => $query->get()
        ]);
    }

    /**
     * Search documents.
     */
    public function search(Request $request)
    {
        $search = $request->get('search');
        $kategori = $request->get('kategori');

        $query = InternalDocument::query()->orderBy('created_at', 'desc');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        }

        if ($kategori && $kategori !== 'all') {
            $query->where('kategori', $kategori);
        }

        return response()->json([
            'success' => true,
            'documents' => $query->get()
        ]);
    }
}
