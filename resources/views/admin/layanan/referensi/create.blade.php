@extends('layout.app')

@section('content')
  <div class="container">
    <h4 class="mb-3">Form Layanan Referensi</h4>

    <form action="{{ route('referensi.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Topik</label>
        <input type="text" name="topik" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Pesan</label>
        <textarea name="pesan" rows="4" class="form-control" required></textarea>
      </div>
      <button class="btn btn-success">Kirim Permintaan</button>
    </form>
  </div>
@endsection
