@extends('admin.layouts.app')

@section('title', 'List Plagiat')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<style>
  .header-admin {
    background: linear-gradient(90deg, #2d5a4a 0%, #2d5a4a 70%, #f4b942 70%, #f4b942 100%);
    height: 8px;
  }

  .navbar-brand {
    color: #2d5a4a !important;
    font-weight: bold;
  }

  .btn-primary {
    background-color: #2d5a4a;
    border-color: #2d5a4a;
  }

  .btn-primary:hover {
    background-color: #1a3d32;
    border-color: #1a3d32;
  }

  .btn-warning {
    background-color: #f4b942;
    border-color: #f4b942;
    color: #2d5a4a;
  }

  .table th {
    background-color: #2d5a4a;
    color: white;
  }

  .alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
  }

  .modal-header {
    background-color: #2d5a4a;
    color: white;
  }

  .modal-header .btn-close {
    filter: brightness(0) invert(1);
  }

  .form-label {
    color: #2d5a4a;
    font-weight: 600;
  }

  .preview-box {
    background-color: #f4b942;
    padding: 15px;
    border-radius: 5px;
    margin-top: 15px;
  }

  .banner-preview {
    position: relative;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 8px;
    overflow: hidden;
    min-height: 300px;
    display: flex;
    align-items: center;
    color: white;
  }

  .banner-preview::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.4);
    z-index: 1;
  }

  .banner-preview-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: 0;
  }

  .banner-content {
    position: relative;
    z-index: 2;
    padding: 30px;
    width: 100%;
  }

  .banner-subtitle {
    font-size: 0.9rem;
    opacity: 0.9;
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  .banner-title {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 15px;
    line-height: 1.2;
  }

  .banner-description {
    font-size: 1rem;
    opacity: 0.9;
    margin-bottom: 20px;
    line-height: 1.5;
  }

  .banner-button {
    display: inline-block;
    padding: 12px 24px;
    background: #f4b942;
    color: #2d5a4a;
    text-decoration: none;
    border-radius: 5px;
    font-weight: 600;
    transition: all 0.3s ease;
  }

  .banner-button:hover {
    background: #e6a73a;
    transform: translateY(-2px);
  }

  .image-upload-preview {
    max-width: 100px;
    max-height: 100px;
    object-fit: cover;
    border-radius: 5px;
    border: 2px solid #dee2e6;
  }

  .loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    visibility: hidden;
    opacity: 0;
    transition: visibility 0s, opacity 0.3s;
  }

  .loading-overlay.show {
    visibility: visible;
    opacity: 1;
  }

  .spinner-container {
    background: white;
    padding: 20px;
    border-radius: 8px;
    text-align: center;
  }

  .file-input-wrapper {
    position: relative;
    overflow: hidden;
    display: inline-block;
    cursor: pointer;
    width: 100%;
  }

  .file-input-wrapper input[type=file] {
    position: absolute;
    left: -9999px;
  }

  .file-input-label {
    border: 2px dashed #dee2e6;
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    background: #f8f9fa;
    transition: all 0.3s ease;
  }

  .file-input-label:hover {
    border-color: #2d5a4a;
    background: #e8f5e8;
  }

  .current-image {
    max-width: 150px;
    max-height: 100px;
    object-fit: cover;
    border-radius: 5px;
    border: 1px solid #dee2e6;
  }

  .banner-status {
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
  }

  .status-active {
    background: #d4edda;
    color: #155724;
  }

  .status-inactive {
    background: #f8d7da;
    color: #721c24;
  }
