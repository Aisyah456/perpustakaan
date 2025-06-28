<!DOCTYPE html>
<html lang="en">

  
<!-- Mirrored from bootstrapget.com/demos/venus-admin-template/form-file-input.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Oct 2024 02:15:50 GMT -->
<head>
    
  <title>Admin - Dashboard Pepustakaan</title>

    <!-- Meta -->
   @include('admin.libs.meta')
   @include('admin.libs.link')
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
  <!-- Flatpickr CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css" integrity="sha512-MQXduO8IQnJVq1qmySpN87QQkiR1bZHtorbJBD0tzy7/0U9+YIC93QWHeGTEoojMVHWWNkoCp8V6OzVSYrX0oQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  
  <!-- jQuery Core -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  </head>

  <body>

    <!-- Page wrapper start -->
    <div class="page-wrapper">

      <!-- Main container start -->
      <div class="main-container">

        <!-- Sidebar wrapper start -->
        <nav id="sidebar" class="sidebar-wrapper">

         <!-- App brand starts -->
         <div class="app-brand p-4">
            <a href="index.html">
              <img src="{{ asset('doc/images/logo.svg" class="l')}}" class="logo" alt="Bootstrap Gallery" />
            </a>
          </div>
          <!-- App brand ends -->

          @include('admin.libs.sidebar')
          
          @include('admin.libs.menu')
        

        </nav>
        <!-- Sidebar wrapper end -->

        <!-- App container starts -->
        <div class="app-container">

          <!-- App header starts -->
          <div class="app-header d-flex align-items-center">

            <!-- Toggle buttons start -->
            <div class="d-flex">
              <button class="btn btn-outline-primary me-2 toggle-sidebar" id="toggle-sidebar">
                <i class="bi bi-text-indent-left fs-5"></i>
              </button>
              <button class="btn btn-outline-primary me-2 pin-sidebar" id="pin-sidebar">
                <i class="bi bi-text-indent-left fs-5"></i>
              </button>
            </div>
            <!-- Toggle buttons end -->


            <!-- App brand sm start -->
            <div class="app-brand-sm d-md-none d-sm-block">
                <a href="index.html">
                    <img src="{{ asset('doc/images/logoumht.png')}}" class="logo" alt="Bootstrap Gallery">
                  </a>
            </div>
            <!-- App brand sm end -->
            @include('admin.libs.header')

          </div>
          <!-- App header ends -->

          <!-- App hero header starts -->
          <div class="app-hero-header d-flex align-items-start">
            @section('content')
            <!-- Breadcrumb start -->
            <ol class="breadcrumb d-none d-lg-flex align-items-center">
              <li class="breadcrumb-item">
                <i class="bi bi-house"></i>
                <a href="index.html">Home</a>
              </li>
              <li class="breadcrumb-item">Pustaka</li>
              <li class="breadcrumb-item" aria-current="page">Form Pustaka</li>
            </ol>
            <!-- Breadcrumb end -->

           

          </div>
          <!-- App Hero header ends -->

          <!-- App body starts -->
          <div class="app-body">

            <!-- Row start -->
            <div class="row">
              <div class="col-xxl-12">
                <div class="card mb-4">
                <div class="card-header">
                    <a href="{{route ('admin.pustaka.create')}}"  class="btn btn-sm btn-primary">Tambah data</a>
                </div>
                <div class='card-body'>
                    <table id="datatableSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Fakultas</th>
                                <th>Jurusan</th>
                                <th>Tahun Akademik</th>
                                <th width="280px">Action</th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Fakultas</th>
                                <th>Jurusan</th>
                                <th>Tahun Akademik</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ( $pustakas as $pus )
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pus->name}}</td>
                                <td>{{ $pus->nim}}</td>
                                <td>{{ $pus->fakultas}}</td>
                                <td>{{ $pus->jurusan}}</td>
                                <td>{{ $pus->thnakademik}}</td>
                            @endforeach
                        </tbody>
                        <a href="" class="btn btn-sm btn-secondary">show</a>
                        <a href="{{ route('admin.pustaka.edit', $pus->id)}}" class="btn btn-sm btn-warning">edit</a>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$k->id}}">
                            hapus
                        </button>
                    </td>
                </tr>
                @endforeach
                <tbody>
                </table>

                  {{-- <div class="card-body">
                    <div class="mb-5">
                      <label for="formFile" class="form-label">Default file input example</label>
                      <input class="form-control" type="file" id="formFile" />
                    </div>

                    <div class="mb-5">
                      <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                      <input class="form-control" type="file" id="formFileMultiple" multiple />
                    </div>

                    <div class="mb-5">
                      <label for="formFileDisabled" class="form-label">Disabled file input example</label>
                      <input class="form-control" type="file" id="formFileDisabled" disabled />
                    </div>

                    <div class="input-group mb-5">
                      <label class="input-group-text" for="inputGroupFile01">Upload</label>
                      <input type="file" class="form-control" id="inputGroupFile01" />
                    </div>

                    <div class="input-group mb-5">
                      <input type="file" class="form-control" id="inputGroupFile02" />
                      <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>

                    <div class="input-group mb-5">
                      <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">
                        Button
                      </button>
                      <input type="file" class="form-control" id="inputGroupFile03"
                        aria-describedby="inputGroupFileAddon03" aria-label="Upload" />
                    </div>

                    <div class="input-group">
                      <input type="file" class="form-control" id="inputGroupFile04"
                        aria-describedby="inputGroupFileAddon04" aria-label="Upload" />
                      <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">
                        Button
                      </button>
                    </div>
                  </div> --}}
                </div>
              </div>
            </div>
            @endsection
            <!-- Row end -->

          </div>
          <!-- App body ends -->

        @include('admin.libs.footer')

        </div>
        <!-- App container ends -->

      </div>
      <!-- Main container end -->

    </div>
    <!-- Page wrapper end -->
    @include('admin.libs.script')
  </body>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js" integrity="sha512-K/oyQtMXpxI4+K0W7H25UopjM8pzq0yrVdFdG21Fh5dBe91I40pDd9A4lzNlHPHBIP2cwZuoxaUSX0GJSObvGA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/l10n/id.min.js" integrity="sha512-XCJP/fJxX6uFAvyH4yZfgsbzmiBiS7hPiVEGw8C+372GAiMgLlPVy00o585G/kD+Shh2YWXr34Ui0lee7+x0ZA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Bootstrap Notify -->
  <script type="text/javascript" src="assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
  <!-- Bootbox -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.0/bootbox.min.js" integrity="sha512-oVbWSv2O4y1UzvExJMHaHcaib4wsBMS5tEP3/YkMP6GmkwRJAa79Jwsv+Y/w7w2Vb/98/Xhvck10LyJweB8Jsw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Mirrored from bootstrapget.com/demos/venus-admin-template/form-file-input.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Oct 2024 02:15:50 GMT -->
</html>