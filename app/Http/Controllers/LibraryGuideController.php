<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LibraryGuide;

class LibraryGuideController extends Controller
{
    public function index()
    {
        $library_guides = LibraryGuide::all();
        return view('home.panduan.layanan.index', compact('library_guides'));
    }
}
