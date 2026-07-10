<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Exception;

class HeroSectionController extends Controller
{
    public function index()
    {
        return Inertia::render('admin/cms/Hero', [
            'heroes' => HeroSection::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'badge_text'      => 'required|string|max:255',
            'title_line_1'    => 'required|string|max:255',
            'title_highlight' => 'required|string|max:255',
            'subtitle'        => 'required|string',
            'stats_label'     => 'required|string|max:255',
            'stats_value'     => 'required|string|max:255',
            'image'           => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active'       => 'boolean',
        ]);

        try {
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('heroes', 'public');
                $validated['image_path'] = $path;
            }

            HeroSection::create($validated);

            return redirect()->back()->with('success', 'Banner baru berhasil ditambahkan! 🚀');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan banner. Silakan coba lagi.');
        }
    }

    public function update(Request $request, HeroSection $hero)
    {
        $validated = $request->validate([
            'badge_text'      => 'required|string|max:255',
            'title_line_1'    => 'required|string|max:255',
            'title_highlight' => 'required|string|max:255',
            'subtitle'        => 'required|string',
            'stats_label'     => 'required|string|max:255',
            'stats_value'     => 'required|string|max:255',
            'image'           => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active'       => 'boolean',
        ]);

        try {
            if ($request->hasFile('image')) {
                // Hapus gambar lama jika ada file baru yang diunggah
                if ($hero->image_path) {
                    Storage::disk('public')->delete($hero->image_path);
                }

                $path = $request->file('image')->store('heroes', 'public');
                $validated['image_path'] = $path;
            }

            $hero->update($validated);

            return redirect()->back()->with('success', 'Perubahan banner berhasil disimpan! ✨');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui banner.');
        }
    }

    public function destroy(HeroSection $hero)
    {
        try {
            if ($hero->image_path) {
                Storage::disk('public')->delete($hero->image_path);
            }

            $hero->delete();

            return redirect()->back()->with('success', 'Banner telah berhasil dihapus secara permanen. 🗑️');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus banner.');
        }
    }
}
