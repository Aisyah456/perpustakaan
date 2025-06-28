{{-- edit.blade.php --}}
@extends('admin.layouts.app')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <header class="flex items-center justify-between p-4 mb-6 bg-white rounded-lg shadow">
                <h1 class="text-2xl font-bold text-gray-700">Edit Berita</h1>
                <a href="{{ route('admin.news.index') }}"
                    class="px-4 py-2 text-white bg-gray-600 rounded-lg hover:bg-gray-700">Kembali</a>
            </header>

            <div class="p-6 bg-white rounded-lg shadow-md">
                @if ($errors->any())
                    <div class="p-4 mb-4 text-red-700 bg-red-100 rounded-lg">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-600">Judul Berita</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}"
                            class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-600">Tanggal</label>
                        <input type="date" name="date" id="date" value="{{ old('date', $news->date) }}"
                            class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="by" class="block mb-2 text-sm font-medium text-gray-600">Admin</label>
                        <input type="text" name="by" id="by" value="{{ old('by', $news->by) }}"
                            class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-600">Gambar</label>
                        <input type="file" name="image" id="image" class="w-full p-2 border rounded-lg">
                        @if ($news->image)
                            <img src="{{ asset('doc/img/news/' . $news->image) }}" alt="{{ $news->title }}"
                                class="w-32 h-auto mt-4 rounded-lg">
                        @endif
                    </div>

                    <div class="mb-4">
                        <label for="content" class="block mb-2 text-sm font-medium text-gray-600">Isi Berita</label>
                        <textarea name="content" id="content" rows="6"
                            class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-500">{{ old('content', $news->content) }}</textarea>
                    </div>

                    <button type="submit"
                        class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
