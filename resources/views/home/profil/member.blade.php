<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from elearn.websitelayout.net/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:13 GMT -->

<head>
  @include('home.libs.meta')
  <!-- title  -->
  <title>Profil - Struktur Organisasi Perpustakaan</title>
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
            <h1>Struktur Organisasi</h1>
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



    <!-- ONLINE INSTRUCTORS
        ================================================== -->
    <div class="container py-5">
      <h1 class="text-center mb-4 text-2xl font-bold">Struktur Organisasi Perpustakaan</h1>

      <div class="flex justify-center mb-8">
        <div class="bg-white p-6 shadow-lg rounded-xl text-center w-full max-w-md">
          <h2 class="text-xl font-semibold text-blue-800">Kepala Perpustakaan</h2>
          <p class="text-gray-600">Dr. Ahmad Syafii, M.Pd</p>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white p-6 shadow-md rounded-lg">
          <h3 class="text-lg font-semibold text-green-700">Kepala Layanan Referensi</h3>
          <p class="text-gray-600">Ibu Sri Wahyuni, S.IP</p>
        </div>
        <div class="bg-white p-6 shadow-md rounded-lg">
          <h3 class="text-lg font-semibold text-green-700">Kepala Layanan Sirkulasi</h3>
          <p class="text-gray-600">Bapak Dedi Kurniawan, S.Hum</p>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 shadow-sm rounded-md">
          <h4 class="text-md font-semibold text-indigo-600">Bagian Administrasi</h4>
          <p class="text-gray-600">Nurhaliza, A.Md</p>
        </div>
        <div class="bg-white p-6 shadow-sm rounded-md">
          <h4 class="text-md font-semibold text-indigo-600">Teknisi & Digitalisasi</h4>
          <p class="text-gray-600">Andri Firmansyah</p>
        </div>
        <div class="bg-white p-6 shadow-sm rounded-md">
          <h4 class="text-md font-semibold text-indigo-600">Petugas Layanan Pengguna</h4>
          <p class="text-gray-600">Fatmawati, S.IIP</p>
        </div>
      </div>

      <div class="mt-10 text-center">
        <a href="{{ url('/Home') }}" class="text-blue-600 hover:underline">&larr; Kembali ke Beranda</a>
      </div>
    </div>

    @include('home.libs.footer')
  </div>
  @include('home.libs.script')


</body>


<!-- Mirrored from elearn.websitelayout.net/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:15 GMT -->

</html>
