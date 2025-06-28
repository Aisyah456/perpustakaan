<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Berita - Admin Perpustakaan UMHT</title>
  <!-- Meta -->
  @include('admin.libs.meta')
  @include('admin.libs.link')
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
            <a href="index.html">
              <img src="{{ asset('lib/images/logo-sm.svg') }}" class="logo" alt="Bootstrap Gallery">
            </a>
            <!-- Logo sm end -->

          </div>
          <!-- App brand sm ends -->

          <!-- Page title starts -->
          <h5 class="m-0 ms-2 fw-semibold">List Banners</h5>
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

            <div class="container">
              <a href="{{ route('banners.create') }}" class="btn btn-primary mb-3">Tambah Banner</a>

              @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
              @endif

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Subtitle</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($banners as $banner)
                    <tr>
                      <td>{{ $banner->id }}</td>
                      <td><img src="{{ asset('lib/img/banner/' . $banner->image) }}" width="100"></td>
                      <td>{{ $banner->title }}</td>
                      <td>{{ $banner->subtitle }}</td>
                      <td>
                        <a href="{{ route('banners.edit', $banner) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('banners.destroy', $banner) }}" method="POST"
                          style="display:inline-block">
                          @csrf
                          @method('DELETE')
                          <button onclick="return confirm('Hapus banner ini?')"
                            class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>



    @include('admin.libs.footer')
  </div>
  @include('admin.libs.script')
</body>


<!-- Mirrored from bootstrapget.com/demos/cube-admin-template/accordions.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jan 2025 02:51:17 GMT -->

</html>
