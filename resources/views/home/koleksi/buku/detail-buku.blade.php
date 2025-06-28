<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from elearn.websitelayout.net/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:23 GMT -->

<head>
  @include('home.libs.meta')
  <!-- title  -->
  <title>Detail Koleksi Perpustakaan UMHT - Perpustakaan UMHT</title>
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
            <h1>Detaik Koleksi Buku</h1>
          </div>
          <div class="col-md-12">
            <ul>
              <li><a href="/Home">Home</a></li>
              <li><a href="#!">Layanan</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>



    <section>
      <div class="container py-6">
        <div class="bg-white rounded-lg shadow p-6">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
              @if ($buku->cover)
                <img src="{{ asset('storage/cover/' . $buku->cover) }}" alt="Cover {{ $buku->judul }}"
                  class="rounded w-full">
              @else
                <div class="bg-gray-200 w-full h-64 flex items-center justify-center text-gray-500">
                  Tidak ada cover
                </div>
              @endif
            </div>
            <div class="md:col-span-2">
              <h1 class="text-2xl font-bold mb-2">{{ $buku->judul }}</h1>
              <p class="text-sm text-gray-600 mb-1">Penulis: <strong>{{ $buku->penulis }}</strong></p>
              <p class="text-sm text-gray-600 mb-1">Penerbit: {{ $buku->penerbit }}</p>
              <p class="text-sm text-gray-600 mb-1">Tahun Terbit: {{ $buku->tahun_terbit }}</p>
              <p class="text-sm text-gray-600 mb-1">Kategori: {{ $buku->kategori->nama ?? '-' }}</p>
              <div class="mt-4">
                <h2 class="font-semibold">Deskripsi:</h2>
                <p class="text-gray-700 mt-2">{{ $buku->deskripsi }}</p>
              </div>
            </div>
          </div>
          <div class="mt-6">
            <a href="{{ route('koleksi.buku') }}" class="text-blue-600 hover:underline">&larr; Kembali ke Koleksi</a>
          </div>
        </div>
      </div>
    </section>

    @include('home.libs.footer')
  </div>
  @include('home.libs.script')

</body>


<!-- Mirrored from elearn.websitelayout.net/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:24 GMT -->

</html>
