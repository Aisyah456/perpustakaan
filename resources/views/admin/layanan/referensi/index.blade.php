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
  <div class="container mt-4">
    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2><i class="fas fa-envelope-open-text"></i> Kelola Permintaan Referensi</h2>
        </div>

        <!-- Alert Messages -->
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

        <div class="card">
          <div class="card-body">
            @if ($data->count() > 0)
              <div class="table-responsive">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
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
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $req->nama }}</td>
                        <td>{{ $req->email }}</td>
                        <td>{{ $req->topik }}</td>
                        <td>{{ Str::limit(strip_tags($req->pesan), 40) }}</td>
                        <td>
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
                            <a href="{{ route('referensi.show', $req->id) }}" class="btn btn-sm btn-info" title="Lihat">
                              <i class="fas fa-eye"></i>
                            </a>
                            <form method="POST" action="{{ route('referensi.update.status', $req->id) }}">
                              @csrf
                              @method('PATCH')
                              <input type="hidden" name="status"
                                value="{{ $req->status == 'pending' ? 'diproses' : ($req->status == 'diproses' ? 'selesai' : 'pending') }}">
                              <button type="submit" class="btn btn-sm btn-warning" title="Ubah Status">
                                <i class="fas fa-sync"></i>
                              </button>
                            </form>
                            <form method="POST" action="{{ route('referensi.destroy', $req->id) }}">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Hapus data ini?')" title="Hapus">
                                <i class="fas fa-trash"></i>
                              </button>
                            </form>
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
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModalLabel">
            <i class="fas fa-plus"></i> Tambah Banner Baru
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="createForm" action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="create_title" class="form-label">
                    <i class="fas fa-heading"></i> Judul Banner <span class="text-danger">*</span>
                  </label>
                  <input type="text" class="form-control" id="create_title" name="title"
                    placeholder="Contoh: Selamat Datang di Perpustakaan UMHT" required>
                  <div class="invalid-feedback" id="create_title_error"></div>
                  <div class="form-text">
                    Judul utama yang akan ditampilkan pada banner.
                  </div>
                </div>

                <div class="mb-3">
                  <label for="create_subtitle" class="form-label">
                    <i class="fas fa-text-height"></i> Subtitle
                  </label>
                  <input type="text" class="form-control" id="create_subtitle" name="subtitle"
                    placeholder="Contoh: Pusat Informasi & Pengetahuan">
                  <div class="invalid-feedback" id="create_subtitle_error"></div>
                  <div class="form-text">
                    Subtitle yang muncul di atas judul utama (opsional).
                  </div>
                </div>

                <div class="mb-3">
                  <label for="create_description" class="form-label">
                    <i class="fas fa-align-left"></i> Deskripsi
                  </label>
                  <textarea class="form-control" id="create_description" name="description" rows="3"
                    placeholder="Deskripsi singkat tentang banner ini..."></textarea>
                  <div class="invalid-feedback" id="create_description_error"></div>
                  <div class="form-text">
                    Deskripsi yang akan muncul di bawah judul (opsional).
                  </div>
                </div>

                <div class="mb-3">
                  <label for="create_button_text" class="form-label">
                    <i class="fas fa-mouse-pointer"></i> Teks Button
                  </label>
                  <input type="text" class="form-control" id="create_button_text" name="button_text"
                    placeholder="Contoh: Jelajahi Sekarang, Pelajari Lebih Lanjut">
                  <div class="invalid-feedback" id="create_button_text_error"></div>
                  <div class="form-text">
                    Teks yang akan muncul pada button (opsional).
                  </div>
                </div>

                <div class="mb-3">
                  <label for="create_button_link" class="form-label">
                    <i class="fas fa-link"></i> Link Button
                  </label>
                  <input type="url" class="form-control" id="create_button_link" name="button_link"
                    placeholder="https://example.com">
                  <div class="invalid-feedback" id="create_button_link_error"></div>
                  <div class="form-text">
                    URL tujuan ketika button diklik (opsional).
                  </div>
                </div>

                <div class="mb-3">
                  <label for="create_image" class="form-label">
                    <i class="fas fa-image"></i> Gambar Banner <span class="text-danger">*</span>
                  </label>
                  <div class="file-input-wrapper">
                    <input type="file" id="create_image" name="image" accept="image/*" required>
                    <label for="create_image" class="file-input-label">
                      <i class="fas fa-cloud-upload-alt fa-2x text-muted mb-2"></i>
                      <div>Klik untuk upload gambar banner</div>
                      <small class="text-muted">Format: JPG, PNG, SVG (Max: 5MB)<br>Rekomendasi: 1920x600px</small>
                    </label>
                  </div>
                  <div class="invalid-feedback" id="create_image_error"></div>
                  <div id="create_image_preview" class="mt-2"></div>
                </div>
              </div>

              <div class="col-md-6">
                <!-- Preview -->
                <div class="preview-box">
                  <p class="mb-2"><strong>Preview Banner:</strong></p>
                  <div class="banner-preview" id="create_banner_preview">
                    <img id="create_preview_bg" src="/placeholder.svg?height=300&width=600" alt="Banner Background"
                      class="banner-preview-bg">
                    <div class="banner-content">
                      <div class="banner-subtitle" id="create_preview_subtitle">Subtitle Banner</div>
                      <h1 class="banner-title" id="create_preview_title">Judul Banner</h1>
                      <p class="banner-description" id="create_preview_description">Deskripsi banner akan muncul di
                        sini...</p>
                      <a href="#" class="banner-button" id="create_preview_button">Button Text</a>
                    </div>
                  </div>
                  <div class="mt-3">
                    <small class="text-muted">
                      <i class="fas fa-info-circle"></i>
                      Preview menunjukkan tampilan banner di halaman utama
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
            <i class="fas fa-save"></i> Simpan Banner
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal{{ $request->id }}" tabindex="-1"
    aria-labelledby="editModalLabel{{ $request->id }}" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route('referensi.update', $request->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="modal-header bg-warning text-dark">
            <h5 class="modal-title" id="editModalLabel{{ $request->id }}">Edit Permintaan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
          </div>
          <div class="modal-body">
            <div class="mb-2">
              <label>Nama</label>
              <input type="text" name="nama" class="form-control" value="{{ $request->nama }}" required>
            </div>
            <div class="mb-2">
              <label>Email</label>
              <input type="email" name="email" class="form-control" value="{{ $request->email }}" required>
            </div>
            <div class="mb-2">
              <label>Topik</label>
              <input type="text" name="topik" class="form-control" value="{{ $request->topik }}" required>
            </div>
            <div class="mb-2">
              <label>Pesan</label>
              <textarea name="pesan" class="form-control" rows="3" required>{{ $request->pesan }}</textarea>
            </div>
            <div class="mb-2">
              <label>Status</label>
              <select name="status" class="form-select" required>
                <option value="pending" {{ $request->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="diproses" {{ $request->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="selesai" {{ $request->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- View Modal -->
  <div class="modal fade" id="showModal{{ $request->id }}" tabindex="-1"
    aria-labelledby="showModalLabel{{ $request->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info text-white">
          <h5 class="modal-title" id="showModalLabel{{ $request->id }}">Detail Permintaan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <p><strong>Nama:</strong> {{ $request->nama }}</p>
          <p><strong>Email:</strong> {{ $request->email }}</p>
          <p><strong>Topik:</strong> {{ $request->topik }}</p>
          <p><strong>Pesan:</strong><br>{{ $request->pesan }}</p>
          <p><strong>Status:</strong> {{ ucfirst($request->status) }}</p>
        </div>
      </div>
    </div>
  </div>


  <!-- Delete Modal -->
  <div class="modal fade" id="deleteModal{{ $request->id }}" tabindex="-1"
    aria-labelledby="deleteModalLabel{{ $request->id }}" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route('referensi.destroy', $request->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title" id="deleteModalLabel{{ $request->id }}">Konfirmasi Hapus</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
          </div>
          <div class="modal-body">
            Yakin ingin menghapus permintaan dari <strong>{{ $request->nama }}</strong>?
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
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
