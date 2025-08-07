@extends('home.layouts.add')
@section('title', 'Form Bokking Fasilitas')

@section('content')
  <div class="container py-5">
    <h3 class="mb-4">Form Booking Fasilitas Perpustakaan</h3>

    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('booking.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label>Nama Pemesan</label>
        <input type="text" name="nama_pemesan" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>NIM </label>
        <input type="text" name="nim" class="form-control">
      </div>
      <div class="mb-3">
        <label>Fakultas</label>
        <input type="text" name="fakultas" class="form-control">
      </div>
      <div class="mb-3">
        <label>Program Studi</label>
        <input type="text" name="program_studi" class="form-control">
      </div>
      <div class="mb-3">
        <label>Kontak (HP/WA)</label>
        <input type="text" name="kontak" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Fasilitas yang Dibooking</label>
        <input type="text" name="fasilitas" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Jam Mulai</label>
        <input type="time" name="jam_mulai" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Jam Selesai</label>
        <input type="time" name="jam_selesai" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Keperluan</label>
        <textarea name="keperluan" class="form-control" required></textarea>
      </div>
      <button type="submit" class="btn btn-success">Kirim Booking</button>
    </form>
  </div>
@endsection
