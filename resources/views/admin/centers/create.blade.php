@extends('admin.layout.admin.app')

@section('title') Create Convention Centre Credentials @endsection

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<style>
    .form-control:focus, .form-select:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
    }
    .input-group-text {
        background-color: #f8fafc;
        border-color: #e2e8f0;
        color: #64748b;
    }

    /* Bootstrap Validation Styling */
    .form-control.is-invalid,
    .form-select.is-invalid {
        border-color: #dc3545 !important;
        background-color: #fff8f8 !important;
    }
    .form-control.is-valid,
    .form-select.is-valid {
        border-color: #198754 !important;
    }
    .invalid-feedback {
        display: none;
        width: 100%;
        margin-top: 0.35rem;
        font-size: 0.82rem;
        font-weight: 500;
        color: #dc3545 !important;
    }
    .invalid-feedback.d-block {
        display: block !important;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Breadcrumb & Top Bar -->
    <div class="page-title py-3">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <h4 class="fw-bold mb-1 text-dark d-flex align-items-center gap-2">
                    Conventional Centre Masters
                </h4>
            </div>
            <div class="col-12 col-md-6 text-md-end mt-2 mt-md-0 d-flex align-items-center justify-content-md-end gap-2">
                <ol class="breadcrumb justify-content-md-end mb-0 bg-transparent p-0 me-3 d-none d-lg-flex">
                    <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.centers.index') }}">Centre Masters</a></li>
                    <li class="breadcrumb-item active">Create Credentials</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-4">
    <div class="card shadow-sm border-0" style="border-radius: 12px;">
      

        <div class="card-body p-4">
            <form id="centerCredentialForm" novalidate>
                <div class="row g-4">
                    <!-- Row 1: Name & Phone Number -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-dark">Name <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name / Manager Name" required>
                        </div>
                        <div class="invalid-feedback">Please enter the name.</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-dark">Phone Number <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone"></i> +91</span>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter 10-digit mobile number" pattern="[0-9]{10}" maxlength="10" inputmode="numeric" oninput="this.value = this.value.replace(/\\D/g, '').slice(0, 10)" required>
                        </div>
                        <div class="invalid-feedback">Please enter a valid 10-digit mobile number.</div>
                    </div>

                    <!-- Row 2: Email & Which Center -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-dark">Email (Login ID) <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="email" placeholder="example@conventioncentre.com" required>
                        </div>
                        <div class="invalid-feedback">Please enter a valid email address.</div>
                    </div>

                  

                    <!-- Row 3: Password -->
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <label class="form-label fw-semibold text-dark mb-0">Password <span class="text-danger">*</span></label>
                            <button type="button" class="btn btn-sm btn-link text-primary p-0 text-decoration-none fw-semibold" id="autoGenerateBtn">
                                <i class="bi bi-magic me-1"></i>Auto-Generate
                            </button>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter secure password" required minlength="6">
                            <button class="btn btn-outline-secondary" type="button" id="togglePasswordBtn">
                                <i class="bi bi-eye" id="togglePasswordIcon"></i>
                            </button>
                        </div>
                        <div class="invalid-feedback">Please enter a password (min. 6 characters).</div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-primary d-flex align-items-center gap-2 shadow-sm" id="submitBtn">
        <i class="bi bi-check-circle-fill"></i> Create Credentials
    </button>
</div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('centerCredentialForm');
    const passwordInput = document.getElementById('password');
    const togglePasswordBtn = document.getElementById('togglePasswordBtn');
    const togglePasswordIcon = document.getElementById('togglePasswordIcon');
    const autoGenerateBtn = document.getElementById('autoGenerateBtn');
    const inputs = form.querySelectorAll('input, select');

    // Toggle password visibility
    togglePasswordBtn.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        togglePasswordIcon.classList.toggle('bi-eye');
        togglePasswordIcon.classList.toggle('bi-eye-slash');
    });

    // Auto-generate strong password
    autoGenerateBtn.addEventListener('click', function() {
        const chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789!@#$%';
        let generated = '';
        for (let i = 0; i < 10; i++) {
            generated += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        passwordInput.value = generated;
        passwordInput.setAttribute('type', 'text');
        togglePasswordIcon.classList.remove('bi-eye');
        togglePasswordIcon.classList.add('bi-eye-slash');

        // Clear error on password
        passwordInput.classList.remove('is-invalid');
        passwordInput.classList.add('is-valid');
        const parentCol = passwordInput.closest('.col-md-6');
        if (parentCol) {
            const feedback = parentCol.querySelector('.invalid-feedback');
            if (feedback) feedback.classList.remove('d-block');
        }
    });

    // Validate a single field
    function validateField(input) {
        const parentCol = input.closest('.col-md-6');
        const feedback = parentCol ? parentCol.querySelector('.invalid-feedback') : null;
        const val = input.value.trim();

        let isValid = input.checkValidity() && val !== '';

        if (!isValid) {
            input.classList.add('is-invalid');
            input.classList.remove('is-valid');
            if (feedback) feedback.classList.add('d-block');
            return false;
        } else {
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');
            if (feedback) feedback.classList.remove('d-block');
            return true;
        }
    }

    // Real-time validation feedback on typing / changing
    inputs.forEach(function(input) {
        input.addEventListener('input', function() {
            if (form.classList.contains('was-submitted') || input.classList.contains('is-invalid')) {
                validateField(input);
            }
        });
        input.addEventListener('change', function() {
            if (form.classList.contains('was-submitted') || input.classList.contains('is-invalid')) {
                validateField(input);
            }
        });
    });

    // On Submit: Show Bootstrap validations if any required field is empty/invalid
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        event.stopPropagation();

        form.classList.add('was-submitted');

        let isFormValid = true;
        inputs.forEach(function(input) {
            const valid = validateField(input);
            if (!valid) {
                isFormValid = false;
            }
        });

        // If user didn't enter anything or any required field is invalid, STOP and let Bootstrap show error messages
        if (!isFormValid) {
            const firstInvalid = form.querySelector('.is-invalid');
            if (firstInvalid) {
                firstInvalid.focus();
            }
            return;
        }

        // All required fields entered and valid -> Trigger SweetAlert popup
        const name = document.getElementById('name').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const email = document.getElementById('email').value.trim();
        const whichCenter = document.getElementById('which_center').value;
        const password = passwordInput.value;

        Swal.fire({
            icon: 'success',
            title: 'Credentials Created Successfully!',
            html: `
                <div class="text-start bg-light p-3 rounded border font-monospace small">
                    <div><strong>Name:</strong> ${name}</div>
                    <div><strong>Center:</strong> ${whichCenter}</div>
                    <div><strong>Phone:</strong> +91 ${phone}</div>
                    <div><strong>Login Email:</strong> ${email}</div>
                    <div><strong>Password:</strong> ${password}</div>
                </div>
            `,
            confirmButtonColor: '#4338ca',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = "{{ route('admin.centers.index') }}";
        });
    });
});
</script>
@endsection
