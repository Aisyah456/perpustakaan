<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from elearn.websitelayout.net/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:23 GMT -->

<head>
  @include('home.libs.meta')
  <!-- title  -->
  <title>Layanan Usulan Buku Perpustakaan UMHT - Perpustakaan UMHT</title>
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
            <h1>From Usulan Buku</h1>
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
        <div class="container mt-5">
          <div class="card shadow rounded-3">
            <div class="card-header bg-primary text-white">
              <h4 class="mb-0">Form Usulan Buku Baru</h4>
            </div>
            <div class="card-body">
              @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
              @endif

              <form action="{{ route('usulan-buku.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="nama_pengusul" class="form-label">Nama Pengusul</label>
                  <input type="text" class="form-control" id="nama_pengusul" name="nama_pengusul" required>
                </div>

                <div class="mb-3">
                  <label for="status" class="form-label">Status</label>
                  <select class="form-select" id="status" name="status" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="mahasiswa">Mahasiswa</option>
                    <option value="dosen">Dosen</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="judul_buku" class="form-label">Judul Buku</label>
                  <input type="text" class="form-control" id="judul_buku" name="judul_buku" required>
                </div>

                <div class="mb-3">
                  <label for="pengarang" class="form-label">Pengarang</label>
                  <input type="text" class="form-control" id="pengarang" name="pengarang" required>
                </div>

                <div class="mb-3">
                  <label for="penerbit" class="form-label">Penerbit</label>
                  <input type="text" class="form-control" id="penerbit" name="penerbit" required>
                </div>

                <div class="mb-3">
                  <label for="alasan" class="form-label">Alasan Pengadaan</label>
                  <textarea class="form-control" id="alasan" name="alasan" rows="3" required></textarea>
                </div>

                <div class="mb-3 text-end">
                  <button type="submit" class="btn btn-success">Kirim Usulan</button>
                </div>
              </form>
            </div>
          </div>
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
