        <!-- ADDRESS
        ================================================== -->
        <div class="overflow-visible">
            <div class="container">
                <div class="row footer-address">
                    <div class="col-lg-3 mb-3 mb-lg-0">
                        <div class="bg-primary shadow p-1-9 border-radius-10 text-center h-100 word-wrap">
                            <div class="footer-logo mx-auto">
                                <a href="index.html">
                                    <img src="{{ asset('lib/img/logos/logo umht2020 (4).png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="bg-white p-1-9 shadow border-radius-10 position-relative word-wrap">
                            <div class="row mt-n3">
                                <div class="col-md-4 mt-3">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="ti-location-pin display-24 mt-1 d-block text-primary"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="mb-0">Jl. Raya Pd. Gede Nomor 23-25, RT.2/RW.1, sKota Jakarta
                                                Timur</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="ti-mobile display-24 mt-1 d-block text-primary"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="mb-0">(021) 809 6411</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="ti-email display-24 mt-1 d-block text-primary"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="mb-0">https://www.thamrin.ac.id/</p>
                                            {{-- <p class="mb-0">info@yourdomain</p> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- FOOTER
        ================================================== -->
        <footer class="footer-style01 pt-0 overflow-visible bg-secondary">
            <div class="container">
                <div class="row mt-n2-9">
                    <div class="col-sm-6 col-lg-4 pe-5 mt-2-9">
                        <div class="footer-top">
                            <h3 class="mb-1-9 h5">About us</h3>
                            <p class="mb-1-6 text-white">Website Perpustakaan Universitas Mohammad Husni Thamrin
                                menyediakan informasi koleksi buku, layanan peminjaman, serta akses jurnal dan referensi
                                akademik untuk mendukung kegiatan belajar dan penelitian mahasiswa serta dosen.
                                challenges.</p>
                            <ul class="social-icon-style6 mb-0 d-inline-block list-unstyled">
                                <li class="d-inline-block me-2"><a href="#!"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="d-inline-block me-2"><a href="#!"><i
                                            class="fa-brands fa-x-twitter"></i></a></li>
                                <li class="d-inline-block me-2"><a href="#!"><i class="fab fa-youtube"></i></a>
                                </li>
                                <li class="d-inline-block"><a href="#!"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-2 mt-2-9">
                        <h3 class="h5 mb-1-9">Services</h3>
                        <ul class="footer-list ps-0">
                            <li>
                                <a href="strategic-planning.html">Strategic Planning</a>
                            </li>
                            <li>
                                <a href="market-analysis.html">Market Analysis</a>
                            </li>
                            <li>
                                <a href="finance-planning.html">Finance Planning</a>
                            </li>
                            <li>
                                <a href="investment-idea.html">Investment Idea</a>
                            </li>
                            <li>
                                <a href="digital-solutions.html">Digital Solutions</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-2-9">
                        <h3 class="h5 mb-1-9">Recent News</h3>
                        <div class="d-flex mb-1-9">
                            <div class="flex-shrink-0 image-hover">
                                <img src="{{ asset('lib/img/content/footer-thumb1.jpg') }}" class="rounded"
                                    alt="...">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h4 class="text-white mb-2 h6"><a href="blog-details.html"
                                        class="text-white text-primary-hover">People saying about business.</a></h4>
                                <small class="text-white opacity7">8 Jan, 2024</small>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="flex-shrink-0 image-hover">
                                <img src="{{ asset('lib/img/content/footer-thumb2.jpg') }}" class="rounded"
                                    alt="...">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h4 class="text-white mb-2 h6"><a href="blog-details.html"
                                        class="text-white text-primary-hover">Providing all types of business</a></h4>
                                <small class="text-white opacity7">3 Jan, 2024</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-2-9">
                        <h3 class="h5 mb-1-9">NewsLetter</h3>
                        <p class="text-white">Subscribe to our newsletter for discounts and more.</p>
                        <form class="quform newsletter-form"
                            action="https://advisorhtml.websitelayout.net/quform/newsletter-two.php" method="post"
                            enctype="multipart/form-data" onclick="">

                            <div class="quform-elements">

                                <div class="row">

                                    <!-- Begin Text input element -->
                                    <div class="col-md-12">
                                        <div class="quform-element">
                                            <div class="quform-input">
                                                <input class="form-control" id="email_address" type="text"
                                                    name="email_address" placeholder="Subscribe with us" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Text input element -->

                                    <!-- Begin Submit button -->
                                    <div class="col-md-12">
                                        <div class="quform-submit-inner">
                                            <button class="butn-style4 white-hover border-0 w-100"
                                                type="submit"><span>Subscribe</span></button>
                                        </div>
                                        <div class="quform-loading-wrap text-center"><span
                                                class="quform-loading"></span></div>
                                    </div>
                                    <!-- End Submit button -->

                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="footer-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <p>&copy; <span class="current-year"></span> Perpustakaan
                                Universitas Mohammad Husni Thamrin <a href="#!"
                                    class="text-primary text-white-hover">Develop By Pustikom</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
