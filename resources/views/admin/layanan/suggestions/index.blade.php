@extends('admin.layouts.app')

@section('title', 'Admin - Dokumen Internal')

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
    color: #2d5a4a;
    position: relative;
    padding-left: 15px;
  }

  .banner-preview::before {
    content: "🖼️";
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

  .banner-thumbnail {
    width: 80px;
    height: 50px;
    object-fit: cover;
    border-radius: 4px;
    border: 2px solid #dee2e6;
  }

  .image-preview {
    max-width: 100%;
    max-height: 200px;
    object-fit: cover;
    border-radius: 8px;
    border: 2px solid #dee2e6;
  }

  .image-upload-area {
    border: 2px dashed #dee2e6;
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    cursor: pointer;
    transition: border-color 0.3s;
  }

  .image-upload-area:hover {
    border-color: #2d5a4a;
  }

  .image-upload-area.dragover {
    border-color: #f4b942;
    background-color: #fefefe;
  }

  .subtitle-preview {
    max-width: 250px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }

  .status-badge {
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
        <h1 class="main-title mb-0">Admin - Usulan Buku</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
          <i class="fas fa-plus"></i> Tambah Usulan
        </button>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card shadow-lg border-0 rounded-3">
        <div class="card-body">
          @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}</div>
          @endif

          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="documentsTable">
              <thead class="table-success text-center">
                <tr>
                  <th>No</th>
                  <th>Nama Pengusul</th>
                  <th>Status</th>
                  <th>Judul Buku</th>
                  <th>Pengarang</th>
                  <th>Penerbit</th>
                  <th>Verifikasi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($usulans as $index => $item)
                  <tr>
                    <td>{{ $usulans->firstItem() + $index }}</td>
                    <td>{{ $item->nama_pengusul }}</td>
                    <td><span class="badge bg-info">{{ $item->status }}</span></td>
                    <td>{{ $item->judul_buku }}</td>
                    <td>{{ $item->pengarang }}</td>
                    <td>{{ $item->penerbit }}</td>
                    <td>
                      @if ($item->verifikasi == 'pending')
                        <span class="badge bg-warning">Pending</span>
                      @elseif($item->verifikasi == 'diterima')
                        <span class="badge bg-success">Diterima</span>
                      @else
                        <span class="badge bg-danger">Ditolak</span>
                      @endif
                    </td>
                    <td>
                      <div class="btn-group">
                        <button class="btn btn-sm btn-outline-info view-btn" data-id="{{ $item->id }}"
                          data-bs-toggle="modal" data-bs-target="#viewModal"><i class="fas fa-eye"></i></button>
                        <button class="btn btn-sm btn-outline-primary edit-btn" data-id="{{ $item->id }}"
                          data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-outline-danger delete-btn" data-id="{{ $item->id }}"
                          data-nama="{{ $item->judul_buku }}" data-bs-toggle="modal" data-bs-target="#deleteModal"><i
                            class="fas fa-trash"></i></button>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="8" class="text-center text-muted py-4">Tidak ada usulan buku</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          @if ($usulans->hasPages())
            <div class="d-flex justify-content-center mt-4">
              {{ $usulans->appends(request()->query())->links() }}
            </div>
          @endif

        </div>
      </div>
    </div>
  </div>

  {{-- Modal Tambah --}}
  <div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog">
      <form method="POST" action="{{ route('admin.usulan-buku.store') }}" class="modal-content">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah Usulan Buku</h5>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
          </div>
          <div class="mb-3">
            <label>File</label>
            <input type="file" name="file" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori" class="form-control" required>
              <option value="internal">Internal</option>
              <option value="eksternal">Eksternal</option>
            </select>
          </div>
          <div class="mb-3">
            <label>Tanggal Upload</label>
            <input type="date" name="tanggal_upload" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Uploaded By</label>
            <input type="text" name="uploaded_by" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  {{-- Modal Edit --}}
  <div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
      <form method="POST" id="editForm" class="modal-content">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title">Edit Usulan Buku</h5>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $item->judul }}" required>
          </div>
          <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $item->deskripsi }}</textarea>
          </div>
          <div class="mb-3">
            <label>File (kosongkan jika tidak diubah)</label>
            <input type="file" name="file" class="form-control">
            <small>File saat ini: <a href="{{ asset('storage/' . $item->file) }}" target="_blank">Lihat</a></small>
          </div>
          <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori" class="form-control" required>
              <option value="internal" {{ $item->kategori == 'internal' ? 'selected' : '' }}>Internal</option>
              <option value="eksternal" {{ $item->kategori == 'eksternal' ? 'selected' : '' }}>Eksternal</option>
            </select>
          </div>
          <div class="mb-3">
            <label>Tanggal Upload</label>
            <input type="date" name="tanggal_upload" class="form-control" value="{{ $item->tanggal_upload }}"
              required>
          </div>
          <div class="mb-3">
            <label>Uploaded By</label>
            <input type="text" name="uploaded_by" class="form-control" value="{{ $item->uploaded_by }}" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Perbarui</button>
        </div>
      </form>
    </div>
  </div>

  {{-- Modal View --}}
  <div class="modal fade" id="viewModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail Usulan Buku</h5>
        </div>
        <div class="modal-body">
          <p><strong>Nama:</strong> <span id="view-nama"></span></p>
          <p><strong>Status:</strong> <span id="view-status"></span></p>
          <p><strong>Judul:</strong> <span id="view-judul"></span></p>
          <p><strong>Pengarang:</strong> <span id="view-pengarang"></span></p>
          <p><strong>Penerbit:</strong> <span id="view-penerbit"></span></p>
          <p><strong>Alasan:</strong> <span id="view-alasan"></span></p>
          <p><strong>Verifikasi:</strong> <span id="view-verifikasi"></span></p>
        </div>
      </div>
    </div>
  </div>

  {{-- Modal Delete --}}
  <div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
      <form method="POST" id="deleteForm" class="modal-content">
        @csrf
        @method('DELETE')
        <div class="modal-header">
          <h5 class="modal-title">Hapus Usulan</h5>
        </div>
        <div class="modal-body">
          Yakin ingin menghapus usulan buku <strong id="delete-title"></strong>?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
      </form>
    </div>
  </div>

