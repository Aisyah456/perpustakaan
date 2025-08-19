<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Dashboard') | Perpustakaan UMHT </title>

  <!-- Meta -->
  @include('admin.libs.meta')
  @include('admin.libs.link')

  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
  <div class="page-wrapper">
    <div class="main-container">
      @include('admin.libs.menu')

      <div class="app-container">

        <!-- App header starts -->
        <div class="app-header d-flex align-items-center">

          <!-- Toggle buttons starts -->
          <div class="d-flex align-items-center">
            <button class="toggle-sidebar">
              <i class="bi bi-list lh-1"></i>
            </button>
            <button class="pin-sidebar">
              <i class="bi bi-list lh-1"></i>
            </button>
          </div>
          <!-- Toggle buttons ends -->

          <!-- App brand sm starts -->
          <div class="app-brand-sm d-lg-none d-flex">

            <!-- Logo sm starts -->
            <a href="admin/dasboard">
              <img src="{{ asset('lib/img/logoumht.png') }}" class="logo" alt="Bootstrap Gallery">
            </a>
            <!-- Logo sm end -->

          </div>
          <!-- App brand sm ends -->

          <!-- Page title starts -->
          <h5 class="m-0 ms-2 fw-semibold">@yield('title', 'Dashboard')</h5>
          <!-- Page title ends -->

          <!-- App header actions starts -->
          @include('admin.libs.header')
          <!-- App header actions ends -->

        </div>
        <!-- App header ends -->

        <!-- App body starts -->
        <div class="app-body">

          <!-- Row starts -->
          <div class="row gx-4">



            @yield('content')
          </div>
        </div>



        @include('admin.libs.footer')
      </div>
      @include('admin.libs.script')
</body>


<!-- Mirrored from bootstrapget.com/demos/cube-admin-template/accordions.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jan 2025 02:51:17 GMT -->

</html>
