@extends('admin.layouts.app')
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-14">
        <!-- Page Header -->
        <header class="flex items-center justify-between p-4 mb-6 bg-white rounded-lg shadow">
            <h1 class="text-2xl font-bold text-gray-700">
                Detail Berita
            </h1>
            <a href="{{ route('admin.news.index') }}"
                class="px-4 py-2 text-gray-700 bg-gray-200 rounded-lg shadow-md hover:bg-gray-300">
                Kembali
            </a>
        </header>

        <!-- Greeting Details -->
        <div class="p-6 bg-white rounded-lg shadow-md">
            <div class="mb-6">
                @if ($news->img)
                    <img src="{{ asset('doc/img/news/' . $news->img) }}" alt="Gambar Sambutan"
                        class="mt-2 w-64 rounded-lg shadow">
                @else
                    <p class="mt-2 text-sm text-gray-500">Tidak ada gambar</p>
                @endif
            </div>

            <div class="mb-6">
                <p class="text-lg font-semibold text-gray-800">{{ $news->judul }}</p>
            </div>

            <div class="mb-6">
                <p class="text-lg font-semibold text-gray-800">{{ $news->formatted_date }}</p>
            </div>

            <div>
                <p class="mt-2 text-gray-700">{!! $news->konten !!}</p>
            </div>
        </div>
    </div>
</div>
