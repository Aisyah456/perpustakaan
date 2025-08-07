<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResearchTool;
use Illuminate\Support\Facades\Storage;

class ToolsResearchController extends Controller
{
    public function index()
    {
        $tools = ResearchTool::latest()->paginate(10);
        return view('admin.dokumen.research.index', compact('tools'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'link' => 'required|url',
            'ikon' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('ikon')) {
            $filename = time() . '_' . $request->ikon->getClientOriginalName();
            $request->ikon->move(public_path('lib/img/icons'), $filename);
            $data['ikon'] = $filename;
        }

        ResearchTool::create($data);

        return redirect()->back()->with('success', 'Tool berhasil ditambahkan.');
    }

    public function show($id)
    {
        $tool = ResearchTool::findOrFail($id);
        return response()->json($tool);
    }

    public function update(Request $request, $id)
    {
        $tool = ResearchTool::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'link' => 'required|url',
            'ikon' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('ikon')) {
            if ($tool->ikon && file_exists(public_path('lib/img/icons/' . $tool->ikon))) {
                unlink(public_path('lib/img/icons/' . $tool->ikon));
            }

            $filename = time() . '_' . $request->ikon->getClientOriginalName();
            $request->ikon->move(public_path('lib/img/icons'), $filename);
            $data['ikon'] = $filename;
        }

        $tool->update($data);

        return redirect()->back()->with('success', 'Tool berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $tool = ResearchTool::findOrFail($id);

        if ($tool->ikon && file_exists(public_path('lib/img/icons/' . $tool->ikon))) {
            unlink(public_path('lib/img/icons/' . $tool->ikon));
        }

        $tool->delete();

        return redirect()->back()->with('success', 'Tool berhasil dihapus.');
    }
}
