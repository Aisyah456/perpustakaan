@extends('home.layouts.add')

@section('title', 'Form Bebas Pustaka')

@section('content')
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow">
          <div class="card-header bg-primary text-white text-center">
            <h2 class="mb-0">Formulir Turnitin</h2>
          </div>
          <div class="card-body">

            {{-- Notifikasi --}}
            @if (session('success'))
              <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            @if ($errors->any())
              <div class="alert alert-danger alert-dismissible fade show">
                <strong>Terjadi kesalahan:</strong>
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <form method="POST" action="{{ route('turnitin.store') }}" enctype="multipart/form-data">
              @csrf

              {{-- Nama dan NIM --}}
              <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}"
                  required>
              </div>

              <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" name="nim" id="nim" class="form-control" value="{{ old('nim') }}"
                  required>
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

              {{-- Kontak --}}
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="no_hp" class="form-label">No. HP</label>
                  <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ old('no_hp') }}"
                    required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="email" class="form-label">Email Aktif</label>
                  <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                    required>
                </div>
              </div>

              {{-- Jenjang --}}
              <div class="mb-3">
                <label for="jenjang" class="form-label">Jenjang Pendidikan</label>
                <select name="jenjang" id="jenjang" class="form-select" required>
                  <option value="">-- Pilih --</option>
                  <option value="D3" {{ old('jenjang') == 'D3' ? 'selected' : '' }}>D3</option>
                  <option value="S1" {{ old('jenjang') == 'S1' ? 'selected' : '' }}>S1</option>
                  <option value="S2" {{ old('jenjang') == 'S2' ? 'selected' : '' }}>S2</option>
                </select>
              </div>

              {{-- Keperluan --}}
              <div class="mb-3">
                <label for="keperluan" class="form-label">Keperluan</label>
                <select name="keperluan" id="keperluan" class="form-select" required>
                  <option value="">-- Pilih --</option>
                  <option value="Wisuda" {{ old('keperluan') == 'Wisuda' ? 'selected' : '' }}>Wisuda</option>
                  <option value="Yudisium" {{ old('keperluan') == 'Yudisium' ? 'selected' : '' }}>Yudisium</option>
                  <option value="Lainnya" {{ old('keperluan') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
              </div>

              {{-- Tahun Masuk / Lulus --}}
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                  <input type="text" name="tahun_masuk" id="tahun_masuk" class="form-control"
                    value="{{ old('tahun_masuk') }}" placeholder="Contoh: 2020" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                  <input type="text" name="tahun_lulus" id="tahun_lulus" class="form-control"
                    value="{{ old('tahun_lulus') }}" placeholder="Contoh: 2024" required>
                </div>
              </div>

              {{-- Upload File --}}
              <div class="mb-3">
                <label for="file_karya_ilmiah" class="form-label">Unggah File Karya Ilmiah (.pdf)</label>
                <input type="file" name="file_karya_ilmiah" id="file_karya_ilmiah" class="form-control" required
                  accept=".pdf">
              </div>

              <div class="mb-3">
                <label for="scan_ktm" class="form-label">Scan KTM (.jpg, .png, .pdf)</label>
                <input type="file" name="scan_ktm" id="scan_ktm" class="form-control" required
                  accept=".jpg,.jpeg,.png,.pdf">
              </div>

              <div class="mb-3">
                <label for="bukti_upload" class="form-label">Bukti Upload</label>
                <input type="file" name="bukti_upload" id="bukti_upload" class="form-control"
                  accept=".jpg,.jpeg,.png,.pdf">
              </div>

              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-lg">Kirim Permohonan</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

  @push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const facultySelect = document.getElementById("faculty_id");
        const majorSelect = document.getElementById("major_id");

        facultySelect.addEventListener("change", function() {
          const facultyId = this.value;
          majorSelect.innerHTML = '<option value="">-- Pilih Program Studi --</option>';

          if (facultyId) {
            fetch(`/get-majors/${facultyId}`)
              .then(response => response.json())
              .then(data => {
                data.forEach(major => {
                  majorSelect.innerHTML += `<option value="${major.id}">${major.nama_prodi}</option>`;
                });
              })
              .catch(() => {
                majorSelect.innerHTML = '<option value="">Gagal memuat data</option>';
              });
          }
        });

        // Jika sudah ada fakultas terpilih (saat error validasi), trigger perubahan
        const oldFacultyId = "{{ old('faculty_id') }}";
        const oldMajorId = "{{ old('major_id') }}";

        if (oldFacultyId) {
          fetch(`/get-majors/${oldFacultyId}`)
            .then(response => response.json())
            .then(data => {
              data.forEach(major => {
                const selected = (major.id == oldMajorId) ? 'selected' : '';
                majorSelect.innerHTML += `<option value="${major.id}" ${selected}>${major.nama_prodi}</option>`;
              });
            });
        }
      });
    </script>
  @endpush
@endsection
