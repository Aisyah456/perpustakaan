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
      <div class="container">
        <div class="row mt-n2-9">
          <div class="col-lg-8 mt-2-9">
            <div class="row">
              <div class="col-lg-12 mb-6">
                <article>
                  <img src="{{ asset('lib/img/blog/blog-01.jpg') }}" class="radius-top w-100 mb-2-6" alt="...">
                  <div>
                    <ul class="list-unstyled border-bottom pb-3 mb-4 wow fadeInUp" data-wow-delay="200ms">
                      <li class="d-inline-block text-capitalize me-3"><a href="#!" title="Posts by admin"
                          rel="author"><i class="ti-user text-primary pe-2"></i>Analytics</a></li>
                      <li class="d-inline-block me-3"><i class="ti-calendar me-1 text-primary"></i> Nov 09, 2024</li>
                      <li class="d-inline-block"><a href="#!"><i class="fas fa-comment me-1 text-primary"></i> 13
                          Comments</a></li>
                    </ul>


                    <div class="container">
                      <div class="text-center mb-4">
                        <h2 class="fw-bold">📄 Bebas Pustaka</h2>
                        <p class="text-muted">Layanan Bebas Pustaka bagi Mahasiswa Universitas Mohammad Husni Thamrin
                        </p>
                      </div>

                      <div class="mb-4">
                        <h4>📌 Apa itu Bebas Pustaka?</h4>
                        <p>
                          Bebas Pustaka adalah surat keterangan dari Perpustakaan Universitas yang menyatakan bahwa
                          mahasiswa yang bersangkutan tidak memiliki pinjaman buku atau kewajiban lain terhadap
                          perpustakaan. Surat ini menjadi salah satu syarat administratif untuk pengajuan wisuda atau
                          kelulusan.
                        </p>
                      </div>

                      <div class="mb-4">
                        <h4>🎯 Tujuan Layanan</h4>
                        <ul>
                          <li>Mendukung kelancaran proses akademik akhir mahasiswa.</li>
                          <li>Memastikan tidak ada tanggungan atau pinjaman koleksi sebelum mahasiswa dinyatakan lulus.
                          </li>
                          <li>Menjaga tertib administrasi peminjaman koleksi perpustakaan.</li>
                        </ul>
                      </div>

                      <div class="mb-4">
                        <h4>📝 Persyaratan Pengajuan Bebas Pustaka</h4>
                        <ul>
                          <li>Mahasiswa merupakan mahasiswa aktif yang akan menyelesaikan studi.</li>
                          <li>Tidak memiliki pinjaman buku atau denda di perpustakaan.</li>
                          <li>Sudah menyerahkan skripsi/TA/karya ilmiah dalam bentuk cetak dan/atau digital.</li>
                        </ul>
                      </div>

                      <div class="mb-4">
                        <h4>📬 Cara Mengajukan</h4>
                        <ol>
                          <li>Isi formulir pengajuan bebas pustaka secara online melalui link di bawah ini.</li>
                          <li>Pastikan tidak memiliki pinjaman buku yang belum dikembalikan.</li>
                          <li>Upload file skripsi/TA (jika diminta).</li>
                          <li>Tunggu verifikasi dari pihak perpustakaan.</li>
                          <li>Surat Bebas Pustaka akan dikirimkan ke email Anda maksimal 3 hari kerja.</li>
                        </ol>
                      </div>

                      <div class="text-center mt-5">
                        <a href="/formulir-bebas-pustaka" class="btn btn-primary px-4 py-2">
                          📥 Ajukan Bebas Pustaka
                        </a>
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
