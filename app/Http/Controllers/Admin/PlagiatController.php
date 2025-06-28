<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plagiat;

class PlagiatController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $plagiats = Plagiat::when($search, function ($query, $search) {
            $query->where('nama', 'like', "%{$search}%")
                ->orWhere('nim', 'like', "%{$search}%");
        })->paginate(10);

        return view('admin.plagiat.index', compact('plagiats'));
    }

    public function create()
    {
        return view('admin.plagiat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'status' => 'required',
        ]);

        Plagiat::create($request->all());

        return redirect()->route('admin.plagiat.index')->with('success', 'Plagiat created successfully.');
    }

    public function edit($id)
    {
        $plagiat = Plagiat::findOrFail($id);
        return view('admin.plagiat.edit', compact('plagiat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'status' => 'required',
        ]);

        $plagiat = Plagiat::findOrFail($id);
        $plagiat->update($request->all());

        return redirect()->route('admin.plagiat.index')->with('success', 'Plagiat updated successfully.');
    }

    public function destroy($id)
    {
        Plagiat::destroy($id);
        return redirect()->route('admin.plagiat.index')->with('success', 'Plagiat deleted successfully.');
    }
}
