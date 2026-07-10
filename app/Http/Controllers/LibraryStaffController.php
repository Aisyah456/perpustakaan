<?php

namespace App\Http\Controllers;

use App\Models\LibraryStaff;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LibraryStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil seluruh staf
        $libraryStaff = LibraryStaff::all();

        return Inertia::render('profil/Index', [
            'libraryStaff' => $libraryStaff
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LibraryStaff $libraryStaff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LibraryStaff $libraryStaff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LibraryStaff $libraryStaff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LibraryStaff $libraryStaff)
    {
        //
    }
}
