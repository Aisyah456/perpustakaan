<?php

namespace App\Http\Controllers;


use Inertia\Inertia;
use App\Models\LibraryStaff;

class LibraryProfileController extends Controller
{
    public function index()
    {
        return Inertia::render('profil/Index', [
            'libraryStaff' => LibraryStaff::orderBy('order', 'asc')->get()
        ]);
    }
}
