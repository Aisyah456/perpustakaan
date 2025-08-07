<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Panduan;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PanduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $panduans = Panduan::orderBy('urutan')->get();
        return view('admin.panduan.index', compact('panduans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'link' => 'nullable|string|max:255',
            'urutan' => 'required|integer|min:1',
            'aktif' => 'sometimes|boolean',
        ]);

        // Set aktif to false if not provided
        $validated['aktif'] = $request->has('aktif');

        Panduan::create($validated);

        return redirect()->route('panduan.index')
            ->with('message', 'Panduan berhasil ditambahkan!')
            ->with('type', 'success');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Panduan $panduan): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'link' => 'nullable|string|max:255',
            'urutan' => 'required|integer|min:1',
            'aktif' => 'sometimes|boolean',
        ]);

        // Set aktif to false if not provided
        $validated['aktif'] = $request->has('aktif');

        $panduan->update($validated);

        return redirect()->route('panduan.index')
            ->with('message', 'Panduan berhasil diperbarui!')
            ->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Panduan $panduan): RedirectResponse
    {
        $panduan->delete();

        return redirect()->route('panduan.index')
            ->with('message', 'Panduan berhasil dihapus!')
            ->with('type', 'success');
    }
}
