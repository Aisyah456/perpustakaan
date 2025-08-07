@extends('admin.layouts.app')

@section('title', 'Admin - Panduan')

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
        <h1 class="main-title mb-0">Admin - Panduan</h1>
        <div>
          {{-- <a href="{{ route('/panduan') }}" class="btn btn-outline-secondary me-2">
            <i class="fas fa-eye"></i> Lihat Halaman Publik
          </a> --}}
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="fas fa-plus"></i> Tambah Menu
          </button>
        </div>
      </div>
    </div>
  </div>

  {{-- <div class="header-admin"></div> --}}

  {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('admin.banners.index') }}">
        <i class="fas fa-images"></i> Admin Menu Layanan
      </a>
      <div class="navbar-nav ms-auto">
        <a class="nav-link" href="{{ route('Home') }}" target="_blank">
          <i class="fas fa-external-link-alt"></i> Lihat Halaman Publik
        </a>
      </div>
    </div>
  </nav> --}}

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
                  <th>Deskripsi</th>
                  <th>File</th>
                  <th>Kategori</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($guides as $index => $guide)
                  <tr>
                    <td>{{ $guides->firstItem() + $index }}</td>
                    <td><strong>{{ Str::limit($guide->title, 40) }}</strong></td>
                    <td>{{ Str::limit($guide->description, 50) }}</td>
                    <td>
                      @if ($guide->file_path)
                        <a href="{{ asset('storage/' . $guide->file_path) }}" target="_blank">Lihat File</a>
                      @else
                        <span class="text-muted">-</span>
                      @endif
                    </td>
                    <td>{{ $guide->category ?? '-' }}</td>
                    <td>
                      @if ($guide->is_active)
                        <span class="badge bg-success">Aktif</span>
                      @else
                        <span class="badge bg-secondary">Nonaktif</span>
                      @endif
                    </td>
                    <td>
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-sm btn-outline-info view-btn" data-id="{{ $guide->id }}"
                          data-bs-toggle="modal" data-bs-target="#viewModal" title="Lihat Detail">
                          <i class="fas fa-eye"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-primary edit-btn"
                          data-id="{{ $guide->id }}" data-bs-toggle="modal" data-bs-target="#editModal" title="Edit">
                          <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-danger delete-btn"
                          data-id="{{ $guide->id }}" data-title="{{ $guide->title }}" data-bs-toggle="modal"
                          data-bs-target="#deleteModal" title="Hapus">
                          <i class="fas fa-trash"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="7" class="text-center text-muted py-4">
                      <i class="fas fa-book-open fa-3x mb-3 text-muted"></i>
                      <p>Belum ada data panduan</p>
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
          @if ($guides->hasPages())
            <div class="d-flex justify-content-center mt-4">
              {{ $guides->appends(request()->query())->links() }}
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>


  <!-- Create Modal -->
  <div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            <i class="fas fa-plus me-2"></i>Tambah Panduan Baru
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form id="createForm" enctype="multipart/form-data" method="POST">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-md-8">
                <div class="mb-3">
                  <label for="create_title" class="form-label">Judul *</label>
                  <input type="text" class="form-control" id="create_title" name="title" required
                    placeholder="Masukkan judul panduan">
                </div>
                <div class="mb-3">
                  <label for="create_description" class="form-label">Deskripsi</label>
                  <textarea class="form-control" id="create_description" name="description" rows="3"
                    placeholder="Masukkan deskripsi singkat"></textarea>
                </div>
                <div class="mb-3">
                  <label for="create_category" class="form-label">Kategori *</label>
                  <select class="form-select" id="create_category" name="category" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Umum">Umum</option>
                    <option value="Sirkulasi">Sirkulasi</option>
                    <option value="Referensi">Referensi</option>
                    <option value="Layanan">Layanan</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="create_is_active" class="form-label">Status</label>
                  <select class="form-select" id="create_is_active" name="is_active">
                    <option value="1" selected>Aktif</option>
                    <option value="0">Nonaktif</option>
                  </select>
                </div>
              </div>

              <div class="col-md-4">
                <div class="mb-3">
                  <label for="create_file_path" class="form-label">Upload File Panduan *</label>
                  <input type="file" class="form-control" id="create_file_path" name="file_path"
                    accept=".pdf,.doc,.docx" required>
                  <small class="text-muted">Format: PDF, DOC, DOCX. Maks: 5MB</small>
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

  <!-- View Modal -->
  <div class="modal fade" id="viewModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            <i class="fas fa-eye me-2"></i>Detail Panduan
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-8">
              <h4 id="view_title" class="text-primary mb-2"></h4>

              <div class="mb-2">
                <span class="badge bg-secondary" id="view_category"></span>
                <span class="badge ms-1" id="view_status_badge"></span>
              </div>

              <div class="mb-3">
                <label class="form-label">Deskripsi:</label>
                <p id="view_description" class="text-muted"></p>
              </div>

              <div class="mb-3">
                <label class="form-label">File Panduan:</label>
                <p>
                  <a href="#" id="view_file_path" target="_blank" class="text-decoration-underline">Lihat
                    File</a>
                </p>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <label class="form-label">Dibuat:</label>
                  <p class="text-muted" id="view_created_at"></p>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Diupdate:</label>
                  <p class="text-muted" id="view_updated_at"></p>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="border-start ps-3">
                <h6 class="text-muted">Informasi Tambahan</h6>
                <p><strong>ID:</strong> <span id="view_id"></span></p>
                <!-- Bisa ditambahkan info tambahan lain jika dibutuhkan -->
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="fas fa-times me-2"></i>Tutup
          </button>
          <button type="button" class="btn btn-primary" id="editFromView">
            <i class="fas fa-edit me-2"></i>Edit Panduan
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            <i class="fas fa-edit me-2"></i>Edit Panduan
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <form id="editForm" enctype="multipart/form-data" method="POST">
          @csrf
          @method('PUT')
          <input type="hidden" id="edit_guide_id" name="id">

          <div class="modal-body">
            <div class="row">
              <div class="col-md-8">
                <div class="mb-3">
                  <label for="edit_title" class="form-label">Judul *</label>
                  <input type="text" class="form-control" id="edit_title" name="title" required>
                </div>

                <div class="mb-3">
                  <label for="edit_description" class="form-label">Deskripsi</label>
                  <textarea class="form-control" id="edit_description" name="description" rows="3"></textarea>
                </div>

                <div class="mb-3">
                  <label for="edit_category" class="form-label">Kategori *</label>
                  <select class="form-select" id="edit_category" name="category" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Umum">Umum</option>
                    <option value="Sirkulasi">Sirkulasi</option>
                    <option value="Referensi">Referensi</option>
                    <option value="Layanan">Layanan</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="edit_is_active" class="form-label">Status</label>
                  <select class="form-select" id="edit_is_active" name="is_active">
                    <option value="1">Aktif</option>
                    <option value="0">Nonaktif</option>
                  </select>
                </div>
              </div>

              <div class="col-md-4">
                <div class="mb-3">
                  <label class="form-label">Ganti File Panduan (Opsional)</label>
                  <input type="file" class="form-control" id="edit_file_path" name="file_path"
                    accept=".pdf,.doc,.docx">
                  <small class="text-muted">Biarkan kosong jika tidak ingin mengubah file</small>

                  <div id="editFilePreview" class="mt-2">
                    <a id="edit_file_link" href="#" target="_blank" class="text-decoration-underline">Lihat
                      File
                      Saat Ini</a>
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
          <p>Apakah Anda yakin ingin menghapus panduan <strong id="delete_guide_title"></strong>?</p>
          <p class="text-muted small">
            <i class="fas fa-info-circle me-1"></i>
            Tindakan ini tidak dapat dibatalkan dan akan menghapus file panduan terkait dari sistem.
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
  <div class="loading-overlay" id="loadingOverlay" style="display: none;">
    <div class="spinner-container text-center">
      <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
      <p class="mt-2">Memproses...</p>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      setupFileUpload('create_file_path', 'createFileName');
      setupFileUpload('edit_file_path', 'editFileName');

      function setupFileUpload(inputId, fileNameId) {
        const input = document.getElementById(inputId);
        const fileNameDisplay = document.getElementById(fileNameId);

        if (input) {
          input.addEventListener('change', function() {
            const file = this.files[0];
            if (file && fileNameDisplay) {
              fileNameDisplay.textContent = "File terpilih: " + file.name;
              fileNameDisplay.classList.remove('d-none');
            }
          });
        }
      }
    }); < script
      /
      >

      // Setup image uploads
      <
      script >
      document.addEventListener('DOMContentLoaded', function() {
        // Create form submit handler
        document.getElementById('createForm').addEventListener('submit', function(e) {
          e.preventDefault();
          showLoading(true);

          const formData = new FormData(this);

          fetch('{{ route('admin.guides.store') }}', {
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

        // Optional: tampilkan nama file yang dipilih
        const fileInput = document.getElementById('create_file_path');
        const fileLabel = document.getElementById('createFileName');

        if (fileInput && fileLabel) {
          fileInput.addEventListener('change', function() {
            const file = this.files[0];
            fileLabel.textContent = file ? "File dipilih: " + file.name : "";
            fileLabel.classList.remove('d-none');
          });
        }
      }); <
    />


    // View Button Click
    document.querySelectorAll('.view-btn').forEach(button => {
      button.addEventListener('click', function() {
        const guideId = this.getAttribute('data-id');
        showLoading(true);

        fetch(`{{ url('admin/guides') }}/${guideId}`)
          .then(response => response.json())
          .then(data => {
            showLoading(false);
            document.getElementById('view_title').textContent = data.title;
            document.getElementById('view_description').textContent = data.description || '-';
            document.getElementById('view_category').textContent = data.category || '-';

            const statusBadge = document.getElementById('view_status_badge');
            statusBadge.textContent = data.is_active ? 'Aktif' : 'Tidak Aktif';
            statusBadge.className = `badge ${data.is_active ? 'bg-success' : 'bg-secondary'}`;

            // File preview
            const fileLink = document.getElementById('view_file_path');
            if (data.file_path) {
              fileLink.href = `{{ asset('storage/guides') }}/${data.file_path}`;
              fileLink.textContent = 'Lihat File';
              fileLink.style.display = 'inline';
            } else {
              fileLink.textContent = 'Tidak ada file';
              fileLink.removeAttribute('href');
              fileLink.style.display = 'inline';
            }

            document.getElementById('view_created_at').textContent = new Date(data.created_at).toLocaleString(
              'id-ID');
            document.getElementById('view_updated_at').textContent = new Date(data.updated_at).toLocaleString(
              'id-ID');
          })
          .catch(error => {
            showLoading(false);
            showAlert('danger', 'Terjadi kesalahan saat memuat data');
            console.error(error);
          });
      });
    });

    // Edit Button Click
    document.querySelectorAll('.edit-btn').forEach(button => {
      button.addEventListener('click', function() {
        const guideId = this.getAttribute('data-id');
        showLoading(true);

        fetch(`{{ url('admin/guides') }}/${guideId}/edit`)
          .then(response => response.json())
          .then(data => {
            showLoading(false);
            document.getElementById('edit_guide_id').value = data.id;
            document.getElementById('edit_title').value = data.title;
            document.getElementById('edit_description').value = data.description || '';
            document.getElementById('edit_category').value = data.category || '';
            document.getElementById('edit_is_active').value = data.is_active ? '1' : '0';

            // File name display
            const fileLabel = document.getElementById('editFileName');
            if (data.file_path) {
              fileLabel.textContent = "File saat ini: " + data.file_path;
              fileLabel.classList.remove('d-none');
            } else {
              fileLabel.textContent = "Belum ada file";
              fileLabel.classList.remove('d-none');
            }
          })
          .catch(error => {
            showLoading(false);
            showAlert('danger', 'Terjadi kesalahan saat memuat data');
            console.error(error);
          });
      });
    });

    // Edit Form Submit
    document.getElementById('editForm').addEventListener('submit', function(e) {
      e.preventDefault();
      showLoading(true);

      const guideId = document.getElementById('edit_guide_id').value;
      const formData = new FormData(this);
      formData.append('_method', 'PUT');

      fetch(`{{ url('admin/guides') }}/${guideId}`, {
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
          console.error(error);
        });
    });


    // Toggle Status Button Click
    document.querySelectorAll('.toggle-status-btn').forEach(button => {
      button.addEventListener('click', function() {
        const guideId = this.getAttribute('data-id');
        showLoading(true);

        fetch(`{{ url('admin/guides') }}/${guideId}/toggle-status`, {
            method: 'POST',
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
              setTimeout(() => location.reload(), 1000);
            } else {
              showAlert('danger', data.message || 'Terjadi kesalahan saat mengubah status');
            }
          })
          .catch(error => {
            showLoading(false);
            showAlert('danger', 'Terjadi kesalahan saat mengubah status');
            console.error('Error:', error);
          });
      });
    });

    // Delete Button Click
    document.querySelectorAll('.delete-btn').forEach(button => {
      button.addEventListener('click', function() {
        const guideId = this.getAttribute('data-id');
        const guideTitle = this.getAttribute('data-title');

        document.getElementById('delete_banner_title').textContent = guideTitle;
        document.getElementById('confirmDelete').setAttribute('data-id', guideId);
      });
    });

    // Confirm Delete
    document.getElementById('confirmDelete').addEventListener('click', function() {
      const guideId = this.getAttribute('data-id');
      showLoading(true);

      fetch(`{{ url('admin/guides') }}/${guideId}`, {
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


    // Edit from View Modal
    document.getElementById('editFromView').addEventListener('click', function() {
      bootstrap.Modal.getInstance(document.getElementById('viewModal')).hide();

      // Dapatkan judul dari modal view
      const viewTitle = document.getElementById('view_title').textContent;
      const editBtn = Array.from(document.querySelectorAll('.edit-btn')).find(btn => {
        const row = btn.closest('tr');
        return row.querySelector('strong').textContent.includes(viewTitle);
      });

      if (editBtn) {
        editBtn.click();
      }
    });


    function showAlert(type, message) {
      const alertDiv = document.createElement('div');
      alertDiv.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
      alertDiv.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
      alertDiv.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} me-2"></i>
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
      document.body.appendChild(alertDiv);

      setTimeout(() => {
        alertDiv.remove();
      }, 5000);
    }

    function showLoading(show) {
      const overlay = document.getElementById('loadingOverlay');
      if (show) {
        overlay.classList.add('show');
      } else {
        overlay.classList.remove('show');
      }
    }

    // Reset forms when modals are hidden
    document.getElementById('createModal').addEventListener('hidden.bs.modal', function() {
      document.getElementById('createForm').reset();

      // Reset preview dan upload PDF
      document.getElementById('createFilePreview').style.display = 'none';
      document.getElementById('createFileUpload').style.display = 'block';
    });

    document.getElementById('editModal').addEventListener('hidden.bs.modal', function() {
      document.getElementById('editForm').reset();

      // Reset preview dan upload file
      document.getElementById('editFilePreview').style.display = 'none';
      document.getElementById('editFileUpload').style.display = 'block';
    }); <
    />
  @endsection
