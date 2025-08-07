<!DOCTYPE html>
<html lang="en">

<head>
  <!-- metas -->
  @include('home.libs.meta')
  <!-- title  -->
  <title>Tentang Perpustakaan UMHT - Perpustakaan UMHT</title>
  @include('home.libs.link')

</head>

<body>

  <!-- PAGE LOADING -->
  <div id="preloader"></div>

  <!-- MAIN WRAPPER -->
  <div class="main-wrapper">

    <!-- HEADER -->
    @include('home.libs.menu')

    <!-- PAGE TITLE -->
    <section class="page-title-section bg-img cover-background top-position1 left-overlay-dark" data-overlay-dark="9"
      data-background="{{ asset('lib/img/banner/page-title.jpg') }}">
      <div class="container">
        <div class="row text-center">
          <div class="col-12">
            <h1>Tentang Perpustakaan UMHT</h1>
          </div>
          <div class="col-12">
            <ul class="flex flex-col md:flex-row justify-center space-y-1 md:space-y-0 md:space-x-4">
              <li><a href="index-2.html">Home</a></li>
              <li><a href="#!">Tentang Perpustakaan</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container mx-auto px-4">
        <div class="col-12">
          <div class="text-center mb-5">
            <img src="{{ asset('lib/img/portfolio/portfolio-details-01.jpg') }}"
              class="primary-shadow border-radius-5 responsive-image" alt="...">
          </div>

          <h3>Sejarah Perpustakan UMHT</h3>
          <p class="mb-4">Perpustakaan Universitas Mohammad Husni Thamrin didirikan untuk mendukung
            kebutuhan akademik dan penelitian sivitas akademika. Sejak awal berdirinya, perpustakaan ini
            terus berkembang dalam koleksi, layanan, dan fasilitas untuk menyediakan akses informasi yang
            relevan dan terkini. Dengan fokus pada literatur digital dan cetak, perpustakaan ini menjadi
            pusat pembelajaran yang mendukung visi universitas untuk mencetak lulusan berkualitas tinggi.
          </p>
          <p class="mb-4">Perpustakaan UMHT menawarkan berbagai layanan, seperti akses ke jurnal akademik,
            buku referensi, e-book, dan database penelitian yang diakui secara internasional. Selain itu,
            perpustakaan ini menyediakan ruang baca yang nyaman, layanan konsultasi pustaka, dan pelatihan
            literasi informasi untuk meningkatkan keterampilan riset mahasiswa dan dosen.</p>
          <p class="mb-4">Sebagai upaya mendukung transformasi digital, perpustakaan UMHT juga dilengkapi
            dengan teknologi modern, seperti katalog daring, layanan peminjaman otomatis, dan ruang
            multimedia. Dengan fasilitas ini, mahasiswa dapat mengakses sumber informasi kapan saja dan di
            mana saja.</p>
          <p class="mb-4">Komitmen perpustakaan ini adalah untuk menjadi mitra utama dalam proses
            pembelajaran dan penelitian, memastikan setiap anggota sivitas akademika mendapatkan akses ke
            sumber daya informasi berkualitas demi mendukung prestasi akademik dan inovasi.</p>

          <div class="row mt-4">
            <div class="col-lg-6 mb-4">
              <div class="card border-radius-5 h-100 border-color-light-black">
                <div class="card-body py-4 px-3">
                  <h3 class="h5">Challenges</h3>
                  <ul class="list-style1 list-unstyled mb-0">
                    <li>In a free hour, when our force of decision is unhampered.</li>
                    <li>Certain conditions claims obligation or the commitments.</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="card border-radius-5 h-100 border-color-light-black">
                <div class="card-body py-4 px-3">
                  <h3 class="h5">Solutions</h3>
                  <ul class="list-style1 mb-0 list-unstyled">
                    <li>Renounced and inconveniences acknowledged.</li>
                    <li>Force of decision is unrestricted and when nothing.</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row bg-secondary border-radius-5 mb-4 p-4 text-center">
          <div class="col-sm-6 col-lg-3 mx-auto">
            <div class="d-flex justify-content-center align-items-center">
              <div class="ms-3">
                <h4 class="mb-1 h5 text-white">VISI &amp; MISI</h4>
                <span class="text-white opacity9">
                  Perpustakaan Universitas Mohammad Husni Thamrin
                </span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section>
      <div class="container mx-auto px-4">
        <div class="col-12">
          <div class="text-center mb-5">
            <div class="row bg-secondary border-radius-5 mb-4 p-4 text-center">
              <div class="col-sm-6 col-lg-3 mx-auto">
                <div class="d-flex justify-content-center align-items-center">
                  <div class="ms-3">
                    <h4 class="mb-1 h5 text-white">VISI &amp; MISI</h4>
                    <span class="text-white opacity9">
                      Perpustakaan Universitas Mohammad Husni Thamrin
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mt-4">
              <div class="col-lg-6 mb-4">
                <div class="card border-radius-5 h-100 border-color-light-black">
                  <div class="card-body py-4 px-3">
                    <h3 class="h5">Challenges</h3>
                    <ul class="list-style1 list-unstyled mb-0">
                      <li>In a free hour, when our force of decision is unhampered.</li>
                      <li>Certain conditions claims obligation or the commitments.</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div class="card border-radius-5 h-100 border-color-light-black">
                  <div class="card-body py-4 px-3">
                    <h3 class="h5">Solutions</h3>
                    <ul class="list-style1 mb-0 list-unstyled">
                      <li>Renounced and inconveniences acknowledged.</li>
                      <li>Force of decision is unrestricted and when nothing.</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

    </section>

    @include('home.libs.script')
  </div>
  @include('home.libs.footer')

</body>

</html>
