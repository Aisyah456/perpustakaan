<li>
  <div class="card cursor-pointer" onclick='showDetail(@json($node))'>
    <img src="{{ asset('storage/struktur/' . $node->foto) }}" alt="{{ $node->nama }}"
      class="w-16 h-16 object-cover rounded-full mx-auto mb-1 border">
    <strong class="block text-sm">{{ $node->nama }}</strong>
    <span class="text-xs text-blue-600 underline">{{ $node->jabatan }}</span>
  </div>

  @if ($node->children && $node->children->count())
    <ul>
      @foreach ($node->children as $child)
        @include('library.partials.node', ['node' => $child])
      @endforeach
    </ul>
  @endif
</li>
