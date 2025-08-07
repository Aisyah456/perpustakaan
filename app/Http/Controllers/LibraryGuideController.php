<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LibraryGuide;

class LibraryGuideController extends Controller
{
    public function index()
    {
        $struktur = LibraryGuide::with('children')->whereNull('parent_id')->get();
        return view('home.profil.library.struktur', compact('struktur'));
    }
}
