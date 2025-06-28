@extends('admin.layouts.pustaka')
@section('content')
    <h1>Clearance List</h1>
    <a href="{{ route('pustaka.create') }}" class="btn btn-primary">Add Clearance</a>
    <table class="table">
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Tanggal Permohonan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($pustakas as $pustaka)
                <tr>
                    <td>{{ $pustaka->nama }}</td>
                    <td>{{ $pustaka->nim }}</td>
                    <td>{{ $pustaka->jurusan }}</td>
                    <td>{{ $pustaka->tanggal_permohonan }}</td>
                    <td>{{ $pustaka->status }}</td>
                    <td>
                        <a href="{{ route('pustaka.edit', $pustaka->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('pustaka.destroy', $pustaka->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $pustakas->links() }}
@endsection
