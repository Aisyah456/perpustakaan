@extends('home.pustaka.pustaka')
@section('content')
                <h1>Form Bebas Pustaka</h1>
            
                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            
                <form action="{{ route('home.pustaka.store') }}" method="POST">
                    @csrf
            
                    <div>
                        <label>Nama:</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" required>
                    </div>
            
                    <div>
                        <label>NIM:</label>
                        <input type="text" name="nim" value="{{ old('nim') }}" required>
                    </div>
            
                    <div>
                        <label>Jurusan:</label>
                        <input type="text" name="jurusan" value="{{ old('jurusan') }}" required>
                    </div>
            
                    <div>
                        <label>Tanggal Permohonan:</label>
                        <input type="date" name="tanggal_permohonan" value="{{ old('tanggal_permohonan') }}" required>
                    </div>
            
                    <div>
                        <label>Status:</label>
                        <select name="status" required>
                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="disetujui" {{ old('status') == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                            <option value="ditolak" {{ old('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </div>
            
                    <button type="submit">Submit</button>
                </form>
            @endsection