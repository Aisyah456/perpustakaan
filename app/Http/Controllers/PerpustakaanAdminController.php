<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PerpustakaanVisi;
use App\Models\PerpustakaanVisiPoin;
use App\Models\PerpustakaanMisi;
use App\Models\PerpustakaanMisiPoin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PerpustakaanAdminController extends Controller
{
    /**
     * Display a listing of the visi.
     */
    public function indexVisi()
    {
        $visiList = PerpustakaanVisi::with('poin')->orderBy('created_at', 'desc')->get();
        return view('admin.perpustakaan.visi.index', compact('visiList'));
    }

    /**
     * Show the form for creating a new visi.
     */
    public function createVisi()
    {
        return view('admin.perpustakaan.visi.create');
    }

    /**
     * Store a newly created visi in storage.
     */
    public function storeVisi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'deskripsi' => 'required|string',
            'tahun_target' => 'required|integer|min:2000|max:2100',
            'is_active' => 'boolean',
            'poin' => 'required|array|min:1',
            'poin.*.nomor' => 'required|integer|min:1',
            'poin.*.deskripsi' => 'required|string',
            'poin.*.is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            // If new visi is active, deactivate all other visi
            if ($request->has('is_active') && $request->is_active) {
                PerpustakaanVisi::where('is_active', true)->update(['is_active' => false]);
            }

            // Create new visi
            $visi = PerpustakaanVisi::create([
                'deskripsi' => $request->deskripsi,
                'tahun_target' => $request->tahun_target,
                'is_active' => $request->has('is_active') ? true : false,
            ]);

            // Create visi poin
            foreach ($request->poin as $index => $poinData) {
                PerpustakaanVisiPoin::create([
                    'visi_id' => $visi->id,
                    'nomor' => $poinData['nomor'],
                    'deskripsi' => $poinData['deskripsi'],
                    'is_active' => isset($poinData['is_active']) ? true : false,
                    'urutan' => $index + 1,
                ]);
            }

            DB::commit();

            return redirect()->route('admin.perpustakaan.visi.index')
                ->with('success', 'Visi perpustakaan berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified visi.
     */
    public function editVisi($id)
    {
        $visi = PerpustakaanVisi::with('poin')->findOrFail($id);
        return view('admin.perpustakaan.visi.edit', compact('visi'));
    }

    /**
     * Update the specified visi in storage.
     */
    public function updateVisi(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'deskripsi' => 'required|string',
            'tahun_target' => 'required|integer|min:2000|max:2100',
            'is_active' => 'boolean',
            'poin' => 'required|array|min:1',
            'poin.*.id' => 'nullable|exists:perpustakaan_visi_poin,id',
            'poin.*.nomor' => 'required|integer|min:1',
            'poin.*.deskripsi' => 'required|string',
            'poin.*.is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            $visi = PerpustakaanVisi::findOrFail($id);

            // If updating visi to active, deactivate all other visi
            if ($request->has('is_active') && $request->is_active && !$visi->is_active) {
                PerpustakaanVisi::where('is_active', true)->update(['is_active' => false]);
            }

            // Update visi
            $visi->update([
                'deskripsi' => $request->deskripsi,
                'tahun_target' => $request->tahun_target,
                'is_active' => $request->has('is_active') ? true : false,
            ]);

            // Get existing poin IDs
            $existingPoinIds = $visi->poin->pluck('id')->toArray();
            $updatedPoinIds = [];

            // Update or create poin
            foreach ($request->poin as $index => $poinData) {
                if (isset($poinData['id'])) {
                    // Update existing poin
                    $poin = PerpustakaanVisiPoin::findOrFail($poinData['id']);
                    $poin->update([
                        'nomor' => $poinData['nomor'],
                        'deskripsi' => $poinData['deskripsi'],
                        'is_active' => isset($poinData['is_active']) ? true : false,
                        'urutan' => $index + 1,
                    ]);
                    $updatedPoinIds[] = $poin->id;
                } else {
                    // Create new poin
                    $poin = PerpustakaanVisiPoin::create([
                        'visi_id' => $visi->id,
                        'nomor' => $poinData['nomor'],
                        'deskripsi' => $poinData['deskripsi'],
                        'is_active' => isset($poinData['is_active']) ? true : false,
                        'urutan' => $index + 1,
                    ]);
                    $updatedPoinIds[] = $poin->id;
                }
            }

            // Delete poin that were not updated
            $poinToDelete = array_diff($existingPoinIds, $updatedPoinIds);
            if (!empty($poinToDelete)) {
                PerpustakaanVisiPoin::whereIn('id', $poinToDelete)->delete();
            }

            DB::commit();

            return redirect()->route('admin.perpustakaan.visi.index')
                ->with('success', 'Visi perpustakaan berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified visi from storage.
     */
    public function destroyVisi($id)
    {
        try {
            $visi = PerpustakaanVisi::findOrFail($id);
            $visi->delete();

            return redirect()->route('admin.perpustakaan.visi.index')
                ->with('success', 'Visi perpustakaan berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display a listing of the misi.
     */
    public function indexMisi()
    {
        $misiList = PerpustakaanMisi::with('poin')->orderBy('created_at', 'desc')->get();
        return view('admin.perpustakaan.misi.index', compact('misiList'));
    }

    /**
     * Show the form for creating a new misi.
     */
    public function createMisi()
    {
        return view('admin.perpustakaan.misi.create');
    }

    /**
     * Store a newly created misi in storage.
     */
    public function storeMisi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'deskripsi' => 'required|string',
            'is_active' => 'boolean',
            'poin' => 'required|array|min:1',
            'poin.*.nomor' => 'required|integer|min:1',
            'poin.*.deskripsi' => 'required|string',
            'poin.*.is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            // If new misi is active, deactivate all other misi
            if ($request->has('is_active') && $request->is_active) {
                PerpustakaanMisi::where('is_active', true)->update(['is_active' => false]);
            }

            // Create new misi
            $misi = PerpustakaanMisi::create([
                'deskripsi' => $request->deskripsi,
                'is_active' => $request->has('is_active') ? true : false,
            ]);

            // Create misi poin
            foreach ($request->poin as $index => $poinData) {
                PerpustakaanMisiPoin::create([
                    'misi_id' => $misi->id,
                    'nomor' => $poinData['nomor'],
                    'deskripsi' => $poinData['deskripsi'],
                    'is_active' => isset($poinData['is_active']) ? true : false,
                    'urutan' => $index + 1,
                ]);
            }

            DB::commit();

            return redirect()->route('admin.perpustakaan.misi.index')
                ->with('success', 'Misi perpustakaan berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified misi.
     */
    public function editMisi($id)
    {
        $misi = PerpustakaanMisi::with('poin')->findOrFail($id);
        return view('admin.perpustakaan.misi.edit', compact('misi'));
    }

    /**
     * Update the specified misi in storage.
     */
    public function updateMisi(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'deskripsi' => 'required|string',
            'is_active' => 'boolean',
            'poin' => 'required|array|min:1',
            'poin.*.id' => 'nullable|exists:perpustakaan_misi_poin,id',
            'poin.*.nomor' => 'required|integer|min:1',
            'poin.*.deskripsi' => 'required|string',
            'poin.*.is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            $misi = PerpustakaanMisi::findOrFail($id);

            // If updating misi to active, deactivate all other misi
            if ($request->has('is_active') && $request->is_active && !$misi->is_active) {
                PerpustakaanMisi::where('is_active', true)->update(['is_active' => false]);
            }

            // Update misi
            $misi->update([
                'deskripsi' => $request->deskripsi,
                'is_active' => $request->has('is_active') ? true : false,
            ]);

            // Get existing poin IDs
            $existingPoinIds = $misi->poin->pluck('id')->toArray();
            $updatedPoinIds = [];

            // Update or create poin
            foreach ($request->poin as $index => $poinData) {
                if (isset($poinData['id'])) {
                    // Update existing poin
                    $poin = PerpustakaanMisiPoin::findOrFail($poinData['id']);
                    $poin->update([
                        'nomor' => $poinData['nomor'],
                        'deskripsi' => $poinData['deskripsi'],
                        'is_active' => isset($poinData['is_active']) ? true : false,
                        'urutan' => $index + 1,
                    ]);
                    $updatedPoinIds[] = $poin->id;
                } else {
                    // Create new poin
                    $poin = PerpustakaanMisiPoin::create([
                        'misi_id' => $misi->id,
                        'nomor' => $poinData['nomor'],
                        'deskripsi' => $poinData['deskripsi'],
                        'is_active' => isset($poinData['is_active']) ? true : false,
                        'urutan' => $index + 1,
                    ]);
                    $updatedPoinIds[] = $poin->id;
                }
            }

            // Delete poin that were not updated
            $poinToDelete = array_diff($existingPoinIds, $updatedPoinIds);
            if (!empty($poinToDelete)) {
                PerpustakaanMisiPoin::whereIn('id', $poinToDelete)->delete();
            }

            DB::commit();

            return redirect()->route('admin.perpustakaan.misi.index')
                ->with('success', 'Misi perpustakaan berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified misi from storage.
     */
    public function destroyMisi($id)
    {
        try {
            $misi = PerpustakaanMisi::findOrFail($id);
            $misi->delete();

            return redirect()->route('admin.perpustakaan.misi.index')
                ->with('success', 'Misi perpustakaan berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
