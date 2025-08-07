<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LibraryEvent;

class LibraryEventController extends Controller
{
    public function index()
    {
        $events = LibraryEvent::latest()->paginate(10);
        return view('home.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
        ]);

        LibraryEvent::create($request->all());

        return redirect()->route('admin.events.index')->with('success', 'Kegiatan berhasil ditambahkan');
    }

    public function show(LibraryEvent $event)
    {
        return view('admin.events.show', compact('event'));
    }

    public function edit(LibraryEvent $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, LibraryEvent $event)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
        ]);

        $event->update($request->all());

        return redirect()->route('admin.events.index')->with('success', 'Kegiatan berhasil diperbarui');
    }

    public function destroy(LibraryEvent $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Kegiatan berhasil dihapus');
    }
}