</style>
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-images"></i> Kelola Data Pengajuan Bebas Pustaka</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
          <i class="fas fa-plus"></i> Tambah Data Pengajuan Bebas Pustak
        </button>
      </div>
      <div class="header-admin"></div>
      <!-- Alert Messages -->
      <div id="alert-container">
        @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        @endif

        @if (session('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        @endif
      </div>


      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead class="table-success text-center">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>NIM</th>
              <th>Fakultas</th>
              <th>Prodi</th>
              <th>Jenjang</th>
              <th>Tahun Lulus</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody class="text-center">
            @forelse ($entries as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->nim }}</td>
                <td>{{ $data->faculty->nama_fakultas ?? '-' }}</td>
                <td>{{ $data->major->nama_prodi ?? '-' }}</td>
                <td>{{ $data->jenjang }}</td>
                <td>{{ $data->tahun_lulus }}</td>
                <td>
                  <span
                    class="badge bg-{{ $data->status == 'disetujui' ? 'success' : ($data->status == 'ditolak' ? 'danger' : 'secondary') }}">
                    {{ ucfirst($data->status) }}
                  </span>
                </td>
                <td>
                  <!-- Tombol Edit & Delete -->
                  <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                    data-bs-target="#editModal{{ $data->id }}">
                    <i class="fas fa-edit"></i>
                  </button>
                  <form action="{{ route('plagiat.destroy', $data->id) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>


            @empty
              <tr>
                <td colspan="9" class="text-center">Belum ada data.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>


    <!-- Modal Tambah Data -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <form action="{{ route('admin.pustaka.store') }}" method="POST" enctype="multipart/form-data"
          class="modal-content">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">Tambah Data Pengajuan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body row g-3">

            <div class="col-md-6">
              <label class="form-label">Nama</label>
              <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">NIM</label>
              <input type="text" name="nim" class="form-control" required>
            </div>

            <div class="col-md-6">
              <label class="form-label">Fakultas</label>
              <select name="faculty_id" class="form-select" required>
                <option disabled selected>-- Pilih Fakultas --</option>
                @foreach ($faculties as $fak)
                  <option value="{{ $fak->id }}">{{ $fak->nama_fakultas }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label">Program Studi</label>
              <select name="major_id" class="form-select" required>
                <option disabled selected>-- Pilih Prodi --</option>
                @foreach ($majors as $major)
                  <option value="{{ $major->id }}">{{ $major->nama_prodi }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label">No HP</label>
              <input type="text" name="no_hp" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" required>
            </div>

            <div class="col-md-6">
              <label class="form-label">Jenjang</label>
              <select name="jenjang" class="form-select" required>
                <option value="D3">D3</option>
                <option value="S1">S1</option>
                <option value="S2">S2</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label">Keperluan</label>
              <input type="text" name="keperluan" class="form-control" required>
            </div>

            <div class="col-md-6">
              <label class="form-label">Tahun Masuk</label>
              <input type="text" name="tahun_masuk" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Tahun Lulus</label>
              <input type="text" name="tahun_lulus" class="form-control" required>
            </div>

            <div class="col-md-6">
              <label class="form-label">File Karya Ilmiah (PDF)</label>
              <input type="file" name="file_karya_ilmiah" class="form-control" accept="application/pdf" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Scan KTM</label>
              <input type="file" name="scan_ktm" class="form-control" required>
            </div>

            <div class="col-md-12">
              <label class="form-label">Bukti Upload Repositori</label>
              <input type="text" name="bukti_upload" class="form-control">
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1"
      aria-labelledby="editModalLabel{{ $data->id }}" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <form action="{{ route('admin.pustaka.update', $data->id) }}" method="POST" enctype="multipart/form-data"
          class="modal-content">
          @csrf
          @method('PUT')
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel{{ $data->id }}">Edit Data - {{ $data->nama }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body row g-3">

            {{-- Nama --}}
            <div class="col-md-6">
              <label class="form-label">Nama</label>
              <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                value="{{ old('nama', $data->nama) }}" required>
              @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            {{-- NIM --}}
            <div class="col-md-6">
              <label class="form-label">NIM</label>
              <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror"
                value="{{ old('nim', $data->nim) }}" required>
              @error('nim')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            {{-- Fakultas --}}
            <div class="col-md-6">
              <label class="form-label">Fakultas</label>
              <select name="faculty_id" class="form-select @error('faculty_id') is-invalid @enderror" required>
                @foreach ($faculties as $fak)
                  <option value="{{ $fak->id }}" {{ $data->faculty_id == $fak->id ? 'selected' : '' }}>
                    {{ $fak->nama_fakultas }}
                  </option>
                @endforeach
              </select>
              @error('faculty_id')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            {{-- Prodi --}}
            <div class="col-md-6">
              <label class="form-label">Prodi</label>
              <select name="major_id" class="form-select @error('major_id') is-invalid @enderror" required>
                @foreach ($majors as $major)
                  <option value="{{ $major->id }}" {{ $data->major_id == $major->id ? 'selected' : '' }}>
                    {{ $major->nama_fakultas }}
                  </option>
                @endforeach
              </select>
              @error('major_id')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            {{-- No HP --}}
            <div class="col-md-6">
              <label class="form-label">No HP</label>
              <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror"
                value="{{ old('no_hp', $data->no_hp) }}">
              @error('no_hp')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            {{-- Email --}}
            <div class="col-md-6">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $data->email) }}">
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            {{-- Jenjang --}}
            <div class="col-md-6">
              <label class="form-label">Jenjang</label>
              <select name="jenjang" class="form-select @error('jenjang') is-invalid @enderror">
                @foreach (['D3', 'S1', 'S2'] as $jenjang)
                  <option value="{{ $jenjang }}" {{ $data->jenjang == $jenjang ? 'selected' : '' }}>
                    {{ $jenjang }}</option>
                @endforeach
              </select>
              @error('jenjang')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            {{-- Keperluan --}}
            <div class="col-md-6">
              <label class="form-label">Keperluan</label>
              <input type="text" name="keperluan" class="form-control @error('keperluan') is-invalid @enderror"
                value="{{ old('keperluan', $data->keperluan) }}">
              @error('keperluan')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            {{-- Tahun Masuk --}}
            <div class="col-md-6">
              <label class="form-label">Tahun Masuk</label>
              <input type="text" name="tahun_masuk" class="form-control @error('tahun_masuk') is-invalid @enderror"
                value="{{ old('tahun_masuk', $data->tahun_masuk) }}">
              @error('tahun_masuk')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            {{-- Tahun Lulus --}}
            <div class="col-md-6">
              <label class="form-label">Tahun Lulus</label>
              <input type="text" name="tahun_lulus" class="form-control @error('tahun_lulus') is-invalid @enderror"
                value="{{ old('tahun_lulus', $data->tahun_lulus) }}">
              @error('tahun_lulus')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            {{-- File Karya Ilmiah --}}
            <div class="col-md-6">
              <label class="form-label">File Karya Ilmiah (abaikan jika tidak diganti)</label>
              <input type="file" name="file_karya_ilmiah"
                class="form-control @error('file_karya_ilmiah') is-invalid @enderror" accept="application/pdf">
              @error('file_karya_ilmiah')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            {{-- Scan KTM --}}
            <div class="col-md-6">
              <label class="form-label">Scan KTM (abaikan jika tidak diganti)</label>
              <input type="file" name="scan_ktm" class="form-control @error('scan_ktm') is-invalid @enderror">
              @error('scan_ktm')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            {{-- Status --}}
            <div class="col-md-12">
              <label class="form-label">Status</label>
              <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                <option value="pending" {{ $data->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ $data->status == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ $data->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
              </select>
              @error('status')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>

            {{-- Bukti Upload --}}
            <div class="col-md-12">
              <label class="form-label">Bukti Upload</label>
              <input type="text" name="bukti_upload"
                class="form-control @error('bukti_upload') is-invalid @enderror"
                value="{{ old('bukti_upload', $data->bukti_upload) }}">
              @error('bukti_upload')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <form method="POST" class="modal-content" id="deleteForm">
          @csrf
          @method('DELETE')
          <div class="modal-header">
            <h5 class="modal-title">Konfirmasi Hapus</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <p>Apakah kamu yakin ingin menghapus <strong id="delete-nama"></strong>?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
          </div>
        </form>
      </div>
    </div>

    <script>
      document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function() {
          const id = this.dataset.id;
          const nama = this.dataset.nama;
          document.getElementById('deleteForm').action = `/admin/pustaka/${id}`;
          document.getElementById('delete-nama').textContent = nama;
        });
      });
    </script>


  @endsection
