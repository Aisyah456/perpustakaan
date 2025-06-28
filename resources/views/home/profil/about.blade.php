<!DOCTYPE html>
<html lang="en">

<head>
  @include('home.libs.meta')
  <!-- title  -->
  <title>Profil-perpustakan-UMHT - Perpustakaan UMHT</title>
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
            <h1>Tentang Kami</h1>
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
    <div class="container py-10">
      <h1 class="text-3xl font-bold text-center mb-6">Tentang Kami</h1>

      <div class="bg-white shadow-md rounded-lg p-6 leading-relaxed text-justify">
        <p class="mb-4">
          Perpustakaan Universitas Mohammad Husni Thamrin merupakan pusat informasi dan pengetahuan yang mendukung
          kegiatan akademik dan penelitian civitas akademika. Didirikan sebagai bagian integral dari universitas,
          perpustakaan kami menyediakan koleksi bahan pustaka yang lengkap dan terus diperbarui sesuai kebutuhan
          pengguna.
        </p>

        <p class="mb-4">
          Kami menyediakan layanan referensi, sirkulasi, akses jurnal digital, layanan Turnitin, serta layanan bebas
          pustaka. Dengan dukungan teknologi informasi dan sumber daya manusia yang kompeten, perpustakaan berkomitmen
          memberikan layanan terbaik untuk menunjang pembelajaran, penelitian, dan pengabdian masyarakat.
        </p>

        <p class="mb-4">
          Visi kami adalah menjadi perpustakaan modern yang inovatif dan responsif terhadap perkembangan zaman. Misi
          kami meliputi pengembangan koleksi berbasis kurikulum, pelayanan prima berbasis teknologi, serta mendukung
          pengembangan literasi informasi bagi seluruh pengguna.
        </p>

        <h2 class="text-xl font-semibold mt-6 mb-2">Fasilitas yang Tersedia:</h2>
        <ul class="list-disc list-inside mb-4 text-gray-700">
          <li>Ruang baca nyaman & ber-AC</li>
          <li>Akses internet & Wi-Fi</li>
          <li>Komputer untuk pencarian katalog</li>
          <li>Koleksi digital dan e-journal</li>
          <li>Layanan bimbingan penelusuran informasi</li>
        </ul>

        <h2 class="text-xl font-semibold mt-6 mb-2">Kontak Kami:</h2>
        <p class="text-gray-700">
          Perpustakaan Universitas Mohammad Husni Thamrin<br>
          Jl. Raya Pondok Gede No.23, Kramat Jati, Jakarta Timur<br>
          Email: <a href="mailto:perpustakaan@thamrin.ac.id"
            class="text-blue-600 hover:underline">perpustakaan@thamrin.ac.id</a><br>
          Telepon: (021) 8778 9000 ext. 104
        </p>
      </div>

      <div class="mt-8 text-center">
        <a href="{{ url('/Home') }}" class="text-blue-600 hover:underline">&larr; Kembali ke Beranda</a>
      </div>
    </div>

    @include('home.libs.footer')
  </div>
  @include('home.libs.script')


</body>


<!-- Mirrored from elearn.websitelayout.net/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:15 GMT -->

</html>
