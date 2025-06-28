<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from elearn.websitelayout.net/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:23 GMT -->

<head>
  @include('home.libs.meta')
  <!-- title  -->
  <title>Panduan E - Book Perpustakaan UMHT - Perpustakaan UMHT</title>
  @include('home.libs.link')
</head>

<body>

  <!-- PAGE LOADING
    ================================================== -->
  <div id="preloader"></div>

  <!-- MAIN WRAPPER
    ================================================== -->
  <div class="main-wrapper">

    <!-- HEADER
        ================================================== -->
    @include('home.libs.menu')

    <!-- PAGE TITLE
        ================================================== -->
    <section class="page-title-section bg-img cover-background top-position1"
      style="position: relative; background-image: url('{{ asset('lib/img/banner/page-title.jpg') }}'); background-size: cover; background-position: center;">

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
            <h1>Panduan E-Book</h1>
          </div>
          <div class="col-md-12">
            <ul>
              <li><a href="/Home">Home</a></li>
              <li><a href="#!">Panduan</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>


    <!-- KONTEN
        ================================================== -->
    <section>
      <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold text-blue-700 mb-4">Panduan Akses E-Book</h1>

        <p class="text-gray-700 mb-4">
          Perpustakaan Universitas Mohammad Husni Thamrin menyediakan akses e-book untuk mendukung proses pembelajaran
          dan penelitian bagi seluruh sivitas akademika. Koleksi e-book tersedia secara online dan dapat diakses kapan
          saja dan di mana saja.
        </p>

        <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
          <p class="text-blue-800"><strong>Catatan:</strong> Pastikan Anda memiliki akun perpustakaan yang aktif untuk
            dapat mengakses layanan e-book.</p>
        </div>

        <div class="mb-6">
          <h2 class="text-lg font-semibold text-blue-600 mb-2">Cara Mengakses E-Book</h2>
          <ol class="list-decimal list-inside text-gray-800 space-y-2">
            <li>Kunjungi website <a href="https://perpustakaan.thamrin.ac.id"
                class="text-blue-600 underline">perpustakaan.thamrin.ac.id</a></li>
            <li>Pilih menu <strong>Layanan &gt; E-Book</strong></li>
            <li>Login menggunakan akun perpustakaan Anda (NIM/NIDN dan password)</li>
            <li>Gunakan fitur pencarian untuk mencari judul atau topik e-book</li>
            <li>Klik <strong>Baca</strong> untuk membaca online, atau <strong>Unduh</strong> jika tersedia</li>
          </ol>
        </div>

        <div class="mb-6">
          <h2 class="text-lg font-semibold text-blue-600 mb-2">Syarat & Ketentuan</h2>
          <ul class="list-disc list-inside text-gray-800 space-y-2">
            <li>E-Book hanya untuk keperluan akademik dan penelitian</li>
            <li>Dilarang memperbanyak atau menyebarluaskan isi e-book tanpa izin</li>
            <li>Maksimal 3 unduhan per hari untuk menjaga kestabilan layanan</li>
          </ul>
        </div>

        <div class="mb-6">
          <h2 class="text-lg font-semibold text-blue-600 mb-2">Kontak Bantuan</h2>
          <p class="text-gray-700">
            Jika mengalami kendala saat akses, hubungi kami melalui:
          </p>
          <ul class="mt-2 text-gray-700 space-y-1">
            <li>Email: <a href="mailto:perpustakaan@thamrin.ac.id"
                class="text-blue-600 underline">perpustakaan@thamrin.ac.id</a></li>
            <li>WhatsApp: <a href="https://wa.me/6281234567890" class="text-blue-600 underline">+62 812-3456-7890</a>
            </li>
            <li>Atau datang langsung ke Layanan Digital di ruang perpustakaan</li>
          </ul>
        </div>

        <div class="mt-6">
          <a href="{{ url('/layanan') }}" class="text-blue-600 hover:underline">← Kembali ke Daftar Layanan</a>
        </div>
      </div>

      <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold text-blue-700 mb-4">Daftar Koleksi E-Book</h1>

        <form method="GET" class="mb-6 grid grid-cols-1 md:grid-cols-4 gap-4">
          <input type="text" name="search" placeholder="Cari judul e-book..." value="{{ request('search') }}"
            class="border rounded px-3 py-2 w-full" />

          <select name="kategori" class="border rounded px-3 py-2 w-full">
            <option value="">Semua Kategori</option>
            <option value="Teknologi" {{ request('kategori') == 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
            <option value="Kesehatan" {{ request('kategori') == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
            <option value="Bisnis" {{ request('kategori') == 'Bisnis' ? 'selected' : '' }}>Bisnis</option>
          </select>

          <select name="tahun" class="border rounded px-3 py-2 w-full">
            <option value="">Semua Tahun</option>
            @for ($year = now()->year; $year >= 2000; $year--)
              <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>{{ $year }}
              </option>
            @endfor
          </select>

          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Cari</button>
        </form>

        <table class="min-w-full bg-white shadow border">
          <thead>
            <tr class="bg-blue-100 text-blue-700">
              <th class="py-2 px-4">Judul</th>
              <th class="py-2 px-4">Penulis</th>
              <th class="py-2 px-4">Kategori</th>
              <th class="py-2 px-4">Tahun</th>
              <th class="py-2 px-4">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($ebooks as $ebook)
              <tr class="border-t">
                <td class="py-2 px-4">{{ $ebook->judul }}</td>
                <td class="py-2 px-4">{{ $ebook->penulis }}</td>
                <td class="py-2 px-4">{{ $ebook->kategori }}</td>
                <td class="py-2 px-4">{{ $ebook->tahun }}</td>
                <td class="py-2 px-4">
                  @if ($ebook->file_ebook)
                    <a href="{{ asset('storage/' . $ebook->file_ebook) }}" class="text-blue-600 underline"
                      target="_blank">Baca</a>
                  @else
                    <span class="text-gray-500 italic">Belum tersedia</span>
                  @endif
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="text-center py-4 text-gray-600">Tidak ada e-book ditemukan.</td>
              </tr>
            @endforelse
          </tbody>
        </table>

        <div class="mt-4">
          {{ $ebooks->withQueryString()->links() }}
        </div>
      </div>
    </section>

    @include('home.libs.footer')
  </div>
  @include('home.libs.script')

</body>


<!-- Mirrored from elearn.websitelayout.net/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:24 GMT -->

</html>
