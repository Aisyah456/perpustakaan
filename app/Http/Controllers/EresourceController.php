<?php

namespace App\Http\Controllers;

use App\Models\Eresource;
use Illuminate\Http\Request;

class EresourceController extends Controller
{
    public function index()
    {
        $resources = Eresource::all();
        return view('home.index', compact('resources'));
    }
}
