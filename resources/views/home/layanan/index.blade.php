<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from elearn.websitelayout.net/faq.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:16 GMT -->

<head>
    <!-- metas -->
    @include('home.libs.meta')
    <!-- title  -->
    <title>Layanan & Fasilitas Perpustakaan UMHT | Perpustakaan UMHT</title>

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
            data-background="{{ asset('lib/img/bg/book-library-with-open-textbook.jpg') }}">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                        <h1>Layanan Dan Fasilitas Perpustakaan UMHT</h1>
                    </div>

                </div>
            </div>
        </section>


        <!-- SERVICES
        ================================================== -->
        <section class="bg-light">
            <div class="container">
                <div class="row mt-n1-9">
                    @forelse ($layanans as $layanan)
                        <div class="col-md-6 col-xl-3 mt-1-9 wow fadeIn" data-wow-delay="100ms">
                            <div class="card card-style04">
                                <div class="card-body p-1-9 p-sm-2-6 pt-2-9 pt-sm-6 position-relative z-index-9">
                                    <div class="position-relative">
                                        <img src="{{ asset('lib/img/layanan/' . $layanan->img) }}"
                                            class="card-icon center w-60px" alt="...">
                                        <div class="icon-circle"></div>
                                    </div>
                                    <h3 class="h4 mb-3"><a href="fabric-dyeing.html"></a>{{ $layanan->judul }}</h3>
                                    <p class="mb-4">{{ $layanan->deskripsi }}</p>
                                    <a href="{{ $layanan->url }}" class="display-30 font-weight-600">Read More <i
                                            class="ti-arrow-right align-middle display-31"></i></a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p> Data Tidak Ada</p>
                    @endforelse
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
