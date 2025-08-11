@extends('admin.layouts.app')

@section('title', 'Kelola Banner')
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
          <h2><i class="fas fa-images"></i> Kelola Banner</h2>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="fas fa-plus"></i> Tambah Banner
          </button>
        </div>
        <div class="header-admin"></div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container">
            <a class="navbar-brand" href="{{ route('admin.benner.index') }}">
              <i class="fas fa-images"></i> Admin Banner UMHT
            </a>
            {{-- <div class="navbar-nav ms-auto">
              <a class="nav-link" href="{{ route('home') }}" target="_blank">
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
            @if ($banners->count() > 0)
              <div class="table-responsive">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th width="5%">#</th>
                      <th width="15%">Gambar</th>
                      <th width="25%">Judul</th>
                      <th width="15%">Subtitle</th>
                      <th width="20%">Button</th>
                      <th width="10%">Tanggal Dibuat</th>
                      <th width="10%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($banners as $index => $banner)
                      <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                          @if ($banner->image)
                            <img src="{{ asset('lib/img/banner/' . $banner->image) }}" alt="Banner Image"
                              class="current-image">
                          @else
                            <span class="text-muted">
                              <i class="fas fa-image"></i> Tidak ada gambar
                            </span>
                          @endif
                        </td>
                        <td>
                          <div class="fw-bold">{{ $banner->title }}</div>
                          @if ($banner->description)
                            <small class="text-muted">{{ Str::limit(strip_tags($banner->description), 50) }}</small>
                          @endif
                        </td>
                        <td>
                          @if ($banner->subtitle)
                            <span class="badge bg-secondary">{{ $banner->subtitle }}</span>
                          @else
                            <span class="text-muted">-</span>
                          @endif
                        </td>
                        <td>
                          @if ($banner->button_text && $banner->button_link)
                            <div class="d-flex flex-column">
                              <span class="fw-semibold">{{ $banner->button_text }}</span>
                              <a href="{{ $banner->button_link }}" target="_blank" class="text-decoration-none small">
                                {{ Str::limit($banner->button_link, 25) }}
                                <i class="fas fa-external-link-alt ms-1"></i>
                              </a>
                            </div>
                          @else
                            <span class="text-muted">
                              <i class="fas fa-minus"></i> Tidak ada button
                            </span>
                          @endif
                        </td>
                        <td>
                          {{-- <small class="text-muted">
                            {{ $banner->created_at->format('d/m/Y H:i') }}
                          </small> --}}
                        </td>
                        <td>
                          <div class="btn-group" role="group">
                            <button type="button" class="btn btn-sm btn-info view-btn" data-id="{{ $banner->id }}"
                              data-title="{{ $banner->title }}" data-subtitle="{{ $banner->subtitle }}"
                              data-description="{{ $banner->description }}" data-image="{{ $banner->image }}"
                              data-button-text="{{ $banner->button_text }}"
                              data-button-link="{{ $banner->button_link }}" title="Preview">
                              <i class="fas fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-warning edit-btn" data-id="{{ $banner->id }}"
                              data-title="{{ $banner->title }}" data-subtitle="{{ $banner->subtitle }}"
                              data-description="{{ $banner->description }}" data-image="{{ $banner->image }}"
                              data-button-text="{{ $banner->button_text }}"
                              data-button-link="{{ $banner->button_link }}"
                              data-created="{{ $banner->created_at?->format('d/m/Y H:i:s') }}"
                              data-updated="{{ $banner->updated_at?->format('d/m/Y H:i:s') }}" title="Edit">
                              <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="{{ $banner->id }}"
                              data-title="{{ $banner->title }}" title="Hapus">
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
                <i class="fas fa-images fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">Belum ada data banner</h5>
                <p class="text-muted">Klik tombol "Tambah Banner" untuk menambah data pertama.</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                  <i class="fas fa-plus"></i> Tambah Banner
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
            <i class="fas fa-plus"></i> Tambah Banner Baru
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="createForm" action="{{ route('admin.banners.store') }}" method="POST"
            enctype="multipart/form-data">
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
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">
            <i class="fas fa-edit"></i> Edit Banner
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
                  <label for="edit_title" class="form-label">
                    <i class="fas fa-heading"></i> Judul Banner <span class="text-danger">*</span>
                  </label>
                  <input type="text" class="form-control" id="edit_title" name="title" required>
                  <div class="invalid-feedback" id="edit_title_error"></div>
                </div>

                <div class="mb-3">
                  <label for="edit_subtitle" class="form-label">
                    <i class="fas fa-text-height"></i> Subtitle
                  </label>
                  <input type="text" class="form-control" id="edit_subtitle" name="subtitle">
                  <div class="invalid-feedback" id="edit_subtitle_error"></div>
                </div>

                <div class="mb-3">
                  <label for="edit_description" class="form-label">
                    <i class="fas fa-align-left"></i> Deskripsi
                  </label>
                  <textarea class="form-control" id="edit_description" name="description" rows="3"></textarea>
                  <div class="invalid-feedback" id="edit_description_error"></div>
                </div>

                <div class="mb-3">
                  <label for="edit_button_text" class="form-label">
                    <i class="fas fa-mouse-pointer"></i> Teks Button
                  </label>
                  <input type="text" class="form-control" id="edit_button_text" name="button_text">
                  <div class="invalid-feedback" id="edit_button_text_error"></div>
                </div>

                <div class="mb-3">
                  <label for="edit_button_link" class="form-label">
                    <i class="fas fa-link"></i> Link Button
                  </label>
                  <input type="url" class="form-control" id="edit_button_link" name="button_link">
                  <div class="invalid-feedback" id="edit_button_link_error"></div>
                </div>

                <!-- Current Image Display -->
                <div class="mb-3">
                  <label class="form-label">
                    <i class="fas fa-image"></i> Gambar Saat Ini
                  </label>
                  <div class="text-center">
                    <img id="edit_current_image" src="/placeholder.svg" alt="Current Banner" class="current-image"
                      style="max-width: 200px; max-height: 120px;">
                  </div>
                </div>

                <div class="mb-3">
                  <label for="edit_image" class="form-label">
                    <i class="fas fa-image"></i> Upload Gambar Baru
                  </label>
                  <input type="file" class="form-control" id="edit_image" name="image" accept="image/*">
                  <div class="invalid-feedback" id="edit_image_error"></div>
                  <div class="form-text">Kosongkan jika tidak ingin mengubah gambar banner.</div>
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
                  <p class="mb-2"><strong>Preview Banner:</strong></p>
                  <div class="banner-preview" id="edit_banner_preview">
                    <img id="edit_preview_bg" src="/placeholder.svg?height=300&width=600" alt="Banner Background"
                      class="banner-preview-bg">
                    <div class="banner-content">
                      <div class="banner-subtitle" id="edit_preview_subtitle">Subtitle Banner</div>
                      <h1 class="banner-title" id="edit_preview_title">Judul Banner</h1>
                      <p class="banner-description" id="edit_preview_description">Deskripsi banner akan muncul di
                        sini...</p>
                      <a href="#" class="banner-button" id="edit_preview_button">Button Text</a>
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
            <i class="fas fa-save"></i> Update Banner
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- View Modal -->
  <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header bg-info text-white">
          <h5 class="modal-title" id="viewModalLabel">
            <i class="fas fa-eye"></i> Preview Banner
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <div class="modal-body p-0">
          <div class="banner-preview" id="view_banner_preview" style="min-height: 400px;">
            <img id="view_preview_bg" src="/placeholder.svg" alt="Banner Background" class="banner-preview-bg">
            <div class="banner-content">
              <div class="banner-subtitle" id="view_preview_subtitle"></div>
              <h1 class="banner-title" id="view_preview_title"></h1>
              <p class="banner-description" id="view_preview_description"></p>
              <a href="#" class="banner-button" id="view_preview_button" target="_blank"></a>
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
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="deleteModalLabel">
            <i class="fas fa-exclamation-triangle"></i> Konfirmasi Hapus
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Apakah Anda yakin ingin menghapus banner <strong id="delete_banner_title"></strong>?</p>
          <p class="text-muted">Tindakan ini tidak dapat dibatalkan dan gambar akan dihapus dari server.</p>
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
