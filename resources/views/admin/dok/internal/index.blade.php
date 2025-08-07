@extends('admin.layouts.app')

@section('title', 'Dokumen Internal')

@section('content')
  <div class="container py-5">
    <div class="row">
      <div class="col-12 text-center mb-5">
        <h1 class="display-4 text-primary mb-3">
          <i class="fas fa-file-alt me-3"></i>
          Dokumen Internal
        </h1>
        <p class="lead text-muted">
          Kumpulan dokumen internal perpustakaan untuk keperluan operasional dan administrasi
        </p>
      </div>
    </div>

    <!-- Filter Section -->
    <div class="row mb-4">
      <div class="col-md-6 mx-auto">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <input type="text" class="form-control" id="searchInput" placeholder="Cari dokumen...">
              </div>
              <div class="col-md-4">
                <select class="form-select" id="categoryFilter">
                  <option value="">Semua Kategori</option>
                  @foreach (['SOP', 'Panduan', 'Memo', 'Kebijakan', 'Formulir', 'Lainnya'] as $kategori)
                    <option value="{{ $kategori }}">{{ $kategori }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @forelse($documents as $kategori => $docs)
      <div class="category-section mb-5">
        <div class="d-flex align-items-center mb-4">
          <h3 class="text-primary mb-0 me-3">
            <i class="fas fa-folder-open me-2"></i> {{ $kategori }}
          </h3>
          <span class="badge bg-primary">{{ $docs->count() }} dokumen</span>
        </div>

        <div class="row">
          @foreach ($docs as $document)
            <div class="col-lg-4 col-md-6 mb-4 document-item" data-category="{{ strtolower($document->kategori ?? '') }}"
              data-title="{{ strtolower($document->judul ?? '') }}"
              data-description="{{ strtolower($document->deskripsi ?? '') }}">

              <div class="card h-100 shadow-sm border-0">
                <div class="card-body d-flex flex-column">
                  <div class="d-flex align-items-start mb-3">
                    <div class="bg-{{ $document->category_color ?? 'secondary' }} bg-opacity-10 rounded-circle p-3 me-3">
                      <i
                        class="fas fa-file-{{ strtolower($document->file_extension ?? 'alt') === 'pdf' ? 'pdf' : 'alt' }}
                  text-{{ $document->category_color ?? 'secondary' }} fa-lg"></i>
                    </div>
                    <div class="flex-grow-1">
                      <h5 class="card-title text-primary mb-2">{{ $document->judul ?? 'Tanpa Judul' }}</h5>
                      <div class="d-flex align-items-center mb-2">
                        <span
                          class="badge bg-{{ $document->category_color ?? 'secondary' }} me-2">{{ $document->kategori }}</span>
                        <small class="text-muted">{{ $document->file_extension ?? 'file' }}</small>
                      </div>
                      <small class="text-muted">
                        <i class="fas fa-calendar-alt me-1"></i>
                        {{ $document->created_at->format('d M Y') }}
                      </small>
                    </div>
                  </div>

                  @if ($document->deskripsi)
                    <p class="card-text text-muted flex-grow-1 small">
                      {{ \Illuminate\Support\Str::limit($document->deskripsi, 100) }}
                    </p>
                  @endif

                  <div class="mt-auto">
                    <div class="d-flex justify-content-between align-items-center">
                      <small class="text-muted">
                        <i class="fas fa-file me-1"></i>
                        {{ $document->getFileSize() }}
                      </small>
                      <div>
                        <button type="button" class="btn btn-outline-primary btn-sm me-2" data-bs-toggle="modal"
                          data-bs-target="#viewModal" onclick="viewDocument({{ $document->id }})">
                          <i class="fas fa-eye"></i>
                        </button>
                        <a href="{{ route('admin.internal-documents.download', $document->id) }}"
                          class="btn btn-primary btn-sm">
                          <i class="fas fa-download me-1"></i> Download
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          @endforeach
        </div>
      </div>
    @empty
      <div class="text-center py-5">
        <i class="fas fa-file-alt fa-4x text-muted mb-4"></i>
        <h3 class="text-muted">Belum Ada Dokumen</h3>
        <p class="text-muted">Dokumen internal akan segera tersedia.</p>
      </div>
    @endforelse
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
          <div class="text-center">
            <div class="spinner-border text-primary" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-2">Memuat detail dokumen...</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const categoryFilter = document.getElementById('categoryFilter');
      const searchInput = document.getElementById('searchInput');

      function filterDocuments() {
        const categoryValue = categoryFilter.value.toLowerCase();
        const searchValue = searchInput.value.toLowerCase();
        const documents = document.querySelectorAll('.document-item');
        const sections = document.querySelectorAll('.category-section');

        documents.forEach(doc => {
          const category = doc.dataset.category;
          const title = doc.dataset.title;
          const description = doc.dataset.description;

          const matchCategory = !categoryValue || category === categoryValue;
          const matchSearch = !searchValue || title.includes(searchValue) || description.includes(searchValue);

          doc.style.display = matchCategory && matchSearch ? '' : 'none';
        });

        sections.forEach(section => {
          const visibleDocs = section.querySelectorAll('.document-item:not([style*="display: none"])');
          section.style.display = visibleDocs.length > 0 ? '' : 'none';
        });
      }

      categoryFilter.addEventListener('change', filterDocuments);
      searchInput.addEventListener('input', filterDocuments);
    });

    function viewDocument(id) {
      const modalBody = document.querySelector('#viewModal .modal-body');

      modalBody.innerHTML = `
      <div class="text-center">
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <p class="mt-2">Memuat detail dokumen...</p>
      </div>
    `;

      fetch(`/admin/internal-documents/${id}`)
        .then(response => response.json())
        .then(data => {
          modalBody.innerHTML = `
          <div class="row">
            <div class="col-md-12">
              <div class="d-flex align-items-center mb-3">
                <h4 class="text-primary mb-0 me-3">${data.data.judul}</h4>
                <span class="badge bg-primary">${data.data.kategori}</span>
              </div>

              ${data.data.deskripsi ? `
                    <div class="mb-3">
                      <label class="form-label">Deskripsi:</label>
                      <p class="text-muted">${data.data.deskripsi}</p>
                    </div>
                  ` : ''}

              <div class="mb-3">
                <label class="form-label">File:</label>
                <div class="d-flex align-items-center">
                  <a href="/storage/${data.data.file}" target="_blank" class="text-decoration-none me-3">
                    <i class="fas fa-download me-2"></i> ${data.data.file.split('/').pop()}
                  </a>
                  <small class="text-muted">${data.data.file_size || ''}</small>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <label class="form-label">Dibuat:</label>
                  <p class="text-muted">${new Date(data.data.created_at).toLocaleString('id-ID')}</p>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Diupdate:</label>
                  <p class="text-muted">${new Date(data.data.updated_at).toLocaleString('id-ID')}</p>
                </div>
              </div>
            </div>
          </div>
        `;
        })
        .catch(() => {
          modalBody.innerHTML = `
          <div class="text-center text-danger">
            <i class="fas fa-exclamation-circle fa-3x mb-3"></i>
            <p>Terjadi kesalahan saat memuat data.</p>
          </div>
        `;
        });
    }
  </script>
@endsection
