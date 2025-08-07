@extends('home.layouts.add') {{-- Ganti dengan layout frontend kamu --}}

@section('title', 'Dokumen Eksternal')

@section('page', 'Dokumen Eksternal')


@section('content')
  <div class="container py-5">
    <h2 class="text-center mb-4">🌐 Daftar Dokumen Eksternal Perpustakaan</h2>

    <div class="row row-cols-1 row-cols-md-3 g-4">
      @forelse ($documents as $doc)
        <div class="col">
          <div class="card h-100 shadow-sm border-0">
            <div class="card-body">
              <h5 class="card-title">{{ $doc->judul }}</h5>
              <span class="badge bg-secondary mb-2">{{ $doc->kategori }}</span>
              <p class="text-muted" style="font-size: 14px">{{ Str::limit($doc->deskripsi, 100) }}</p>
            </div>
            <div class="card-footer bg-white border-0 text-end">
              <a href="{{ $doc->link }}" target="_blank" class="btn btn-sm btn-outline-primary">
                🌍 Kunjungi / Baca
              </a>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12">
          <div class="alert alert-warning text-center">
            Tidak ada dokumen eksternal tersedia saat ini.
          </div>
        </div>
      @endforelse
    </div>

    <div class="mt-4 d-flex justify-content-center">
      {{ $documents->links() }}
    </div>
  </div>
@endsection
