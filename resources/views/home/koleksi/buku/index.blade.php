<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from elearn.websitelayout.net/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:23 GMT -->

<head>
  @include('home.libs.meta')
  <!-- title  -->
  <title>Koleksi Buku Perpustakaan UMHT - Perpustakaan UMHT</title>
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
            <h1>Koleksi Buku </h1>
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
      <div class="container py-5">
        <h1 class="text-2xl font-bold mb-4">Koleksi Buku Perpustakaan</h1>

        <form method="GET" action="{{ route('koleksi.buku') }}" class="mb-4 flex flex-wrap gap-2">
          <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul atau penulis..."
            class="border p-2 rounded w-full md:w-1/3">
          <select name="kategori" class="border p-2 rounded">
            <option value="">-- Semua Kategori --</option>
            @foreach ($kategoris as $kategori)
              <option value="{{ $kategori->id }}" {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                {{ $kategori->nama }}
              </option>
            @endforeach
          </select>
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Cari</button>
        </form>

        @if ($bukus->count())
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($bukus as $buku)
              <div class="border rounded-lg shadow hover:shadow-lg transition p-4 bg-white">
                <h2 class="text-lg font-semibold">{{ $buku->judul }}</h2>
                <p class="text-sm text-gray-600">Penulis: {{ $buku->penulis }}</p>
                <p class="text-sm text-gray-600">Penerbit: {{ $buku->penerbit }}</p>
                <p class="text-sm text-gray-600">Tahun: {{ $buku->tahun_terbit }}</p>
                <p class="mt-2 text-sm text-gray-700">{{ Str::limit($buku->deskripsi, 100) }}</p>
                <a href="{{ route('buku.detail', $buku->id) }}"
                  class="text-blue-500 hover:underline mt-2 inline-block">Lihat Detail</a>
              </div>
            @endforeach
          </div>

          <div class="mt-6">
            {{ $bukus->withQueryString()->links() }}
          </div>
        @else
          <p class="text-gray-600">Tidak ada buku yang ditemukan.</p>
        @endif
      </div>
    </section>

    @include('home.libs.footer')
  </div>
  @include('home.libs.script')

</body>


<!-- Mirrored from elearn.websitelayout.net/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:24 GMT -->

</html>