@endsection

@push('scripts')
  <script>
    // Edit
    document.querySelectorAll('.edit-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        const id = this.dataset.id;
        fetch(`/admin/usulan-buku/${id}`)
          .then(res => res.json())
          .then(data => {
            document.getElementById('editForm').action = `/admin/usulan-buku/${id}`;
            document.getElementById('edit-id').value = data.id;
            document.getElementById('edit-nama').value = data.nama_pengusul;
            document.getElementById('edit-status').value = data.status;
            document.getElementById('edit-judul').value = data.judul_buku;
            document.getElementById('edit-pengarang').value = data.pengarang;
            document.getElementById('edit-penerbit').value = data.penerbit;
            document.getElementById('edit-alasan').value = data.alasan ?? '';
            document.getElementById('edit-verifikasi').value = data.verifikasi ?? 'pending';
          });
      });
    });

    // View
    document.querySelectorAll('.view-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        const id = this.dataset.id;
        fetch(`/admin/usulan-buku/${id}`)
          .then(res => res.json())
          .then(data => {
            document.getElementById('view-nama').textContent = data.nama_pengusul;
            document.getElementById('view-status').textContent = data.status;
            document.getElementById('view-judul').textContent = data.judul_buku;
            document.getElementById('view-pengarang').textContent = data.pengarang;
            document.getElementById('view-penerbit').textContent = data.penerbit;
            document.getElementById('view-alasan').textContent = data.alasan ?? '-';
            document.getElementById('view-verifikasi').textContent = data.verifikasi ?? 'pending';
          });
      });
    });

    // Delete
    document.querySelectorAll('.delete-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        const id = this.dataset.id;
        const nama = this.dataset.nama;
        document.getElementById('deleteForm').action = `/admin/usulan-buku/${id}`;
        document.getElementById('delete-title').textContent = nama;
      });
    });
  </script>
@endpush
