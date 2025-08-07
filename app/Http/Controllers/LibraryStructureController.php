<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LibraryStructure;

class LibraryStructureController extends Controller
{
    public function index()
    {
        // Mengambil semua data struktur organisasi dengan relasi parent-child
        $struktur = LibraryStructure::with('children')->whereNull('parent_id')->get();

        return view('home.profil.library.struktur', compact('struktur'));
    }
}
