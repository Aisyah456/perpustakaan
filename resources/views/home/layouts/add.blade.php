<!DOCTYPE html>
<html lang="en">

<head>
  <!-- metas -->
  @include('home.libs.meta')
  <!-- title  -->
  <title>@yield('title', 'Dashboard') | Perpustakaan UMHT </title>

  <!-- favicon -->
  @include('home.libs.link')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

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
    <!-- PAGE TITLE
        ================================================== -->
    <section class="page-title-section bg-img cover-background top-position1"
      style="position: relative; background-image: url('{{ asset('lib/img/banner/ChatGPT Image May 20, 2025, 04_40_39 PM.png') }}'); background-size: cover; background-position: center;">

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
            <h1>
              @yield('page')
            </h1>
          </div>
        </div>
      </div>
    </section>

    @yield('content')

    <!-- BUY TEMPLATE
    ================================================== -->
    @include('home.libs.script')
    <!-- FOOTER
        ================================================== -->
    @include('home.libs.footer')

  </div>



</body>


<!-- Mirrored from elearn.websitelayout.net/portfolio-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:22 GMT -->

</html>
