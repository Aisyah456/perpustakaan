<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    /**
     * Menampilkan daftar panduan yang aktif
     */
    public function index()
    {
        $guides = Guide::where('is_active', true)
            ->orderBy('title')
            ->get();

        return view('home.panduan.layanan.doc', compact('guides'));
    }

    /**
     * Menampilkan panduan berdasarkan kategori tertentu
     */
    public function byCategory($category)
    {
        $guides = Guide::where('is_active', true)
            ->where('category', $category)
            ->orderBy('title')
            ->get();

        return view('home.panduan.layanan.doc', compact('guides'))->with('selectedCategory', $category);
    }

    /**
     * Menampilkan detail panduan jika diperlukan (opsional)
     */
    public function show($id)
    {
        $guide = Guide::where('is_active', true)->findOrFail($id);

        return view('home.panduan.layanan.show', compact('guide'));
    }
}
