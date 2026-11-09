<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Register Account – Book My Slot</title>
    <meta name="description" content="Create your Book My Slot account as an event customer or convention centre venue owner.">

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

    <style>
        :root {
            --bms-dark: #0A0F1D;
            --bms-gold: #F59E0B;
            --bms-gold-hover: #D97706;
        }

        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            background: radial-gradient(circle at 15% 15%, rgba(245, 158, 11, 0.08) 0%, transparent 40%),
                        radial-gradient(circle at 85% 85%, rgba(79, 70, 229, 0.12) 0%, transparent 40%),
                        #0A0F1D;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            color: #0F172A;
        }

        .text-gold {
            color: var(--bms-gold) !important;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0A0F1D;
            font-size: 1.3rem;
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        }

        .brand-text {
            font-size: 1.4rem;
            font-weight: 800;
            color: #FFFFFF;
            letter-spacing: -0.5px;
        }

        .register-card {
            background: #FFFFFF;
            border-radius: 24px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.45);
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
            max-width: 1060px;
            width: 100%;
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

        .form-control:focus, .form-select:focus {
            border-color: var(--bms-gold);
            box-shadow: 0 0 0 0.25rem rgba(245, 158, 11, 0.2);
        }

        @keyframes swalPop {
            0% { transform: scale(0.85); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
    </style>
</head>
<body>

    <div class="register-card">
        <div class="row g-0">
            <!-- Left Brand Showcase Panel -->
            <div class="col-lg-5 text-white p-4 p-lg-5 d-flex flex-column justify-content-between position-relative" style="background: linear-gradient(135deg, #0A0F1D 0%, #171E36 100%);">
                <div>
                    <!-- Back Link & Logo -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <a class="d-flex align-items-center gap-2 text-decoration-none" href="{{ url('/') }}">
                            <div class="brand-icon">
                                <i class="bi bi-buildings-fill"></i>
                            </div>
                            <span class="brand-text">Book<span class="text-gold">My</span>Slots</span>
                        </a>
                    </div>

                    <a href="{{ url('/') }}" class="text-white-50 text-decoration-none small d-inline-flex align-items-center gap-1 mb-4">
                        <i class="bi bi-arrow-left"></i> Back to Homepage
                    </a>

                    <h3 class="fw-bold mb-3">Join India's Premier Convention Marketplace</h3>
                   

                    <!-- Key Benefits -->
                    <div class="d-flex flex-column gap-3 mb-4">
                        <div class="d-flex align-items-start gap-3">
                            <div class="p-2 rounded-circle bg-white bg-opacity-10 text-gold fs-5"><i class="bi bi-clock-history"></i></div>
                            <div>
                                <h6 class="fw-bold mb-0 text-white small">15-Minute Slot Lock</h6>
                                <small class="text-white-50">Slots are reserved exclusively during your payment session.</small>
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-3">
                            <div class="p-2 rounded-circle bg-white bg-opacity-10 text-success fs-5"><i class="bi bi-patch-check-fill"></i></div>
                            <div>
                                <h6 class="fw-bold mb-0 text-white small">100% Verified Venues</h6>
                                <small class="text-white-50">Verified seating capacities, photos, amenities &amp; licenses.</small>
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-3">
                            <div class="p-2 rounded-circle bg-white bg-opacity-10 text-info fs-5"><i class="bi bi-wallet2"></i></div>
                            <div>
                                <h6 class="fw-bold mb-0 text-white small">25% Advance Booking</h6>
                                <small class="text-white-50">Lock auspicious wedding dates with low upfront payment.</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Left Panel Footer -->
                <div class="pt-3 border-top border-white border-opacity-10 text-white-50 small">
                    <i class="bi bi-shield-check text-gold me-1"></i> Over 52,000+ slots successfully booked across 20+ cities.
                </div>
            </div>

            <!-- Right Registration Form Panel -->
            <div class="col-lg-7 bg-white p-4 p-lg-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="fw-bold text-dark mb-1">Create an Account</h4>
                        <p class="text-muted small mb-0">Fill in your basic details to get started.</p>
                    </div>
                    <a href="{{ url('/') }}" class="text-muted text-decoration-none small d-lg-none">
                        <i class="bi bi-x-lg fs-5"></i>
                    </a>
                </div>

                <!-- Registration Form with Bootstrap Validation -->
                <form class="needs-validation" novalidate id="registerForm">
                    <div class="row g-3">
                        <!-- Full Name -->
                        <div class="col-md-6">
                            <label for="fullName" class="form-label small fw-semibold">Full Name <span class="text-danger">*</span></label>
                            <div class="input-group has-validation">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-person text-muted"></i></span>
                                <input type="text" class="form-control border-start-0" id="fullName" placeholder="e.g. Ramesh Varma" minlength="3" required>
                                <div class="invalid-feedback">
                                    Please enter your full name (min. 3 characters).
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>

                        <!-- Mobile Number: STRICTLY 10 DIGITS -->
                        <div class="col-md-6">
                            <label for="mobileNumber" class="form-label small fw-semibold">Mobile Number <span class="text-danger">*</span></label>
                            <div class="input-group has-validation">
                                <span class="input-group-text bg-light border-end-0 small fw-semibold text-muted">+91</span>
                                <input type="tel" 
                                       class="form-control border-start-0" 
                                       id="mobileNumber" 
                                       placeholder="10-digit number" 
                                       maxlength="10" 
                                       minlength="10" 
                                       pattern="[0-9]{10}" 
                                       oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" 
                                       required>
                                <div class="invalid-feedback" id="mobileFeedback">
                                    Please enter exactly 10 digits for the mobile number.
                                </div>
                                <div class="valid-feedback">
                                    Valid 10-digit number!
                                </div>
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="col-md-6">
                            <label for="emailAddress" class="form-label small fw-semibold">Email Address <span class="text-danger">*</span></label>
                            <div class="input-group has-validation">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                                <input type="email" class="form-control border-start-0" id="emailAddress" placeholder="name@domain.com" required>
                                <div class="invalid-feedback">
                                    Please provide a valid email address.
                                </div>
                                <div class="valid-feedback">
                                    Valid email!
                                </div>
                            </div>
                        </div>

                        <!-- City -->
                        <div class="col-md-6">
                            <label for="citySelect" class="form-label small fw-semibold">City <span class="text-danger">*</span></label>
                            <div class="input-group has-validation">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-geo-alt text-muted"></i></span>
                                <select class="form-select border-start-0" id="citySelect" required>
                                    <option value="" disabled selected>Select city</option>
                                    <option value="Hyderabad">Hyderabad</option>
                                    <option value="Bengaluru">Bengaluru</option>
                                    <option value="Chennai">Chennai</option>
                                    <option value="Mumbai">Mumbai</option>
                                    <option value="Delhi-NCR">Delhi - NCR</option>
                                    <option value="Other">Other City</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please choose your city.
                                </div>
                                <div class="valid-feedback">
                                    City selected!
                                </div>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="col-md-6">
                            <label for="regPass" class="form-label small fw-semibold">Password <span class="text-danger">*</span></label>
                            <div class="input-group has-validation">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock text-muted"></i></span>
                                <input type="password" class="form-control border-start-0" id="regPass" placeholder="Min. 6 characters" minlength="6" required>
                                <div class="invalid-feedback">
                                    Must be at least 6 characters.
                                </div>
                                <div class="valid-feedback">
                                    Valid password!
                                </div>
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="col-md-6">
                            <label for="regConfirmPass" class="form-label small fw-semibold">Confirm Password <span class="text-danger">*</span></label>
                            <div class="input-group has-validation">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-shield-lock text-muted"></i></span>
                                <input type="password" class="form-control border-start-0" id="regConfirmPass" placeholder="Re-type password" required>
                                <div class="invalid-feedback" id="confirmFeedback">
                                    Please confirm your password.
                                </div>
                                <div class="valid-feedback">
                                    Passwords match!
                                </div>
                            </div>
                        </div>

                        <!-- Terms Agreement -->
                        <div class="col-12 mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="termsCheck" required checked>
                                <label class="form-check-label small text-muted" for="termsCheck">
                                    I agree to Book My Slot's <a href="#" class="text-dark fw-bold">Terms of Service</a> &amp; <a href="#" class="text-dark fw-bold">Privacy Policy</a>.
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 mt-4">
                            <button type="submit" id="submitRegBtn" class="btn btn-gold w-100 py-3 fw-bold rounded-3 shadow-sm fs-6">
                                <i class="bi bi-check-circle-fill me-1"></i> Register Account
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Footer Sign In Link -->
                <div class="text-center mt-4 pt-3 border-top small text-muted">
                    Already registered? 
                    <a href="{{ url('/') }}" class="text-dark fw-bold text-decoration-none">
                        Sign In from Homepage
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Fallback & Execution Script -->
    <script>
        // Ensure Swal exists even if CDN is blocked or offline
        if (typeof Swal === 'undefined') {
            window.Swal = {
                fire: function(opts) {
                    return new Promise(function(resolve) {
                        const overlay = document.createElement('div');
                        overlay.id = 'custom-swal-popup';
                        overlay.style.cssText = 'position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(10,15,29,0.75);z-index:999999;display:flex;align-items:center;justify-content:center;backdrop-filter:blur(6px);padding:1rem;';
                        
                        const iconColor = opts.icon === 'success' ? '#10B981' : '#F59E0B';
                        const iconClass = opts.icon === 'success' ? 'bi-check-circle-fill' : 'bi-exclamation-triangle-fill';

                        overlay.innerHTML = `
                            <div style="background:#FFFFFF;border-radius:24px;max-width:460px;width:100%;padding:2.5rem 2rem;text-align:center;box-shadow:0 25px 60px rgba(0,0,0,0.3);animation:swalPop 0.25s ease-out;position:relative;">
                                <div style="font-size:3.5rem;color:${iconColor};margin-bottom:1rem;line-height:1;">
                                    <i class="bi ${iconClass}"></i>
                                </div>
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
            const form = document.getElementById('registerForm');
            const pass = document.getElementById('regPass');
            const confirmPass = document.getElementById('regConfirmPass');
            const confirmFeedback = document.getElementById('confirmFeedback');
            const mobile = document.getElementById('mobileNumber');

            // Live password match validation
            function checkPasswords() {
                if (pass && confirmPass) {
                    if (confirmPass.value && pass.value !== confirmPass.value) {
                        confirmPass.setCustomValidity('Passwords do not match');
                        confirmFeedback.textContent = 'Passwords do not match.';
                    } else {
                        confirmPass.setCustomValidity('');
                    }
                }
            }

            if (pass && confirmPass) {
                pass.addEventListener('input', checkPasswords);
                confirmPass.addEventListener('input', checkPasswords);
            }

            // Real-time mobile input cleaner (strictly numbers, max 10)
            if (mobile) {
                mobile.addEventListener('input', function() {
                    this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);
                    if (this.value.length === 10) {
                        this.setCustomValidity('');
                    }
                });
            }

            if (form) {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();
                    e.stopPropagation();

                    // Read field values
                    const nameInput = document.getElementById('fullName');
                    const mobileInput = document.getElementById('mobileNumber');
                    const emailInput = document.getElementById('emailAddress');
                    const cityInput = document.getElementById('citySelect');
                    const termsInput = document.getElementById('termsCheck');

                    const name = nameInput ? nameInput.value.trim() : '';
                    const mobileVal = mobileInput ? mobileInput.value.trim() : '';
                    const emailVal = emailInput ? emailInput.value.trim() : '';
                    const cityVal = cityInput ? cityInput.value : '';
                    const passVal = pass ? pass.value : '';
                    const confirmVal = confirmPass ? confirmPass.value : '';
                    const isTermsAgreed = termsInput ? termsInput.checked : false;

                    // Collect missing or invalid items
                    let errors = [];
                    if (!name || name.length < 3) {
                        errors.push('Full Name (minimum 3 characters)');
                    }
                    if (!mobileVal || mobileVal.length !== 10) {
                        errors.push('Mobile Number (must be exactly 10 digits)');
                    }
                    if (!emailVal || !emailVal.includes('@') || !emailVal.includes('.')) {
                        errors.push('Valid Email Address');
                    }
                    if (!cityVal) {
                        errors.push('Please select your City');
                    }
                    if (!passVal || passVal.length < 6) {
                        errors.push('Password (minimum 6 characters)');
                    }
                    if (passVal !== confirmVal) {
                        errors.push('Confirm Password must match Password');
                    }
                    if (!isTermsAgreed) {
                        errors.push('Agree to Terms & Conditions');
                    }

                    // If any error, show SweetAlert Warning so user is never confused!
                    if (errors.length > 0) {
                        form.classList.add('was-validated');
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

                    // Trigger SweetAlert2 SUCCESS Popup!
                    Swal.fire({
                        icon: 'success',
                        title: 'Registration Successful!',
                        html: `
                            <div class="py-2 text-center">
                                <h5 class="fw-bold text-dark mb-1">Welcome to Book My Slot!</h5>
                                <p class="mb-2 text-dark fs-6">Hello, <strong class="text-primary">${name}</strong></p>
                                <p class="text-muted small mb-0">Your account has been created successfully. You can now explore convention centres and lock slots in real-time.</p>
                            </div>
                        `,
                        confirmButtonColor: '#F59E0B',
                        confirmButtonText: '<i class="bi bi-arrow-right me-1"></i> Continue to Homepage',
                        allowOutsideClick: false
                    }).then(function() {
                        form.reset();
                        form.classList.remove('was-validated');
                        window.location.href = "{{ url('/') }}";
                    });
                });
            }
        });
    </script>
</body>
</html>
