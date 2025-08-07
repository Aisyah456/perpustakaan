<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrganizationalStructure;

class StrukturOrganisasiController extends Controller
{
    public function index()
    {
        return view('struktur-organisasi', [
            'level1' => OrganizationalStructure::where('level', 1)->get(),
            'level2' => OrganizationalStructure::where('level', 2)->get(),
            'level3' => OrganizationalStructure::where('level', 3)->get(),
        ]);
    }
}
