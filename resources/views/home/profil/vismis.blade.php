<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from elearn.websitelayout.net/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:13 GMT -->

<head>
  @include('home.libs.meta')
  <!-- title  -->
  <title>Vsi Misi || Perpustakaan UMHT</title>
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
            <h1>Visi Misi Perpustakaan</h1>
          </div>
          <div class="col-md-12">
            <ul>
              <li><a href="/Home">Home</a></li>
              <li><a href="#!">Profil</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>


    <!-- ABOUTUS
        ================================================== -->
    <section>
      <div class="container">
        <div class="row">
          {{-- Sidebar Navigasi Layanan --}}
          <div class="col-lg-4 order-2 order-lg-1">
            <div class="sidebar pe-xl-4">
              <div class="widget widget-nav-menu wow fadeInUp" data-wow-delay="200ms">
                <h4 class="widget-title text-white">Layanan Perpustakaan</h4>
                <div class="widget-body">
                  <ul class="list-style4">
                    <li><a href="{{ route('layanan.referensi') }}">Layanan Referensi</a></li>
                    <li><a href="{{ route('layanan.sirkulasi') }}">Layanan Sirkulasi</a></li>
                    <li><a href="{{ route('turnitin.form') }}">Layanan Uji Turnitin</a>
                    </li>
                    <li><a href="{{ route('layanan.pustaka') }}">Layanan Bebas
                        Pustaka</a></li>
                    <li><a href="{{ route('cek-pinjaman') }}">Cek Pinjaman Buku</a></li>
                    <li class="active"><a href="{{ route('perpustakaan.visi-misi') }}">Visi & Misi</a></li>
                  </ul>
                </div>
              </div>

              <div class="widget widget-address wow fadeInUp" data-wow-delay="200ms">
                <h4 class="widget-title text-white">Kontak Perpustakaan</h4>
                <div class="widget-body">
                  <div class="d-flex align-items-center mb-4">
                    <div class="flex-shrink-0">
                      <div class="contact-icon">
                        <i class="far fa-envelope"></i>
                      </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <h6 class="mb-1">Email</h6>
                      <p class="mb-0">perpustakaan@umht.ac.id</p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center mb-4">
                    <div class="flex-shrink-0">
                      <div class="contact-icon">
                        <i class="fas fa-phone-alt"></i>
                      </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <h6 class="mb-1">Telepon</h6>
                      <p class="mb-0">(021) 1234 5678</p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                      <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                      </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <h6 class="mb-1">Alamat</h6>
                      <p class="mb-0">Universitas Mohammad Husni Thamrin, Jakarta</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          {{-- Konten Visi dan Misi --}}
          <div class="col-lg-8 order-1 order-lg-2 mb-2-9 mb-lg-0">
            <div class="wow fadeInUp" data-wow-delay="200ms">
              <h2 class="mb-4">📖 Visi & Misi Perpustakaan</h2>

              <div class="mb-4">
                <h4 class="text-primary">🎯 Visi</h4>
                <p class="text-dark">
                  Menjadi pusat informasi dan sumber belajar yang modern, inklusif, dan berdaya saing untuk mendukung
                  pendidikan, penelitian, dan pengabdian kepada masyarakat di lingkungan Universitas Mohammad Husni
                  Thamrin.
                </p>
              </div>

              <div>
                <h4 class="text-primary">🚀 Misi</h4>
                <ul class="list-style4 text-dark">
                  <li>Menyediakan layanan informasi yang cepat, akurat, dan mudah diakses bagi sivitas akademika.</li>
                  <li>Mengembangkan koleksi bahan pustaka cetak dan digital yang relevan dan berkualitas.</li>
                  <li>Meningkatkan literasi informasi dan keterampilan pencarian sumber belajar bagi pengguna.</li>
                  <li>Memanfaatkan teknologi informasi untuk menunjang sistem manajemen perpustakaan secara efisien.
                  </li>
                  <li>Menjalin kerja sama dengan perpustakaan dan institusi lain dalam pengembangan sumber daya
                    informasi.</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    @include('home.libs.footer')
  </div>
  @include('home.libs.script')


</body>


<!-- Mirrored from elearn.websitelayout.net/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:15 GMT -->

</html>
