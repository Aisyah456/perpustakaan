<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from elearn.websitelayout.net/courses-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:17 GMT -->

<head>
  <!-- metas -->
  @include('home.libs.meta')
  <!-- title  -->
  <title>Agenda - Perpustakaan UMHT</title>

  <!-- favicon -->
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
            <h1>Agenda</h1>
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

    <!-- ONLINE COURSES
        ================================================== -->
    <section>
      <div class="container">
        <div class="row g-xxl-5 mt-n2-6">
          @forelse ($agendas as $agenda)
            <div class="col-md-6 col-xl-4 mt-2-6">
              <div class="card card-style1 p-0 h-100">
                <div class="card-img rounded-0">
                  <div class="image-hover">
                    <img class="card-icon center w-60px" src="{{ asset('lib/img/agenda/' . $agenda->img) }}"
                      alt="...">
                  </div>
                  <a href="courses-list.html" class="course-tag">{{ $agenda->category }}</a>
                  <a href="#!"><i class="far fa-heart"></i></a>
                </div>
                <div class="card-body position-relative pt-0 px-1-9 pb-1-9">
                  <div class="card-author d-flex">

                    <h4 class="mb-0 h6">{{ $agenda->admin }}</h4>
                  </div>
                  <div class="pt-6">
                    <h3 class="h4 mb-4"><a href="course-details.html">{{ $agenda->judul }}</a>
                    </h3>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="display-30"><i class="ti-agenda me-2"></i>{{ $agenda->tanggal }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @empty
            <div class="alert alert-danger">
              Data Post belum Tersedia.
            </div>
          @endforelse
        </div>
        <div class="row">
          <div class="col-sm-12">
            <!-- start pager  -->
            <div class="text-center mt-6 mt-lg-7">
              <div class="pagination text-extra-dark-gray">
                <ul>
                  <li><a href="#!" class="me-3"><i class="fas fa-long-arrow-alt-left"></i></a>
                  </li>
                  <li class="active"><a href="#!" class="me-2">1</a></li>
                  <li><a href="#!" class="me-2">2</a></li>
                  <li><a href="#!" class="me-3">3</a></li>
                  <li><a href="#!"><i class="fas fa-long-arrow-alt-right"></i></a></li>
                </ul>
              </div>
            </div>
            <!-- end pager -->
          </div>
        </div>
      </div>
    </section>

    <!-- FOOTER
        ================================================== -->
    @include('home.libs.footer')
  </div>

  <!-- BUY TEMPLATE
    ================================================== -->
  @include('home.libs.script')

</body>


<!-- Mirrored from elearn.websitelayout.net/courses-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:17 GMT -->

</html>
