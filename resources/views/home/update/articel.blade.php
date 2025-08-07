@extends('home.layouts.add') {{-- Ganti dengan layout frontend kamu --}}

@section('title', 'Artikel Perpustakaan')

@section('page', 'Artikel Perpustakaan')

@section('content')
  <section class="py-5">
    <div class="container">
      <div class="row mb-5 justify-content-center">
        <div class="col-md-6 text-center">
          <h1 class="fw-bold" style="color:orange;">Artikel</h1>
          <h4 class="text-success">Artikel Perpustakaan UMHT</h4>
          <hr style="border-top: 2px solid #0d4e15; width: 50%; margin: auto;">
        </div>
      </div>

      {{-- Grid Artikel: Maksimal 3 Konten --}}
      <div class="row g-4">
        @forelse ($artikels->take(3) as $artikel)
          <div class="col-md-6 col-xl-4">
            <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
              <div class="position-relative">
                <img src="{{ asset('storage/' . $artikel->img) }}" class="w-100 h-100 object-fit-cover"
                  alt="{{ $artikel->judul }}" style="height: 240px; object-fit: cover;">
                <span class="badge bg-primary position-absolute top-0 start-0 m-3 px-3 py-2">
                  {{ ucfirst($artikel->category) }}
                </span>
                <a href="#" class="position-absolute top-0 end-0 m-3 text-white">
                  <i class="far fa-heart"></i>
                </a>
              </div>

              <div class="card-body p-4">
                <div class="mb-3 text-muted small">
                  <i class="ti-agenda me-1"></i>
                  {{ \Carbon\Carbon::parse($artikel->tanggal)->format('d M Y') }}
                </div>

                <h5 class="card-title mb-3">
                  <a href="{{ url('artikel/' . $artikel->id) }}" class="text-dark text-decoration-none">
                    {{ $artikel->judul }}
                  </a>
                </h5>

                <div class="d-flex align-items-center">
                  <div class="me-2">
                    <i class="fas fa-user-circle text-secondary"></i>
                  </div>
                  <div class="small fw-semibold">
                    {{ $artikel->admin }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12">
            <div class="alert alert-warning text-center">
              <i class="fas fa-info-circle me-2"></i> Belum ada data artikel.
            </div>
          </div>
        @endforelse
      </div>
    </div>
  </section>

@endsection
