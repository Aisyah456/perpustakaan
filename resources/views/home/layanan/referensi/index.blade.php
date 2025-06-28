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
            <h1>Layanan Referensi</h1>
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
    <section class="py-5 bg-light">
      <div class="container py-5">
        <h2 class="mb-4 text-center">Layanan Referensi</h2>

        <p class="text-justify">
          Layanan Referensi adalah layanan yang disediakan oleh Perpustakaan Universitas Mohammad Husni Thamrin untuk
          membantu mahasiswa, dosen, dan peneliti dalam menemukan informasi ilmiah yang relevan dan akurat. Layanan ini
          juga membantu dalam penggunaan sumber-sumber informasi seperti jurnal, buku, dan database elektronik.
        </p>

        <h4 class="mt-4">Jenis Layanan:</h4>
        <ul class="list-group list-group-flush mb-4">
          <li class="list-group-item">Bimbingan penggunaan katalog online (OPAC)</li>
          <li class="list-group-item">Pencarian referensi tugas akhir dan karya ilmiah</li>
          <li class="list-group-item">Pendampingan akses jurnal elektronik dan database online</li>
          <li class="list-group-item">Konsultasi penulisan kutipan dan daftar pustaka</li>
        </ul>

        <h4>Prosedur Layanan:</h4>
        <ol class="mb-4">
          <li>Datang langsung ke meja layanan referensi atau isi form konsultasi di bawah.</li>
          <li>Petugas akan membantu sesuai kebutuhan referensi Anda.</li>
          <li>Layanan tersedia selama jam operasional perpustakaan.</li>
        </ol>

        <h4>Jam Layanan:</h4>
        <p>Senin – Jumat: 08.00 – 16.00 WIB<br>Sabtu & Minggu: Tutup</p>

        <h4 class="mt-5">Form Konsultasi Online</h4>
        <form action="{{ route('referensi.kirim') }}" method="POST" class="mt-3">
          @csrf
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Alamat Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="topik" class="form-label">Topik yang Dicari</label>
            <input type="text" class="form-control" id="topik" name="topik"
              placeholder="Contoh: Kesehatan Masyarakat" required>
          </div>
          <div class="mb-3">
            <label for="pesan" class="form-label">Pesan atau Permintaan Khusus</label>
            <textarea class="form-control" id="pesan" name="pesan" rows="4" placeholder="Jelaskan kebutuhan Anda..."
              required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Kirim Permintaan</button>
        </form>

        <p class="mt-5 text-muted text-center"><em>Perpustakaan Universitas Mohammad Husni Thamrin – Meningkatkan
            literasi informasi akademik Anda.</em></p>
      </div>
    </section>


    @include('home.libs.footer')
  </div>
  @include('home.libs.script')

</body>


<!-- Mirrored from elearn.websitelayout.net/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:24 GMT -->

</html>
