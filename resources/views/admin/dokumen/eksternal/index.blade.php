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
        <h1 class="main-title mb-0">Admin - Dokumen Eksternal</h1>
        <div>
          <a href="{{ route('Home') }}" class="btn btn-outline-secondary me-2">
            <i class="fas fa-eye"></i> Lihat Halaman Publik
          </a>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="fas fa-plus"></i> Tambah Dokumen
          </button>
        </div>
      </div>
    </div>
  </div>

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

          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="table-dark">
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Kategori</th>
                  <th>Deskripsi</th>
                  <th>Link</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($documents as $index => $doc)
                  <tr>
                    <td>{{ $documents->firstItem() + $index }}</td>
                    <td><strong>{{ Str::limit($doc->judul, 30) }}</strong></td>
                    <td>{{ $doc->kategori }}</td>
                    <td>{{ Str::limit($doc->deskripsi, 40) }}</td>
                    <td>
                      <a href="{{ $doc->link }}" target="_blank">{{ Str::limit($doc->link, 30) }}</a>
                    </td>
                    <td>
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-info view-btn" data-id="{{ $doc->id }}"
                          data-bs-toggle="modal" data-bs-target="#viewModal" title="Lihat Detail">
                          <i class="fas fa-eye"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-primary edit-btn"
                          data-id="{{ $doc->id }}" data-bs-toggle="modal" data-bs-target="#editModal"
                          title="Edit">
                          <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-danger delete-btn"
                          data-id="{{ $doc->id }}" data-title="{{ $doc->judul }}" data-bs-toggle="modal"
                          data-bs-target="#deleteModal" title="Hapus">
                          <i class="fas fa-trash"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="6" class="text-center text-muted py-4">
                      <i class="fas fa-folder-open fa-3x mb-3 text-muted"></i>
                      <p>Tidak ada dokumen eksternal</p>
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          @if ($documents->hasPages())
            <div class="d-flex justify-content-center mt-4">
              {{ $documents->appends(request()->query())->links() }}
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog">
      <form method="POST" action="{{ route('admin.external-documents.store') }}" class="modal-content">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah Dokumen Eksternal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3"><label>Judul</label><input type="text" name="judul" class="form-control" required>
          </div>
          <div class="mb-3"><label>Kategori</label><input type="text" name="kategori" class="form-control" required>
          </div>
          <div class="mb-3"><label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
          </div>
          <div class="mb-3"><label>Link URL</label><input type="url" name="link" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  <div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
      <form method="POST" id="editForm" class="modal-content">
        @csrf @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title">Edit Dokumen</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="edit-id">
          <div class="mb-3"><label>Judul</label><input type="text" name="judul" id="edit-judul"
              class="form-control" required></div>
          <div class="mb-3"><label>Kategori</label><input type="text" name="kategori" id="edit-kategori"
              class="form-control" required></div>
          <div class="mb-3"><label>Deskripsi</label>
            <textarea name="deskripsi" id="edit-deskripsi" class="form-control"></textarea>
          </div>
          <div class="mb-3"><label>Link URL</label><input type="url" name="link" id="edit-link"
              class="form-control" required></div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Perbarui</button>
        </div>
      </form>
    </div>
  </div>

  <div class="modal fade" id="viewModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail Dokumen</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p><strong>Judul:</strong> <span id="view-judul"></span></p>
          <p><strong>Kategori:</strong> <span id="view-kategori"></span></p>
          <p><strong>Deskripsi:</strong> <span id="view-deskripsi"></span></p>
          <p><strong>Link:</strong> <a id="view-link" href="#" target="_blank">Lihat Dokumen</a></p>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
      <form method="POST" id="deleteForm" class="modal-content">
        @csrf @method('DELETE')
        <div class="modal-header">
          <h5 class="modal-title">Hapus Dokumen</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p>Yakin ingin menghapus dokumen <strong id="delete-title"></strong>?</p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    document.querySelectorAll('.edit-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        const id = this.dataset.id;
        fetch(`/admin/external-documents/${id}`)
          .then(res => res.json())
          .then(data => {
            document.getElementById('editForm').action = `/admin/external-documents/${id}`;
            document.getElementById('edit-id').value = data.id;
            document.getElementById('edit-judul').value = data.judul;
            document.getElementById('edit-kategori').value = data.kategori;
            document.getElementById('edit-deskripsi').value = data.deskripsi;
            document.getElementById('edit-link').value = data.link;
          });
      });
    });

    document.querySelectorAll('.view-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        const id = this.dataset.id;
        fetch(`/admin/external-documents/${id}`)
          .then(res => res.json())
          .then(data => {
            document.getElementById('view-judul').textContent = data.judul;
            document.getElementById('view-kategori').textContent = data.kategori;
            document.getElementById('view-deskripsi').textContent = data.deskripsi;
            document.getElementById('view-link').href = data.link;
          });
      });
    });

    document.querySelectorAll('.delete-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        const id = this.dataset.id;
        const title = this.dataset.title;
        document.getElementById('deleteForm').action = `/admin/external-documents/${id}`;
        document.getElementById('delete-title').textContent = title;
      });
    });
  </script>
@endsection
