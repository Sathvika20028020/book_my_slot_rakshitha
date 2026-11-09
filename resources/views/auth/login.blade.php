<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in | BookMySlots</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 32px;
            background: #eef0ff;
            color: #172b49;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .login-card {
            width: min(100%, 1232px);
            min-height: 626px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, .9);
            border-radius: 24px;
            background: #fff;
            box-shadow: 0 28px 70px rgba(27, 45, 80, .24);
        }

        .brand-panel {
            position: relative;
            isolation: isolate;
            min-height: 626px;
            overflow: hidden;
            background: linear-gradient(145deg, #203e5c, #245477);
        }

        .brand-panel::before {
            position: absolute;
            z-index: -1;
            inset: 0;
            background-image: radial-gradient(rgba(7, 29, 52, .28) 2px, transparent 2px);
            background-position: 0 0;
            background-size: 18px 18px;
            content: '';
            opacity: .45;
            mask-image: linear-gradient(to bottom, #000 0%, transparent 58%);
        }

        .brand-copy {
            max-width: 430px;
        }

        .brand-title {
            color: #f3f8ff;
            letter-spacing: .04em;
        }

        .brand-caption {
            color: #c0d0e0;
            letter-spacing: .04em;
        }

        .login-panel {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 64px;
            background: #fff;
        }

        .login-content {
            width: 100%;
            max-width: 472px;
        }

        .login-heading {
            color: #102b4c;
        }

        .login-subtitle {
            color: #7b8491;
            letter-spacing: .025em;
        }

        .form-label {
            color: #2f333a;
        }

        .input-group-lg > .form-control,
        .input-group-lg > .input-group-text,
        .input-group-lg > .btn {
            min-height: 68px;
            border-color: #cad5e4;
            background-color: #f8faff;
        }

        .input-group-lg > .input-group-text {
            color: #60748d;
        }

        .form-control {
            color: #172b49;
        }

        .form-control:focus {
            z-index: 3;
            border-color: #173d6d;
            background-color: #f3f7ff;
            box-shadow: 0 0 0 .2rem rgba(23, 61, 109, .14);
        }

        .forgot-link {
            color: #153d70;
            letter-spacing: .04em;
        }

        .btn-login {
            min-height: 66px;
            border: 0;
            border-radius: 12px;
            background: #103c6d;
            box-shadow: 0 12px 24px rgba(16, 60, 109, .2);
            color: #fff;
            letter-spacing: .04em;
        }

        .btn-login:hover,
        .btn-login:focus {
            background: #0c3159;
            color: #fff;
        }

        @media (max-width: 767.98px) {
            body {
                padding: 16px;
            }

            .login-card {
                min-height: 0;
                border-radius: 18px;
            }

            .brand-panel {
                min-height: 210px;
                padding: 32px !important;
            }

            .brand-copy {
                max-width: 100%;
            }

            .brand-title {
                font-size: 1.55rem;
            }

            .login-panel {
                padding: 36px 28px;
            }
        }
    </style>
</head>
<body>
    <main class="container-fluid p-0">
        <div class="row g-0 login-card mx-auto">
            <section class="col-md-6 brand-panel d-flex align-items-center justify-content-center p-5 text-center text-white">
                <div class="brand-copy">
                    <h1 class="brand-title fw-bold text-uppercase mb-2">BookMySlots Portal</h1>
                    <p class="brand-caption fs-5 mb-0">Venue Management | Convention Centre Booking</p>
                </div>
            </section>

            <section class="col-md-6 login-panel">
                <div class="login-content">
                    <div class="text-center mb-5">
                        <h2 class="login-heading fw-bold mb-2">Welcome Back!</h2>
                        <p class="login-subtitle fs-5 mb-0">Sign in to access your venue dashboard</p>
                    </div>

                    <form id="loginForm">
                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">Email Address</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input class="form-control" type="email" id="email" placeholder="you@yourvenue.com" autocomplete="email" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label for="password" class="form-label fw-semibold mb-0">Password</label>
                                <a href="#" id="forgotPassword" class="forgot-link fw-semibold text-decoration-none">Forgot Password?</a>
                            </div>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input class="form-control" type="password" id="password" placeholder="Enter your password" autocomplete="current-password" required>
                                <button class="btn input-group-text" type="button" id="togglePassword" aria-label="Show password">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        <button class="btn btn-login btn-lg w-100 fw-bold text-uppercase" type="submit">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                        </button>
                    </form>
                </div>
            </section>
        </div>
    </main>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            const showPassword = passwordInput.type === 'password';

            passwordInput.type = showPassword ? 'text' : 'password';
            icon.classList.toggle('bi-eye', !showPassword);
            icon.classList.toggle('bi-eye-slash', showPassword);
            this.setAttribute('aria-label', showPassword ? 'Hide password' : 'Show password');
        });

        document.getElementById('loginForm').addEventListener('submit', function (event) {
            event.preventDefault();
            window.location.href = "{{ route('owner.dashboard') }}";
        });

        document.getElementById('forgotPassword').addEventListener('click', function (event) {
            event.preventDefault();
            alert('Password recovery is not connected in this UI preview.');
        });
    </script>
</body>
</html>
