<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\EresourcesInternal;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class EResourcesAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resources = EresourcesInternal::orderBy('nama', 'asc')->get();

        return view('admin.Eresourcess.index', compact('resources'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255|unique:eresources_internal,nama',
            'url' => 'nullable|url|max:500',
        ], [
            'nama.required' => 'Nama e-resource wajib diisi.',
            'nama.unique' => 'Nama e-resource sudah ada, gunakan nama lain.',
            'nama.max' => 'Nama e-resource maksimal 255 karakter.',
            'url.url' => 'Format URL tidak valid. Contoh: https://example.com',
            'url.max' => 'URL maksimal 500 karakter.',
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ]);
            }

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $resource = EresourcesInternal::create([
                'nama' => $request->nama,
                'url' => $request->url,
            ]);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'E-Resource "' . $request->nama . '" berhasil ditambahkan.',
                    'data' => $resource
                ]);
            }

            return redirect()->route('eresources.admin.index')
                ->with('success', 'E-Resource "' . $request->nama . '" berhasil ditambahkan.');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.'
                ]);
            }

            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $eresource = EresourcesInternal::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255|unique:eresources_internal,nama,' . $id,
            'url' => 'nullable|url|max:500',
        ], [
            'nama.required' => 'Nama e-resource wajib diisi.',
            'nama.unique' => 'Nama e-resource sudah ada, gunakan nama lain.',
            'nama.max' => 'Nama e-resource maksimal 255 karakter.',
            'url.url' => 'Format URL tidak valid. Contoh: https://example.com',
            'url.max' => 'URL maksimal 500 karakter.',
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ]);
            }

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $eresource->update([
                'nama' => $request->nama,
                'url' => $request->url,
            ]);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'E-Resource "' . $request->nama . '" berhasil diperbarui.',
                    'data' => $eresource
                ]);
            }

            return redirect()->route('eresources.admin.index')
                ->with('success', 'E-Resource "' . $request->nama . '" berhasil diperbarui.');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat memperbarui data. Silakan coba lagi.'
                ]);
            }

            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui data. Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        try {
            $eresource = EresourcesInternal::findOrFail($id);
            $nama = $eresource->nama;

            $eresource->delete();

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'E-Resource "' . $nama . '" berhasil dihapus.'
                ]);
            }

            return redirect()->route('eresources.admin.index')
                ->with('success', 'E-Resource "' . $nama . '" berhasil dihapus.');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat menghapus data. Silakan coba lagi.'
                ]);
            }

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menghapus data. Silakan coba lagi.');
        }
    }
}
