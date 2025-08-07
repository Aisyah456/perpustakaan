@extends('home.layouts.add')

@section('title', 'Sejarah Perpustakaan - Universitas Mohammad Husni Thamrin')

@push('styles')
  <style>
    .gradient-text {
      background: linear-gradient(135deg, #ffffff 0%, #bfdbfe 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .hover-scale {
      transition: transform 0.3s ease;
    }

    .hover-scale:hover {
      transform: scale(1.05);
    }

    .gallery-item {
      overflow: hidden;
      transition: transform 0.3s ease;
    }

    .gallery-item:hover img {
      transform: scale(1.1);
    }

    .gallery-overlay {
      background: linear-gradient(to top, rgba(0, 0, 0, 0.6), transparent);
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .gallery-item:hover .gallery-overlay {
      opacity: 1;
    }

    .timeline-line {
      background: linear-gradient(to bottom, #3b82f6, #6366f1);
    }

    .timeline-dot {
      box-shadow: 0 0 0 4px white, 0 0 0 8px rgba(59, 130, 246, 0.2);
    }
  </style>
@endpush

@section('content')
  <section class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 px-4 py-16">

    <!-- Stats -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
      @php
        $stats = [
            ['icon' => 'calendar', 'value' => date('Y') - 1998 . '+', 'label' => 'Tahun Beroperasi', 'color' => 'blue'],
            ['icon' => 'book', 'value' => '50K+', 'label' => 'Koleksi Buku', 'color' => 'green'],
            ['icon' => 'user-group', 'value' => '15K+', 'label' => 'Anggota Aktif', 'color' => 'purple'],
            ['icon' => 'clock', 'value' => '24/7', 'label' => 'Akses Digital', 'color' => 'orange'],
        ];
      @endphp

      @foreach ($stats as $stat)
        <div class="bg-white rounded-3xl p-6 shadow-lg text-center border border-blue-100 hover-scale">
          <div class="text-{{ $stat['color'] }}-600 text-4xl mb-2">
            <i class="fas fa-{{ $stat['icon'] }}"></i>
          </div>
          <div class="text-3xl font-bold text-gray-800 mb-1">{{ $stat['value'] }}</div>
          <div class="text-sm text-gray-600">{{ $stat['label'] }}</div>
        </div>
      @endforeach
    </div>

    <!-- Timeline -->
    {{-- <div class="mb-16">
      <h3 class="text-3xl font-bold text-center mb-12 text-gray-800">Perjalanan Sejarah</h3>
      <div class="relative">
        <div class="absolute left-1/2 transform -translate-x-1/2 w-1 h-full timeline-line rounded-full"></div>

        <div class="space-y-12">
          @foreach ($timeline as $item)
            <div class="relative flex items-center">
              @if ($item['position'] === 'right')
                <div class="flex-1 pr-8 text-right">
                  <div class="bg-white rounded-2xl p-6 shadow-lg border-l-4 border-{{ $item['color'] }}-500">
                    <div class="text-{{ $item['color'] }}-600 font-bold text-lg mb-2">{{ $item['year'] }}</div>
                    <h4 class="font-bold text-gray-800 mb-2">{{ $item['title'] }}</h4>
                    <p class="text-gray-600 text-sm">{{ $item['description'] }}</p>
                  </div>
                </div>
                <div
                  class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-{{ $item['color'] }}-500 rounded-full border-4 border-white shadow-lg timeline-dot">
                </div>
                <div class="flex-1 pl-8"></div>
              @else
                <div class="flex-1 pr-8"></div>
                <div
                  class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-{{ $item['color'] }}-500 rounded-full border-4 border-white shadow-lg timeline-dot">
                </div>
                <div class="flex-1 pl-8">
                  <div class="bg-white rounded-2xl p-6 shadow-lg border-l-4 border-{{ $item['color'] }}-500">
                    <div class="text-{{ $item['color'] }}-600 font-bold text-lg mb-2">{{ $item['year'] }}</div>
                    <h4 class="font-bold text-gray-800 mb-2">{{ $item['title'] }}</h4>
                    <p class="text-gray-600 text-sm">{{ $item['description'] }}</p>
                  </div>
                </div>
              @endif
            </div>
          @endforeach
        </div>
      </div>
    </div> --}}

    <!-- Vision & Mission -->
    <div class="grid md:grid-cols-2 gap-8 mb-16">
      <div class="bg-gradient-to-br from-blue-600 to-blue-700 text-white rounded-3xl p-8">
        <h3 class="text-2xl font-bold mb-4">Visi Kami</h3>
        <p class="text-blue-100 leading-relaxed">
          Menjadi perpustakaan akademik terdepan yang mengintegrasikan teknologi informasi modern untuk mendukung
          keunggulan dalam pendidikan, penelitian, dan pengabdian kepada masyarakat.
        </p>
      </div>
      <div class="bg-gradient-to-br from-indigo-600 to-indigo-700 text-white rounded-3xl p-8">
        <h3 class="text-2xl font-bold mb-4">Misi Kami</h3>
        <p class="text-indigo-100 leading-relaxed">
          Menyediakan akses informasi berkualitas, mengembangkan literasi digital, dan menciptakan lingkungan belajar yang
          kondusif untuk mendukung pencapaian visi universitas.
        </p>
      </div>
    </div>

    <!-- Gallery -->
    <div class="mb-16">
      <h3 class="text-3xl font-bold text-center mb-12 text-gray-800">Galeri Perpustakaan</h3>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        {{-- @foreach ($gallery as $item)
          <div class="gallery-item relative rounded-2xl shadow-lg hover-scale">
            <img src="{{ asset('images/gallery/' . $item['image']) }}" alt="{{ $item['title'] }}"
              class="w-full h-64 object-cover rounded-2xl">
            <div class="gallery-overlay absolute inset-0 rounded-2xl"></div>
            <div class="absolute bottom-4 left-4 text-white z-10">
              <h4 class="font-bold">{{ $item['title'] }}</h4>
              <p class="text-sm">{{ $item['description'] }}</p>
            </div>
          </div>
        @endforeach --}}
      </div>
    </div>

  </section>
  @extends('layout.app')

@section('title', 'Struktur Organisasi Perpustakaan')

@section('content')
  <div class="container py-5">
    <h2 class="text-center mb-5">Struktur Organisasi Perpustakaan</h2>

    {{-- Level 1 --}}
    <div class="text-center mb-4">
      @foreach ($organizations->where('level', 1) as $org)
        <div class="org-box mx-auto">
          {{ $org->position }}
          <br><small>{{ $org->name }}</small>
        </div>
      @endforeach
    </div>

    {{-- Level 2 --}}
    <div class="text-center mb-4">
      @foreach ($organizations->where('level', 2) as $org)
        <div class="org-box mx-auto">
          {{ $org->position }}
          <br><small>{{ $org->name }}</small>
        </div>
      @endforeach
    </div>

    {{-- Level 3 --}}
    <div class="d-flex justify-content-center flex-wrap gap-5 mb-4">
      @foreach ($organizations->where('level', 3) as $org)
        <div class="org-box">
          {{ $org->position }}
          <br><small>{{ $org->name }}</small>
        </div>
      @endforeach
    </div>

    {{-- Level 4 --}}
    <div class="d-flex justify-content-center flex-wrap gap-4">
      @foreach ($organizations->where('level', 4) as $org)
        <div class="org-box-sm">
          {{ $org->position }}
          <br><small>{{ $org->name }}</small>
        </div>
      @endforeach
    </div>
  </div>
@endsection

@section('style')
  <style>
    .org-box,
    .org-box-sm {
      border: 2px solid #0d6efd;
      border-radius: 8px;
      padding: 12px 20px;
      background-color: #e9f1ff;
      color: #0d6efd;
      font-weight: bold;
      text-align: center;
    }

    .org-box {
      min-width: 250px;
      margin-bottom: 10px;
    }

    .org-box-sm {
      min-width: 140px;
    }
  </style>

@endsection

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
      };

      const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
          }
        });
      }, observerOptions);

      document.querySelectorAll('.space-y-12 > div').forEach(item => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(30px)';
        item.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(item);
      });

      const counters = document.querySelectorAll('.text-3xl');
      counters.forEach(counter => {
        const target = parseInt(counter.textContent.replace(/[^\d]/g, ''));
        if (target > 0) {
          let current = 0;
          const increment = target / 100;
          const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
              counter.textContent = counter.textContent.replace(/^\d+/, target);
              clearInterval(timer);
            } else {
              counter.textContent = counter.textContent.replace(/^\d+/, Math.ceil(current));
            }
          }, 20);
        }
      });
    });
  </script>
@endpush
