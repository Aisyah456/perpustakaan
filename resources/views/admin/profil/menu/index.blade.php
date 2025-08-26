@extends('admin.layouts.app')

@section('title', 'Admin - Menu Layanan')

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

  {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('admin.menus.index') }}">
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
          <div class="table-responsive shadow-sm rounded-4 border">
            <table class="table table-hover align-middle mb-0" id="documentsTable">
              <thead class="table-success text-center">
                <tr>
                  <th>No</th>
                  <th>Foto</th>
                  <th>Judul</th>
                  <th>Link</th>
                  <th>Deskripsi</th>
                  {{-- <th>Tanggal Dibuat</th> --}}
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($menus as $index => $menu)
                  <tr>
                    <td>{{ $menus->firstItem() + $index }}</td>
                    <td>
                      <img src="{{ asset('lib/img/menu/' . $menu->foto) }}" class="menu-thumbnail"
                        alt="Foto {{ $menu->judul }}" style="height: 60px;">
                    </td>
                    <td>
                      <strong>{{ Str::limit($menu->judul, 30) }}</strong>
                    </td>
                    <td>
                      <a href="{{ $menu->link }}" target="_blank">{{ Str::limit($menu->link, 30) }}</a>
                    </td>
                    <td>
                      <div title="{{ $menu->description }}">
                        {{ Str::limit($menu->description, 40) }}
                      </div>
                    </td>
                    {{-- <td>
                      <small class="text-muted">
                        <i class="fas fa-calendar-alt me-1"></i>
                        {{ $menu->created_at ? $menu->created_at->format('d M Y H:i') : '-' }}
                      </small>
                    </td> --}}
                    <td>
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-sm btn-outline-info view-btn" data-id="{{ $menu->id }}"
                          data-bs-toggle="modal" data-bs-target="#viewModal" title="Lihat Detail">
                          <i class="fas fa-eye"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-primary edit-btn"
                          data-id="{{ $menu->id }}" data-bs-toggle="modal" data-bs-target="#editModal"
                          title="Edit">
                          <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-danger delete-btn"
                          data-id="{{ $menu->id }}" data-title="{{ $menu->judul }}" data-bs-toggle="modal"
                          data-bs-target="#deleteModal" title="Hapus">
                          <i class="fas fa-trash"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="7" class="text-center text-muted py-4">
                      <i class="fas fa-bars fa-3x mb-3 text-muted"></i>
                      <p>Belum ada data menu</p>
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>


          @if ($menus->hasPages())
            <div class="d-flex justify-content-center mt-4">
              {{ $menus->appends(request()->query())->links() }}
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
            <i class="fas fa-plus me-2"></i>Tambah Menu Baru
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form id="createForm" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-md-8">
                <div class="mb-3">
                  <label for="create_judul" class="form-label">Judul *</label>
                  <input type="text" class="form-control" id="create_judul" name="judul" required
                    placeholder="Masukkan judul menu">
                </div>
                <div class="mb-3">
                  <label for="create_link" class="form-label">Link *</label>
                  <input type="url" class="form-control" id="create_link" name="link" required
                    placeholder="https://example.com">
                </div>
                <div class="mb-3">
                  <label for="create_description" class="form-label">Deskripsi *</label>
                  <textarea class="form-control" id="create_description" name="description" rows="3"
                    placeholder="Masukkan deskripsi menu" required></textarea>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                  <label class="form-label">Upload Foto Menu *</label>
                  <div class="image-upload-area" id="createImageUpload"
                    onclick="document.getElementById('create_foto').click()" style="cursor:pointer;">
                    <i class="fas fa-cloud-upload-alt fa-2x text-muted mb-2"></i>
                    <p class="text-muted mb-2">Klik atau drag & drop gambar di sini</p>
                    <small class="text-muted">Format: JPG, PNG, GIF (Max: 5MB)</small>
                    <input type="file" class="d-none" id="create_foto" name="foto" accept="image/*" required>
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
            <i class="fas fa-eye me-2"></i>Detail Banner
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-8">
              <div class="d-flex align-items-center mb-3">
                <h4 id="view_title" class="text-primary mb-0 me-3"></h4>
                <span class="badge" id="view_status_badge"></span>
                <span class="badge bg-info ms-1">Urutan: <span id="view_order"></span></span>
              </div>

              <div class="mb-3">
                <label class="form-label">Subtitle:</label>
                <p id="view_subtitle" class="text-muted"></p>
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
              <div class="text-center">
                <label class="form-label">Gambar Banner:</label>
                <div id="view_image_container">
                  <img id="view_image" class="img-fluid rounded border" style="max-height: 200px;" alt="Banner">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="fas fa-times me-2"></i>Tutup
          </button>
          <button type="button" class="btn btn-primary" id="editFromView">
            <i class="fas fa-edit me-2"></i>Edit Banner
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
            <i class="fas fa-edit me-2"></i>Edit Banner
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form id="editForm" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <input type="hidden" id="edit_banner_id">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-8">
                <div class="mb-3">
                  <label for="edit_title" class="form-label">Judul Banner *</label>
                  <input type="text" class="form-control" id="edit_title" name="title" required>
                </div>
                <div class="mb-3">
                  <label for="edit_subtitle" class="form-label">Subtitle</label>
                  <textarea class="form-control" id="edit_subtitle" name="subtitle" rows="3"></textarea>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="edit_status" class="form-label">Status</label>
                      <select class="form-select" id="edit_status" name="status">
                        <option value="active">Aktif</option>
                        <option value="inactive">Tidak Aktif</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="edit_order" class="form-label">Urutan</label>
                      <input type="number" class="form-control" id="edit_order" name="order" min="1"
                        max="100">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                  <label class="form-label">Gambar Banner</label>
                  <div class="image-upload-area" id="editImageUpload">
                    <i class="fas fa-cloud-upload-alt fa-2x text-muted mb-2"></i>
                    <p class="text-muted mb-2">Klik atau drag & drop gambar di sini</p>
                    <small class="text-muted">Format: JPG, PNG, GIF (Max: 5MB)<br>Kosongkan jika tidak ingin
                      mengubah</small>
                    <input type="file" class="d-none" id="edit_image" name="image" accept="image/*">
                  </div>
                  <div id="editImagePreview" class="mt-2">
                    <img id="editPreviewImg" class="image-preview" style="display: none;" alt="Preview">
                    <button type="button" class="btn btn-sm btn-danger mt-2" id="removeEditImage"
                      style="display: none;">
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
          <p>Apakah Anda yakin ingin menghapus banner <strong id="delete_banner_title"></strong>?</p>
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
    document.addEventListener('DOMContentLoaded', function() {
      // Image upload handling
      function setupImageUpload(uploadAreaId, inputId, previewId, previewImgId, removeButtonId) {
        const uploadArea = document.getElementById(uploadAreaId);
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        const previewImg = document.getElementById(previewImgId);
        const removeButton = document.getElementById(removeButtonId);

        uploadArea.addEventListener('click', () => input.click());

        uploadArea.addEventListener('dragover', (e) => {
          e.preventDefault();
          uploadArea.classList.add('dragover');
        });

        uploadArea.addEventListener('dragleave', () => {
          uploadArea.classList.remove('dragover');
        });

        uploadArea.addEventListener('drop', (e) => {
          e.preventDefault();
          uploadArea.classList.remove('dragover');
          const files = e.dataTransfer.files;
          if (files.length > 0) {
            input.files = files;
            handleImagePreview(files[0], previewImg, preview, uploadArea);
          }
        });

        input.addEventListener('change', (e) => {
          if (e.target.files.length > 0) {
            handleImagePreview(e.target.files[0], previewImg, preview, uploadArea);
          }
        });

        if (removeButton) {
          removeButton.addEventListener('click', () => {
            input.value = '';
            preview.style.display = 'none';
            uploadArea.style.display = 'block';
          });
        }
      }

      function handleImagePreview(file, previewImg, preview, uploadArea) {
        const reader = new FileReader();
        reader.onload = (e) => {
          previewImg.src = e.target.result;
          preview.style.display = 'block';
          uploadArea.style.display = 'none';
        };
        reader.readAsDataURL(file);
      }

      // Setup image uploads
      setupImageUpload('createImageUpload', 'create_image', 'createImagePreview', 'createPreviewImg',
        'removeCreateImage');
      setupImageUpload('editImageUpload', 'edit_image', 'editImagePreview', 'editPreviewImg', 'removeEditImage');

      // Preview functionality for create form
      const createTitle = document.getElementById('create_title');
      const createSubtitle = document.getElementById('create_subtitle');
      const createStatus = document.getElementById('create_status');
      const createOrder = document.getElementById('create_order');
      const createPreview = document.getElementById('createPreview');

      function updatePreview() {
        const title = createTitle.value;
        const subtitle = createSubtitle.value;
        const status = createStatus.value;
        const order = createOrder.value;

        if (title || subtitle || status || order) {
          document.getElementById('previewTitle').textContent = title || 'Judul Banner';
          document.getElementById('previewSubtitle').textContent = subtitle || 'Subtitle banner';

          const statusSpan = document.getElementById('previewStatus');
          statusSpan.textContent = status === 'active' ? 'Aktif' : 'Tidak Aktif';
          statusSpan.className = `badge ${status === 'active' ? 'bg-success' : 'bg-secondary'}`;

          document.getElementById('previewOrder').textContent = order || '1';

          createPreview.style.display = 'block';
        } else {
          createPreview.style.display = 'none';
        }
      }

      createTitle.addEventListener('input', updatePreview);
      createSubtitle.addEventListener('input', updatePreview);
      createStatus.addEventListener('change', updatePreview);
      createOrder.addEventListener('input', updatePreview);

      // Create Form Submit
      document.getElementById('createForm').addEventListener('submit', function(e) {
        e.preventDefault();
        showLoading(true);

        const formData = new FormData(this);

        fetch('{{ route('admin.menus.store') }}', {
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
          const bannerId = this.getAttribute('data-id');
          showLoading(true);

          fetch(`{{ route('admin.menus.index') }}/${bannerId}`)
            .then(response => response.json())
            .then(data => {
              showLoading(false);
              document.getElementById('view_title').textContent = data.title;
              document.getElementById('view_subtitle').textContent = data.subtitle || '-';

              const statusSpan = document.getElementById('view_status_badge');
              statusSpan.textContent = data.status === 'active' ? 'Aktif' : 'Tidak Aktif';
              statusSpan.className = `badge ${data.status === 'active' ? 'bg-success' : 'bg-secondary'}`;

              document.getElementById('view_order').textContent = data.order || '1';
              document.getElementById('view_image').src = `{{ asset('lib/img/banner/') }}/${data.image}`;
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
          const bannerId = this.getAttribute('data-id');
          showLoading(true);

          fetch(`{{ route('admin.menus.index') }}/${bannerId}/edit`)
            .then(response => response.json())
            .then(data => {
              showLoading(false);
              document.getElementById('edit_banner_id').value = data.id;
              document.getElementById('edit_title').value = data.title;
              document.getElementById('edit_subtitle').value = data.subtitle || '';
              document.getElementById('edit_status').value = data.status || 'active';
              document.getElementById('edit_order').value = data.order || 1;

              // Show current image
              const editPreviewImg = document.getElementById('editPreviewImg');
              const editImagePreview = document.getElementById('editImagePreview');
              const editImageUpload = document.getElementById('editImageUpload');

              editPreviewImg.src = `{{ asset('lib/img/icons/') }}/${data.image}`;
              editImagePreview.style.display = 'block';
              editImageUpload.style.display = 'none';
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

        const bannerId = document.getElementById('edit_banner_id').value;
        const formData = new FormData(this);

        fetch(`{{ route('admin.menus.index') }}/${bannerId}`, {
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

      // Toggle Status Button Click
      document.querySelectorAll('.toggle-status-btn').forEach(button => {
        button.addEventListener('click', function() {
          const bannerId = this.getAttribute('data-id');
          const currentStatus = this.getAttribute('data-status');
          showLoading(true);

          fetch(`{{ route('admin.menus.index') }}/${bannerId}/toggle-status`, {
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
          const bannerId = this.getAttribute('data-id');
          const bannerTitle = this.getAttribute('data-title');

          document.getElementById('delete_banner_title').textContent = bannerTitle;
          document.getElementById('confirmDelete').setAttribute('data-id', bannerId);
        });
      });

      // Confirm Delete
      document.getElementById('confirmDelete').addEventListener('click', function() {
        const bannerId = this.getAttribute('data-id');
        showLoading(true);

        fetch(`{{ route('admin.menus.index') }}/${bannerId}`, {
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
        // Get the current banner ID from view modal and trigger edit
        const viewTitle = document.getElementById('view_title').textContent;
        const editBtn = Array.from(document.querySelectorAll('.edit-btn')).find(btn => {
          const row = btn.closest('tr');
          return row.querySelector('strong').textContent.includes(viewTitle);
        });
        if (editBtn) {
          editBtn.click();
        }
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
        document.getElementById('createImagePreview').style.display = 'none';
        document.getElementById('createImageUpload').style.display = 'block';
      });

      document.getElementById('editModal').addEventListener('hidden.bs.modal', function() {
        document.getElementById('editForm').reset();
        document.getElementById('editImagePreview').style.display = 'none';
        document.getElementById('editImageUpload').style.display = 'block';
      });
    });
  </script>
@endsection
