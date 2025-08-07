@extends('home.dokumen.panduan.add')

@section('title', 'Panduan Akses Layanan Perpustakaan UMY')
@section('pege', 'Panduan')
@section('content')
  <div class="main-container">
    <div class="row g-4">

      <!-- Guidance Content Section -->
      <div class="col-lg-12">
        <div class="guidance-section">
          <h1 class="guidance-title">
            Panduan Akses Layanan Perpustakaan UMY
          </h1>

          <!-- Rector Decision Notice -->
          <div class="rector-decision">
            <p>
              Keputusan Rektor UMY No. 217/SK-UMY/IX/2017 tentang Pedoman Penulisan Tugas Akhir
              Mahasiswa UMY
            </p>
          </div>

          <!-- Click Here Link -->
          <a href="#" class="click-here-link" onclick="openRectorDecision()">
            Klik di sini
          </a>

          <!-- Guidance List -->
          <ul class="guidance-list">
            @forelse($panduan as $item)
              <li class="guidance-item">
                <a href="{{ route('panduan.show', $item->id) }}" class="guidance-link" title="{{ $item->deskripsi }}">
                  <i class="fas fa-bookmark guidance-icon"></i>
                  <span class="guidance-text">{{ $item->judul }}</span>
                </a>
              </li>
            @empty
            @endforelse
          </ul>
        </div>
      </div>
    </div>
  </div>

  @push('scripts')
    <script>
      function openVideoTutorial() {
        // Replace with actual video URL
        const videoUrl = 'https://www.youtube.com/watch?v=YOUR_VIDEO_ID';
        window.open(videoUrl, '_blank');
      }

      function openRectorDecision() {
        // Replace with actual rector decision document URL
        const documentUrl = '#';
        if (documentUrl !== '#') {
          window.open(documentUrl, '_blank');
        } else {
          alert('Dokumen keputusan rektor akan segera tersedia.');
        }
      }

      // Add smooth scrolling and interaction effects
      document.addEventListener('DOMContentLoaded', function() {
        // Animate guidance items on scroll
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

        // Observe all guidance items
        document.querySelectorAll('.guidance-item').forEach((item, index) => {
          item.style.opacity = '0';
          item.style.transform = 'translateY(20px)';
          item.style.transition = `all 0.6s ease ${index * 0.1}s`;
          observer.observe(item);
        });
      });
    </script>
  @endpush
@endsection
