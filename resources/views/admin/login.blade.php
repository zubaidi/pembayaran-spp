<x-login-layout>
    <div class="login-container">
        <div class="row g-0">
            <!-- Left Side - Image -->
            <div class="col-md-6">
                <div class="login-image d-none d-md-flex align-items-center justify-content-center">
                    <div class="text-center text-white">
                        <i class="fas fa-graduation-cap fa-5x mb-4"></i>
                        <h2 class="mb-3">Sistem Pembayaran SPP</h2>
                        <p class="lead">Solusi modern untuk pengelolaan pembayaran sekolah</p>
                    </div>
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="col-md-6">
                <div class="login-form">
                    <div class="text-center mb-4">
                        <div class="brand-logo">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3 class="mb-2">Selamat Datang</h3>
                        <p class="text-muted">Silakan login untuk melanjutkan</p>
                    </div>

                    <form method="POST" action="#">
                        @csrf
                        <div class="mb-3 floating-label">
                            <input type="text" class="form-control" id="username" placeholder=" " name="email" required>
                            <label for="username">Email</label>
                        </div>

                        <div class="mb-3 floating-label">
                            <input type="password" class="form-control" id="password" placeholder=" " name="password" required>
                            <label for="password">Password</label>
                            <button type="button" class="btn btn-sm position-absolute end-0 top-0 mt-2 me-2" onclick="togglePassword()">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </button>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">
                                Ingat saya
                            </label>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-login">
                                <i class="fas fa-sign-in-alt me-2"></i>
                                Login
                            </button>
                        </div>

                        <div class="text-center mt-3">
                            <a href="#" class="text-decoration-none">Lupa password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert Container -->
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div id="loginAlert" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <span id="alertMessage">Username atau password salah!</span>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>
</x-login-layout>
