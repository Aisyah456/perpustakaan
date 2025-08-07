<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from elearn.websitelayout.net/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:13 GMT -->

<head>
  @include('home.libs.meta')
  <!-- title  -->
  <title>Profil - Struktur Organisasi Perpustakaan</title>
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
            <h1>Struktur Organisasi</h1>
          </div>
          <div class="col-md-12">
            <ul>
              <li><a href="/Home">Home</a></li>
              <li><a href="#!">Profil</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>



    <!-- ONLINE INSTRUCTORS
        ================================================== -->
    <section class="py-5 bg-light">
      <div class="container">
        <div class="text-center mb-5">
          <h2 class="fw-bold">Struktur Organisasi</h2>
          <p class="text-muted">Perpustakaan Universitas Mohammad Husni Thamrin</p>
        </div>

        {{-- Level 1 (Kepala) --}}
        <div class="row justify-content-center mb-4">
          @php
            $kepala = $struktur->where('level', 1)->first();
          @endphp
          @if ($kepala)
            <div class="col-md-4 text-center">
              <div class="p-3 bg-white rounded shadow-sm">
                <img src="{{ asset('storage/' . $kepala->foto) }}" class="img-fluid rounded-circle mb-3"
                  alt="{{ $kepala->name }}" width="120" height="120">
                <h5 class="fw-bold">{{ $kepala->name }}</h5>
                <p class="text-muted">{{ $kepala->position }}</p>
              </div>
            </div>
          @endif
        </div>

        {{-- Level 2 --}}
        <div class="row justify-content-center mb-4">
          @foreach ($struktur->where('level', 2) as $item)
            <div class="col-md-4 text-center">
              <div class="p-3 bg-white rounded shadow-sm">
                <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid rounded-circle mb-3"
                  alt="{{ $item->name }}" width="100" height="100">
                <h6 class="fw-bold">{{ $item->name }}</h6>
                <p class="text-muted">{{ $item->position }}</p>
              </div>
            </div>
          @endforeach
        </div>

        {{-- Level 3 --}}
        <div class="row justify-content-center">
          @foreach ($struktur->where('level', 3) as $item)
            <div class="col-md-3 text-center mb-4">
              <div class="p-3 bg-white rounded shadow-sm">
                <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid rounded-circle mb-3"
                  alt="{{ $item->name }}" width="100" height="100">
                <h6 class="fw-bold">{{ $item->name }}</h6>
                <p class="text-muted">{{ $item->position }}</p>
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


<!-- Mirrored from elearn.websitelayout.net/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:15 GMT -->

</html>
