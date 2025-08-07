@extends('admin.layouts.app')

  @section('title', 'Admin - Berita')

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
        <h1 class="main-title mb-0">Admin - Menu Layanan</h1>
        <div>
          <a href="{{ route('Home') }}" class="btn btn-outline-secondary me-2">
            <i class="fas fa-eye"></i> Lihat Halaman Publik
          </a>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="fas fa-plus"></i> Tambah Menu
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="header-admin"></div>


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
                  <th>Gambar</th>
                  <th>Judul</th>
                  <th>Konten</th>
                  <th>Tanggal</th>
                  <th>Penulis</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($news as $index => $item)
                  <tr>
                    <td>{{ $news->firstItem() + $index }}</td>
                    <td>
                      <img src="{{ asset('lib/img/news/' . $item->img) }}" alt="Gambar" style="height: 60px;"
                        class="rounded">
                    </td>
                    <td><strong>{{ Str::limit($item->judul, 30) }}</strong></td>
                    <td>{{ Str::limit(strip_tags($item->konten), 40) }}</td>
                    <td>
                      <span class="badge bg-secondary">
                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                      </span>
                    </td>
                    <td>{{ $item->by }}</td>
                    <td>
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-sm btn-outline-info view-btn" data-id="{{ $item->id }}"
                          data-bs-toggle="modal" data-bs-target="#viewModal" title="Lihat Detail">
                          <i class="fas fa-eye"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-primary edit-btn"
                          data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#editModal"
                          title="Edit">
                          <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-danger delete-btn"
                          data-id="{{ $item->id }}" data-title="{{ $item->judul }}" data-bs-toggle="modal"
                          data-bs-target="#deleteModal" title="Hapus">
                          <i class="fas fa-trash"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="7" class="text-center text-muted py-4">
                      <i class="fas fa-newspaper fa-3x mb-3 text-muted"></i>
                      <p>Belum ada berita ditambahkan</p>
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          {{-- Pagination (jika pakai paginate()) --}}
          <div class="mt-3">
            {{ $news->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>

  @if ($news->hasPages())
    <div class="d-flex justify-content-center mt-4">
      {{ $news->appends(request()->query())->links() }}
    </div>
  @endif
  </div> <!-- Penutup .card-body -->
  </div> <!-- Penutup .card -->
  </div> <!-- Penutup .col -->
  </div> <!-- Penutup .row -->

  <!-- Create Modal -->
  <div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            <i class="fas fa-plus me-2"></i>Tambah Berita Baru
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form id="createForm" method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="row">
              <!-- Kolom kiri -->
              <div class="col-md-8">
                <div class="mb-3">
                  <label for="create_judul" class="form-label">Judul *</label>
                  <input type="text" class="form-control" id="create_judul" name="judul" required
                    placeholder="Masukkan judul berita">
                </div>

                <div class="mb-3">
                  <label for="create_konten" class="form-label">Konten *</label>
                  <textarea class="form-control" id="create_konten" name="konten" rows="6" required
                    placeholder="Tulis konten berita..."></textarea>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="create_tanggal" class="form-label">Tanggal *</label>
                    <input type="date" class="form-control" id="create_tanggal" name="tanggal" required>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="create_by" class="form-label">Penulis *</label>
                    <input type="text" class="form-control" id="create_by" name="by" required
                      placeholder="Nama penulis">
                  </div>
                </div>
              </div>

              <!-- Kolom kanan -->
              <div class="col-md-4">
                <div class="mb-3">
                  <label class="form-label">Upload Gambar *</label>
                  <div class="image-upload-area" id="createImageUpload"
                    onclick="document.getElementById('create_img').click()" style="cursor:pointer;">
                    <i class="fas fa-cloud-upload-alt fa-2x text-muted mb-2"></i>
                    <p class="text-muted mb-2">Klik atau drag & drop gambar di sini</p>
                    <small class="text-muted">Format: JPG, PNG, GIF (Max: 5MB)</small>
                    <input type="file" class="d-none" id="create_img" name="img" accept="image/*" required>
                  </div>
                  <div id="createImagePreview" class="mt-2" style="display: none;">
                    <img id="createPreviewImg" class="image-preview" alt="Preview"
                      style="max-width: 100%; height: auto;">
                    <button type="button" class="btn btn-sm btn-danger mt-2" id="removeCreateImage">
                      <i class="fas fa-trash"></i> Hapus
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">
              <i class="fas fa-save me-1"></i> Simpan
            </button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            <i class="fas fa-edit me-2"></i>Edit Berita
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form id="editForm" enctype="multipart/form-data" method="POST">
          @csrf
          @method('PUT')
          <input type="hidden" id="edit_news_id" name="id">
          <div class="modal-body">
            <div class="row">
              <!-- Kolom Kiri -->
              <div class="col-md-8">
                <div class="mb-3">
                  <label for="edit_judul" class="form-label">Judul *</label>
                  <input type="text" class="form-control" id="edit_judul" name="judul" required>
                </div>

                <div class="mb-3">
                  <label for="edit_konten" class="form-label">Konten *</label>
                  <textarea class="form-control" id="edit_konten" name="konten" rows="6" required></textarea>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="edit_tanggal" class="form-label">Tanggal *</label>
                    <input type="date" class="form-control" id="edit_tanggal" name="tanggal" required>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="edit_by" class="form-label">Penulis *</label>
                    <input type="text" class="form-control" id="edit_by" name="by" required>
                  </div>
                </div>
              </div>

              <!-- Kolom Kanan -->
              <div class="col-md-4">
                <div class="mb-3">
                  <label class="form-label">Gambar Berita</label>
                  <div class="image-upload-area" id="editImageUpload"
                    onclick="document.getElementById('edit_img').click()" style="cursor:pointer;">
                    <i class="fas fa-cloud-upload-alt fa-2x text-muted mb-2"></i>
                    <p class="text-muted mb-2">Klik atau drag & drop gambar di sini</p>
                    <small class="text-muted">Format: JPG, PNG, GIF (Max: 5MB)</small>
                    <input type="file" class="d-none" id="edit_img" name="img" accept="image/*">
                  </div>
                  <div id="editImagePreview" class="mt-2" style="display: none;">
                    <img id="editPreviewImg" class="image-preview" style="max-width: 100%; height: auto;"
                      alt="Preview">
                    <button type="button" class="btn btn-sm btn-danger mt-2" id="removeEditImage">
                      <i class="fas fa-trash"></i> Hapus
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              <i class="fas fa-times me-2"></i>Batal
            </button>
            <button type="submit" class="btn btn-primary">
              <i class="fas fa-save me-2"></i>Update
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Delete Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            <i class="fas fa-exclamation-triangle me-2"></i>Konfirmasi Hapus
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p>Apakah Anda yakin ingin menghapus berita <strong id="delete_news_title"></strong>?</p>
          <p class="text-muted small">
            <i class="fas fa-info-circle me-1"></i>
            Tindakan ini tidak dapat dibatalkan dan akan menghapus file gambar.
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="fas fa-times me-2"></i>Batal
          </button>
          <button type="button" class="btn btn-danger" id="confirmDelete">
            <i class="fas fa-trash me-2"></i>Hapus
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Loading Overlay -->
  <div class="loading-overlay" id="loadingOverlay">
    <div class="spinner-container">
      <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
      <p class="mt-2">Memproses...</p>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('createForm').addEventListener('submit', function(e) {
      e.preventDefault();
      showLoading(true);

      const formData = new FormData(this);

      fetch('{{ route('admin.news.store') }}', {
          method: 'POST',
          body: formData,
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          }
        })
        .then(response => response.json())
        .then(data => {
          showLoading(false);
          if (data.success) {
            showAlert('success', data.message);
            bootstrap.Modal.getInstance(document.getElementById('createModal')).hide();
            setTimeout(() => location.reload(), 1000);
          } else {
            showAlert('danger', data.message || 'Terjadi kesalahan saat menyimpan data');
          }
        })
        .catch(error => {
          showLoading(false);
          showAlert('danger', 'Terjadi kesalahan saat menyimpan data');
          console.error('Error:', error);
        });
    });

    document.getElementById('editForm').addEventListener('submit', function(e) {
      e.preventDefault();
      showLoading(true);

      const newsId = document.getElementById('edit_news_id').value;
      const formData = new FormData(this);

      fetch(`/admin/news/${newsId}`, {
          method: 'POST',
          body: formData,
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          }
        })
        .then(response => response.json())
        .then(data => {
          showLoading(false);
          if (data.success) {
            showAlert('success', data.message);
            bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
            setTimeout(() => location.reload(), 1000);
          } else {
            showAlert('danger', data.message || 'Terjadi kesalahan saat mengupdate data');
          }
        })
        .catch(error => {
          showLoading(false);
          showAlert('danger', 'Terjadi kesalahan saat mengupdate data');
          console.error('Error:', error);
        });
    });

    document.querySelectorAll('.edit-btn').forEach(button => {
      button.addEventListener('click', function() {
        const newsId = this.getAttribute('data-id');
        showLoading(true);

        fetch(`/admin/news/${newsId}/edit`)
          .then(response => response.json())
          .then(data => {
            showLoading(false);
            document.getElementById('edit_news_id').value = data.id;
            document.getElementById('edit_judul').value = data.judul;
            document.getElementById('edit_konten').value = data.konten;
            document.getElementById('edit_tanggal').value = data.tanggal;
            document.getElementById('edit_by').value = data.by;

            const editPreviewImg = document.getElementById('editPreviewImg');
            editPreviewImg.src = `/lib/img/news/${data.img}`;
            document.getElementById('editImagePreview').style.display = 'block';
            document.getElementById('editImageUpload').style.display = 'none';
          })
          .catch(error => {
            showLoading(false);
            showAlert('danger', 'Terjadi kesalahan saat memuat data');
          });
      });
    });


    document.getElementById('confirmDelete').addEventListener('click', function() {
      const newsId = this.getAttribute('data-id');
      showLoading(true);

      fetch(`/admin/news/${newsId}`, {
          method: 'DELETE',
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json'
          }
        })
        .then(response => response.json())
        .then(data => {
          showLoading(false);
          if (data.success) {
            showAlert('success', data.message);
            bootstrap.Modal.getInstance(document.getElementById('deleteModal')).hide();
            setTimeout(() => location.reload(), 1000);
          } else {
            showAlert('danger', data.message || 'Terjadi kesalahan saat menghapus data');
          }
        })
        .catch(error => {
          showLoading(false);
          showAlert('danger', 'Terjadi kesalahan saat menghapus data');
          console.error('Error:', error);
        });
    });
  </script>
@endsection
