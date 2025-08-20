@extends('admin.layouts.app')

@section('title', 'Admin - List Artikel')

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

  .article-preview {
    color: #2d5a4a;
    position: relative;
    padding-left: 15px;
  }

  .article-preview::before {
    content: "📰";
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

  .admin-badge {
    background-color: #e9ecef;
    color: #495057;
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
    border-radius: 0.375rem;
  }
</style>

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="main-title mb-0">Admin - List Artikel</h1>
        <div>
          <a href="{{ route('artikel.index') }}" class="btn btn-outline-secondary me-2">
            <i class="fas fa-eye"></i> Lihat Halaman Publik
          </a>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="fas fa-plus"></i> Tambah Artikel
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="header-admin"></div>
  {{-- 
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('admin.artikel.index') }}">
        <i class="fas fa-newspaper"></i> Admin Artikel
      </a>
      <div class="navbar-nav ms-auto">
        <a class="nav-link" href="{{ route('artikel.index') }}" target="_blank">
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

          <!-- Filter Section -->
          <div class="filter-section">
            <form method="GET" action="{{ route('admin.artikel.index') }}" class="row g-3">
              <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Cari artikel..."
                  value="{{ request('search') }}">
              </div>
              <div class="col-md-3">
                <select name="category" class="form-select">
                  <option value="">Semua Kategori</option>
                  <option value="Berita" {{ request('category') == 'Berita' ? 'selected' : '' }}>Berita</option>
                  <option value="Tutorial" {{ request('category') == 'Tutorial' ? 'selected' : '' }}>Tutorial</option>
                  <option value="Tips" {{ request('category') == 'Tips' ? 'selected' : '' }}>Tips</option>
                  <option value="Pengumuman" {{ request('category') == 'Pengumuman' ? 'selected' : '' }}>Pengumuman
                  </option>
                </select>
              </div>
              <div class="col-md-3">
                <select name="admin" class="form-select">
                  <option value="">Semua Admin</option>
                  @foreach ($artikels->pluck('admin')->unique() as $admin)
                    <option value="{{ $admin }}" {{ request('admin') == $admin ? 'selected' : '' }}>
                      {{ $admin }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">
                  <i class="fas fa-search"></i> Filter
                </button>
              </div>
            </form>
          </div>

          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="documentsTable">
              <thead class="table-success text-center">
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">Judul</th>
                  <th class="text-center">Tanggal</th>
                  <th class="text-center">Admin</th>
                  <th class="text-center">Kategori</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($artikels as $index => $artikel)
                  <tr>
                    <td>{{ $artikels->firstItem() + $index }}</td>
                    <td>
                      <div class="d-flex align-items-center">
                        <i class="fas fa-newspaper text-primary me-2"></i>
                        <div>
                          <strong>{{ Str::limit($artikel->judul, 50) }}</strong>
                          @if ($artikel->featured ?? false)
                            <span class="badge bg-warning text-dark ms-1">Featured</span>
                          @endif
                        </div>
                      </div>
                    </td>
                    <td>
                      <small class="text-muted">
                        <i class="fas fa-calendar-alt me-1"></i>
                        {{ \Carbon\Carbon::parse($artikel->tanggal)->format('d M Y') }}
                      </small>
                    </td>
                    <td>
                      <span class="admin-badge">
                        <i class="fas fa-user me-1"></i>
                        {{ $artikel->admin }}
                      </span>
                    </td>
                    <td>
                      <span
                        class="badge category-badge 
                        @switch($artikel->category)
                          @case('Berita') bg-primary @break
                          @case('Tutorial') bg-success @break
                          @case('Tips') bg-info @break
                          @case('Pengumuman') bg-warning text-dark @break
                          @default bg-secondary
                        @endswitch">
                        {{ $artikel->category }}
                      </span>
                    </td>
                    <td>
                      <span
                        class="badge {{ ($artikel->status ?? 'published') == 'published' ? 'bg-success' : 'bg-secondary' }}">
                        {{ ucfirst($artikel->status ?? 'published') }}
                      </span>
                    </td>
                    <td>
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-sm btn-outline-info view-btn" data-id="{{ $artikel->id }}"
                          data-bs-toggle="modal" data-bs-target="#viewModal" title="Lihat Detail">
                          <i class="fas fa-eye"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-primary edit-btn"
                          data-id="{{ $artikel->id }}" data-bs-toggle="modal" data-bs-target="#editModal"
                          title="Edit">
                          <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-danger delete-btn"
                          data-id="{{ $artikel->id }}" data-judul="{{ $artikel->judul }}" data-bs-toggle="modal"
                          data-bs-target="#deleteModal" title="Hapus">
                          <i class="fas fa-trash"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="7" class="text-center text-muted py-4">
                      <i class="fas fa-newspaper fa-3x mb-3 text-muted"></i>
                      <p>Belum ada artikel</p>
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          @if ($artikels->hasPages())
            <div class="d-flex justify-content-center mt-4">
              {{ $artikels->appends(request()->query())->links() }}
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
            <i class="fas fa-plus me-2"></i>Tambah Artikel Baru
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form id="createForm">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-md-8">
                <div class="mb-3">
                  <label for="create_judul" class="form-label">Judul Artikel *</label>
                  <input type="text" class="form-control" id="create_judul" name="judul" required
                    placeholder="Masukkan judul artikel">
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="create_category" class="form-label">Kategori *</label>
                  <select class="form-select" id="create_category" name="category" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Berita">Berita</option>
                    <option value="Tutorial">Tutorial</option>
                    <option value="Tips">Tips</option>
                    <option value="Pengumuman">Pengumuman</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="create_tanggal" class="form-label">Tanggal *</label>
                  <input type="date" class="form-control" id="create_tanggal" name="tanggal"
                    value="{{ date('Y-m-d') }}" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="create_admin" class="form-label">Admin *</label>
                  <input type="text" class="form-control" id="create_admin" name="admin"
                    value="{{ auth()->user()->name ?? 'Admin' }}" required>
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="create_konten" class="form-label">Konten Artikel</label>
              <textarea class="form-control" id="create_konten" name="konten" rows="5"
                placeholder="Tulis konten artikel di sini..."></textarea>
            </div>

            <!-- Preview Box -->
            <div class="preview-box" id="createPreview" style="display: none;">
              <h6 class="mb-2"><i class="fas fa-eye me-2"></i>Preview:</h6>
              <div class="article-preview">
                <strong id="previewJudul"></strong>
                <span class="badge ms-2" id="previewKategori"></span><br>
                <small class="text-muted">
                  <i class="fas fa-calendar-alt me-1"></i><span id="previewTanggal"></span> |
                  <i class="fas fa-user me-1"></i><span id="previewAdmin"></span>
                </small><br>
                <p class="mt-2 mb-0" id="previewKonten"></p>
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
            <i class="fas fa-eye me-2"></i>Detail Artikel
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

              <div class="row mb-3">
                <div class="col-md-6">
                  <label class="form-label">Tanggal:</label>
                  <p class="text-muted" id="view_tanggal"></p>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Admin:</label>
                  <p class="text-muted" id="view_admin"></p>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label">Konten:</label>
                <div id="view_konten" class="text-muted"></div>
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
            <i class="fas fa-edit me-2"></i>Edit Artikel
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form id="editForm">
          @csrf
          @method('PUT')
          <input type="hidden" id="edit_artikel_id">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-8">
                <div class="mb-3">
                  <label for="edit_judul" class="form-label">Judul Artikel *</label>
                  <input type="text" class="form-control" id="edit_judul" name="judul" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="edit_category" class="form-label">Kategori *</label>
                  <select class="form-select" id="edit_category" name="category" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Berita">Berita</option>
                    <option value="Tutorial">Tutorial</option>
                    <option value="Tips">Tips</option>
                    <option value="Pengumuman">Pengumuman</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="edit_tanggal" class="form-label">Tanggal *</label>
                  <input type="date" class="form-control" id="edit_tanggal" name="tanggal" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="edit_admin" class="form-label">Admin *</label>
                  <input type="text" class="form-control" id="edit_admin" name="admin" required>
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="edit_konten" class="form-label">Konten Artikel</label>
              <textarea class="form-control" id="edit_konten" name="konten" rows="5"></textarea>
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
          <p>Apakah Anda yakin ingin menghapus artikel <strong id="delete_artikel_judul"></strong>?</p>
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
      const createCategory = document.getElementById('create_category');
      const createTanggal = document.getElementById('create_tanggal');
      const createAdmin = document.getElementById('create_admin');
      const createKonten = document.getElementById('create_konten');
      const createPreview = document.getElementById('createPreview');

      function updatePreview() {
        const judul = createJudul.value;
        const category = createCategory.value;
        const tanggal = createTanggal.value;
        const admin = createAdmin.value;
        const konten = createKonten.value;

        if (judul || category || tanggal || admin || konten) {
          document.getElementById('previewJudul').textContent = judul || 'Judul Artikel';

          const categorySpan = document.getElementById('previewKategori');
          categorySpan.textContent = category || 'Kategori';
          categorySpan.className = `badge ${getCategoryClass(category)}`;

          document.getElementById('previewTanggal').textContent = tanggal ? new Date(tanggal).toLocaleDateString(
            'id-ID') : 'Tanggal';
          document.getElementById('previewAdmin').textContent = admin || 'Admin';
          document.getElementById('previewKonten').textContent = konten ||
            'Konten artikel akan ditampilkan di sini...';

          createPreview.style.display = 'block';
        } else {
          createPreview.style.display = 'none';
        }
      }

      function getCategoryClass(category) {
        switch (category) {
          case 'Berita':
            return 'bg-primary';
          case 'Tutorial':
            return 'bg-success';
          case 'Tips':
            return 'bg-info';
          case 'Pengumuman':
            return 'bg-warning text-dark';
          default:
            return 'bg-secondary';
        }
      }

      createJudul.addEventListener('input', updatePreview);
      createCategory.addEventListener('change', updatePreview);
      createTanggal.addEventListener('change', updatePreview);
      createAdmin.addEventListener('input', updatePreview);
      createKonten.addEventListener('input', updatePreview);

      // Create Form Submit
      document.getElementById('createForm').addEventListener('submit', function(e) {
        e.preventDefault();
        showLoading(true);

        const formData = new FormData(this);

        fetch('{{ route('admin.artikel.store') }}', {
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
          const artikelId = this.getAttribute('data-id');
          showLoading(true);

          fetch(`{{ route('admin.artikel.index') }}/${artikelId}`)
            .then(response => response.json())
            .then(data => {
              showLoading(false);
              document.getElementById('view_judul').textContent = data.judul;

              const categorySpan = document.getElementById('view_kategori_badge');
              categorySpan.textContent = data.category;
              categorySpan.className = `badge ${getCategoryClass(data.category)}`;

              document.getElementById('view_tanggal').textContent = new Date(data.tanggal)
                .toLocaleDateString('id-ID');
              document.getElementById('view_admin').textContent = data.admin;
              document.getElementById('view_konten').textContent = data.konten || '-';
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
          const artikelId = this.getAttribute('data-id');
          showLoading(true);

          fetch(`{{ route('admin.artikel.index') }}/${artikelId}/edit`)
            .then(response => response.json())
            .then(data => {
              showLoading(false);
              document.getElementById('edit_artikel_id').value = data.id;
              document.getElementById('edit_judul').value = data.judul;
              document.getElementById('edit_category').value = data.category;
              document.getElementById('edit_tanggal').value = data.tanggal;
              document.getElementById('edit_admin').value = data.admin;
              document.getElementById('edit_konten').value = data.konten || '';
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

        const artikelId = document.getElementById('edit_artikel_id').value;
        const formData = new FormData(this);

        fetch(`{{ route('admin.artikel.index') }}/${artikelId}`, {
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
          const artikelId = this.getAttribute('data-id');
          const artikelJudul = this.getAttribute('data-judul');

          document.getElementById('delete_artikel_judul').textContent = artikelJudul;
          document.getElementById('confirmDelete').setAttribute('data-id', artikelId);
        });
      });

      // Confirm Delete
      document.getElementById('confirmDelete').addEventListener('click', function() {
        const artikelId = this.getAttribute('data-id');
        showLoading(true);

        fetch(`{{ route('admin.artikel.index') }}/${artikelId}`, {
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
