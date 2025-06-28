@extends('admin.layouts.pustaka')

@section('title', 'Clearance List')

@section('content')
    <div class="p-6 bg-white rounded-lg shadow-md">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold text-gray-700">Clearance List</h2>
            <form method="GET" action="{{ route('admin.clearance.index') }}" class="flex space-x-4">
                <input type="text" name="search" placeholder="Search by Name or NIM" value="{{ request('search') }}"
                    class="p-2 text-gray-600 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Search</button>
            </form>
            <a href="{{ route('admin.clearance.create') }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Add Clearance</a>
        </div>

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border px-4 py-2">#</th>
                    <th class="border px-4 py-2">Student</th>
                    <th class="border px-4 py-2">NIM</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Remarks</th>
                    <th class="border px-4 py-2">Admin</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clearances as $clearance)
                    <tr>
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $clearance->student->name }}</td>
                        <td class="border px-4 py-2">{{ $clearance->student->nim }}</td>
                        <td class="border px-4 py-2">{{ $clearance->status }}</td>
                        <td class="border px-4 py-2">{{ $clearance->remarks }}</td>
                        <td class="border px-4 py-2">{{ $clearance->admin->name }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('admin.clearance.edit', $clearance->id) }}" class="text-blue-600">Edit</a> |
                            <form action="{{ route('admin.clearance.destroy', $clearance->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $clearances->links() }}
        </div>
    </div>
@endsection
