<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    public function index()
    {
        return Inertia::render('admin/cms/Staff', [ 
            'staff' => Staff::orderBy('is_head', 'desc')
                            ->orderBy('order', 'asc')
                            ->get()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'division' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_head' => 'required|boolean',
            'order' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('staff-images', 'public');
        }

        Staff::create($validated);

        return redirect()->back()->with('success', 'Staf berhasil ditambahkan!');
    }

    public function update(Request $request, Staff $staff)
    {
        // CATATAN: Untuk update dengan FILE via Inertia/Vite, 
        // pastikan di frontend menggunakan method POST dengan spoofing _method: 'PUT'
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'division' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_head' => 'required|boolean',
            'order' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($staff->image) {
                Storage::disk('public')->delete($staff->image);
            }
            $validated['image'] = $request->file('image')->store('staff-images', 'public');
        }

        $staff->update($validated);

        return redirect()->back()->with('success', 'Data staf berhasil diperbarui!');
    }

    public function destroy(Staff $staff)
    {
        if ($staff->image) {
            Storage::disk('public')->delete($staff->image);
        }
        
        $staff->delete();

        return redirect()->back()->with('success', 'Staf berhasil dihapus!');
    }
}