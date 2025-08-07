@extends('admin.layouts.app')

@section('title', 'Admin - Portal Journal')
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

  .badge-active {
    background-color: #28a745;
  }

  .badge-inactive {
    background-color: #dc3545;
  }
</style>

@section('content')
  <div class="header-admin"></div>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('portal-jurnal.index') }}">
        <i class="fas fa-journal-whills"></i> Admin Portal Jurnal Nasional
      </a>
      <div class="navbar-nav ms-auto">
        <a class="nav-link" href="{{ route('portal-jurnal.index') }}" target="_blank">
          <i class="fas fa-external-link-alt"></i> Lihat Halaman Publik
        </a>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2><i class="fas fa-list"></i> Kelola Portal Jurnal Nasional</h2>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="fas fa-plus"></i> Tambah Portal Jurnal
          </button>
        </div>

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
            @if ($portals->count() > 0)
              <div class="table-responsive">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th width="5%">#</th>
                      <th width="25%">Nama Portal</th>
                      <th width="30%">URL</th>
                      <th width="25%">Deskripsi</th>
                      <th width="8%">Status</th>
                      <th width="7%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($portals as $index => $portal)
                      <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                          <strong>{{ $portal->nama }}</strong>
                        </td>
                        <td>
                          @if ($portal->url)
                            <a href="{{ $portal->url }}" target="_blank" class="text-decoration-none">
                              {{ Str::limit($portal->url, 40) }}
                              <i class="fas fa-external-link-alt ms-1"></i>
                            </a>
                          @else
                            <span class="text-muted">
                              <i class="fas fa-minus"></i> Tidak ada URL
                            </span>
                          @endif
                        </td>
                        <td>
                          @if ($portal->deskripsi)
                            <span title="{{ $portal->deskripsi }}">
                              {{ Str::limit($portal->deskripsi, 50) }}
                            </span>
                          @else
                            <span class="text-muted">-</span>
                          @endif
                        </td>
                        <td>
                          <span class="badge {{ $portal->is_active ? 'badge-active' : 'badge-inactive' }}">
                            {{ $portal->status_text }}
                          </span>
                        </td>
                        <td>
                          <div class="btn-group" role="group">
                            <button type="button" class="btn btn-sm btn-warning edit-btn" data-id="{{ $portal->id }}"
                              data-nama="{{ $portal->nama }}" data-url="{{ $portal->url }}"
                              data-deskripsi="{{ $portal->deskripsi }}" data-is_active="{{ $portal->is_active }}"
                              data-created="{{ $portal->created_at->format('d/m/Y H:i:s') }}"
                              data-updated="{{ $portal->updated_at->format('d/m/Y H:i:s') }}" title="Edit">
                              <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="{{ $portal->id }}"
                              data-nama="{{ $portal->nama }}" title="Hapus">
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
                <h5 class="text-muted">Belum ada data portal jurnal</h5>
                <p class="text-muted">Klik tombol "Tambah Portal Jurnal" untuk menambah data pertama.</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                  <i class="fas fa-plus"></i> Tambah Portal Jurnal
                </button>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createModalLabel">
          <i class="fas fa-plus"></i> Tambah Portal Jurnal Baru
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="createForm" action="{{ route('portal-jurnal.store') }}" method="POST">
          @csrf

          <div class="mb-3">
            <label for="create_nama" class="form-label">
              <i class="fas fa-tag"></i> Nama Portal Jurnal <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" id="create_nama" name="nama"
              placeholder="Contoh: Sinta Kemendikbud, Portal Garuda, dll" required>
            <div class="invalid-feedback" id="create_nama_error"></div>
          </div>

          <div class="mb-3">
            <label for="create_url" class="form-label">
              <i class="fas fa-link"></i> URL/Link
            </label>
            <input type="url" class="form-control" id="create_url" name="url"
              placeholder="https://example.com">
            <div class="invalid-feedback" id="create_url_error"></div>
          </div>

          <div class="mb-3">
            <label for="create_deskripsi" class="form-label">
              <i class="fas fa-align-left"></i> Deskripsi
            </label>
            <textarea class="form-control" id="create_deskripsi" name="deskripsi" rows="3"
              placeholder="Deskripsi singkat tentang portal jurnal ini"></textarea>
            <div class="invalid-feedback" id="create_deskripsi_error"></div>
          </div>

          <div class="mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="create_is_active" name="is_active" checked>
              <label class="form-check-label" for="create_is_active">
                <i class="fas fa-toggle-on"></i> Portal Aktif
              </label>
            </div>
            <div class="form-text">
              Portal yang aktif akan ditampilkan di halaman publik.
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <i class="fas fa-times"></i> Batal
        </button>
        <button type="button" class="btn btn-primary" id="createSubmitBtn">
          <i class="fas fa-save"></i> Simpan Portal Jurnal
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">
          <i class="fas fa-edit"></i> Edit Portal Jurnal
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editForm" method="POST">
          @csrf
          @method('PUT')

          <div class="mb-3">
            <label for="edit_nama" class="form-label">
              <i class="fas fa-tag"></i> Nama Portal Jurnal <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" id="edit_nama" name="nama" required>
            <div class="invalid-feedback" id="edit_nama_error"></div>
          </div>

          <div class="mb-3">
            <label for="edit_url" class="form-label">
              <i class="fas fa-link"></i> URL/Link
            </label>
            <input type="url" class="form-control" id="edit_url" name="url">
            <div class="invalid-feedback" id="edit_url_error"></div>
          </div>

          <div class="mb-3">
            <label for="edit_deskripsi" class="form-label">
              <i class="fas fa-align-left"></i> Deskripsi
            </label>
            <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="3"></textarea>
            <div class="invalid-feedback" id="edit_deskripsi_error"></div>
          </div>

          <div class="mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="edit_is_active" name="is_active">
              <label class="form-check-label" for="edit_is_active">
                <i class="fas fa-toggle-on"></i> Portal Aktif
              </label>
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
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <i class="fas fa-times"></i> Batal
        </button>
        <button type="button" class="btn btn-primary" id="editSubmitBtn">
          <i class="fas fa-save"></i> Update Portal Jurnal
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
        <p>Apakah Anda yakin ingin menghapus portal jurnal <strong id="delete_portal_name"></strong>?</p>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Edit button click
    document.querySelectorAll('.edit-btn').forEach(button => {
      button.addEventListener('click', function() {
        const id = this.getAttribute('data-id');
        const nama = this.getAttribute('data-nama');
        const url = this.getAttribute('data-url');
        const deskripsi = this.getAttribute('data-deskripsi');
        const isActive = this.getAttribute('data-is_active') === '1';
        const created = this.getAttribute('data-created');
        const updated = this.getAttribute('data-updated');

        document.getElementById('edit_nama').value = nama;
        document.getElementById('edit_url').value = url;
        document.getElementById('edit_deskripsi').value = deskripsi;
        document.getElementById('edit_is_active').checked = isActive;
        document.getElementById('edit_created_at').textContent = created;
        document.getElementById('edit_updated_at').textContent = updated;

        document.getElementById('editForm').action = `/admin/portal-jurnal/${id}`;

        const editModal = new bootstrap.Modal(document.getElementById('editModal'));
        editModal.show();
      });
    });

    // Delete button click
    document.querySelectorAll('.delete-btn').forEach(button => {
      button.addEventListener('click', function() {
        const id = this.getAttribute('data-id');
        const nama = this.getAttribute('data-nama');

        document.getElementById('delete_portal_name').textContent = nama;
        document.getElementById('deleteForm').action = `/admin/portal-jurnal/${id}`;

        const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
      });
    });

    // Create form submission
    document.getElementById('createSubmitBtn').addEventListener('click', function() {
      const form = document.getElementById('createForm');
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
          if (data.success) {
            bootstrap.Modal.getInstance(document.getElementById('createModal')).hide();
            location.reload();
          } else {
            // Handle validation errors
            if (data.errors) {
              Object.keys(data.errors).forEach(key => {
                const input = document.getElementById(`create_${key}`);
                const errorDiv = document.getElementById(`create_${key}_error`);
                if (input && errorDiv) {
                  input.classList.add('is-invalid');
                  errorDiv.textContent = data.errors[key][0];
                }
              });
            }
          }
        });
    });

    // Edit form submission
    document.getElementById('editSubmitBtn').addEventListener('click', function() {
      const form = document.getElementById('editForm');
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
          if (data.success) {
            bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
            location.reload();
          } else {
            // Handle validation errors
            if (data.errors) {
              Object.keys(data.errors).forEach(key => {
                const input = document.getElementById(`edit_${key}`);
                const errorDiv = document.getElementById(`edit_${key}_error`);
                if (input && errorDiv) {
                  input.classList.add('is-invalid');
                  errorDiv.textContent = data.errors[key][0];
                }
              });
            }
          }
        });
    });

    // Reset forms when modals are closed
    document.getElementById('createModal').addEventListener('hidden.bs.modal', function() {
      document.getElementById('createForm').reset();
      document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
    });
  });
</script>
