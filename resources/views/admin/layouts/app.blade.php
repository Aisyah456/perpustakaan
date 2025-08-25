<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Dashboard') | Perpustakaan UMHT</title>

  {{-- Meta & Links --}}
  @include('admin.libs.meta')
  @include('admin.libs.link')

  {{-- Tailwind CSS --}}
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
  <div class="page-wrapper">
    <div class="main-container">

      {{-- Sidebar Menu --}}
      @include('admin.libs.menu')

      <div class="app-container">

        {{-- Header --}}
        <div class="app-header d-flex align-items-center">

          {{-- Toggle Buttons --}}
          <div class="d-flex align-items-center">
            <button class="toggle-sidebar">
              <i class="bi bi-list lh-1"></i>
            </button>
            <button class="pin-sidebar">
              <i class="bi bi-list lh-1"></i>
            </button>
          </div>

          {{-- Brand Small (Mobile) --}}
          <div class="app-brand-sm d-lg-none d-flex">
            <a href="{{ url('admin/dashboard') }}">
              <img src="{{ asset('lib/img/logoumht.png') }}" class="logo" alt="Logo UMHT">
            </a>
          </div>

          {{-- Page Title --}}
          <h5 class="m-0 ms-2 fw-semibold">@yield('title', 'Dashboard')</h5>

          {{-- Header Actions --}}
          @include('admin.libs.header')

        </div>
        {{-- End Header --}}

        {{-- Body --}}
        <div class="app-body">
          <div class="row gx-4">
            @yield('content')
          </div>
        </div>
        {{-- End Body --}}

        {{-- Footer --}}
        @include('admin.libs.footer')

      </div> {{-- End app-container --}}
    </div> {{-- End main-container --}}
  </div> {{-- End page-wrapper --}}

  {{-- Scripts --}}
  @include('admin.libs.script')
</body>

</html>
