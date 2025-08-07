<div class="sidebar pe-xl-4">
  <div class="widget widget-nav-menu wow fadeInUp" data-wow-delay="200ms">
    <h4 class="widget-title text-white">Layanan Perpustakaan</h4>
    <div class="widget-body">
      <ul class="list-style4">
        <li><a href="{{ route('layanan.referensi') }}">Layanan Referensi</a></li>
        <li><a href="{{ route('layanan.sirkulasi') }}">Layanan Sirkulasi</a></li>
        <li><a href="{{ route('turnitin.form') }}">Layanan Uji Turnitin</a></li>
        <li><a href="{{ route('layanan.pustaka') }}">Layanan Bebas Pustaka</a></li>
        <li><a href="{{ route('cek-pinjaman') }}">Cek Pinjaman Buku</a></li>
        <li class="active"><a href="{{ route('panduan.index') }}">Panduan Layanan</a></li>
      </ul>
    </div>
  </div>

  <div class="widget widget-address wow fadeInUp" data-wow-delay="200ms">
    <h4 class="widget-title text-white">Kontak Perpustakaan</h4>
    <div class="widget-body">
      <div class="d-flex align-items-center mb-4">
        <div class="flex-shrink-0">
          <div class="contact-icon"><i class="far fa-envelope"></i></div>
        </div>
        <div class="flex-grow-1 ms-3">
          <h6 class="mb-1">Email</h6>
          <p class="mb-0">perpustakaan@umht.ac.id</p>
        </div>
      </div>
      <div class="d-flex align-items-center mb-4">
        <div class="flex-shrink-0">
          <div class="contact-icon"><i class="fas fa-phone-alt"></i></div>
        </div>
        <div class="flex-grow-1 ms-3">
          <h6 class="mb-1">Telepon</h6>
          <p class="mb-0">(021) 1234 5678</p>
        </div>
      </div>
      <div class="d-flex align-items-center">
        <div class="flex-shrink-0">
          <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
        </div>
        <div class="flex-grow-1 ms-3">
          <h6 class="mb-1">Alamat</h6>
          <p class="mb-0">Universitas Mohammad Husni Thamrin, Jakarta</p>
        </div>
      </div>
    </div>
  </div>
</div>
