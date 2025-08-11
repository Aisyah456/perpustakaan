<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Admin Login - {{ config('app.name') }}</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
    }

    .login-container {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-card {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .login-header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border-radius: 20px 20px 0 0;
    }

    .form-floating>.form-control:focus {
      border-color: #667eea;
      box-shadow: 0 0 0 0.25rem rgba(102, 126, 234, 0.25);
    }

    .btn-login {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border: none;
      border-radius: 10px;
      transition: transform 0.2s;
    }

    .btn-login:hover {
      transform: translateY(-2px);
      background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
    }
  </style>
</head>

<body>
  <div class="container-fluid login-container">
    <div class="row justify-content-center w-100">
      <div class="col-md-6 col-lg-4">
        <div class="card login-card border-0">
          <div class="card-header login-header text-center py-4">
            <i class="fas fa-user-shield fa-3x mb-3"></i>
            <h3 class="mb-0">Admin Login</h3>
            <p class="mb-0 opacity-75">Silakan masuk ke panel admin</p>
          </div>

          <div class="card-body p-5">
            <!-- Flash Messages -->
            @if (session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
            @endif

            @if (session('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
            @endif

            <form method="POST" action="{{ route('admin.login') }}">
              @csrf

              <!-- Email Field -->
              <div class="form-floating mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                  name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                <label for="email">
                  <i class="fas fa-envelope me-2"></i>Email Address
                </label>
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <!-- Password Field -->
              <div class="form-floating mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                  name="password" placeholder="Password" required>
                <label for="password">
                  <i class="fas fa-lock me-2"></i>Password
                </label>
                @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <!-- Remember Me -->
              <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                <label class="form-check-label" for="remember">
                  Ingat saya
                </label>
              </div>

              <!-- Login Button -->
              <button type="submit" class="btn btn-primary btn-login w-100 py-3">
                <i class="fas fa-sign-in-alt me-2"></i>
                Masuk ke Dashboard
              </button>
            </form>
          </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-4">
          <p class="text-white opacity-75 mb-0">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
