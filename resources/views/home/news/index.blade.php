<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from elearn.websitelayout.net/blog-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:22 GMT -->

<head>
    @include('home.libs.meta')
    <!-- title  -->
    <title>Berita - Perpustakaan UMHT</title>
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
            data-background="img/bg/bg-04.jpg">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                        <h1>Berita</h1>
                    </div>
                    <div class="col-md-12">
                        <ul>
                            <li><a href="index-2.html">Cetegori</a></li>
                            <li><a href="#!">Berita</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- BLOG GRID
        ================================================== -->
        <section>
            <div class="container">
                <div class="section-heading">
                    <span class="sub-title">our news</span>
                    <h2 class="h1 mb-0">Our Latest Blog</h2>
                </div>

                <div class="row mt-n2-6">
                    @forelse ($news as $new)
                        <div class="col-md-6 col-lg-4 mt-2-6">
                            <article class="blog-style1 position-relative d-block mb-0">
                                <div class="img-holder position-relative d-block">
                                    <div class="image-hover">
                                        <img src="{{ asset('lib/img/content/' . $new->img) }}" alt="...">
                                    </div>
                                </div>
                                <div class="text-holder">
                                    <div class="category-box">
                                        <a href="#!">{{ $new->by }}</a>
                                    </div>
                                    <h3 class="display-25 font-weight-700 mb-3"><a href="blog-details.html">Skills that
                                            you can learn from eLearn.</a></h3>
                                    <div>
                                        <p>Duty obligations of business frequently occur pleasures enjoy...</p>
                                    </div>
                                    <div class="bottom-box">
                                        <div class="btn-box">
                                            <a href="blog-details.html">
                                                <span class="icon-right-arrow-1"></span>Read More
                                            </a>
                                        </div>
                                        <ul class="mb-0 ps-0">
                                            <li><span class="icon-calendar"></span>6 Jul 2023</li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                        @empty
                            <p>Berita Tidak ditemukan.</p>
                    @endforelse
                </div>
            </div>
            {{-- <div class="col-md-6 col-lg-4 mt-2-6">
                        <article class="blog-style1 position-relative d-block mb-0">
                            <div class="img-holder position-relative d-block">
                                <div class="image-hover">
                                    <img src="img/blog/blog-02.jpg" alt="...">
                                </div>
                            </div>
                            <div class="text-holder">
                                <div class="category-box">
                                    <a href="#!">Learning</a>
                                </div>
                                <h3 class="display-25 font-weight-700 mb-3"><a href="blog-details.html">Is eLearn any
                                        good? 7 ways you can be certain.</a></h3>
                                <div>
                                    <p>Duty obligations of business frequently occur pleasures enjoy...</p>
                                </div>
                                <div class="bottom-box">
                                    <div class="btn-box">
                                        <a href="blog-details.html">
                                            <span class="icon-right-arrow-1"></span>Read More
                                        </a>
                                    </div>
                                    <ul class="mb-0 ps-0">
                                        <li><span class="icon-calendar"></span>4 Jul 2023</li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-2-6">
                        <article class="blog-style1 position-relative d-block mb-0">
                            <div class="img-holder position-relative d-block">
                                <div class="image-hover">
                                    <img src="img/blog/blog-03.jpg" alt="...">
                                </div>
                            </div>
                            <div class="text-holder">
                                <div class="category-box">
                                    <a href="#!">Career</a>
                                </div>
                                <h3 class="display-25 font-weight-700 mb-3"><a href="blog-details.html">How will
                                        eLearn be in the future.</a></h3>
                                <div>
                                    <p>Duty obligations of business frequently occur pleasures enjoy...</p>
                                </div>
                                <div class="bottom-box">
                                    <div class="btn-box">
                                        <a href="blog-details.html">
                                            <span class="icon-right-arrow-1"></span>Read More
                                        </a>
                                    </div>
                                    <ul class="mb-0 ps-0">
                                        <li><span class="icon-calendar"></span>4 Jul 2023</li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-2-6">
                        <article class="blog-style1 position-relative d-block mb-0">
                            <div class="img-holder position-relative d-block">
                                <div class="image-hover">
                                    <img src="img/blog/blog-04.jpg" alt="...">
                                </div>
                            </div>
                            <div class="text-holder">
                                <div class="category-box">
                                    <a href="#!">Teacher</a>
                                </div>
                                <h3 class="display-25 font-weight-700 mb-3"><a href="blog-details.html">How eLearn Can
                                        Help You Improve Your Health.</a></h3>
                                <div>
                                    <p>Duty obligations of business frequently occur pleasures enjoy...</p>
                                </div>
                                <div class="bottom-box">
                                    <div class="btn-box">
                                        <a href="blog-details.html">
                                            <span class="icon-right-arrow-1"></span>Read More
                                        </a>
                                    </div>
                                    <ul class="mb-0 ps-0">
                                        <li><span class="icon-calendar"></span>30 Jun 2023</li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-2-6">
                        <article class="blog-style1 position-relative d-block mb-0">
                            <div class="img-holder position-relative d-block">
                                <div class="image-hover">
                                    <img src="img/blog/blog-05.jpg" alt="...">
                                </div>
                            </div>
                            <div class="text-holder">
                                <div class="category-box">
                                    <a href="#!">Awards</a>
                                </div>
                                <h3 class="display-25 font-weight-700 mb-3"><a href="blog-details.html">Why eLearn Had
                                        Been So Popular Till Now?</a></h3>
                                <div>
                                    <p>Duty obligations of business frequently occur pleasures enjoy...</p>
                                </div>
                                <div class="bottom-box">
                                    <div class="btn-box">
                                        <a href="blog-details.html">
                                            <span class="icon-right-arrow-1"></span>Read More
                                        </a>
                                    </div>
                                    <ul class="mb-0 ps-0">
                                        <li><span class="icon-calendar"></span>30 Jun 2023</li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-2-6">
                        <article class="blog-style1 position-relative d-block mb-0">
                            <div class="img-holder position-relative d-block">
                                <div class="image-hover">
                                    <img src="img/blog/blog-06.jpg" alt="...">
                                </div>
                            </div>
                            <div class="text-holder">
                                <div class="category-box">
                                    <a href="#!">Skill Development</a>
                                </div>
                                <h3 class="display-25 font-weight-700 mb-3"><a href="blog-details.html">Ten eLearn
                                        Tips You Need To Learn Now.</a></h3>
                                <div>
                                    <p>Duty obligations of business frequently occur pleasures enjoy...</p>
                                </div>
                                <div class="bottom-box">
                                    <div class="btn-box">
                                        <a href="blog-details.html">
                                            <span class="icon-right-arrow-1"></span>Read More
                                        </a>
                                    </div>
                                    <ul class="mb-0 ps-0">
                                        <li><span class="icon-calendar"></span>26 Jun 2023</li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div> --}}
    </div>

    <div class="row">
        <div class="col-sm-12">
            <!-- start pager  -->
            <div class="text-center mt-6 mt-lg-7">
                <div class="pagination text-extra-dark-gray">
                    <ul>
                        <li><a href="#!" class="me-3"><i class="fas fa-long-arrow-alt-left"></i></a>
                        </li>
                        <li class="active"><a href="#!" class="me-2">1</a></li>
                        <li><a href="#!" class="me-2">2</a></li>
                        <li><a href="#!" class="me-3">3</a></li>
                        <li><a href="#!"><i class="fas fa-long-arrow-alt-right"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- end pager -->
        </div>
    </div>
    </div>
    </section>


    @include('home.libs.footer')
    </div>
    @include('home.libs.script')

    <!-- all js include end -->

</body>


<!-- Mirrored from elearn.websitelayout.net/blog-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 06:53:23 GMT -->

</html>
