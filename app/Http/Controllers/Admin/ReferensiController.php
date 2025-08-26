<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ReferensiRequest;
use App\Http\Controllers\Controller;

class ReferensiController extends Controller
{
    public function index()
    {
        $data = ReferensiRequest::latest()->get(); // Menggunakan get() instead of paginate untuk tampilan sederhana
        return view('admin.layanan.referensi.index', compact('data'));
    }

    public function create()
    {
        return view('admin.layanan.referensi.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'topik' => 'required|string|max:255',
                'pesan' => 'required|string',
                'status' => 'required|in:pending,diproses,selesai'
            ]);

            ReferensiRequest::create($validatedData);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Permintaan referensi berhasil dibuat.'
                ]);
            }

            return redirect()->route('admin.referensi.index')->with('success', 'Permintaan referensi berhasil dibuat.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $e->errors()
                ], 422);
            }
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat menyimpan data.'
                ], 500);
            }
            return back()->with('error', 'Terjadi kesalahan saat menyimpan data.')->withInput();
        }
    }

    public function show($id)
    {
        $data = ReferensiRequest::findOrFail($id);
        return view('admin.layanan.referensi.show', compact('data'));
    }

    public function edit($id)
    {
        $referensi = ReferensiRequest::findOrFail($id);
        return view('admin.layanan.referensi.edit', compact('referensi'));
    }

    public function update(Request $request, $id)
    {
        try {
            $referensi = ReferensiRequest::findOrFail($id);

            $validatedData = $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'topik' => 'required|string|max:255',
                'pesan' => 'required|string',
                'status' => 'required|in:pending,diproses,selesai'
            ]);

            $referensi->update($validatedData);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data referensi berhasil diperbarui.'
                ]);
            }

            return redirect()->route('admin.referensi.index')->with('success', 'Data referensi berhasil diperbarui.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $e->errors()
                ], 422);
            }
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat memperbarui data.'
                ], 500);
            }
            return back()->with('error', 'Terjadi kesalahan saat memperbarui data.')->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $referensi = ReferensiRequest::findOrFail($id);
            $referensi->delete();

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data berhasil dihapus.'
                ]);
            }

            return redirect()->route('admin.referensi.index')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat menghapus data.'
                ], 500);
            }
            return back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
