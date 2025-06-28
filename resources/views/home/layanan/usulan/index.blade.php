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
    <section class="page-title-section bg-img cover-background top-position1 left-overlay-dark" data-overlay-dark="9"
      data-background="{{ asset('lib/img/banner/page-title.jpg') }}">
      <div class="container">
        <div class="row text-center">
          <div class="col-md-12">
            <h1>Usulan Buku</h1>
          </div>
          <div class="col-md-12">
            <ul>
              <li><a href="index-2.html">Home</a></li>
              <li><a href="#!">Layanan </a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>


    <!-- Hal Utama
        ================================================== -->
    <section>
      <div class="container">
        <div class="row mt-n2-9">
          <div class="col-lg-8 mt-2-9">
            <div class="row">
              <div class="col-lg-12 mb-6">
                <article>

                  <div class="container mt-5">
                    <div class="card shadow rounded-4">
                      <div class="card-body">
                        <h3 class="mb-4 text-primary">Informasi Layanan Usulan Buku</h3>

                        <h5 class="fw-bold text-secondary">Pengertian</h5>
                        <p>
                          Usulan Buku adalah layanan yang disediakan oleh Perpustakaan Universitas Mohammad Husni
                          Thamrin
                          untuk memfasilitasi mahasiswa dan dosen dalam mengajukan permintaan pengadaan buku baru. Buku
                          yang
                          diusulkan harus relevan dengan kebutuhan akademik, penelitian, atau kegiatan perkuliahan.
                        </p>

                        <h5 class="fw-bold text-secondary">Tujuan</h5>
                        <ul>
                          <li>Meningkatkan koleksi buku yang sesuai dengan kebutuhan pengguna perpustakaan.</li>
                          <li>Mendukung proses pembelajaran dan penelitian di lingkungan universitas.</li>
                          <li>Memberikan akses kepada literatur yang lebih luas dan mutakhir.</li>
                          <li>Melibatkan sivitas akademika dalam pengembangan koleksi perpustakaan.</li>
                        </ul>

                        <h5 class="fw-bold text-secondary">Persyaratan</h5>
                        <ul>
                          <li>Pengusul adalah mahasiswa aktif atau dosen di Universitas Mohammad Husni Thamrin.</li>
                          <li>Mengisi formulir usulan buku secara lengkap dan benar.</li>
                          <li>Buku yang diusulkan harus mendukung kegiatan akademik (kuliah, riset, tugas akhir, dll).
                          </li>
                          <li>Pengusulan tidak boleh untuk buku dengan konten ilegal atau bertentangan dengan nilai
                            akademik.</li>
                          <li>Setiap usulan akan diverifikasi oleh pustakawan sebelum diproses pengadaannya.</li>
                        </ul>

                        <div class="mt-4 text-end">
                          <a href="{{ route('usulan-buku.create') }}" class="btn btn-primary">
                            Ajukan Usulan Buku
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>

                </article>
              </div>
            </div>
          </div>


          <div class="col-lg-4 mt-2-9">
            <div class="sidebar ps-xl-4">
              <div class="widget mb-1-9 p-4 widget_search wow fadeInUp" data-wow-delay="200ms">
                <form>
                  <div class="input-group rounded-0">
                    <input type="search" class="form-control rounded-0 border-end-0 search-input"
                      placeholder="Search..." name="s">
                    <div class="input-group-append">
                      <button class="butn-style3 rounded-0" type="button"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="widget wow fadeInUp" data-wow-delay="200ms">
                <h4 class="widget-title text-white">Recent Posts</h4>
                <div class="widget-body">
                  <div class="d-flex recent-post align-items-start align-items-sm-center align-items-lg-start">
                    <div class="flex-shrink-0 image-hover me-3">
                      <a href="#"><img src="img/blog/blog-thumb-01.jpg"
                          alt="The advantages of a digital supply strategy"></a>
                    </div>
                    <div class="flex-grow-1">
                      <span class="display-30 d-block mb-2 font-weight-500">January 20, 2024</span>
                      <h4 class="h6 mb-0"><a href="blog-details.html">The advantages of a digital supply strategy</a>
                      </h4>
                    </div>
                  </div>
                  <div class="d-flex mt-4 recent-post align-items-start align-items-sm-center align-items-lg-start">
                    <div class="flex-shrink-0 image-hover me-3">
                      <a href="#"><img src="img/blog/blog-thumb-02.jpg"
                          alt="We very careful handling the valuable goods"></a>
                    </div>
                    <div class="flex-grow-1">
                      <span class="display-30 d-block mb-2 font-weight-500">January 20, 2024</span>
                      <h4 class="h6 mb-0"><a href="blog-details.html">We very careful handling the valuable goods</a>
                      </h4>
                    </div>
                  </div>
                  <div class="d-flex mt-4 recent-post align-items-start align-items-sm-center align-items-lg-start">
                    <div class="flex-shrink-0 image-hover me-3">
                      <a href="#"><img src="img/blog/blog-thumb-03.jpg"
                          alt="Choosing the best logistics for your business"></a>
                    </div>
                    <div class="flex-grow-1">
                      <span class="display-30 d-block mb-2 font-weight-500">January 20, 2024</span>
                      <h4 class="h6 mb-0"><a href="blog-details.html">Choosing the best logistics for your
                          business</a></h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="widget widget_categories wow fadeInUp" data-wow-delay="200ms">
                <h4 class="widget-title text-white">Categories</h4>
                <div class="widget-body">
                  <ul>
                    <li class="cat-item"><a href="#"><span class="cat-name">Business Planning</span> <span
                          class="float-end cat-count">(2)</span></a></li>
                    <li class="cat-item"><a href="#"><span class="cat-name">Financial Advices</span> <span
                          class="float-end cat-count">(1)</span></a></li>
                    <li class="cat-item"><a href="#"><span class="cat-name">Business Analysis</span> <span
                          class="float-end cat-count">(4)</span></a></li>
                    <li class="cat-item"><a href="#"><span class="cat-name">Reports Analysis</span> <span
                          class="float-end cat-count">(1)</span></a></li>
                    <li class="cat-item"><a href="#"><span class="cat-name">Fintech Analysis</span> <span
                          class="float-end cat-count">(8)</span></a></li>
                  </ul>
                </div>
              </div>
              <div class="widget widget_tag_cloud wow fadeInUp" data-wow-delay="200ms">
                <h4 class="widget-title text-white">Tags</h4>
                <div class="widget-body">
                  <div class="tagcloud">
                    <ul class="wp-tag-cloud">
                      <li><a href="#">Analytics</a></li>
                      <li><a href="#">Finance</a></li>
                      <li><a href="#">Consultation</a></li>
                      <li><a href="#">Data</a></li>
                      <li><a href="#">Marketing</a></li>
                      <li><a href="#">Meeting</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="widget wow fadeInUp" data-wow-delay="200ms">
                <h4 class="widget-title text-white">Follow Us</h4>
                <div class="widget-body">
                  <ul class="social-icon-style2 mb-0 d-inline-block list-unstyled">
                    <li class="d-inline-block me-2"><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="d-inline-block me-2"><a href="#!"><i class="fa-brands fa-x-twitter"></i></a></li>
                    <li class="d-inline-block me-2"><a href="#!"><i class="fab fa-youtube"></i></a></li>
                    <li class="d-inline-block"><a href="#!"><i class="fab fa-linkedin-in"></i></a></li>
                  </ul>
                </div>
              </div>
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
