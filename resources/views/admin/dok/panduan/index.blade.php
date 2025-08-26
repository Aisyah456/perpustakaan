@extends('admin.layouts.app')

@section('title', 'Admin - Panduan Perpustakaan')

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
        <h1 class="main-title mb-0">Admin - Panduan Perpustakaan</h1>
        <div>
          <a href="{{ route('panduan.index') }}" class="btn btn-outline-secondary me-2">
            <i class="fas fa-eye"></i> Lihat Halaman Publik
          </a>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="fas fa-plus"></i> Tambah Panduan
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
              <thead class="table-success ">
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Deskripsi</th>
                  <th>Link</th>
                  <th>Tanggal Dibuat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($panduans as $index => $panduan)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                      <div class="d-flex align-items-center">
                        <i class="fas fa-book-open text-primary me-2"></i>
                        <strong>{{ $panduan->judul }}</strong>
                      </div>
                    </td>
                    <td>
                      <div class="description-preview" title="{{ $panduan->deskripsi }}">
                        {{ $panduan->deskripsi }}
                      </div>
                    </td>
                    <td>
                      @if ($panduan->link)
                        <a href="{{ $panduan->link }}" target="_blank" class="text-decoration-none link-preview"
                          title="{{ $panduan->link }}">
                          <i class="fas fa-external-link-alt me-1"></i>
                          {{ Str::limit($panduan->link, 30) }}
                        </a>
                      @else
                        <span class="text-muted">-</span>
                      @endif
                    </td>
                    <td>
                      <small class="text-muted">
                        {{ $panduan->created_at->format('d M Y H:i') }}
                      </small>
                    </td>
                    <td>
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-sm btn-outline-info view-btn" data-id="{{ $panduan->id }}"
                          data-bs-toggle="modal" data-bs-target="#viewModal" title="Lihat Detail">
                          <i class="fas fa-eye"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-primary edit-btn"
                          data-id="{{ $panduan->id }}" data-bs-toggle="modal" data-bs-target="#editModal"
                          title="Edit">
                          <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-danger delete-btn"
                          data-id="{{ $panduan->id }}" data-judul="{{ $panduan->judul }}" data-bs-toggle="modal"
                          data-bs-target="#deleteModal" title="Hapus">
                          <i class="fas fa-trash"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="6" class="text-center text-muted py-4">
                      <i class="fas fa-book-open fa-3x mb-3 text-muted"></i>
                      <p>Belum ada data panduan perpustakaan</p>
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          @if ($panduans->hasPages())
            <div class="d-flex justify-content-center mt-4">
              {{ $panduans->appends(request()->query())->links() }}
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
        <form id="createForm">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label for="create_judul" class="form-label">Judul Panduan *</label>
              <input type="text" class="form-control" id="create_judul" name="judul" required
                placeholder="Contoh: Cara Mengakses E-Journal">
            </div>
            <div class="mb-3">
              <label for="create_deskripsi" class="form-label">Deskripsi *</label>
              <textarea class="form-control" id="create_deskripsi" name="deskripsi" rows="4" required
                placeholder="Jelaskan secara singkat tentang panduan ini..."></textarea>
            </div>
            <div class="mb-3">
              <label for="create_link" class="form-label">Link Panduan *</label>
              <input type="url" class="form-control" id="create_link" name="link" required
                placeholder="https://example.com/panduan">
              <div class="form-text">Masukkan URL lengkap panduan (PDF, video, atau halaman web)</div>
            </div>

            <!-- Preview Box -->
            <div class="preview-box" id="createPreview" style="display: none;">
              <h6 class="mb-2"><i class="fas fa-eye me-2"></i>Preview:</h6>
              <div class="guide-preview">
                <strong id="previewJudul"></strong><br>
                <small class="text-muted" id="previewDeskripsi"></small><br>
                <a href="#" id="previewLink" target="_blank" class="text-decoration-none">
                  <i class="fas fa-external-link-alt me-1"></i>Lihat Panduan
                </a>
              </div>
            </div>
          </div>
          <div class="modal-footer">

            <button type="submit" class="btn btn-primary">
              <i class="fas fa-save me-2"></i>Simpan
            </button>
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
            <div class="col-md-12">
              <h4 id="view_judul" class="text-primary mb-3"></h4>
              <div class="mb-3">
                <label class="form-label">Deskripsi:</label>
                <p id="view_deskripsi" class="text-muted"></p>
              </div>
              <div class="mb-3">
                <label class="form-label">Link:</label>
                <p>
                  <a href="#" id="view_link" target="_blank" class="text-decoration-none">
                    <i class="fas fa-external-link-alt me-2"></i>
                    <span id="view_link_text"></span>
                  </a>
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
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="fas fa-times me-2"></i>Tutup
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
        <form id="editForm">
          @csrf
          @method('PUT')
          <input type="hidden" id="edit_panduan_id">
          <div class="modal-body">
            <div class="mb-3">
              <label for="edit_judul" class="form-label">Judul Panduan *</label>
              <input type="text" class="form-control" id="edit_judul" name="judul" required>
            </div>
            <div class="mb-3">
              <label for="edit_deskripsi" class="form-label">Deskripsi *</label>
              <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="4" required></textarea>
            </div>
            <div class="mb-3">
              <label for="edit_link" class="form-label">Link Panduan *</label>
              <input type="url" class="form-control" id="edit_link" name="link" required>
              <div class="form-text">Masukkan URL lengkap panduan (PDF, video, atau halaman web)</div>
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
          <p>Apakah Anda yakin ingin menghapus panduan <strong id="delete_panduan_judul"></strong>?</p>
          <p class="text-muted small">
            <i class="fas fa-info-circle me-1"></i>
            Tindakan ini tidak dapat dibatalkan.
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Preview functionality for create form
      const createJudul = document.getElementById('create_judul');
      const createDeskripsi = document.getElementById('create_deskripsi');
      const createLink = document.getElementById('create_link');
      const createPreview = document.getElementById('createPreview');

      function updatePreview() {
        const judul = createJudul.value;
        const deskripsi = createDeskripsi.value;
        const link = createLink.value;

        if (judul || deskripsi || link) {
          document.getElementById('previewJudul').textContent = judul || 'Judul Panduan';
          document.getElementById('previewDeskripsi').textContent = deskripsi || 'Deskripsi panduan';
          document.getElementById('previewLink').href = link || '#';
          createPreview.style.display = 'block';
        } else {
          createPreview.style.display = 'none';
        }
      }

      createJudul.addEventListener('input', updatePreview);
      createDeskripsi.addEventListener('input', updatePreview);
      createLink.addEventListener('input', updatePreview);

      // Create Form Submit
      document.getElementById('createForm').addEventListener('submit', function(e) {
        e.preventDefault();
        showLoading(true);

        const formData = new FormData(this);

        fetch('{{ route('admin.panduan.store') }}', {
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

      // View Button Click
      document.querySelectorAll('.view-btn').forEach(button => {
        button.addEventListener('click', function() {
          const panduanId = this.getAttribute('data-id');
          showLoading(true);

          fetch(`{{ route('admin.panduan.index') }}/${panduanId}`)
            .then(response => response.json())
            .then(data => {
              showLoading(false);
              document.getElementById('view_judul').textContent = data.judul;
              document.getElementById('view_deskripsi').textContent = data.deskripsi;
              document.getElementById('view_link').href = data.link;
              document.getElementById('view_link_text').textContent = data.link;
              document.getElementById('view_created_at').textContent = new Date(data.created_at)
                .toLocaleString('id-ID');
              document.getElementById('view_updated_at').textContent = new Date(data.updated_at)
                .toLocaleString('id-ID');
            })
            .catch(error => {
              showLoading(false);
              showAlert('danger', 'Terjadi kesalahan saat memuat data');
            });
        });
      });

      // Edit Button Click
      document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
          const panduanId = this.getAttribute('data-id');
          showLoading(true);

          fetch(`{{ route('admin.panduan.index') }}/${panduanId}/edit`)
            .then(response => response.json())
            .then(data => {
              showLoading(false);
              document.getElementById('edit_panduan_id').value = data.id;
              document.getElementById('edit_judul').value = data.judul;
              document.getElementById('edit_deskripsi').value = data.deskripsi;
              document.getElementById('edit_link').value = data.link;
            })
            .catch(error => {
              showLoading(false);
              showAlert('danger', 'Terjadi kesalahan saat memuat data');
            });
        });
      });

      // Edit Form Submit
      document.getElementById('editForm').addEventListener('submit', function(e) {
        e.preventDefault();
        showLoading(true);

        const panduanId = document.getElementById('edit_panduan_id').value;
        const formData = new FormData(this);

        fetch(`{{ route('admin.panduan.index') }}/${panduanId}`, {
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

      // Delete Button Click
      document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
          const panduanId = this.getAttribute('data-id');
          const panduanJudul = this.getAttribute('data-judul');

          document.getElementById('delete_panduan_judul').textContent = panduanJudul;
          document.getElementById('confirmDelete').setAttribute('data-id', panduanId);
        });
      });

      // Confirm Delete
      document.getElementById('confirmDelete').addEventListener('click', function() {
        const panduanId = this.getAttribute('data-id');
        showLoading(true);

        fetch(`{{ route('admin.panduan.index') }}/${panduanId}`, {
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

      // Utility Functions
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
        document.getElementById('createPreview').style.display = 'none';
      });

      document.getElementById('editModal').addEventListener('hidden.bs.modal', function() {
        document.getElementById('editForm').reset();
      });
    });
  </script>
@endsection
