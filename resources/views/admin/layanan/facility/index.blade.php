@extends('admin.layouts.app')

@section('title', 'List Plagiat')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<style>
  .header-admin {
    background: linear-gradient(90deg, #2d5a4a 0%, #2d5a4a 70%, #f4b942 70%, #f4b942 100%);
    height: 8px;
  }

  .navbar-brand {
    color: #2d5a4a !important;
    font-weight: bold;
  }

  .btn-primary {
    background-color: #2d5a4a;
    border-color: #2d5a4a;
  }

  .btn-primary:hover {
    background-color: #1a3d32;
    border-color: #1a3d32;
  }

  .btn-warning {
    background-color: #f4b942;
    border-color: #f4b942;
    color: #2d5a4a;
  }

  .table th {
    background-color: #2d5a4a;
    color: white;
  }

  .alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
  }

  .modal-header {
    background-color: #2d5a4a;
    color: white;
  }

  .modal-header .btn-close {
    filter: brightness(0) invert(1);
  }

  .form-label {
    color: #2d5a4a;
    font-weight: 600;
  }

  .preview-box {
    background-color: #f4b942;
    padding: 15px;
    border-radius: 5px;
    margin-top: 15px;
  }

  .banner-preview {
    position: relative;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 8px;
    overflow: hidden;
    min-height: 300px;
    display: flex;
    align-items: center;
    color: white;
  }

  .banner-preview::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.4);
    z-index: 1;
  }

  .banner-preview-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: 0;
  }

  .banner-content {
    position: relative;
    z-index: 2;
    padding: 30px;
    width: 100%;
  }

  .banner-subtitle {
    font-size: 0.9rem;
    opacity: 0.9;
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  .banner-title {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 15px;
    line-height: 1.2;
  }

  .banner-description {
    font-size: 1rem;
    opacity: 0.9;
    margin-bottom: 20px;
    line-height: 1.5;
  }

  .banner-button {
    display: inline-block;
    padding: 12px 24px;
    background: #f4b942;
    color: #2d5a4a;
    text-decoration: none;
    border-radius: 5px;
    font-weight: 600;
    transition: all 0.3s ease;
  }

  .banner-button:hover {
    background: #e6a73a;
    transform: translateY(-2px);
  }

  .image-upload-preview {
    max-width: 100px;
    max-height: 100px;
    object-fit: cover;
    border-radius: 5px;
    border: 2px solid #dee2e6;
  }

  .loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    visibility: hidden;
    opacity: 0;
    transition: visibility 0s, opacity 0.3s;
  }

  .loading-overlay.show {
    visibility: visible;
    opacity: 1;
  }

  .spinner-container {
    background: white;
    padding: 20px;
    border-radius: 8px;
    text-align: center;
  }

  .file-input-wrapper {
    position: relative;
    overflow: hidden;
    display: inline-block;
    cursor: pointer;
    width: 100%;
  }

  .file-input-wrapper input[type=file] {
    position: absolute;
    left: -9999px;
  }

  .file-input-label {
    border: 2px dashed #dee2e6;
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    background: #f8f9fa;
    transition: all 0.3s ease;
  }

  .file-input-label:hover {
    border-color: #2d5a4a;
    background: #e8f5e8;
  }

  .current-image {
    max-width: 150px;
    max-height: 100px;
    object-fit: cover;
    border-radius: 5px;
    border: 1px solid #dee2e6;
  }

  .banner-status {
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
  }

  .status-active {
    background: #d4edda;
    color: #155724;
  }

  .status-inactive {
    background: #f8d7da;
    color: #721c24;
  }
</style>

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

    <form method="POST" action="{{ route('bebas-pustaka.store') }}" enctype="multipart/form-data">
      @csrf

      {{-- NAMA & NIM --}}
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

      {{-- FAKULTAS & PRODI --}}
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
                {{ $major->nama_prodi }}
              </option>
            @endforeach
          </select>
        </div>
      </div>

      {{-- NO HP, EMAIL, JENJANG --}}
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
          <label>Jenjang <span class="text-danger">*</span></label>
          <select name="jenjang" class="form-select" required>
            <option value="">-- Pilih --</option>
            <option value="D3" {{ old('jenjang') == 'D3' ? 'selected' : '' }}>D3</option>
            <option value="S1" {{ old('jenjang') == 'S1' ? 'selected' : '' }}>S1</option>
            <option value="S2" {{ old('jenjang') == 'S2' ? 'selected' : '' }}>S2</option>
          </select>
        </div>
      </div>

      {{-- KEPERLUAN --}}
      <div class="mb-3">
        <label>Keperluan <span class="text-danger">*</span></label>
        <select name="keperluan" class="form-select" required>
          <option value="">-- Pilih --</option>
          <option value="Wisuda" {{ old('keperluan') == 'Wisuda' ? 'selected' : '' }}>Wisuda</option>
          <option value="Yudisium" {{ old('keperluan') == 'Yudisium' ? 'selected' : '' }}>Yudisium</option>
          <option value="Lainnya" {{ old('keperluan') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
        </select>
      </div>

      {{-- TAHUN MASUK & LULUS --}}
      <div class="row mb-3">
        <div class="col-md-6">
          <label>Tahun Masuk <span class="text-danger">*</span></label>
          <input type="text" name="tahun_masuk" class="form-control" value="{{ old('tahun_masuk') }}" required>
        </div>
        <div class="col-md-6">
          <label>Tahun Lulus <span class="text-danger">*</span></label>
          <input type="text" name="tahun_lulus" class="form-control" value="{{ old('tahun_lulus') }}" required>
        </div>
      </div>

      {{-- FILES --}}
      <div class="mb-3">
        <label>File Karya Ilmiah (.pdf) <span class="text-danger">*</span></label>
        <input type="file" name="file_karya_ilmiah" class="form-control" accept=".pdf" required>
      </div>

      <div class="mb-3">
        <label>Scan KTM <span class="text-danger">*</span></label>
        <input type="file" name="scan_ktm" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
      </div>

      <div class="mb-3">
        <label>Bukti Upload (opsional)</label>
        <input type="file" name="bukti_upload" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
      </div>

      <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
  </div>
@endsection
