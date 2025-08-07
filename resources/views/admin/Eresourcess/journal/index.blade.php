@extends('admin.layouts.app')

@section('title', 'Admin - Database Journal Internasional')

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
  <div class="row">
    <div class="col-12">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="main-title mb-0">Admin - Database Journal</h1>
        <div>
          <a href="{{ route('journals.index') }}" class="btn btn-outline-secondary me-2">
            <i class="fas fa-eye"></i> Lihat Halaman Publik
          </a>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="fas fa-plus"></i> Tambah Journal
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="header-admin"></div>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('eresources.admin.index') }}">
        <i class="fas fa-book"></i> Admin Database Journal
      </a>
      <div class="navbar-nav ms-auto">
        <a class="nav-link" href="{{ route('eresources.index') }}" target="_blank">
          <i class="fas fa-external-link-alt"></i> Lihat Halaman Publik
        </a>
      </div>
    </div>
  </nav>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="table-dark">
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Deskripsi</th>
                  <th>Warna</th>
                  <th>URL Akses</th>
                  <th>Status</th>
                  <th>Urutan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($journals as $index => $journal)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="journal-preview me-2"
                          style="background-color: {{ $journal->background_color }}; width: 30px; height: 30px; border-radius: 4px;">
                        </div>
                        <strong>{{ $journal->name }}</strong>
                      </div>
                    </td>
                    <td>{{ $journal->description }}</td>
                    <td>
                      <span class="badge" style="background-color: {{ $journal->background_color }}; color: white;">
                        {{ $journal->background_color }}
                      </span>
                    </td>
                    <td>
                      @if ($journal->access_url)
                        <a href="{{ $journal->access_url }}" target="_blank" class="text-decoration-none">
                          {{ Str::limit($journal->access_url, 30) }}
                        </a>
                      @else
                        <span class="text-muted">-</span>
                      @endif
                    </td>
                    <td>
                      <span class="badge {{ $journal->is_active ? 'bg-success' : 'bg-danger' }}">
                        {{ $journal->is_active ? 'Aktif' : 'Nonaktif' }}
                      </span>
                    </td>
                    <td>{{ $journal->sort_order }}</td>
                    <td>
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-sm btn-outline-primary edit-btn"
                          data-id="{{ $journal->id }}" data-bs-toggle="modal" data-bs-target="#editModal">
                          <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-danger delete-btn"
                          data-id="{{ $journal->id }}" data-name="{{ $journal->name }}" data-bs-toggle="modal"
                          data-bs-target="#deleteModal">
                          <i class="fas fa-trash"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="8" class="text-center text-muted py-4">
                      Belum ada data journal
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Create Modal -->
  <div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Journal Baru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form id="createForm">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="create_name" class="form-label">Nama Journal *</label>
                  <input type="text" class="form-control" id="create_name" name="name" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="create_background_color" class="form-label">Warna Background *</label>
                  <input type="color" class="form-control form-control-color" id="create_background_color"
                    name="background_color" value="#2d7d7d" required>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="create_description" class="form-label">Deskripsi</label>
              <input type="text" class="form-control" id="create_description" name="description"
                placeholder="Contoh: Dilanggan oleh UMY">
            </div>
            <div class="mb-3">
              <label for="create_access_url" class="form-label">URL Akses</label>
              <input type="url" class="form-control" id="create_access_url" name="access_url"
                placeholder="https://example.com">
            </div>
            <div class="mb-3">
              <label for="create_logo_url" class="form-label">URL Logo</label>
              <input type="url" class="form-control" id="create_logo_url" name="logo_url"
                placeholder="https://example.com/logo.png">
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="create_sort_order" class="form-label">Urutan</label>
                  <input type="number" class="form-control" id="create_sort_order" name="sort_order" value="0"
                    min="0">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="create_is_active" name="is_active" checked>
                    <label class="form-check-label" for="create_is_active">
                      Status Aktif
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
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
          <h5 class="modal-title">Edit Journal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form id="editForm">
          @csrf
          @method('PUT')
          <input type="hidden" id="edit_journal_id">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="edit_name" class="form-label">Nama Journal *</label>
                  <input type="text" class="form-control" id="edit_name" name="name" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="edit_background_color" class="form-label">Warna Background *</label>
                  <input type="color" class="form-control form-control-color" id="edit_background_color"
                    name="background_color" required>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="edit_description" class="form-label">Deskripsi</label>
              <input type="text" class="form-control" id="edit_description" name="description">
            </div>
            <div class="mb-3">
              <label for="edit_access_url" class="form-label">URL Akses</label>
              <input type="url" class="form-control" id="edit_access_url" name="access_url">
            </div>
            <div class="mb-3">
              <label for="edit_logo_url" class="form-label">URL Logo</label>
              <input type="url" class="form-control" id="edit_logo_url" name="logo_url">
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="edit_sort_order" class="form-label">Urutan</label>
                  <input type="number" class="form-control" id="edit_sort_order" name="sort_order" min="0">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="edit_is_active" name="is_active">
                    <label class="form-check-label" for="edit_is_active">
                      Status Aktif
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Update</button>
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
          <h5 class="modal-title">Konfirmasi Hapus</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p>Apakah Anda yakin ingin menghapus journal <strong id="delete_journal_name"></strong>?</p>
          <p class="text-muted small">Tindakan ini tidak dapat dibatalkan.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Create Form Submit
      document.getElementById('createForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch('{{ route('journals.store') }}', {
            method: 'POST',
            body: formData,
            headers: {
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              showAlert('success', data.message);
              bootstrap.Modal.getInstance(document.getElementById('createModal')).hide();
              location.reload();
            }
          })
          .catch(error => {
            showAlert('danger', 'Terjadi kesalahan saat menyimpan data');
          });
      });

      // Edit Button Click
      document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
          const journalId = this.getAttribute('data-id');

          fetch(`/journals/${journalId}/edit`)
            .then(response => response.json())
            .then(data => {
              document.getElementById('edit_journal_id').value = data.id;
              document.getElementById('edit_name').value = data.name;
              document.getElementById('edit_background_color').value = data.background_color;
              document.getElementById('edit_description').value = data.description || '';
              document.getElementById('edit_access_url').value = data.access_url || '';
              document.getElementById('edit_logo_url').value = data.logo_url || '';
              document.getElementById('edit_sort_order').value = data.sort_order;
              document.getElementById('edit_is_active').checked = data.is_active;
            });
        });
      });

      // Edit Form Submit
      document.getElementById('editForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const journalId = document.getElementById('edit_journal_id').value;
        const formData = new FormData(this);

        fetch(`/journals/${journalId}`, {
            method: 'POST',
            body: formData,
            headers: {
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              showAlert('success', data.message);
              bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
              location.reload();
            }
          })
          .catch(error => {
            showAlert('danger', 'Terjadi kesalahan saat mengupdate data');
          });
      });

      // Delete Button Click
      document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
          const journalId = this.getAttribute('data-id');
          const journalName = this.getAttribute('data-name');

          document.getElementById('delete_journal_name').textContent = journalName;
          document.getElementById('confirmDelete').setAttribute('data-id', journalId);
        });
      });

      // Confirm Delete
      document.getElementById('confirmDelete').addEventListener('click', function() {
        const journalId = this.getAttribute('data-id');

        fetch(`/journals/${journalId}`, {
            method: 'DELETE',
            headers: {
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
              'Content-Type': 'application/json'
            }
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              showAlert('success', data.message);
              bootstrap.Modal.getInstance(document.getElementById('deleteModal')).hide();
              location.reload();
            }
          })
          .catch(error => {
            showAlert('danger', 'Terjadi kesalahan saat menghapus data');
          });
      });

      function showAlert(type, message) {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
        alertDiv.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
        alertDiv.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        document.body.appendChild(alertDiv);

        setTimeout(() => {
          alertDiv.remove();
        }, 5000);
      }
    });
  </script>
@endsection
