<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from elearn.websitelayout.net/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:13 GMT -->

<head>
  @include('home.libs.meta')
  <!-- title  -->
  <title>Profil - Perpustakaan</title>
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
      style="position: relative; background-image: url('{{ asset('lib/img/banner/WhatsApp Image 2025-04-21 at 16.28.11.jpeg') }}'); background-size: cover; background-position: center;">

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
            <h1>SOP Perpustakaan </h1>
          </div>
          <div class="col-md-12">
            <ul>
              <li><a href="/Home">Home</a></li>
              <li><a href="#!">SOP</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>



    <!-- ONLINE INSTRUCTORS
        ================================================== -->
    <section class="position-relative">
      <div class="container">
        <div class="section-heading">
          <span class="sub-title">Instructors</span>
          <h2 class="h1 mb-0">Experience Instructors</h2>
        </div>

        <div class="col-md-12 mb-1-9">
          @section('content')
            <h3>Event Schedule</h3>
            <p class="alt-font font-weight-500 text-color mb-1-6">Even slightly believable. If you are going use a passage
              of Lorem Ipsum need equal blame belongs to those who fail in their duty through weakness of will, which is
              the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to
              distinguish.</p>
            <div class="event-schedule-table table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th class="time">Title</th>
                    <th class="categorie">Categorie</th>
                    <th class="author">Author</th>
                    <th class="year">Year</th>
                    <th class="writer">Writer</th>
                    <th class="type">Type</th>
                  </tr>
                  @foreach ($standars as $standar)

                  @endforeach
                </thead>
                <tbody>
                  <tr>
                    <td class="time">{{ $standar->title }}</td>
                    <td class="categorie">{{ $standar->categorie }}</td>
                    <td class="author">{{ $standar->author }}</td>
                    <td class="year">{{ $standar->year }}</td>
                    <td class="writer">{{ $standar->writer }}</td>
                    <td class="type">{{ $standar->type }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            @endsection
          </div>
        </div>
        <div class="team-bg-shape">
          <img src="{{ asset('lib/img/bg/bg-07.png') }}" alt="...">
        </div>
      </div>
      <div class="shape18">
        <img src="{{ asset('lib/img/bg/bg-01.jpg') }}" alt="...">
      </div>
      <div class="shape20">
        <img src="{{ asset('lib/img/bg/bg-02.jpg') }}" alt="...">
      </div>
      <div class="shape21">
        <img src="{{ asset('lib/img/bg/bg-03.jpg') }}" alt="...">
      </div>
  </div>
  </section>




  @include('home.libs.footer')
  </div>
  @include('home.libs.script')


</body>


<!-- Mirrored from elearn.websitelayout.net/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:15 GMT -->

</html>
