@extends('admin.layouts.app')

@section('title', 'List Artikel')
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

  .resource-preview {
    color: #2d5a4a;
    position: relative;
    padding-left: 15px;
  }

  .resource-preview::before {
    content: "•";
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
</style>

@section('content')
  <div class="container mt-4">
    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2><i class="fas fa-list"></i> Kelola E-Resources Internal</h2>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="fas fa-plus"></i> Tambah E-Resource
          </button>
        </div>
        <div class="header-admin"></div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container">
            <a class="navbar-brand" href="{{ route('eresources.admin.index') }}">
              <i class="fas fa-book"></i> Admin E-Resources UMHT
            </a>
            <div class="navbar-nav ms-auto">
              <a class="nav-link" href="{{ route('eresources.index') }}" target="_blank">
                <i class="fas fa-external-link-alt"></i> Lihat Halaman Publik
              </a>
            </div>
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
            @if ($resources->count() > 0)
              <div class="table-responsive">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th width="5%">#</th>
                      <th width="30%">Nama E-Resource</th>
                      <th width="40%">URL</th>
                      <th width="15%">Tanggal Dibuat</th>
                      <th width="10%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($resources as $index => $resource)
                      <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                          <strong>{{ $resource->nama }}</strong>
                        </td>
                        <td>
                          @if ($resource->url)
                            <a href="{{ $resource->url }}" target="_blank" class="text-decoration-none">
                              {{ Str::limit($resource->url, 50) }}
                              <i class="fas fa-external-link-alt ms-1"></i>
                            </a>
                          @else
                            <span class="text-muted">
                              <i class="fas fa-minus"></i> Tidak ada URL
                            </span>
                          @endif
                        </td>
                        <td>
                          <small class="text-muted">
                            {{ $resource->created_at->format('d/m/Y H:i') }}
                          </small>
                        </td>
                        <td>
                          <div class="btn-group" role="group">
                            <button type="button" class="btn btn-sm btn-warning edit-btn" data-id="{{ $resource->id }}"
                              data-nama="{{ $resource->nama }}" data-url="{{ $resource->url }}"
                              data-created="{{ $resource->created_at->format('d/m/Y H:i:s') }}"
                              data-updated="{{ $resource->updated_at->format('d/m/Y H:i:s') }}" title="Edit">
                              <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="{{ $resource->id }}"
                              data-nama="{{ $resource->nama }}" title="Hapus">
                              <i class="fas fa-trash"></i>
                            </button>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @else
              <div class="text-center py-5">
                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">Belum ada data e-resources</h5>
                <p class="text-muted">Klik tombol "Tambah E-Resource" untuk menambah data pertama.</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                  <i class="fas fa-plus"></i> Tambah E-Resource
                </button>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Create Modal -->
  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModalLabel">
            <i class="fas fa-plus"></i> Tambah E-Resource Baru
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="createForm" action="{{ route('eresources.admin.store') }}" method="POST">
            @csrf

            <div class="mb-3">
              <label for="create_nama" class="form-label">
                <i class="fas fa-tag"></i> Nama E-Resource <span class="text-danger">*</span>
              </label>
              <input type="text" class="form-control" id="create_nama" name="nama"
                placeholder="Contoh: Katalog Online, MyPustaka, dll" required>
              <div class="invalid-feedback" id="create_nama_error"></div>
              <div class="form-text">
                Masukkan nama e-resource yang akan ditampilkan di halaman publik.
              </div>
            </div>

            <div class="mb-3">
              <label for="create_url" class="form-label">
                <i class="fas fa-link"></i> URL/Link
              </label>
              <input type="url" class="form-control" id="create_url" name="url"
                placeholder="https://example.com">
              <div class="invalid-feedback" id="create_url_error"></div>
              <div class="form-text">
                URL tujuan ketika e-resource diklik. Kosongkan jika tidak ada link.
              </div>
            </div>

            <!-- Preview -->
            <div class="preview-box">
              <p class="mb-2"><strong>Preview:</strong></p>
              <div class="resource-preview">
                <span id="create_preview_text">Nama E-Resource</span>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="fas fa-times"></i> Batal
          </button>
          <button type="button" class="btn btn-primary" id="createSubmitBtn">
            <i class="fas fa-save"></i> Simpan E-Resource
          </button>
        </div>
      </div>
    </div>
  </div>
@endsection

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">
          <i class="fas fa-edit"></i> Edit E-Resource
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editForm" method="POST">
          @csrf
          @method('PUT')

          <div class="mb-3">
            <label for="edit_nama" class="form-label">
              <i class="fas fa-tag"></i> Nama E-Resource <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" id="edit_nama" name="nama"
              placeholder="Contoh: Katalog Online, MyPustaka, dll" required>
            <div class="invalid-feedback" id="edit_nama_error"></div>
            <div class="form-text">
              Masukkan nama e-resource yang akan ditampilkan di halaman publik.
            </div>
          </div>

          <div class="mb-3">
            <label for="edit_url" class="form-label">
              <i class="fas fa-link"></i> URL/Link
            </label>
            <input type="url" class="form-control" id="edit_url" name="url"
              placeholder="https://example.com">
            <div class="invalid-feedback" id="edit_url_error"></div>
            <div class="form-text">
              URL tujuan ketika e-resource diklik. Kosongkan jika tidak ada link.
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">
              <i class="fas fa-info-circle"></i> Informasi Tambahan
            </label>
            <div class="row">
              <div class="col-md-6">
                <small class="text-muted">
                  <strong>Dibuat:</strong><br>
                  <span id="edit_created_at"></span>
                </small>
              </div>
              <div class="col-md-6">
                <small class="text-muted">
                  <strong>Terakhir diubah:</strong><br>
                  <span id="edit_updated_at"></span>
                </small>
              </div>
            </div>
          </div>

          <!-- Preview -->
          <div class="preview-box">
            <p class="mb-2"><strong>Preview:</strong></p>
            <div class="resource-preview">
              <span id="edit_preview_text"></span>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <i class="fas fa-times"></i> Batal
        </button>
        <button type="button" class="btn btn-primary" id="editSubmitBtn">
          <i class="fas fa-save"></i> Update E-Resource
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="deleteModalLabel">
          <i class="fas fa-exclamation-triangle"></i> Konfirmasi Hapus
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda yakin ingin menghapus e-resource <strong id="delete_resource_name"></strong>?</p>
        <p class="text-muted">Tindakan ini tidak dapat dibatalkan.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <i class="fas fa-times"></i> Batal
        </button>
        <form id="deleteForm" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">
            <i class="fas fa-trash"></i> Hapus
          </button>
        </form>
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
    <p class="mt-2 mb-0">Memproses...</p>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Create form preview
    document.getElementById('create_nama').addEventListener('input', function() {
      const previewText = document.getElementById('create_preview_text');
      const value = this.value.trim();
      previewText.textContent = value || 'Nama E-Resource';
    });

    // Edit form preview
    document.getElementById('edit_nama').addEventListener('input', function() {
      const previewText = document.getElementById('edit_preview_text');
      const value = this.value.trim();
      previewText.textContent = value || 'Nama E-Resource';
    });

    // Edit button click
    document.querySelectorAll('.edit-btn').forEach(button => {
      button.addEventListener('click', function() {
        const id = this.getAttribute('data-id');
        const nama = this.getAttribute('data-nama');
        const url = this.getAttribute('data-url');
        const created = this.getAttribute('data-created');
        const updated = this.getAttribute('data-updated');

        document.getElementById('edit_nama').value = nama;
        document.getElementById('edit_url').value = url;
        document.getElementById('edit_created_at').textContent = created;
        document.getElementById('edit_updated_at').textContent = updated;
        document.getElementById('edit_preview_text').textContent = nama;

        document.getElementById('editForm').action = `/admin/eresources/${id}`;

        // Reset validation errors
        document.getElementById('edit_nama').classList.remove('is-invalid');
        document.getElementById('edit_url').classList.remove('is-invalid');

        const editModal = new bootstrap.Modal(document.getElementById('editModal'));
        editModal.show();
      });
    });

    // Delete button click
    document.querySelectorAll('.delete-btn').forEach(button => {
      button.addEventListener('click', function() {
        const id = this.getAttribute('data-id');
        const nama = this.getAttribute('data-nama');

        document.getElementById('delete_resource_name').textContent = nama;
        document.getElementById('deleteForm').action = `/admin/eresources/${id}`;

        const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
      });
    });

    // Create form submission
    document.getElementById('createSubmitBtn').addEventListener('click', function() {
      const form = document.getElementById('createForm');
      const formData = new FormData(form);

      // Show loading overlay
      document.getElementById('loadingOverlay').classList.add('show');

      fetch(form.action, {
          method: 'POST',
          body: formData,
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          }
        })
        .then(response => response.json())
        .then(data => {
          // Hide loading overlay
          document.getElementById('loadingOverlay').classList.remove('show');

          if (data.success) {
            // Close modal
            bootstrap.Modal.getInstance(document.getElementById('createModal')).hide();

            // Show success message
            const alertContainer = document.getElementById('alert-container');
            alertContainer.innerHTML = `
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle"></i> ${data.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        `;

            // Reload page after a short delay
            setTimeout(() => {
              window.location.reload();
            }, 1000);
          } else {
            // Show validation errors
            if (data.errors) {
              if (data.errors.nama) {
                document.getElementById('create_nama').classList.add('is-invalid');
                document.getElementById('create_nama_error').textContent = data.errors.nama[0];
              } else {
                document.getElementById('create_nama').classList.remove('is-invalid');
              }

              if (data.errors.url) {
                document.getElementById('create_url').classList.add('is-invalid');
                document.getElementById('create_url_error').textContent = data.errors.url[0];
              } else {
                document.getElementById('create_url').classList.remove('is-invalid');
              }
            }
          }
        })
        .catch(error => {
          // Hide loading overlay
          document.getElementById('loadingOverlay').classList.remove('show');
          console.error('Error:', error);

          // Show error message
          const alertContainer = document.getElementById('alert-container');
          alertContainer.innerHTML = `
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle"></i> Terjadi kesalahan. Silakan coba lagi.
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    `;
        });
    });

    // Edit form submission
    document.getElementById('editSubmitBtn').addEventListener('click', function() {
      const form = document.getElementById('editForm');
      const formData = new FormData(form);

      // Show loading overlay
      document.getElementById('loadingOverlay').classList.add('show');

      fetch(form.action, {
          method: 'POST',
          body: formData,
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          }
        })
        .then(response => response.json())
        .then(data => {
          // Hide loading overlay
          document.getElementById('loadingOverlay').classList.remove('show');

          if (data.success) {
            // Close modal
            bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();

            // Show success message
            const alertContainer = document.getElementById('alert-container');
            alertContainer.innerHTML = `
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle"></i> ${data.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        `;

            // Reload page after a short delay
            setTimeout(() => {
              window.location.reload();
            }, 1000);
          } else {
            // Show validation errors
            if (data.errors) {
              if (data.errors.nama) {
                document.getElementById('edit_nama').classList.add('is-invalid');
                document.getElementById('edit_nama_error').textContent = data.errors.nama[0];
              } else {
                document.getElementById('edit_nama').classList.remove('is-invalid');
              }

              if (data.errors.url) {
                document.getElementById('edit_url').classList.add('is-invalid');
                document.getElementById('edit_url_error').textContent = data.errors.url[0];
              } else {
                document.getElementById('edit_url').classList.remove('is-invalid');
              }
            }
          }
        })
        .catch(error => {
          // Hide loading overlay
          document.getElementById('loadingOverlay').classList.remove('show');
          console.error('Error:', error);

          // Show error message
          const alertContainer = document.getElementById('alert-container');
          alertContainer.innerHTML = `
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle"></i> Terjadi kesalahan. Silakan coba lagi.
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    `;
        });
    });

    // Reset create form when modal is closed
    document.getElementById('createModal').addEventListener('hidden.bs.modal', function() {
      document.getElementById('createForm').reset();
      document.getElementById('create_preview_text').textContent = 'Nama E-Resource';
      document.getElementById('create_nama').classList.remove('is-invalid');
      document.getElementById('create_url').classList.remove('is-invalid');
    });

    // Delete form submission
    document.getElementById('deleteForm').addEventListener('submit', function(e) {
      e.preventDefault();

      // Show loading overlay
      document.getElementById('loadingOverlay').classList.add('show');

      const form = this;
      const formData = new FormData(form);

      fetch(form.action, {
          method: 'POST',
          body: formData,
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          }
        })
        .then(response => response.json())
        .then(data => {
          // Hide loading overlay
          document.getElementById('loadingOverlay').classList.remove('show');

          if (data.success) {
            // Close modal
            bootstrap.Modal.getInstance(document.getElementById('deleteModal')).hide();

            // Show success message
            const alertContainer = document.getElementById('alert-container');
            alertContainer.innerHTML = `
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle"></i> ${data.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        `;

            // Reload page after a short delay
            setTimeout(() => {
              window.location.reload();
            }, 1000);
          } else {
            // Show error message
            const alertContainer = document.getElementById('alert-container');
            alertContainer.innerHTML = `
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-circle"></i> ${data.message || 'Terjadi kesalahan. Silakan coba lagi.'}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        `;
          }
        })
        .catch(error => {
          // Hide loading overlay
          document.getElementById('loadingOverlay').classList.remove('show');
          console.error('Error:', error);

          // Show error message
          const alertContainer = document.getElementById('alert-container');
          alertContainer.innerHTML = `
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle"></i> Terjadi kesalahan. Silakan coba lagi.
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    `;
        });
    });
  });
</script>
