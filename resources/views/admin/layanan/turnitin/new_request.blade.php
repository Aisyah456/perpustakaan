{{-- resources/views/emails/turnitin/new_request.blade.php --}}
@component('mail::message')
  # Permintaan Turnitin Baru

  Halo Admin,

  Ada permintaan Turnitin baru yang masuk ke sistem:

  **Detail Permintaan:**
  - **Nama:** {{ $turnitinRequest->nama }}
  - **NIM/NIDN:** {{ $turnitinRequest->nim_nidn }}
  - **Email:** {{ $turnitinRequest->email }}
  - **Fakultas/Prodi:** {{ $turnitinRequest->fakultas_prodi }}
  - **Judul Naskah:** {{ $turnitinRequest->judul_naskah }}
  - **Jenis Dokumen:** {{ $turnitinRequest->jenis_dokumen }}
  - **Tanggal Pengajuan:** {{ $turnitinRequest->created_at->format('d F Y, H:i') }}

  @if ($turnitinRequest->catatan_pengguna)
    **Catatan Pengguna:**
    {{ $turnitinRequest->catatan_pengguna }}
  @endif

  @component('mail::button', ['url' => url('/turnitin')])
    Kelola Permintaan
  @endcomponent

  Terima kasih,<br>
  Sistem Turnitin Universitas
@endcomponent

{{-- resources/views/emails/turnitin/status_update.blade.php --}}
@component('mail::message')
  # Update Status Permintaan Turnitin

  Halo {{ $turnitinRequest->nama }},

  Status permintaan Turnitin Anda telah diperbarui:

  **Detail Permintaan:**
  - **Judul Naskah:** {{ $turnitinRequest->judul_naskah }}
  - **Status:** {{ $turnitinRequest->status_text }}
  - **Tanggal Update:** {{ $turnitinRequest->updated_at->format('d F Y, H:i') }}

  @if ($turnitinRequest->hasil_turnitin)
    **Hasil Turnitin:** {{ $turnitinRequest->hasil_turnitin }}
  @endif

  @if ($turnitinRequest->catatan_admin)
    **Catatan Admin:**
    {{ $turnitinRequest->catatan_admin }}
  @endif

  @if ($turnitinRequest->status === 'selesai')
    @component('mail::button', ['url' => url('/turnitin/' . $turnitinRequest->id . '/download')])
      Download Hasil
    @endcomponent
  @endif

  Jika ada pertanyaan, silakan hubungi admin.

  Terima kasih,<br>
  Sistem Turnitin Universitas
@endcomponent
