<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeroBanner;

class HeroBannerController extends Controller
{
    public function index()
    {
        $hero_banners = HeroBanner::latest()->first();
        return view('home.index', compact('hero_banners'));
    }
}
