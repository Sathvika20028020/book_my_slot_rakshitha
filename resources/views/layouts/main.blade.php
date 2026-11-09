<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Book My Slot – Convention Centre & Banquet Hall Booking')</title>
    <meta name="description" content="@yield('meta_description', 'Discover and book premier convention centres, banquet halls and marriage mandapams with real-time slot locking.')">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/theme/images/logoicon2.png') }}" type="image/x-icon">

    <!-- Google Font: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Premium Custom Styles -->
    <style>
        :root {
            --bms-dark: #0A0F1D;
            --bms-dark-card: #141B2D;
            --bms-gold: #F59E0B;
            --bms-gold-hover: #D97706;
            --bms-primary: #4F46E5;
            --bms-text-muted: #64748B;
            --bms-border: #E2E8F0;
        }

        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            color: #0F172A;
            background-color: #FAFAFB;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        .text-gold {
            color: var(--bms-gold) !important;
        }

        /* Sleek Header */
        .site-header {
            background: rgba(10, 15, 29, 0.96);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            z-index: 1030;
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0A0F1D;
            font-size: 1.25rem;
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        }

        .brand-text {
            font-size: 1.35rem;
            font-weight: 800;
            color: #FFFFFF;
            letter-spacing: -0.5px;
        }

        .site-navbar .nav-link {
            color: rgba(255, 255, 255, 0.75);
            font-weight: 500;
            font-size: 0.95rem;
            padding: 0.5rem 0.8rem;
            transition: all 0.2s ease;
        }

        .site-navbar .nav-link:hover,
        .site-navbar .nav-link.active {
            color: #FFFFFF;
        }

        .btn-gold {
            background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
            color: #0A0F1D;
            border: none;
            transition: all 0.25s ease;
        }

        .btn-gold:hover {
            background: linear-gradient(135deg, #FBBF24 0%, #F59E0B 100%);
            color: #0A0F1D;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(245, 158, 11, 0.35);
        }

        /* Hero */
        .hero-wrap {
            background: linear-gradient(180deg, #0A0F1D 0%, #111827 100%);
            color: #FFFFFF;
            padding: 4.5rem 0 4rem;
            position: relative;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 800;
            line-height: 1.15;
            letter-spacing: -1px;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.2rem;
            }
        }

        .hero-subtitle {
            font-size: 1.1rem;
            color: #94A3B8;
            max-width: 650px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Clean Search Bar */
        .search-pill-card {
            background: #FFFFFF;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            padding: 1rem 1.25rem;
            max-width: 960px;
            margin: 2.5rem auto 0;
        }

        .search-item {
            padding: 0.5rem 0.75rem;
            border-right: 1px solid #F1F5F9;
        }

        @media (max-width: 991.98px) {
            .search-item {
                border-right: none;
                border-bottom: 1px solid #F1F5F9;
                padding: 0.75rem 0;
            }
        }

        .search-item label {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #64748B;
            margin-bottom: 2px;
            display: block;
        }

        .search-item select,
        .search-item input {
            border: none;
            padding: 0;
            font-weight: 600;
            font-size: 0.95rem;
            color: #0F172A;
            box-shadow: none !important;
            background: transparent;
            width: 100%;
        }

        /* Venue Cards */
        .venue-card-clean {
            background: #FFFFFF;
            border: 1px solid #E2E8F0;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.25s ease;
        }

        .venue-card-clean:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 32px rgba(15, 23, 42, 0.08);
            border-color: #CBD5E1;
        }

        .venue-thumb {
            height: 200px;
            position: relative;
            overflow: hidden;
        }

        .venue-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .venue-card-clean:hover .venue-thumb img {
            transform: scale(1.04);
        }

        .badge-slot-price {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: rgba(10, 15, 29, 0.85);
            backdrop-filter: blur(8px);
            color: #FFFFFF;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
        }

        /* How It Works Clean */
        .step-clean-box {
            background: #FFFFFF;
            border: 1px solid #E2E8F0;
            border-radius: 16px;
            padding: 1.75rem 1.5rem;
            text-align: center;
            height: 100%;
        }

        .step-number {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: rgba(245, 158, 11, 0.12);
            color: var(--bms-gold-hover);
            font-weight: 800;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }

        /* Footer */
        .site-footer {
            background: #0A0F1D;
            color: #94A3B8;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }

        .footer-title {
            color: #FFFFFF;
            font-size: 0.9rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 1rem;
        }

        .footer-menu li {
            margin-bottom: 0.5rem;
        }

        .footer-menu a {
            color: #94A3B8;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.2s;
        }

        .footer-menu a:hover {
            color: #FFFFFF;
        }

        .social-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
            color: #FFFFFF;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.2s;
        }

        .social-btn:hover {
            background: var(--bms-gold);
            color: #0A0F1D;
        }

        .footer-divider {
            border-color: rgba(255, 255, 255, 0.08);
        }

        /* Modal Customizations */
        .modal-content {
            border-radius: 20px;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--bms-gold);
            box-shadow: 0 0 0 0.25rem rgba(245, 158, 11, 0.2);
        }
    </style>
    @yield('styles')
