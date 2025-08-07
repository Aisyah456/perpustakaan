@extends('admin.layouts.app')

@section('title', 'Admin - Dokumen Eksternal')

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

  .document-preview {
    color: #2d5a4a;
    position: relative;
    padding-left: 15px;
  }

  .document-preview::before {
    content: "📄";
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

  .link-preview {
    max-width: 200px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }

  .description-preview {
    max-width: 300px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }

  .category-badge {
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
        <h1 class="main-title mb-0">Admin - Dokumen Eksternal</h1>
        <div>
          {{-- <a href="{{ route('admin.dok.eksternal.index') }}" class="btn btn-outline-secondary me-2">
            <i class="fas fa-eye"></i> Lihat Halaman Publik
          </a> --}}
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="fas fa-plus"></i> Tambah Dokumen
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="header-admin"></div>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('admin.external-documents.index') }}">
        <i class="fas fa-link"></i> Admin Dokumen Eksternal
      </a>

    </div>
  </nav>

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

          <!-- Filter Section -->
          <div class="filter-section">
            <div class="row">
              <div class="col-md-4">
                <select class="form-select" id="categoryFilter">
                  <option value="">Semua Kategori</option>
                  <option value="Jurnal">Jurnal</option>
                  <option value="Publikasi">Publikasi</option>
                  <option value="Buku">Buku</option>
                  <option value="Artikel">Artikel</option>
                  <option value="Thesis">Thesis</option>
                  <option value="Laporan">Laporan</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" id="searchInput" placeholder="Cari dokumen...">
              </div>
              <div class="col-md-2">
                <button type="button" class="btn btn-outline-secondary w-100" id="resetFilter">
                  <i class="fas fa-rotate-left"></i> Reset
                </button>
              </div>
            </div>
          </div>

          <div class="table-responsive shadow-sm rounded-4 border">
            <table class="table table-hover align-middle mb-0" id="documentsTable">
              <thead class="table-success text-center">
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Kategori</th>
                  <th>Deskripsi</th>
                  <th>Link</th>
                  <th>Tanggal Dibuat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($documents as $index => $document)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                      <div class="d-flex align-items-center">
                        <i class="fas fa-link text-primary me-2"></i>
                        <strong>{{ $document->judul }}</strong>
                      </div>
                    </td>
                    <td>
                      <span
                        class="badge category-badge 
                        @switch($document->kategori)
                          @case('Jurnal') bg-primary @break
                          @case('Publikasi') bg-success @break
                          @case('Buku') bg-info @break
                          @case('Artikel') bg-warning text-dark @break
                          @case('Thesis') bg-danger @break
                          @case('Laporan') bg-dark @break
                          @default bg-secondary
                        @endswitch">
                        {{ $document->kategori }}
                      </span>
                    </td>
                    <td>
                      <div class="description-preview" title="{{ $document->deskripsi }}">
                        {{ $document->deskripsi ?? '-' }}
                      </div>
                    </td>
                    <td>
                      @if ($document->link)
                        <a href="{{ $document->link }}" target="_blank" class="text-decoration-none link-preview"
                          title="{{ $document->link }}">
                          <i class="fas fa-external-link-alt me-1"></i>
                          {{ Str::limit($document->link, 30) }}
                        </a>
                      @else
                        <span class="text-muted">-</span>
                      @endif
                    </td>
                    <td>
                      <small class="text-muted">
                        {{ $document->created_at->format('d M Y H:i') }}
                      </small>
                    </td>
                    <td>
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-sm btn-outline-info view-btn" data-id="{{ $document->id }}"
                          data-bs-toggle="modal" data-bs-target="#viewModal" title="Lihat Detail">
                          <i class="fas fa-eye"></i>
                        </button>
                        <a href="{{ $document->link }}" target="_blank" class="btn btn-sm btn-outline-success"
                          title="Buka Link">
                          <i class="fas fa-external-link-alt"></i>
                        </a>
                        <button type="button" class="btn btn-sm btn-outline-primary edit-btn"
                          data-id="{{ $document->id }}" data-bs-toggle="modal" data-bs-target="#editModal"
                          title="Edit">
                          <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-danger delete-btn"
                          data-id="{{ $document->id }}" data-judul="{{ $document->judul }}" data-bs-toggle="modal"
                          data-bs-target="#deleteModal" title="Hapus">
                          <i class="fas fa-trash"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="7" class="text-center text-muted py-4">
                      <i class="fas fa-link fa-3x mb-3 text-muted"></i>
                      <p>Belum ada dokumen eksternal</p>
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          @if ($documents->hasPages())
            <div class="d-flex justify-content-center mt-4">
              {{ $documents->links() }}
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
            <i class="fas fa-plus me-2"></i>Tambah Dokumen Eksternal
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form id="createForm">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-md-8">
                <div class="mb-3">
                  <label for="create_judul" class="form-label">Judul Dokumen *</label>
                  <input type="text" class="form-control" id="create_judul" name="judul" required
                    placeholder="Contoh: Jurnal Teknologi Informasi 2024">
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="create_kategori" class="form-label">Kategori *</label>
                  <select class="form-select" id="create_kategori" name="kategori" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Jurnal">Jurnal</option>
                    <option value="Publikasi">Publikasi</option>
                    <option value="Buku">Buku</option>
                    <option value="Artikel">Artikel</option>
                    <option value="Thesis">Thesis</option>
                    <option value="Laporan">Laporan</option>
                    <option value="Lainnya">Lainnya</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="create_deskripsi" class="form-label">Deskripsi</label>
              <textarea class="form-control" id="create_deskripsi" name="deskripsi" rows="3"
                placeholder="Deskripsi singkat tentang dokumen ini..."></textarea>
            </div>

            <div class="mb-3">
              <label for="create_link" class="form-label">Link Dokumen *</label>
              <input type="url" class="form-control" id="create_link" name="link" required
                placeholder="https://example.com/document.pdf">
              <div class="form-text">Masukkan URL lengkap dokumen (Google Drive, PDF online, dll)</div>
            </div>

            <!-- Preview Box -->
            <div class="preview-box" id="createPreview" style="display: none;">
              <h6 class="mb-2"><i class="fas fa-eye me-2"></i>Preview:</h6>
              <div class="document-preview">
                <strong id="previewJudul"></strong>
                <span class="badge ms-2" id="previewKategori"></span><br>
                <small class="text-muted" id="previewDeskripsi"></small><br>
                <a href="#" id="previewLink" target="_blank" class="text-decoration-none">
                  <i class="fas fa-external-link-alt me-1"></i>Lihat Dokumen
                </a>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              <i class="fas fa-times me-2"></i>Batal
            </button>
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
            <i class="fas fa-eye me-2"></i>Detail Dokumen
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="d-flex align-items-center mb-3">
                <h4 id="view_judul" class="text-primary mb-0 me-3"></h4>
                <span class="badge" id="view_kategori_badge"></span>
              </div>

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
          <a href="#" id="view_open_link" target="_blank" class="btn btn-success me-auto">
            <i class="fas fa-external-link-alt me-2"></i>Buka Link
          </a>
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
            <i class="fas fa-edit me-2"></i>Edit Dokumen
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form id="editForm">
          @csrf
          @method('PUT')
          <input type="hidden" id="edit_document_id">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-8">
                <div class="mb-3">
                  <label for="edit_judul" class="form-label">Judul Dokumen *</label>
                  <input type="text" class="form-control" id="edit_judul" name="judul" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="edit_kategori" class="form-label">Kategori *</label>
                  <select class="form-select" id="edit_kategori" name="kategori" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Jurnal">Jurnal</option>
                    <option value="Publikasi">Publikasi</option>
                    <option value="Buku">Buku</option>
                    <option value="Artikel">Artikel</option>
                    <option value="Thesis">Thesis</option>
                    <option value="Laporan">Laporan</option>
                    <option value="Lainnya">Lainnya</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="edit_deskripsi" class="form-label">Deskripsi</label>
              <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="3"></textarea>
            </div>

            <div class="mb-3">
              <label for="edit_link" class="form-label">Link Dokumen *</label>
              <input type="url" class="form-control" id="edit_link" name="link" required>
              <div class="form-text">Masukkan URL lengkap dokumen (Google Drive, PDF online, dll)</div>
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
          <p>Apakah Anda yakin ingin menghapus dokumen <strong id="delete_document_judul"></strong>?</p>
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
      // Preview functionality for create form
      const createJudul = document.getElementById('create_judul');
      const createKategori = document.getElementById('create_kategori');
      const createDeskripsi = document.getElementById('create_deskripsi');
      const createLink = document.getElementById('create_link');
      const createPreview = document.getElementById('createPreview');

      function updatePreview() {
        const judul = createJudul.value;
        const kategori = createKategori.value;
        const deskripsi = createDeskripsi.value;
        const link = createLink.value;

        if (judul || kategori || deskripsi || link) {
          document.getElementById('previewJudul').textContent = judul || 'Judul Dokumen';

          const kategoriSpan = document.getElementById('previewKategori');
          kategoriSpan.textContent = kategori || 'Kategori';
          kategoriSpan.className = `badge ${getCategoryClass(kategori)}`;

          document.getElementById('previewDeskripsi').textContent = deskripsi || 'Deskripsi dokumen';
          document.getElementById('previewLink').href = link || '#';

          createPreview.style.display = 'block';
        } else {
          createPreview.style.display = 'none';
        }
      }

      function getCategoryClass(kategori) {
        switch (kategori) {
          case 'Jurnal':
            return 'bg-primary';
          case 'Publikasi':
            return 'bg-success';
          case 'Buku':
            return 'bg-info';
          case 'Artikel':
            return 'bg-warning text-dark';
          case 'Thesis':
            return 'bg-danger';
          case 'Laporan':
            return 'bg-dark';
          default:
            return 'bg-secondary';
        }
      }

      createJudul.addEventListener('input', updatePreview);
      createKategori.addEventListener('change', updatePreview);
      createDeskripsi.addEventListener('input', updatePreview);
      createLink.addEventListener('input', updatePreview);

      // Filter and Search functionality
      const categoryFilter = document.getElementById('categoryFilter');
      const searchInput = document.getElementById('searchInput');
      const resetFilter = document.getElementById('resetFilter');
      const table = document.getElementById('documentsTable');

      function filterTable() {
        const categoryValue = categoryFilter.value.toLowerCase();
        const searchValue = searchInput.value.toLowerCase();
        const rows = table.querySelectorAll('tbody tr');

        rows.forEach(row => {
          if (row.cells.length > 1) {
            const kategori = row.cells[2].textContent.toLowerCase();
            const judul = row.cells[1].textContent.toLowerCase();
            const deskripsi = row.cells[3].textContent.toLowerCase();

            const matchCategory = !categoryValue || kategori.includes(categoryValue);
            const matchSearch = !searchValue ||
              judul.includes(searchValue) ||
              deskripsi.includes(searchValue);

            row.style.display = matchCategory && matchSearch ? '' : 'none';
          }
        });
      }

      categoryFilter.addEventListener('change', filterTable);
      searchInput.addEventListener('input', filterTable);
      resetFilter.addEventListener('click', () => {
        categoryFilter.value = '';
        searchInput.value = '';
        filterTable();
      });

      // Create Form Submit
      document.getElementById('createForm').addEventListener('submit', function(e) {
        e.preventDefault();
        showLoading(true);

        const formData = new FormData(this);

        fetch('{{ route('admin.external-documents.store') }}', {
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
          const documentId = this.getAttribute('data-id');
          showLoading(true);

          fetch(`{{ route('admin.external-documents.index') }}/${documentId}`)
            .then(response => response.json())
            .then(data => {
              showLoading(false);
              document.getElementById('view_judul').textContent = data.judul;

              const kategoriSpan = document.getElementById('view_kategori_badge');
              kategoriSpan.textContent = data.kategori;
              kategoriSpan.className = `badge ${getCategoryClass(data.kategori)}`;

              document.getElementById('view_deskripsi').textContent = data.deskripsi || '-';
              document.getElementById('view_link').href = data.link;
              document.getElementById('view_link_text').textContent = data.link;
              document.getElementById('view_open_link').href = data.link;
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
          const documentId = this.getAttribute('data-id');
          showLoading(true);

          fetch(`{{ route('admin.external-documents.index') }}/${documentId}/edit`)
            .then(response => response.json())
            .then(data => {
              showLoading(false);
              document.getElementById('edit_document_id').value = data.id;
              document.getElementById('edit_judul').value = data.judul;
              document.getElementById('edit_kategori').value = data.kategori;
              document.getElementById('edit_deskripsi').value = data.deskripsi || '';
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

        const documentId = document.getElementById('edit_document_id').value;
        const formData = new FormData(this);

        fetch(`{{ route('admin.external-documents.index') }}/${documentId}`, {
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
          const documentId = this.getAttribute('data-id');
          const documentJudul = this.getAttribute('data-judul');

          document.getElementById('delete_document_judul').textContent = documentJudul;
          document.getElementById('confirmDelete').setAttribute('data-id', documentId);
        });
      });

      // Confirm Delete
      document.getElementById('confirmDelete').addEventListener('click', function() {
        const documentId = this.getAttribute('data-id');
        showLoading(true);

        fetch(`{{ route('admin.external-documents.index') }}/${documentId}`, {
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
