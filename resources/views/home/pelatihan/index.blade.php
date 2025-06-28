<!DOCTYPE html>
<html lang="en">

<head>
    <!-- metas -->
    @include('home.libs.meta')
    <!-- title  -->
    <title>Pelatihan Literasi Informasi Perpustakaan UMHT | Perpustakaan UMHT </title>

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
                        <h1>Pelatihan Literasi Informasi Perpustakaan UMHT</h1>
                    </div>
                    <div class="col-md-12">
                        <ul>
                            <li><a href="/Home">Home</a></li>
                            <li><a href="#!">Category</a></li>
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
                    <h3>Pelatihan Literasi Informasi Perpustakaan UMHT</h3>
                    <p class="mb-1-4"><b>Perpustakaan Universitas Mohammad Husni Thamrin(UMHT)</b> rutin melaksanakan
                        <b>Pelatihan Literasi Informasi(LI)</b> yang dirancang untuk membekali individu dengan
                        keterampilan
                        dan pengetahuan esensial dalam mengakases, mengevaluasi dan menggunakan informasi secara efektif
                        di era digital.</h3>

                    <div class="col-lg-12 mt-1-9">
                        <div class="card border-radius-5 h-100 border-color-light-black">
                            <div class="card-body py-4 px-1-9 px-xl-2-6">
                                <h3 class="h5"><b>Tugas Pelatihan :</b></h3>
                                <ul class="list-style1 list-unstyled mb-0">
                                    <li>Meningkatkan kemampuan individu dalam menemukan informasi yang akurat dan
                                        terpercaya.</li>
                                    <li>Membantu individu untuk memahami dan menganalisis informasi secara kritis.</li>
                                    <li>Mengembangkan kemampuan individu untuk menggunakan informasi secara bertanggung
                                        jawab dan beretika.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-1-9">
                        <div class="card border-radius-5 h-100 border-color-light-black">
                            <div class="card-body py-4 px-1-9 px-xl-2-6">
                                <h3 class="h5"><b>Peket Materi Pelatihan Literasi Informasi :</b></h3>
                                <smalk>
                                    Pelatihan Literasi informasi di Perpustakaan UMHT terbagi menjadi lime jenis. Anda
                                    daoat
                                    memilih dari berbagai jenis pelatihan ini sesuai dengan kebutuhanmu, atau bahkan
                                    memilih untuk mengikuti semuanya untuk mendapatkan pemahaman yang komprehensif.
                                    Beberapa jenis/pilihan tersebut yaitu :
                                </smalk>
                                <ul class="list-style1 mb-0 list-unstyled">
                                    <li>Paket LI 1</li>
                                    <li>Paket LI 2</li>
                                    <li>Materi AI untuk mendukung riset</li>
                                    <li>Vosviewer</li>
                                    <li>Reference Manager</li>
                                </ul>
                                <small>Jika anda ingin mendafatar pada pelatihan ini, silahkan pilih jadwal pelatihan di
                                    bawah ini,
                                    lalu kontak admin melalui nomor WA yang ada pada website ini.
                                </small>
                            </div>
                        </div>
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


<!-- Mirrored from elearn.websitelayout.net/portfolio-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:22 GMT -->

</html>
