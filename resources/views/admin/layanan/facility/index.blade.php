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
        <h2><i class="fas fa-images"></i> Kelola Data Plagiat</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
          <i class="fas fa-plus"></i> Tambah Data Plagiat
        </button>
      </div>
      <div class="header-admin"></div>

      <div class="container mt-4">
        <h2>📄 Manajemen Permintaan Turnitin</h2>

        @if (session('success'))
          <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif

        <!-- Tombol Tambah -->
        <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#createModal">+ Tambah
          Permintaan</button>

        <!-- Tabel Data -->
        <table class="table table-bordered table-striped mt-3">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Judul Naskah</th>
              <th>Jenis</th>
              <th>Status</th>
              <th>File</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($data as $req)
              <tr>
                <td>{{ $req->nama }}</td>
                <td>{{ $req->judul_naskah }}</td>
                <td>{{ $req->jenis_dokumen }}</td>
                <td>
                  <span
                    class="badge bg-{{ $req->status == 'pending' ? 'warning' : ($req->status == 'selesai' ? 'success' : ($req->status == 'ditolak' ? 'danger' : 'info')) }}">
                    {{ ucfirst($req->status) }}
                  </span>
                </td>
                <td>
                  <a href="{{ asset('storage/' . $req->file) }}" target="_blank"
                    class="btn btn-sm btn-secondary">Lihat</a>
                </td>
                <td>
                  <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                    data-bs-target="#editModal{{ $req->id }}">Edit</button>
                  <form action="{{ route('admin.turnitin.destroy', $req->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                  </form>
                </td>
              </tr>

              <!-- Modal Edit -->
              <div class="modal fade" id="editModal{{ $req->id }}" tabindex="-1">
                <div class="modal-dialog">
                  <form action="{{ route('admin.turnitin.update', $req->id) }}" method="POST" class="modal-content">
                    @csrf @method('PUT')
                    <div class="modal-header">
                      <h5 class="modal-title">Edit Status Permintaan</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                      <select name="status" class="form-control">
                        <option value="pending" {{ $req->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="diproses" {{ $req->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="selesai" {{ $req->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="ditolak" {{ $req->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                      </select>
                      <input type="text" name="hasil_turnitin" value="{{ $req->hasil_turnitin }}"
                        class="form-control mt-2" placeholder="Hasil Turnitin">
                      <textarea name="catatan_admin" class="form-control mt-2" placeholder="Catatan Admin">{{ $req->catatan_admin }}</textarea>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <button class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            @empty
              <tr>
                <td colspan="6" class="text-center">Tidak ada data</td>
              </tr>
            @endforelse
          </tbody>
        </table>

        {{ $data->links() }}
      </div>

      <!-- Modal Create -->
      <div class="modal fade" id="createModal" tabindex="-1">
        <div class="modal-dialog">
          <form action="{{ route('admin.turnitin.store') }}" method="POST" enctype="multipart/form-data"
            class="modal-content">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title">Tambah Permintaan Turnitin</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <input type="text" name="nama" class="form-control mb-2" placeholder="Nama" required>
              <input type="text" name="nim_nidn" class="form-control mb-2" placeholder="NIM/NIDN" required>
              <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
              <input type="text" name="fakultas_prodi" class="form-control mb-2" placeholder="Fakultas/Prodi" required>
              <input type="text" name="judul_naskah" class="form-control mb-2" placeholder="Judul Naskah" required>
              <select name="jenis_dokumen" class="form-control mb-2" required>
                <option value="">-- Pilih Jenis Dokumen --</option>
                <option value="Skripsi">Skripsi</option>
                <option value="Tesis">Tesis</option>
                <option value="Artikel">Artikel</option>
                <option value="Lainnya">Lainnya</option>
              </select>
              <input type="file" name="file" class="form-control mb-2" required>
              <textarea name="catatan_pengguna" class="form-control" placeholder="Catatan Pengguna"></textarea>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    @endsection
