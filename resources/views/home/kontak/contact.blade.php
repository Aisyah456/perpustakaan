<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from elearn.websitelayout.net/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:24 GMT -->

<head>
  @include('home.libs.meta')
  <!-- title  -->
  <title>Contact Us - Perpustakaan</title>
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
            <h1>Kontak</h1>
          </div>
          <div class="col-md-12">
            <ul>
              <li><a href="/Home">Home</a></li>
              <li><a href="#!">Update</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- QUICK CONTACT
        ================================================== -->
    <section class="contact-form pb-0">
      <div class="container mb-2-9 mb-md-6 mb-lg-7">
        <div class="section-heading text-center">
          <span class="sub-title text-primary text-uppercase fw-semibold letter-spacing-1">Kontak Kami</span>
          <h2 class="mb-4 display-6 fw-bold">Hubungi Perpustakaan UMHT</h2>
          <p class="text-muted mx-auto" style="max-width: 700px;">
            Kami siap membantu Anda dengan informasi, layanan, dan dukungan terbaik. Silakan hubungi kami melalui kanal
            berikut.
          </p>
          <div class="heading-seperator mt-4"><span></span></div>
        </div>

        <div class="row mt-5">
          <!-- Email -->
          <div class="col-lg-4 mb-4">
            <div
              class="contact-wrapper bg-white shadow-sm rounded p-5 text-center h-100 hover:scale-up hover:shadow-lg transition-all duration-300">
              <div class="mb-4 text-primary display-4">
                <i class="ti-email"></i>
              </div>
              <h5 class="mb-3 fw-semibold">Email Perpustakaan</h5>
              <ul class="list-unstyled">
                <li><a href="mailto:perpustakaan@thamrin.ac.id" class="text-dark">perpustakaan@thamrin.ac.id</a></li>
                <li><a href="mailto:info@thamrin.ac.id" class="text-dark">info@thamrin.ac.id</a></li>
              </ul>
            </div>
          </div>

          <!-- Alamat -->
          <div class="col-lg-4 mb-4">
            <div
              class="contact-wrapper bg-white shadow-sm rounded p-5 text-center h-100 hover:scale-up hover:shadow-lg transition-all duration-300">
              <div class="mb-4 text-primary display-4">
                <i class="ti-map-alt"></i>
              </div>
              <h5 class="mb-3 fw-semibold">Alamat Perpustakaan</h5>
              <p class="mb-0 text-muted">
                Gedung Perpustakaan<br>
                Universitas Mohammad Husni Thamrin<br>
                Jl. Raya Pd. Gede No. 23-25, RT.2/RW.1, Dukuh, Kec. Kramat Jati,<br>
                Jakarta Timur, DKI Jakarta 13550
              </p>
            </div>
          </div>

          <!-- Telepon -->
          <div class="col-lg-4 mb-4">
            <div
              class="contact-wrapper bg-white shadow-sm rounded p-5 text-center h-100 hover:scale-up hover:shadow-lg transition-all duration-300">
              <div class="mb-4 text-primary display-4">
                <i class="ti-mobile"></i>
              </div>
              <h5 class="mb-3 fw-semibold">Kontak Telepon</h5>
              <ul class="list-unstyled">
                <li><a href="tel:0811131337" class="text-dark">0811 131 337</a></li>
                <li><a href="tel:0218096411" class="text-dark">(021) 809 6411</a></li>
                <li><a href="tel:0218096412" class="text-dark">(021) 809 6412 Ext. Perpustakaan</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- MAP -->
    <section class="p-0">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.530683734128!2d106.84759717499013!3d-6.193487193794168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f44255fb2dcf%3A0xa84dce332a106956!2sUniversitas%20MH%20Thamrin!5e0!3m2!1sid!2sid!4v1730098903505!5m2!1sid!2sid"
        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>


    @include('home.libs.footer')
  </div>
  @include('home.libs.script')

</body>


<!-- Mirrored from elearn.websitelayout.net/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:24 GMT -->

</html>
