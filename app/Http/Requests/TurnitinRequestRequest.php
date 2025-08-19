<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TurnitinRequestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'nama' => 'required|string|max:255',
            'nim_nidn' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'fakultas_prodi' => 'required|string|max:255',
            'judul_naskah' => 'required|string|max:255',
            'jenis_dokumen' => 'required|in:Skripsi,Tesis,Artikel,Lainnya',
            'catatan_pengguna' => 'nullable|string',
            'status' => 'sometimes|in:pending,diproses,selesai,ditolak',
            'hasil_turnitin' => 'nullable|string|max:255',
            'catatan_admin' => 'nullable|string',
        ];

        // Validasi file berbeda untuk create dan update
        if ($this->isMethod('post')) {
            $rules['file'] = 'required|file|mimes:pdf,doc,docx|max:10240';
        } else {
            $rules['file'] = 'nullable|file|mimes:pdf,doc,docx|max:10240';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama lengkap wajib diisi.',
            'nim_nidn.required' => 'NIM/NIDN wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'fakultas_prodi.required' => 'Fakultas/Prodi wajib diisi.',
            'judul_naskah.required' => 'Judul naskah wajib diisi.',
            'jenis_dokumen.required' => 'Jenis dokumen wajib dipilih.',
            'jenis_dokumen.in' => 'Jenis dokumen tidak valid.',
            'file.required' => 'File dokumen wajib diunggah.',
            'file.mimes' => 'File harus berformat PDF, DOC, atau DOCX.',
            'file.max' => 'Ukuran file maksimal 10MB.',
            'status.in' => 'Status tidak valid.',
        ];
    }
}
