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

          <!-- Form Pencarian -->
          <form action="{{ route('admin.plagiat.index') }}" method="GET" class="mb-3">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Cari nama atau NIM..."
                value="{{ request('search') }}">
              <button class="btn btn-outline-success" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </form>

          <!-- Tabel -->
          <table class="table table-bordered table-striped mt-3">
            <thead>
              <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Fakultas</th>
                <th>Prodi</th>
                <th>Kategori Karya</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="text-center">
              @forelse($plagiats as $item)
                <tr>
                  <td class="text-start">{{ $item->nama }}</td>
                  <td>{{ $item->nim }}</td>
                  <td>{{ $item->faculty->nama_fakultas ?? '-' }}</td>
                  <td>{{ $item->major->nama_prodi ?? '-' }}</td>
                  <td>{{ $item->kat_karya }}</td>
                  <td class="text-nowrap">
                    <a href="{{ route('plagiats.show', $item->id) }}" class="btn btn-sm btn-outline-info">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('plagiats.edit', $item->id) }}" class="btn btn-sm btn-outline-warning">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('plagiats.destroy', $item->id) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Yakin ingin menghapus?')">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="6" class="text-center text-muted py-4">
                    <i class="fas fa-folder-open me-2"></i>Belum ada data plagiat.
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <!-- Pagination -->
        <div class="mt-3">
          {{ $plagiats->withQueryString()->links() }}
        </div>
      </div>

      <!-- Modal Add -->
      <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <form action="{{ route('admin.plagiat.store') }}" method="POST">
              @csrf
              <div class="modal-header">
                <h5 class="modal-title">Tambah Data Plagiat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body row g-3">
                <div class="col-md-6">
                  <label>NIM</label>
                  <input type="text" name="nim" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label>ID Fakultas</label>
                  <input type="text" name="id_fakultas" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label>ID Prodi</label>
                  <input type="text" name="id_prodi" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label>Kategori Karya</label>
                  <input type="text" name="kat_karya" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label>Kategori Mahasiswa</label>
                  <input type="text" name="kat_mhs" class="form-control" required>
                </div>
                <div class="col-md-12">
                  <label>Tujuan</label>
                  <input type="text" name="tujuan" class="form-control" required>
                </div>
                <div class="col-md-12">
                  <label>Judul Karya 1</label>
                  <input type="text" name="jdl_karya_1" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label>Nama Pembimbing 1</label>
                  <input type="text" name="nm_pembimbing1" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label>Email Pembimbing 1</label>
                  <input type="email" name="email_pembimbing1" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label>Nama Pembimbing 2</label>
                  <input type="text" name="nm_pembimbing2" class="form-control">
                </div>
                <div class="col-md-6">
                  <label>Email Pembimbing 2</label>
                  <input type="email" name="email_pembimbing2" class="form-control">
                </div>
                <div class="col-md-6">
                  <label>Upload 1</label>
                  <input type="text" name="upload1" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label>Judul Karya Ilmiah</label>
                  <input type="text" name="jdl_karya_ilmiah" class="form-control" required>
                </div>
                <div class="col-md-12">
                  <label>Upload 2</label>
                  <input type="text" name="upload2" class="form-control" required>
                </div>
              </div>
              <div class="modal-footer mt-4">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    @endsection
