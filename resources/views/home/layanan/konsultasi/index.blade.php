@extends('home.layouts.add')

@section('title', 'Layanan Konsultasi')
@section('page', 'Layanan Konsultasi')
<!-- Tambahkan di bagian head -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Tambahkan di bagian footer -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@section('content')
  <div class="container py-5">
    <h2 class="mb-4">Formulir Layanan Konsultasi</h2>

    <!-- Notifikasi sukses -->
    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <!-- Tampilkan error validasi jika ada -->
    @if ($errors->any())
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <form action="{{ route('home.layanan.konsultasi.index') }}" method="POST">
      @csrf

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" name="nama" id="nama" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
          <label for="nim_nidn" class="form-label">NIM/NIDN</label>
          <input type="text" name="nim_nidn" id="nim_nidn" class="form-control" required>
        </div>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="topik_konsultasi" class="form-label">Topik Konsultasi</label>
        <input type="text" name="topik_konsultasi" id="topik_konsultasi" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="pesan" class="form-label">Pesan</label>
        <textarea name="pesan" id="pesan" rows="5" class="form-control" required></textarea>
      </div>

      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-primary px-4 py-2">Kirim</button>
      </div>
    </form>
  </div>
@endsection
