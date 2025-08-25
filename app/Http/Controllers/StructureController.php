<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Structure;

class StructureController extends Controller
{
    public function index()
    {
        // $structures = Structure::whereNull('parent_id')->get();
        // return view('home.profil.index', compact('structures'));


        // Ambil semua data struktur
        $structures = Structure::orderBy('id', 'asc')->get();

        // Kirim ke view
        return view('home.profil.index', compact('structures'));
    }
}
