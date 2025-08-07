@extends('home.layouts.add')

@section('title', 'Research Tools')
@section('page', 'Research Tools')

@section('content')
  <div class="container py-5">
    <h2 class="text-center mb-4">🔍 Research Tools Perpustakaan</h2>

    <div class="row row-cols-1 row-cols-md-3 g-4">
      @forelse($tools as $tool)
        <div class="col">
          <div class="card h-100 shadow-sm border-0">
            <div class="card-body">
              <h5 class="card-title">{{ $tool->nama }}</h5>
              <span class="badge bg-dark mb-2">{{ $tool->kategori }}</span>
              <p class="card-text text-muted" style="font-size: 14px">{{ Str::limit($tool->deskripsi, 100) }}</p>
            </div>
            <div class="card-footer bg-white border-0 text-end">
              <a href="{{ $tool->link }}" target="_blank" class="btn btn-sm btn-outline-primary">
                🌐 Akses Tools
              </a>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12">
          <div class="alert alert-warning text-center">
            Belum ada research tools yang tersedia.
          </div>
        </div>
      @endforelse
    </div>

    <div class="mt-4 d-flex justify-content-center">
      {{ $tools->links() }}
    </div>
  </div>
@endsection
