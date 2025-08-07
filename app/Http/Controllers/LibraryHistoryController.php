<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LibraryHistory;
use App\Models\Vision;
use App\Models\Mission;

classs LibraryHistoryController extends Controller
{
    public function index()
    {
        $milestones = LibraryHistory::orderBy('year')->get();
        $vision = Vision::first(); // Ambil 1 visi
        $missions = Mission::all(); // Ambil semua misi

        return view('home.profil.about', compact('milestones', 'vision', 'missions'));
    }
}
