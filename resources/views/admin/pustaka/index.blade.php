@extends('admin.layouts.app')

@section('title', 'Admin - Dokumen Eksternal')


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

  .document-preview {
    color: #2d5a4a;
    position: relative;
    padding-left: 15px;
  }

  .document-preview::before {
    content: "📄";
    position: absolute;
    left: 0;
    color: #2d5a4a;
    font-weight: bold;
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

  .link-preview {
    max-width: 200px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }

  .description-preview {
    max-width: 300px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }

  .category-badge {
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
  }

  .filter-section {
    background-color: #f8f9fa;
    border-radius: 8px;
    padding: 1rem;
    margin-bottom: 1rem;
  }
</style>


@section('content')
  <div class="row">
    <div class="col-12">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="main-title mb-0">Admin - Tambah Pengajuan</h1>
        <div>
          {{-- <a href="{{ route('admin.dok.eksternal.index') }}" class="btn btn-outline-secondary me-2">
            <i class="fas fa-eye"></i> Lihat Halaman Publik
          </a> --}}
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="fas fa-plus"></i> Tambah Pengajuan
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="header-admin"></div>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('admin.pustaka.index') }}">
        <i class="fas fa-link"></i> Admin Dokumen Bebas Pustaka
      </a>

    </div>
  </nav>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
          @endif

          @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
          @endif


          {{-- TABEL DATA --}}
          <div class="table-responsive shadow-sm rounded-4 border">
            <table class="table table-hover align-middle mb-0" id="documentsTable">
              <thead class="table-success text-center">
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>NIM</th>
                  <th>Fakultas</th>
                  <th>Prodi</th>
                  <th>Jenjang</th>
                  <th>Keperluan</th>
                  <th>Masuk</th>
                  <th>Lulus</th>
                  <th>Status</th>
                  <th>Berkas</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody class="text-center">
                @forelse($documents as $index => $item)
                  <tr>
                    <td class="fw-semibold text-muted">{{ $index + 1 }}</td>
                    <td class="text-start">{{ $item->nama }}</td>
                    <td>{{ $item->nim }}</td>
                    <td>{{ $item->faculty->nama_fakultas ?? '-' }}</td>
                    <td>{{ $item->major->nama_prodi ?? '-' }}</td>
                    <td>{{ $item->jenjang }}</td>
                    <td class="text-wrap" style="max-width: 120px">{{ $item->keperluan }}</td>
                    <td>{{ $item->tahun_masuk }}</td>
                    <td>{{ $item->tahun_lulus }}</td>
                    <td>
                      <span
                        class="badge rounded-pill
              @if ($item->status == 'pending') bg-warning text-dark
              @elseif($item->status == 'disetujui') bg-success
              @elseif($item->status == 'ditolak') bg-danger
              @else bg-secondary @endif">
                        {{ ucfirst($item->status) }}
                      </span>
                    </td>
                    <td class="text-nowrap">
                      <a href="{{ asset('storage/' . $item->file_karya_ilmiah) }}"
                        class="btn btn-sm btn-outline-primary mb-1" target="_blank">
                        <i class="fas fa-file-alt"></i> Ilmiah
                      </a>
                      <a href="{{ asset('storage/' . $item->scan_ktm) }}" class="btn btn-sm btn-outline-secondary mb-1"
                        target="_blank">
                        <i class="fas fa-id-card"></i> KTM
                      </a>
                      @if ($item->bukti_upload)
                        <a href="{{ asset('storage/' . $item->bukti_upload) }}"
                          class="btn btn-sm btn-outline-success mb-1" target="_blank">
                          <i class="fas fa-upload"></i> Upload
                        </a>
                      @endif
                    </td>
                    <td class="text-nowrap">
                      <a href="{{ route('admin.pustaka.show', $item->id) }}" class="btn btn-sm btn-outline-info">
                        <i class="fas fa-eye"></i>
                      </a>
                      <a href="{{ route('admin.pustaka.edit', $item->id) }}" class="btn btn-sm btn-outline-warning">
                        <i class="fas fa-edit"></i>
                      </a>
                      <form action="{{ route('admin.pustaka.destroy', $item->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="11" class="text-center text-muted py-4">
                      <i class="fas fa-folder-open me-2"></i>Belum ada data pengajuan.
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>

        </div>

        {{-- MODAL TAMBAH --}}
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <form action="{{ route('admin.pustaka.store') }}" method="POST" enctype="multipart/form-data"
              class="modal-content">
              @csrf
              <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Pengajuan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body row g-3">
                <div class="col-md-6">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label for="nim" class="form-label">NIM</label>
                  <input type="text" name="nim" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label for="faculty_id" class="form-label">Fakultas</label>
                  <select name="faculty_id" class="form-select" required>
                    <option value="">-- Pilih Fakultas --</option>
                    @foreach ($faculties as $faculty)
                      <option value="{{ $faculty->id }}">{{ $faculty->nama_fakultas }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="major_id" class="form-label">Program Studi</label>
                  <select name="major_id" class="form-select" required>
                    <option value="">-- Pilih Prodi --</option>
                    @foreach ($majors as $major)
                      <option value="{{ $major->id }}">{{ $major->nama_prodi }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="no_hp" class="form-label">No. HP</label>
                  <input type="text" name="no_hp" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label for="jenjang" class="form-label">Jenjang</label>
                  <select name="jenjang" class="form-select" required>
                    <option value="D3">D3</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="keperluan" class="form-label">Keperluan</label>
                  <input type="text" name="keperluan" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                  <input type="number" name="tahun_masuk" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                  <input type="number" name="tahun_lulus" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label for="file_karya_ilmiah" class="form-label">File Karya Ilmiah</label>
                  <input type="file" name="file_karya_ilmiah" class="form-control" accept=".pdf" required>
                </div>
                <div class="col-md-6">
                  <label for="scan_ktm" class="form-label">Scan KTM</label>
                  <input type="file" name="scan_ktm" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
                </div>
                <div class="col-md-6">
                  <label for="bukti_upload" class="form-label">Bukti Upload (Opsional)</label>
                  <input type="file" name="bukti_upload" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              </div>
            </form>
          </div>
        </div>
      @endsection
