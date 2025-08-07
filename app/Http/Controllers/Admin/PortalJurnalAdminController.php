<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PortalJurnalNasional;
use Illuminate\Support\Facades\Validator;


class PortalJurnalAdminController extends Controller
{
    /**
     * Tampilkan daftar seluruh portal jurnal.
     */
    public function index()
    {
        $portals = PortalJurnalNasional::orderBy('nama', 'asc')->get();
        return view('admin.Eresourcess.portal.index', compact('portals'));
    }

    /**
     * Simpan data portal jurnal baru.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255|unique:portal_jurnal_nasional,nama',
            'url' => 'nullable|url|max:500',
            'deskripsi' => 'nullable|string|max:1000',
            'is_active' => 'boolean',
        ], [
            'nama.required' => 'Nama portal jurnal wajib diisi.',
            'nama.unique' => 'Nama portal jurnal sudah ada, gunakan nama lain.',
            'nama.max' => 'Nama portal jurnal maksimal 255 karakter.',
            'url.url' => 'Format URL tidak valid. Contoh: https://example.com',
            'url.max' => 'URL maksimal 500 karakter.',
            'deskripsi.max' => 'Deskripsi maksimal 1000 karakter.',
        ]);

        if ($validator->fails()) {
            return $request->ajax()
                ? response()->json(['success' => false, 'errors' => $validator->errors()])
                : redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $portal = PortalJurnalNasional::create([
                'nama' => $request->nama,
                'url' => $request->url,
                'deskripsi' => $request->deskripsi,
                'is_active' => $request->boolean('is_active'),
            ]);

            $message = 'Portal Jurnal "' . $portal->nama . '" berhasil ditambahkan.';

            return $request->ajax()
                ? response()->json(['success' => true, 'message' => $message, 'data' => $portal])
                : redirect()->route('portal-jurnal.index')->with('success', $message);
        } catch (\Exception $e) {
            $error = 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.';

            return $request->ajax()
                ? response()->json(['success' => false, 'message' => $error])
                : redirect()->back()->withInput()->with('error', $error);
        }
    }

    /**
     * Perbarui data portal jurnal.
     */
    public function update(Request $request, $id)
    {
        $portal = PortalJurnalNasional::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255|unique:portal_jurnal_nasional,nama,' . $id,
            'url' => 'nullable|url|max:500',
            'deskripsi' => 'nullable|string|max:1000',
            'is_active' => 'boolean',
        ], [
            'nama.required' => 'Nama portal jurnal wajib diisi.',
            'nama.unique' => 'Nama portal jurnal sudah ada, gunakan nama lain.',
            'nama.max' => 'Nama portal jurnal maksimal 255 karakter.',
            'url.url' => 'Format URL tidak valid. Contoh: https://example.com',
            'url.max' => 'URL maksimal 500 karakter.',
            'deskripsi.max' => 'Deskripsi maksimal 1000 karakter.',
        ]);

        if ($validator->fails()) {
            return $request->ajax()
                ? response()->json(['success' => false, 'errors' => $validator->errors()])
                : redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $portal->update([
                'nama' => $request->nama,
                'url' => $request->url,
                'deskripsi' => $request->deskripsi,
                'is_active' => $request->boolean('is_active'),
            ]);

            $message = 'Portal Jurnal "' . $portal->nama . '" berhasil diperbarui.';

            return $request->ajax()
                ? response()->json(['success' => true, 'message' => $message, 'data' => $portal])
                : redirect()->route('portal-jurnal.index')->with('success', $message);
        } catch (\Exception $e) {
            $error = 'Terjadi kesalahan saat memperbarui data. Silakan coba lagi.';

            return $request->ajax()
                ? response()->json(['success' => false, 'message' => $error])
                : redirect()->back()->withInput()->with('error', $error);
        }
    }

    /**
     * Hapus data portal jurnal.
     */
    public function destroy(Request $request, $id)
    {
        try {
            $portal = PortalJurnalNasional::findOrFail($id);
            $nama = $portal->nama;
            $portal->delete();

            $message = 'Portal Jurnal "' . $nama . '" berhasil dihapus.';

            return $request->ajax()
                ? response()->json(['success' => true, 'message' => $message])
                : redirect()->route('portal-jurnal.index')->with('success', $message);
        } catch (\Exception $e) {
            $error = 'Terjadi kesalahan saat menghapus data. Silakan coba lagi.';

            return $request->ajax()
                ? response()->json(['success' => false, 'message' => $error])
                : redirect()->back()->with('error', $error);
        }
    }
}
