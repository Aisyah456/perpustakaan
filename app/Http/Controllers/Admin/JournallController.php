<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class JournallController extends Controller
{
    public function index()
    {
        $journals = Journal::active()->ordered()->get();

        return view('admin.Eresourcess.journal.index', compact('journals'));
    }

    public function admin()
    {
        $journals = Journal::ordered()->get();

        return view('journals.admin', compact('journals'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'background_color' => 'required|string|max:7',
            'description' => 'nullable|string',
            'access_url' => 'nullable|url',
            'logo_url' => 'nullable|url',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0'
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active');

        Journal::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Journal berhasil ditambahkan!'
        ]);
    }

    public function show(Journal $journal)
    {
        return redirect($journal->access_url);
    }

    public function edit(Journal $journal)
    {
        return response()->json($journal);
    }

    public function update(Request $request, Journal $journal)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'background_color' => 'required|string|max:7',
            'description' => 'nullable|string',
            'access_url' => 'nullable|url',
            'logo_url' => 'nullable|url',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0'
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active');

        $journal->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Journal berhasil diperbarui!'
        ]);
    }

    public function destroy(Journal $journal)
    {
        $journal->delete();

        return response()->json([
            'success' => true,
            'message' => 'Journal berhasil dihapus!'
        ]);
    }
}
