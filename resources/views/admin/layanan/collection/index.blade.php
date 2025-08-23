@extends('admin.layouts.app')

@section('title', 'Admin - Permintaan Referensi')
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
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Daftar Permintaan Referensi</h3>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
              <i class="fas fa-plus"></i> Tambah Permintaan
            </button>
          </div>

          <!-- Alert Container -->
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
            <table class="table table-hover align-middle mb-0" id="collectionsTable">
              <thead class="table-success text-center">
                <tr>
                  <th class="text-center">#</th>
                  <th>Judul</th>
                  <th>Penulis</th>
                  <th>Penerbit</th>
                  <th>Tahun Terbit</th>
                  <th>Kategori</th>
                  <th>Deskripsi</th>
                  <th>Cover</th>
                  <th>File</th>
                  <th>Link</th>
                  <th>Tanggal Masuk</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $key => $item)
                  <tr>
                    <td class="text-center fw-bold">{{ $key + 1 }}</td>
                    <td class="text-center">{{ $item->judul }}</td>
                    <td class="text-center">{{ $item->penulis ?? '-' }}</td>
                    <td class="text-center">{{ $item->penerbit ?? '-' }}</td>
                    <td class="text-center">{{ $item->tahun_terbit ?? '-' }}</td>
                    <td class="text-center">
                      <span class="badge bg-info">{{ $item->kategori }}</span>
                    </td>
                    <td class="text-center">{{ Str::limit($item->deskripsi, 50) }}</td>
                    <td class="text-center">
                      @if ($item->cover)
                        <img src="{{ asset('storage/' . $item->cover) }}" alt="cover" width="50" class="rounded">
                      @else
                        <span class="text-muted">-</span>
                      @endif
                    </td>
                    <td class="text-center">
                      @if ($item->file)
                        <a href="{{ asset('storage/' . $item->file) }}" target="_blank" class="btn btn-sm btn-primary">
                          <i class="fas fa-file-pdf"></i> Lihat
                        </a>
                      @else
                        <span class="text-muted">-</span>
                      @endif
                    </td>
                    <td class="text-center">
                      @if ($item->link)
                        <a href="{{ $item->link }}" target="_blank" class="btn btn-sm btn-success">
                          <i class="fas fa-external-link-alt"></i> Kunjungi
                        </a>
                      @else
                        <span class="text-muted">-</span>
                      @endif
                    </td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d-m-Y') }}</td>
                    <td class="text-center">
                      <!-- Tombol Edit -->
                      <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                        data-bs-target="#editModal{{ $item->id }}">
                        <i class="fas fa-edit"></i>
                      </button>

                      <!-- Tombol Hapus -->
                      <form action="{{ route('admin.referensi.destroy', $item->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                          onclick="return confirm('Yakin ingin menghapus koleksi ini?')">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>


      <!-- Modal Edit -->
      <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
        aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <form id="editForm{{ $item->id }}" action="{{ route('admin.referensi.update', $item->id) }}"
            method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Permintaan Referensi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control" name="nama" value="{{ $item->nama }}" required>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" value="{{ $item->email }}" required>
                </div>
                <div class="mb-3">
                  <label for="topik" class="form-label">Topik</label>
                  <input type="text" class="form-control" name="topik" value="{{ $item->topik }}" required>
                </div>
                <div class="mb-3">
                  <label for="pesan" class="form-label">Pesan</label>
                  <textarea class="form-control" name="pesan" rows="3" required>{{ $item->pesan }}</textarea>
                </div>
                <div class="mb-3">
                  <label for="status" class="form-label">Status</label>
                  <select name="status" class="form-control">
                    <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>Pending
                    </option>
                    <option value="diproses" {{ $item->status == 'diproses' ? 'selected' : '' }}>Diproses
                    </option>
                    <option value="selesai" {{ $item->status == 'selesai' ? 'selected' : '' }}>Selesai
                    </option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>


      <!-- Modal Create -->
      <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <form id="createForm" action="{{ route('admin.referensi.store') }}" method="POST">
            @csrf
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tambah Permintaan Referensi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control" name="nama" required>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" required>
                </div>
                <div class="mb-3">
                  <label for="topik" class="form-label">Topik</label>
                  <input type="text" class="form-control" name="topik" required>
                </div>
                <div class="mb-3">
                  <label for="pesan" class="form-label">Pesan</label>
                  <textarea class="form-control" name="pesan" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                  <label for="status" class="form-label">Status</label>
                  <select name="status" class="form-control">
                    <option value="pending">Pending</option>
                    <option value="diproses">Diproses</option>
                    <option value="selesai">Selesai</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    @endsection
