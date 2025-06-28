@extends('admin.layouts.banner')

@section('title', 'List Banner')

@section('content')
    <div class="p-6 bg-white rounded-lg shadow-md">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold text-gray-700">List Banner</h2>
            <a href="{{ route('admin.banner.create') }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                Tambah Banner
            </a>
            <form method="GET" action="{{ route('admin.banner.index') }}" class="flex space-x-4">
                <input type="text" name="search" placeholder="Search by Title" value="{{ request('search') }}"
                    class="p-2 text-gray-600 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Search</button>
            </form>
        </div>
        <table class="table-auto w-full bg-white">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banners as $banner)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $banner->title }}</td>
                        <td>{{ $banner->description }}</td>
                        <td><img src="{{ asset('storage/' . $banner->image) }}" alt="Banner Image" width="50"></td>
                        <td>
                            <a href="{{ route('admin.banner.edit', $banner->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.banner.destroy', $banner->id) }}" method="POST"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $banners->links() }}
        </div>
    </div>
@endsection
