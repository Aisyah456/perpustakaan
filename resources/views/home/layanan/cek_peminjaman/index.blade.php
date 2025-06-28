<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from elearn.websitelayout.net/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:23 GMT -->

<head>
  @include('home.libs.meta')
  <!-- title  -->
  <title>Layanan Cek Peminjaman Buku Perpustakaan UMHT - Perpustakaan UMHT</title>
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
            <h1>Cek Pinnjaman Buku</h1>
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



    <!-- Hal Utama
        ================================================== -->
    <section>
      <div class="container my-5">
        <h2 class="text-center mb-4">📖 Cek Pinjaman Buku</h2>

        <div class="card shadow-sm p-4 mb-4">
          <p class="mb-2">
            Layanan ini memungkinkan pengguna perpustakaan Universitas Mohammad Husni Thamrin untuk melihat status buku
            yang sedang dipinjam, jatuh tempo pengembalian, dan riwayat peminjaman.
          </p>
          <ul>
            <li>🔍 Masukkan NIM Anda untuk melihat informasi pinjaman buku.</li>
            <li>⏳ Informasi jatuh tempo ditampilkan untuk membantu pengembalian tepat waktu.</li>
            <li>📚 Riwayat peminjaman ditampilkan berdasarkan NIM terdaftar.</li>
          </ul>
        </div>

        <form action="{{ route('cek-pinjaman') }}" method="GET" class="mb-4">
          <div class="input-group">
            <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM Anda..." required>
            <button type="submit" class="btn btn-primary">Cek Pinjaman</button>
          </div>
        </form>

        @if (isset($loans) && count($loans))
          <h5>Hasil untuk NIM: <strong>{{ request('nim') }}</strong></h5>
          <table class="table table-striped table-bordered mt-3">
            <thead class="table-dark">
              <tr>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Jatuh Tempo</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($loans as $loan)
                <tr>
                  <td>{{ $loan->judul_buku }}</td>
                  <td>{{ \Carbon\Carbon::parse($loan->tanggal_pinjam)->translatedFormat('d M Y') }}</td>
                  <td>{{ \Carbon\Carbon::parse($loan->tanggal_kembali)->translatedFormat('d M Y') }}</td>
                  <td>
                    @if (now()->gt($loan->tanggal_kembali))
                      <span class="badge bg-danger">Terlambat</span>
                    @else
                      <span class="badge bg-success">Aktif</span>
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @elseif(request()->has('nim'))
          <div class="alert alert-warning">Tidak ada pinjaman ditemukan untuk NIM tersebut.</div>
        @endif
      </div>
    </section>

    @include('home.libs.footer')
  </div>
  @include('home.libs.script')

</body>


<!-- Mirrored from elearn.websitelayout.net/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:24 GMT -->

</html>
