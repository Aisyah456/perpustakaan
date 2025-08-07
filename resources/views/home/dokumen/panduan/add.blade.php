<!DOCTYPE html>
<html lang="en">

<head>
  <!-- metas -->
  @include('home.libs.meta')
  <!-- title  -->
  <title>@yield('title', 'Dashboard') | Perpustakaan UMHT </title>

  <!-- favicon -->
  @include('home.libs.link')


  <style>
    .main-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 40px 20px;
    }

    .guidance-section {
      background: #fff;
      border-radius: 15px;
      padding: 40px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .rector-decision {
      background: linear-gradient(135deg, #ffeaa7, #fdcb6e);
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 25px;
      border-left: 5px solid #e17055;
    }

    .rector-decision p {
      margin: 0;
      font-weight: 600;
      color: #2d3436;
      font-size: 14px;
    }

    .click-here-link {
      display: inline-block;
      color: #0066cc;
      text-decoration: none;
      font-weight: 500;
      padding: 8px 16px;
      border: 2px solid #0066cc;
      border-radius: 25px;
      transition: all 0.3s ease;
      margin-bottom: 30px;
    }

    .click-here-link:hover {
      background: #0066cc;
      color: white;
      transform: translateY(-1px);
    }

    .guidance-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .guidance-item {
      background: #f8f9fa;
      margin-bottom: 15px;
      border-radius: 10px;
      transition: all 0.3s ease;
      border: 1px solid #e9ecef;
    }

    .guidance-item:hover {
      background: #e3f2fd;
      border-color: #2196f3;
      transform: translateX(5px);
    }

    .guidance-link {
      display: flex;
      align-items: center;
      padding: 20px;
      text-decoration: none;
      color: #2c3e50;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .guidance-link:hover {
      color: #1976d2;
    }

    .guidance-icon {
      color: #6c757d;
      font-size: 18px;
      margin-right: 15px;
      min-width: 20px;
    }

    .guidance-item:hover .guidance-icon {
      color: #2196f3;
    }

    .guidance-text {
      flex: 1;
      font-size: 15px;
      line-height: 1.5;
    }

    @media (max-width: 768px) {
      .main-container {
        padding: 20px 15px;
      }

      .guidance-section {
        padding: 25px;
      }

      .guidance-title {
        font-size: 1.8rem;
      }

      .video-container {
        height: 250px;
      }

      .guidance-link {
        padding: 15px;
      }

      .guidance-text {
        font-size: 14px;
      }
    }
  </style>
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
            <h1>Panduan</h1>
          </div>
        </div>
      </div>
    </section>




    @yield('content')
    {{-- <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    --}}
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
