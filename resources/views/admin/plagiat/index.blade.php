@extends('admin.layouts.plagiat')

@section('title', 'Plagiat List')

@section('content')
    <div class="p-6 bg-white rounded-lg shadow-md">
        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-semibold">List Plagiat</h2>
            <a href="{{ route('admin.plagiat.create') }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                Tambah Banner
            </a>
        </div>
        {{-- <form method="GET" action="{{ route('admin.plagiat.index') }}" class="mb-4"> --}}
        <input type="text" name="search" placeholder="Search by Name or NIM" value="{{ request('search') }}"
            class="p-2 border rounded-lg">
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Search</button>
        </form>
        <table class="w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2">#</th>
                    <th class="border p-2">Nama</th>
                    <th class="border p-2">NIM</th>
                    <th class="border p-2">Status</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($plagiats as $plagiat)
                    <tr>
                        <td class="border p-2">{{ $loop->iteration }}</td>
                        <td class="border p-2">{{ $plagiat->nama }}</td>
                        <td class="border p-2">{{ $plagiat->nim }}</td>
                        <td class="border p-2">{{ $plagiat->status }}</td>
                        <td class="border p-2">
                            <a href="{{ route('admin.plagiat.edit', $plagiat->id) }}"
                                class="px-2 py-1 bg-yellow-500 text-white rounded">Edit</a>
                            {{-- <form action="{{ route('admin.plagiat.destroy', $plagiat->id) }}" method="POST"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 bg-red-600 text-white rounded">Delete</button>
                            </form> --}}
                            <form action="{{ route('admin.plagiat.destroy', $plagiat->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border p-2 text-center">No data found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">
            {{ $plagiats->links() }}
        </div>
    </div>
@endsection
