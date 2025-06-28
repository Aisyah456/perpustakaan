<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from elearn.websitelayout.net/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:23 GMT -->

<head>
  @include('home.libs.meta')
  <!-- title  -->
  <title>Layanan Cek Turnitin Perpustakaan UMHT - Perpustakaan UMHT</title>
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
            <h1>Cek Turnitin</h1>
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


    <!-- KONTEN
        ================================================== -->
    <section>
      <div class="container">
        <div class="row mt-n2-9">
          <div class="col-lg-8 mt-2-9">
            <div class="card shadow rounded p-4 border-0">
              <article>
                <h4 class="mb-4 wow fadeInUp" data-wow-delay="200ms">📖 Deskripsi Layanan:</h4>
                <p class="mb-4 wow fadeInUp" data-wow-delay="200ms">
                  Layanan Uji Turnitin disediakan oleh Perpustakaan Universitas untuk membantu sivitas akademika,
                  khususnya mahasiswa tingkat akhir,
                  dalam memeriksa tingkat kemiripan (similarity index) karya tulis ilmiah seperti skripsi, tesis, maupun
                  artikel ilmiah.
                </p>
                <p class="mb-4 wow fadeInUp" data-wow-delay="200ms">
                  Dengan sistem Turnitin, mahasiswa dapat memastikan karya mereka orisinal dan bebas dari plagiarisme
                  sebelum diajukan untuk proses akademik.
                </p>

                <h4 class="mb-4 wow fadeInUp" data-wow-delay="200ms">🎯 Tujuan:</h4>
                <ul>
                  <li class="mb-4 wow fadeInUp" data-wow-delay="200ms">Mendorong budaya akademik yang jujur dan etis.
                  </li>
                  <li class="mb-4 wow fadeInUp" data-wow-delay="200ms">Mencegah plagiarisme dalam penulisan karya
                    ilmiah.</li>
                  <li class="mb-4 wow fadeInUp" data-wow-delay="200ms">Membantu mahasiswa mengevaluasi kutipan dan
                    parafrase dengan tepat.</li>
                </ul>

                <h4 class="mb-4 wow fadeInUp" data-wow-delay="200ms">📌 Ketentuan Uji Turnitin:</h4>
                <ul>
                  <li class="mb-4 wow fadeInUp" data-wow-delay="200ms">
                    Mahasiswa hanya dapat mengajukan maksimal <strong>2 kali pengecekan naskah.</strong>
                  </li>
                  <li class="mb-4 wow fadeInUp" data-wow-delay="200ms">
                    File yang dikirim harus dalam format <strong>.docx</strong> atau <strong>.pdf</strong> dan maksimal
                    ukuran file <strong>20 MB</strong>.
                  </li>
                  <li class="mb-4 wow fadeInUp" data-wow-delay="200ms">
                    Naskah yang diajukan harus sudah <strong>final</strong> dan tidak dalam proses revisi.
                  </li>
                  <li class="mb-4 wow fadeInUp" data-wow-delay="200ms">
                    Cek Turnitin hanya diperuntukkan untuk <strong>karya asli mahasiswa</strong> (tidak menerima karya
                    orang lain).
                  </li>
                </ul>

                <h4 class="mb-4 wow fadeInUp" data-wow-delay="200ms">📝 Cara Pengajuan:</h4>
                <ol>
                  <li class="mb-4 wow fadeInUp" data-wow-delay="200ms">
                    Siapkan file naskah karya ilmiah (format <strong>.docx</strong> / <strong>.pdf</strong>).
                  </li>
                  <li class="mb-4 wow fadeInUp" data-wow-delay="200ms">
                    Isi formulir pengajuan uji Turnitin melalui link berikut:<br>
                    👉 <a href="/turnitin" class="text-primary fw-bold">Formulir Uji Turnitin</a>
                  </li>
                  <li class="mb-4 wow fadeInUp" data-wow-delay="200ms">
                    Tunggu email konfirmasi dari petugas perpustakaan.
                  </li>
                  <li class="mb-4 wow fadeInUp" data-wow-delay="200ms">
                    Hasil similarity akan dikirimkan melalui email maksimal <strong>2x24 jam</strong> setelah pengajuan.
                  </li>
                </ol>

                <div class="mt-5 text-center">
                  <a href="/turnitin" class="btn btn-primary btn-lg rounded-pill px-4">Ajukan Uji Turnitin</a>
                </div>
              </article>
            </div>
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
