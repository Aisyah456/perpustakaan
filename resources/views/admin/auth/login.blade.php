<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login - MyApp</title>

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

    .alert {
      border-radius: 10px;
      border: none;
    }

    .form-control {
      border-radius: 10px;
    }

    .form-check-input:checked {
      background-color: #667eea;
      border-color: #667eea;
    }

    .loading {
      display: none;
    }

    .btn-login:disabled {
      opacity: 0.7;
      transform: none !important;
    }

    .password-toggle {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      color: #6c757d;
      cursor: pointer;
      z-index: 5;
    }

    .form-floating {
      position: relative;
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
            <div id="alert-container"></div>

            <form id="loginForm">
              <!-- Email Field -->
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com"
                  required>
                <label for="email">
                  <i class="fas fa-envelope me-2"></i>Email Address
                </label>
                <div class="invalid-feedback"></div>
              </div>

              <!-- Password Field -->
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                  required>
                <label for="password">
                  <i class="fas fa-lock me-2"></i>Password
                </label>
                <button type="button" class="password-toggle" onclick="togglePassword()">
                  <i class="fas fa-eye" id="toggleIcon"></i>
                </button>
                <div class="invalid-feedback"></div>
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
                <span class="normal-text">
                  <i class="fas fa-sign-in-alt me-2"></i>
                  Masuk ke Dashboard
                </span>
                <span class="loading">
                  <i class="fas fa-spinner fa-spin me-2"></i>
                  Sedang masuk...
                </span>
              </button>
            </form>

            <!-- Demo Credentials -->
            <div class="mt-4 p-3 bg-light rounded">
              <small class="text-muted">
                <strong>Demo Credentials:</strong><br>
                Email: admin@example.com<br>
                Password: admin123
              </small>
            </div>
          </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-4">
          <p class="text-white opacity-75 mb-0">
            &copy; 2024 MyApp. All rights reserved.
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

  <script>
    // Toggle password visibility
    function togglePassword() {
      const passwordInput = document.getElementById('password');
      const toggleIcon = document.getElementById('toggleIcon');

      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.className = 'fas fa-eye-slash';
      } else {
        passwordInput.type = 'password';
        toggleIcon.className = 'fas fa-eye';
      }
    }

    // Show alert message
    function showAlert(message, type = 'danger') {
      const alertContainer = document.getElementById('alert-container');
      const alertHTML = `
        <div class="alert alert-${type} alert-dismissible fade show" role="alert">
          <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} me-2"></i>
          ${message}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      `;
      alertContainer.innerHTML = alertHTML;

      // Auto dismiss after 5 seconds
      setTimeout(() => {
        const alert = alertContainer.querySelector('.alert');
        if (alert) {
          const bsAlert = new bootstrap.Alert(alert);
          bsAlert.close();
        }
      }, 5000);
    }

    // Clear validation errors
    function clearErrors() {
      document.querySelectorAll('.form-control').forEach(input => {
        input.classList.remove('is-invalid');
        const feedback = input.nextElementSibling?.nextElementSibling;
        if (feedback && feedback.classList.contains('invalid-feedback')) {
          feedback.textContent = '';
        }
      });
    }

    // Show validation error
    function showError(fieldName, message) {
      const field = document.getElementById(fieldName);
      field.classList.add('is-invalid');
      const feedback = field.nextElementSibling?.nextElementSibling;
      if (feedback && feedback.classList.contains('invalid-feedback')) {
        feedback.textContent = message;
      }
    }

    // Handle form submission
    document.getElementById('loginForm').addEventListener('submit', function(e) {
      e.preventDefault();

      clearErrors();

      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;
      const remember = document.getElementById('remember').checked;

      // Basic validation
      if (!email) {
        showError('email', 'Email harus diisi');
        return;
      }

      if (!password) {
        showError('password', 'Password harus diisi');
        return;
      }

      // Show loading state
      const submitBtn = document.querySelector('.btn-login');
      const normalText = submitBtn.querySelector('.normal-text');
      const loadingText = submitBtn.querySelector('.loading');

      submitBtn.disabled = true;
      normalText.style.display = 'none';
      loadingText.style.display = 'inline';

      // Simulate login process
      setTimeout(() => {
        // Demo login logic
        if (email === 'admin@example.com' && password === 'admin123') {
          showAlert('Login berhasil! Mengalihkan ke dashboard...', 'success');
          setTimeout(() => {
            // Redirect to dashboard (in real app, this would be handled by server)
            window.location.href = '#dashboard';
          }, 1500);
        } else {
          showAlert('Email atau password salah. Silakan coba lagi.');

          // Reset button state
          submitBtn.disabled = false;
          normalText.style.display = 'inline';
          loadingText.style.display = 'none';
        }
      }, 1000);
    });

    // Auto-fill demo credentials when clicking the demo box
    document.querySelector('.bg-light').addEventListener('click', function() {
      document.getElementById('email').value = 'admin@example.com';
      document.getElementById('password').value = 'admin123';
    });
  </script>
</body>

</html>
