
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Register Account – Book My Slot</title>
    <meta name="description" content="Create your Book My Slot account as an event customer or convention centre venue owner.">

    <link rel="icon" href="{{ asset('/theme/images/logoicon2.png') }}" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        :root {
            --bms-dark: #0A0F1D;
            --bms-gold: #F59E0B;
            --bms-gold-hover: #D97706;
        }

        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            background:
                radial-gradient(circle at 15% 15%, rgba(245, 158, 11, 0.08) 0%, transparent 40%),
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

        .btn-gold:disabled {
            opacity: .7;
            cursor: not-allowed;
            transform: none;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--bms-gold);
            box-shadow: 0 0 0 0.25rem rgba(245, 158, 11, 0.2);
        }

        .swal2-popup {
            border-radius: 18px;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        @media(max-width: 767px) {
            body {
                padding: 1rem;
            }

            .register-card {
                border-radius: 16px;
            }
        }
    </style>
</head>

<body>

<div class="register-card">
    <div class="row g-0">

        <!-- Left Brand Showcase Panel -->
        <div class="col-lg-5 text-white p-4 p-lg-5 d-flex flex-column justify-content-between position-relative"
             style="background: linear-gradient(135deg, #0A0F1D 0%, #171E36 100%);">

            <div>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <a class="d-flex align-items-center gap-2 text-decoration-none"
                       href="{{ url('/') }}">
                        <div class="brand-icon">
                            <i class="bi bi-buildings-fill"></i>
                        </div>
                        <span class="brand-text">Book<span class="text-gold">My</span>Slots</span>
                    </a>
                </div>

                <a href="{{ url('/') }}"
                   class="text-white-50 text-decoration-none small d-inline-flex align-items-center gap-1 mb-4">
                    <i class="bi bi-arrow-left"></i> Back to Homepage
                </a>

                <h3 class="fw-bold mb-3">
                    Join India's Premier Convention Marketplace
                </h3>

                <div class="d-flex flex-column gap-3 mb-4">

                    <div class="d-flex align-items-start gap-3">
                        <div class="p-2 rounded-circle bg-white bg-opacity-10 text-gold fs-5">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0 text-white small">15-Minute Slot Lock</h6>
                            <small class="text-white-50">
                                Slots are reserved exclusively during your payment session.
                            </small>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3">
                        <div class="p-2 rounded-circle bg-white bg-opacity-10 text-success fs-5">
                            <i class="bi bi-patch-check-fill"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0 text-white small">100% Verified Venues</h6>
                            <small class="text-white-50">
                                Verified seating capacities, photos, amenities &amp; licenses.
                            </small>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3">
                        <div class="p-2 rounded-circle bg-white bg-opacity-10 text-info fs-5">
                            <i class="bi bi-wallet2"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0 text-white small">25% Advance Booking</h6>
                            <small class="text-white-50">
                                Lock auspicious wedding dates with low upfront payment.
                            </small>
                        </div>
                    </div>

                </div>
            </div>

            <div class="pt-3 border-top border-white border-opacity-10 text-white-50 small">
                <i class="bi bi-shield-check text-gold me-1"></i>
                Over 52,000+ slots successfully booked across 20+ cities.
            </div>
        </div>

        <!-- Right Registration Form Panel -->
        <div class="col-lg-7 bg-white p-4 p-lg-5">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold text-dark mb-1">Create an Account</h4>
                    <p class="text-muted small mb-0">
                        Fill in your basic details to get started.
                    </p>
                </div>

                <a href="{{ url('/') }}"
                   class="text-muted text-decoration-none small d-lg-none">
                    <i class="bi bi-x-lg fs-5"></i>
                </a>
            </div>

            <!-- Laravel Validation Errors -->
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Please correct the following:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Registration Form -->
            <form class="needs-validation"
                  method="POST"
                  action="{{ route('register.store') }}"
                  novalidate
                  id="registerForm">

                @csrf

                <div class="row g-3">

                    <!-- Full Name -->
                    <div class="col-md-6">
                        <label for="fullName" class="form-label small fw-semibold">
                            Full Name <span class="text-danger">*</span>
                        </label>

                        <div class="input-group has-validation">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bi bi-person text-muted"></i>
                            </span>

                            <input type="text"
                                   class="form-control border-start-0"
                                   name="name"
                                   id="fullName"
                                   value="{{ old('name') }}"
                                   placeholder="e.g. Ramesh Varma"
                                   minlength="3"
                                   required>

                            <div class="invalid-feedback">
                                Please enter your full name (min. 3 characters).
                            </div>
                        </div>
                    </div>

                    <!-- Mobile Number -->
                    <div class="col-md-6">
                        <label for="mobileNumber" class="form-label small fw-semibold">
                            Mobile Number <span class="text-danger">*</span>
                        </label>

                        <div class="input-group has-validation">
                            <span class="input-group-text bg-light border-end-0 small fw-semibold text-muted">
                                +91
                            </span>

                            <input type="tel"
                                   class="form-control border-start-0"
                                   id="mobileNumber"
                                   name="phone"
                                   value="{{ old('phone') }}"
                                   placeholder="10-digit number"
                                   maxlength="10"
                                   minlength="10"
                                   pattern="[0-9]{10}"
                                   required>

                            <div class="invalid-feedback">
                                Please enter exactly 10 digits.
                            </div>
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div class="col-md-6">
                        <label for="emailAddress" class="form-label small fw-semibold">
                            Email Address <span class="text-danger">*</span>
                        </label>

                        <div class="input-group has-validation">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bi bi-envelope text-muted"></i>
                            </span>

                            <input type="email"
                                   class="form-control border-start-0"
                                   name="email"
                                   id="emailAddress"
                                   value="{{ old('email') }}"
                                   placeholder="name@domain.com"
                                   required>

                            <div class="invalid-feedback">
                                Please provide a valid email address.
                            </div>
                        </div>
                    </div>

                    <!-- City -->
                    <div class="col-md-6">
                        <label for="citySelect" class="form-label small fw-semibold">
                            City <span class="text-danger">*</span>
                        </label>

                        <div class="input-group has-validation">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bi bi-geo-alt text-muted"></i>
                            </span>

                            <select class="form-select border-start-0"
                                    name="city_id"
                                    id="citySelect"
                                    required>

                                <option value="" disabled {{ old('city_id') ? '' : 'selected' }}>
                                    Select city
                                </option>

                                @foreach([
                                    'Hyderabad',
                                    'Bengaluru',
                                    'Chennai',
                                    'Mumbai',
                                    'Delhi-NCR',
                                    'Other'
                                ] as $city)
                                    <option value="{{ $city }}"
                                        {{ old('city_id') == $city ? 'selected' : '' }}>
                                        {{ $city == 'Delhi-NCR' ? 'Delhi - NCR' : ($city == 'Other' ? 'Other City' : $city) }}
                                    </option>
                                @endforeach

                            </select>

                            <div class="invalid-feedback">
                                Please choose your city.
                            </div>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="col-md-6">
                        <label for="regPass" class="form-label small fw-semibold">
                            Password <span class="text-danger">*</span>
                        </label>

                        <div class="input-group has-validation">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bi bi-lock text-muted"></i>
                            </span>

                            <input type="password"
                                   class="form-control border-start-0"
                                   name="password"
                                   id="regPass"
                                   placeholder="Min. 6 characters"
                                   minlength="6"
                                   required>

                            <div class="invalid-feedback">
                                Must be at least 6 characters.
                            </div>
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="col-md-6">
                        <label for="regConfirmPass" class="form-label small fw-semibold">
                            Confirm Password <span class="text-danger">*</span>
                        </label>

                        <div class="input-group has-validation">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bi bi-shield-lock text-muted"></i>
                            </span>

                            <input type="password"
                                   class="form-control border-start-0"
                                   name="password_confirmation"
                                   id="regConfirmPass"
                                   placeholder="Re-type password"
                                   required>

                            <div class="invalid-feedback" id="confirmFeedback">
                                Passwords must match.
                            </div>
                        </div>
                    </div>

                    <!-- Terms Agreement -->
                    <div class="col-12 mt-3">
                        <div class="form-check">

                            <input class="form-check-input"
                                   type="checkbox"
                                   name="terms"
                                   value="1"
                                   id="termsCheck"
                                   required>

                            <label class="form-check-label small text-muted" for="termsCheck">
                                I agree to Book My Slot's
                                <a href="#" class="text-dark fw-bold">Terms of Service</a>
                                &amp;
                                <a href="#" class="text-dark fw-bold">Privacy Policy</a>.
                            </label>

                            <div class="invalid-feedback">
                                You must agree before submitting.
                            </div>

                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-12 mt-4">
                        <button type="submit"
                                id="submitRegBtn"
                                class="btn btn-gold w-100 py-3 fw-bold rounded-3 shadow-sm fs-6">

                            <i class="bi bi-check-circle-fill me-1"></i>
                            Register Account

                        </button>
                    </div>

                </div>
            </form>

            <!-- Footer Sign In Link -->
            <div class="text-center mt-4 pt-3 border-top small text-muted">
                Already registered?
                <a href="{{ url('/') }}"
                   class="text-dark fw-bold text-decoration-none">
                    Sign In from Homepage
                </a>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('registerForm');
    const pass = document.getElementById('regPass');
    const confirmPass = document.getElementById('regConfirmPass');
    const mobile = document.getElementById('mobileNumber');
    const submitBtn = document.getElementById('submitRegBtn');

    if (!form) return;

    let isSubmitting = false;

    // Password matching
    function checkPasswords() {
        if (!pass || !confirmPass) return;

        if (confirmPass.value !== pass.value) {
            confirmPass.setCustomValidity('Passwords do not match');
        } else {
            confirmPass.setCustomValidity('');
        }
    }

    pass.addEventListener('input', checkPasswords);
    confirmPass.addEventListener('input', checkPasswords);

    // Mobile number restriction
    mobile.addEventListener('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);
    });

    // Form submission
    form.addEventListener('submit', function (e) {

        e.preventDefault();

        if (isSubmitting) return;

        checkPasswords();

        if (!form.checkValidity()) {

            form.classList.add('was-validated');

            Swal.fire({
                icon: 'warning',
                title: 'Please Complete Details',
                text: 'Please check all required fields and correct the errors.',
                confirmButtonColor: '#F59E0B',
                confirmButtonText: 'Fix and Continue'
            });

            return;
        }

        const name = document.getElementById('fullName').value.trim();

        // This is only a confirmation popup.
        // Actual success is displayed after Laravel saves the user.
        Swal.fire({
            icon: 'success',
            title: 'Details Verified!',
            html: `
                <div class="py-2 text-center">
                    <h5 class="fw-bold text-dark mb-2">
                        Welcome to Book My Slot!
                    </h5>
                    <p class="mb-2 text-dark">
                        Hello, <strong class="text-primary">${escapeHtml(name)}</strong>
                    </p>
                    <p class="text-muted small mb-0">
                        Your details are ready.
                        Click continue to complete your registration.
                    </p>
                </div>
            `,
            confirmButtonColor: '#F59E0B',
            confirmButtonText: 'Continue',
            allowOutsideClick: false,
            allowEscapeKey: false
        }).then(function (result) {

            if (result.isConfirmed) {

                isSubmitting = true;

                submitBtn.disabled = true;

                submitBtn.innerHTML = `
                    <span class="spinner-border spinner-border-sm me-2"></span>
                    Registering...
                `;

                // Submit the form directly to Laravel
                HTMLFormElement.prototype.submit.call(form);
            }

        });

    });

    // Escape user input before showing it in HTML
    function escapeHtml(value) {
        const div = document.createElement('div');
        div.textContent = value;
        return div.innerHTML;
    }

});

// Display success only after Laravel redirects back
@if(session('success'))
    Swal.fire({
        icon: 'success',
        title: 'Registration Completed!',
        text: @json(session('success')),
        confirmButtonColor: '#F59E0B'
    });
@endif

// Display Laravel validation errors
@if($errors->any())
    Swal.fire({
        icon: 'error',
        title: 'Registration Failed',
        text: @json($errors->first()),
        confirmButtonColor: '#F59E0B'
    });
@endif
</script>

</body>
</html>
