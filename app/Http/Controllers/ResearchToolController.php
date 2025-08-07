<?php

namespace App\Http\Controllers;

use App\Models\ResearchTool;
use Illuminate\Http\Request;

class ResearchToolController extends Controller
{
    public function index()
    {
        $tools = ResearchTool::latest()->paginate(3);
        return view('home.dokumen.reserch.index', compact('tools'));
    }
}
