@extends('admin.layouts.app')

@section('title', 'List Artikel')

@section('content')
  <div class="p-6 bg-white rounded-lg shadow-md">
    <div class="flex items-center justify-between mb-4">
      <h2 class="text-xl font-semibold text-gray-700">List Artikel</h2>
      <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary">Add New</a>
      </div>
      <form method="GET" action="{{ route('admin.artikel.index') }}" class="flex space-x-4">
        <input type="text" name="search" placeholder="Search by Name" value="{{ request('search') }}"
          class="p-2 text-gray-600 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
        <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700"
          class="btn btn-primary">Filter</button>
      </form>
    </div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Judul</th>
          <th>Tanggal</th>
          <th>Admin</th>
          <th>Kategori</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($artikels as $artikel)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $artikel->judul }}</td>
            <td>{{ $artikel->tanggal }}</td>
            <td>{{ $artikel->admin }}</td>
            <td>{{ $artikel->category }}</td>
            <td>
              <a href="{{ route('admin.artikel.edit', $artikel->id) }}" class="btn btn-warning">Edit</a>
              <form action="{{ route('admin.artikel.destroy', $artikel->id) }}" method="POST"
                style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $artikels->links() }}
  </div>
@endsection
