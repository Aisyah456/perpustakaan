<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from elearn.websitelayout.net/faq.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:16 GMT -->

<head>
  <!-- metas -->
  @include('home.libs.meta')
  <!-- title  -->
  <title>Layanan & Fasilitas Perpustakaan UMHT | Perpustakaan UMHT</title>

  <!-- favicon -->
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
    <section class="page-title-section bg-img cover-background top-position1 left-overlay-dark" data-overlay-dark="9"
      data-background="{{ asset('lib/img/banner/page-title.jpg') }}">
      <div class="container">
        <div class="row text-center">
          <div class="col-md-12">
            <h1>Layanan Sirkulasi Perpustakaan UMHT</h1>
          </div>

        </div>
      </div>
    </section>


    <!-- SERVICES
        ================================================== -->
    <section class="bg-light">
      <div class="container py-5">
        <h1 class="text-2xl font-bold mb-4 text-blue-800">Layanan Sirkulasi</h1>

        <p class="mb-4 text-gray-700">
          Layanan Sirkulasi di Perpustakaan Universitas Mohammad Husni Thamrin memberikan kemudahan bagi civitas
          akademika dalam melakukan peminjaman dan pengembalian koleksi perpustakaan, seperti buku teks, referensi, dan
          koleksi lainnya.
        </p>

        <h2 class="text-xl font-semibold text-blue-700 mt-6 mb-2">Jenis Layanan Sirkulasi</h2>
        <ul class="list-disc pl-5 text-gray-700 mb-4">
          <li>Peminjaman Buku</li>
          <li>Pengembalian Buku</li>
          <li>Perpanjangan Masa Pinjam</li>
          <li>Pembayaran Denda</li>
          <li>Cek Riwayat dan Status Pinjaman</li>
        </ul>

        <h2 class="text-xl font-semibold text-blue-700 mt-6 mb-2">Ketentuan Peminjaman</h2>
        <ul class="list-disc pl-5 text-gray-700 mb-4">
          <li>Mahasiswa aktif dapat meminjam maksimal 3 buku sekaligus</li>
          <li>Masa pinjam selama 7 hari dan dapat diperpanjang 1 kali jika tidak ada reservasi</li>
          <li>Peminjaman hanya dapat dilakukan dengan menunjukkan kartu identitas mahasiswa</li>
        </ul>

        <h2 class="text-xl font-semibold text-blue-700 mt-6 mb-2">Pengembalian dan Denda</h2>
        <ul class="list-disc pl-5 text-gray-700 mb-4">
          <li>Keterlambatan pengembalian dikenakan denda Rp 1.000,- per hari per buku</li>
          <li>Denda dapat dibayarkan langsung di layanan sirkulasi</li>
          <li>Buku yang rusak atau hilang wajib diganti sesuai ketentuan perpustakaan</li>
        </ul>

        <h2 class="text-xl font-semibold text-blue-700 mt-6 mb-2">Jam Layanan Sirkulasi</h2>
        <table class="table-auto border-collapse border border-gray-300 mb-6 text-gray-700">
          <thead>
            <tr class="bg-blue-100">
              <th class="border border-gray-300 px-4 py-2">Hari</th>
              <th class="border border-gray-300 px-4 py-2">Jam Layanan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="border border-gray-300 px-4 py-2">Senin - Jumat</td>
              <td class="border border-gray-300 px-4 py-2">08.00 - 16.00 WIB</td>
            </tr>
            <tr>
              <td class="border border-gray-300 px-4 py-2">Sabtu</td>
              <td class="border border-gray-300 px-4 py-2">08.00 - 12.00 WIB</td>
            </tr>
          </tbody>
        </table>

        <h2 class="text-xl font-semibold text-blue-700 mt-6 mb-2">Kontak Layanan</h2>
        <p class="text-gray-700">
          Untuk informasi lebih lanjut terkait layanan sirkulasi, silakan hubungi petugas perpustakaan melalui email: <a
            href="mailto:perpustakaan@thamrin.ac.id"
            class="text-blue-600 hover:underline">perpustakaan@thamrin.ac.id</a> atau kunjungi langsung ruang sirkulasi
          di lantai 1 Gedung Perpustakaan.
        </p>
      </div>
    </section>



    <!-- FOOTER
        ================================================== -->
    @include('home.libs.footer')
  </div>

  <!-- BUY TEMPLATE
    ================================================== -->
  @include('home.libs.script')

</body>

<!-- Mirrored from elearn.websitelayout.net/faq.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:16 GMT -->

</html>
