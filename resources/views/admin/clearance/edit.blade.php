@extends('admin.layouts.pustaka')

@section('title', 'Edit Clearance')

@section('content')
    <div class="p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Edit Clearance</h2>
        <form action="{{ route('admin.clearance.update', $clearance->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="student_id" class="block text-gray-700">Student</label>
                <select name="student_id" id="student_id" class="w-full border border-gray-300 p-2 rounded">
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}" {{ $clearance->student_id == $student->id ? 'selected' : '' }}>
                            {{ $student->nim }} - {{ $student->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700">Status</label>
                <select name="status" id="status" class="w-full border border-gray-300 p-2 rounded">
                    <option value="Pending" {{ $clearance->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Approved" {{ $clearance->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                    <option value="Rejected" {{ $clearance->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="remarks" class="block text-gray-700">Remarks</label>
                <textarea name="remarks" id="remarks" class="w-full border border-gray-300 p-2 rounded">{{ $clearance->remarks }}</textarea>
            </div>

            <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-lg">Update</button>
        </form>
    </div>
@endsection
