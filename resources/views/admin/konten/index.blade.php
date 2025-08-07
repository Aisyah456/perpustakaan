@extends('admin.layouts.app')

@section('title', 'Kelola Organisasi')
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
  <div class="container mt-4">
    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2><i class="fas fa-images"></i> Kelola Organisasi</h2>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="fas fa-plus"></i> Tambah Data Organisasi
          </button>
        </div>
        <div class="header-admin"></div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container">
            <a class="navbar-brand" href="{{ route('admin.banners.index') }}">
              <i class="fas fa-images"></i> Admin Data Organisasi
            </a>
            {{-- <div class="navbar-nav ms-auto">
              <a class="nav-link" href="{{ route('home') }}" target="_blank">
                <i class="fas fa-external-link-alt"></i> Lihat Halaman Publik
              </a>
            </div> --}}
          </div>
        </nav>

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

        <div class="card">
          <div class="card-body">

            <div class="table-responsive">
              <div class="table-responsive">
                <table class="table table-striped table-hover">
                  <thead class="table-light">
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>NIP</th>
                      <th>Jabatan</th>
                      <th>Atasan</th>
                      <th>Foto</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($structures as $key => $item)
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->nip ?? '-' }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td>{{ $item->parent ? $item->parent->nama : '-' }}</td>
                        <td>
                          @if ($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto" width="60"
                              class="img-thumbnail">
                          @else
                            <span class="text-muted">Tidak ada</span>
                          @endif
                        </td>
                        <td>
                          <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#editModal{{ $item->id }}">Edit</button>
                          <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $item->id }}">Hapus</button>
                        </td>
                      </tr>

                      <!-- Modal Edit -->
                      <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1">
                        <div class="modal-dialog">
                          <form action="{{ route('structure.update', $item->id) }}" method="POST"
                            enctype="multipart/form-data" class="modal-content">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Struktur</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                              <div class="mb-2">
                                <label class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" value="{{ $item->nama }}"
                                  required>
                              </div>
                              <div class="mb-2">
                                <label class="form-label">NIP</label>
                                <input type="text" name="nip" class="form-control" value="{{ $item->nip }}">
                              </div>
                              <div class="mb-2">
                                <label class="form-label">Jabatan</label>
                                <input type="text" name="jabatan" class="form-control" value="{{ $item->jabatan }}"
                                  required>
                              </div>
                              <div class="mb-2">
                                <label class="form-label">Atasan</label>
                                <select name="parent_id" class="form-control">
                                  <option value="">- Tidak ada -</option>
                                  @foreach ($structures as $s)
                                    @if ($s->id != $item->id)
                                      <option value="{{ $s->id }}"
                                        {{ $item->parent_id == $s->id ? 'selected' : '' }}>
                                        {{ $s->nama }}</option>
                                    @endif
                                  @endforeach
                                </select>
                              </div>
                              <div class="mb-2">
                                <label class="form-label">Foto (opsional)</label>
                                <input type="file" name="foto" class="form-control">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-success">Simpan Perubahan</button>
                            </div>
                          </form>
                        </div>
                      </div>

                      <!-- Modal Hapus -->
                      <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1">
                        <div class="modal-dialog">
                          <form action="{{ route('structure.destroy', $item->id) }}" method="POST"
                            class="modal-content">
                            @csrf
                            @method('DELETE')
                            <div class="modal-header">
                              <h5 class="modal-title">Hapus Struktur</h5>
                            </div>
                            <div class="modal-body">
                              <p>Yakin ingin menghapus <strong>{{ $item->nama }}</strong>?</p>
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                              <button class="btn btn-danger">Hapus</button>
                            </div>
                          </form>
                        </div>
                      </div>

                    @empty
                      <tr>
                        <td colspan="7" class="text-center text-muted">Belum ada data</td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Modal Tambah -->
            <div class="modal fade" id="addModal" tabindex="-1">
              <div class="modal-dialog">
                <form action="{{ route('structure.store') }}" method="POST" enctype="multipart/form-data"
                  class="modal-content">
                  @csrf
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Struktur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-2">
                      <label class="form-label">Nama</label>
                      <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-2">
                      <label class="form-label">NIP</label>
                      <input type="text" name="nip" class="form-control">
                    </div>
                    <div class="mb-2">
                      <label class="form-label">Jabatan</label>
                      <input type="text" name="jabatan" class="form-control" required>
                    </div>
                    <div class="mb-2">
                      <label class="form-label">Atasan</label>
                      <select name="parent_id" class="form-control">
                        <option value="">- Tidak ada -</option>
                        @foreach ($structures as $item)
                          <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-2">
                      <label class="form-label">Foto (opsional)</label>
                      <input type="file" name="foto" class="form-control">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-success">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
          @endsection
