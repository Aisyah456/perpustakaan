@extends('admin.layouts.app')
@section('title', 'Struktur Organisasi')

@section('content')
  <div class="container mt-4">
    <h3>Struktur Organisasi</h3>
    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Tambah</button>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Nama</th>
          <th>NIP</th>
          <th>Jabatan</th>
          <th>Foto</th>
          <th>Parent</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $item)
          <tr>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->nip }}</td>
            <td>{{ $item->jabatan }}</td>
            <td>
              @if ($item->foto)
                <img src="{{ asset('storage/struktur/' . $item->foto) }}" width="50">
              @endif
            </td>
            <td>{{ optional($item->parent)->nama }}</td>
            <td>
              <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                data-bs-target="#editModal{{ $item->id }}">Edit</button>
              {{-- <form method="POST" action="{{ route('destroy', $item->id) }}" class="d-inline"
                onsubmit="return confirm('Hapus data ini?')"> --}}
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger">Hapus</button>
              </form>
            </td>
          </tr>

          <!-- Edit Modal -->
          <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1">
            <div class="modal-dialog">
              {{-- <form method="POST" enctype="multipart/form-data"
                action="{{ route('struktur-organisasi.update', $item->id) }}"> --}}
              @csrf @method('PUT')
              <div class="modal-content">
                <div class="modal-header">
                  <h5>Edit Data</h5>
                </div>
                <div class="modal-body">
                  <input type="text" name="nama" class="form-control mb-2" value="{{ $item->nama }}" required>
                  <input type="text" name="nip" class="form-control mb-2" value="{{ $item->nip }}">
                  <input type="text" name="jabatan" class="form-control mb-2" value="{{ $item->jabatan }}" required>
                  <select name="parent_id" class="form-control mb-2">
                    <option value="">-- Parent --</option>
                    @foreach ($data as $p)
                      <option value="{{ $p->id }}" @if ($item->parent_id == $p->id) selected @endif>
                        {{ $p->nama }}</option>
                    @endforeach
                  </select>
                  <input type="file" name="foto" class="form-control">
                </div>
                <div class="modal-footer"><button class="btn btn-success">Simpan</button></div>
              </div>
              </form>
            </div>
          </div>
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Create Modal -->
  <div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog">
      {{-- <form method="POST" enctype="multipart/form-data" action="{{ route('struktur-organisasi.store') }}"> --}}
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5>Tambah Data</h5>
        </div>
        <div class="modal-body">
          <input type="text" name="nama" class="form-control mb-2" placeholder="Nama" required>
          <input type="text" name="nip" class="form-control mb-2" placeholder="NIP">
          <input type="text" name="jabatan" class="form-control mb-2" placeholder="Jabatan" required>
          <select name="parent_id" class="form-control mb-2">
            <option value="">-- Parent --</option>
            @foreach ($data as $p)
              <option value="{{ $p->id }}">{{ $p->nama }}</option>
            @endforeach
          </select>
          <input type="file" name="foto" class="form-control">
        </div>
        <div class="modal-footer"><button class="btn btn-primary">Simpan</button></div>
      </div>
      </form>
    </div>
  </div>
@endsection
