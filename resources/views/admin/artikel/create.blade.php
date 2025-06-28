@extends('admin.layouts.artikel')

@section('title', 'Tambah Artikel')

@section('content')
    <div class="card-header">
        <h5 class="card-title">Tambah Berita</h5>
    </div>

    <form action="{{ route('admin.news.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" id="judul" required>
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" id="tanggal" required>
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Gambar</label>
            <input type="file" name="img" class="form-control" id="img" required>
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Deskripsi</label>
            <textarea name="isi" class="form-control" id="isi" required></textarea>
        </div>
        <div class="mb-3">
            <label for="admin" class="form-label">Admin</label>
            <input type="text" name="admin" class="form-control" id="admin" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <select name="category" id="category"
                class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-500">
                <option value="">Pilih Kategori</option>
                @foreach (['Berita', 'Artikel', 'Agenda', 'Koleksi Terbaru'] as $category)
                    <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>
                        {{ $category }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
