<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;
use App\Models\EresourcesInternal;
use App\Models\PortalJurnalNasional;

class EresourcesInternalController extends Controller
{
    /**
     * Display the e-resources page
     */
    public function index()
    {
        // Mengambil semua data e-resources dari database
        $resources = EresourcesInternal::active()
            ->orderBy('nama', 'asc')
            ->get();

        $journals = Journal::active()->ordered()->get();
        $portals = PortalJurnalNasional::active()
            ->orderBy('nama', 'asc')
            ->get();


        return view('home.eresources.index', compact('resources', 'journals', 'portals'));
    }


    public function show(Journal $journal)
    {
        return redirect($journal->access_url);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('eresources.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'url' => 'nullable|url|max:255',
        ]);

        EresourcesInternal::create([
            'nama' => $request->nama,
            'url' => $request->url,
        ]);

        return redirect()->route('home.eresources.index')
            ->with('success', 'E-Resource berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EresourcesInternal $eresource)
    {
        return view('eresources.edit', compact('eresource'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EresourcesInternal $eresource)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'url' => 'nullable|url|max:255',
        ]);

        $eresource->update([
            'nama' => $request->nama,
            'url' => $request->url,
        ]);

        return redirect()->route('home.eresources.index')
            ->with('success', 'E-Resource berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EresourcesInternal $eresource)
    {
        $eresource->delete();

        return redirect()->route('home.eresources.index')
            ->with('success', 'E-Resource berhasil dihapus.');
    }
}
