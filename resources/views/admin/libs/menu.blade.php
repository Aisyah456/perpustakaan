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
        <a href="{{ url('Admin') }}">
          <i class="bi bi-bar-chart-line"></i>
          <span class="menu-text">Dashboard</span>
        </a>
      </li>

      {{-- Konten --}}
      @php
        $kontenActive =
            request()->is('admin/benners*') ||
            request()->is('admin/sejarah*') ||
            request()->is('admin/organisasi*') ||
            request()->is('admin/menus*');
      @endphp
      <li class="treeview {{ $kontenActive ? 'active current-page' : '' }}">
        <a href="#">
          <i class="bi bi-box"></i>
          <span class="menu-text">Konten</span>
        </a>
        <ul class="treeview-menu" style="{{ $kontenActive ? 'display:block;' : '' }}">
          <li class="{{ request()->is('admin/benners*') ? 'active' : '' }}"><a
              href="{{ url('/admin/benners') }}">Banner</a></li>
          <li class="{{ request()->is('admin/sejarah*') ? 'active' : '' }}"><a
              href="{{ url('/admin/sejarah') }}">Sejarah</a></li>
          <li class="{{ request()->is('admin/organisasi*') ? 'active' : '' }}"><a
              href="{{ url('/admin/organisasi') }}">Organisasi</a></li>
          <li class="{{ request()->is('admin/menus*') ? 'active' : '' }}"><a href="{{ url('/admin/menus') }}">Menu
              Layanan</a></li>
        </ul>
      </li>

      {{-- Informasi --}}
      @php
        $informasiActive =
            request()->is('admin/partners*') ||
            request()->is('admin/berita*') ||
            request()->is('admin/agenda*') ||
            request()->is('admin/artikel*') ||
            request()->is('admin/koleksi-terbaru*');
      @endphp
      <li class="treeview {{ $informasiActive ? 'active current-page' : '' }}">
        <a href="#">
          <i class="bi bi-info-circle"></i>
          <span class="menu-text">Informasi</span>
        </a>
        <ul class="treeview-menu" style="{{ $informasiActive ? 'display:block;' : '' }}">
          <li class="{{ request()->is('admin/partners*') ? 'active' : '' }}"><a
              href="{{ url('/admin/partners') }}">Partner</a></li>
          <li class="{{ request()->is('admin/berita*') ? 'active' : '' }}"><a
              href="{{ url('/admin/berita') }}">Berita</a></li>
          <li class="{{ request()->is('admin/agenda*') ? 'active' : '' }}"><a
              href="{{ url('/admin/agenda') }}">Agenda</a></li>
          <li class="{{ request()->is('admin/artikel*') ? 'active' : '' }}"><a
              href="{{ url('/admin/artikel') }}">Artikel</a></li>
          <li class="{{ request()->is('admin/koleksi-terbaru*') ? 'active' : '' }}"><a
              href="{{ url('/admin/koleksi-terbaru') }}">Koleksi Terbaru</a></li>
        </ul>
      </li>

      {{-- Layanan --}}
      @php
        $layananActive =
            request()->is('admin/pustaka*') || request()->is('admin/turnitin*') || request()->is('admin/referensi*');
      @endphp
      <li class="treeview {{ $layananActive ? 'active current-page' : '' }}">
        <a href="#">
          <i class="bi bi-boxes"></i>
          <span class="menu-text">Layanan</span>
        </a>
        <ul class="treeview-menu" style="{{ $layananActive ? 'display:block;' : '' }}">
          <li class="{{ request()->is('admin/pustaka*') ? 'active' : '' }}"><a
              href="{{ url('/admin/pustaka') }}">Bebas Pustaka</a></li>
          <li class="{{ request()->is('admin/turnitin*') ? 'active' : '' }}"><a
              href="{{ url('/admin/turnitin') }}">Turnitin</a></li>
          <li class="{{ request()->is('admin/referensi*') ? 'active' : '' }}"><a
              href="{{ url('/admin/referensi') }}">Referensi</a></li>
        </ul>
      </li>

      {{-- Eresources --}}
      @php
        $eresourcesActive =
            request()->is('admin/eresources*') ||
            request()->is('admin/journals*') ||
            request()->is('admin/portal-jurnal*');
      @endphp
      <li class="treeview {{ $eresourcesActive ? 'active current-page' : '' }}">
        <a href="#">
          <i class="bi bi-journal-bookmark"></i>
          <span class="menu-text">Eresources</span>
        </a>
        <ul class="treeview-menu" style="{{ $eresourcesActive ? 'display:block;' : '' }}">
          <li class="{{ request()->is('admin/eresources*') ? 'active' : '' }}"><a
              href="{{ url('/admin/eresources') }}">Internal</a></li>
          <li class="{{ request()->is('admin/journals*') ? 'active' : '' }}"><a
              href="{{ url('/admin/journals') }}">Database</a></li>
          <li class="{{ request()->is('admin/portal-jurnal*') ? 'active' : '' }}"><a
              href="{{ url('/admin/portal-jurnal') }}">Portal Jurnal</a></li>
        </ul>
      </li>

      {{-- Download --}}
      @php
        $downloadActive =
            request()->is('admin/guides*') ||
            request()->is('admin/internal-documents*') ||
            request()->is('admin/external-documents*') ||
            request()->is('admin/research-tools*');
      @endphp
      <li class="treeview {{ $downloadActive ? 'active current-page' : '' }}">
        <a href="#">
          <i class="bi bi-cloud-arrow-down"></i>
          <span class="menu-text">Download</span>
        </a>
        <ul class="treeview-menu" style="{{ $downloadActive ? 'display:block;' : '' }}">
          <li class="{{ request()->is('admin/guides*') ? 'active' : '' }}"><a
              href="{{ url('/admin/guides') }}">Panduan</a></li>
          <li class="{{ request()->is('admin/internal-documents*') ? 'active' : '' }}"><a
              href="{{ url('/admin/internal-documents') }}">Dokumen Internal</a></li>
          <li class="{{ request()->is('admin/external-documents*') ? 'active' : '' }}"><a
              href="{{ url('/admin/external-documents') }}">Dokumen Eksternal</a></li>
          <li class="{{ request()->is('admin/research-tools*') ? 'active' : '' }}"><a
              href="{{ url('/admin/research-tools') }}">Research Tools</a></li>
        </ul>
      </li>

      {{-- Kalender --}}
      <li class="{{ request()->is('admin/calendar*') ? 'active current-page' : '' }}">
        <a href="{{ url('/admin/calendar') }}">
          <i class="bi bi-calendar2"></i>
          <span class="menu-text">Kalender</span>
        </a>
      </li>

      {{-- Notifikasi --}}
      <li class="{{ request()->is('admin/notifications*') ? 'active current-page' : '' }}">
        <a href="{{ url('/admin/notifications') }}">
          <i class="bi bi-bell"></i>
          <span class="menu-text">Notifikasi</span>
        </a>
      </li>

      {{-- Login & Signup --}}
      @php
        $authActive =
            request()->is('login') ||
            request()->is('signup') ||
            request()->is('forgot-password') ||
            request()->is('reset-password') ||
            request()->is('lock-screen');
      @endphp
      <li class="treeview {{ $authActive ? 'active current-page' : '' }}">
        <a href="#">
          <i class="bi bi-person"></i>
          <span class="menu-text">Login/Signup</span>
        </a>
        <ul class="treeview-menu" style="{{ $authActive ? 'display:block;' : '' }}">
          <li class="{{ request()->is('login') ? 'active' : '' }}"><a href="{{ url('/login') }}">Login</a></li>
          <li class="{{ request()->is('signup') ? 'active' : '' }}"><a href="{{ url('/signup') }}">Signup</a></li>
          <li class="{{ request()->is('forgot-password') ? 'active' : '' }}"><a
              href="{{ url('/forgot-password') }}">Lupa Password</a></li>
          <li class="{{ request()->is('reset-password') ? 'active' : '' }}"><a
              href="{{ url('/reset-password') }}">Reset Password</a></li>
          <li class="{{ request()->is('lock-screen') ? 'active' : '' }}"><a href="{{ url('/lock-screen') }}">Lock
              Screen</a></li>
        </ul>
      </li>

    </ul>
  </div>
</nav>
