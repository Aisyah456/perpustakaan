@extends('home.layouts.add')

@section('title', 'Form Usulan Buku')

@section('content')
  <article>
    <div class="container mt-5">
      <div class="card shadow rounded-3">
        <div class="card-header bg-primary text-white">
          <h4 class="mb-0">Form Usulan Buku Baru</h4>
        </div>
        <div class="card-body">

          {{-- Pesan Sukses --}}
          @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          {{-- Form Usulan Buku --}}
          <form action="{{ route('usulan-buku.store') }}" method="POST">
            @csrf

            <!-- Data Pengusul -->
            <div class="mb-3">
              <label class="form-label">Nama Pengusul</label>
              <input type="text" class="form-control @error('nama_pengusul') is-invalid @enderror" name="nama_pengusul"
                value="{{ old('nama_pengusul') }}" required>
              @error('nama_pengusul')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label class="form-label">NIM</label>
              <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim"
                value="{{ old('nim') }}" required>
              @error('nim')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label class="form-label">Fakultas</label>
              <input type="text" class="form-control @error('fakultas') is-invalid @enderror" name="fakultas"
                value="{{ old('fakultas') }}" required>
              @error('fakultas')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label class="form-label">Program Studi</label>
              <input type="text" class="form-control @error('program_studi') is-invalid @enderror" name="program_studi"
                value="{{ old('program_studi') }}" required>
              @error('program_studi')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label class="form-label">Status</label>
              <select class="form-select @error('status') is-invalid @enderror" name="status" required>
                <option value="">-- Pilih Status --</option>
                <option value="mahasiswa" {{ old('status') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                <option value="dosen" {{ old('status') == 'dosen' ? 'selected' : '' }}>Dosen</option>
              </select>
              @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Buku yang Diusulkan -->
            <div id="buku-container">
              <h5 class="mt-4 mb-3">Informasi Buku yang Diusulkan</h5>

              <div class="buku-item border rounded p-3 mb-3">
                <div class="mb-3">
                  <label class="form-label">Judul Buku</label>
                  <input type="text" class="form-control" name="judul_buku[]" required>
                </div>

                <div class="mb-3">
                  <label class="form-label">Pengarang</label>
                  <input type="text" class="form-control" name="pengarang[]" required>
                </div>

                <div class="mb-3">
                  <label class="form-label">Penerbit</label>
                  <input type="text" class="form-control" name="penerbit[]" required>
                </div>

                <div class="mb-3">
                  <label class="form-label">Tahun Terbit</label>
                  <input type="number" min="1900" max="2100" class="form-control" name="tahun_terbit[]" required>
                </div>

                <div class="mb-3">
                  <label class="form-label">Alasan Pengadaan</label>
                  <textarea class="form-control" name="alasan[]" rows="2" required></textarea>
                </div>
              </div>
            </div>

            <!-- Tombol Tambah Buku -->
            <div class="mb-3 text-end">
              <button type="button" id="add-buku-btn" class="btn btn-outline-secondary">+ Tambah Buku</button>
            </div>

            <!-- Submit -->
            <div class="mb-3 text-end">
              <button type="submit" class="btn btn-success">Kirim Usulan</button>
            </div>

            <p class="text-muted small">* Maksimal 2 buku yang dapat diusulkan.</p>
          </form>
        </div>
      </div>
    </div>
  </article>
@endsection

@push('scripts')
  <script>
    let maxBuku = 2;
    let jumlahBuku = 1;

    document.getElementById('add-buku-btn').addEventListener('click', function() {
      if (jumlahBuku >= maxBuku) {
        alert('Maksimal hanya 2 buku yang dapat diusulkan.');
        return;
      }

      let bukuContainer = document.getElementById('buku-container');
      let bukuItem = document.querySelector('.buku-item');
      let newBuku = bukuItem.cloneNode(true);

      // Reset input value
      newBuku.querySelectorAll('input, textarea').forEach(el => el.value = '');
      bukuContainer.appendChild(newBuku);

      jumlahBuku++;
    });
  </script>
@endpush
