<?php

namespace App\Http\Controllers;

use App\Models\LatestCollection;
use Illuminate\Http\Request;

class LatestCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collections = LatestCollection::latest()->paginate(10);
        return view('home.update.collection', compact('collections'));
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
    public function show(LatestCollection $latestCollection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LatestCollection $latestCollection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LatestCollection $latestCollection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LatestCollection $latestCollection)
    {
        //
    }
}
