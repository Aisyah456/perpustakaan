@extends('home.layouts.add')
@section('title', 'Layanan Perpustakaan')

@section('content')
  <section>
    <div class="container">
      <div class="row mb-5 justify-content-center">
        <div class="col-md-6 text-center">
          <h1 class="fw-bold" style="color:orange;">Layanan</h1>
          <h4 class="text-success">Perpustakaan UMHT</h4>
          <hr style="border-top: 2px solid #0d4e15; width: 50%; margin: auto;">
        </div>
      </div>

      <div class="row mb-2-9 mt-n2-6">
        @forelse ($menus as $menu)
          <div class="col-md-6 col-xl-4 mt-2-6 wow fadeInUp" data-wow-delay="100ms">
            <div class="card card-style06 border-color-light-black bg-transparent h-100">
              <div class="card-body text-center">
                <div class="service-img">
                  <img src="{{ asset('lib/img/menu/' . $menu->foto) }}" alt="{{ $menu->judul }}"
                    class="position-relative z-index-9 mt-2-2 w-70px">
                  <div class="icon-circle"></div>
                </div>
                <h3 class="h5">
                  <a href="{{ $menu->link }}">{{ $menu->judul }}</a>
                </h3>

                {{-- Tombol Modal Detail --}}
                <button type="button" class="btn btn-link btn-sm text-info mt-2 p-0" data-bs-toggle="modal"
                  data-bs-target="#detailModal{{ $menu->id }}">
                  <i class="fas fa-info-circle me-1"></i>Detail Layanan
                </button>
              </div>

              {{-- Tombol Read More kecil --}}
              <div class="card-btn">
                <div class="main-butn">
                  <a href="{{ $menu->link }}" class="text-decoration-none">
                    <span class="main-text">Read More</span>
                  </a>
                </div>
                <div class="hover-butn">
                  <a href="{{ $menu->link }}">
                    <span class="inner-butn">
                      <span class="hover-text">Read More</span>
                      <span class="btn-icon"><i class="fa-solid fa-arrow-right"></i></span>
                      <span class="btn-icon"><i class="fa-solid fa-arrow-right"></i></span>
                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>

          {{-- Modal Detail --}}
          <div class="modal fade" id="detailModal{{ $menu->id }}" tabindex="-1"
            aria-labelledby="detailModalLabel{{ $menu->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header bg-light">
                  <h5 class="modal-title fw-bold text-success" id="detailModalLabel{{ $menu->id }}">
                    <i class="fas fa-cog me-2"></i>{{ $menu->judul }}
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-4 text-center mb-3">
                      <img src="{{ asset('lib/img/icons/' . $menu->foto) }}" alt="{{ $menu->judul }}" class="img-fluid"
                        style="max-width: 100px;">
                    </div>
                    <div class="col-md-8">
                      <h6 class="text-primary mb-3">Deskripsi Layanan:</h6>
                      <p class="text-muted">{{ $menu->description }}</p>

                      <h6 class="text-primary mb-2 mt-4">Fitur Utama:</h6>
                      <ul class="list-unstyled">
                        <li><i class="fas fa-check-circle text-success me-2"></i>Akses mudah dan cepat</li>
                        <li><i class="fas fa-check-circle text-success me-2"></i>Interface yang user-friendly</li>
                        <li><i class="fas fa-check-circle text-success me-2"></i>Dukungan 24/7</li>
                        <li><i class="fas fa-check-circle text-success me-2"></i>Terintegrasi dengan sistem
                          perpustakaan</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Tutup
                  </button>
                  <a href="{{ $menu->link }}" class="btn btn-success">
                    <i class="fas fa-external-link-alt me-1"></i>Akses Layanan
                  </a>
                </div>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12 text-center">
            <div class="alert alert-info" role="alert">
              <i class="fas fa-info-circle me-2"></i>Data Menu Tidak Ada
            </div>
          </div>
        @endforelse
      </div>
    </div>
  </section>
@endsection
