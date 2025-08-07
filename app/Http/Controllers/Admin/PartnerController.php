<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('created_at', 'desc')->get();
        return view('admin.patner.index', compact('partners'));
    }

    public function store(Request $request)
    {
        $validator = $this->validatePartner($request, true);
        if ($validator->fails()) return $this->handleValidationFail($request, $validator);

        try {
            $partner = new Partner();
            $this->savePartnerData($partner, $request);
            return $this->successResponse($request, 'Partner berhasil ditambahkan!');
        } catch (\Exception $e) {
            $this->cleanUpUploadedFiles();
            return $this->errorResponse($request, 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

    public function update(Request $request, Partner $partner)
    {
        $validator = $this->validatePartner($request, false);
        if ($validator->fails()) return $this->handleValidationFail($request, $validator);

        try {
            $this->savePartnerData($partner, $request, true);
            return $this->successResponse($request, 'Partner berhasil diperbarui!');
        } catch (\Exception $e) {
            $this->cleanUpUploadedFiles();
            return $this->errorResponse($request, 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }

    public function destroy(Request $request, Partner $partner)
    {
        try {
            $this->deletePartnerFiles($partner);
            $partner->delete();
            return $this->successResponse($request, 'Partner berhasil dihapus!');
        } catch (\Exception $e) {
            return $this->errorResponse($request, 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }

    public function show(Partner $partner)
    {
        return response()->json(['success' => true, 'data' => $partner]);
    }

    public function bulkDelete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ids' => 'required|array',
            'ids.*' => 'exists:partners,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Data tidak valid.']);
        }

        try {
            $partners = Partner::whereIn('id', $request->ids)->get();
            foreach ($partners as $partner) {
                $this->deletePartnerFiles($partner);
                $partner->delete();
            }

            return response()->json([
                'success' => true,
                'message' => count($request->ids) . ' partner berhasil dihapus!'
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    // ======== HELPER FUNCTIONS ========

    private function validatePartner(Request $request, $isCreate = true)
    {
        $rules = [
            'name' => 'nullable|string|max:255',
            'link' => 'nullable|url|max:500',
            'logo' => ($isCreate ? 'required' : 'nullable') . '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hover_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $messages = [
            'logo.required' => 'Logo utama wajib diupload.',
            'logo.image' => 'File logo harus berupa gambar.',
            'logo.mimes' => 'Format logo harus: jpeg, png, jpg, gif, atau svg.',
            'logo.max' => 'Ukuran logo maksimal 2MB.',
            'hover_logo.image' => 'File hover logo harus berupa gambar.',
            'hover_logo.mimes' => 'Format hover logo harus: jpeg, png, jpg, gif, atau svg.',
            'hover_logo.max' => 'Ukuran hover logo maksimal 2MB.',
            'background_image.image' => 'File background harus berupa gambar.',
            'background_image.mimes' => 'Format background harus: jpeg, png, jpg, gif, atau svg.',
            'background_image.max' => 'Ukuran background maksimal 2MB.',
            'link.url' => 'Format link tidak valid.',
        ];

        return Validator::make($request->all(), $rules, $messages);
    }

    private function savePartnerData(Partner $partner, Request $request, $isUpdate = false)
    {
        $partner->name = $request->name;
        $partner->link = $request->link;

        $partner->logo = $this->handleFileUpload($request, 'logo', $isUpdate ? $partner->logo : null);
        $partner->hover_logo = $this->handleFileUpload($request, 'hover_logo', $isUpdate ? $partner->hover_logo : null);
        $partner->background_image = $this->handleFileUpload($request, 'background_image', $isUpdate ? $partner->background_image : null);

        $partner->save();
    }

    private function handleFileUpload(Request $request, $field, $oldFile = null)
    {
        if ($request->hasFile($field)) {
            $file = $request->file($field);
            $filename = time() . '_' . $field . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('lib/img/clients'), $filename);

            if ($oldFile && file_exists(public_path('lib/img/clients/' . $oldFile))) {
                unlink(public_path('lib/img/clients/' . $oldFile));
            }

            return $filename;
        }

        return $oldFile;
    }

    private function deletePartnerFiles(Partner $partner)
    {
        foreach (['logo', 'hover_logo', 'background_image'] as $field) {
            if ($partner->$field && file_exists(public_path('lib/img/clients/' . $partner->$field))) {
                unlink(public_path('lib/img/clients/' . $partner->$field));
            }
        }
    }

    private function successResponse(Request $request, $message)
    {
        return $request->ajax()
            ? response()->json(['success' => true, 'message' => $message])
            : redirect()->route('admin.partners.index')->with('success', $message);
    }

    private function errorResponse(Request $request, $message)
    {
        return $request->ajax()
            ? response()->json(['success' => false, 'message' => $message])
            : redirect()->back()->with('error', $message)->withInput();
    }

    private function handleValidationFail(Request $request, $validator)
    {
        return $request->ajax()
            ? response()->json(['success' => false, 'errors' => $validator->errors()])
            : redirect()->back()->withErrors($validator)->withInput();
    }

    private function cleanUpUploadedFiles()
    {
        foreach (['logoName', 'hoverLogoName', 'backgroundName'] as $var) {
            if (isset($GLOBALS[$var]) && file_exists(public_path('lib/img/clients/' . $GLOBALS[$var]))) {
                unlink(public_path('lib/img/clients/' . $GLOBALS[$var]));
            }
        }
    }
}
