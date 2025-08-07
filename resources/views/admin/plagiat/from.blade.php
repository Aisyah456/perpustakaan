<div class="mb-3">
  <label>Nama</label>
  <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
    value="{{ old('nama', $data->nama ?? '') }}">
  @error('nama')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="mb-3">
  <label>NIM</label>
  <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror"
    value="{{ old('nim', $data->nim ?? '') }}">
  @error('nim')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="mb-3">
  <label>Fakultas</label>
  <select name="faculty_id" class="form-control @error('faculty_id') is-invalid @enderror">
    @foreach ($faculties as $id => $name)
      <option value="{{ $id }}" {{ old('faculty_id', $data->faculty_id ?? '') == $id ? 'selected' : '' }}>
        {{ $name }}</option>
    @endforeach
  </select>
  @error('faculty_id')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="mb-3">
  <label>Program Studi</label>
  <select name="major_id" class="form-control @error('major_id') is-invalid @enderror">
    @foreach ($majors as $id => $name)
      <option value="{{ $id }}" {{ old('major_id', $data->major_id ?? '') == $id ? 'selected' : '' }}>
        {{ $name }}</option>
    @endforeach
  </select>
  @error('major_id')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="mb-3">
  <label>No HP</label>
  <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror"
    value="{{ old('no_hp', $data->no_hp ?? '') }}">
  @error('no_hp')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="mb-3">
  <label>Email</label>
  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
    value="{{ old('email', $data->email ?? '') }}">
  @error('email')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="mb-3">
  <label>Jenjang</label>
  <select name="jenjang" class="form-control @error('jenjang') is-invalid @enderror">
    <option value="D3">D3</option>
    <option value="S1">S1</option>
    <option value="S2">S2</option>
  </select>
  @error('jenjang')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="mb-3">
  <label>Keperluan</label>
  <input type="text" name="keperluan" class="form-control @error('keperluan') is-invalid @enderror"
    value="{{ old('keperluan', $data->keperluan ?? '') }}">
  @error('keperluan')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="mb-3">
  <label>Tahun Masuk</label>
  <input type="text" name="tahun_masuk" class="form-control @error('tahun_masuk') is-invalid @enderror"
    value="{{ old('tahun_masuk', $data->tahun_masuk ?? '') }}">
  @error('tahun_masuk')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="mb-3">
  <label>Tahun Lulus</label>
  <input type="text" name="tahun_lulus" class="form-control @error('tahun_lulus') is-invalid @enderror"
    value="{{ old('tahun_lulus', $data->tahun_lulus ?? '') }}">
  @error('tahun_lulus')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="mb-3">
  <label>File Karya Ilmiah (PDF)</label>
  <input type="file" name="file_karya_ilmiah" class="form-control @error('file_karya_ilmiah') is-invalid @enderror">
  @error('file_karya_ilmiah')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="mb-3">
  <label>Scan KTM</label>
  <input type="file" name="scan_ktm" class="form-control @error('scan_ktm') is-invalid @enderror">
  @error('scan_ktm')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="mb-3">
  <label>Bukti Upload Repositori</label>
  <input type="file" name="bukti_upload" class="form-control @error('bukti_upload') is-invalid @enderror">
  @error('bukti_upload')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>
