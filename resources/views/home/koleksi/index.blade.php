<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from elearn.websitelayout.net/faq.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:16 GMT -->

<head>
  @include('home.libs.meta')
  <!-- title  -->
  <title>Perpanduan Layanan Perpustakaan UMHT - Perpustakaan UMHT</title>
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
            <h1>Panduan Layanan </h1>
          </div>
          <div class="col-md-12">
            <ul>
              <li><a href="/Home">Home</a></li>
              <li><a href="#!">Panduan</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- FAQ
        ================================================== -->
    <section>
      <div class="container py-5">
        <h2 class="mb-4 text-center">Panduan Layanan Perpustakaan</h2>

        <p class="text-justify">
          Panduan ini disusun untuk memudahkan civitas akademika Universitas Mohammad Husni Thamrin dalam memanfaatkan
          berbagai layanan yang tersedia di perpustakaan. Setiap pengguna diharapkan membaca dan memahami panduan ini
          sebelum menggunakan fasilitas perpustakaan.
        </p>

        <h4 class="mt-5">1. Jenis Layanan Perpustakaan</h4>
        <ul class="list-group list-group-flush mb-4">
          <li class="list-group-item">Layanan Sirkulasi (Peminjaman dan Pengembalian Buku)</li>
          <li class="list-group-item">Layanan Referensi dan Konsultasi</li>
          <li class="list-group-item">Layanan Bebas Pustaka</li>
          <li class="list-group-item">Layanan Turnitin (Cek Plagiarisme)</li>
          <li class="list-group-item">Layanan Usulan Buku</li>
          <li class="list-group-item">Akses Koleksi Digital & E-Resources</li>
        </ul>

        <h4>2. Prosedur Umum Penggunaan Layanan</h4>
        <ol class="mb-4">
          <li>Pengguna wajib menunjukkan Kartu Tanda Mahasiswa (KTM) atau identitas resmi saat menggunakan layanan.</li>
          <li>Peminjaman buku dilakukan melalui sistem komputer perpustakaan atau secara online (jika tersedia).</li>
          <li>Buku yang dipinjam harus dikembalikan tepat waktu sesuai tanggal jatuh tempo.</li>
          <li>Pengguna dapat mengakses layanan konsultasi dan referensi dengan mengisi form online atau mengunjungi
            petugas referensi.</li>
          <li>Untuk layanan Turnitin dan Bebas Pustaka, pengguna harus mengajukan permintaan melalui form yang telah
            disediakan.</li>
        </ol>

        <h4>3. Etika Penggunaan Perpustakaan</h4>
        <ul class="list-group mb-4">
          <li class="list-group-item">Menjaga ketenangan dan tidak membuat keributan di ruang baca.</li>
          <li class="list-group-item">Tidak diperbolehkan makan dan minum di dalam ruang koleksi dan ruang baca.</li>
          <li class="list-group-item">Menjaga kebersihan dan keamanan fasilitas perpustakaan.</li>
          <li class="list-group-item">Melaporkan kerusakan atau kehilangan koleksi kepada petugas.</li>
        </ul>

        <h4>4. Jam Operasional Perpustakaan</h4>
        <p>
          Senin – Jumat: 08.00 – 16.00 WIB<br>
          Sabtu – Minggu & Libur Nasional: Tutup
        </p>

        <h4>5. Informasi Tambahan</h4>
        <p>
          Untuk informasi lebih lanjut mengenai panduan dan prosedur layanan, silakan hubungi petugas perpustakaan atau
          kirim email ke:<br>
          📧 <a href="mailto:perpustakaan@thamrin.ac.id">perpustakaan@thamrin.ac.id</a>
        </p>

        <p class="mt-5 text-muted text-center">
          <em>Perpustakaan Universitas Mohammad Husni Thamrin — Mendukung kegiatan akademik melalui layanan informasi
            yang profesional.</em>
        </p>
      </div>
      <div class="container py-5">
        <h2 class="mb-4 text-center">Panduan Layanan Perpustakaan</h2>

        @foreach ($library_guides as $item)
          <div class="mb-4">
            <h4>{{ $item->judul }}</h4>
            <p class="text-justify">{{ $item->deskripsi }}</p>
          </div>
        @endforeach

        <hr>

        <h5>Unduh Panduan Lengkap (PDF)</h5>
        <p>
          📥 <a href="{{ asset('storage/panduan/panduan-layanan-perpustakaan.pdf') }}" target="_blank">
            Klik di sini untuk mengunduh panduan layanan perpustakaan (PDF)
          </a>
        </p>
      </div>
    </section>





    @include('home.libs.footer')
  </div>
  @include('home.libs.script')
</body>

<!-- Mirrored from elearn.websitelayout.net/faq.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:16 GMT -->

</html>
