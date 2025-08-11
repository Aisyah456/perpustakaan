@extends('home.layouts.add')
@section('title', 'Layanan Pelatihan Literasi')

@section('content')
  <section class="py-5">
    <div class="container">
      <div class="row g-5">

        <!-- Konten Utama -->
        <div class="col-lg-12">
          <h2 class="mb-3">📚 Pelatihan Literasi</h2>
          <p>
            Pelatihan Literasi diselenggarakan oleh Perpustakaan Universitas Mohammad Husni Thamrin untuk
            membekali mahasiswa dalam mengakses, mengevaluasi, dan menggunakan informasi akademik secara efektif.
          </p>
          </article>

          <!-- Tujuan -->
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">🎯 Tujuan</h5>
              <ul class="mb-0">
                <li>Meningkatkan kemampuan pencarian dan penggunaan informasi ilmiah</li>
                <li>Memahami etika penggunaan sumber dan sitasi</li>
                <li>Mengetahui cara kerja cek plagiarisme (Turnitin)</li>
                <li>Memaksimalkan layanan dan sumber daya perpustakaan</li>
              </ul>
            </div>
          </div>

          <!-- Materi -->
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">📝 Materi Pelatihan</h5>
              <ol class="mb-0">
                <li>Pengenalan Perpustakaan dan Layanan Digital</li>
                <li>Strategi Pencarian Informasi Akademik</li>
                <li>Evaluasi Sumber & Referensi Ilmiah</li>
                <li>Manajemen Sitasi (Zotero / Mendeley)</li>
                <li>Pengenalan Plagiarisme dan Turnitin</li>
                <li>Penggunaan E-Journal & E-Book</li>
              </ol>
            </div>
          </div>

          <!-- Jadwal -->
          <div class="mb-4">
            <h5>📆 Jadwal</h5>
            <p>Setiap Hari <strong>Rabu & Jumat</strong>, pukul <strong>09.00 – 12.00 WIB</strong></p>
            <p>Tempat: <strong>Ruang Pelatihan Perpustakaan / via Zoom</strong></p>
          </div>

          <!-- Formulir -->
          <div class="card shadow-sm">
            <div class="card-body">
              <h5 class="card-title mb-3">📋 Formulir Pendaftaran Pelatihan Literasi</h5>
              <form action="{{ route('literasi.layanan-perpustakaan.store') }}" method="POST">
                @csrf

                <!-- Nama Peserta -->
                <div class="mb-3">
                  <label for="nama_peserta" class="form-label">Nama Lengkap</label>
                  <input type="text" id="nama_peserta" name="nama_peserta" class="form-control"
                    placeholder="Masukkan nama lengkap" required>
                </div>

                <!-- NIM / NIP -->
                <div class="mb-3">
                  <label for="nim_nip" class="form-label">NIM / NIP</label>
                  <input type="text" id="nim_nip" name="nim_nip" class="form-control" placeholder="Masukkan NIM/NIP"
                    required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" id="email" name="email" class="form-control"
                    placeholder="Masukkan email aktif" required>
                </div>
                {{-- Fakultas & Prodi --}}
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="faculty_id" class="form-label">Fakultas</label>
                    <select name="faculty_id" id="faculty_id" class="form-select" required>
                      <option value="">-- Pilih Fakultas --</option>
                      @foreach ($faculties as $faculty)
                        <option value="{{ $faculty->id }}" {{ old('faculty_id') == $faculty->id ? 'selected' : '' }}>
                          {{ $faculty->nama_fakultas }}
                        </option>
                      @endforeach
                    </select>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="major_id" class="form-label">Program Studi</label>
                    <select name="major_id" id="major_id" class="form-select" required>
                      <option value="">-- Pilih Program Studi --</option>
                    </select>
                  </div>
                </div>

                <!-- Instansi -->
                <div class="mb-3">
                  <label for="instansi" class="form-label">Instansi (Opsional)</label>
                  <input type="text" id="instansi" name="instansi" class="form-control"
                    placeholder="Masukkan instansi">
                </div>

                <!-- Jenis Pelatihan -->
                <div class="mb-3">
                  <label for="jenis_pelatihan" class="form-label">Jenis Pelatihan</label>
                  <select name="jenis_pelatihan" id="jenis_pelatihan" class="form-select" required>
                    <option value="" disabled selected>Pilih jenis pelatihan</option>
                    <option value="Literasi Informasi">Literasi Informasi</option>
                    <option value="E-Resources">E-Resources</option>
                    <option value="Turnitin">Turnitin</option>
                    <option value="Manajemen Referensi">Manajemen Referensi</option>
                  </select>
                </div>

                <!-- Tanggal Pelatihan -->
                <div class="mb-3">
                  <label for="tanggal_pelatihan" class="form-label">Tanggal Pelatihan</label>
                  <input type="date" id="tanggal_pelatihan" name="tanggal_pelatihan" class="form-control" required>
                </div>

                <!-- Catatan -->
                <div class="mb-3">
                  <label for="catatan" class="form-label">Catatan (Opsional)</label>
                  <textarea id="catatan" name="catatan" class="form-control" rows="3" placeholder="Tambahkan catatan..."></textarea>
                </div>

                <!-- Tombol -->
                <button type="submit" class="btn btn-primary w-100">Kirim Pendaftaran</button>
              </form>
            </div>
          </div>


          <!-- Info Kontak -->
          <p class="text-muted mt-3 mb-0">
            📧 Konfirmasi akan dikirim ke email pendaftar.
            Untuk pertanyaan lebih lanjut, hubungi: <strong>perpustakaan@thamrin.ac.id</strong>
          </p>
        </div>


      </div>
    </div>
  </section>

  @push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $('#faculty_id').change(function() {
        let facultyId = $(this).val();
        $('#major_id').empty().append('<option value="">-- Pilih Program Studi --</option>');

        if (facultyId) {
          $.get(`/get-majors/${facultyId}`, function(data) {
            data.forEach(function(item) {
              $('#major_id').append(`<option value="${item.id}">${item.nama_fakultas}</option>`);
            });
          });
        }
      });
    </script>
  @endpush
@endsection