</head>
<body>

    <!-- Clean Header -->
    @include('layouts.header')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Clean Footer -->
    @include('layouts.footer')

    <!-- =========================================================================
         REGISTRATION MODAL (WITH BOOTSTRAP VALIDATION & SWEETALERT2)
         ========================================================================= -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg overflow-hidden">
                <div class="modal-header bg-dark text-white p-4 border-0">
                    <div class="d-flex align-items-center gap-2">
                        <div class="brand-icon">
                            <i class="bi bi-person-plus-fill"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold mb-0" id="registerModalLabel">Create an Account</h5>
                            <small class="text-muted">Register to book slots or list convention centres</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 p-lg-5 bg-light">
                    <!-- Bootstrap Validated Form -->
                    <form class="needs-validation" novalidate id="registerForm">
                        <div class="row g-3">
                            <!-- Full Name -->
                            <div class="col-md-6">
                                <label for="regName" class="form-label small fw-semibold">Full Name <span class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-person text-muted"></i></span>
                                    <input type="text" class="form-control border-start-0" id="regName" placeholder="Enter your full name" minlength="3" required>
                                    <div class="invalid-feedback">
                                        Please enter your full name (minimum 3 characters).
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>

                            <!-- Mobile Number -->
                            <div class="col-md-6">
                                <label for="regMobile" class="form-label small fw-semibold">Mobile Number <span class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-phone text-muted"></i></span>
                                    <input type="tel" 
                                           class="form-control border-start-0" 
                                           id="regMobile" 
                                           placeholder="10-digit mobile number" 
                                           maxlength="10" 
                                           minlength="10" 
                                           pattern="[0-9]{10}" 
                                           oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" 
                                           required>
                                    <div class="invalid-feedback">
                                        Please enter exactly 10 digits for the mobile number.
                                    </div>
                                    <div class="valid-feedback">
                                        Valid 10-digit number!
                                    </div>
                                </div>
                            </div>

                            <!-- Email Address -->
                            <div class="col-md-6">
                                <label for="regEmail" class="form-label small fw-semibold">Email Address <span class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                                    <input type="email" class="form-control border-start-0" id="regEmail" placeholder="name@example.com" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid email address.
                                    </div>
                                    <div class="valid-feedback">
                                        Valid email!
                                    </div>
                                </div>
                            </div>



                            <!-- Password -->
                            <div class="col-md-6">
                                <label for="regPassword" class="form-label small fw-semibold">Password <span class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-lock text-muted"></i></span>
                                    <input type="password" class="form-control border-start-0" id="regPassword" placeholder="Minimum 6 characters" minlength="6" required>
                                    <div class="invalid-feedback">
                                        Password must be at least 6 characters.
                                    </div>
                                    <div class="valid-feedback">
                                        Strong password!
                                    </div>
                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div class="col-md-6">
                                <label for="regConfirmPassword" class="form-label small fw-semibold">Confirm Password <span class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-shield-lock text-muted"></i></span>
                                    <input type="password" class="form-control border-start-0" id="regConfirmPassword" placeholder="Re-enter password" required>
                                    <div class="invalid-feedback" id="confirmFeedback">
                                        Please confirm your password.
                                    </div>
                                    <div class="valid-feedback">
                                        Passwords match!
                                    </div>
                                </div>
                            </div>

                            <!-- Terms & Conditions Checkbox -->
                            <div class="col-12 mt-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="regTerms" required>
                                    <label class="form-check-label small text-muted" for="regTerms">
                                        I agree to the <a href="#" class="text-dark fw-semibold">Terms of Service</a> and <a href="#" class="text-dark fw-semibold">Privacy Policy</a>
                                    </label>
                                    <div class="invalid-feedback">
                                        You must accept the terms before submitting.
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-gold w-100 py-3 fw-bold rounded-3 fs-6 shadow-sm">
                                    <i class="bi bi-check-circle me-1"></i> Register Account
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Footer Link to Login -->
                    <div class="text-center mt-4 pt-3 border-top small text-muted">
                        Already have an account? 
                        <a href="#" class="text-dark fw-bold text-decoration-none" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#loginModal">
                            Sign In here
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sign In Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg overflow-hidden">
                <div class="modal-header bg-dark text-white p-4 border-0">
                    <div class="d-flex align-items-center gap-2">
                        <div class="brand-icon">
                            <i class="bi bi-shield-lock-fill"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold mb-0">Sign In to Book My Slot</h5>
                            <small class="text-muted">Choose your account type</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 bg-light">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-fill mb-4 bg-white p-1 rounded-3 border" id="roleTab" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active fw-semibold small" id="customer-tab" data-bs-toggle="pill" data-bs-target="#customer-pane" type="button">Customer</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link fw-semibold small" id="vendor-tab" data-bs-toggle="pill" data-bs-target="#vendor-pane" type="button">Venue Owner</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="roleTabContent">
                        <!-- Customer Login -->
                        <div class="tab-pane fade show active" id="customer-pane">
                            <form onsubmit="event.preventDefault(); alert('Demo OTP sent to your phone!');">
                                <div class="mb-3">
                                    <label class="form-label small fw-semibold">Mobile Number</label>
                                    <input type="tel" 
                                           class="form-control" 
                                           placeholder="Enter 10-digit mobile number" 
                                           maxlength="10" 
                                           minlength="10" 
                                           pattern="[0-9]{10}" 
                                           oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" 
                                           required>
                                </div>
                                <button type="submit" class="btn btn-gold w-100 py-2 fw-bold rounded-3">
                                    Continue with OTP <i class="bi bi-arrow-right ms-1"></i>
                                </button>
                            </form>
                        </div>

                        <!-- Vendor Login -->
                        <div class="tab-pane fade" id="vendor-pane">
                            <form onsubmit="event.preventDefault(); alert('Logging in to Vendor Portal...');">
                                <div class="mb-3">
                                    <label class="form-label small fw-semibold">Vendor Email</label>
                                    <input type="email" class="form-control" placeholder="owner@venue.com" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-semibold">Password</label>
                                    <input type="password" class="form-control" placeholder="••••••••" required>
                                </div>
                                <button type="submit" class="btn btn-dark w-100 py-2 fw-semibold rounded-3">
                                    Sign In to Portal
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Footer Link to Register -->
                    <div class="text-center mt-4 pt-3 border-top small text-muted">
                        Don't have an account? 
                        <a href="#" class="text-gold fw-bold text-decoration-none" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#registerModal">
                            Register now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- SweetAlert Fallback & Validation Handler -->
    <script>
        if (typeof Swal === 'undefined') {
            window.Swal = {
                fire: function(opts) {
                    return new Promise(function(resolve) {
                        const overlay = document.createElement('div');
                        overlay.style.cssText = 'position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(10,15,29,0.75);z-index:999999;display:flex;align-items:center;justify-content:center;backdrop-filter:blur(6px);padding:1rem;';
                        const iconColor = opts.icon === 'success' ? '#10B981' : '#F59E0B';
                        const iconClass = opts.icon === 'success' ? 'bi-check-circle-fill' : 'bi-exclamation-triangle-fill';
                        overlay.innerHTML = `
                            <div style="background:#FFFFFF;border-radius:24px;max-width:440px;width:100%;padding:2.5rem 2rem;text-align:center;box-shadow:0 25px 60px rgba(0,0,0,0.3);animation:swalPop 0.25s ease-out;position:relative;">
                                <div style="font-size:3.5rem;color:${iconColor};margin-bottom:1rem;line-height:1;"><i class="bi ${iconClass}"></i></div>
                                <h3 style="font-weight:800;color:#0F172A;margin-bottom:0.75rem;">${opts.title || ''}</h3>
                                <div style="color:#64748B;font-size:0.95rem;margin-bottom:1.75rem;">${opts.html || opts.text || ''}</div>
                                <button id="custom-swal-ok-btn" style="background:linear-gradient(135deg,#F59E0B 0%,#D97706 100%);color:#0A0F1D;font-weight:700;border:none;padding:0.85rem 2rem;border-radius:50px;cursor:pointer;width:100%;font-size:1rem;box-shadow:0 6px 20px rgba(245,158,11,0.35);">
                                    ${opts.confirmButtonText ? opts.confirmButtonText.replace(/<[^>]*>?/gm, '') : 'Continue'}
                                </button>
                            </div>
                        `;
                        document.body.appendChild(overlay);
                        document.getElementById('custom-swal-ok-btn').onclick = function() {
                            overlay.remove();
                            resolve({ isConfirmed: true });
                        };
                    });
                }
            };
        }

        document.addEventListener('DOMContentLoaded', function () {
            const registerForm = document.getElementById('registerForm');
            const regPassword = document.getElementById('regPassword');
            const regConfirmPassword = document.getElementById('regConfirmPassword');
            const confirmFeedback = document.getElementById('confirmFeedback');
            const regMobile = document.getElementById('regMobile');

            if (regMobile) {
                regMobile.addEventListener('input', function() {
                    this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);
                });
            }

            if (registerForm) {
                registerForm.addEventListener('submit', function (event) {
                    event.preventDefault();
                    event.stopPropagation();

                    const nameInput = document.getElementById('regName');
                    const emailInput = document.getElementById('regEmail');
                    const termsCheck = document.getElementById('regTerms');

                    const nameVal = nameInput ? nameInput.value.trim() : '';
                    const mobileVal = regMobile ? regMobile.value.trim() : '';
                    const emailVal = emailInput ? emailInput.value.trim() : '';
                    const passVal = regPassword ? regPassword.value : '';
                    const confirmVal = regConfirmPassword ? regConfirmPassword.value : '';
                    const isTerms = termsCheck ? termsCheck.checked : false;

                    let errors = [];
                    if (!nameVal || nameVal.length < 3) errors.push('Full Name (minimum 3 characters)');
                    if (!mobileVal || mobileVal.length !== 10) errors.push('Mobile Number (exactly 10 digits)');
                    if (!emailVal || !emailVal.includes('@')) errors.push('Valid Email Address');
                    if (!passVal || passVal.length < 6) errors.push('Password (minimum 6 characters)');
                    if (passVal !== confirmVal) errors.push('Confirm Password must match');
                    if (!isTerms) errors.push('Agree to Terms & Conditions');

                    if (errors.length > 0) {
                        registerForm.classList.add('was-validated');
                        Swal.fire({
                            icon: 'warning',
                            title: 'Please Complete Details',
                            html: `
                                <p class="mb-2 text-muted small">Please check the following required fields:</p>
                                <div class="p-3 bg-light rounded-3 text-start mb-2 border">
                                    <ul class="text-danger small mb-0 ps-3">
                                        ${errors.map(err => `<li class="py-1"><strong>${err}</strong></li>`).join('')}
                                    </ul>
                                </div>
                            `,
                            confirmButtonColor: '#F59E0B',
                            confirmButtonText: 'Fix and Continue'
                        });
                        return;
                    }

                    // Form is valid! Close modal
                    const modalEl = document.getElementById('registerModal');
                    const modalInstance = bootstrap.Modal.getInstance(modalEl);
                    if (modalInstance) {
                        modalInstance.hide();
                    }

                    // Trigger SweetAlert2 Success Popup
                    Swal.fire({
                        icon: 'success',
                        title: 'Registration Successful!',
                        html: `
                            <div class="py-2 text-center">
                                <h5 class="fw-bold text-dark mb-1">Welcome to Book My Slot!</h5>
                                <p class="mb-2 text-dark fs-6">Hello, <strong class="text-primary">${nameVal}</strong></p>
                                <p class="text-muted small mb-0">Your account has been created successfully. You can now explore venues and lock slots in real-time.</p>
                            </div>
                        `,
                        confirmButtonColor: '#F59E0B',
                        confirmButtonText: '<i class="bi bi-check-lg me-1"></i> Get Started',
                        allowOutsideClick: false
                    }).then(() => {
                        registerForm.reset();
                        registerForm.classList.remove('was-validated');
                    });
                });
            }
        });
    </script>
    @yield('scripts')
</body>
</html>
