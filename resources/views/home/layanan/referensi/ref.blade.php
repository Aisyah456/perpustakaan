<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from elearn.websitelayout.net/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:23 GMT -->

<head>
  @include('home.libs.meta')
  <!-- title  -->
  <title>Layanan Referensi Perpustakaan UMHT - Perpustakaan UMHT</title>
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
      style="position: relative; background-image: url('{{ asset('lib/img/banner/ChatGPT Image May 20, 2025, 04_40_39 PM.png') }}'); background-size: cover; background-position: center;">

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
            <h1>Layanan Referensi</h1>
          </div>
        </div>
      </div>
    </section>



    <!-- Hal Utama
        ================================================== -->
    <section class="py-5">
      <div class="container">
        <h2 class="text-center mb-4">Referensi Per Fakultas & Prodi</h2>

        {{-- Filter --}}
        <form method="GET" action="{{ route('referensi.index') }}" class="row g-3 mb-4">
          <div class="col-md-5">
            <select name="fakultas" class="form-select">
              <option value="">-- Semua Fakultas --</option>
              @foreach ($semuaFakultas as $item)
                <option value="{{ $item }}" {{ $item == $fakultas ? 'selected' : '' }}>{{ $item }}
                </option>
              @endforeach
            </select>
          </div>
          <div class="col-md-5">
            <select name="prodi" class="form-select">
              <option value="">-- Semua Prodi --</option>
              @foreach ($semuaProdi as $item)
                <option value="{{ $item }}" {{ $item == $prodi ? 'selected' : '' }}>{{ $item }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Filter</button>
          </div>
        </form>

        {{-- Tabel Referensi --}}
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead class="table-primary">
              <tr>
                <th>Fakultas</th>
                <th>Program Studi</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Link</th>
              </tr>
            </thead>
            <tbody>
              @forelse($referensi as $item)
                <tr>
                  <td>{{ $item->fakultas }}</td>
                  <td>{{ $item->prodi }}</td>
                  <td>{{ $item->judul }}</td>
                  <td>{{ $item->deskripsi }}</td>
                  <td><a href="{{ $item->link }}" target="_blank" class="btn btn-sm btn-outline-primary">Kunjungi</a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" class="text-center">Tidak ada referensi ditemukan.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>


        {{-- Pagination --}}
        <div class="mt-4 d-flex justify-content-center">
          {{ $referensi->withQueryString()->links() }}
        </div>
      </div>
    </section>



    @include('home.libs.script')
  </div>
  @include('home.libs.footer')



</body>


<!-- Mirrored from elearn.websitelayout.net/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:24 GMT -->

</html>
