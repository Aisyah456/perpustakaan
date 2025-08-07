@extends('admin.layouts.app')

@section('title', 'Kelola Partner')
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

  .partner-preview {
    color: #2d5a4a;
    text-align: center;
    padding: 20px;
    background: white;
    border-radius: 8px;
    position: relative;
    overflow: hidden;
  }

  .partner-logo {
    max-width: 120px;
    max-height: 80px;
    object-fit: contain;
    transition: opacity 0.3s ease;
  }

  .partner-logo.hover-logo {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0;
  }

  .partner-preview:hover .partner-logo.main-logo {
    opacity: 0;
  }

  .partner-preview:hover .partner-logo.hover-logo {
    opacity: 1;
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
    object-fit: contain;
    border-radius: 5px;
    border: 1px solid #dee2e6;
  }
</style>

@section('content')
  <div class="container mt-4">
    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2><i class="fas fa-handshake"></i> Kelola Partner</h2>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="fas fa-plus"></i> Tambah Partner
          </button>
        </div>
        <div class="header-admin"></div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container">
            <a class="navbar-brand" href="{{ route('admin.partners.index') }}">
              <i class="fas fa-handshake"></i> Admin Partner UMHT
            </a>
            {{-- <div class="navbar-nav ms-auto">
              <a class="nav-link" href="{{ route('Admin') }}" target="_blank">
                <i class="fas fa-external-link-alt"></i> Lihat Halaman Publik
              </a>
            </div> --}}
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
            @if ($partners->count() > 0)
              <div class="table-responsive">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th width="5%">#</th>
                      <th width="20%">Nama Partner</th>
                      <th width="15%">Logo</th>
                      <th width="15%">Hover Logo</th>
                      <th width="25%">Link</th>
                      <th width="10%">Tanggal Dibuat</th>
                      <th width="10%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($partners as $index => $partner)
                      <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                          <strong>{{ $partner->name ?? 'Partner ' . ($index + 1) }}</strong>
                        </td>
                        <td>
                          @if ($partner->logo)
                            <img src="{{ asset('lib/img/clients/' . $partner->logo) }}" alt="Logo"
                              class="current-image">
                          @else
                            <span class="text-muted">
                              <i class="fas fa-image"></i> Tidak ada logo
                            </span>
                          @endif
                        </td>
                        <td>
                          @if ($partner->hover_logo)
                            <img src="{{ asset('lib/img/clients/' . $partner->hover_logo) }}" alt="Hover Logo"
                              class="current-image">
                          @else
                            <span class="text-muted">
                              <i class="fas fa-image"></i> Tidak ada hover logo
                            </span>
                          @endif
                        </td>
                        <td>
                          @if ($partner->link)
                            <a href="{{ $partner->link }}" target="_blank" class="text-decoration-none">
                              {{ Str::limit($partner->link, 30) }}
                              <i class="fas fa-external-link-alt ms-1"></i>
                            </a>
                          @else
                            <span class="text-muted">
                              <i class="fas fa-minus"></i> Tidak ada link
                            </span>
                          @endif
                        </td>
                        <td>
                          <small class="text-muted">
                            {{ $partner->created_at?->format('d/m/Y H:i') }}
                          </small>
                        </td>
                        <td>
                          <div class="btn-group" role="group">
                            <button type="button" class="btn btn-sm btn-warning edit-btn" data-id="{{ $partner->id }}"
                              data-name="{{ $partner->name }}" data-link="{{ $partner->link }}"
                              data-logo="{{ $partner->logo }}" data-hover-logo="{{ $partner->hover_logo }}"
                              data-background-image="{{ $partner->background_image }}"
                              data-updated="{{ $partner->updated_at?->format('d/m/Y H:i:s') }}" title="Edit">
                              <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="{{ $partner->id }}"
                              data-name="{{ $partner->name ?? 'Partner ' . ($index + 1) }}" title="Hapus">
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
                <i class="fas fa-handshake fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">Belum ada data partner</h5>
                <p class="text-muted">Klik tombol "Tambah Partner" untuk menambah data pertama.</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                  <i class="fas fa-plus"></i> Tambah Partner
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
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModalLabel">
            <i class="fas fa-plus"></i> Tambah Partner Baru
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="createForm" action="{{ route('admin.partners.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="create_name" class="form-label">
                    <i class="fas fa-building"></i> Nama Partner
                  </label>
                  <input type="text" class="form-control" id="create_name" name="name"
                    placeholder="Contoh: PT. ABC, Universitas XYZ">
                  <div class="invalid-feedback" id="create_name_error"></div>
                  <div class="form-text">
                    Nama partner yang akan ditampilkan (opsional).
                  </div>
                </div>

                <div class="mb-3">
                  <label for="create_link" class="form-label">
                    <i class="fas fa-link"></i> Link Website
                  </label>
                  <input type="url" class="form-control" id="create_link" name="link"
                    placeholder="https://example.com">
                  <div class="invalid-feedback" id="create_link_error"></div>
                  <div class="form-text">
                    URL website partner ketika logo diklik.
                  </div>
                </div>

                <div class="mb-3">
                  <label for="create_logo" class="form-label">
                    <i class="fas fa-image"></i> Logo Utama <span class="text-danger">*</span>
                  </label>
                  <div class="file-input-wrapper">
                    <input type="file" id="create_logo" name="logo" accept="image/*" required>
                    <label for="create_logo" class="file-input-label">
                      <i class="fas fa-cloud-upload-alt fa-2x text-muted mb-2"></i>
                      <div>Klik untuk upload logo utama</div>
                      <small class="text-muted">Format: JPG, PNG, SVG (Max: 2MB)</small>
                    </label>
                  </div>
                  <div class="invalid-feedback" id="create_logo_error"></div>
                  <div id="create_logo_preview" class="mt-2"></div>
                </div>

                <div class="mb-3">
                  <label for="create_hover_logo" class="form-label">
                    <i class="fas fa-image"></i> Logo Hover
                  </label>
                  <div class="file-input-wrapper">
                    <input type="file" id="create_hover_logo" name="hover_logo" accept="image/*">
                    <label for="create_hover_logo" class="file-input-label">
                      <i class="fas fa-cloud-upload-alt fa-2x text-muted mb-2"></i>
                      <div>Klik untuk upload logo hover</div>
                      <small class="text-muted">Logo yang muncul saat hover (opsional)</small>
                    </label>
                  </div>
                  <div class="invalid-feedback" id="create_hover_logo_error"></div>
                  <div id="create_hover_logo_preview" class="mt-2"></div>
                </div>

                <div class="mb-3">
                  <label for="create_background_image" class="form-label">
                    <i class="fas fa-image"></i> Background Image
                  </label>
                  <div class="file-input-wrapper">
                    <input type="file" id="create_background_image" name="background_image" accept="image/*">
                    <label for="create_background_image" class="file-input-label">
                      <i class="fas fa-cloud-upload-alt fa-2x text-muted mb-2"></i>
                      <div>Klik untuk upload background</div>
                      <small class="text-muted">Background untuk card partner (opsional)</small>
                    </label>
                  </div>
                  <div class="invalid-feedback" id="create_background_image_error"></div>
                  <div id="create_background_image_preview" class="mt-2"></div>
                </div>
              </div>

              <div class="col-md-6">
                <!-- Preview -->
                <div class="preview-box">
                  <p class="mb-2"><strong>Preview Partner:</strong></p>
                  <div class="partner-preview" id="create_partner_preview">
                    <div class="position-relative">
                      <img id="create_preview_logo" src="/placeholder.svg?height=80&width=120" alt="Logo Preview"
                        class="partner-logo main-logo">
                      <img id="create_preview_hover_logo" src="/placeholder.svg?height=80&width=120"
                        alt="Hover Logo Preview" class="partner-logo hover-logo">
                    </div>
                    <div class="mt-2">
                      <small class="text-muted" id="create_preview_name">Nama Partner</small>
                    </div>
                  </div>
                  <div class="mt-3">
                    <small class="text-muted">
                      <i class="fas fa-info-circle"></i>
                      Hover pada preview untuk melihat efek hover logo
                    </small>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="fas fa-times"></i> Batal
          </button>
          <button type="button" class="btn btn-primary" id="createSubmitBtn">
            <i class="fas fa-save"></i> Simpan Partner
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">
            <i class="fas fa-edit"></i> Edit Partner
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="edit_name" class="form-label">
                    <i class="fas fa-building"></i> Nama Partner
                  </label>
                  <input type="text" class="form-control" id="edit_name" name="name">
                  <div class="invalid-feedback" id="edit_name_error"></div>
                </div>

                <div class="mb-3">
                  <label for="edit_link" class="form-label">
                    <i class="fas fa-link"></i> Link Website
                  </label>
                  <input type="url" class="form-control" id="edit_link" name="link">
                  <div class="invalid-feedback" id="edit_link_error"></div>
                </div>

                <!-- Current Images Display -->
                <div class="mb-3">
                  <label class="form-label">
                    <i class="fas fa-images"></i> Gambar Saat Ini
                  </label>
                  <div class="row">
                    <div class="col-4">
                      <div class="text-center">
                        <div class="mb-2"><strong>Logo Utama</strong></div>
                        <img id="edit_current_logo" src="/placeholder.svg" alt="Current Logo" class="current-image">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="text-center">
                        <div class="mb-2"><strong>Hover Logo</strong></div>
                        <img id="edit_current_hover_logo" src="/placeholder.svg" alt="Current Hover Logo"
                          class="current-image">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="text-center">
                        <div class="mb-2"><strong>Background</strong></div>
                        <img id="edit_current_background" src="/placeholder.svg" alt="Current Background"
                          class="current-image">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="mb-3">
                  <label for="edit_logo" class="form-label">
                    <i class="fas fa-image"></i> Upload Logo Baru
                  </label>
                  <input type="file" class="form-control" id="edit_logo" name="logo" accept="image/*">
                  <div class="invalid-feedback" id="edit_logo_error"></div>
                  <div class="form-text">Kosongkan jika tidak ingin mengubah logo utama.</div>
                </div>

                <div class="mb-3">
                  <label for="edit_hover_logo" class="form-label">
                    <i class="fas fa-image"></i> Upload Hover Logo Baru
                  </label>
                  <input type="file" class="form-control" id="edit_hover_logo" name="hover_logo" accept="image/*">
                  <div class="invalid-feedback" id="edit_hover_logo_error"></div>
                  <div class="form-text">Kosongkan jika tidak ingin mengubah hover logo.</div>
                </div>

                <div class="mb-3">
                  <label for="edit_background_image" class="form-label">
                    <i class="fas fa-image"></i> Upload Background Baru
                  </label>
                  <input type="file" class="form-control" id="edit_background_image" name="background_image"
                    accept="image/*">
                  <div class="invalid-feedback" id="edit_background_image_error"></div>
                  <div class="form-text">Kosongkan jika tidak ingin mengubah background.</div>
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
              </div>

              <div class="col-md-6">
                <!-- Preview -->
                <div class="preview-box">
                  <p class="mb-2"><strong>Preview Partner:</strong></p>
                  <div class="partner-preview" id="edit_partner_preview">
                    <div class="position-relative">
                      <img id="edit_preview_logo" src="/placeholder.svg" alt="Logo Preview"
                        class="partner-logo main-logo">
                      <img id="edit_preview_hover_logo" src="/placeholder.svg" alt="Hover Logo Preview"
                        class="partner-logo hover-logo">
                    </div>
                    <div class="mt-2">
                      <small class="text-muted" id="edit_preview_name">Nama Partner</small>
                    </div>
                  </div>
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
            <i class="fas fa-save"></i> Update Partner
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
          <p>Apakah Anda yakin ingin menghapus partner <strong id="delete_partner_name"></strong>?</p>
          <p class="text-muted">Tindakan ini tidak dapat dibatalkan dan semua gambar akan dihapus dari server.</p>
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
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // File upload preview functionality
    function setupFilePreview(inputId, previewId, previewImgId) {
      const input = document.getElementById(inputId);
      const preview = document.getElementById(previewId);
      const previewImg = document.getElementById(previewImgId);

      if (input) {
        input.addEventListener('change', function(e) {
          const file = e.target.files[0];
          if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
              if (previewImg) {
                previewImg.src = e.target.result;
              }
              if (preview) {
                preview.innerHTML =
                  `<img src="${e.target.result}" class="image-upload-preview" alt="Preview">`;
              }
            };
            reader.readAsDataURL(file);
          }
        });
      }
    }

    // Setup file previews for create form
    setupFilePreview('create_logo', 'create_logo_preview', 'create_preview_logo');
    setupFilePreview('create_hover_logo', 'create_hover_logo_preview', 'create_preview_hover_logo');
    setupFilePreview('create_background_image', 'create_background_image_preview', null);

    // Create form preview updates
    document.getElementById('create_name').addEventListener('input', function() {
      document.getElementById('create_preview_name').textContent = this.value || 'Nama Partner';
    });

    // Edit form preview updates
    document.getElementById('edit_name').addEventListener('input', function() {
      document.getElementById('edit_preview_name').textContent = this.value || 'Nama Partner';
    });

    // Edit button click
    document.querySelectorAll('.edit-btn').forEach(button => {
      button.addEventListener('click', function() {
        const id = this.getAttribute('data-id');
        const name = this.getAttribute('data-name');
        const link = this.getAttribute('data-link');
        const logo = this.getAttribute('data-logo');
        const hoverLogo = this.getAttribute('data-hover-logo');
        const backgroundImage = this.getAttribute('data-background-image');
        const created = this.getAttribute('data-created');
        const updated = this.getAttribute('data-updated');

        // Fill form fields
        document.getElementById('edit_name').value = name || '';
        document.getElementById('edit_link').value = link || '';
        document.getElementById('edit_created_at').textContent = created;
        document.getElementById('edit_updated_at').textContent = updated;

        // Update preview
        document.getElementById('edit_preview_name').textContent = name || 'Nama Partner';

        // Set current images
        const logoPath = logo ? `/lib/img/clients/${logo}` : '/placeholder.svg?height=80&width=120';
        const hoverLogoPath = hoverLogo ? `/lib/img/clients/${hoverLogo}` :
          '/placeholder.svg?height=80&width=120';
        const backgroundPath = backgroundImage ? `/lib/img/clients/${backgroundImage}` :
          '/placeholder.svg?height=100&width=150';

        document.getElementById('edit_current_logo').src = logoPath;
        document.getElementById('edit_current_hover_logo').src = hoverLogoPath;
        document.getElementById('edit_current_background').src = backgroundPath;
        document.getElementById('edit_preview_logo').src = logoPath;
        document.getElementById('edit_preview_hover_logo').src = hoverLogoPath;

        document.getElementById('editForm').action = `/admin/partners/${id}`;

        // Reset validation errors
        ['edit_name', 'edit_link', 'edit_logo', 'edit_hover_logo', 'edit_background_image'].forEach(
          field => {
            document.getElementById(field).classList.remove('is-invalid');
          });

        const editModal = new bootstrap.Modal(document.getElementById('editModal'));
        editModal.show();
      });
    });

    // Delete button click
    document.querySelectorAll('.delete-btn').forEach(button => {
      button.addEventListener('click', function() {
        const id = this.getAttribute('data-id');
        const name = this.getAttribute('data-name');

        document.getElementById('delete_partner_name').textContent = name;
        document.getElementById('deleteForm').action = `/admin/partners/${id}`;

        const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
      });
    });

    // Form submission handlers
    function handleFormSubmission(formId, submitBtnId, modalId) {
      document.getElementById(submitBtnId).addEventListener('click', function() {
        const form = document.getElementById(formId);
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
              bootstrap.Modal.getInstance(document.getElementById(modalId)).hide();

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
                Object.keys(data.errors).forEach(field => {
                  const fieldElement = document.getElementById(`${formId.replace('Form', '')}_${field}`);
                  const errorElement = document.getElementById(
                    `${formId.replace('Form', '')}_${field}_error`);

                  if (fieldElement && errorElement) {
                    fieldElement.classList.add('is-invalid');
                    errorElement.textContent = data.errors[field][0];
                  }
                });
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
    }

    // Setup form submissions
    handleFormSubmission('createForm', 'createSubmitBtn', 'createModal');
    handleFormSubmission('editForm', 'editSubmitBtn', 'editModal');

    // Reset create form when modal is closed
    document.getElementById('createModal').addEventListener('hidden.bs.modal', function() {
      document.getElementById('createForm').reset();
      document.getElementById('create_preview_name').textContent = 'Nama Partner';
      document.getElementById('create_preview_logo').src = '/placeholder.svg?height=80&width=120';
      document.getElementById('create_preview_hover_logo').src = '/placeholder.svg?height=80&width=120';

      // Clear previews
      ['create_logo_preview', 'create_hover_logo_preview', 'create_background_image_preview'].forEach(id => {
        const element = document.getElementById(id);
        if (element) element.innerHTML = '';
      });

      // Reset validation errors
      ['create_name', 'create_link', 'create_logo', 'create_hover_logo', 'create_background_image'].forEach(
        field => {
          document.getElementById(field).classList.remove('is-invalid');
        });
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
