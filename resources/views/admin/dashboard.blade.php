<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Admin Dashboard - {{ config('app.name') }}</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
    }

    .navbar-brand {
      font-weight: 700;
    }

    .sidebar {
      min-height: calc(100vh - 76px);
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .sidebar .nav-link {
      color: rgba(255, 255, 255, 0.8);
      transition: all 0.3s;
      border-radius: 8px;
      margin: 2px 0;
    }

    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
      color: white;
      background-color: rgba(255, 255, 255, 0.1);
      transform: translateX(5px);
    }

    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
      transition: transform 0.2s;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .stat-card {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
    }

    .stat-card-2 {
      background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
      color: white;
    }

    .stat-card-3 {
      background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
      color: white;
    }

    .stat-card-4 {
      background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
      color: white;
    }
  </style>
</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <i class="fas fa-tachometer-alt me-2"></i>
        Admin Panel
      </a>

      <div class="navbar-nav ms-auto">
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
            data-bs-toggle="dropdown">
            <i class="fas fa-user-circle me-2"></i>
            {{ Auth::guard('admin')->user()->name ?? 'Admin' }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="#">
                <i class="fas fa-user me-2"></i>Profile
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <i class="fas fa-cog me-2"></i>Settings
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <form method="POST" action="{{ route('admin.logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="dropdown-item text-danger">
                  <i class="fas fa-sign-out-alt me-2"></i>Logout
                </button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3 col-lg-2 px-0">
        <div class="sidebar p-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-home me-2"></i>Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fas fa-users me-2"></i>Users
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fas fa-box me-2"></i>Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fas fa-shopping-cart me-2"></i>Orders
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fas fa-chart-bar me-2"></i>Reports
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fas fa-cog me-2"></i>Settings
              </a>
            </li>
          </ul>
        </div>
      </div>

      <!-- Main Content -->
      <div class="col-md-9 col-lg-10">
        <div class="container-fluid py-4">
          <!-- Flash Messages -->
          @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <i class="fas fa-check-circle me-2"></i>
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
          @endif

          <!-- Page Header -->
          <div class="row mb-4">
            <div class="col">
              <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
              <p class="text-muted">Selamat datang di panel admin</p>
            </div>
            <div class="col-auto">
              <span class="badge bg-success fs-6">
                <i class="fas fa-circle me-1"></i>Online
              </span>
            </div>
          </div>

          <!-- Statistics Cards -->
          <div class="row g-4 mb-4">
            <div class="col-xl-3 col-md-6">
              <div class="card stat-card text-white">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <div>
                      <h6 class="card-title opacity-75">Total Users</h6>
                      <h2 class="mb-0">1,234</h2>
                    </div>
                    <div class="align-self-center">
                      <i class="fas fa-users fa-2x opacity-75"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6">
              <div class="card stat-card-2 text-white">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <div>
                      <h6 class="card-title opacity-75">Total Orders</h6>
                      <h2 class="mb-0">567</h2>
                    </div>
                    <div class="align-self-center">
                      <i class="fas fa-shopping-cart fa-2x opacity-75"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6">
              <div class="card stat-card-3 text-white">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <div>
                      <h6 class="card-title opacity-75">Revenue</h6>
                      <h2 class="mb-0">Rp 89M</h2>
                    </div>
                    <div class="align-self-center">
                      <i class="fas fa-dollar-sign fa-2x opacity-75"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6">
              <div class="card stat-card-4 text-white">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <div>
                      <h6 class="card-title opacity-75">Products</h6>
                      <h2 class="mb-0">89</h2>
                    </div>
                    <div class="align-self-center">
                      <i class="fas fa-box fa-2x opacity-75"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Cards -->
          <div class="row g-4">
            <div class="col-xl-8">
              <div class="card">
                <div class="card-header bg-transparent">
                  <h5 class="mb-0">
                    <i class="fas fa-chart-line me-2"></i>
                    Recent Activity
                  </h5>
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
                <div class="card-header bg-transparent">
                  <h5 class="mb-0">
                    <i class="fas fa-bell me-2"></i>
                    Notifications
                  </h5>
                </div>
                <div class="card-body">
                  <div class="d-flex align-items-center mb-3 p-3 bg-light rounded">
                    <i class="fas fa-info-circle text-primary me-3"></i>
                    <div class="flex-grow-1">
                      <h6 class="mb-1">System Update</h6>
                      <small class="text-muted">New features available</small>
                    </div>
                  </div>
                  <div class="d-flex align-items-center mb-3 p-3 bg-light rounded">
                    <i class="fas fa-exclamation-triangle text-warning me-3"></i>
                    <div class="flex-grow-1">
                      <h6 class="mb-1">Low Stock Alert</h6>
                      <small class="text-muted">5 products running low</small>
                    </div>
                  </div>
                  <div class="d-flex align-items-center p-3 bg-light rounded">
                    <i class="fas fa-check-circle text-success me-3"></i>
                    <div class="flex-grow-1">
                      <h6 class="mb-1">Backup Complete</h6>
                      <small class="text-muted">Daily backup successful</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
