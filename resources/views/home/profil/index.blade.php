@extends('home.layouts.add')

@section('title', 'About Us')

@section('content')
  <!-- ABOUT US
                                                                                          ================================================== -->
@section('content')
  <section class="about-style-02">
    <div class="container">
      <div class="row align-items-xl-center mt-n2-9">
        <div class="col-lg-6 mt-2-9 wow fadeInUp" data-wow-delay="100ms">
          <div class="text-center text-lg-end position-relative about-left">
            <img src="{{ asset('lib/img/content/Perpustakaan Kampus.jpg') }}" alt="Perpustakaan Universitas"
              class="rounded position-relative z-index-9">
            <div class="left-top-box text-center rounded d-none d-lg-block">
              <img src="{{ asset('lib/img/content/4.jpg') }}" alt="Foto Perpustakaan">
            </div>

          </div>
        </div>
        <div class="col-lg-6 mt-2-9">
          <div class="ps-lg-2-6 ps-xxl-10">
            <div class="section-title02 mb-1-9 wow fadeInUp" data-wow-delay="150ms">
              <span class="sm-title">Profil Perpustakaan</span>
              <h2 class="ls-minus-2px display-6 font-weight-800 lh-1 mb-1-9">
                Perpustakaan Universitas Mohammad Husni Thamrin
              </h2>
            </div>
            <p class="mb-2-2 wow fadeInUp" data-wow-delay="200ms">
              Perpustakaan Universitas Mohammad Husni Thamrin merupakan pusat layanan informasi yang mendukung kegiatan
              akademik, penelitian, dan pengembangan ilmu pengetahuan. Koleksi perpustakaan mencakup buku cetak, jurnal
              ilmiah, e-book, serta akses ke berbagai database digital.
            </p>
            <p class="mb-2-2 wow fadeInUp" data-wow-delay="250ms">
              Dengan fasilitas modern dan layanan yang terintegrasi secara digital, perpustakaan bertujuan memberikan
              kemudahan akses informasi bagi mahasiswa, dosen, dan civitas akademika. Kami berkomitmen menjadi mitra
              strategis dalam proses belajar mengajar di lingkungan universitas.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ADDRESS
                                                                                ================================================== -->
  <section class="about-style-02" style="background: linear-gradient(135deg, #e6f2ed, #ffffff); padding: 60px 0;">
    <div class="container">
      <div class="row footer-address justify-content-center">
        <div class="col-lg-10">
          <div class="bg-white p-4 shadow border-radius-10 text-center position-relative" style="border-radius: 15px;">
            <div class="row align-items-center">
              <!-- Gambar ilustrasi prestasi -->
              <div class="col-md-4 mb-3 mb-md-0">
                <img src="{{ asset('lib/img/icons/business-success-goal-and-leadership-outline-icon-vector.jpg') }}"
                  alt="Ilustrasi Prestasi" class="img-fluid rounded">
              </div>
              <!-- Konten teks -->
              <div class="col-md-8 text-md-start text-center">
                <h4 class="fw-bold text-success">
                  <i class="bi bi-award-fill me-2"></i>PRESTASI PERPUSTAKAAN
                </h4>
                <p class="mb-3 text-muted">
                  Universitas Mohammad Husni Thamrin terus meraih berbagai penghargaan di bidang literasi, inovasi
                  digital, dan pelayanan perpustakaan.
                </p>
                <a href="#" class="btn btn-success shadow-sm">Read More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="about-style-02" style="background: linear-gradient(135deg, #e6f2ed, #ffffff); padding: 60px 0;">
    <div class="container">
      <div class="row footer-address justify-content-center">
        <div class="col-lg-10">
          <div class="bg-white p-4 shadow border-radius-10 position-relative" style="border-radius: 15px;">
            <div class="row align-items-center">
              <!-- Gambar ilustrasi visi misi -->
              <div class="col-md-4 mb-3 mb-md-0 text-center">
                <img src="{{ asset('lib/img/icons/visimisi.jpg') }}" alt="Ilustrasi Visi Misi" class="img-fluid rounded">
              </div>
              <!-- Konten teks visi & misi -->
              <div class="col-md-8 text-md-start text-center">
                <h4 class="fw-bold text-success mb-3">
                  <i class="bi bi-eye-fill me-2"></i>VISI PERPUSTAKAAN
                </h4>
                <p class="text-muted mb-4">
                  Menjadi pusat informasi, literasi, dan sumber belajar unggul berbasis teknologi dalam mendukung
                  tridharma perguruan tinggi dan pengembangan ilmu pengetahuan.
                </p>

                <h4 class="fw-bold text-success mb-3">
                  <i class="bi bi-bullseye me-2"></i>MISI PERPUSTAKAAN
                </h4>
                <ul class="text-muted ps-3">
                  <li>Menyediakan layanan informasi yang cepat, tepat, dan akurat berbasis teknologi digital.</li>
                  <li>Mendukung kegiatan pendidikan, penelitian, dan pengabdian masyarakat.</li>
                  <li>Meningkatkan literasi informasi sivitas akademika dan masyarakat umum.</li>
                  <li>Menjalin kerja sama dengan berbagai institusi untuk pengembangan koleksi dan layanan.</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- Struktur Organisasi -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Struktur Organisasi</h2>
        <p class="text-muted">Biro Administrasi Umum Universitas Mohammad Husni Thamrin</p>
      </div>

      {{-- Level 1: Kepala --}}
      @php
        $kepala = $structures->where('position', 'Kepala Biro Umum')->first();
      @endphp
      @if ($kepala)
        <div class="row justify-content-center mb-4">
          <div class="col-md-4 text-center">
            <div class="p-3 bg-white rounded shadow-sm">
              <img src="{{ asset('storage/photo/' . $kepala->photo) }}" class="img-fluid rounded-circle mb-3"
                alt="{{ $kepala->name }}" width="120" height="120">
              <h5 class="fw-bold">{{ $kepala->name }}</h5>
              <p class="text-muted">{{ $kepala->position }}</p>
            </div>
          </div>
        </div>
      @endif

      {{-- Level 2: Subbagian langsung di bawah Kepala --}}
      <div class="row justify-content-center mb-4">
        @foreach ($structures->where('parent_id', optional($kepala)->id) as $subbagian)
          <div class="col-md-4 text-center mb-3">
            <div class="p-3 bg-white rounded shadow-sm">
              <img src="{{ asset('storage/' . $subbagian->photo) }}" class="img-fluid rounded-circle mb-3"
                alt="{{ $subbagian->name }}" width="100" height="100">
              <h6 class="fw-bold">{{ $subbagian->name }}</h6>
              <p class="text-muted">{{ $subbagian->position }}</p>
            </div>
          </div>
        @endforeach
      </div>

      {{-- Level 3: Staff lainnya (parent_id dari subbagian) --}}
      <div class="row justify-content-center">
        @foreach ($structures->filter(function ($item) use ($kepala) {
          return $item->parent_id !== null && $item->parent_id !== optional($kepala)->id;
      }) as $staff)
          <div class="col-md-3 text-center mb-4">
            <div class="p-3 bg-white rounded shadow-sm">
              <img src="{{ asset('storage/' . $staff->photo) }}" class="img-fluid rounded-circle mb-3"
                alt="{{ $staff->name }}" width="100" height="100">
              <h6 class="fw-bold">{{ $staff->name }}</h6>
              <p class="text-muted">{{ $staff->position }}</p>
            </div>
          </div>
        @endforeach
      </div>

    </div>
  </section>
@endsection
