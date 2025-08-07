@extends('home.layouts.add')

@section('title', 'Berita Perpustakaan')

@section('content')
  <section class="py-5">
    <div class="container">
      {{-- Header --}}
      <div class="row mb-5 justify-content-center">
        <div class="col-md-8 text-center">
          <h1 class="fw-bold" style="color:orange;">Berita</h1>
          <h4 class="text-success">Berita Perpustakaan UMHT</h4>
          <hr style="border-top: 2px solid #0d4e15; width: 60%; margin: auto;">
        </div>
      </div>

      {{-- Konten Berita --}}
      <div class="row g-4">
        @forelse ($news->take(3) as $new)
          <div class="col-md-6 col-xl-4">
            <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
              {{-- Gambar & Kategori --}}
              <div class="position-relative">
                <img src="{{ asset('lib/img/content/' . $new->img) }}" class="w-100" alt="{{ $new->judul }}"
                  style="height: 240px; object-fit: cover;">
                <span class="badge bg-primary position-absolute top-0 start-0 m-3 px-3 py-2">
                  {{ ucfirst($new->category) }}
                </span>
                <a href="#" class="position-absolute top-0 end-0 m-3 text-white">
                  <i class="far fa-heart"></i>
                </a>
              </div>

              {{-- Isi Berita --}}
              <div class="card-body p-4">
                <div class="mb-3 text-muted small">
                  <i class="ti-agenda me-1"></i>
                  {{ \Carbon\Carbon::parse($new->tanggal)->translatedFormat('d M Y') }}
                </div>

                <h5 class="card-title mb-3">
                  <a href="{{ url('new/' . $new->id) }}" class="text-dark text-decoration-none">
                    {{ $new->judul }}
                  </a>
                </h5>

                <div class="d-flex align-items-center">
                  <div class="me-2">
                    <i class="fas fa-user-circle text-secondary"></i>
                  </div>
                  <div class="small fw-semibold">
                    {{ $new->admin }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12">
            <div class="alert alert-warning text-center">
              <i class="fas fa-info-circle me-2"></i> Data Berita belum tersedia.
            </div>
          </div>
        @endforelse
      </div>
    </div>
  </section>
@endsection
