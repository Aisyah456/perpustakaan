@extends('admin.layouts.app')

@section('title', 'Admin - Menu Konsultasi')

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
        <h1 class="main-title mb-0">Admin - Konsultasi</h1>
        <div>
          <a href="{{ route('Home') }}" class="btn btn-outline-secondary me-2">
            <i class="fas fa-eye"></i> Lihat Halaman Publik
          </a>
        </div>
      </div>
    </div>
  </div>

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

          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="table-success">
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>NIM/NIDN</th>
                  <th>Email</th>
                  <th>No HP</th>
                  <th>Topik</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($konsultasis as $index => $k)
                  <tr>
                    <td>{{ $konsultasis->firstItem() + $index }}</td>
                    <td>{{ $k->nama }}</td>
                    <td>{{ $k->nim_nidn }}</td>
                    <td>{{ $k->email }}</td>
                    <td>{{ $k->no_hp ?? '-' }}</td>
                    <td>{{ Str::limit($k->topik_konsultasi, 40) }}</td>
                    <td>
                      <span
                        class="badge 
                      {{ $k->status == 'pending' ? 'bg-warning' : ($k->status == 'diproses' ? 'bg-primary' : ($k->status == 'selesai' ? 'bg-success' : 'bg-danger')) }}">
                        {{ ucfirst($k->status) }}
                      </span>
                    </td>
                    <td>
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-info view-btn" data-id="{{ $k->id }}"
                          data-bs-toggle="modal" data-bs-target="#viewModal" title="Lihat Detail">
                          <i class="fas fa-eye"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-primary edit-btn"
                          data-id="{{ $k->id }}" data-bs-toggle="modal" data-bs-target="#editModal"
                          title="Edit">
                          <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-danger delete-btn"
                          data-id="{{ $k->id }}" data-title="{{ $k->nama }}" data-bs-toggle="modal"
                          data-bs-target="#deleteModal" title="Hapus">
                          <i class="fas fa-trash"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="8" class="text-center text-muted py-4">
                      <i class="fas fa-comments fa-3x mb-3 text-muted"></i>
                      <p>Belum ada data konsultasi</p>
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          @if ($konsultasis->hasPages())
            <div class="d-flex justify-content-center mt-4">
              {{ $konsultasis->appends(request()->query())->links() }}
            </div>
          @endif

        </div>
      </div>
    </div>
  </div>

  <!-- View Modal -->
  <div class="modal fade" id="viewModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail Konsultasi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p><strong>Nama:</strong> <span id="view-nama"></span></p>
          <p><strong>NIM/NIDN:</strong> <span id="view-nim"></span></p>
          <p><strong>Email:</strong> <span id="view-email"></span></p>
          <p><strong>No HP:</strong> <span id="view-nohp"></span></p>
          <p><strong>Topik Konsultasi:</strong> <span id="view-topik"></span></p>
          <p><strong>Pesan:</strong> <span id="view-pesan"></span></p>
          <p><strong>Status:</strong> <span id="view-status"></span></p>
          <p><strong>Catatan Admin:</strong> <span id="view-catatan"></span></p>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit & Delete Modals -->
  <div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
      <form method="POST" id="editForm" class="modal-content">
        @csrf @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title">Edit Konsultasi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="edit-id">
          <div class="mb-2"><label>Nama</label><input type="text" name="nama" id="edit-nama" class="form-control"
              required></div>
          <div class="mb-2"><label>NIM/NIDN</label><input type="text" name="nim_nidn" id="edit-nim"
              class="form-control" required></div>
          <div class="mb-2"><label>Email</label><input type="email" name="email" id="edit-email"
              class="form-control" required></div>
          <div class="mb-2"><label>No HP</label><input type="text" name="no_hp" id="edit-nohp"
              class="form-control"></div>
          <div class="mb-2"><label>Topik Konsultasi</label><input type="text" name="topik_konsultasi"
              id="edit-topik" class="form-control" required></div>
          <div class="mb-2"><label>Pesan</label>
            <textarea name="pesan" id="edit-pesan" class="form-control"></textarea>
          </div>
          <div class="mb-2"><label>Status</label>
            <select name="status" id="edit-status" class="form-control">
              <option value="pending">Pending</option>
              <option value="diproses">Diproses</option>
              <option value="selesai">Selesai</option>
              <option value="ditolak">Ditolak</option>
            </select>
          </div>
          <div class="mb-2"><label>Catatan Admin</label>
            <textarea name="catatan_admin" id="edit-catatan" class="form-control"></textarea>
          </div>
        </div>
        <div class="modal-footer"><button type="submit" class="btn btn-primary">Update</button></div>
      </form>
    </div>
  </div>

  <div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
      <form method="POST" id="deleteForm" class="modal-content">
        @csrf @method('DELETE')
        <div class="modal-header">
          <h5 class="modal-title">Hapus Konsultasi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p>Yakin ingin menghapus <strong id="delete-title"></strong>?</p>
        </div>
        <div class="modal-footer"><button type="submit" class="btn btn-danger">Hapus</button></div>
      </form>
    </div>
  </div>

  <script>
    document.querySelectorAll('.view-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        const id = this.dataset.id;
        fetch(`/admin/konsultasi/${id}`)
          .then(res => res.json())
          .then(data => {
            document.getElementById('view-nama').textContent = data.nama;
            document.getElementById('view-nim').textContent = data.nim_nidn;
            document.getElementById('view-email').textContent = data.email;
            document.getElementById('view-nohp').textContent = data.no_hp ?? '-';
            document.getElementById('view-topik').textContent = data.topik_konsultasi;
            document.getElementById('view-pesan').textContent = data.pesan;
            document.getElementById('view-status').textContent = data.status;
            document.getElementById('view-catatan').textContent = data.catatan_admin ?? '-';
          });
      });
    });

    document.querySelectorAll('.edit-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        const id = this.dataset.id;
        fetch(`/admin/konsultasi/${id}`)
          .then(res => res.json())
          .then(data => {
            document.getElementById('editForm').action = `/admin/konsultasi/${id}`;
            document.getElementById('edit-nama').value = data.nama;
            document.getElementById('edit-nim').value = data.nim_nidn;
            document.getElementById('edit-email').value = data.email;
            document.getElementById('edit-nohp').value = data.no_hp ?? '';
            document.getElementById('edit-topik').value = data.topik_konsultasi;
            document.getElementById('edit-pesan').value = data.pesan;
            document.getElementById('edit-status').value = data.status;
            document.getElementById('edit-catatan').value = data.catatan_admin ?? '';
          });
      });
    });

    document.querySelectorAll('.delete-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        const id = this.dataset.id;
        const title = this.dataset.title;
        document.getElementById('deleteForm').action = `/admin/konsultasi/${id}`;
        document.getElementById('delete-title').textContent = title;
      });
    });
  </script>
@endsection
