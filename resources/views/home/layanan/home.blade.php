    @include('home.layouts.add')

    <section>
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-6 text-center">
            <h1 class="fw-bold" style="color:orange;">Layanan</h1>
            <h4 class="text-success">Perpustakaan UMHT</h4>
            <hr style="border-top: 2px solid #0d4e15; width: 50%; margin: auto;">

            {{-- Tombol Panduan --}}
            <div class="mt-4 d-flex justify-content-center gap-3 flex-wrap">
              <button type="button" class="btn btn-outline-primary btn-sm px-4 py-2" data-bs-toggle="modal"
                data-bs-target="#panduanModal">
                <i class="fas fa-book-open me-2"></i>Panduan Layanan
              </button>
              <button type="button" class="btn btn-outline-success btn-sm px-4 py-2" data-bs-toggle="modal"
                data-bs-target="#infoModal">
                <i class="fas fa-info-circle me-2"></i>Informasi Umum
              </button>
            </div>
          </div>
        </div>

        <div class="row mb-2-9 mt-n2-6">
          @forelse ($menus as $menu)
            <div class="col-md-6 col-xl-3 mt-2-6 wow fadeInUp" data-wow-delay="100ms">
              <div class="card card-style06 border-color-light-black bg-transparent h-100">
                <div class="card-body text-center">
                  <div class="service-img">
                    <img src="{{ asset('lib/img/icons/' . $menu->foto) }}" alt="{{ $menu->judul }}"
                      class="position-relative z-index-9 mt-2-2 w-70px">
                    <div class="icon-circle"></div>
                  </div>
                  <h3 class="h5">
                    <a href="{{ $menu->link }}">{{ $menu->judul }}</a>
                  </h3>
                  <p class="mb-0"><i>{{ $menu->description }}</i></p>

                  {{-- Tombol Info Detail --}}
                  <button type="button" class="btn btn-link btn-sm text-info mt-2 p-0" data-bs-toggle="modal"
                    data-bs-target="#detailModal{{ $menu->id }}">
                    <i class="fas fa-info-circle me-1"></i>Detail Layanan
                  </button>
                </div>
                <div class="card-btn">
                  <div class="main-butn">
                    <span class="main-text">Read More</span>
                  </div>
                  <div class="hover-butn">
                    <a href="{{ $menu->link }}">
                      <span class="inner-butn">
                        <span class="hover-text">Read More</span>
                        <span class="btn-icon"><i class="fa-solid fa-arrow-right"></i></span>
                        <span class="btn-icon"><i class="fa-solid fa-arrow-right"></i></span>
                      </span>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            {{-- Modal Detail untuk setiap layanan --}}
            <div class="modal fade" id="detailModal{{ $menu->id }}" tabindex="-1"
              aria-labelledby="detailModalLabel{{ $menu->id }}" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header bg-light">
                    <h5 class="modal-title fw-bold text-success" id="detailModalLabel{{ $menu->id }}">
                      <i class="fas fa-cog me-2"></i>{{ $menu->judul }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-4 text-center mb-3">
                        <img src="{{ asset('lib/img/icons/' . $menu->foto) }}" alt="{{ $menu->judul }}"
                          class="img-fluid" style="max-width: 100px;">
                      </div>
                      <div class="col-md-8">
                        <h6 class="text-primary mb-3">Deskripsi Layanan:</h6>
                        <p class="text-muted">{{ $menu->description }}</p>

                        <h6 class="text-primary mb-2 mt-4">Fitur Utama:</h6>
                        <ul class="list-unstyled">
                          <li><i class="fas fa-check-circle text-success me-2"></i>Akses mudah dan cepat</li>
                          <li><i class="fas fa-check-circle text-success me-2"></i>Interface yang user-friendly</li>
                          <li><i class="fas fa-check-circle text-success me-2"></i>Dukungan 24/7</li>
                          <li><i class="fas fa-check-circle text-success me-2"></i>Terintegrasi dengan sistem
                            perpustakaan</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                      <i class="fas fa-times me-1"></i>Tutup
                    </button>
                    <a href="{{ $menu->link }}" class="btn btn-success">
                      <i class="fas fa-external-link-alt me-1"></i>Akses Layanan
                    </a>
                  </div>
                </div>
              </div>
            </div>
          @empty
            <div class="col-12 text-center">
              <div class="alert alert-info" role="alert">
                <i class="fas fa-info-circle me-2"></i>Data Menu Tidak Ada
              </div>
            </div>
          @endforelse
        </div>
      </div>
    </section>


    {{-- Modal Panduan Layanan --}}
    <div class="modal fade" id="panduanModal" tabindex="-1" aria-labelledby="panduanModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title fw-bold" id="panduanModalLabel">
              <i class="fas fa-book-open me-2"></i>Panduan Penggunaan Layanan Perpustakaan
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
              aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="accordion" id="panduanAccordion">
                  {{-- Langkah 1 --}}
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="fas fa-user-plus me-2 text-primary"></i>
                        <strong>Langkah 1: Registrasi & Login</strong>
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                      data-bs-parent="#panduanAccordion">
                      <div class="accordion-body">
                        <ol>
                          <li>Kunjungi halaman registrasi perpustakaan</li>
                          <li>Isi data diri dengan lengkap (NIM/NIP, nama, email, program studi)</li>
                          <li>Verifikasi email yang telah dikirimkan</li>
                          <li>Login menggunakan kredensial yang telah dibuat</li>
                        </ol>
                        <div class="alert alert-info mt-3">
                          <i class="fas fa-lightbulb me-2"></i>
                          <strong>Tips:</strong> Gunakan email institusi untuk proses verifikasi yang lebih cepat.
                        </div>
                      </div>
                    </div>
                  </div>

                  {{-- Langkah 2 --}}
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fas fa-search me-2 text-success"></i>
                        <strong>Langkah 2: Pencarian & Akses Koleksi</strong>
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                      data-bs-parent="#panduanAccordion">
                      <div class="accordion-body">
                        <ol>
                          <li>Gunakan fitur pencarian dengan kata kunci yang spesifik</li>
                          <li>Filter hasil pencarian berdasarkan kategori, tahun, atau penulis</li>
                          <li>Klik pada judul untuk melihat detail lengkap</li>
                          <li>Download atau baca online sesuai ketersediaan</li>
                        </ol>
                        <div class="alert alert-warning mt-3">
                          <i class="fas fa-exclamation-triangle me-2"></i>
                          <strong>Perhatian:</strong> Beberapa koleksi memerlukan akses khusus atau berbayar.
                        </div>
                      </div>
                    </div>
                  </div>

                  {{-- Langkah 3 --}}
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="fas fa-bookmark me-2 text-warning"></i>
                        <strong>Langkah 3: Peminjaman & Pengembalian</strong>
                      </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                      data-bs-parent="#panduanAccordion">
                      <div class="accordion-body">
                        <ol>
                          <li>Pilih buku yang ingin dipinjam</li>
                          <li>Klik tombol "Pinjam" dan konfirmasi peminjaman</li>
                          <li>Catat tanggal jatuh tempo pengembalian</li>
                          <li>Kembalikan buku sebelum tanggal jatuh tempo</li>
                        </ol>
                        <div class="alert alert-danger mt-3">
                          <i class="fas fa-clock me-2"></i>
                          <strong>Penting:</strong> Keterlambatan pengembalian akan dikenakan denda sesuai ketentuan.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              <i class="fas fa-times me-1"></i>Tutup
            </button>
            <button type="button" class="btn btn-primary">
              <i class="fas fa-download me-1"></i>Download Panduan PDF
            </button>
          </div>
        </div>
      </div>
    </div>

    {{-- Modal Informasi Umum --}}
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-success text-white">
            <h5 class="modal-title fw-bold" id="infoModalLabel">
              <i class="fas fa-info-circle me-2"></i>Informasi Umum Perpustakaan UMHT
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
              aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <h6 class="text-primary mb-3"><i class="fas fa-clock me-2"></i>Jam Operasional</h6>
                <table class="table table-sm table-striped">
                  <tbody>
                    <tr>
                      <td><strong>Senin - Jumat</strong></td>
                      <td>08:00 - 20:00 WIB</td>
                    </tr>
                    <tr>
                      <td><strong>Sabtu</strong></td>
                      <td>08:00 - 16:00 WIB</td>
                    </tr>
                    <tr>
                      <td><strong>Minggu</strong></td>
                      <td>Tutup</td>
                    </tr>
                  </tbody>
                </table>

                <h6 class="text-primary mb-3 mt-4"><i class="fas fa-phone me-2"></i>Kontak</h6>
                <ul class="list-unstyled">
                  <li><i class="fas fa-phone text-success me-2"></i>Telepon: (021) 1234-5678</li>
                  <li><i class="fas fa-envelope text-primary me-2"></i>Email: perpustakaan@umht.ac.id</li>
                  <li><i class="fas fa-map-marker-alt text-danger me-2"></i>Alamat: Jl. Pendidikan No. 123, Jakarta
                  </li>
                </ul>
              </div>
              <div class="col-md-6">
                <h6 class="text-primary mb-3"><i class="fas fa-rules me-2"></i>Peraturan Umum</h6>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item border-0 px-0">
                    <i class="fas fa-check-circle text-success me-2"></i>
                    Wajib menunjukkan kartu identitas
                  </li>
                  <li class="list-group-item border-0 px-0">
                    <i class="fas fa-check-circle text-success me-2"></i>
                    Menjaga ketenangan di area perpustakaan
                  </li>
                  <li class="list-group-item border-0 px-0">
                    <i class="fas fa-check-circle text-success me-2"></i>
                    Tidak diperbolehkan makan dan minum
                  </li>
                  <li class="list-group-item border-0 px-0">
                    <i class="fas fa-check-circle text-success me-2"></i>
                    Handphone dalam mode silent
                  </li>
                </ul>

                <h6 class="text-primary mb-3 mt-4"><i class="fas fa-chart-bar me-2"></i>Statistik</h6>
                <div class="row text-center">
                  <div class="col-4">
                    <div class="bg-light p-3 rounded">
                      <h4 class="text-primary mb-1">15,000+</h4>
                      <small class="text-muted">Koleksi Buku</small>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="bg-light p-3 rounded">
                      <h4 class="text-success mb-1">5,000+</h4>
                      <small class="text-muted">Anggota Aktif</small>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="bg-light p-3 rounded">
                      <h4 class="text-warning mb-1">24/7</h4>
                      <small class="text-muted">Akses Online</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              <i class="fas fa-times me-1"></i>Tutup
            </button>
            <button type="button" class="btn btn-success">
              <i class="fas fa-map-marked-alt me-1"></i>Lihat Lokasi
            </button>
          </div>
        </div>
      </div>
    </div>
    </div>
