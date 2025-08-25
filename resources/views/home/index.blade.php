<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from elearn.websitelayout.net/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:52:43 GMT -->

<head>
  @include('home.libs.meta')
  <!-- title  -->
  <title>Perpustakaan || Universitas Mohammad Husni Thamrin </title>

  @include('home.libs.link')

</head>

<body>

  <!-- PAGE LOADING
    ================================================== -->
  <div id="preloader"></div>

  <!-- MAIN WRAPPER
    ================================================== -->
  <div class="main-wrapper">

    @include('home.libs.menu')

    <!-- BANNER
        ================================================== -->
    <section class="full-screen top-position1 p-0">
      <div class="slider-fade1 owl-carousel owl-theme w-100 min-vh-100">
        @foreach ($banners as $banner)
          <div class="item bg-img cover-background left-overlay-secondary" data-overlay-dark="90"
            data-background="{{ asset('lib/img/banner/' . $banner->image) }}">
            <div class="container d-flex flex-column">
              <div class="row align-items-center min-vh-100 pt-6 pt-md-0">
                <div class="col-md-11 col-lg-9 col-xl-8 col-xxl-7 mb-1-9 mb-lg-0 pt-6 pb-12 py-sm-6">
                  <div class="section-title02">
                    <div class="mb-2-1">
                      @if ($banner->subtitle)
                        <span
                          class="text-primary text-uppercase small letter-spacing-4 d-block mb-3 font-weight-700 sm-title">
                          {{ $banner->subtitle }}
                        </span>
                      @endif
                      <h1 class="display-3 font-weight-800 mb-4 text-white">{{ $banner->title }}</h1>
                    </div>
                    @if ($banner->description)
                      <p class="mb-1-9 font-weight-500 display-28 text-white opacity7 w-md-80 d-none d-sm-block">
                        {{ $banner->description }}
                      </p>
                    @endif
                  </div>
                  <div class="banner-button">
                    {{-- @if ($banner->button_text && $banner->button_link)
                      <a href="{{ $banner->button_link }}" class="butn-style4 white-hover m-2">
                        <span>{{ $banner->button_text }}</span>
                      </a>
                    @endif --}}
                    <div class="button-text d-inline-block m-2">
                      {{-- <a href="/perpustakaan/kontak" class="text-white text-primary-hover">Hubungi Kami</a> --}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </section>

    {{-- <section class="py-5 bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6">
            <h1 class="fw-bold" style="color:orange;">e-Resources</h1>
            <h4 class="text-success">& Layanan Perpustakaan UMHT</h4>
            <hr style="border-top: 2px solid #0d4e15; width: 50%;">
          </div>
        </div>

        <div class="row">
          @foreach ($resources as $res)
            <div class="col-md-6 mb-4">
              <div class="card border-0 shadow-sm h-100">
                @if ($res->image)
                  <img src="{{ asset('lib/img/icons/' . $res->image) }}" class="card-img-top" alt="{{ $res->title }}">
                @endif
                <div class="card-body">
                  <p>{{ $res->description }}</p>
                  <a href="{{ $res->link }}" class="btn btn-danger me-2">
                    <i class="bi bi-book"></i> {{ $res->button_label }}
                  </a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section> --}}

    <!-- ABOUT US
        ================================================== -->
    <section class="overflow-visible bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 mb-2-3 mb-lg-0 wow fadeInUp" data-wow-delay="100ms">
            <div class="position-relative pe-xl-1-9">
              <img src="{{ asset('lib/img/content/Perpustakaan Kampus.jpg') }}" class="border-radius-10"
                alt="Perpustakaan Thamrin">
              <div
                class="bg-secondary d-inline-block border-radius-10 p-1-9 position-absolute left-5 left-sm-n5 bottom-n5">
                <p class="text-white mb-1">Anggota Aktif</p>
                <h3 class="mb-0 h1 text-white">10.000+</h3>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="ps-xl-2-3 position-relative">
              <div class="section-title02 mb-lg-4 wow fadeInUp text-center" data-wow-delay="100ms">
                <h1 class="fw-bold" style="color:orange;">Tantang Kami</h1>
                <h4 class="text-success">Perpustakaan Universitas Mohammad Husni
                  Thamrin</h4>
                <hr style="border-top: 2px solid #0d4e15; width: 50%; margin: auto;">
              </div>
              <div class="z-index-1 position-relative">
                <p class="mb-1-9 wow fadeInUp" data-wow-delay="150ms">
                  Perpustakaan ini menjadi pusat sumber informasi akademik yang menyediakan berbagai koleksi buku,
                  jurnal, dan akses digital untuk mendukung kegiatan belajar, mengajar, dan penelitian.
                </p>
                <div class="row align-items-center">
                  <div class="col-lg-7 wow fadeInUp" data-wow-delay="200ms">
                    <div class="d-flex mb-1-9">
                      <div class="flex-shrink-0">
                        <img src="{{ asset('lib/img/icons/images.jpg') }}" alt="..." class="w-45px">
                      </div>
                      <div class="flex-grow-1 ms-3">
                        <h4 class="h5">Koleksi Buku Lengkap</h4>
                        <p class="mb-0">Ribuan judul tersedia</p>
                      </div>
                    </div>
                    <div class="d-flex">
                      <div class="flex-shrink-0">
                        <img src="{{ asset('lib/img/icons/Landing-Page.png') }}" alt="..." class="w-45px">
                      </div>
                      <div class="flex-grow-1 ms-3">
                        <h4 class="h5">Layanan Digital</h4>
                        <p class="mb-0">Peminjaman dan akses e-book</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-5 d-none d-lg-block wow fadeInUp" data-wow-delay="250ms">
                    <div>
                      <img src="{{ asset('lib/img/content/4.jpg') }}" class="border-radius-10" alt="Ruang Baca">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- MENU
        ================================================== -->
    <section>
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-6 text-center">
            <h1 class="fw-bold" style="color:orange;">Layanan</h1>
            <h4 class="text-success">Perpustakaan UMHT</h4>
            <hr style="border-top: 2px solid #0d4e15; width: 50%; margin: auto;">

            {{-- Tombol Panduan dan Informasi --}}
            <div class="mt-4 d-flex justify-content-center gap-3 flex-wrap">
              <button type="button" class="btn btn-outline-primary btn-sm px-4 py-2" data-bs-toggle="modal"
                data-bs-target="#panduanModal">
                <i class="fas fa-book-open me-2"></i>Panduan Layanan
              </button>
              <button type="button" class="btn btn-outline-success btn-sm px-4 py-2" data-bs-toggle="modal"
                data-bs-target="#infoModal">
                <i class="fas fa-info-circle me-2"></i>Informasi Umum
              </button>
            </div>
          </div>
        </div>

        <div class="row mb-2-9 mt-n2-6">
          @forelse ($menus->take(4) as $menu)
            <div class="col-md-6 col-xl-3 mt-2-6 wow fadeInUp" data-wow-delay="100ms">
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
                        <img src="{{ asset('lib/img/menu/' . $menu->foto) }}" alt="{{ $menu->judul }}"
                          class="img-fluid" style="max-width: 100px;">
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

          {{-- Tombol Lihat Semua --}}
          <div class="col-12 text-center mt-4">
            <a href="{{ route('layanan.index') }}" class="btn btn-outline-primary px-4 py-2">
              <i class="fas fa-layer-group me-2"></i>Lihat Semua Layanan
            </a>
          </div>
        </div>
      </div>
    </section>



    {{-- Modal Panduan Layanan --}}
    <div class="modal fade" id="panduanModal" tabindex="-1" aria-labelledby="panduanModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title fw-bold" id="panduanModalLabel">
              <i class="fas fa-book-open me-2"></i>Panduan Penggunaan Layanan Perpustakaan
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
              aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="accordion" id="panduanAccordion">
                  {{-- Langkah 1 --}}
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="fas fa-user-plus me-2 text-primary"></i>
                        <strong>Langkah 1: Registrasi & Login</strong>
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                      data-bs-parent="#panduanAccordion">
                      <div class="accordion-body">
                        <ol>
                          <li>Kunjungi halaman registrasi perpustakaan</li>
                          <li>Isi data diri dengan lengkap (NIM/NIP, nama, email, program studi)</li>
                          <li>Verifikasi email yang telah dikirimkan</li>
                          <li>Login menggunakan kredensial yang telah dibuat</li>
                        </ol>
                        <div class="alert alert-info mt-3">
                          <i class="fas fa-lightbulb me-2"></i>
                          <strong>Tips:</strong> Gunakan email institusi untuk proses verifikasi yang lebih cepat.
                        </div>
                      </div>
                    </div>
                  </div>

                  {{-- Langkah 2 --}}
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fas fa-search me-2 text-success"></i>
                        <strong>Langkah 2: Pencarian & Akses Koleksi</strong>
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                      data-bs-parent="#panduanAccordion">
                      <div class="accordion-body">
                        <ol>
                          <li>Gunakan fitur pencarian dengan kata kunci yang spesifik</li>
                          <li>Filter hasil pencarian berdasarkan kategori, tahun, atau penulis</li>
                          <li>Klik pada judul untuk melihat detail lengkap</li>
                          <li>Download atau baca online sesuai ketersediaan</li>
                        </ol>
                        <div class="alert alert-warning mt-3">
                          <i class="fas fa-exclamation-triangle me-2"></i>
                          <strong>Perhatian:</strong> Beberapa koleksi memerlukan akses khusus atau berbayar.
                        </div>
                      </div>
                    </div>
                  </div>

                  {{-- Langkah 3 --}}
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="fas fa-bookmark me-2 text-warning"></i>
                        <strong>Langkah 3: Peminjaman & Pengembalian</strong>
                      </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                      data-bs-parent="#panduanAccordion">
                      <div class="accordion-body">
                        <ol>
                          <li>Pilih buku yang ingin dipinjam</li>
                          <li>Klik tombol "Pinjam" dan konfirmasi peminjaman</li>
                          <li>Catat tanggal jatuh tempo pengembalian</li>
                          <li>Kembalikan buku sebelum tanggal jatuh tempo</li>
                        </ol>
                        <div class="alert alert-danger mt-3">
                          <i class="fas fa-clock me-2"></i>
                          <strong>Penting:</strong> Keterlambatan pengembalian akan dikenakan denda sesuai ketentuan.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              <i class="fas fa-times me-1"></i>Tutup
            </button>
            <button type="button" class="btn btn-primary">
              <i class="fas fa-download me-1"></i>Download Panduan PDF
            </button>
          </div>
        </div>
      </div>
    </div>

    {{-- Modal Informasi Umum --}}
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-success text-white">
            <h5 class="modal-title fw-bold" id="infoModalLabel">
              <i class="fas fa-info-circle me-2"></i>Informasi Umum Perpustakaan UMHT
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
              aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <h6 class="text-primary mb-3"><i class="fas fa-clock me-2"></i>Jam Operasional</h6>
                <table class="table table-sm table-striped">
                  <tbody>
                    <tr>
                      <td><strong>Senin - Jumat</strong></td>
                      <td>08:00 - 20:00 WIB</td>
                    </tr>
                    <tr>
                      <td><strong>Sabtu</strong></td>
                      <td>08:00 - 16:00 WIB</td>
                    </tr>
                    <tr>
                      <td><strong>Minggu</strong></td>
                      <td>Tutup</td>
                    </tr>
                  </tbody>
                </table>

                <h6 class="text-primary mb-3 mt-4"><i class="fas fa-phone me-2"></i>Kontak</h6>
                <ul class="list-unstyled">
                  <li><i class="fas fa-phone text-success me-2"></i>Telepon: (021) 1234-5678</li>
                  <li><i class="fas fa-envelope text-primary me-2"></i>Email: perpustakaan@umht.ac.id</li>
                  <li><i class="fas fa-map-marker-alt text-danger me-2"></i>Alamat: Jl. Raya Pd. Gede No.23-25 Nomor
                    23-25, RT.2/RW.1, Dukuh, Kec. Kramat jati, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13550
                  </li>
                </ul>
              </div>
              <div class="col-md-6">
                <h6 class="text-primary mb-3"><i class="fas fa-rules me-2"></i>Peraturan Umum</h6>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item border-0 px-0">
                    <i class="fas fa-check-circle text-success me-2"></i>
                    Wajib menunjukkan kartu identitas
                  </li>
                  <li class="list-group-item border-0 px-0">
                    <i class="fas fa-check-circle text-success me-2"></i>
                    Menjaga ketenangan di area perpustakaan
                  </li>
                  <li class="list-group-item border-0 px-0">
                    <i class="fas fa-check-circle text-success me-2"></i>
                    Tidak diperbolehkan makan dan minum
                  </li>
                  <li class="list-group-item border-0 px-0">
                    <i class="fas fa-check-circle text-success me-2"></i>
                    Handphone dalam mode silent
                  </li>
                </ul>

                <h6 class="text-primary mb-3 mt-4"><i class="fas fa-chart-bar me-2"></i>Statistik</h6>
                <div class="row text-center">
                  <div class="col-4">
                    <div class="bg-light p-3 rounded">
                      <h4 class="text-primary mb-1">15,000+</h4>
                      <small class="text-muted">Koleksi Buku</small>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="bg-light p-3 rounded">
                      <h4 class="text-success mb-1">5,000+</h4>
                      <small class="text-muted">Anggota Aktif</small>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="bg-light p-3 rounded">
                      <h4 class="text-warning mb-1">24/7</h4>
                      <small class="text-muted">Akses Online</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              <i class="fas fa-times me-1"></i>Tutup
            </button>
            <a href="https://maps.google.com/?q=Universitas+Mohammad+Husni+Thamrin" target="_blank"
              class="btn btn-success">
              <i class="fas fa-map-marked-alt me-1"></i>Lihat Lokasi
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>




  <!-- EXTRA
        ================================================== -->
  {{-- Section Utama Perpustakaan --}}
  <section class="bg-img cover-background pb-19 pb-lg-24 secondary-overlay" data-overlay-dark="8"
    data-background="{{ asset('lib/img/bg/bg-02.jpg') }}">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7 mb-1-9 mb-lg-0">
          <div class="section-title02">
            <h2 class="mb-0 ls-minus-2px display-5 font-weight-800 lh-1 w-100 text-white">
              Menyediakan Akses Informasi Ilmiah untuk Mendukung Pendidikan dan Penelitian
            </h2>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="text-start text-lg-end">
            <a href="{{ route('perpustakaan.visi-misi') }}" class="butn-style4 white-hover">
              <span class="text-btn">Lihat Layanan Kami</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="about-style-02" style="background: linear-gradient(135deg, #e6f2ed, #ffffff); padding: 60px 0;">
    <div class="container">
      <div class="row footer-address justify-content-center">
        <div class="col-lg-10">
          <div class="bg-white p-4 shadow border-radius-10 text-center position-relative"
            style="border-radius: 15px;">
            <div class="row align-items-center">
              <!-- Gambar ilustrasi penelitian -->
              <div class="col-md-4 mb-3 mb-md-0">
                <img src="{{ asset('lib/img/icons/research-support-icon.jpg') }}" alt="Ilustrasi Penelitian"
                  class="img-fluid rounded">
              </div>
              <!-- Konten teks -->
              <div class="col-md-8 text-md-start text-center">
                <h4 class="fw-bold text-success">
                  <i class="bi bi-journal-text me-2"></i>INFORMASI PENDUKUNG PENELITIAN
                </h4>
                <p class="mb-3 text-muted">
                  Perpustakaan Universitas Mohammad Husni Thamrin menyediakan berbagai sumber daya digital, jurnal
                  ilmiah,
                  repository, serta layanan data yang dapat menunjang kebutuhan penelitian dosen maupun mahasiswa.
                </p>
                <a href="{{ url('perpustakaan.visi-misi') }}" class="btn btn-success shadow-sm">
                  Jelajahi Sumber Daya
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  {{-- Statistik Perpustakaan --}}
  {{-- <section class="pt-0 pb-0 overflow-visible bg-transparent">
    <div class="container">
      <div class="counter-style01 text-center border-radius-10">
        <div class="row mt-n1-9">

          <div class="col-sm-6 col-lg-4 mt-1-9">
            <div class="display-14 display-md-11 display-lg-8 mb-1 counter-number font-weight-800 text-secondary lh-1">
              <div class="odometer odometer-auto-theme" data-count="10000">0</div>+
            </div>
            <p class="mb-0 opacity9">Koleksi Buku & Referensi</p>
          </div>

          <div class="col-sm-6 col-lg-4 mt-1-9">
            <div class="display-14 display-md-11 display-lg-8 mb-1 counter-number font-weight-800 text-secondary lh-1">
              <div class="odometer odometer-auto-theme" data-count="5000">0</div>+
            </div>
            <p class="mb-0 opacity9">Pengguna Terdaftar</p>
          </div>

          <div class="col-sm-6 col-lg-4 mt-1-9">
            <div class="display-14 display-md-11 display-lg-8 mb-1 counter-number font-weight-800 text-secondary lh-1">
              <div class="odometer odometer-auto-theme" data-count="8">0</div> Jam
            </div>
            <p class="mb-0 opacity9">Jam Operasional Aktif per Hari</p>
          </div>

        </div>
      </div>
    </div>
  </section> --}}



  <!-- Agenda Kegiatan Mendatang
        ================================================== -->
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
        @forelse ($library_events->take(3) as $agenda)
          <div class="col-md-6 col-xl-4">
            <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
              {{-- Gambar Acara --}}
              <div class="position-relative">
                <img src="{{ asset('storage/lib/img/artikel/' . $agenda->images) }}" class="w-100"
                  alt="{{ $agenda->judul }}" style="height: 240px; object-fit: cover;">
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

      {{-- Tombol Lihat Semua --}}
      @if ($library_events->count() > 3)
        <div class="row mt-4">
          <div class="col text-center">
            <a href="{{ url('/agenda') }}" class="btn btn-primary rounded-pill px-4 py-2">
              <i class="bi bi-calendar-check me-2"></i> Lihat Semua Agenda
            </a>
          </div>
        </div>
      @endif
    </div>
  </section>



  <!-- Modal Detail Agenda -->
  <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content border-0 shadow">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title fw-bold" id="detailModalLabel">
            <i class="bi bi-info-circle me-2"></i> Detail Agenda
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <h4 class="fw-bold mb-3" id="modalJudul">-</h4>
          <p class="text-muted" id="modalTanggal">-</p>
          <p class="text-muted mb-2"><i class="bi bi-geo-alt-fill me-2"></i><span id="modalTempat">-</span></p>
          <p class="text-muted mb-2"><i class="bi bi-person-circle me-2"></i><span id="modalPenyelenggara">-</span>
          </p>
          <hr>
          <div id="modalDeskripsi" class="text-muted" style="max-height: 300px; overflow-y: auto;"></div>
        </div>
        <div class="modal-footer bg-light">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="bi bi-x-circle me-2"></i> Tutup
          </button>
        </div>
      </div>
    </div>
  </div>



  <!-- EXTRA
        ================================================== -->
  @php
    $hero = $hero_banner ?? null;
  @endphp

  @if ($hero)
    <section class="bg-img cover-background pb-19 pb-lg-24 secondary-overlay" data-overlay-dark="8"
      data-background="{{ asset('lib/img/clients/' . $hero->background_image) }}">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7 mb-1-9 mb-lg-0">
            <div class="section-title02">
              <h2 class="mb-3 ls-minus-2px display-5 font-weight-800 lh-1 w-100 text-white">
                {{ $hero->title }}
              </h2>
              <h4 class="text-white mb-3">{{ $hero->subtitle }}</h4>
              <p class="text-white">{{ $hero->description }}</p>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="text-start text-lg-end">
              <a href="{{ $hero->button_url }}" class="butn-style4 white-hover">
                <span class="text-btn">{{ $hero->button_text }}</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endif



  <!-- NEWS
        ================================================== -->
  <section class="py-5">
    <div class="container">
      {{-- Judul --}}
      <div class="row mb-5 justify-content-center">
        <div class="col-md-6 text-center">
          <h1 class="fw-bold text-warning">Berita</h1>
          <h4 class="text-success">Berita Perpustakaan UMHT</h4>
          <hr style="border-top: 2px solid #0d4e15; width: 50%; margin: auto;">
        </div>
      </div>

      {{-- Grid Artikel: Maksimal 3 konten --}}
      <div class="row g-4">
        @forelse ($artikels->take(3) as $artikel)
          <div class="col-md-6 col-xl-4">
            <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
              {{-- Gambar & Badge --}}
              <div class="position-relative">
                <img src="{{ asset('lib/img/content/' . $artikel->img) }}" class="w-100"
                  alt="{{ $artikel->judul }}" style="height: 240px; object-fit: cover;">
                <span class="badge bg-primary position-absolute top-0 start-0 m-3 px-3 py-2">
                  {{ ucfirst($artikel->category) }}
                </span>
                <a href="#" class="position-absolute top-0 end-0 m-3 text-white">
                  <i class="far fa-heart"></i>
                </a>
              </div>

              {{-- Konten --}}
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
                  <i class="fas fa-user-circle text-secondary me-2"></i>
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
              <i class="fas fa-info-circle me-2"></i> Data Berita belum tersedia.
            </div>
          </div>
        @endforelse
      </div>

      {{-- Tombol Lihat Semua --}}
      <div class="row mt-4">
        <div class="col text-center">
          <a href="{{ url('/berita-perpus') }}" class="btn btn-success rounded-pill px-4 py-2">
            Lihat Semua Berita
          </a>
        </div>
      </div>
    </div>
  </section>


  <!-- PATNERS
        ================================================== -->
  <section class="client-style01 py-5 bg-light">
    <div class="container">
      {{-- Judul --}}
      <div class="row mb-5 justify-content-center">
        <div class="col-md-8 text-center">
          <h1 class="fw-bold text-warning display-5 mb-2">Mitra Kami</h1>
          <h4 class="text-success mb-3">Institusi & Publisher</h4>
          <hr class="mx-auto" style="border-top: 3px solid #0d4e15; width: 120px;">
        </div>
      </div>

      {{-- Carousel / Grid --}}
      <div class="row justify-content-center g-4">
        @foreach ($partners as $partner)
          <div class="col-6 col-md-4 col-xl-2">
            <div class="position-relative text-center bg-white rounded-4 shadow-sm p-4 h-100 overflow-hidden"
              style="transition: transform 0.3s ease; z-index: 1;">

              {{-- Link & Logo --}}
              <a href="{{ $partner->link ?? '#' }}" target="_blank" class="d-block position-relative"
                style="z-index: 2;">
                <img src="{{ asset('lib/img/clients/' . $partner->logo) }}" alt="{{ $partner->name ?? 'Partner' }}"
                  class="img-fluid mx-auto logo-default" style="max-height: 90px; object-fit: contain;"
                  onmouseover="this.src='{{ asset('lib/img/clients/' . ($partner->hover_logo ?? $partner->logo)) }}'"
                  onmouseout="this.src='{{ asset('lib/img/clients/' . $partner->logo) }}'" />
              </a>

              {{-- Optional Background Image --}}
              @if ($partner->background_image)
                <div class="position-absolute top-0 start-0 w-100 h-100"
                  style="background-image: url('{{ asset('lib/img/clients/' . $partner->background_image) }}');
                       background-size: cover; background-position: center; opacity: 0.1; z-index: 0;">
                </div>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>


  </div>

  @include('home.libs.script')
  @include('home.libs.footer')

  <script>
    const detailModal = document.getElementById('detailModal');
    detailModal.addEventListener('show.bs.modal', function(event) {
      const button = event.relatedTarget;

      document.getElementById('modalJudul').textContent = button.getAttribute('data-judul');
      document.getElementById('modalTanggal').textContent = button.getAttribute('data-tanggal');
      document.getElementById('modalTempat').textContent = button.getAttribute('data-tempat') || '-';
      document.getElementById('modalPenyelenggara').textContent = button.getAttribute('data-penyelenggara') || '-';
      document.getElementById('modalDeskripsi').textContent = button.getAttribute('data-deskripsi');
    });
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Handle modal data population
      const detailModal = document.getElementById('detailModal');

      detailModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;

        // Extract data from button attributes
        const judul = button.getAttribute('data-judul');
        const tanggal = button.getAttribute('data-tanggal');
        const admin = button.getAttribute('data-admin');
        const deskripsi = button.getAttribute('data-deskripsi');
        const link = button.getAttribute('data-link');

        // Update modal content
        document.getElementById('modalJudul').textContent = judul;
        document.getElementById('modalTanggal').textContent = tanggal;
        document.getElementById('modalAdmin').textContent = admin;
        document.getElementById('modalDeskripsi').innerHTML = deskripsi;
        document.getElementById('modalLink').value = link;
        document.getElementById('modalLinkBtn').href = link;
      });

      // Handle copy link functionality
      document.getElementById('copyLinkBtn').addEventListener('click', function() {
        const linkInput = document.getElementById('modalLink');
        linkInput.select();
        linkInput.setSelectionRange(0, 99999); // For mobile devices

        try {
          document.execCommand('copy');

          // Show toast notification
          const toast = new bootstrap.Toast(document.getElementById('copyToast'));
          toast.show();
        } catch (err) {
          console.error('Failed to copy link: ', err);
        }
      });

      // Alternative copy method using Clipboard API (modern browsers)
      if (navigator.clipboard) {
        document.getElementById('copyLinkBtn').addEventListener('click', function() {
          const link = document.getElementById('modalLink').value;

          navigator.clipboard.writeText(link).then(function() {
            // Show toast notification
            const toast = new bootstrap.Toast(document.getElementById('copyToast'));
            toast.show();
          }).catch(function(err) {
            console.error('Failed to copy link: ', err);
          });
        });
      }
    });
  </script>

  <style>
    /* Custom styles for better table appearance */
    .table> :not(caption)>*>* {
      padding: 1rem 0.75rem;
    }

    .table-hover>tbody>tr:hover>td {
      background-color: rgba(13, 110, 253, 0.05);
    }

    .btn-group .btn {
      border-radius: 0.375rem !important;
      margin-right: 0.25rem;
    }

    .btn-group .btn:last-child {
      margin-right: 0;
    }

    /* Modal enhancements */
    .modal-content {
      border-radius: 1rem;
    }

    .modal-header {
      border-radius: 1rem 1rem 0 0;
    }

    .modal-footer {
      border-radius: 0 0 1rem 1rem;
    }

    /* Toast styling */
    .toast {
      border-radius: 0.5rem;
    }

    /* Responsive table improvements */
    @media (max-width: 768px) {
      .table-responsive {
        font-size: 0.875rem;
      }

      .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
      }
    }
  </style>

  {{-- Custom CSS --}}
  <style>
    .btn-outline-primary:hover,
    .btn-outline-success:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .modal-content {
      border-radius: 15px;
      overflow: hidden;
    }

    .accordion-button:not(.collapsed) {
      background-color: #f8f9fa;
      border-color: #dee2e6;
    }

    .list-group-item {
      transition: background-color 0.2s ease;
    }

    .list-group-item:hover {
      background-color: #f8f9fa;
    }

    .bg-light.p-3.rounded:hover {
      transform: scale(1.05);
      transition: transform 0.2s ease;
    }
  </style>
  <style>
    .show-on-hover {
      opacity: 1;
    }

    .hover-on-show {
      opacity: 0;
    }

    a:hover .show-on-hover {
      opacity: 0;
    }

    a:hover .hover-on-show {
      opacity: 1;
    }
  </style>
</body>


<!-- Mirrored from advisorhtml.websitelayout.net/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Mar 2025 07:38:36 GMT -->

</html>
