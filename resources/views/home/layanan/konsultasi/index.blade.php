@extends('home.layouts.add')

@section('title', 'Layanan Konsultasi')

@section('content')
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">

        <div class="card shadow-lg border-0 rounded-4">
          <div class="card-header bg-primary text-white text-center rounded-top-4 py-3">
            <h3 class="mb-0"><i class="fas fa-comments me-2"></i> Formulir Layanan Konsultasi</h3>
          </div>
          <div class="card-body p-4">

            {{-- Notifikasi sukses --}}
            @if (session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            {{-- Tampilkan error validasi --}}
            @if ($errors->any())
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li><i class="fas fa-exclamation-circle me-1"></i> {{ $error }}</li>
                  @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <form action="{{ route('home.layanan.konsultasi.store') }}" method="POST">
              @csrf

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="nama" class="form-label fw-semibold">Nama</label>
                  <input type="text" name="nama" id="nama" class="form-control rounded-3 shadow-sm" required>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="nim_nidn" class="form-label fw-semibold">NIM / NIDN</label>
                  <input type="text" name="nim_nidn" id="nim_nidn" class="form-control rounded-3 shadow-sm" required>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4 mb-3">
                  <label for="tahun_masuk" class="form-label fw-semibold">Tahun Masuk</label>
                  <input type="number" name="tahun_masuk" id="tahun_masuk" class="form-control rounded-3 shadow-sm"
                    placeholder="2025" min="1900" max="2100">
                </div>

                <div class="col-md-4 mb-3">
                  <label for="fakultas" class="form-label fw-semibold">Fakultas</label>
                  <input type="text" name="fakultas" id="fakultas" class="form-control rounded-3 shadow-sm"
                    placeholder="Fakultas Teknik">
                </div>

                <div class="col-md-4 mb-3">
                  <label for="program_studi" class="form-label fw-semibold">Program Studi</label>
                  <input type="text" name="program_studi" id="program_studi" class="form-control rounded-3 shadow-sm"
                    placeholder="Teknik Informatika">
                </div>
              </div>

              <div class="mb-3">
                <label for="no_hp" class="form-label fw-semibold">No HP</label>
                <input type="text" name="no_hp" id="no_hp" class="form-control rounded-3 shadow-sm"
                  placeholder="0812xxxxxx">
              </div>

              <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" name="email" id="email" class="form-control rounded-3 shadow-sm" required>
              </div>

              <div class="mb-3">
                <label for="dosen_pembimbing" class="form-label fw-semibold">Nama Dosen Pembimbing</label>
                <input type="text" name="dosen_pembimbing" id="dosen_pembimbing"
                  class="form-control rounded-3 shadow-sm" placeholder="Dr. Budi Santoso">
              </div>

              <div class="mb-3">
                <label for="topik_konsultasi" class="form-label fw-semibold">Topik Konsultasi</label>
                <input type="text" name="topik_konsultasi" id="topik_konsultasi"
                  class="form-control rounded-3 shadow-sm" required>
              </div>

              <div class="mb-3">
                <label for="pesan" class="form-label fw-semibold">Pesan</label>
                <textarea name="pesan" id="pesan" rows="5" class="form-control rounded-3 shadow-sm" required></textarea>
              </div>



              <div class="d-grid">
                <button type="submit" class="btn btn-primary rounded-3 py-2 fw-semibold shadow-sm">
                  <i class="fas fa-paper-plane me-2"></i> Kirim
                </button>
              </div>
            </form>

          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
