@extends('home.layouts.add')
@section('title', 'Form Bebas Pustaka')

@section('content')
  <div class="container py-5">
    <div class="card shadow-lg border-0 rounded-3">
      <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Form Permohonan Bebas Pustaka</h4>
      </div>
      <div class="card-body">

        {{-- Pesan sukses --}}
        @if (session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Pesan error global --}}
        @if ($errors->any())
          <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="{{ url('/bebas-pustaka') }}" enctype="multipart/form-data">
          @csrf

          {{-- Nama & NIM --}}
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Nama <span class="text-danger">*</span></label>
              <input type="text" name="nama" value="{{ old('nama') }}"
                class="form-control @error('nama') is-invalid @enderror" required>
              @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label class="form-label">NIM <span class="text-danger">*</span></label>
              <input type="text" name="nim" value="{{ old('nim') }}"
                class="form-control @error('nim') is-invalid @enderror" required>
              @error('nim')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          {{-- Fakultas & Prodi --}}
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Fakultas <span class="text-danger">*</span></label>
              <select name="faculty_id" class="form-select @error('faculty_id') is-invalid @enderror" required>
                <option value="">-- Pilih Fakultas --</option>
                @foreach ($faculties as $faculty)
                  <option value="{{ $faculty->id }}" {{ old('faculty_id') == $faculty->id ? 'selected' : '' }}>
                    {{ $faculty->nama_fakultas }}
                  </option>
                @endforeach
              </select>
              @error('faculty_id')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label class="form-label">Program Studi <span class="text-danger">*</span></label>
              <select name="major_id" class="form-select @error('major_id') is-invalid @enderror" required>
                <option value="">-- Pilih Program Studi --</option>
                @foreach ($majors as $major)
                  <option value="{{ $major->id }}" {{ old('major_id') == $major->id ? 'selected' : '' }}>
                    {{ $major->nama_prodi }}
                  </option>
                @endforeach
              </select>
              @error('major_id')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          {{-- Kontak & Jenjang --}}
          <div class="row mb-3">
            <div class="col-md-4">
              <label class="form-label">No. HP <span class="text-danger">*</span></label>
              <input type="text" name="no_hp" value="{{ old('no_hp') }}"
                class="form-control @error('no_hp') is-invalid @enderror" required>
              @error('no_hp')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-4">
              <label class="form-label">Email <span class="text-danger">*</span></label>
              <input type="email" name="email" value="{{ old('email') }}"
                class="form-control @error('email') is-invalid @enderror" required>
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-4">
              <label class="form-label">Jenjang Pendidikan <span class="text-danger">*</span></label>
              <select name="jenjang" class="form-select @error('jenjang') is-invalid @enderror" required>
                <option value="">-- Pilih --</option>
                @foreach (['D3', 'S1', 'S2'] as $jenjang)
                  <option value="{{ $jenjang }}" {{ old('jenjang') == $jenjang ? 'selected' : '' }}>
                    {{ $jenjang }}</option>
                @endforeach
              </select>
              @error('jenjang')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          {{-- Keperluan --}}
          <div class="mb-3">
            <label class="form-label">Keperluan <span class="text-danger">*</span></label>
            <select name="keperluan" class="form-select @error('keperluan') is-invalid @enderror" required>
              <option value="">-- Pilih --</option>
              @foreach (['Wisuda', 'Yudisium', 'Lainnya'] as $option)
                <option value="{{ $option }}" {{ old('keperluan') == $option ? 'selected' : '' }}>
                  {{ $option }}</option>
              @endforeach
            </select>
            @error('keperluan')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          {{-- Tahun Masuk & Lulus --}}
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Tahun Masuk <span class="text-danger">*</span></label>
              <input type="text" name="tahun_masuk" value="{{ old('tahun_masuk') }}" placeholder="Contoh: 2020"
                class="form-control @error('tahun_masuk') is-invalid @enderror" required>
              @error('tahun_masuk')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label class="form-label">Tahun Lulus <span class="text-danger">*</span></label>
              <input type="text" name="tahun_lulus" value="{{ old('tahun_lulus') }}" placeholder="Contoh: 2024"
                class="form-control @error('tahun_lulus') is-invalid @enderror" required>
              @error('tahun_lulus')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          {{-- Upload File --}}
          <div class="mb-3">
            <label class="form-label">File Karya Ilmiah (.pdf) <span class="text-danger">*</span></label>
            <input type="file" name="file_karya_ilmiah"
              class="form-control @error('file_karya_ilmiah') is-invalid @enderror" accept=".pdf" required>
            @error('file_karya_ilmiah')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label">Scan Kartu Tanda Mahasiswa (KTM) <span class="text-danger">*</span></label>
            <input type="file" name="scan_ktm" class="form-control @error('scan_ktm') is-invalid @enderror"
              accept=".pdf,.jpg,.jpeg,.png" required>
            @error('scan_ktm')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label">Bukti Upload (Opsional)</label>
            <input type="file" name="bukti_upload" class="form-control @error('bukti_upload') is-invalid @enderror"
              accept=".pdf,.jpg,.jpeg,.png">
            @error('bukti_upload')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="text-end">
            <button type="submit" class="btn btn-success">Kirim Permohonan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
