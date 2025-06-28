<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStandarsRequest;
use App\Models\Standars;

use Illuminate\Http\Request;

class StandarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $standars = Standars::latest()->paginate(10);
        return view('home.standars.sop', compact('standars'));
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
    public function store(StoreStandarsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Standars $standars)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Standars $standars)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Standars $standars)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Standars $standars)
    {
        //
    }
}
