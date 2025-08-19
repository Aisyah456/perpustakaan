@extends('admin.layouts.app')

@section('title', 'Daftar Permintaan Turnitin')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="card-title mb-0">Daftar Permintaan Turnitin</h3>
              </div>
              <div class="col-auto">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                  <i class="fas fa-plus mr-1"></i> Tambah Permintaan
                </button>
              </div>
            </div>
          </div>

          <div class="card-body">
            @if (session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert">
                  <span>&times;</span>
                </button>
              </div>
            @endif

            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th>Nama</th>
                    <th>NIM/NIDN</th>
                    <th>Email</th>
                    <th>Fakultas/Prodi</th>
                    <th>Judul Naskah</th>
                    <th>Jenis Dokumen</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th width="15%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($turnitinRequests as $index => $request)
                    <tr>
                      <td>{{ $turnitinRequests->firstItem() + $index }}</td>
                      <td>{{ $request->nama }}</td>
                      <td>{{ $request->nim_nidn }}</td>
                      <td>{{ $request->email }}</td>
                      <td>{{ $request->fakultas_prodi }}</td>
                      <td>{{ Str::limit($request->judul_naskah, 50) }}</td>
                      <td>
                        <span class="badge {{ $request->jenis_document_badge }}">
                          {{ $request->jenis_dokumen }}
                        </span>
                      </td>
                      <td>
                        <span class="badge {{ $request->status_badge }}">
                          {{ $request->status_text }}
                        </span>
                      </td>
                      <td>{{ $request->created_at->format('d/m/Y H:i') }}</td>
                      <td>
                        <div class="btn-group" role="group">
                          <button type="button" class="btn btn-info btn-sm" title="Lihat"
                            onclick="showDetail({{ $request->id }})">
                            <i class="fas fa-eye"></i>
                          </button>
                          <button type="button" class="btn btn-warning btn-sm" title="Edit"
                            onclick="editRequest({{ $request->id }})">
                            <i class="fas fa-edit"></i>
                          </button>
                          <button type="button" class="btn btn-danger btn-sm" title="Hapus"
                            onclick="confirmDelete({{ $request->id }})">
                            <i class="fas fa-trash"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="10" class="text-center">Tidak ada data permintaan Turnitin</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-3">
              {{ $turnitinRequests->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Create Modal -->
  <div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form id="createForm" enctype="multipart/form-data">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title">Tambah Permintaan Turnitin</h5>
            <button type="button" class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="create_nama">Nama Lengkap <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="create_nama" name="nama" required>
                  <div class="invalid-feedback"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="create_nim_nidn">NIM/NIDN <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="create_nim_nidn" name="nim_nidn" required>
                  <div class="invalid-feedback"></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="create_email">Email <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" id="create_email" name="email" required>
                  <div class="invalid-feedback"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="create_fakultas_prodi">Fakultas/Prodi <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="create_fakultas_prodi" name="fakultas_prodi" required>
                  <div class="invalid-feedback"></div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="create_judul_naskah">Judul Naskah <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="create_judul_naskah" name="judul_naskah" required>
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="create_jenis_dokumen">Jenis Dokumen <span class="text-danger">*</span></label>
              <select class="form-control" id="create_jenis_dokumen" name="jenis_dokumen" required>
                <option value="">Pilih Jenis Dokumen</option>
                <option value="Skripsi">Skripsi</option>
                <option value="Tesis">Tesis</option>
                <option value="Artikel">Artikel</option>
                <option value="Lainnya">Lainnya</option>
              </select>
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="create_file">File Dokumen <span class="text-danger">*</span></label>
              <input type="file" class="form-control-file" id="create_file" name="file"
                accept=".pdf,.doc,.docx" required>
              <small class="form-text text-muted">Format: PDF, DOC, DOCX. Max: 10MB</small>
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="create_catatan_pengguna">Catatan Tambahan</label>
              <textarea class="form-control" id="create_catatan_pengguna" name="catatan_pengguna" rows="3"></textarea>
              <div class="invalid-feedback"></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">
              <i class="fas fa-save mr-1"></i> Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Show Modal -->
  <div class="modal fade" id="showModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail Permintaan Turnitin</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body" id="showModalBody">
          <!-- Content will be loaded here -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form id="editForm" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <input type="hidden" id="edit_request_id" name="request_id">
          <div class="modal-header">
            <h5 class="modal-title">Edit Permintaan Turnitin</h5>
            <button type="button" class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_nama">Nama Lengkap <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="edit_nama" name="nama" required>
                  <div class="invalid-feedback"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_nim_nidn">NIM/NIDN <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="edit_nim_nidn" name="nim_nidn" required>
                  <div class="invalid-feedback"></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_email">Email <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" id="edit_email" name="email" required>
                  <div class="invalid-feedback"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_fakultas_prodi">Fakultas/Prodi <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="edit_fakultas_prodi" name="fakultas_prodi" required>
                  <div class="invalid-feedback"></div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="edit_judul_naskah">Judul Naskah <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="edit_judul_naskah" name="judul_naskah" required>
              <div class="invalid-feedback"></div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_jenis_dokumen">Jenis Dokumen <span class="text-danger">*</span></label>
                  <select class="form-control" id="edit_jenis_dokumen" name="jenis_dokumen" required>
                    <option value="">Pilih Jenis Dokumen</option>
                    <option value="Skripsi">Skripsi</option>
                    <option value="Tesis">Tesis</option>
                    <option value="Artikel">Artikel</option>
                    <option value="Lainnya">Lainnya</option>
                  </select>
                  <div class="invalid-feedback"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="edit_status">Status <span class="text-danger">*</span></label>
                  <select class="form-control" id="edit_status" name="status" required>
                    <option value="pending">Menunggu</option>
                    <option value="diproses">Diproses</option>
                    <option value="selesai">Selesai</option>
                    <option value="ditolak">Ditolak</option>
                  </select>
                  <div class="invalid-feedback"></div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="edit_file">File Dokumen</label>
              <input type="file" class="form-control-file" id="edit_file" name="file" accept=".pdf,.doc,.docx">
              <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah file</small>
              <div class="invalid-feedback"></div>
              <div id="current_file_info" class="mt-2"></div>
            </div>
            <div class="form-group">
              <label for="edit_catatan_pengguna">Catatan Pengguna</label>
              <textarea class="form-control" id="edit_catatan_pengguna" name="catatan_pengguna" rows="3"></textarea>
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="edit_hasil_turnitin">Hasil Turnitin</label>
              <input type="text" class="form-control" id="edit_hasil_turnitin" name="hasil_turnitin">
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="edit_catatan_admin">Catatan Admin</label>
              <textarea class="form-control" id="edit_catatan_admin" name="catatan_admin" rows="3"></textarea>
              <div class="invalid-feedback"></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">
              <i class="fas fa-save mr-1"></i> Update
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Delete Confirmation Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasi Hapus</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah Anda yakin ingin menghapus permintaan ini?</p>
          <p class="text-danger"><strong>Tindakan ini tidak dapat dibatalkan!</strong></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <form id="deleteForm" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
              <i class="fas fa-trash mr-1"></i> Hapus
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    // Create Form Submit
    $('#createForm').on('submit', function(e) {
      e.preventDefault();

      let formData = new FormData(this);

      $.ajax({
        url: '{{ route('turnitin.store') }}',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          $('#createModal').modal('hide');
          location.reload();
        },
        error: function(xhr) {
          let errors = xhr.responseJSON.errors;
          $('.form-control').removeClass('is-invalid');
          $('.invalid-feedback').text('');

          if (errors) {
            $.each(errors, function(key, value) {
              $('#create_' + key).addClass('is-invalid');
              $('#create_' + key).siblings('.invalid-feedback').text(value[0]);
            });
          }
        }
      });
    });

    // Show Detail
    function showDetail(id) {
      $.ajax({
        url: `/turnitin/${id}`,
        type: 'GET',
        success: function(data) {
          let statusBadge = getStatusBadge(data.status);
          let jenisBadge = getJenisBadge(data.jenis_dokumen);

          let content = `
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="card border-info">
                            <div class="card-body text-center">
                                <h6 class="card-title">Status</h6>
                                <span class="badge badge-lg ${statusBadge}">${getStatusText(data.status)}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-success">
                            <div class="card-body text-center">
                                <h6 class="card-title">Jenis Dokumen</h6>
                                <span class="badge badge-lg ${jenisBadge}">${data.jenis_dokumen}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr><td><strong>Nama:</strong></td><td>${data.nama}</td></tr>
                            <tr><td><strong>NIM/NIDN:</strong></td><td>${data.nim_nidn}</td></tr>
                            <tr><td><strong>Email:</strong></td><td><a href="mailto:${data.email}">${data.email}</a></td></tr>
                            <tr><td><strong>Fakultas/Prodi:</strong></td><td>${data.fakultas_prodi}</td></tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr><td><strong>Judul Naskah:</strong></td><td>${data.judul_naskah}</td></tr>
                            <tr><td><strong>File:</strong></td><td>
                                ${data.file ? `<a href="/turnitin/${data.id}/download" class="btn btn-sm btn-outline-primary"><i class="fas fa-download"></i> Download</a>` : 'Tidak ada file'}
                            </td></tr>
                            <tr><td><strong>Hasil Turnitin:</strong></td><td>${data.hasil_turnitin || '-'}</td></tr>
                            <tr><td><strong>Tanggal:</strong></td><td>${formatDate(data.created_at)}</td></tr>
                        </table>
                    </div>
                </div>
                
                ${data.catatan_pengguna ? `
                  <div class="mt-3">
                      <h6><strong>Catatan Pengguna:</strong></h6>
                      <p class="text-muted">${data.catatan_pengguna}</p>
                  </div>
                  ` : ''}
                
                ${data.catatan_admin ? `
                  <div class="mt-3">
                      <h6><strong>Catatan Admin:</strong></h6>
                      <p class="text-muted">${data.catatan_admin}</p>
                  </div>
                  ` : ''}
            `;

          $('#showModalBody').html(content);
          $('#showModal').modal('show');
        }
      });
    }

    // Edit Request
    function editRequest(id) {
      $.ajax({
        url: `/turnitin/${id}/edit`,
        type: 'GET',
        success: function(data) {
          $('#edit_request_id').val(data.id);
          $('#edit_nama').val(data.nama);
          $('#edit_nim_nidn').val(data.nim_nidn);
          $('#edit_email').val(data.email);
          $('#edit_fakultas_prodi').val(data.fakultas_prodi);
          $('#edit_judul_naskah').val(data.judul_naskah);
          $('#edit_jenis_dokumen').val(data.jenis_dokumen);
          $('#edit_status').val(data.status);
          $('#edit_catatan_pengguna').val(data.catatan_pengguna);
          $('#edit_hasil_turnitin').val(data.hasil_turnitin);
          $('#edit_catatan_admin').val(data.catatan_admin);

          if (data.file) {
            $('#current_file_info').html(
              `<small class="text-info">File saat ini: ${data.file.split('/').pop()}</small>`);
          }

          $('#editModal').modal('show');
        }
      });
    }

    // Edit Form Submit
    $('#editForm').on('submit', function(e) {
      e.preventDefault();

      let formData = new FormData(this);
      let id = $('#edit_request_id').val();

      $.ajax({
        url: `/turnitin/${id}`,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          $('#editModal').modal('hide');
          location.reload();
        },
        error: function(xhr) {
          let errors = xhr.responseJSON.errors;
          $('.form-control').removeClass('is-invalid');
          $('.invalid-feedback').text('');

          if (errors) {
            $.each(errors, function(key, value) {
              $('#edit_' + key).addClass('is-invalid');
              $('#edit_' + key).siblings('.invalid-feedback').text(value[0]);
            });
          }
        }
      });
    });

    // Delete Confirmation
    function confirmDelete(id) {
      const form = document.getElementById('deleteForm');
      form.action = `/turnitin/${id}`;
      $('#deleteModal').modal('show');
    }

    // Helper Functions
    function getStatusBadge(status) {
      const badges = {
        'pending': 'badge-warning',
        'diproses': 'badge-info',
        'selesai': 'badge-success',
        'ditolak': 'badge-danger'
      };
      return badges[status] || 'badge-secondary';
    }

    function getStatusText(status) {
      const texts = {
        'pending': 'Menunggu',
        'diproses': 'Diproses',
        'selesai': 'Selesai',
        'ditolak': 'Ditolak'
      };
      return texts[status] || 'Unknown';
    }

    function getJenisBadge(jenis) {
      const badges = {
        'Skripsi': 'badge-primary',
        'Tesis': 'badge-info',
        'Artikel': 'badge-success',
        'Lainnya': 'badge-secondary'
      };
      return badges[jenis] || 'badge-secondary';
    }

    function formatDate(dateString) {
      return new Date(dateString).toLocaleDateString('id-ID', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
      });
    }

    // Reset forms when modals are hidden
    $('#createModal, #editModal').on('hidden.bs.modal', function() {
      $(this).find('form')[0].reset();
      $(this).find('.form-control').removeClass('is-invalid');
      $(this).find('.invalid-feedback').text('');
    });
  </script>
@endpush
