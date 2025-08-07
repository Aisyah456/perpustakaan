@extends('home.layouts.add')

@section('title', 'Layanan Bebas Pustaka')
@section('page', 'Layanan Bebas Pustaka')

@section('content')


  <section class="py-5">
    <div class="container">
      <div class="row justify-content-center">
        <!-- Konten Utama -->
        <div class="col-lg-10">
          <article class="bg-white shadow-sm p-4 rounded-3">

            <!-- Judul -->
            <div class="text-center mb-5">
              <h2 class="fw-bold mb-2">📄 PROSEDUR LAYANAN BEBAS PUSTAKA KEPERLUAN YUDISIUM / WISUDA </h2>
              <p class="text-muted mb-0">
                Layanan Bebas Pustaka bagi Mahasiswa Universitas Mohammad Husni Thamrin
              </p>
            </div>

            <!-- Syarat Dan Ketentuan -->
            <div class="mb-5">
              <h4 class="mb-3">📌 SYARAT DAN KETENTUAN </h4>
              <ol class="ps-3">
                <li class="mb-2">
                  Mahasiswa telah menyelesaikan ujian (dan revisi) TA/Skripsi/Tesis/Disertasi dibuktikan dengan lembar
                  pengesahan.
                </li>
                <li>
                  TA/Skripsi/Tesis/Disertasi dibuat dalam format PDF dan disusun dalam format berikut:
                </li>
                <ol>
                  <li>
                    Halaman judul <strong>(terdiri dari: Cover, pernyataan keaslian, persembahan, kata pengantar,
                      daftar isi, daftar tabel, daftar bagan, dan daftar lampiran)</strong><br>
                    <em>Catatan:</em> halaman pernyataan harus ada ttd dan materai Rp. 10.000, halaman judul tidak ada
                    pengesahannya.
                  </li>
                  <li>
                    Lembar Pengesahan <strong>(Harus disertai dengan tandatangan dan cap)</strong>
                  </li>
                  <li>
                    Abstrak <strong>(bahasa Indonesia dan bahasa Inggris)</strong>
                  </li>
                  <li>BAB I</li>
                  <li>BAB II</li>
                  <li>BAB III</li>
                  <li>BAB IV</li>
                  <li>BAB V</li>
                  <li><strong>BAB VI (optional)</strong></li>
                  <li>Daftar Pustaka</li>
                  <li>Lampiran</li>
                  <li>
                    Naskah Publikasi/Jurnal <strong>(Ringkasan skripsi dalam bentuk artikel jurnal)</strong>
                  </li>
                  <li>
                    Full Text <strong>(mulai cover sampai lampiran skripsi)</strong>
                  </li>
                </ol>
                <li class="mb-2"> Mahasiswa tidak memiliki pinjaman buku dan tunggakan denda pinjaman di
                  perpustakaan.</li>
                <li class="mb-2">Membayar sumbangan buku (bisa berupa uang Rp. 100.000 atau berupa buku baru yang
                  temanya sesuai dengan prodi terkait & diserahkan langsung ke Perpustakaan)</li>
              </ol>
            </div>




            <!-- Cara Mengajukan -->
            <div class="mb-5">
              <h4 class="mb-3">📬 Cara Mengajukan</h4>
              <ol class="ps-3">
                <li class="mb-2">Isi formulir pengajuan bebas pustaka secara online melalui link di bawah ini.</li>
                <li class="mb-2">Pastikan tidak memiliki pinjaman buku yang belum dikembalikan.</li>
                <li class="mb-2">Upload file skripsi/TA (jika diminta).</li>
                <li class="mb-2">Tunggu verifikasi dari pihak perpustakaan.</li>
                <li>Surat Bebas Pustaka akan dikirimkan ke email Anda maksimal 3 hari kerja.</li>
              </ol>
            </div>

            <!-- Tombol Pengajuan -->
            <div class="text-center">
              <a href="/formulir-bebas-pustaka" class="btn btn-primary px-4 py-2">
                📥 Ajukan Bebas Pustaka
              </a>
            </div>

          </article>
        </div>
      </div>
    </div>
  </section>
@endsection
