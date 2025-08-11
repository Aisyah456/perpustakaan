@extends('home.layouts.add')

@section('title', 'Tanya Pustakawan')

@section('content')
  <article>
    <div class="container mt-5">
      <div class="card shadow rounded-3">
        <div class="card-header bg-primary text-white">
          <h4 class="mb-0">Form Tanya Pustakawan</h4>
        </div>
        <div class="card-body">
          @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          @if ($errors->any())
            <div class="alert alert-danger">
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('ask-librarian.store') }}" method="POST">
            @csrf

            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Fakultas</label>
              <input type="text" name="fakultas" class="form-control" value="{{ old('fakultas') }}" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Program Studi</label>
              <input type="text" name="prodi" class="form-control" value="{{ old('prodi') }}" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Kategori Pertanyaan</label>
              <select name="kategori" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="layanan" {{ old('kategori') == 'layanan' ? 'selected' : '' }}>Layanan</option>
                <option value="koleksi" {{ old('kategori') == 'koleksi' ? 'selected' : '' }}>Koleksi</option>
                <option value="teknis" {{ old('kategori') == 'teknis' ? 'selected' : '' }}>Teknis</option>
                <option value="lainnya" {{ old('kategori') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Pertanyaan</label>
              <textarea name="pertanyaan" class="form-control" rows="4" required>{{ old('pertanyaan') }}</textarea>
            </div>

            <div class="text-end">
              <button type="submit" class="btn btn-success">Kirim Pertanyaan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </article>
@endsection
