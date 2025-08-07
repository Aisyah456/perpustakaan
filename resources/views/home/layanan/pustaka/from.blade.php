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
            <h1>Bebas Pustakas</h1>
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

      <article>
        <div class="container py-5">
          <h3 class="mb-4">🧪 Formulir Bebas Pustaka</h3>

          @if (session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @endif

          <form action="/bebas-pustaka" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
              <label for="nama" class="form-label">Nama Lengkap</label>
              <input type="text" id="nama" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="nim" class="form-label">NIM</label>
              <input type="text" id="nim" name="nim" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="prodi" class="form-label">Program Studi</label>
              <input type="text" id="prodi" name="prodi" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email Aktif</label>
              <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="kontak" class="form-label">Nomor Kontak</label>
              <input type="text" id="kontak" name="kontak" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="file" class="form-label">Upload Surat Pengantar (opsional)</label>
              <input type="file" id="file" name="file" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Kirim Pengajuan</button>
          </form>
        </div>
      </article>
  </div>



  </section>
  @include('home.libs.script')
  </div>s
  @include('home.libs.footer')



</body>


<!-- Mirrored from elearn.websitelayout.net/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:24 GMT -->

</html>
