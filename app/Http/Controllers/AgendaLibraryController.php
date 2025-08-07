<?php

namespace App\Http\Controllers;

use App\Http\Resources\AgendaLibraryResources;
use App\Models\AgendaLibrary;
use App\Models\Agendas;
use Illuminate\Http\Request;

class AgendaLibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agenda_libraries = AgendaLibrary::all();
        return view('home.update.agenda', compact('agenda_libraries'));
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
    public function show(AgendaLibrary $agendaLibrary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AgendaLibrary $agendaLibrary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AgendaLibrary $agendaLibrary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AgendaLibrary $agendaLibrary)
    {
        //
    }
}
