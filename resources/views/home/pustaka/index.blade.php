<!DOCTYPE html>
<html lang="en">

<head>
    <!-- metas -->
    @include('home.libs.meta')
    <!-- title  -->
    <title>Bebas Pustaka - Perpustkaan</title>

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
        <section class="page-title-section bg-img cover-background top-position1 left-overlay-dark" data-overlay-dark="9"
            data-background="{{ asset('lib/img/bg/laptop-computer-book-workplace-library-room.jpg   ') }}">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                        <h1>Layanan Bebas Pustaka Perpustakaan UMHT</h1>
                    </div>
                    <div class="col-md-12">
                        <ul>
                            <li><a href="/Home">Home</a></li>
                            <li><a href="#!">Pustaka</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- PORTFOLIO DETAILS
        ================================================== -->
        <section>
            <div class="container">
                <div class="col-12">
                    <div class="text-center mb-5">
                        <img src="{{ asset('lib/img/portfolio/images (3).jpg') }}"
                            class="primary-shadow border-radius-5" alt="...">
                    </div>

                    <h3>Surat Keterangan Bebas Pustaka</h3>
                    <p class="mb-1-4">Surat Keterangan Bebas Pustaka merupakan surat keterangan yang menunjukan bahwa
                        mahasiswa Untirta sudah menyelesaikan administrasi perpustakaan. Surat Keterangan Bebas Pustaka
                        digunkan untuk Syarat Wisuda, Pengambilan Ijazah dan Pindah Kuliah/Keluar.</p>
                    <h3>Keperluan Syarat Wisuda Dan Pengambilan Ijaxah</h3>

                    <div class="col-lg-12 mt-1-9">
                        <div class="card border-radius-5 h-100 border-color-light-black">
                            <div class="card-body py-4 px-1-9 px-xl-2-6">
                                <h3 class="h5">A. Keperluan Syarat Wisuda Dan Pengambilan Ijazah</h3>
                                <ul class="list-style1 list-unstyled mb-0">
                                    <li>Melampirkan Surat Bebas Pustaka dari Perpustakaan Fakultas (PDF/SCAN)</li>
                                    <li>Tidak memiliki pinjaman buku / denda di Perpustakaan Universita Mohammad
                                        Husni Thamrin</li>
                                    <li>Melampirkan bukti Donasi ebook dari Aplikasi Kubuku (PDF/screenchot).
                                        silahakan melakukan Donasi dengan akun sendiri.
                                        Lihat panduan Donasi
                                    </li>
                                    <li>Melakukan unggah karya ilmiah sesuai dengan format yang ditentukan dan telah
                                        diverifikasi fakultas di https://eresources.thamrin.ac.id/. Tutorial unggah
                                        mandiri karya ilmiah dapat dilihat di Repository</li>
                                    <p><i>*Bagi yang sudah melakukan unggah mandiri karya ilmiah dan diverifikasi
                                            pada tingkat fakultas agar tidak melakukan unggah ulang, cukup sertakan
                                            link/url pada form bebas pustaka</i></p>
                                    <li>Mengisi form pengajuan Bebas Pustaka ( https://link.untirta.ac.id/bp2024)
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-1-9">
                        <div class="card border-radius-5 h-100 border-color-light-black">
                            <div class="card-body py-4 px-1-9 px-xl-2-6">
                                <h3 class="h5"><b>Format Karya Ilmiah</b></h3>
                                <ul class="list-style1 mb-0 list-unstyled">
                                    <li> Melampirkan lembar Pengesahaan dan/atau Persetujuan Pembimbing dan Penguji
                                        yang sudah diberi tanda tangan dan stempel basah kemudian discan menjadi
                                        format PDF</li>
                                    <li>Melampirkan lembar Pernyataan Keaslian Karya Ilmiah yang sudah diberi
                                        ditanda tangan dan materai kemudian discan menjadi format PDF</li>
                                    <li>File karya ilmiah dalam bentuk PDF tanpa password dan watermark</li>
                                    <li>File karya ilmiah yang di unggah yaitu : file keseluruhan (fulltext) dan
                                        file yang dipisah per-bab :</li>

                                </ul>
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-12 mt-1-9">
                        <p> a. Karya ilmiah fultext (keseluruhan) maksimal 5 MB, diberi nama dengan
                            ketentuan :</p>
                        <div class="row mt-n1-9">
                            <div class="col-lg-6 mt-1-9">

                                <div class="card border-radius-5 h-100 border-color-light-black">
                                    <div class="card-body py-4 px-1-9 px-xl-2-6">
                                        <h3 class="h5">Isi File</h3>
                                        <ul class="list-style1 list-unstyled mb-0">
                                            <li>File Keseluruhan Karya Ilmiah (fulltext)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-1-9">
                                <div class="card border-radius-5 h-100 border-color-light-black">
                                    <div class="card-body py-4 px-1-9 px-xl-2-6">
                                        <h3 class="h5">Nama File</h3>
                                        <ul class="list-style1 mb-0 list-unstyled">
                                            <li>Nama_NIM_Fulltext</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-12 mt-1-9">
                        <p> b. Karya ilmiah yang dipisah per-bab, masing-masing ukuran file maksimal 1
                            MB
                            diberi nama dengan ketentuan sebagai berikut :</p>
                        <div class="row mt-n1-9">
                            <div class="col-lg-6 mt-1-9">
                                <div class="card border-radius-5 h-100 border-color-light-black">
                                    <div class="card-body py-4 px-1-9 px-xl-2-6">
                                        <h3 class="h5">Isi File</h3>
                                        <ul class="list-style1 list-unstyled mb-0">
                                            <li>Bukti Cek Plagiarisme (jika ada)</li>
                                            <li>COVER sd BAB I + References / Daftar Pustaka</li>
                                            <li>BAB II</li>
                                            <li>BAB III</li>
                                            <li>BAB IV</li>
                                            <li>BAB V</li>
                                            <li>BAB VI (jika ada)</li>
                                            <li>References / Daftar Pustaka</li>
                                            <li>Lampiran</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-1-9">
                                <div class="card border-radius-5 h-100 border-color-light-black">
                                    <div class="card-body py-4 px-1-9 px-xl-2-6">
                                        <h3 class="h5">Nama File</h3>
                                        <ul class="list-style1 mb-0 list-unstyled">
                                            <li>Nama_NIM_CP</li>
                                            <li>Nama_NIM_01</li>
                                            <li>Nama_NIM_02</li>
                                            <li>Nama_NIM_03</li>
                                            <li>Nama_NIM_04</li>
                                            <li>Nama_NIM_05</li>
                                            <li>Nama_NIM_06</li>
                                            <li>Nama_NIM_Ref</li>
                                            <li>Nama_NIM_Lamp</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-1-9">
                        <div class="card border-radius-5 h-100 border-color-light-black">
                            <div class="card-body py-4 px-1-9 px-xl-2-6">
                                <h3 class="h5">B. Keperluan Pindah Kuliah / Keluar</h3>
                                <ul class="list-style1 list-unstyled mb-0">
                                    <li>Melampirkan Surat Permohonan Pindah Kuliah (PDF). Informasi cek disini</li>
                                    <li>Melampirkan Surat Bebas Pustaka dari Perpustakaan Fakultas (PDF/scan)</li>
                                    <li>Tidak memiliki pinjaman buku/denda di UPA Perpustakaan Untirta. (dicek disini
                                        dengan memasukan NIM)</li>

                                </ul>
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


<!-- Mirrored from elearn.websitelayout.net/portfolio-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:22 GMT -->

</html>
