{{-- resources/views/admin/index.blade.php --}}
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard Admin - {{ config('app.name') }}</title>
  @include('admin.libs.meta')
  @include('admin.libs.link')
</head>

<body>
  <div class="page-wrapper">
    <div class="main-container">

      {{-- Sidebar --}}
      @include('admin.libs.menu')

      <div class="app-container">

        {{-- Header --}}
        <div class="app-header d-flex align-items-center">
          <div class="d-flex">
            <button class="toggle-sidebar"><i class="bi bi-list lh-1"></i></button>
            <button class="pin-sidebar"><i class="bi bi-list lh-1"></i></button>
          </div>
          <h5 class="m-0 ms-2 fw-semibold">Dashboard</h5>
          @include('admin.libs.header')
        </div>

        {{-- Body --}}
        <div class="app-body">

          {{-- Statistik Cards --}}
          <div class="row g-4 mb-4">
            <div class="col-xl-3 col-md-6">
              <div class="card bg-primary text-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                  <div>
                    <h6>Total Users</h6>
                    <h2>1,234</h2>
                  </div>
                  <i class="fas fa-users fa-2x opacity-75"></i>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card bg-danger text-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                  <div>
                    <h6>Total Orders</h6>
                    <h2>567</h2>
                  </div>
                  <i class="fas fa-shopping-cart fa-2x opacity-75"></i>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card bg-info text-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                  <div>
                    <h6>Revenue</h6>
                    <h2>Rp 89M</h2>
                  </div>
                  <i class="fas fa-dollar-sign fa-2x opacity-75"></i>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card bg-success text-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                  <div>
                    <h6>Products</h6>
                    <h2>89</h2>
                  </div>
                  <i class="fas fa-box fa-2x opacity-75"></i>
                </div>
              </div>
            </div>
          </div>

          {{-- Recent Activity & Notifications --}}
          <div class="row g-4">
            <div class="col-xl-8">
              <div class="card">
                <div class="card-header">
                  <h5><i class="fas fa-chart-line me-2"></i>Recent Activity</h5>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Activity</th>
                          <th>User</th>
                          <th>Time</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>New user registration</td>
                          <td>John Doe</td>
                          <td>5 min ago</td>
                          <td><span class="badge bg-success">Completed</span></td>
                        </tr>
                        <tr>
                          <td>Order placed</td>
                          <td>Jane Smith</td>
                          <td>15 min ago</td>
                          <td><span class="badge bg-warning">Pending</span></td>
                        </tr>
                        <tr>
                          <td>Payment received</td>
                          <td>Bob Johnson</td>
                          <td>1 hour ago</td>
                          <td><span class="badge bg-success">Completed</span></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4">
              <div class="card">
                <div class="card-header">
                  <h5><i class="fas fa-bell me-2"></i>Notifications</h5>
                </div>
                <div class="card-body">
                  <div class="d-flex align-items-center mb-3 p-3 bg-light rounded">
                    <i class="fas fa-info-circle text-primary me-3"></i>
                    <div>
                      <h6 class="mb-1">System Update</h6>
                      <small class="text-muted">New features available</small>
                    </div>
                  </div>
                  <div class="d-flex align-items-center mb-3 p-3 bg-light rounded">
                    <i class="fas fa-exclamation-triangle text-warning me-3"></i>
                    <div>
                      <h6 class="mb-1">Low Stock Alert</h6>
                      <small class="text-muted">5 products running low</small>
                    </div>
                  </div>
                  <div class="d-flex align-items-center p-3 bg-light rounded">
                    <i class="fas fa-check-circle text-success me-3"></i>
                    <div>
                      <h6 class="mb-1">Backup Complete</h6>
                      <small class="text-muted">Daily backup successful</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div> {{-- app-body end --}}
      </div> {{-- app-container end --}}
    </div> {{-- main-container end --}}
  </div> {{-- page-wrapper end --}}

  @include('admin.libs.script')
  </div>
  @include('admin.libs.footer')
</body>

</html>
