<?php

namespace App\Http\Controllers;

use App\Models\LibraryProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ProfilController extends Controller
{
    public function index()
    {
        return Inertia::render('admin/cms/Profile', [
            'profiles' => LibraryProfile::latest()->get(),
        ]);
    }

    public function edit($id)
    {
        
        $profile = LibraryProfile::findOrFail($id);
        return Inertia::render('admin/cms/EditProfile', [
            'profile' => $profile
        ]);
    }

    public function store(Request $request)
    {
        // Sesuaikan validasi dengan kolom database yang ada
        $validated = $request->validate([
            'about_title'       => 'required|string|max:255',
            'about_description' => 'required|string',
            'vision'            => 'required|string',
            'mission'           => 'required|array',
            'total_books'       => 'required|integer',
            'total_staff'       => 'required|integer',
            'service_hours_weekday' => 'required|string',
            'service_hours_weekend' => 'required|string',
        ]);

        try {
            LibraryProfile::create($validated);

            return redirect()->route('admin.profile.index')
                ->with('success', 'Profil perpustakaan berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menambahkan profil: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $profile = LibraryProfile::findOrFail($id);

        $validated = $request->validate([
            'about_title'       => 'required|string|max:255',
            'about_description' => 'required|string',
            'vision'            => 'required|string',
            'mission'           => 'required|array',
            'total_books'       => 'required|integer',
            'total_staff'       => 'required|integer',
            'service_hours_weekday' => 'required|string',
            'service_hours_weekend' => 'required|string',
        ]);

        try {
            $profile->update($validated);

            return redirect()->route('admin.profile.index')
                ->with('success', 'Profil berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal memperbarui profil.');
        }
    }

    public function destroy($id)
    {
        try {
            LibraryProfile::findOrFail($id)->delete();
            return redirect()->back()->with('success', 'Data profil berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data.');
        }
    }
}
