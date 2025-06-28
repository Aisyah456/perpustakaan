<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from elearn.websitelayout.net/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:23 GMT -->

<head>
  @include('home.libs.meta')
  <!-- title  -->
  <title>Form Cek Turnitin - Perpustakaan UMHT</title>
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
            <h1>form Cek Turnitin</h1>
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
      <article>
        <div class="container mt-5">
          <h3 class="mb-4">🧪 Form Pengajuan Uji Turnitin</h3>
          @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif
          <form action="{{ route('turnitin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label>Nama Lengkap</label>
              <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>NIM</label>
              <input type="text" name="nim" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Email Aktif</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Judul Karya Ilmiah</label>
              <input type="text" name="judul" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Unggah File (.pdf atau .docx, max 20 MB)</label>
              <input type="file" name="file" class="form-control" required>
            </div>
            <button class="btn btn-primary" type="submit">Kirim Pengajuan</button>
          </form>
        </div>
      </article>

  </div>



  </section>

  @include('home.libs.footer')
  </div>
  @include('home.libs.script')

</body>


<!-- Mirrored from elearn.websitelayout.net/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:24 GMT -->

</html>
