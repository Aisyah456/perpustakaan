@extends('admin.profil.app')

@section('content')
  <div class="container">
    <h1 class="mb-4">{{ isset($banner) ? 'Edit' : 'Tambah' }} Banner</h1>

    <form method="POST" action="{{ isset($banner) ? route('banners.update', $banner) : route('banners.store') }}"
      enctype="multipart/form-data">
      @csrf
      @if (isset($banner))
        @method('PUT')
      @endif

      <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="title" value="{{ old('title', $banner->title ?? '') }}" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Subtitle</label>
        <input type="text" name="subtitle" value="{{ old('subtitle', $banner->subtitle ?? '') }}" class="form-control">
      </div>

      <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control">{{ old('description', $banner->description ?? '') }}</textarea>
      </div>

      <div class="mb-3">
        <label>Gambar</label>
        @if (isset($banner))
          <div><img src="{{ asset('storage/' . $banner->image) }}" width="120" class="mb-2"></div>
        @endif
        <input type="file" name="image" class="form-control" {{ isset($banner) ? '' : 'required' }}>
      </div>

      <div class="mb-3">
        <label>Text Tombol</label>
        <input type="text" name="button_text" value="{{ old('button_text', $banner->button_text ?? '') }}"
          class="form-control">
      </div>

      <div class="mb-3">
        <label>Link Tombol</label>
        <input type="text" name="button_link" value="{{ old('button_link', $banner->button_link ?? '') }}"
          class="form-control">
      </div>

      <button class="btn btn-success">{{ isset($banner) ? 'Update' : 'Simpan' }}</button>
    </form>
  </div>
@endsection
