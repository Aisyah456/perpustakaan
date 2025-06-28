@extends('admin.layouts.plagiat')

@section('title', 'Edit Data Plagiat')

@section('content')
    <div class="p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-lg font-semibold mb-6">Edit Data Plagiat</h2>
        <form action="{{ route('admin.plagiat.update', $plagiat->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="nim" class="block text-gray-700">NIM</label>
                    <input type="text" name="nim" id="nim" value="{{ $plagiat->nim }}" class="form-input w-full"
                        required>
                </div>
                <div>
                    <label for="nama" class="block text-gray-700">Nama</label>
                    <input type="text" name="nama" id="nama" value="{{ $plagiat->nama }}"
                        class="form-input w-full" required>
                </div>
                <div>
                    <label for="id_fakultas" class="block text-gray-700">Fakultas</label>
                    <input type="text" name="id_fakultas" id="id_fakultas" value="{{ $plagiat->id_fakultas }}"
                        class="form-input w-full" required>
                </div>
                <div>
                    <label for="id_prodi" class="block text-gray-700">Prodi</label>
                    <input type="text" name="id_prodi" id="id_prodi" value="{{ $plagiat->id_prodi }}"
                        class="form-input w-full" required>
                </div>
                <div>
                    <label for="status" class="block text-gray-700">Status</label>
                    <select name="status" id="status" class="form-select w-full" required>
                        <option value="Pending" {{ $plagiat->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Approved" {{ $plagiat->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                    </select>
                </div>
                <div>
                    <label for="upload1" class="block text-gray-700">Upload File 1</label>
                    <input type="file" name="upload1" id="upload1" class="form-input w-full">
                    <p class="mt-2 text-sm text-gray-500">File sebelumnya: {{ $plagiat->upload1 }}</p>
                </div>
            </div>
            <button type="submit" class="mt-4 px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                Simpan Perubahan
            </button>
        </form>
    </div>
@endsection
