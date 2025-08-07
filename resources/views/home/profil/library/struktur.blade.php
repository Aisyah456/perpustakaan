@extends('home.layouts.add')

@section('page')
  <section class="page-title-section bg-img cover-background top-position1"
    style="position: relative; background-image: url('{{ asset('lib/img/banner/ChatGPT Image May 20, 2025, 04_40_39 PM.png') }}'); background-size: cover; background-position: center;">

    <!-- Overlay gelap -->
    <div
      style="
          position: absolute;
          top: 0; left: 0; right: 0; bottom: 0;
          background-color: rgba(0, 0, 0, 0.5);  /* 0.5 = 50% gelap */
          z-index: 1;">
    </div>

    <!-- Konten utama -->
    <div class="container" style="position: relative; z-index: 2;">
      <div class="row text-center">
        <div class="col-md-12">
          <h1>Panduan</h1>
        </div>
      </div>
    </div>
  </section>
@endsection



@section('content')
  <div class="container mx-auto py-8">
    <h2 class="text-2xl font-bold text-center mb-6">Struktur Organisasi Perpustakaan</h2>

    <div class="overflow-x-auto flex justify-center">
      <ul class="tree">
        @foreach ($struktur as $node)
          @if (is_null($node->parent_id))
            @include('home.profil.library.node', ['node' => $node])
          @endif
        @endforeach
      </ul>
    </div>
  </div>

  <!-- Modal Detail -->
  <div id="detailModal" class="fixed inset-0 hidden bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-xl shadow-xl p-6 w-full max-w-md relative">
      <button onclick="closeModal()" class="absolute top-2 right-2 text-red-500 text-lg font-bold">&times;</button>
      <div class="text-center">
        <img id="modalFoto" src="" class="w-24 h-24 rounded-full mx-auto mb-3 object-cover border">
        <h3 id="modalNama" class="text-xl font-semibold"></h3>
        <p id="modalNip" class="text-sm text-gray-600"></p>
        <p id="modalJabatan" class="mt-2 font-medium"></p>
      </div>
    </div>
  </div>

  <style>
    .tree,
    .tree ul {
      list-style-type: none;
      position: relative;
      padding-left: 1.5rem;
    }

    .tree li {
      margin: 0 auto;
      text-align: center;
      position: relative;
      padding: 1rem 0;
    }

    .tree li::before,
    .tree li::after {
      content: '';
      position: absolute;
      top: 0;
      border-top: 1px solid #ccc;
      width: 50%;
    }

    .tree li::before {
      left: -50%;
      border-right: 1px solid #ccc;
    }

    .tree li::after {
      right: -50%;
      border-left: 1px solid #ccc;
    }

    .tree li:only-child::before,
    .tree li:only-child::after {
      display: none;
    }

    .tree li:only-child {
      padding-top: 0;
    }

    .tree li>.card {
      display: inline-block;
      padding: 1rem;
      background: #f9fafb;
      border-radius: 0.5rem;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      transition: transform 0.2s ease;
    }

    .tree li>.card:hover {
      transform: scale(1.05);
    }
  </style>

  <script>
    function showDetail(data) {
      document.getElementById('modalNama').innerText = data.nama;
      document.getElementById('modalNip').innerText = 'NIP: ' + (data.nip || '-');
      document.getElementById('modalJabatan').innerText = data.jabatan;
      document.getElementById('modalFoto').src = '/storage/struktur/' + data.foto;

      document.getElementById('detailModal').classList.remove('hidden');
    }

    function closeModal() {
      document.getElementById('detailModal').classList.add('hidden');
    }
  </script>
@endsection
