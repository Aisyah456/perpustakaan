@extends('home.layouts.add')

@section('title', 'Koleksi Terbaru')

@section('content')
  <div class="container py-4">
    <h1 class="mb-4 text-center text-primary">📚 Koleksi Terbaru Perpustakaan</h1>

    <div class="row">
      @foreach ($collections as $item)
        <div class="col-md-4 mb-4">
          <div class="card h-100 shadow-sm">
            @if ($item->cover)
              <img src="{{ asset($item->cover) }}" class="card-img-top" alt="{{ $item->judul }}">
            @else
              <img src="{{ asset('images/no-cover.png') }}" class="card-img-top" alt="No Cover">
            @endif
            <div class="card-body">
              <h5 class="card-title">{{ $item->judul }}</h5>
              <p class="card-text text-muted mb-1"><strong>Penulis:</strong> {{ $item->penulis ?? '-' }}</p>
              <p class="card-text text-muted mb-1"><strong>Penerbit:</strong> {{ $item->penerbit ?? '-' }}</p>
              <p class="card-text text-muted mb-1"><strong>Tahun:</strong> {{ $item->tahun_terbit ?? '-' }}</p>
              <p class="card-text"><small>{{ Str::limit($item->deskripsi, 100) }}</small></p>
            </div>
            <div class="card-footer text-center">
              @if ($item->link)
                <a href="{{ $item->link }}" target="_blank" class="btn btn-sm btn-primary">Lihat Detail</a>
              @endif
              @if ($item->file)
                <a href="{{ asset($item->file) }}" target="_blank" class="btn btn-sm btn-success">Unduh</a>
              @endif
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="mt-4 d-flex justify-content-center">
      {{ $collections->links() }}
    </div>
  </div>
@endsection
