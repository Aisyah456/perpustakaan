@extends('admin.layouts.app')

@section('title', 'List Berita')

@section('content')
    <div class="p-6 bg-white rounded-lg shadow-md">
        <div class="flex items-center justify-between mb-4">
            <div class="col-sm-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title">List Berita</h5>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">Add New</a>
                    </div>
                    <form method="GET" action="{{ route('admin.news.index') }}" class="flex space-x-4">
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
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->by }}</td>
                                <td>
                                    <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST"
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
                {{ $news->links() }}
            </div>
        </div>
    </div>
@endsection
