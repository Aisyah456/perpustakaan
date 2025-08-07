<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReferenceAccess;

class ReferenceAccessController extends Controller
{
    public function index(Request $request)
    {
        $fakultas = $request->input('fakultas');
        $prodi = $request->input('prodi');

        $query = ReferenceAccess::query();

        if ($fakultas) {
            $query->where('fakultas', $fakultas);
        }

        if ($prodi) {
            $query->where('prodi', $prodi);
        }

        $referensi = $query->paginate(12);
        $semuaFakultas = ReferenceAccess::select('fakultas')->distinct()->pluck('fakultas');
        $semuaProdi = ReferenceAccess::select('prodi')->distinct()->pluck('prodi');

        return view('home.layanan.referensi.ref', compact('referensi', 'semuaFakultas', 'semuaProdi', 'fakultas', 'prodi'));
    }
}
