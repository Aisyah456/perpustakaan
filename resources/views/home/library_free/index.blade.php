@extends('home.layouts.add')
@section('title', 'Form Bebas Pustaka')

@section('content')
  <div class="container py-5">
    <h3 class="mb-4">Form Permohonan Bebas Pustaka</h3>

    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Terjadi kesalahan:</strong>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="/bebas-pustaka" enctype="multipart/form-data">
      @csrf

      <div class="row mb-3">
        <div class="col-md-6">
          <label>Nama <span class="text-danger">*</span></label>
          <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>
        <div class="col-md-6">
          <label>NIM <span class="text-danger">*</span></label>
          <input type="text" name="nim" class="form-control" value="{{ old('nim') }}" required>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label>Fakultas <span class="text-danger">*</span></label>
          <select name="faculty_id" class="form-select" required>
            <option value="">-- Pilih Fakultas --</option>
            @foreach ($faculties as $faculty)
              <option value="{{ $faculty->id }}" {{ old('faculty_id') == $faculty->id ? 'selected' : '' }}>
                {{ $faculty->nama_fakultas }}
              </option>
            @endforeach
          </select>
        </div>
        <div class="col-md-6">
          <label>Program Studi <span class="text-danger">*</span></label>
          <select name="major_id" class="form-select" required>
            <option value="">-- Pilih Program Studi --</option>
            @foreach ($majors as $major)
              <option value="{{ $major->id }}" {{ old('major_id') == $major->id ? 'selected' : '' }}>
                {{ $major->nama_fakultas }}
              </option>
            @endforeach
          </select>
        </div>
      </div>


      <div class="row mb-3">
        <div class="col-md-4">
          <label>No. HP <span class="text-danger">*</span></label>
          <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}" required>
        </div>
        <div class="col-md-4">
          <label>Email <span class="text-danger">*</span></label>
          <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="col-md-4">
          <label>Jenjang Pendidikan <span class="text-danger">*</span></label>
          <select name="jenjang" class="form-select" required>
            <option value="">-- Pilih --</option>
            <option value="D3" {{ old('jenjang') == 'D3' ? 'selected' : '' }}>D3</option>
            <option value="S1" {{ old('jenjang') == 'S1' ? 'selected' : '' }}>S1</option>
            <option value="S2" {{ old('jenjang') == 'S2' ? 'selected' : '' }}>S2</option>
          </select>
        </div>
      </div>

      <div class="mb-3">
        <label>Keperluan <span class="text-danger">*</span></label>
        <select name="keperluan" class="form-select" required>
          <option value="">-- Pilih --</option>
          <option value="Wisuda" {{ old('keperluan') == 'Wisuda' ? 'selected' : '' }}>Wisuda</option>
          <option value="Yudisium" {{ old('keperluan') == 'Yudisium' ? 'selected' : '' }}>Yudisium</option>
          <option value="Lainnya" {{ old('keperluan') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
        </select>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label>Tahun Masuk <span class="text-danger">*</span></label>
          <input type="text" name="tahun_masuk" class="form-control" value="{{ old('tahun_masuk') }}"
            placeholder="Contoh: 2020" required>
        </div>
        <div class="col-md-6">
          <label>Tahun Lulus <span class="text-danger">*</span></label>
          <input type="text" name="tahun_lulus" class="form-control" value="{{ old('tahun_lulus') }}"
            placeholder="Contoh: 2024" required>
        </div>
      </div>

      <div class="mb-3">
        <label>File Karya Ilmiah (.pdf) <span class="text-danger">*</span></label>
        <input type="file" name="file_karya_ilmiah" class="form-control" accept=".pdf" required>
      </div>

      <div class="mb-3">
        <label>Scan Kartu Tanda Mahasiswa (KTM) <span class="text-danger">*</span></label>
        <input type="file" name="scan_ktm" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
      </div>

      <div class="mb-3">
        <label>Bukti Upload (Opsional)</label>
        <input type="file" name="bukti_upload" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
      </div>

      <button type="submit" class="btn btn-primary">Kirim Permohonan</button>
    </form>
  </div>
@endsection
