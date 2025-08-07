<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from elearn.websitelayout.net/faq.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:16 GMT -->

<head>
  @include('home.libs.meta')
  <!-- title  -->
  <title>Perpanduan Layanan Perpustakaan UMHT - Perpustakaan UMHT</title>
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
            <h1>Panduan Layanan </h1>
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

    <!-- FAQ
        ================================================== -->
    <div class="container py-10 px-4 mx-auto">
      <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">📚 Koleksi Perpustakaan</h1>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Katalog Online -->
        <div class="p-6 bg-gradient-to-r from-white to-gray-50 shadow-md rounded-xl transition hover:shadow-xl">
          <h2 class="text-xl font-semibold text-indigo-700 mb-2">📖 Katalog Online</h2>
          <p>
            <a href="https://perpustakaan.thamrin.ac.id/katalog" class="text-blue-600 hover:text-blue-800 underline"
              target="_blank">
              perpustakaan.thamrin.ac.id/katalog
            </a>
          </p>
        </div>

        <!-- Repository -->
        <div class="p-6 bg-gradient-to-r from-white to-gray-50 shadow-md rounded-xl transition hover:shadow-xl">
          <h2 class="text-xl font-semibold text-indigo-700 mb-2">📂 Repository</h2>
          <p>
            <a href="https://repository.thamrin.ac.id" class="text-blue-600 hover:text-blue-800 underline"
              target="_blank">
              repository.thamrin.ac.id
            </a>
          </p>
        </div>

        <!-- Ebook Kubuku -->
        <div class="p-6 bg-gradient-to-r from-white to-gray-50 shadow-md rounded-xl transition hover:shadow-xl">
          <h2 class="text-xl font-semibold text-indigo-700 mb-2">📱 Ebook Kubuku</h2>
          <ul class="list-disc pl-5 space-y-1 text-gray-700">
            <li>
              Playstore:
              <a href="https://play.google.com/store/apps/details?id=id.kubuku.kbk7695ac2&pli=1"
                class="text-blue-600 hover:text-blue-800 underline" target="_blank">
                Thamrin Digital Library
              </a>
            </li>
            <li>
              App Store:
              <a href="https://apps.apple.com/id/app/thamrin-digital-library/id6468453717"
                class="text-blue-600 hover:text-blue-800 underline" target="_blank">
                Thamrin Digital Library
              </a>
            </li>
          </ul>
        </div>

        <!-- Ebook Gramedia -->
        <div class="p-6 bg-gradient-to-r from-white to-gray-50 shadow-md rounded-xl transition hover:shadow-xl">
          <h2 class="text-xl font-semibold text-indigo-700 mb-2">📘 Ebook Gramedia</h2>
          <ul class="list-disc pl-5 space-y-1 text-gray-700">
            <li>
              Playstore:
              <a href="https://play.google.com/store/apps/details?id=com.appsfoundry.smartlibrary"
                class="text-blue-600 hover:text-blue-800 underline" target="_blank">
                Smart Library
              </a>
            </li>
            <li>
              App Store:
              <a href="https://apps.apple.com/id/app/smart-library/id1352891664"
                class="text-blue-600 hover:text-blue-800 underline" target="_blank">
                Smart Library
              </a>
            </li>
          </ul>
        </div>

        <!-- Jurnal Internasional -->
        <div
          class="p-6 bg-gradient-to-r from-white to-gray-50 shadow-md rounded-xl col-span-1 md:col-span-2 transition hover:shadow-xl">
          <h2 class="text-xl font-semibold text-indigo-700 mb-3">🌍 Jurnal Internasional</h2>
          <ul class="list-disc pl-5 space-y-1 text-gray-700">
            <li>Kesehatan & Kedokteran:
              <a href="https://link.gale.com/apps/PPNU?u=fjkthlt" class="text-blue-600 hover:text-blue-800 underline"
                target="_blank">Akses</a>
            </li>
            <li>Teknik:
              <a href="https://link.gale.com/apps/PPGS?u=fjktsci" class="text-blue-600 hover:text-blue-800 underline"
                target="_blank">Akses</a>
            </li>
            <li>Ekonomi:
              <a href="https://galeapps.gale.com/apps/auth?userGroupName=fjktbus&origURL=https%3A%2F%2Fgo.gale.com%2Fps%2Fstart.do%3Fp%3DPPBE%26u%3Dfjktbus%26aty%3Dsso%3A%2520password&prodId=PPBE"
                class="text-blue-600 hover:text-blue-800 underline" target="_blank">Akses</a>
            </li>
            <li>Sosial:
              <a href="https://link.gale.com/apps/SPJ.SP00?u=jkthum" class="text-blue-600 hover:text-blue-800 underline"
                target="_blank">Akses</a>
            </li>
          </ul>
        </div>

        <!-- Jurnal Nasional -->
        <div
          class="p-6 bg-gradient-to-r from-white to-gray-50 shadow-md rounded-xl col-span-1 md:col-span-2 transition hover:shadow-xl">
          <h2 class="text-xl font-semibold text-indigo-700 mb-3">📗 Jurnal Nasional</h2>
          <p class="text-gray-700 mb-2">Tersedia sesuai kebutuhan akreditasi program studi:</p>
          <ul class="list-disc pl-5 space-y-1 text-gray-700">
            <li>FKES</li>
            <li>FKOM</li>
            <li>FEB</li>
            <li>FKIP</li>
          </ul>
          <p class="mt-3 italic text-sm text-gray-500">*Link daftar jurnal disesuaikan saat akreditasi prodi.</p>
        </div>

        <!-- OneSearch -->
        <div
          class="p-6 bg-gradient-to-r from-white to-gray-50 shadow-md rounded-xl col-span-1 md:col-span-2 transition hover:shadow-xl">
          <h2 class="text-xl font-semibold text-indigo-700 mb-2">🔎 OneSearch</h2>
          <p>
            <a href="https://onesearch.id/Search/Results?filter[]=repoId:IOS19533"
              class="text-blue-600 hover:text-blue-800 underline" target="_blank">
              Akses OneSearch Nasional
            </a>
          </p>
        </div>
      </div>
    </div>





    @include('home.libs.footer')
  </div>
  @include('home.libs.script')
</body>

<!-- Mirrored from elearn.websitelayout.net/faq.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:16 GMT -->

</html>
