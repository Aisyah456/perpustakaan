        <!-- FOOTER
        ================================================== -->
        <footer class="footer-style01 pt-0 overflow-visible bg-secondary text-white">
          <div class="container">
            <div class="row mt-n2-9">

              <!-- Tentang Perpustakaan -->
              <div class="col-sm-6 col-lg-4 pe-5 mt-2-9">
                <div class="footer-top">
                  <!-- Logo Perpustakaan -->
                  <div class="mb-3">
                    <img src="{{ asset('lib/img/logos/umht.png') }}" alt="Logo Perpustakaan" style="max-width: 180px;">
                  </div>

                  <h3 class="mb-1-9 h5">Tentang Kami</h3>
                  <p class="mb-1-6">
                    Perpustakaan Universitas Mohammad Husni Thamrin menyediakan koleksi buku, layanan sirkulasi,
                    referensi,
                    akses jurnal online, dan berbagai sumber informasi akademik untuk mendukung kegiatan belajar,
                    mengajar,
                    dan penelitian.
                  </p>
                  <ul class="social-icon-style6 list-inline mb-0">
                    <li class="list-inline-item me-2"><a href="#"><i class="fab fa-facebook-f"
                          aria-hidden="true"></i></a></li>
                    <li class="list-inline-item me-2"><a href="#"><i class="fab fa-x-twitter"
                          aria-hidden="true"></i></a></li>
                    <li class="list-inline-item me-2"><a href="#"><i class="fab fa-youtube"
                          aria-hidden="true"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"
                          aria-hidden="true"></i></a></li>
                  </ul>
                </div>
              </div>

              <!-- Layanan Perpustakaan -->
              <div class="col-sm-6 col-lg-2 mt-2-9">
                <h3 class="h5 mb-1-9">Layanan</h3>
                <ul class="footer-list ps-0">
                  <li><a href="#">Peminjaman Buku</a></li>
                  <li><a href="#">Layanan Referensi</a></li>
                  <li><a href="#">Layanan Sirkulasi</a></li>
                  <li><a href="#">Bebas Pustaka</a></li>
                  <li><a href="#">Uji Turnitin</a></li>
                </ul>
              </div>

              <!-- Berita Terbaru -->
              <div class="col-sm-6 col-lg-3 mt-2-9">
                <h3 class="h5 mb-1-9">Berita Terbaru</h3>
                <div class="d-flex mb-1-9">
                  <div class="flex-shrink-0 image-hover">
                    <img src="{{ asset('lib/img/content/footer-thumb1.jpg') }}" class="rounded"
                      alt="Workshop Literasi Informasi">
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <h4 class="text-white mb-2 h6">
                      <a href="#" class="text-white text-primary-hover">Workshop Literasi Informasi</a>
                    </h4>
                    <small class="text-white opacity7">8 Jan 2024</small>
                  </div>
                </div>
                <div class="d-flex">
                  <div class="flex-shrink-0 image-hover">
                    <img src="{{ asset('lib/img/content/footer-thumb2.jpg') }}" class="rounded"
                      alt="Pelatihan Akses Jurnal Online">
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <h4 class="text-white mb-2 h6">
                      <a href="#" class="text-white text-primary-hover">Pelatihan Akses Jurnal Online</a>
                    </h4>
                    <small class="text-white opacity7">3 Jan 2024</small>
                  </div>
                </div>
              </div>

              <!-- Form Newsletter -->
              <div class="col-sm-6 col-lg-3 mt-2-9">
                <h3 class="h5 mb-1-9">Berlangganan</h3>
                <p>Dapatkan update terbaru seputar layanan dan informasi perpustakaan langsung ke email Anda.</p>
                <form class="quform newsletter-form" action="#" method="post">
                  <div class="quform-elements">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="quform-element">
                          <input class="form-control" type="email" name="email_address"
                            placeholder="Masukkan email Anda" required>
                        </div>
                      </div>
                      <div class="col-md-12 mt-2">
                        <button class="butn-style4 white-hover border-0 w-100" type="submit">
                          <span>Berlangganan</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Copyright -->
          <div class="footer-bar">
            <div class="container">
              <div class="row">
                <div class="col-lg-12 text-center">
                  <p>
                    &copy; <span class="current-year">
                      <script>
                        document.querySelector('.current-year').textContent = new Date().getFullYear();
                      </script>
                    </span> Perpustakaan Universitas Mohammad Husni Thamrin ||
                    <a href="#!" class="text-primary text-white-hover">Developed by Pustikom</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </footer>
