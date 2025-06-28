<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from bootstrapget.com/demos/cube-admin-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jan 2025 02:50:49 GMT -->

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Perpustakaan - Perpustakaan UMHT</title>

  <!-- Meta -->
  @include('admin.libs.meta')
  @include('admin.libs.link')
</head>

<body>

  <!-- Page wrapper starts -->
  <div class="page-wrapper">

    <!-- Main container starts -->
    <div class="main-container">

      <!-- Sidebar wrapper -->
      @include('admin.libs.menu')
      <!-- Sidebar wrapper ends -->

      <!-- App container starts -->
      <div class="app-container">

        <!-- App header starts -->
        <div class="app-header d-flex align-items-center justify-content-between">

          <!-- Sidebar toggle buttons -->
          <div class="d-flex">
            <button class="toggle-sidebar me-2">
              <i class="bi bi-list lh-1"></i>
            </button>
            <button class="pin-sidebar">
              <i class="bi bi-list lh-1"></i>
            </button>
          </div>

          <!-- Brand (for small screens) -->
          <div class="app-brand-sm d-lg-none d-flex align-items-center">
            <a href="{{ url('/') }}">
              <img src="{{ asset('doc/images/logos/logoumht.png') }}" class="logo" alt="Logo UMHT">
            </a>
          </div>

          <!-- Page title -->
          <h5 class="m-0 ms-2 fw-semibold">Dashboard</h5>

          <!-- Header actions -->
          @include('admin.libs.header')

        </div>
        <!-- App header ends -->

        <!-- App body starts -->
        <div class="app-body">
          <div class="container">

            <h4 class="mb-3">Daftar Permintaan Referensi</h4>

            <!-- Alert success -->
            @if (session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif

            <!-- Table -->
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead class="table-light">
                  <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Topik</th>
                    <th>Status</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($data as $row)
                    <tr>
                      <td>{{ $row->nama }}</td>
                      <td>{{ $row->email }}</td>
                      <td>{{ $row->topik }}</td>
                      <td>
                        <span
                          class="badge bg-{{ $row->status == 'pending' ? 'warning' : ($row->status == 'diproses' ? 'info' : 'success') }}">
                          {{ ucfirst($row->status) }}
                        </span>
                      </td>
                      <td>
                        <a href="{{ route('referensi.edit', $row->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('referensi.destroy', $row->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Yakin hapus data ini?')">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="5" class="text-center text-muted">Belum ada data referensi.</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>

            <!-- Pagination -->
            <div class="mt-3">
              {{ $data->links() }}
            </div>

          </div>
        </div>
        <!-- App body ends -->

        <!-- App footer -->
        @include('admin.libs.footer')
        <!-- App footer ends -->

      </div>
      <!-- App container ends -->

    </div>
    <!-- Main container ends -->

  </div>
  <!-- Page wrapper ends -->
  @include('admin.libs.script')
</body>


<!-- Mirrored from bootstrapget.com/demos/cube-admin-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jan 2025 02:51:10 GMT -->

</html>
