@extends('home.layouts.add')

@section('title', 'Layanan Referensi')
@section('page', 'Layanan Referensi')

@section('content')

  <!-- Hal Utama
                      ================================================== -->

  <section class="py-5 bg-light">
    <div class="container py-5">
      <h2 class="mb-4 text-center">Layanan Referensi</h2>

      <p class="text-justify">
        Layanan Referensi adalah layanan yang disediakan oleh Perpustakaan Universitas Mohammad Husni Thamrin untuk
        membantu mahasiswa, dosen, dan peneliti dalam menemukan informasi ilmiah yang relevan dan akurat. Layanan ini
        juga membantu dalam penggunaan sumber-sumber informasi seperti jurnal, buku, dan database elektronik.
      </p>

      <h4 class="mt-4">Jenis Layanan:</h4>
      <ul class="list-group list-group-flush mb-4">
        <li class="list-group-item">Bimbingan penggunaan katalog online (OPAC)</li>
        <li class="list-group-item">Pencarian referensi tugas akhir dan karya ilmiah</li>
        <li class="list-group-item">Pendampingan akses jurnal elektronik dan database online</li>
        <li class="list-group-item">Konsultasi penulisan kutipan dan daftar pustaka</li>
      </ul>

      <h4>Prosedur Layanan:</h4>
      <ol class="mb-4">
        <li>Datang langsung ke meja layanan referensi atau isi form konsultasi di bawah.</li>
        <li>Petugas akan membantu sesuai kebutuhan referensi Anda.</li>
        <li>Layanan tersedia selama jam operasional perpustakaan.</li>
      </ol>

      <h4>Jam Layanan:</h4>
      <p>Senin – Jumat: 08.00 – 17.00 WIB<br>Sabtu & Minggu: Tutup</p>


      <h4 class="mt-5">Form Konsultasi Online</h4>

      {{-- Notifikasi pesan terkirim --}}
      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <form action="{{ route('referensi.kirim') }}" method="POST" class="mt-3">
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Alamat Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
          <label for="topik" class="form-label">Topik yang Dicari</label>
          <input type="text" class="form-control" id="topik" name="topik"
            placeholder="Contoh: Kesehatan Masyarakat" required>
        </div>
        <div class="mb-3">
          <label for="pesan" class="form-label">Pesan atau Permintaan Khusus</label>
          <textarea class="form-control" id="pesan" name="pesan" rows="4" placeholder="Jelaskan kebutuhan Anda..."
            required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim Permintaan</button>
      </form>


      <p class="mt-5 text-muted text-center"><em>Perpustakaan Universitas Mohammad Husni Thamrin – Meningkatkan
          literasi informasi akademik Anda.</em></p>
    </div>
  </section>
@endsection
