@extends('admin.layouts.app')

@section('title', 'Kelola Referensi')
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
    position: relative;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 8px;
    overflow: hidden;
    min-height: 300px;
    display: flex;
    align-items: center;
    color: white;
  }

  .banner-preview::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.4);
    z-index: 1;
  }

  .banner-preview-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: 0;
  }

  .banner-content {
    position: relative;
    z-index: 2;
    padding: 30px;
    width: 100%;
  }

  .banner-subtitle {
    font-size: 0.9rem;
    opacity: 0.9;
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  .banner-title {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 15px;
    line-height: 1.2;
  }

  .banner-description {
    font-size: 1rem;
    opacity: 0.9;
    margin-bottom: 20px;
    line-height: 1.5;
  }

  .banner-button {
    display: inline-block;
    padding: 12px 24px;
    background: #f4b942;
    color: #2d5a4a;
    text-decoration: none;
    border-radius: 5px;
    font-weight: 600;
    transition: all 0.3s ease;
  }

  .banner-button:hover {
    background: #e6a73a;
    transform: translateY(-2px);
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
    object-fit: cover;
    border-radius: 5px;
    border: 1px solid #dee2e6;
  }

  .banner-status {
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
  }

  .status-active {
    background: #d4edda;
    color: #155724;
  }

  .status-inactive {
    background: #f8d7da;
    color: #721c24;
  }
</style>

@section('content')
  <div class="container-fluid">
    <!-- Header Section -->
    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h1 class="main-title mb-0">Admin - Kelola Permintaan Referensi</h1>
          <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
              <i class="fas fa-plus"></i> Tambah Pengajuan
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Alert Container -->
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

    <div class="row">
      <div class="col-12">
        <div class="card shadow-lg border-0 rounded-3">
          <div class="card-body">
            @if ($data->count() > 0)
              <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="documentsTable">
                  <thead class="table-success text-center">
                    <tr>
                      <th class="text-center">#</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Topik</th>
                      <th>Pesan</th>
                      <th>Status</th>
                      <th>Tanggal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $index => $req)
                      <tr>
                        <td class="text-center fw-bold">{{ $index + 1 }}</td>
                        <td class="text-center">{{ $req->nama }}</td>
                        <td class="text-center">{{ $req->email }}</td>
                        <td class="text-center">{{ $req->topik }}</td>
                        <td class="text-center">{{ Str::limit(strip_tags($req->pesan), 40) }}</td>
                        <td class="text-center">
                          <span
                            class="badge 
                          @if ($req->status == 'pending') bg-warning text-dark
                          @elseif($req->status == 'diproses') bg-info text-dark
                          @else bg-success @endif">
                            {{ ucfirst($req->status) }}
                          </span>
                        </td>
                        <td>
                          <small class="text-muted">
                            {{ $req->created_at->format('d/m/Y H:i') }}
                          </small>
                        </td>
                        <td>
                          <div class="btn-group" role="group">
                            <!-- Tombol Lihat -->
                            <button class="btn btn-sm btn-info view-btn" data-id="{{ $req->id }}"
                              data-nama="{{ $req->nama }}" data-email="{{ $req->email }}"
                              data-topik="{{ $req->topik }}" data-pesan="{{ $req->pesan }}"
                              data-status="{{ $req->status }}"
                              data-created="{{ $req->created_at->format('d/m/Y H:i') }}">
                              <i class="fas fa-eye"></i>
                            </button>

                            <!-- Tombol Edit -->
                            <button class="btn btn-sm btn-warning edit-btn" data-id="{{ $req->id }}"
                              data-nama="{{ $req->nama }}" data-email="{{ $req->email }}"
                              data-topik="{{ $req->topik }}" data-pesan="{{ $req->pesan }}"
                              data-status="{{ $req->status }}">
                              <i class="fas fa-edit"></i>
                            </button>

                            <!-- Tombol Hapus -->
                            <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $req->id }}"
                              data-nama="{{ $req->nama }}">
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
                <h5 class="text-muted">Belum ada permintaan referensi</h5>
                <p class="text-muted">Permintaan yang dikirim pengguna akan muncul di sini.</p>
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
            <i class="fas fa-plus"></i> Tambah Permintaan Referensi
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="createForm" action="{{ route('admin.referensi.store') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="create_nama" class="form-label">
                    <i class="fas fa-user"></i> Nama <span class="text-danger">*</span>
                  </label>
                  <input type="text" class="form-control" id="create_nama" name="nama" required>
                  <div class="invalid-feedback" id="create_nama_error"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="create_email" class="form-label">
                    <i class="fas fa-envelope"></i> Email <span class="text-danger">*</span>
                  </label>
                  <input type="email" class="form-control" id="create_email" name="email" required>
                  <div class="invalid-feedback" id="create_email_error"></div>
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="create_topik" class="form-label">
                <i class="fas fa-tag"></i> Topik <span class="text-danger">*</span>
              </label>
              <input type="text" class="form-control" id="create_topik" name="topik" required>
              <div class="invalid-feedback" id="create_topik_error"></div>
            </div>

            <div class="mb-3">
              <label for="create_pesan" class="form-label">
                <i class="fas fa-comment"></i> Pesan <span class="text-danger">*</span>
              </label>
              <textarea class="form-control" id="create_pesan" name="pesan" rows="4" required></textarea>
              <div class="invalid-feedback" id="create_pesan_error"></div>
            </div>

            <div class="mb-3">
              <label for="create_status" class="form-label">
                <i class="fas fa-info-circle"></i> Status <span class="text-danger">*</span>
              </label>
              <select class="form-select" id="create_status" name="status" required>
                <option value="pending">Pending</option>
                <option value="diproses">Diproses</option>
                <option value="selesai">Selesai</option>
              </select>
              <div class="invalid-feedback" id="create_status_error"></div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="fas fa-times"></i> Batal
          </button>
          <button type="button" class="btn btn-primary" id="createSubmitBtn">
            <i class="fas fa-save"></i> Simpan
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form id="editForm" method="POST">
          @csrf
          @method('PUT')
          <div class="modal-header bg-warning text-dark">
            <h5 class="modal-title">
              <i class="fas fa-edit"></i> Edit Permintaan Referensi
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="edit_nama" class="form-label">
                    <i class="fas fa-user"></i> Nama <span class="text-danger">*</span>
                  </label>
                  <input type="text" id="edit_nama" name="nama" class="form-control" required>
                  <div class="invalid-feedback" id="edit_nama_error"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="edit_email" class="form-label">
                    <i class="fas fa-envelope"></i> Email <span class="text-danger">*</span>
                  </label>
                  <input type="email" id="edit_email" name="email" class="form-control" required>
                  <div class="invalid-feedback" id="edit_email_error"></div>
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="edit_topik" class="form-label">
                <i class="fas fa-tag"></i> Topik <span class="text-danger">*</span>
              </label>
              <input type="text" id="edit_topik" name="topik" class="form-control" required>
              <div class="invalid-feedback" id="edit_topik_error"></div>
            </div>

            <div class="mb-3">
              <label for="edit_pesan" class="form-label">
                <i class="fas fa-comment"></i> Pesan <span class="text-danger">*</span>
              </label>
              <textarea id="edit_pesan" name="pesan" class="form-control" rows="4" required></textarea>
              <div class="invalid-feedback" id="edit_pesan_error"></div>
            </div>

            <div class="mb-3">
              <label for="edit_status" class="form-label">
                <i class="fas fa-info-circle"></i> Status <span class="text-danger">*</span>
              </label>
              <select id="edit_status" name="status" class="form-select" required>
                <option value="pending">Pending</option>
                <option value="diproses">Diproses</option>
                <option value="selesai">Selesai</option>
              </select>
              <div class="invalid-feedback" id="edit_status_error"></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              <i class="fas fa-times"></i> Batal
            </button>
            <button type="submit" class="btn btn-primary">
              <i class="fas fa-save"></i> Simpan Perubahan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- View Modal -->
  <div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info text-white">
          <h5 class="modal-title">
            <i class="fas fa-eye"></i> Detail Permintaan Referensi
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label"><strong>Nama:</strong></label>
                <p id="view_nama" class="form-control-plaintext border rounded p-2 bg-light"></p>
              </div>
              <div class="mb-3">
                <label class="form-label"><strong>Email:</strong></label>
                <p id="view_email" class="form-control-plaintext border rounded p-2 bg-light"></p>
              </div>
              <div class="mb-3">
                <label class="form-label"><strong>Topik:</strong></label>
                <p id="view_topik" class="form-control-plaintext border rounded p-2 bg-light"></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label"><strong>Status:</strong></label>
                <p id="view_status" class="form-control-plaintext"></p>
              </div>
              <div class="mb-3">
                <label class="form-label"><strong>Tanggal Dibuat:</strong></label>
                <p id="view_created" class="form-control-plaintext border rounded p-2 bg-light"></p>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label"><strong>Pesan:</strong></label>
            <div id="view_pesan" class="border rounded p-3 bg-light" style="min-height: 100px; white-space: pre-wrap;">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="fas fa-times"></i> Tutup
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="deleteForm" method="POST">
          @csrf
          @method('DELETE')
          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title">
              <i class="fas fa-exclamation-triangle"></i> Konfirmasi Hapus
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="text-center">
              <i class="fas fa-exclamation-triangle fa-3x text-danger mb-3"></i>
              <h6>Yakin ingin menghapus permintaan referensi dari:</h6>
              <p class="fw-bold text-danger" id="delete_nama"></p>
              <p class="text-muted">Data yang dihapus tidak dapat dikembalikan!</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              <i class="fas fa-times"></i> Batal
            </button>
            <button type="submit" class="btn btn-danger">
              <i class="fas fa-trash"></i> Ya, Hapus
            </button>
          </div>
        </form>
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

    // Setup file previews
    setupFilePreview('create_image', 'create_image_preview', 'create_preview_bg');

    // Create form preview updates
    function updateCreatePreview() {
      document.getElementById('create_preview_title').textContent =
        document.getElementById('create_title').value || 'Judul Banner';
      document.getElementById('create_preview_subtitle').textContent =
        document.getElementById('create_subtitle').value || 'Subtitle Banner';
      document.getElementById('create_preview_description').textContent =
        document.getElementById('create_description').value || 'Deskripsi banner akan muncul di sini...';
      document.getElementById('create_preview_button').textContent =
        document.getElementById('create_button_text').value || 'Button Text';

      const buttonLink = document.getElementById('create_button_link').value;
      if (buttonLink) {
        document.getElementById('create_preview_button').href = buttonLink;
      }

      // Hide/show elements based on content
      const subtitle = document.getElementById('create_preview_subtitle');
      const button = document.getElementById('create_preview_button');

      subtitle.style.display = document.getElementById('create_subtitle').value ? 'block' : 'none';
      button.style.display = document.getElementById('create_button_text').value ? 'inline-block' : 'none';
    }

    // Edit form preview updates
    function updateEditPreview() {
      document.getElementById('edit_preview_title').textContent =
        document.getElementById('edit_title').value || 'Judul Banner';
      document.getElementById('edit_preview_subtitle').textContent =
        document.getElementById('edit_subtitle').value || 'Subtitle Banner';
      document.getElementById('edit_preview_description').textContent =
        document.getElementById('edit_description').value || 'Deskripsi banner akan muncul di sini...';
      document.getElementById('edit_preview_button').textContent =
        document.getElementById('edit_button_text').value || 'Button Text';

      const buttonLink = document.getElementById('edit_button_link').value;
      if (buttonLink) {
        document.getElementById('edit_preview_button').href = buttonLink;
      }

      // Hide/show elements based on content
      const subtitle = document.getElementById('edit_preview_subtitle');
      const button = document.getElementById('edit_preview_button');

      subtitle.style.display = document.getElementById('edit_subtitle').value ? 'block' : 'none';
      button.style.display = document.getElementById('edit_button_text').value ? 'inline-block' : 'none';
    }

    // Add event listeners for real-time preview updates
    ['create_title', 'create_subtitle', 'create_description', 'create_button_text', 'create_button_link'].forEach(
      id => {
        const element = document.getElementById(id);
        if (element) {
          element.addEventListener('input', updateCreatePreview);
        }
      });

    ['edit_title', 'edit_subtitle', 'edit_description', 'edit_button_text', 'edit_button_link'].forEach(id => {
      const element = document.getElementById(id);
      if (element) {
        element.addEventListener('input', updateEditPreview);
      }
    });

    // View button click
    document.querySelectorAll('.view-btn').forEach(button => {
      button.addEventListener('click', function() {
        const title = this.getAttribute('data-title');
        const subtitle = this.getAttribute('data-subtitle');
        const description = this.getAttribute('data-description');
        const image = this.getAttribute('data-image');
        const buttonText = this.getAttribute('data-button-text');
        const buttonLink = this.getAttribute('data-button-link');

        // Update view modal content
        document.getElementById('view_preview_title').textContent = title || 'Judul Banner';
        document.getElementById('view_preview_subtitle').textContent = subtitle || '';
        document.getElementById('view_preview_description').textContent = description || '';
        document.getElementById('view_preview_button').textContent = buttonText || '';

        if (buttonLink) {
          document.getElementById('view_preview_button').href = buttonLink;
        }

        if (image) {
          document.getElementById('view_preview_bg').src = `/lib/img/banner/${image}`;
        }

        // Hide/show elements based on content
        document.getElementById('view_preview_subtitle').style.display = subtitle ? 'block' : 'none';
        document.getElementById('view_preview_button').style.display = buttonText ? 'inline-block' : 'none';

        const viewModal = new bootstrap.Modal(document.getElementById('viewModal'));
        viewModal.show();
      });
    });

    // Edit button click
    document.querySelectorAll('.edit-btn').forEach(button => {
      button.addEventListener('click', function() {
        const id = this.getAttribute('data-id');
        const title = this.getAttribute('data-title');
        const subtitle = this.getAttribute('data-subtitle');
        const description = this.getAttribute('data-description');
        const image = this.getAttribute('data-image');
        const buttonText = this.getAttribute('data-button-text');
        const buttonLink = this.getAttribute('data-button-link');
        const created = this.getAttribute('data-created');
        const updated = this.getAttribute('data-updated');

        // Fill form fields
        document.getElementById('edit_title').value = title || '';
        document.getElementById('edit_subtitle').value = subtitle || '';
        document.getElementById('edit_description').value = description || '';
        document.getElementById('edit_button_text').value = buttonText || '';
        document.getElementById('edit_button_link').value = buttonLink || '';
        document.getElementById('edit_created_at').textContent = created;
        document.getElementById('edit_updated_at').textContent = updated;

        // Set current image
        const imagePath = image ? `/lib/img/banner/${image}` : '/placeholder.svg?height=300&width=600';
        document.getElementById('edit_current_image').src = imagePath;
        document.getElementById('edit_preview_bg').src = imagePath;

        document.getElementById('editForm').action = `/admin/banners/${id}`;

        // Update preview
        updateEditPreview();

        // Reset validation errors
        ['edit_title', 'edit_subtitle', 'edit_description', 'edit_button_text', 'edit_button_link',
          'edit_image'
        ].forEach(field => {
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
        const title = this.getAttribute('data-title');

        document.getElementById('delete_banner_title').textContent = title;
        document.getElementById('deleteForm').action = `/admin/banners/${id}`;

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
      document.getElementById('create_preview_bg').src = '/placeholder.svg?height=300&width=600';
      updateCreatePreview();

      // Clear preview
      const preview = document.getElementById('create_image_preview');
      if (preview) preview.innerHTML = '';

      // Reset validation errors
      ['create_title', 'create_subtitle', 'create_description', 'create_button_text', 'create_button_link',
        'create_image'
      ].forEach(field => {
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

    // Initialize previews
    updateCreatePreview();
  });
</script>
