<div>
    <!-- Tombol Buka Modal -->
    <button wire:click="openModal" class="px-4 py-2 bg-blue-500 text-white rounded">Buka Modal</button>

    <!-- Modal -->
    @if ($isOpen)
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                <h2 class="text-xl font-bold">Judul Modal</h2>
                <p class="mt-2">Isi konten modal di sini...</p>

                <button wire:click="closeModal" class="mt-4 px-4 py-2 bg-red-500 text-white rounded">Tutup</button>
            </div>
        </div>
    @endif
</div>
