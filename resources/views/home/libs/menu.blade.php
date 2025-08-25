        <!-- HEADER
        ================================================== -->
        <header class="header-style1 menu_area-light">
          <div class="navbar-default border-bottom border-color-light-white">
            <!-- start top search -->
            <div class="top-search bg-primary">
              <div class="container-fluid px-lg-1-6 px-xl-2-5 px-xxl-2-9">
                <form class="search-form" action="https://advisorhtml.websitelayout.net/search.html" method="GET"
                  accept-charset="utf-8">
                  <div class="input-group">
                    <span class="input-group-addon cursor-pointer">
                      <button class="search-form_submit fas fa-search text-white" type="submit"></button>
                    </span>
                    <input type="text" class="search-form_input form-control" name="s" autocomplete="off"
                      placeholder="Type & hit enter...">
                    <span class="input-group-addon close-search mt-1"><i class="fas fa-times"></i></span>
                  </div>
                </form>
              </div>
            </div>
            <!-- end top search -->
            <div class="container-fluid px-lg-1-6 px-xl-2-5 px-xxl-2-9">
              <div class="row align-items-center">
                <div class="col-12 col-lg-12">
                  <div class="menu_area alt-font">
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                      <div class="navbar-header navbar-header-custom">
                        <!-- start logo -->
                        <a href="/Home" class="navbar-brand"><img id="logo"
                            src="{{ asset('lib/img/logos/logo umht2020 (4).png') }}" alt="logo"></a>
                        <!-- end logo -->
                      </div>

                      <div class="navbar-toggler bg-primary"></div>

                      <!-- start menu area -->
                      <ul class="navbar-nav ms-auto" id="nav">
                        <li><a href="/Home" class="{{ request()->is('home') ? 'active' : '' }}">Home</a></li>

                        <!-- Profil -->
                        <li>
                          <a href="/profil-perpustakaan"
                            class="{{ request()->is('profil-perpustakaan') ? 'active' : '' }}">Profil</a>
                        </li>

                        <!-- Layanan -->
                        <li>
                          <a href="#" class="{{ request()->is('layanan/*') ? 'active' : '' }}">Layanan</a>
                          <ul>
                            <li><a href="/layanan/sirkulasi"
                                class="{{ request()->is('layanan/sirkulasi') ? 'active' : '' }}">Sirkulasi</a></li>
                            <li><a href="/layanan/referensi"
                                class="{{ request()->is('layanan/referensi') ? 'active' : '' }}">Referensi</a></li>
                            <li><a href="https://pustaka.thamrin.ac.id/" target="_blank">Usulan Buku</a></li>
                            <li><a href="/layanan/cek-pinjaman"
                                class="{{ request()->is('layanan/cek-pinjaman') ? 'active' : '' }}">Cek Pinjaman</a>
                            </li>
                            <li><a href="/layanan/layanan-bebas-pustaka-perpustakaan-umht"
                                class="{{ request()->is('layanan/layanan-bebas-pustaka-perpustakaan-umht') ? 'active' : '' }}">Bebas
                                Pustaka</a></li>
                            <li><a href="/home/layanan/konsultasi"
                                class="{{ request()->is('home/layanan/konsultasi') ? 'active' : '' }}">Layanan
                                Konsultasi</a></li>
                          </ul>
                        </li>

                        <!-- Koleksi -->
                        <li>
                          <a href="#" class="{{ request()->is('koleksi*') ? 'active' : '' }}">Koleksi</a>
                          <ul>
                            <li><a href="https://pustaka.thamrin.ac.id/" target="_blank">Katalog Online</a></li>
                            <li><a href="http://eresources.thamrin.ac.id/" target="_blank">Repository Digital</a></li>

                            <li>
                              <a href="#">Ebook Kubuku</a>
                              <ul>
                                <li><a
                                    href="https://play.google.com/store/apps/details?id=id.kubuku.kbk7695ac2&pli=1">Play
                                    Store</a></li>
                                <li><a href="https://apps.apple.com/id/app/thamrin-digital-library/id6468453717">App
                                    Store</a></li>
                              </ul>
                            </li>

                            <li>
                              <a href="#">Ebook Gramedia</a>
                              <ul>
                                <li><a
                                    href="https://play.google.com/store/apps/details?id=com.appsfoundry.smartlibrary">Play
                                    Store</a></li>
                                <li><a href="https://apps.apple.com/id/app/smart-library/id1352891664">App Store</a>
                                </li>
                              </ul>
                            </li>

                            <li>
                              <a href="#">Jurnal Internasional</a>
                              <ul>
                                <li><a href="https://link.gale.com/apps/PPNU?u=fjkthlt">Bidang Kesehatan &
                                    Kedokteran</a></li>
                                <li><a href="https://link.gale.com/apps/PPGS?u=fjktsci">Bidang Teknik</a></li>
                                <li><a
                                    href="https://galeapps.gale.com/apps/auth?userGroupName=fjktbus&origURL=https%3A%2F%2Fgo.gale.com%2Fps%2Fstart.do%3Fp%3DPPBE%26u%3Dfjktbus%26aty%3Dsso%3A%2520password&prodId=PPBE">Bidang
                                    Ekonomi</a></li>
                                <li><a href="https://link.gale.com/apps/SPJ.SP00?u=jkthum">Bidang Sosial</a></li>
                              </ul>
                            </li>

                            <li><a href="https://onesearch.id/Search/Results?filter[]=repoId:IOS19533">OneSearch</a>
                            </li>
                          </ul>
                        </li>

                        <!-- E-Resources -->
                        <li><a href="/eresources"
                            class="{{ request()->is('eresources') ? 'active' : '' }}">E-Resources</a></li>

                        <!-- Dokumen -->
                        <li>
                          <a href="#"
                            class="{{ request()->is('panduan-perpustakaan', 'dokumen-internal', 'dokumen-eksternal', 'research-tools') ? 'active' : '' }}">Dokumen</a>
                          <ul>
                            <li><a href="/panduan-perpustakaan"
                                class="{{ request()->is('panduan-perpustakaan') ? 'active' : '' }}">Panduan</a>
                            </li>
                            <li><a href="/dokumen-internal"
                                class="{{ request()->is('dokumen-internal') ? 'active' : '' }}">Dokumen Internal</a>
                            </li>
                            <li><a href="/dokumen-eksternal"
                                class="{{ request()->is('dokumen-eksternal') ? 'active' : '' }}">Dokumen Eksternal</a>
                            </li>
                            <li><a href="/research-tools"
                                class="{{ request()->is('research-tools') ? 'active' : '' }}">Research Tools</a></li>
                          </ul>
                        </li>

                        <!-- Update -->
                        <li>
                          <a href="#"
                            class="{{ request()->is('berita-perpus', 'agenda', 'artikel-perpus', 'koleksi-terbaru') ? 'active' : '' }}">Update</a>
                          <ul>
                            <li><a href="/berita-perpus"
                                class="{{ request()->is('berita-perpus') ? 'active' : '' }}">Berita</a></li>
                            <li><a href="/agenda-perpus"
                                class="{{ request()->is('agenda') ? 'active' : '' }}">Agenda</a></li>
                            <li><a href="/artikel-perpus"
                                class="{{ request()->is('artikel-perpus') ? 'active' : '' }}">Artikel</a>
                            </li>
                            <li><a href="/koleksi-terbaru"
                                class="{{ request()->is('koleksi-terbaru') ? 'active' : '' }}">Koleksi</a></li>
                          </ul>
                        </li>
                      </ul>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </header>

        <style>
          .navbar-nav li a.active {
            color: #007bff;
            font-weight: bold;
          }
        </style>
