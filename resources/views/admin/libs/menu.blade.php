<nav id="sidebar" class="sidebar-wrapper">
  <!-- App brand -->
  <div class="app-brand p-3 my-2">
    <a href="{{ url('/admin') }}">
      <img src="{{ asset('doc/images/logos/logo (5).png') }}" class="logo" alt="Logo" />
    </a>
  </div>

  <!-- Sidebar menu -->
  <div class="sidebarMenuScroll">
    <ul class="sidebar-menu">

      {{-- Dashboard --}}
      <li class="{{ request()->is('admin') ? 'active current-page' : '' }}">
        <a href="{{ url('/admin') }}">
          <i class="bi bi-bar-chart-line"></i>
          <span class="menu-text">Dashboard</span>
        </a>
      </li>

      {{-- Konten --}}
      <li
        class="treeview {{ request()->is('about', 'banners', 'sejarah', 'organisasi') ? 'active current-page' : '' }}">
        <a href="#">
          <i class="bi bi-box"></i>
          <span class="menu-text">Konten</span>
        </a>
        <ul class="treeview-menu">
          {{-- <li><a href="{{ url('/about') }}">About Me</a></li> --}}
          <li><a href="{{ url('/banners') }}">Banner</a></li>
          <li><a href="{{ url('/sejarah') }}">Sejarah</a></li>
          <li><a href="{{ url('/organisasi') }}">Organisasi</a></li>
          <li><a href="{{ url('/admin/menus') }}">Menu Layanan</a></li>
        </ul>
      </li>

      {{-- Informasi --}}
      <li
        class="treeview {{ request()->is('admin/news', 'admin/artikel', 'admin/partners', 'admin/menus') ? 'active current-page' : '' }}">
        <a href="#">
          <i class="bi bi-info-circle"></i>
          <span class="menu-text">Informasi</span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/admin/news') }}">Berita</a></li>
          <li><a href="{{ url('/admin/news') }}">Agenda</a></li> {{-- Ganti jika punya endpoint khusus --}}
          <li><a href="{{ url('/admin/artikel') }}">Artikel</a></li>
          <li><a href="{{ url('/admin/partners') }}">Partner</a></li>
          <li><a href="{{ url('/admin/news') }}">Koleksi Terbaru</a></li> {{-- Ganti jika ada route khusus --}}

        </ul>
      </li>

      {{-- Layanan --}}
      <li
        class="treeview {{ request()->is('admin/plagiat', 'admin/pustaka', 'admin/turnitin', 'admin/referensi') ? 'active current-page' : '' }}">
        <a href="#">
          <i class="bi bi-boxes"></i>
          <span class="menu-text">Layanan</span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/admin/plagiat') }}">Cek Plagiarisme</a></li>
          <li><a href="{{ url('/admin/pustaka') }}">Bebas Pustaka</a></li>
          <li><a href="{{ url('/admin/turnitin') }}">Uji Turnitin</a></li>
          <li><a href="{{ url('/admin/referensi') }}">Referensi</a></li>
        </ul>
      </li>

      {{-- Eresources --}}
      <li
        class="treeview {{ request()->is('admin/eresources', 'admin/journals', 'admin/portal-jurnal') ? 'active current-page' : '' }}">
        <a href="#">
          <i class="bi bi-journal-bookmark"></i>
          <span class="menu-text">Eresources</span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/admin/eresources') }}">Internal</a></li>
          <li><a href="{{ url('/admin/journals') }}">Database</a></li>
          <li><a href="{{ url('/admin/portal-jurnal') }}">Portal Jurnal</a></li>
        </ul>
      </li>

      {{-- Download --}}
      <li
        class="treeview {{ request()->is('admin/guides', 'admin/internal-documents', 'admin/external-documents', 'admin/research-tools') ? 'active current-page' : '' }}">
        <a href="#">
          <i class="bi bi-cloud-arrow-down"></i>
          <span class="menu-text">Download</span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/admin/guides') }}">Panduan</a></li>
          <li><a href="{{ url('/admin/internal-documents') }}">Dokumen Internal</a></li>
          <li><a href="{{ url('/admin/external-documents') }}">Dokumen Eksternal</a></li>
          <li><a href="{{ url('/admin/research-tools') }}">Research Tools</a></li>
        </ul>
      </li>

      {{-- Notifications --}}
      <li class="{{ request()->is('notifications') ? 'active current-page' : '' }}">
        <a href="{{ url('/notifications') }}">
          <i class="bi bi-bell"></i>
          <span class="menu-text">Notifikasi</span>
        </a>
      </li>

      {{-- Calendar --}}
      <li class="{{ request()->is('calendar') ? 'active current-page' : '' }}">
        <a href="{{ url('/calendar') }}">
          <i class="bi bi-calendar2"></i>
          <span class="menu-text">Kalender</span>
        </a>
      </li>

      {{-- Login & Signup --}}
      <li
        class="treeview {{ request()->is('login', 'signup', 'forgot-password', 'reset-password', 'lock-screen') ? 'active current-page' : '' }}">
        <a href="#">
          <i class="bi bi-person"></i>
          <span class="menu-text">Login/Signup</span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/login') }}">Login</a></li>
          <li><a href="{{ url('/signup') }}">Signup</a></li>
          <li><a href="{{ url('/forgot-password') }}">Lupa Password</a></li>
          <li><a href="{{ url('/reset-password') }}">Reset Password</a></li>
          <li><a href="{{ url('/lock-screen') }}">Lock Screen</a></li>
        </ul>
      </li>

    </ul>
  </div>
</nav>
