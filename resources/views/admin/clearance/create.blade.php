@extends('admin.layouts.pustaka')

@section('title', 'Add Clearance')

@section('content')
    <div class="p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Add Clearance</h2>
        <form action="{{ route('admin.clearance.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="student_id" class="block text-gray-700">Student</label>
                <select name="student_id" id="student_id" class="w-full border border-gray-300 p-2 rounded">
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->nim }} - {{ $student->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="status" class="block text-gray-700">Status</label>
                <select name="status" id="status" class="w-full border border-gray-300 p-2 rounded">
                    <option value="Pending">Pending</option>
                    <option value="Approved">Approved</option>
                    <option value="Rejected">Rejected</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="remarks" class="block text-gray-700">Remarks</label>
                <textarea name="remarks" id="remarks" class="w-full border border-gray-300 p-2 rounded"></textarea>
            </div>
            <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-lg">Save</button>
        </form>
    </div>
@endsection
