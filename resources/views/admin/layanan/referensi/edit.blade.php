@extends('layout.app')

@section('content')
  <div class="container">
    <h4 class="mb-3">Update Status Permintaan</h4>

    <form action="{{ route('referensi.update', $referensi->id) }}" method="POST">
      @csrf @method('PUT')

      <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control" required>
          <option value="pending" {{ $referensi->status == 'pending' ? 'selected' : '' }}>Pending</option>
          <option value="diproses" {{ $referensi->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
          <option value="selesai" {{ $referensi->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
        </select>
      </div>

      <button class="btn btn-primary">Simpan Perubahan</button>
    </form>
  </div>
@endsection
