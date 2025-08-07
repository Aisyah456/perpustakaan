@extends('home.layouts.add')
@section('title', 'Informasi Literasi')

@section('content')
  <section class="overflow-visible bg-light py-5">
    <div class="container">
      {{-- Judul --}}
      <div class="row mb-5 justify-content-center">
        <div class="col-md-8 text-center">
          <h1 class="fw-bold text-primary">Literasi Informasi</h1>
          <h4 class="text-dark">Pelatihan & Edukasi Perpustakaan UMHT</h4>
          <hr style="border-top: 2px solid #0d4e15; width: 50%; margin: auto;">
          <p class="text-muted mt-3">
            Dapatkan informasi pelatihan literasi informasi terbaru dari perpustakaan kami.
          </p>
        </div>
      </div>

      {{-- Grid Pelatihan --}}
      <div class="row g-4">
        @forelse ($data->take(3) as $item)
          <div class="col-md-6 col-xl-4">
            <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
              {{-- Gambar Poster --}}
              <div class="position-relative">
                <img src="{{ asset($item->poster ? 'storage/' . $item->poster : 'lib/img/default-agenda.jpg') }}"
                  class="w-100" alt="{{ $item->judul_pelatihan }}" style="height: 240px; object-fit: cover;">
                <span class="badge bg-success position-absolute top-0 start-0 m-3 px-3 py-2">
                  {{ \Carbon\Carbon::parse($item->tanggal)->format('d M') }}
                </span>
              </div>

              {{-- Konten --}}
              <div class="card-body p-4">
                <div class="mb-2 text-muted small">
                  <i class="bi bi-calendar-event me-1"></i>
                  {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }} • {{ $item->waktu }}
                </div>

                <h5 class="card-title mb-2">
                  <a href="#" class="text-dark text-decoration-none" data-bs-toggle="modal"
                    data-bs-target="#detailPelatihan{{ $item->id }}">
                    {{ Str::limit($item->judul_pelatihan, 60) }}
                  </a>
                </h5>

                <p class="text-muted small mb-2">
                  <i class="bi bi-person-video3 me-1"></i> {{ $item->narasumber }}
                </p>

                <p class="small text-muted mb-0">
                  Lokasi: <strong>{{ $item->lokasi }}</strong>
                </p>
              </div>
            </div>
          </div>

          {{-- Modal Detail Per Item --}}
          <div class="modal fade" id="detailPelatihan{{ $item->id }}" tabindex="-1"
            aria-labelledby="detailPelatihanLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                  <h5 class="modal-title" id="detailPelatihanLabel{{ $item->id }}">{{ $item->judul_pelatihan }}</h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                  @if ($item->poster)
                    <img src="{{ asset('storage/' . $item->poster) }}" class="img-fluid mb-3 rounded"
                      alt="Poster Pelatihan">
                  @endif

                  <p><strong>Deskripsi:</strong><br>{{ $item->deskripsi }}</p>
                  <p><strong>Narasumber:</strong> {{ $item->narasumber }}</p>
                  <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</p>
                  <p><strong>Waktu:</strong> {{ $item->waktu }}</p>
                  <p><strong>Lokasi:</strong> {{ $item->lokasi }}</p>

                  @if ($item->link_pendaftaran)
                    <p><strong>Link Pendaftaran:</strong> <a href="{{ $item->link_pendaftaran }}" target="_blank">
                        {{ $item->link_pendaftaran }}</a></p>
                  @endif

                  <p><strong>Status:</strong>
                    @if ($item->status === 'aktif')
                      <span class="badge bg-success">Aktif</span>
                    @else
                      <span class="badge bg-secondary">Nonaktif</span>
                    @endif
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12">
            <div class="alert alert-warning text-center">
              <i class="bi bi-info-circle me-2"></i> Belum ada pelatihan yang tersedia.
            </div>
          </div>
        @endforelse
      </div>

      {{-- Tombol Lihat Semua --}}
      @if ($data->count() > 3)
        <div class="row mt-4">
          <div class="col text-center">
            <a href="{{ route('literasi-informasi.index') }}" class="btn btn-primary rounded-pill px-4 py-2">
              <i class="bi bi-book-half me-2"></i> Lihat Semua Pelatihan
            </a>
          </div>
        </div>
      @endif
    </div>
  </section>
@endsection
