<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from elearn.websitelayout.net/courses-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:17 GMT -->

<head>
  <!-- metas -->
  @include('home.libs.meta')
  <!-- title  -->
  <title>Update || Perpustakaan UMHT</title>

  <!-- favicon -->
  @include('home.libs.link')

</head>

<body>

  <!-- PAGE LOADING
    ================================================== -->
  <div id="preloader"></div>

  <!-- MAIN WRAPPER
    ================================================== -->
  <div class="main-wrapper">

    <!-- HEADER
        ================================================== -->
    @include('home.libs.menu')

    <!-- PAGE TITLE
        ================================================== -->
    <section class="page-title-section bg-img cover-background top-position1"
      style="position: relative; background-image: url('{{ asset('lib/img/banner/page-title.jpg') }}'); background-size: cover; background-position: center;">

      <!-- Overlay gelap -->
      <div
        style="
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);  /* 0.5 = 50% gelap */
            z-index: 1;">
      </div>

      <!-- Konten utama -->
      <div class="container" style="position: relative; z-index: 2;">
        <div class="row text-center">
          <div class="col-md-12">
            <h1>Update</h1>
          </div>
          <div class="col-md-12">
            <ul>
              <li><a href="/Home">Home</a></li>
              <li><a href="#!">Update</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- ARTIKEL
        ================================================== -->
    <section class="py-5">
      <div class="container">
        <div class="section-heading text-center mb-5">
          <span class="sub-title text-primary d-block mb-2">Kategori</span>
          <h2 class="h1 mb-0">Artikel Perpustakaan UMHT</h2>
        </div>

        {{-- Filter Kategori --}}
        <div class="text-center mb-5">
          @php
            $kategoriAktif = request('kategori');
          @endphp
          <div class="btn-group" role="group" aria-label="Filter kategori">
            <a href="{{ route('artikel.index') }}"
              class="btn btn-outline-primary {{ !$kategoriAktif ? 'active' : '' }}">
              Semua
            </a>
            <a href="{{ route('artikel.index', ['kategori' => 'berita']) }}"
              class="btn btn-outline-primary {{ $kategoriAktif == 'berita' ? 'active' : '' }}">
              Berita
            </a>
            <a href="{{ route('artikel.index', ['kategori' => 'agenda']) }}"
              class="btn btn-outline-primary {{ $kategoriAktif == 'agenda' ? 'active' : '' }}">
              Agenda
            </a>
            <a href="{{ route('artikel.index', ['kategori' => 'artikel']) }}"
              class="btn btn-outline-primary {{ $kategoriAktif == 'artikel' ? 'active' : '' }}">
              Artikel
            </a>
            <a href="{{ route('artikel.index', ['kategori' => 'koleksi']) }}"
              class="btn btn-outline-primary {{ $kategoriAktif == 'koleksi' ? 'active' : '' }}">
              Koleksi Terbaru
            </a>
          </div>
        </div>

        {{-- Grid Artikel --}}
        <div class="row g-4">
          @forelse ($artikels as $artikel)
            <div class="col-md-6 col-xl-4">
              <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                <div class="position-relative">
                  <img src="{{ asset('lib/img/content/' . $artikel->img) }}" class="w-100 h-100 object-fit-cover"
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
                <i class="fas fa-info-circle me-2"></i> Data Artikel belum tersedia.
              </div>
            </div>
          @endforelse
        </div>

        {{-- Pagination --}}
        {{-- @if ($artikels->hasPages())
          <div class="row mt-5">
            <div class="col text-center">
              <nav>
                {{ $artikels->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
              </nav>
            </div>
          </div>
        @endif --}}
      </div>
    </section>

    <!-- BUY TEMPLATE
    ================================================== -->
    @include('home.libs.script')

    <!-- FOOTER
        ================================================== -->
    @include('home.libs.footer')
  </div>


</body>


<!-- Mirrored from elearn.websitelayout.net/courses-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:17 GMT -->

</html>
