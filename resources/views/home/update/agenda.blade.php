@extends('home.layouts.add') {{-- Ganti dengan layout frontend kamu --}}

@section('title', 'Agenda Perpustakaan')

@section('page', 'Agenda Perpustakaan')

@section('content')
  <section class="overflow-visible bg-light">
    <div class="container">
      {{-- Judul --}}
      <div class="row mb-5 justify-content-center">
        <div class="col-md-6 text-center">
          <h1 class="fw-bold text-primary">Agenda</h1>
          <h4 class="text-dark">Kegiatan & Acara Perpustakaan UMHT</h4>
          <hr style="border-top: 2px solid #0d4e15; width: 50%; margin: auto;">
          <p class="text-muted mt-3">
            Temukan informasi agenda dan kegiatan terkini dari perpustakaan kami.
          </p>
        </div>
      </div>

      {{-- Grid Agenda: Maksimal 3 konten --}}
      <div class="row g-4">
        @forelse ($library_events as $agenda)
          <div class="col-md-6 col-xl-4">
            <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
              {{-- Gambar Acara --}}
              <div class="position-relative">
                <img
                  src="{{ asset($agenda->images ? 'lib/img/artikel/' . $agenda->images : 'lib/img/default-agenda.jpg') }}"
                  class="w-100" alt="{{ $agenda->judul }}" style="height: 240px; object-fit: cover;">
                <span class="badge bg-success position-absolute top-0 start-0 m-3 px-3 py-2">
                  {{ \Carbon\Carbon::parse($agenda->tanggal_mulai)->format('d M') }}
                </span>
              </div>

              {{-- Konten --}}
              <div class="card-body p-4">
                <div class="mb-2 text-muted small">
                  <i class="bi bi-calendar-event me-1"></i>
                  {{ \Carbon\Carbon::parse($agenda->tanggal_mulai)->format('d M Y') }} -
                  {{ \Carbon\Carbon::parse($agenda->tanggal_selesai)->format('d M Y') }}
                </div>

                <h5 class="card-title mb-2">
                  <a href="#" class="text-dark text-decoration-none" data-bs-toggle="modal"
                    data-bs-target="#detailModal" data-id="{{ $agenda->id }}" data-judul="{{ $agenda->judul }}"
                    data-tempat="{{ $agenda->tempat }}"
                    data-tanggal="{{ \Carbon\Carbon::parse($agenda->tanggal_mulai)->translatedFormat('d M Y') }} - {{ \Carbon\Carbon::parse($agenda->tanggal_selesai)->translatedFormat('d M Y') }}"
                    data-penyelenggara="{{ $agenda->penyelenggara }}"
                    data-deskripsi="{{ strip_tags($agenda->deskripsi) }}">
                    {{ Str::limit($agenda->judul, 60) }}
                  </a>
                </h5>

                <p class="text-muted small mb-2">
                  <i class="bi bi-geo-alt me-1"></i> {{ $agenda->tempat ?? '-' }}
                </p>

                <p class="small text-muted mb-0">
                  Penyelenggara: <strong>{{ $agenda->penyelenggara ?? 'UMHT' }}</strong>
                </p>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12">
            <div class="alert alert-warning text-center">
              <i class="bi bi-info-circle me-2"></i> Agenda belum tersedia.
            </div>
          </div>
        @endforelse
      </div>
    </div>
  </section>
@endsection
