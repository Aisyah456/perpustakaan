<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from elearn.websitelayout.net/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:13 GMT -->

<head>
  @include('home.libs.meta')
  <!-- title  -->
  <title>e-Resources || Perpustakaan UMHT</title>
  @include('home.libs.link')
  <style>
    /* ===== Reset dan dasar ===== */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: #f8f9fa;
    }

    /* ===== Header garis atas ===== */
    .header {
      background: linear-gradient(90deg, #2d5a4a 0%, #2d5a4a 70%, #f4b942 70%, #f4b942 100%);
      height: 8px;
    }

    /* ===== Container utama ===== */
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 40px 20px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 40px;
      align-items: start;
    }

    .content-left {
      padding-right: 20px;
    }

    /* ===== Judul dan deskripsi ===== */
    .title {
      font-size: 48px;
      font-weight: bold;
      color: #2d5a4a;
      line-height: 1.2;
      margin-bottom: 30px;
    }

    .description {
      font-size: 16px;
      line-height: 1.6;
      color: #666;
      text-align: justify;
    }

    /* ===== Box e-resources ===== */
    .resources-box {
      background-color: #f4b942;
      padding: 30px;
      border-radius: 8px;
    }

    .resources-title {
      font-size: 24px;
      font-weight: bold;
      color: #2d5a4a;
      margin-bottom: 25px;
    }

    .resources-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 15px;
    }

    .resource-item {
      color: #2d5a4a;
      font-size: 16px;
      margin-bottom: 8px;
      position: relative;
      padding-left: 15px;
    }

    .resource-item::before {
      content: "•";
      position: absolute;
      left: 0;
      color: #2d5a4a;
      font-weight: bold;
    }

    .resource-item a {
      color: #2d5a4a;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .resource-item a:hover {
      color: #1a3d32;
      text-decoration: underline;
    }

    .resource-item.no-link {
      cursor: default;
    }

    /* ===== Empty state ===== */
    .empty-state {
      text-align: center;
      color: #2d5a4a;
      font-style: italic;
      grid-column: 1 / -1;
      padding: 20px;
    }

    /* ===== Kartu jurnal ===== */
    .journal-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border: none;
      border-radius: 12px;
      overflow: hidden;
      height: 100%;
    }

    .journal-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .journal-logo {
      height: 120px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: 600;
      font-size: 1.2rem;
      padding: 10px;
      text-align: center;
      overflow: hidden;
    }

    .journal-info {
      padding: 1.5rem;
      background: white;
    }

    .journal-name {
      font-weight: 600;
      font-size: 1.1rem;
      margin-bottom: 0.5rem;
      color: #2c3e50;
    }

    .journal-description {
      color: #6c757d;
      font-size: 0.9rem;
    }

    /* ===== Judul utama / section title ===== */
    .main-title {
      color: #8b2635;
      font-weight: 700;
      text-align: center;
      margin-bottom: 3rem;
    }



    /* ===== Responsif (Tablet dan Mobile) ===== */
    @media (max-width: 768px) {
      .container {
        grid-template-columns: 1fr;
        gap: 30px;
        padding: 20px;
      }

      .title {
        font-size: 36px;
      }

      .resources-grid {
        grid-template-columns: 1fr;
      }

      .content-left {
        padding-right: 0;
      }

      .journal-logo {
        height: auto;
        padding: 20px 10px;
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
            <h1>e-Resources</h1>
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

    <!-- ABOUTUS
        ================================================== -->


    <div class="container">
      <div class="content-left">
        <h1 class="title">e-Resources<br>Internal UMHT</h1>
        <p class="description">
          E-resources ini tidak hanya dapat diakses oleh sivitas akademika UMHT, tetapi juga oleh masyarakat umum yang
          ingin memanfaatkan berbagai koleksi digital yang tersedia. Namun, untuk koleksi khusus seperti skripsi, tesis,
          dan disertasi (mulai dari BAB II dan seterusnya) yang terdapat di website etd.umht.ac.id, akses tersebut
          dibatasi hanya untuk pengguna internal UMHT.

        </p>
      </div>

      <div class="resources-box">
        <h2 class="resources-title">Daftar E-Resources</h2>
        <div class="resources-grid">
          @if ($resources->count() > 0)
            @php
              $half = ceil($resources->count() / 2);
              $firstHalf = $resources->take($half);
              $secondHalf = $resources->skip($half);
            @endphp

            <div>
              @foreach ($firstHalf as $resource)
                <div class="resource-item {{ !$resource->url ? 'no-link' : '' }}">
                  @if ($resource->url)
                    <a href="{{ $resource->url }}" target="_blank" rel="noopener noreferrer">
                      {{ $resource->nama }}
                    </a>
                  @else
                    {{ $resource->nama }}
                  @endif
                </div>
              @endforeach
            </div>

            <div>
              @foreach ($secondHalf as $resource)
                <div class="resource-item {{ !$resource->url ? 'no-link' : '' }}">
                  @if ($resource->url)
                    <a href="{{ $resource->url }}" target="_blank" rel="noopener noreferrer">
                      {{ $resource->nama }}
                    </a>
                  @else
                    {{ $resource->nama }}
                  @endif
                </div>
              @endforeach
            </div>
          @else
            <div class="empty-state">
              Belum ada data e-resources yang tersedia.
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>



  {{-- ===================== Daftar Jurnal Internal ===================== --}}
  <div class="container my-5">
    <h2 class="mb-4">Jurnal Internal UMHT</h2>
    <div class="row g-4">
      @foreach ($journals as $journal)
        <div class="col-lg-4 col-md-6">
          <div class="card journal-card">
            <a href="{{ route('journals.show', $journal->slug) }}" class="text-decoration-none">
              <div class="journal-logo" style="background-color: {{ $journal->background_color }}">
                @if ($journal->logo_url)
                  <img src="{{ asset('doc/img/images/' . $journal->logo_url) }}" alt="{{ $journal->name }}"
                    class="img-fluid" style="max-height: 80px;">
                @else
                  {{ $journal->name }}
                @endif
              </div>
              <div class="journal-info">
                <div class="journal-name">{{ $journal->name }}</div>
                <div class="journal-description">({{ $journal->description }})</div>
              </div>
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  {{-- <div class="row">
    <div class="col-12">
      <div class="access-info">
        <p class="mb-3 text-muted">Semua bisa diakses melalui :</p>
        <div class="mypustaka-text">MYPustaka</div>
      </div>
    </div>
  </div> --}}


  <div class="container">
    <div class="content-left">
      <h1 class="title">Portal Jurnal<br>Nasional</h1>
      <p class="description">
        Portal jurnal nasional ini bersifat open acces dan bisa dibuka kapan pun serta dimana pun anda berada
      </p>
    </div>


    <div class="resources-box">
      <h2 class="resources-title">Daftar Portal Jurnal Nasional</h2>
      <div class="resources-list">
        @if ($portals->count() > 0)
          @foreach ($portals as $portal)
            <div class="resource-item {{ !$portal->url ? 'no-link' : '' }}">
              @if ($portal->url)
                <a href="{{ $portal->url }}" target="_blank" rel="noopener noreferrer"
                  title="{{ $portal->deskripsi }}">
                  {{ $portal->nama }}
                </a>
              @else
                {{ $portal->nama }}
              @endif
            </div>
          @endforeach
        @else
          <div class="empty-state">
            Belum ada data portal jurnal yang tersedia.
          </div>
        @endif
      </div>
    </div>
  </div>

  @include('home.libs.script')
  @include('home.libs.footer')

</body>
<!-- Mirrored from elearn.websitelayout.net/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:15 GMT -->

</html>
