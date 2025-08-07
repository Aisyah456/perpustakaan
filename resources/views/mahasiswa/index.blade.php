<div>
  <!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->
</div>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from bootstrapget.com/demos/cube-admin-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jan 2025 02:50:49 GMT -->

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Mahasiswa - Perpustakaan UMHT</title>

  <!-- Meta -->
  @include('mahasiswa.libs.meta')
  @include('mahasiswa.libs.link')
</head>

<body>

  <!-- Page wrapper starts -->
  <div class="page-wrapper">

    <!-- Main container starts -->
    <div class="main-container">

      <!-- Sidebar wrapper starts -->
      @include('mahasiswa.libs.menu')
      <!-- Sidebar wrapper ends -->

      <!-- App container starts -->
      <div class="app-container">

        <!-- App header starts -->
        <div class="app-header d-flex align-items-center">

          <!-- Toggle buttons starts -->
          <div class="d-flex">
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
              <img src="{{ asset('doc/images/logos/logoumht.png') }}" class="logo" alt="Bootstrap Gallery">
            </a>
            <!-- Logo sm end -->

          </div>
          <!-- App brand sm ends -->

          <!-- Page title starts -->
          <h5 class="m-0 ms-2 fw-semibold">Dashboard</h5>
          <!-- Page title ends -->

          <!-- App header actions starts -->
          @include('mahasiswa.libs.header')
          <!-- App header actions ends -->

        </div>
        <!-- App header ends -->

        <!-- App body starts -->
        <div class="app-body">

          <!-- Row starts -->
          <div class="row gx-4">
            <div class="col-xxl-3 col-sm-6 col-12">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="p-1 border border-primary rounded-circle me-3">
                      <div id="radial1"></div>
                    </div>
                    <div class="d-flex flex-column">
                      <h2 class="lh-1">2200</h2>
                      <p class="m-0 opacity-50">Sales</p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mt-1">
                    <a class="text-primary" href="javascript:void(0);">
                      <span>View All</span>
                      <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                    <div class="text-end">
                      <p class="mb-0 text-primary">+20%</p>
                      <span class="badge bg-primary-subtle text-primary small">this month</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-sm-6 col-12">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="p-1 border border-success rounded-circle me-3">
                      <div id="radial2"></div>
                    </div>
                    <div class="d-flex flex-column">
                      <h2 class="lh-1">4400</h2>
                      <p class="m-0 opacity-50">Orders</p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mt-1">
                    <a class="text-primary" href="javascript:void(0);">
                      <span>View All</span>
                      <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                    <div class="text-end">
                      <p class="mb-0 text-success">+30%</p>
                      <span class="badge bg-success-subtle text-success small">this month</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-sm-6 col-12">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="p-1 border border-info rounded-circle me-3">
                      <div id="radial3"></div>
                    </div>
                    <div class="d-flex flex-column">
                      <h2 class="lh-1">6600</h2>
                      <p class="m-0 opacity-50">Invoices</p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mt-1">
                    <a class="text-primary" href="javascript:void(0);">
                      <span>View All</span>
                      <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                    <div class="text-end">
                      <p class="mb-0 text-info">+60%</p>
                      <span class="badge bg-info-subtle text-info small">this month</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-sm-6 col-12">
              <div class="card mb-4 bg-primary">
                <div class="card-body text-white">
                  <div class="d-flex align-items-center">
                    <div class="p-1 border border-white rounded-circle me-3">
                      <div id="radial4"></div>
                    </div>
                    <div class="d-flex flex-column">
                      <h2 class="m-0 lh-1">8800</h2>
                      <p class="m-0 opacity-50">Payments</p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mt-1">
                    <a class="text-white" href="javascript:void(0);">
                      <span>View All</span>
                      <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                    <div class="text-end">
                      <p class="mb-0 text-warning">+90%</p>
                      <span class="badge bg-danger text-white small">this month</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Row ends -->

          <!-- Row starts -->
          <div class="row gx-4">
            <div class="col-xxl-6 col-sm-12 col-12">
              <div class="card mb-4 card-height-420">
                <div class="card-header">
                  <h5 class="card-title">Sales</h5>
                </div>
                <div class="card-body">

                  <div class="graph-body auto-align-graph">
                    <!-- <div id="orders"></div> -->
                    <div id="sales"></div>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-sm-6 col-12">
              <div class="card mb-4 card-height-420">
                <div class="card-header">
                  <h5 class="card-title">Transactions</h5>
                </div>
                <div class="card-body">

                  <div class="d-flex flex-column justify-content-between h-100">

                    <!-- Transactions starts -->
                    <div class="d-flex flex-column gap-3">
                      <div class="d-flex pb-3 border-bottom w-100">
                        <div class="icon-box lg bg-primary-subtle rounded-5 me-3">
                          <i class="bi bi-twitter fs-3 text-primary"></i>
                        </div>
                        <div class="d-flex flex-column">
                          <p class="mb-1 opacity-50">Twitter Subscription</p>
                          <h3 class="m-0 lh-1 fw-semibold">$159.69</h3>
                        </div>
                      </div>
                      <div class="d-flex pb-3 border-bottom w-100">
                        <div class="icon-box lg bg-info-subtle rounded-5 me-3">
                          <i class="bi bi-xbox fs-3 text-info"></i>
                        </div>
                        <div class="d-flex flex-column">
                          <p class="mb-1 opacity-50">Xbox Purchased</p>
                          <h3 class="m-0 lh-1 fw-semibold">$36.38</h3>
                        </div>
                      </div>
                      <div class="d-flex pb-3 border-bottom w-100">
                        <div class="icon-box lg bg-danger-subtle rounded-5 me-3">
                          <i class="bi bi-youtube fs-3 text-danger"></i>
                        </div>
                        <div class="d-flex flex-column">
                          <p class="mb-1 opacity-50">Youtube Subscription</p>
                          <h3 class="m-0 lh-1 fw-semibold">$23.85</h3>
                        </div>
                      </div>
                    </div>
                    <!-- Transactions ends -->

                    <a href="javascript:void(0)" class="btn btn-dark">View All <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-sm-6 col-12">
              <div class="card mb-4 bg-info card-height-420">
                <div class="card-body text-white">

                  <div class="pt-4 d-flex flex-column justify-content-between h-100">
                    <div class="d-flex flex-column">
                      <i class="bi bi-bag display-1 opacity-25 position-absolute end-0 top-0 m-4"></i>
                    </div>
                    <div id="orders"></div>
                    <a href="javascript:void(0)" class="btn btn-dark">Order Now <i
                        class="bi bi-arrow-right ms-2"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Row ends -->

          <!-- Row starts -->
          <div class="row gx-4">
            <div class="col-xxl-3 col-sm-6 col-12">
              <div class="card mb-4 card-height-350">
                <div class="card-header">
                  <h5 class="card-title">Audiences</h5>
                </div>
                <div class="card-body pt-0">

                  <div id="audiences"></div>

                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-sm-6 col-12">
              <div class="card mb-4 card-height-350">
                <div class="card-header">
                  <h5 class="card-title">Notifications</h5>
                </div>
                <div class="card-body">

                  <!-- Notifications starts -->
                  <div class="d-flex flex-column gap-3">
                    <div class="d-flex flex-column p-3 border rounded-2">
                      <div class="d-flex align-items-center flex-row mb-3">
                        <img src="assets/images/user4.png" class="img-4x rounded-5 me-3" alt="mahasiswa Dashboard">
                        <p class="m-0">Rio wants to edit the UI design system.</p>
                      </div>
                      <div class="d-flex gap-2">
                        <button class="btn btn-primary">Accept</button>
                        <button class="btn btn-outline-secondary">Decline</button>
                      </div>
                    </div>

                    <div class="d-flex flex-column p-3 border rounded-2">
                      <div class="d-flex align-items-center flex-row">
                        <img src="assets/images/user5.png" class="img-4x rounded-5 me-3" alt="mahasiswa Dashboard">
                        <p class="m-0">Leone wants to edit the UI design system.</p>
                      </div>
                    </div>
                  </div>
                  <!-- Notifications ends -->

                </div>
              </div>
            </div>
            <div class="col-xxl-6 col-sm-12 col-12">
              <div class="card mb-4 card-height-350">
                <div class="card-header">
                  <h5 class="card-title">Visitors</h5>
                </div>
                <div class="card-body">

                  <!-- Row starts -->
                  <div class="row gx-4">
                    <div class="col-sm-4 col-12">
                      <ul class="list-group">
                        <li class="list-group-item">
                          <div class="d-flex align-items-center">
                            <div class="me-2">
                              <i class="bi bi-play-fill text-danger"></i>
                            </div>
                            <div>
                              <h4 class="mb-1 fw-bold">
                                $900
                                <i class="bi bi-arrow-up-right fs-5 me-1 text-danger"></i>
                              </h4>
                              <h6 class="m-0 small opacity-50">Sales</h6>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item">
                          <div class="d-flex align-items-center">
                            <div class="me-2">
                              <i class="bi bi-play-fill text-danger"></i>
                            </div>
                            <div>
                              <h4 class="mb-1 fw-bold">
                                $600
                                <i class="bi bi-arrow-up-right fs-5 me-1 text-info"></i>
                              </h4>
                              <h6 class="m-0 small opacity-50">Orders</h6>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item">
                          <div class="d-flex align-items-center">
                            <div class="me-2">
                              <i class="bi bi-play-fill text-danger"></i>
                            </div>
                            <div>
                              <h4 class="mb-1 fw-bold">
                                $500
                                <i class="bi bi-arrow-up-right fs-5 me-1 text-success"></i>
                              </h4>
                              <h6 class="m-0 small opacity-50">Income</h6>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item">
                          <div class="d-flex align-items-center">
                            <div class="me-2">
                              <i class="bi bi-play-fill text-danger"></i>
                            </div>
                            <div>
                              <h4 class="mb-1 fw-bold">
                                $300
                                <i class="bi bi-arrow-up-right fs-5 me-1 text-warning"></i>
                              </h4>
                              <h6 class="m-0 small opacity-50">Revenue</h6>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <div class="col-sm-8 col-12">
                      <div id="worldmap4" class="chart-height2"></div>
                    </div>
                  </div>
                  <!-- Row ends -->

                </div>
              </div>
            </div>
          </div>
          <!-- Row ends -->


        </div>
        <!-- App footer starts -->
        @include('mahasiswa.libs.footer')
        <!-- App footer ends -->
      </div>
    </div>
  </div>

  @include('mahasiswa.libs.script')
</body>


<!-- Mirrored from bootstrapget.com/demos/cube-admin-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jan 2025 02:51:10 GMT -->

</html>
