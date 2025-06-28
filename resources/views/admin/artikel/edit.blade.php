@extends('admin.layouts.artikel')

@section('title', 'Edit Artikel')

@section('content')
    <div class="card-header">
        <h5 class="card-title">Edit Artikel</h5>
    </div>
    <form action="{{ route('admin.news.update', $artikel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" id="judul" value="{{ $artikel->judul }}" required>
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{ $artikel->tanggal }}"
                required>
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Gambar</label>
            <input type="file" name="img" class="form-control" id="img" value="{{ $artikel->img }}" required>
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Deskripsi</label>
            <textarea name="isi" class="form-control" id="isi" required>{{ $artikel->isi }}</textarea>
        </div>
        <div class="mb-3">
            <label for="admin" class="form-label">Admin</label>
            <input type="text" name="admin" class="form-control" id="admin" value="{{ $artikel->admin }}" required>
        </div>
        {{-- <div class="mb-4">
            <label for="category" class="block text-gray-700">Kategori</label>
            <select name="category" id="category"
                class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-500">
                <option value="">Pilih Kategori</option>
                @foreach (['Berita', 'Artikel', 'Agenda', 'Koleksi Terbaru'] as $category)
                    <option value="{{ $category }}"
                        {{ old('category', $artikel->category) == $category ? 'selected' : '' }}>
                        {{ $category }}
                    </option>
                @endforeach
            </select>
            @error('category')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div> --}}
        <button type="submit" class="btn btn-primary">Perbarui</button>

    </form>
@endsection
