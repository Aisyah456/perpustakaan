<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LatestCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CollectionLatestController extends Controller
{
    public function index()
    {
        $data = LatestCollection::latest()->get();
        return view('admin.layanan.collection.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'   => 'required|string|max:255',
            'email'  => 'required|email',
            'topik'  => 'required|string|max:255',
            'pesan'  => 'required|string',
            'status' => 'required|in:pending,diproses,selesai',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        LatestCollection::create($request->all());

        return response()->json(['success' => true, 'message' => 'Permintaan referensi berhasil ditambahkan']);
    }

    public function update(Request $request, $id)
    {
        $referensi = LatestCollection::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama'   => 'required|string|max:255',
            'email'  => 'required|email',
            'topik'  => 'required|string|max:255',
            'pesan'  => 'required|string',
            'status' => 'required|in:pending,diproses,selesai',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $referensi->update($request->all());

        return response()->json(['success' => true, 'message' => 'Permintaan referensi berhasil diperbarui']);
    }

    public function destroy($id)
    {
        $referensi = LatestCollection::findOrFail($id);
        $referensi->delete();

        return redirect()->route('admin.referensi.index')->with('success', 'Permintaan referensi berhasil dihapus');
    }
}
