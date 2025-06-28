@extends('admin.layouts.banner')

@section('title', 'Edit Berita')

@section('content')
    <div class="card-header">
        <h5 class="card-title">Edit Berita</h5>
    </div>
    <form action="{{ route('admin.news.update', $news->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" id="judul" value="{{ $news->judul }}" required>
        </div>
        <div class="mb-3">
            <label for="konten" class="form-label">Konten</label>
            <textarea name="konten" class="form-control" id="konten" required>{{ $news->konten }}</textarea>
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">URL Gambar</label>
            <input type="file" name="img" class="form-control" id="img" value="{{ $news->img }}" required>
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{ $news->tanggal }}" required>
        </div>
        <div class="mb-3">
            <label for="by" class="form-label">Admin</label>
            <input type="text" name="by" class="form-control" id="by" value="{{ $news->by }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>

@endsection
