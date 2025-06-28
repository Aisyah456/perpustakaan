@extends('admin.layouts.plagiat')

@section('title', 'Detail Data Plagiat')

@section('content')
    <div class="p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-lg font-semibold mb-6">Detail Data Plagiat</h2>
        <div>
            <p><strong>NIM:</strong> {{ $plagiat->nim }}</p>
            <p><strong>Nama:</strong> {{ $plagiat->nama }}</p>
            <p><strong>Fakultas:</strong> {{ $plagiat->id_fakultas }}</p>
            <p><strong>Prodi:</strong> {{ $plagiat->id_prodi }}</p>
            <p><strong>Status:</strong> {{ $plagiat->status }}</p>
            <p><strong>Upload File 1:</strong> <a href="{{ asset('storage/' . $plagiat->upload1) }}" target="_blank">Lihat
                    File</a></p>
        </div>
        <a href="{{ route('admin.plagiat.index') }}"
            class="mt-4 px-4 py-2 text-white bg-gray-600 rounded-lg hover:bg-gray-700">Kembali</a>
    </div>
@endsection
