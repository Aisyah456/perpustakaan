@extends('admin.layouts.app')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <!-- Page Header -->
            <header class="flex items-center justify-between p-4 mb-6 bg-white rounded-lg shadow">
                <h1 class="text-2xl font-bold text-gray-700">Berita</h1>
                <a href="{{ route('admin.news.create') }}"
                    class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                    Tambah Berita
                </a>
            </header>

            <!-- Data Table -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-gray-700">List Berita</h2>
                    <div class="flex items-center justify-between mb-4">
                        <form method="GET" action="{{ route('admin.news.index') }}" class="flex space-x-4">
                            <!-- Search Input -->
                            <input type="text" name="search" placeholder="Search by Name"
                                value="{{ request('search') }}"
                                class="p-2 text-gray-600 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />

                            <!-- Submit Button -->
                            <button type="submit"
                                class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Filter</button>
                        </form>
                    </div>
                </div>

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-3 font-medium text-gray-600 border-b-2">#</th>
                            <th class="px-4 py-3 font-medium text-gray-600 border-b-2">Gambar</th>
                            <th class="px-4 py-3 font-medium text-gray-600 border-b-2">Judul</th>
                            <th class="px-4 py-3 font-medium text-gray-600 border-b-2">Tanggal</th>
                            <th class="px-4 py-3 font-medium text-gray-600 border-b-2">Admin</th>
                            <th class="px-4 py-3 font-medium text-gray-600 border-b-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news as $new)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-700 border-b">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3 text-gray-700 border-b">
                                    <img src="{{ asset('doc/img/news/' . $new->image) }}" alt="Current Image"
                                        class="h-16 w-auto object-cover rounded-md">
                                </td>
                                <td class="px-4 py-3 text-gray-700 border-b">{{ $new->judul }}</td>
                                <td class="px-4 py-3 text-gray-700 border-b">
                                    {{ $new->formatted_date }}
                                </td>
                                <td class="px-4 py-3 text-gray-700 border-b">{{ $new->by }}</td>
                                <td class="flex items-center px-4 py-8 space-x-2 border-b">
                                    <!-- Tombol Show -->
                                    <a href="{{ route('dashboard.cms.news.show', $new->id) }}"
                                        class="flex items-center justify-center w-10 h-10 text-white bg-slate-400 rounded-lg hover:bg-slate-500">
                                        <svg class="w-6 h-6 text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-width="2"
                                                d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                            <path stroke="currentColor" stroke-width="2"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </a>

                                    <!-- Tombol Edit -->
                                    <a href="{{ route('dashboard.cms.news.edit', $new->id) }}"
                                        class="flex items-center justify-center w-10 h-10 text-white bg-yellow-400 rounded-lg hover:bg-yellow-500">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                        </svg>
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <button onclick="openDeleteModal('{{ route('admin.news.destroy', $new->id) }}')"
                                        class="flex items-center justify-center w-10 h-10 text-white bg-red-500 rounded-lg hover:bg-red-600">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1-1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                <div class="flex items-center justify-between mt-4">
                    <p class="text-gray-600">Showing {{ $news->firstItem() }} to {{ $news->lastItem() }} of
                        {{ $news->total() }} entries</p>
                    {{ $news->links() }}
                </div>
            </div>

            <!-- Modal -->
            <div id="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
                <div class="bg-white rounded-lg shadow-lg w-96">
                    <div class="p-4 border-b">
                        <h2 class="text-lg font-bold text-gray-700">Konfirmasi Hapus</h2>
                    </div>
                    <div class="p-4">
                        <p class="text-gray-600">Apakah Anda yakin ingin menghapus data ini?</p>
                    </div>
                    <div class="flex justify-end p-4 space-x-2 border-t">
                        <button id="cancelButton"
                            class="px-4 py-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">Batal</button>
                        <form id="deleteForm" method="POST" action="">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Get modal and buttons
        const deleteModal = document.getElementById('deleteModal');
        const deleteForm = document.getElementById('deleteForm');
        const cancelButton = document.getElementById('cancelButton');

        // Function to open modal
        function openDeleteModal(action) {
            deleteForm.action = action;
            deleteModal.classList.remove('hidden');
        }

        // Close modal on cancel button
        cancelButton.addEventListener('click', () => {
            deleteModal.classList.add('hidden');
        });

        // Close modal when clicking outside
        window.addEventListener('click', (event) => {
            if (event.target === deleteModal) {
                deleteModal.classList.add('hidden');
            }
        });
    </script>
