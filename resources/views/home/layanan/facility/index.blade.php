@extends('home.layouts.add')
@section('title', 'Form Bokking Fasilitas')

@section('content')
  <div class="container mt-5">
    <div class="card shadow-lg rounded-3">
      <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Form Pemesanan Fasilitas</h4>
      </div>
      <div class="card-body">

        {{-- Pesan Sukses --}}
        @if (session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Form Booking --}}
        <form action="{{ route('booking_facility.store') }}" method="POST">
          @csrf

          <div class="mb-3">
            <label class="form-label">Nama Pemesan</label>
            <input type="text" name="nama_pemesan" value="{{ old('nama_pemesan') }}"
              class="form-control @error('nama_pemesan') is-invalid @enderror" required>
            @error('nama_pemesan')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label">NIM (opsional)</label>
            <input type="text" name="nim" value="{{ old('nim') }}"
              class="form-control @error('nim') is-invalid @enderror">
            @error('nim')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label">Status Pemesan</label>
            <select name="status_pemesan" class="form-select @error('status_pemesan') is-invalid @enderror" required>
              <option value="">-- Pilih --</option>
              <option value="mahasiswa" {{ old('status_pemesan') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
              <option value="dosen" {{ old('status_pemesan') == 'dosen' ? 'selected' : '' }}>Dosen</option>
              <option value="staff" {{ old('status_pemesan') == 'staff' ? 'selected' : '' }}>Staff</option>
              <option value="umum" {{ old('status_pemesan') == 'umum' ? 'selected' : '' }}>Umum</option>
            </select>
            @error('status_pemesan')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label">Fakultas</label>
            <input type="text" name="fakultas" value="{{ old('fakultas') }}"
              class="form-control @error('fakultas') is-invalid @enderror">
            @error('fakultas')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label">Program Studi</label>
            <input type="text" name="program_studi" value="{{ old('program_studi') }}"
              class="form-control @error('program_studi') is-invalid @enderror">
            @error('program_studi')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label">Nama Fasilitas</label>
            <input type="text" name="nama_fasilitas" value="{{ old('nama_fasilitas') }}"
              class="form-control @error('nama_fasilitas') is-invalid @enderror" required>
            @error('nama_fasilitas')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label">Tanggal Pemakaian</label>
            <input type="date" name="tanggal_pemakaian" value="{{ old('tanggal_pemakaian') }}"
              class="form-control @error('tanggal_pemakaian') is-invalid @enderror" required>
            @error('tanggal_pemakaian')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Waktu Mulai</label>
              <input type="time" name="waktu_mulai" value="{{ old('waktu_mulai') }}"
                class="form-control @error('waktu_mulai') is-invalid @enderror" required>
              @error('waktu_mulai')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label class="form-label">Waktu Selesai</label>
              <input type="time" name="waktu_selesai" value="{{ old('waktu_selesai') }}"
                class="form-control @error('waktu_selesai') is-invalid @enderror" required>
              @error('waktu_selesai')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="mb-3 mt-3">
            <label class="form-label">Keperluan</label>
            <textarea name="keperluan" rows="3" class="form-control @error('keperluan') is-invalid @enderror" required>{{ old('keperluan') }}</textarea>
            @error('keperluan')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="text-end">
            <button type="submit" class="btn btn-success">Ajukan Pemesanan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
