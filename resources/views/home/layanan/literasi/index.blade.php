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
            <h1>Pelatihan Relasi</h1>
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


                    <div class="container py-5">
                      <h2 class="text-2xl font-bold mb-4">📚 Pelatihan Literasi</h2>
                      <p class="mb-4">
                        Pelatihan Literasi diselenggarakan oleh Perpustakaan Universitas Mohammad Husni Thamrin untuk
                        membekali mahasiswa dalam mengakses, mengevaluasi, dan menggunakan informasi akademik secara
                        efektif.
                      </p>

                      <div class="bg-gray-100 p-4 rounded mb-6">
                        <h3 class="font-semibold text-lg mb-2">🎯 Tujuan:</h3>
                        <ul class="list-disc ml-6 space-y-1">
                          <li>Meningkatkan kemampuan pencarian dan penggunaan informasi ilmiah</li>
                          <li>Memahami etika penggunaan sumber dan sitasi</li>
                          <li>Mengetahui cara kerja cek plagiarisme (Turnitin)</li>
                          <li>Memaksimalkan layanan dan sumber daya perpustakaan</li>
                        </ul>
                      </div>

                      <div class="bg-white border p-4 rounded shadow mb-6">
                        <h3 class="font-semibold text-lg mb-2">📝 Materi Pelatihan:</h3>
                        <ol class="list-decimal ml-6 space-y-1">
                          <li>Pengenalan Perpustakaan dan Layanan Digital</li>
                          <li>Strategi Pencarian Informasi Akademik</li>
                          <li>Evaluasi Sumber & Referensi Ilmiah</li>
                          <li>Manajemen Sitasi (Zotero / Mendeley)</li>
                          <li>Pengenalan Plagiarisme dan Turnitin</li>
                          <li>Penggunaan E-Journal & E-Book</li>
                        </ol>
                      </div>

                      <div class="mb-6">
                        <h3 class="font-semibold text-lg mb-2">📆 Jadwal:</h3>
                        <p>Setiap Hari <strong>Rabu & Jumat</strong>, pukul <strong>09.00 – 12.00 WIB</strong></p>
                        <p>Tempat: <strong>Ruang Pelatihan Perpustakaan / via Zoom</strong></p>
                      </div>

                      <div class="mb-6">
                        <h3 class="font-semibold text-lg mb-4">📋 Formulir Pendaftaran Pelatihan</h3>

                        <form action="{{ route('literasi.store') }}" method="POST"
                          class="space-y-4 bg-gray-50 p-6 rounded-lg shadow-md">
                          @csrf

                          <div>
                            <label for="nama" class="block font-medium mb-1">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama"
                              class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-400"
                              placeholder="Masukkan nama lengkap" required>
                          </div>

                          <div>
                            <label for="nim" class="block font-medium mb-1">NIM</label>
                            <input type="text" id="nim" name="nim"
                              class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-400"
                              placeholder="Masukkan NIM" required>
                          </div>

                          <div>
                            <label for="email" class="block font-medium mb-1">Email</label>
                            <input type="email" id="email" name="email"
                              class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-400"
                              placeholder="Masukkan email aktif" required>
                          </div>

                          <div>
                            <label for="program_studi" class="block font-medium mb-1">Program Studi</label>
                            <input type="text" id="program_studi" name="program_studi"
                              class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-400"
                              placeholder="Contoh: Teknik Informatika" required>
                          </div>

                          <div>
                            <label for="jadwal" class="block font-medium mb-1">Pilih Jadwal Pelatihan</label>
                            <select name="jadwal" id="jadwal"
                              class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-400"
                              required>
                              <option value="" disabled selected>Pilih salah satu jadwal</option>
                              <option value="Rabu">Rabu, 09.00 – 12.00 WIB</option>
                              <option value="Jumat">Jumat, 09.00 – 12.00 WIB</option>
                            </select>
                          </div>

                          <div class="pt-2">
                            <button type="submit"
                              class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                              Kirim Pendaftaran
                            </button>
                          </div>
                        </form>
                      </div>

                      <div class="text-sm text-gray-600">
                        📧 Konfirmasi akan dikirim ke email pendaftar. Untuk pertanyaan lebih lanjut, hubungi:
                        <strong>perpustakaan@thamrin.ac.id</strong>
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
