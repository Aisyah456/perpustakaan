<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from elearn.websitelayout.net/faq.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:16 GMT -->

<head>
  @include('home.libs.meta')
  <!-- title  -->
  <title>Perpanduan Layanan Perpustakaan UMHT - Perpustakaan UMHT</title>
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
            <h1>Panduan Layanan </h1>
          </div>
          <div class="col-md-12">
            <ul>
              <li><a href="/Home">Home</a></li>
              <li><a href="#!">Panduan</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row">
          {{-- Sidebar Navigasi Layanan --}}
          <div class="col-lg-4 order-2 order-lg-1">
            @include('home.panduan.layanan.sidebar') {{-- Buat terpisah jika ingin rapi --}}
          </div>

          {{-- Konten Panduan --}}
          <div class="col-lg-8 order-1 order-lg-2 mb-2-9 mb-lg-0">
            <div class="wow fadeInUp" data-wow-delay="200ms">
              <h2 class="mb-4">📘 Panduan Akses Layanan Perpustakaan</h2>

              @forelse ($guides->where('is_active', true) as $guide)
                <div class="mb-4 p-3 border rounded shadow-sm">
                  <h5 class="mb-1 text-primary">{{ $guide->title }}</h5>

                  @if ($guide->category)
                    <span class="badge bg-info text-white mb-2">{{ $guide->category }}</span>
                  @endif

                  @if ($guide->description)
                    <p class="mb-2">{{ $guide->description }}</p>
                  @endif

                  @if ($guide->file_path)
                    <a href="{{ asset('storage/' . $guide->file_path) }}" target="_blank"
                      class="btn btn-sm btn-outline-primary">
                      📄 Lihat Panduan
                    </a>
                  @else
                    <span class="text-muted fst-italic">Belum tersedia file panduan.</span>
                  @endif
                </div>
              @empty
                <p>Tidak ada panduan yang tersedia.</p>
              @endforelse
            </div>
          </div>
        </div>
      </div>
    </section>



    @include('home.libs.footer')
  </div>
  @include('home.libs.script')
</body>

<!-- Mirrored from elearn.websitelayout.net/faq.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:16 GMT -->

</html>
