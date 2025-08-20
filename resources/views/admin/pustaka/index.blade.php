@extends('admin.layouts.app')

@section('title', 'Admin - Dokumen Bebas Pustaka')

@section('styles')
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

    .table-responsive {
      max-height: 70vh;
      overflow-y: auto;
    }

    .text-wrap {
      word-wrap: break-word;
      white-space: normal;
    }

    .badge {
      font-size: 0.8rem;
    }
  </style>
@endsection

@section('content')
  <div class="container-fluid">
    <!-- Header Section -->
    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h1 class="main-title mb-0">Admin - Dokumen Bebas Pustaka</h1>
          <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
              <i class="fas fa-plus"></i> Tambah Pengajuan
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="header-admin"></div>
    <!-- Alert Container -->
    <div id="alert-container">
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
    </div>

    <!-- Main Content Card -->
    <div class="row">
      <div class="col-12">
        <div class="card shadow-lg border-0 rounded-3">
          <div class="card-body">
            <!-- Data Table -->
            <div class="table-responsive">
              <table class="table table-hover align-middle mb-0" id="documentsTable">
                <thead class="table-success text-center">
                  <tr>
                    <th width="5%">#</th>
                    <th width="15%">Nama</th>
                    <th width="10%">NIM</th>
                    <th width="12%">Fakultas</th>
                    <th width="12%">Prodi</th>
                    <th width="8%">Jenjang</th>
                    <th width="12%">Keperluan</th>
                    <th width="8%">Masuk</th>
                    <th width="8%">Lulus</th>
                    <th width="10%">Status</th>
                    <th width="15%">Berkas</th>
                    <th width="15%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($documents as $index => $item)
                    <tr>
                      <td class="text-center fw-bold">{{ $index + 1 }}</td>
                      <td>{{ $item->nama }}</td>
                      <td class="text-center">{{ $item->nim }}</td>
                      <td class="text-center">{{ $item->faculty->nama_fakultas ?? '-' }}</td>
                      <td class="text-center">{{ $item->major->nama_prodi ?? '-' }}</td>
                      <td class="text-center">{{ $item->jenjang }}</td>
                      <td class="text-center">{{ $item->keperluan }}</td>
                      <td class="text-center">{{ $item->tahun_masuk }}</td>
                      <td class="text-center">{{ $item->tahun_lulus }}</td>
                      <td class="text-center">
                        <span
                          class="badge rounded-pill px-3 py-2 
                      @if ($item->status == 'pending') bg-warning text-dark
                      @elseif($item->status == 'disetujui') bg-success
                      @elseif($item->status == 'ditolak') bg-danger
                      @else bg-secondary @endif">
                          {{ ucfirst($item->status) }}
                        </span>
                      </td>
                      <td class="text-center">
                        <div class="d-flex justify-content-center gap-2">
                          @if ($item->file_karya_ilmiah)
                            <a href="{{ asset('storage/' . $item->file_karya_ilmiah) }}"
                              class="btn btn-sm btn-outline-primary" target="_blank" title="File Karya Ilmiah">
                              <i class="fas fa-file-alt"></i>
                            </a>
                          @endif
                          @if ($item->scan_ktm)
                            <a href="{{ asset('storage/' . $item->scan_ktm) }}" class="btn btn-sm btn-outline-secondary"
                              target="_blank" title="Scan KTM">
                              <i class="fas fa-id-card"></i>
                            </a>
                          @endif
                          @if ($item->bukti_upload)
                            <a href="{{ asset('storage/' . $item->bukti_upload) }}"
                              class="btn btn-sm btn-outline-success" target="_blank" title="Bukti Upload">
                              <i class="fas fa-upload"></i>
                            </a>
                          @endif
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="btn-group" role="group">
                          <a href="{{ route('admin.pustaka.show', $item->id) }}" class="btn btn-sm btn-outline-info"
                            title="Detail">
                            <i class="fas fa-eye"></i>
                          </a>
                          <button type="button" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal"
                            data-bs-target="#editModal{{ $item->id }}" title="Edit">
                            <i class="fas fa-edit"></i>
                          </button>
                          <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $item->id }}" title="Hapus">
                            <i class="fas fa-trash"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="12" class="text-center text-muted py-5">
                        <i class="fas fa-folder-open fa-3x mb-3"></i>
                        <div>Belum ada data pengajuan.</div>
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
  </div>



  <!-- Modal Tambah Pengajuan -->
  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <form method="POST" action="{{ route('admin.pustaka.store') }}" enctype="multipart/form-data"
        class="modal-content" id="createForm">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="createModalLabel">
            <i class="fas fa-plus-circle me-2"></i>Tambah Pengajuan Baru
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="row g-3">
            <!-- Data Pribadi -->
            <div class="col-12">
              <h6 class="border-bottom pb-2 mb-3"><i class="fas fa-user me-2"></i>Data Pribadi</h6>
            </div>
            <div class="col-md-6">
              <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
              <input type="text" name="nama" id="nama" class="form-control" required
                value="{{ old('nama') }}" placeholder="Masukkan nama lengkap">
              @error('nama')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="nim" class="form-label">NIM <span class="text-danger">*</span></label>
              <input type="text" name="nim" id="nim" class="form-control" required
                value="{{ old('nim') }}" placeholder="Masukkan NIM">
              @error('nim')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="no_hp" class="form-label">No. HP <span class="text-danger">*</span></label>
              <input type="text" name="no_hp" id="no_hp" class="form-control" required
                value="{{ old('no_hp') }}" placeholder="Masukkan nomor HP">
              @error('no_hp')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
              <input type="email" name="email" id="email" class="form-control" required
                value="{{ old('email') }}" placeholder="Masukkan email">
              @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <!-- Data Akademik -->
            <div class="col-12">
              <h6 class="border-bottom pb-2 mb-3 mt-3"><i class="fas fa-graduation-cap me-2"></i>Data Akademik</h6>
            </div>
            <div class="col-md-6">
              <label for="faculty_id" class="form-label">Fakultas <span class="text-danger">*</span></label>
              <select name="faculty_id" id="faculty_id" class="form-select" required>
                <option value="">-- Pilih Fakultas --</option>
                @foreach ($faculties as $faculty)
                  <option value="{{ $faculty->id }}" {{ old('faculty_id') == $faculty->id ? 'selected' : '' }}>
                    {{ $faculty->nama_fakultas }}
                  </option>
                @endforeach
              </select>
              @error('faculty_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="major_id" class="form-label">Program Studi <span class="text-danger">*</span></label>
              <select name="major_id" id="major_id" class="form-select" required>
                <option value="">-- Pilih Program Studi --</option>
                @foreach ($majors as $major)
                  <option value="{{ $major->id }}" {{ old('major_id') == $major->id ? 'selected' : '' }}>
                    {{ $major->nama_prodi }}
                  </option>
                @endforeach
              </select>
              @error('major_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-4">
              <label for="jenjang" class="form-label">Jenjang <span class="text-danger">*</span></label>
              <select name="jenjang" id="jenjang" class="form-select" required>
                <option value="">-- Pilih Jenjang --</option>
                <option value="D3" {{ old('jenjang') == 'D3' ? 'selected' : '' }}>D3</option>
                <option value="S1" {{ old('jenjang') == 'S1' ? 'selected' : '' }}>S1</option>
                <option value="S2" {{ old('jenjang') == 'S2' ? 'selected' : '' }}>S2</option>
              </select>
              @error('jenjang')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-4">
              <label for="tahun_masuk" class="form-label">Tahun Masuk <span class="text-danger">*</span></label>
              <input type="number" name="tahun_masuk" id="tahun_masuk" class="form-control" required
                value="{{ old('tahun_masuk') }}" min="2000" max="{{ date('Y') }}">
              @error('tahun_masuk')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-4">
              <label for="tahun_lulus" class="form-label">Tahun Lulus <span class="text-danger">*</span></label>
              <input type="number" name="tahun_lulus" id="tahun_lulus" class="form-control" required
                value="{{ old('tahun_lulus') }}" min="2000" max="{{ date('Y') + 10 }}">
              @error('tahun_lulus')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-12">
              <label for="keperluan" class="form-label">Keperluan <span class="text-danger">*</span></label>
              <textarea name="keperluan" id="keperluan" class="form-control" rows="3" required
                placeholder="Jelaskan keperluan pengajuan">{{ old('keperluan') }}</textarea>
              @error('keperluan')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <!-- Upload Berkas -->
            <div class="col-12">
              <h6 class="border-bottom pb-2 mb-3 mt-3"><i class="fas fa-file-upload me-2"></i>Upload Berkas</h6>
            </div>
            <div class="col-md-4">
              <label for="file_karya_ilmiah" class="form-label">File Karya Ilmiah <span
                  class="text-danger">*</span></label>
              <input type="file" name="file_karya_ilmiah" id="file_karya_ilmiah" class="form-control"
                accept=".pdf" required>
              <small class="text-muted">Format: PDF, Maksimal 10MB</small>
              @error('file_karya_ilmiah')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-4">
              <label for="scan_ktm" class="form-label">Scan KTM <span class="text-danger">*</span></label>
              <input type="file" name="scan_ktm" id="scan_ktm" class="form-control" accept=".pdf,.jpg,.jpeg,.png"
                required>
              <small class="text-muted">Format: PDF, JPG, PNG. Maksimal 5MB</small>
              @error('scan_ktm')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-4">
              <label for="bukti_upload" class="form-label">Bukti Upload (Opsional)</label>
              <input type="file" name="bukti_upload" id="bukti_upload" class="form-control"
                accept=".pdf,.jpg,.jpeg,.png">
              <small class="text-muted">Format: PDF, JPG, PNG. Maksimal 5MB</small>
              @error('bukti_upload')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="fas fa-times me-2"></i>Batal
          </button>
          <button type="submit" class="btn btn-success">
            <i class="fas fa-save me-2"></i>Simpan Pengajuan
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Edit untuk setiap item -->
  @foreach ($documents as $item)
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
      aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <form method="POST" action="{{ route('admin.pustaka.update', $item->id) }}" enctype="multipart/form-data"
          class="modal-content">
          @csrf
          @method('PUT')
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel{{ $item->id }}">
              <i class="fas fa-edit me-2"></i>Edit Pengajuan - {{ $item->nama }}
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="row g-3">
              <!-- Data Pribadi -->
              <div class="col-12">
                <h6 class="border-bottom pb-2 mb-3"><i class="fas fa-user me-2"></i>Data Pribadi</h6>
              </div>
              <div class="col-md-6">
                <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" name="nama" value="{{ $item->nama }}" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">NIM <span class="text-danger">*</span></label>
                <input type="text" name="nim" value="{{ $item->nim }}" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">No. HP <span class="text-danger">*</span></label>
                <input type="text" name="no_hp" value="{{ $item->no_hp }}" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" name="email" value="{{ $item->email }}" class="form-control" required>
              </div>

              <!-- Data Akademik -->
              <div class="col-12">
                <h6 class="border-bottom pb-2 mb-3 mt-3"><i class="fas fa-graduation-cap me-2"></i>Data Akademik</h6>
              </div>
              <div class="col-md-6">
                <label class="form-label">Fakultas <span class="text-danger">*</span></label>
                <select name="faculty_id" class="form-select" required>
                  <option value="">-- Pilih Fakultas --</option>
                  @foreach ($faculties as $faculty)
                    <option value="{{ $faculty->id }}" {{ $item->faculty_id == $faculty->id ? 'selected' : '' }}>
                      {{ $faculty->nama_fakultas }}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Program Studi <span class="text-danger">*</span></label>
                <select name="major_id" class="form-select" required>
                  <option value="">-- Pilih Program Studi --</option>
                  @foreach ($majors as $major)
                    <option value="{{ $major->id }}" {{ $item->major_id == $major->id ? 'selected' : '' }}>
                      {{ $major->nama_prodi }}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-4">
                <label class="form-label">Jenjang <span class="text-danger">*</span></label>
                <select name="jenjang" class="form-select" required>
                  <option value="D3" {{ $item->jenjang == 'D3' ? 'selected' : '' }}>D3</option>
                  <option value="S1" {{ $item->jenjang == 'S1' ? 'selected' : '' }}>S1</option>
                  <option value="S2" {{ $item->jenjang == 'S2' ? 'selected' : '' }}>S2</option>
                </select>
              </div>
              <div class="col-md-4">
                <label class="form-label">Tahun Masuk <span class="text-danger">*</span></label>
                <input type="number" name="tahun_masuk" value="{{ $item->tahun_masuk }}" class="form-control"
                  required>
              </div>
              <div class="col-md-4">
                <label class="form-label">Tahun Lulus <span class="text-danger">*</span></label>
                <input type="number" name="tahun_lulus" value="{{ $item->tahun_lulus }}" class="form-control"
                  required>
              </div>
              <div class="col-12">
                <label class="form-label">Keperluan <span class="text-danger">*</span></label>
                <textarea name="keperluan" class="form-control" rows="3" required>{{ $item->keperluan }}</textarea>
              </div>

              <!-- Status -->
              <div class="col-12">
                <h6 class="border-bottom pb-2 mb-3 mt-3"><i class="fas fa-check-circle me-2"></i>Status</h6>
              </div>
              <div class="col-md-6">
                <label class="form-label">Status Pengajuan <span class="text-danger">*</span></label>
                <select name="status" class="form-select" required>
                  <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>
                    <i class="fas fa-clock"></i> Pending
                  </option>
                  <option value="disetujui" {{ $item->status == 'disetujui' ? 'selected' : '' }}>
                    <i class="fas fa-check"></i> Disetujui
                  </option>
                  <option value="ditolak" {{ $item->status == 'ditolak' ? 'selected' : '' }}>
                    <i class="fas fa-times"></i> Ditolak
                  </option>
                </select>
              </div>

              <!-- Upload Berkas -->
              <div class="col-12">
                <h6 class="border-bottom pb-2 mb-3 mt-3"><i class="fas fa-file-upload me-2"></i>Upload Berkas Baru
                  (Opsional)</h6>
              </div>
              <div class="col-md-4">
                <label class="form-label">File Karya Ilmiah</label>
                <input type="file" name="file_karya_ilmiah" class="form-control" accept=".pdf">
                @if ($item->file_karya_ilmiah)
                  <small class="text-success">
                    <i class="fas fa-file-pdf"></i> File saat ini:
                    <a href="{{ asset('storage/' . $item->file_karya_ilmiah) }}" target="_blank">Lihat</a>
                  </small>
                @endif
              </div>
              <div class="col-md-4">
                <label class="form-label">Scan KTM</label>
                <input type="file" name="scan_ktm" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                @if ($item->scan_ktm)
                  <small class="text-success">
                    <i class="fas fa-file"></i> File saat ini:
                    <a href="{{ asset('storage/' . $item->scan_ktm) }}" target="_blank">Lihat</a>
                  </small>
                @endif
              </div>
              <div class="col-md-4">
                <label class="form-label">Bukti Upload</label>
                <input type="file" name="bukti_upload" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                @if ($item->bukti_upload)
                  <small class="text-success">
                    <i class="fas fa-file"></i> File saat ini:
                    <a href="{{ asset('storage/' . $item->bukti_upload) }}" target="_blank">Lihat</a>
                  </small>
                @endif
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              <i class="fas fa-times me-2"></i>Batal
            </button>
            <button type="submit" class="btn btn-success">
              <i class="fas fa-save me-2"></i>Simpan Perubahan
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- Modal Delete untuk setiap item -->
    <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
      aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">
              <i class="fas fa-trash me-2"></i>Konfirmasi Hapus
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body text-center">
            <i class="fas fa-exclamation-triangle text-warning fa-3x mb-3"></i>
            <h5>Apakah Anda yakin?</h5>
            <p class="mb-0">Data pengajuan <strong>{{ $item->nama }}</strong> akan dihapus permanen dan tidak
              dapat
              dikembalikan.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              <i class="fas fa-times me-2"></i>Batal
            </button>
            <form action="{{ route('admin.pustaka.destroy', $item->id) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash me-2"></i>Ya, Hapus!
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  @endforeach

  <!-- Loading Overlay -->
  {{-- <div class="loading-overlay" id="loadingOverlay">
    <div class="spinner-container">
      <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
      <p class="mt-2 mb-0">Memproses...</p>
    </div>
  </div> --}}
@endsection

@section('scripts')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Form submission with loading overlay
      const forms = document.querySelectorAll('form');
      forms.forEach(form => {
        form.addEventListener('submit', function() {
          // Show loading overlay
          document.getElementById('loadingOverlay').classList.add('show');
        });
      });

      // File size validation
      function validateFileSize(input, maxSize = 10) {
        input.addEventListener('change', function() {
          const file = this.files[0];
          if (file) {
            const fileSize = file.size / 1024 / 1024; // Convert to MB
            if (fileSize > maxSize) {
              alert(`Ukuran file terlalu besar. Maksimal ${maxSize}MB`);
              this.value = '';
              return false;
            }
          }
        });
      }

      // Apply file size validation
      const karyaIlmiahInputs = document.querySelectorAll('input[name="file_karya_ilmiah"]');
      const ktmInputs = document.querySelectorAll('input[name="scan_ktm"]');
      const buktiInputs = document.querySelectorAll('input[name="bukti_upload"]');

      karyaIlmiahInputs.forEach(input => validateFileSize(input, 10)); // 10MB for karya ilmiah
      ktmInputs.forEach(input => validateFileSize(input, 5)); // 5MB for KTM
      buktiInputs.forEach(input => validateFileSize(input, 5)); // 5MB for bukti upload

      // Dynamic major loading based on faculty selection
      const facultySelects = document.querySelectorAll('select[name="faculty_id"]');
      facultySelects.forEach(select => {
        select.addEventListener('change', function() {
          const facultyId = this.value;
          const majorSelect = this.closest('.modal-body, .row').querySelector('select[name="major_id"]');

          if (majorSelect) {
            // Clear current options
            majorSelect.innerHTML = '<option value="">-- Pilih Program Studi --</option>';

            if (facultyId) {
              // You can implement AJAX call here to load majors based on faculty
              // For now, we'll keep the existing options
              @foreach ($majors as $major)
                if ({{ $major->faculty_id }} == facultyId) {
                  majorSelect.innerHTML +=
                    '<option value="{{ $major->id }}">{{ $major->nama_prodi }}</option>';
                }
              @endforeach
            }
          }
        });
      });

      // Auto-hide alerts after 5 seconds
      const alerts = document.querySelectorAll('.alert');
      alerts.forEach(alert => {
        setTimeout(() => {
          if (alert.classList.contains('show')) {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
          }
        }, 5000);
      });

      // Reset form when create modal is closed
      const createModal = document.getElementById('createModal');
      if (createModal) {
        createModal.addEventListener('hidden.bs.modal', function() {
          const form = this.querySelector('form');
          if (form) {
            form.reset();
            // Clear any validation errors
            const invalidInputs = form.querySelectorAll('.is-invalid');
            invalidInputs.forEach(input => input.classList.remove('is-invalid'));
            const invalidFeedbacks = form.querySelectorAll('.invalid-feedback');
            invalidFeedbacks.forEach(feedback => feedback.style.display = 'none');
          }
        });
      }

      // DataTable initialization (if you want to add sorting/searching)
      const table = document.getElementById('documentsTable');
      if (table && typeof DataTable !== 'undefined') {
        new DataTable(table, {
          responsive: true,
          pageLength: 25,
          language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json'
          },
          columnDefs: [{
              orderable: false,
              targets: [10, 11]
            } // Disable sorting for Berkas and Aksi columns
          ]
        });
      }

      // Confirmation for delete actions
      const deleteButtons = document.querySelectorAll('.delete-btn');
      deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
          const itemName = this.closest('tr').querySelector('td:nth-child(2)').textContent;
          const modal = document.querySelector(this.getAttribute('data-bs-target'));
          if (modal) {
            const nameElement = modal.querySelector('.modal-body strong');
            if (nameElement) {
              nameElement.textContent = itemName;
            }
          }
        });
      });

      // Status badge color update for edit forms
      const statusSelects = document.querySelectorAll('select[name="status"]');
      statusSelects.forEach(select => {
        select.addEventListener('change', function() {
          // You can add visual feedback here when status changes
          const value = this.value;
          let badgeClass = 'bg-secondary';

          switch (value) {
            case 'pending':
              badgeClass = 'bg-warning text-dark';
              break;
            case 'disetujui':
              badgeClass = 'bg-success';
              break;
            case 'ditolak':
              badgeClass = 'bg-danger';
              break;
          }

          // Update visual feedback if needed
          this.className = `form-select ${badgeClass}`;
        });
      });

      // Year validation
      const yearInputs = document.querySelectorAll('input[name="tahun_masuk"], input[name="tahun_lulus"]');
      yearInputs.forEach(input => {
        input.addEventListener('change', function() {
          const currentYear = new Date().getFullYear();
          const inputYear = parseInt(this.value);

          if (this.name === 'tahun_masuk') {
            if (inputYear < 2000 || inputYear > currentYear) {
              alert('Tahun masuk tidak valid');
              this.value = '';
            }
          } else if (this.name === 'tahun_lulus') {
            if (inputYear < 2000 || inputYear > currentYear + 10) {
              alert('Tahun lulus tidak valid');
              this.value = '';
            }
          }
        });
      });

      // Phone number formatting
      const phoneInputs = document.querySelectorAll('input[name="no_hp"]');
      phoneInputs.forEach(input => {
        input.addEventListener('input', function() {
          // Remove non-numeric characters
          let value = this.value.replace(/\D/g, '');

          // Ensure it starts with 0 or +62
          if (value.length > 0 && !value.startsWith('0') && !value.startsWith('62')) {
            value = '0' + value;
          }

          this.value = value;
        });
      });

      // NIM validation (basic format check)
      const nimInputs = document.querySelectorAll('input[name="nim"]');
      nimInputs.forEach(input => {
        input.addEventListener('blur', function() {
          const nim = this.value;
          // Basic NIM validation (adjust according to your institution's format)
          if (nim.length < script 8 || nim.length > 15) {
            this.setCustomValidity('NIM harus terdiri dari 8-15 karakter');
          } else {
            this.setCustomValidity('');
          }
        });
      });

      // Enhanced file type validation
      function validateFileType(input, allowedTypes) {
        input.addEventListener('change', function() {
          const file = this.files[0];
          if (file) {
            const fileType = file.type;
            const fileName = file.name.toLowerCase();
            const validTypes = allowedTypes.some(type => {
              if (type === 'pdf') return fileType === 'application/pdf' || fileName.endsWith('.pdf');
              if (type === 'jpg') return fileType === 'image/jpeg' || fileName.endsWith('.jpg') || fileName
                .endsWith('.jpeg');
              if (type === 'png') return fileType === 'image/png' || fileName.endsWith('.png');
              return false;
            });

            if (!validTypes) {
              alert(`Format file tidak didukung. Gunakan: ${allowedTypes.join(', ').toUpperCase()}`);
              this.value = '';
              return false;
            }
          }
        });
      }

      // Apply file type validation
      karyaIlmiahInputs.forEach(input => validateFileType(input, ['pdf']));
      ktmInputs.forEach(input => validateFileType(input, ['pdf', 'jpg', 'png']));
      buktiInputs.forEach(input => validateFileType(input, ['pdf', 'jpg', 'png']));
    });

    // Utility function to show custom alerts
    function showAlert(message, type = 'success') {
      const alertContainer = document.getElementById('alert-container');
      const alertHtml = `
        <div class="alert alert-${type} alert-dismissible fade show" role="alert">
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} me-2"></i>
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    `;

      alertContainer.insertAdjacentHTML('beforeend', alertHtml);

      // Auto-hide after 5 seconds
      setTimeout(() => {
        const alerts = alertContainer.querySelectorAll('.alert');
        if (alerts.length > 0) {
          const bsAlert = new bootstrap.Alert(alerts[alerts.length - 1]);
          bsAlert.close();
        }
      }, 5000);
    }

    // Function to format file size
    function formatFileSize(bytes) {
      if (bytes === 0) return '0 Bytes';
      const k = 1024;
      const sizes = ['Bytes', 'KB', 'MB', 'GB'];
      const i = Math.floor(Math.log(bytes) / Math.log(k));
      return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }
  </script>
@endsection
