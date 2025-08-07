<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from elearn.websitelayout.net/faq.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:16 GMT -->

<head>
  <!-- metas -->
  @include('home.libs.meta')
  <!-- title  -->
  <title>Layanan Turnitin Perpustakaan UMHT | Perpustakaan UMHT</title>

  <!-- favicon -->
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
            <h1>Layanan Turnitin Perpustakaan UMHT</h1>
          </div>
          <div class="col-md-12">
            <ul>
              <li><a href="/Home">Home</a></li>
              <li><a href="#!">Layanan</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>


    <!-- SERVICES ================================================== -->
    <section>
      <div class="container mx-auto px-4 py-6">
        <table class="table">
          <thead>
            <th>
              Nama Jurusan
            </th>
            <th>
              Kode
            </th>
            <th>
              dosen
            </th>
            <th>
              fakultas
            </th>
          </thead>
          <tbody>
            @foreach ($majors as $major)
              <tr>
                <td>{{ $major->name }}</td>
                <td>{{ $major->code }}</td>
                <td>{{ $major->lecture }}</td>
                <td>{{ $major->faculty->name }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </section>

    <section class="bg-light">
      <div class="container mx-auto px-4 py-6">
        <div class="bg-white rounded shadow-md p-6">
          <h1 class="text-2xl font-bold text-blue-700 mb-4">Layanan Uji Plagiarisme (Turnitin)</h1>

          <p class="mb-4 text-gray-700">
            Perpustakaan Universitas Mohammad Husni Thamrin menyediakan layanan uji plagiarisme menggunakan
            <strong>Turnitin</strong> untuk membantu sivitas akademika memastikan orisinalitas karya ilmiah mereka.
            Layanan ini diperuntukkan bagi mahasiswa, dosen, dan tenaga kependidikan yang ingin memeriksa tingkat
            kemiripan karya tulis ilmiahnya.
          </p>

          <h2 class="text-xl font-semibold text-blue-600 mt-6 mb-2">Ketentuan Layanan:</h2>
          <ul class="list-disc list-inside text-gray-700 mb-4">
            <li>Hanya untuk mahasiswa aktif, dosen, dan staf Universitas Mohammad Husni Thamrin</li>
            <li>File yang dikirim harus dalam format <strong>.doc / .docx</strong></li>
            <li>Hasil cek Turnitin akan dikirim melalui email maksimal 2x24 jam (hari kerja)</li>
            <li>Batas maksimal kemiripan untuk skripsi adalah <strong>25%</strong></li>
          </ul>

          <h2 class="text-xl font-semibold text-blue-600 mt-6 mb-4">Form Pengajuan Uji Turnitin:</h2>

          <form action="{{ route('turnitin.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div>
              <label class="block text-gray-700 font-medium">Nama Lengkap</label>
              <input type="text" name="nama" class="w-full p-2 border border-gray-300 rounded" required>
            </div>

            <div>
              <label class="block text-gray-700 font-medium">NIM / NIDN</label>
              <input type="text" name="nim_nidn" class="w-full p-2 border border-gray-300 rounded" required>
            </div>

            <div>
              <label class="block text-gray-700 font-medium">Email Aktif</label>
              <input type="email" name="email" class="w-full p-2 border border-gray-300 rounded" required>
            </div>

            <div>
              <label class="block text-gray-700 font-medium">Judul Karya Ilmiah</label>
              <input type="text" name="judul" class="w-full p-2 border border-gray-300 rounded" required>
            </div>

            <div>
              <label class="block text-gray-700 font-medium">Unggah File (.doc / .docx)</label>
              <input type="file" name="file" accept=".doc,.docx" class="w-full p-2 border border-gray-300 rounded"
                required>
            </div>

            <div class="pt-4">
              <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                Kirim Permohonan
              </button>
            </div>
          </form>

          <div class="mt-8 text-gray-600 text-sm">
            <p><strong>Catatan:</strong> Mohon pastikan file yang dikirim telah sesuai format dan bebas dari watermark
              atau pengunci file.</p>
          </div>
        </div>
      </div>
    </section>



    <!-- FOOTER
        ================================================== -->
    @include('home.libs.footer')
  </div>

  <!-- BUY TEMPLATE
    ================================================== -->
  @include('home.libs.script')

</body>

<!-- Mirrored from elearn.websitelayout.net/faq.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:16 GMT -->

</html>
