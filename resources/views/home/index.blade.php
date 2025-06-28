<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from elearn.websitelayout.net/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:52:43 GMT -->

<head>
  @include('home.libs.meta')
  <!-- title  -->
  <title>Perpustakaan || Universitas Mohammad Husni Thamrin </title>
  @include('home.libs.link')


</head>

<body>

  <!-- PAGE LOADING
    ================================================== -->
  <div id="preloader"></div>

  <!-- MAIN WRAPPER
    ================================================== -->
  <div class="main-wrapper">

    @include('home.libs.menu')

    <!-- BANNER
        ================================================== -->
    <section class="full-screen top-position1 p-0">
      <div class="slider-fade1 owl-carousel owl-theme w-100 min-vh-100">
        @foreach ($banners as $banner)
          <div class="item bg-img cover-background left-overlay-secondary" data-overlay-dark="90"
            data-background="{{ asset('lib/img/banner/' . $banner->image) }}">
            <div class="container d-flex flex-column">
              <div class="row align-items-center min-vh-100 pt-6 pt-md-0">
                <div class="col-md-11 col-lg-9 col-xl-8 col-xxl-7 mb-1-9 mb-lg-0 pt-6 pb-12 py-sm-6">
                  <div class="section-title02">
                    <div class="mb-2-1">
                      @if ($banner->subtitle)
                        <span
                          class="text-primary text-uppercase small letter-spacing-4 d-block mb-3 font-weight-700 sm-title">
                          {{ $banner->subtitle }}
                        </span>
                      @endif
                      <h1 class="display-3 font-weight-800 mb-4 text-white">{{ $banner->title }}</h1>
                    </div>
                    @if ($banner->description)
                      <p class="mb-1-9 font-weight-500 display-28 text-white opacity7 w-md-80 d-none d-sm-block">
                        {{ $banner->description }}
                      </p>
                    @endif
                  </div>
                  <div class="banner-button">
                    @if ($banner->button_text && $banner->button_link)
                      <a href="{{ $banner->button_link }}" class="butn-style4 white-hover m-2">
                        <span>{{ $banner->button_text }}</span>
                      </a>
                    @endif
                    <div class="button-text d-inline-block m-2">
                      <a href="/perpustakaan/kontak" class="text-white text-primary-hover">Hubungi Kami</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </section>

    <!-- MENU
        ================================================== -->
    <section>
      <div class="container">
        <div class="text-center section-title02 mb-2-1 wow fadeInUp" data-wow-delay="100ms">
          <span class="sm-title">Layanan</span>
          <h2 class="mb-0 ls-minus-2px display-5 font-weight-800 lh-1">Perpustakaan</h2>
        </div>

        <div class="row mb-2-9 mt-n2-6">
          @forelse ($menus as $menu)
            <div class="col-md-6 col-xl-3 mt-2-6 wow fadeInUp" data-wow-delay="100ms">
              <div class="card card-style06 border-color-light-black bg-transparent h-100">
                <div class="card-body text-center">
                  <div class="service-img">
                    <img src="{{ asset('lib/img/icons/' . $menu->foto) }}" alt="{{ $menu->judul }}"
                      class="position-relative z-index-9 mt-2-2 w-70px">
                    <div class="icon-circle"></div>
                  </div>
                  <h3 class="h5"><a href="{{ $menu->link }}">{{ $menu->judul }}</a></h3>
                  <p class="mb-0"><i>{{ $menu->description }}</i></p>
                </div>
                <div class="card-btn">
                  <div class="main-butn">
                    <span class="main-text">Read More</span>
                  </div>
                  <div class="hover-butn">
                    <a href="{{ $menu->link }}">
                      <span class="inner-butn">
                        <span class="hover-text">Read More</span>
                        <span class="btn-icon"><i class="fa-solid fa-arrow-right"></i></span>
                        <span class="btn-icon"><i class="fa-solid fa-arrow-right"></i></span>
                      </span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          @empty
            <div class="col-12 text-center">
              <p>Data Menu Tidak Ada</p>
            </div>
          @endforelse
        </div>

        <div class="row justify-content-center">
          <div class="col-auto text-center wow fadeInUp" data-wow-delay="100ms">
            <div class="d-inline-block align-middle me-2">
              <img src="{{ asset('lib/img/icons/11.png') }}" alt="..." class="w-40px">
            </div>
            <div class="letter-spacing-minus-5px d-inline-block align-middle display-27">
              We’re committed to create a change that matters!
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- ABOUT US
        ================================================== -->
    <section class="overflow-visible bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 mb-2-3 mb-lg-0 wow fadeInUp" data-wow-delay="100ms">
            <div class="position-relative pe-xl-1-9">
              <img src="{{ asset('lib/img/content/Perpustakaan Kampus.jpg') }}" class="border-radius-10"
                alt="Perpustakaan Thamrin">
              <div
                class="bg-secondary d-inline-block border-radius-10 p-1-9 position-absolute left-5 left-sm-n5 bottom-n5">
                <p class="text-white mb-1">Anggota Aktif</p>
                <h3 class="mb-0 h1 text-white">10.000+</h3>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="ps-xl-2-3 position-relative">
              <div class="section-title02 mb-lg-4 wow fadeInUp" data-wow-delay="100ms">
                <span class="sm-title">tentang kami</span>
                <h2 class="mb-0 ls-minus-2px display-5 font-weight-800 lh-1">Perpustakaan Universitas Mohammad Husni
                  Thamrin</h2>
              </div>
              <div class="z-index-1 position-relative">
                <p class="mb-1-9 wow fadeInUp" data-wow-delay="150ms">
                  Perpustakaan ini menjadi pusat sumber informasi akademik yang menyediakan berbagai koleksi buku,
                  jurnal, dan akses digital untuk mendukung kegiatan belajar, mengajar, dan penelitian.
                </p>
                <div class="row align-items-center">
                  <div class="col-lg-7 wow fadeInUp" data-wow-delay="200ms">
                    <div class="d-flex mb-1-9">
                      <div class="flex-shrink-0">
                        <img src="{{ asset('lib/img/icons/images.jpg') }}" alt="..." class="w-45px">
                      </div>
                      <div class="flex-grow-1 ms-3">
                        <h4 class="h5">Koleksi Buku Lengkap</h4>
                        <p class="mb-0">Ribuan judul tersedia</p>
                      </div>
                    </div>
                    <div class="d-flex">
                      <div class="flex-shrink-0">
                        <img src="{{ asset('lib/img/icons/Landing-Page.png') }}" alt="..." class="w-45px">
                      </div>
                      <div class="flex-grow-1 ms-3">
                        <h4 class="h5">Layanan Digital</h4>
                        <p class="mb-0">Peminjaman dan akses e-book</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-5 d-none d-lg-block wow fadeInUp" data-wow-delay="250ms">
                    <div>
                      <img src="{{ asset('lib/img/content/4.jpg') }}" class="border-radius-10" alt="Ruang Baca">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- EXTRA
        ================================================== -->
    {{-- Section Utama Perpustakaan --}}
    <section class="bg-img cover-background pb-19 pb-lg-24 secondary-overlay" data-overlay-dark="8"
      data-background="{{ asset('lib/img/bg/bg-02.jpg') }}">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7 mb-1-9 mb-lg-0">
            <div class="section-title02">
              <h2 class="mb-0 ls-minus-2px display-5 font-weight-800 lh-1 w-100 text-white">
                Menyediakan Akses Informasi Ilmiah untuk Mendukung Pendidikan dan Penelitian
              </h2>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="text-start text-lg-end">
              <a href="{{ route('perpustakaan.visi-misi') }}" class="butn-style4 white-hover">
                <span class="text-btn">Lihat Layanan Kami</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- Statistik Perpustakaan --}}
    <section class="pt-0 pb-0 overflow-visible bg-transparent">
      <div class="container">
        <div class="counter-style01 text-center border-radius-10">
          <div class="row mt-n1-9">

            <div class="col-sm-6 col-lg-4 mt-1-9">
              <div
                class="display-14 display-md-11 display-lg-8 mb-1 counter-number font-weight-800 text-secondary lh-1">
                <div class="odometer odometer-auto-theme" data-count="10000">0</div>+
              </div>
              <p class="mb-0 opacity9">Koleksi Buku & Referensi</p>
            </div>

            <div class="col-sm-6 col-lg-4 mt-1-9">
              <div
                class="display-14 display-md-11 display-lg-8 mb-1 counter-number font-weight-800 text-secondary lh-1">
                <div class="odometer odometer-auto-theme" data-count="5000">0</div>+
              </div>
              <p class="mb-0 opacity9">Pengguna Terdaftar</p>
            </div>

            <div class="col-sm-6 col-lg-4 mt-1-9">
              <div
                class="display-14 display-md-11 display-lg-8 mb-1 counter-number font-weight-800 text-secondary lh-1">
                <div class="odometer odometer-auto-theme" data-count="8">0</div> Jam
              </div>
              <p class="mb-0 opacity9">Jam Operasional Aktif per Hari</p>
            </div>

          </div>
        </div>
      </div>
    </section>



    <!-- TESTIMONIALS
        ================================================== -->
    {{-- <section class="bg-light">
      <div class="container">
        <div class="section-title02 mb-1-9 mb-xl-5 text-center">
          <span class="sm-title">Testimonials.</span>
          <h2 class="mb-0 ls-minus-2px display-5 font-weight-800 lh-1">Reviews of Our Clients</h2>
        </div>
        <div class="row">
          <div class="col-lg-9 text-center mx-auto">
            <div class="testimonial-carousel-three owl-carousel owl-theme mb-1-9 mb-lg-5" data-slider-id="1">
              <div>
                <img src="{{ asset('lib/img/icons/quote.png') }}" alt="..." class="w-55px mb-2-0">
                <p class="mb-1-9 lead lh-base display-25 display-lg-23">"business consulting has really
                  helped our business. Definitely worth the investment.business consulting has made a
                  huge difference! It has saved me so much time."</p>
                <div>
                  <h5 class="text-primary mb-0 font-weight-500">Lizabeth G. Mack</h5>
                  <span class="small">- Marketing Lead</span>
                </div>
              </div>
              <div>
                <img src="{{ asset('lib/img/icons/quote.png') }}" alt="..." class="w-55px mb-2-0">
                <p class="mb-1-9 lead lh-base display-25 display-lg-23">"If you want to take your
                  business to the next level, use business and don't look any further.business makes
                  me more productive and gets the job done in a fraction of the time."</p>
                <div>
                  <h5 class="text-primary mb-0 font-weight-500">Karla M. Søndergaard</h5>
                  <span class="small">- Networking Lead</span>
                </div>
              </div>
              <div>
                <img src="{{ asset('lib/img/icons/quote.png') }}" alt="..." class="w-55px mb-2-0">
                <p class="mb-1-9 lead lh-base display-25 display-lg-23">"I would recommend business for
                  anyone trying to get the word out about their business. It has saved me so much
                  time.Would definitely recommend business and will definitely be ordering again."</p>
                <div>
                  <h5 class="text-primary mb-0 font-weight-500">Mustafa Haile</h5>
                  <span class="small">- Financial Analyst</span>
                </div>
              </div>
            </div>
            <div class="owl-thumbs testimonial-thumbs4" data-slider-id="1">
              <button class="owl-thumb-item rounded-circle w-90px me-2 active"><img
                  src="{{ asset('lib/img/avatar/avatar-04.jpg') }}" class="rounded-circle" alt="..."></button>
              <button class="owl-thumb-item w-90px rounded-circle me-2"><img
                  src="{{ asset('lib/img/avatar/avatar-05.jpg') }}" class="rounded-circle" alt="..."></button>
              <button class="owl-thumb-item w-90px rounded-circle me-2"><img
                  src="{{ asset('lib/img/avatar/avatar-06.jpg') }}" class="rounded-circle" alt="..."></button>
            </div>
          </div>
        </div>
      </div>
    </section> --}}

    <!-- EXTRA
        ================================================== -->
    {{-- <section class="parallax secondary-overlay" data-overlay-dark="8"
      data-background="{{ asset('lib/img/bg/bg-04.jpg') }}">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7 order-2 order-lg-1 mt-1-9 mt-lg-0">
            <h4 class="text-white text-center text-lg-end mb-0 display-5 font-weight-800">Whether you are
              looking for answers, would like to solve a any business problem</h4>
          </div>
          <div class="col-lg-5 order-1 order-lg-2">
            <div class="text-center">
              <div class="story-video d-sm-inline-block align-middle z-index-1 text-sm-start mb-1-9 mb-sm-0">
                <a class="video video_btn" href="https://www.youtube.com/watch?v=pDWUf_g2zsc"><i
                    class="fa fa-play text-white"></i></a>
              </div>
              <div class="align-middle d-sm-inline-block ms-sm-6">
                <a href="video/bg-video.html" class="text-primary border-bottom border-color-light-white">
                  Video Presentation </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}

    <!-- BLOG
        ================================================== -->
    <section>
      <div class="container">
        <div class="section-title02 mb-2-4 mb-md-2-6 text-center wow fadeInUp" data-wow-delay="100ms">
          <span class="sm-title">Berita</span>
          <h2 class="mb-0 ls-minus-2px display-5 font-weight-800 lh-1">Berita & Artikel</h2>
        </div>
        <div class="row mb-6 mt-n1-9">
          @forelse ($news as $new)
            <div class="col-md-6 col-lg-4 mt-1-9 wow fadeInUp" data-wow-delay="100ms">
              <article class="card card-style05">
                <div class="blog-img position-relative overflow-hidden">
                  <img src="{{ asset('lib/img/content/' . $new->img) }}" class="radius-top"
                    alt="{{ $new->judul }}">
                </div>
                <div class="card-body position-relative pt-2-6 pb-1-9 pb-xl-2-6 px-1-9 px-xl-2-4">
                  <div class="post-date">
                    <span
                      class="mb-0 d-block lh-1 display-17">{{ \Carbon\Carbon::parse($new->tanggal)->format('d') }}</span>
                    <span class="d-block month">{{ \Carbon\Carbon::parse($new->tanggal)->format('M') }}</span>
                  </div>
                  <span
                    class="text-uppercase fw-bold display-31 blog-tag me-4 position-relative">{{ $new->by }}</span>
                  {{-- <a href="#!" class="display-31">13 Comments</a> --}}
                  <h3 class="h4 mb-0 mt-3">
                    <a href="{{ url('home/news/detailnews/' . $new->id) }}">{{ $new->judul }}</a>
                  </h3>
                </div>
              </article>
            </div>
          @empty
            <div class="col-12 text-center">
              <p>Berita tidak ditemukan.</p>
            </div>
          @endforelse

          <div class="col-12">
            <div class="text-center wow fadeInUp mt-4" data-wow-delay="550ms">
              <a href="{{ url('/update') }}" class="butn-style4 white-hover hover-bg">Lihat Semua Berita</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- PATNERS
        ================================================== -->
    <section class="client-style01 py-5">
      <div class="container">
        <div class="section-title02 mb-5 text-center wow fadeInUp" data-wow-delay="100ms">
          <span class="sm-title text-uppercase text-muted">Our Clients</span>
          <h2 class="mb-0 ls-minus-2px display-5 fw-bold">Our Partners</h2>
        </div>
        <div class="row justify-content-center">
          @foreach ($partners as $partner)
            <div class="col-6 col-md-4 col-xl-3 mb-4 wow fadeInUp" data-wow-delay="150ms">
              <div class="clients-box position-relative text-center p-3 h-100 shadow-sm bg-white rounded">
                <a href="{{ $partner->link ?? '#' }}" target="_blank" class="d-block position-relative">
                  <div class="clients-img position-relative">
                    <img src="{{ asset('lib/img/clients/' . $partner->logo_hover) }}" alt="{{ $partner->name }}"
                      class="img-fluid transition hover-hide" style="max-height: 100px; object-fit: contain;" />
                    <img src="{{ asset('lib/img/clients/' . $partner->logo) }}" alt="{{ $partner->name }}"
                      class="img-fluid position-absolute top-0 start-50 translate-middle-x transition hover-show"
                      style="max-height: 100px; object-fit: contain; opacity: 0;" />
                  </div>
                </a>

                @if ($partner->background_image)
                  <div class="clients-bg-img position-absolute top-0 start-0 w-100 h-100 z-n1"
                    style="background-image: url('{{ asset('lib/img/clients/' . $partner->background_image) }}');
                                  background-size: cover; background-position: center; opacity: 0.05;">
                  </div>
                @endif
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>


    @include('home.libs.footer')
  </div>
  @include('home.libs.script')

</body>


<!-- Mirrored from advisorhtml.websitelayout.net/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Mar 2025 07:38:36 GMT -->

</html>
