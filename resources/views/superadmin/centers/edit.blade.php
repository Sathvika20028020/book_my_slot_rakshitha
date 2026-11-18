
@extends('superadmin.layout.app')

@section('title')
    Edit Convention Centre Credentials
@endsection

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<style>
    .form-control:focus,
    .form-select:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
    }

    .input-group-text {
        background-color: #f8fafc;
        border-color: #e2e8f0;
        color: #64748b;
    }

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

    .credential-card {
        border: 0;
        border-radius: 12px;
        box-shadow: 0 2px 12px rgba(30, 60, 120, 0.07);
    }

    .section-heading {
        font-size: 15px;
        font-weight: 700;
        color: #334155;
    }

    .required {
        color: #dc3545;
    }
</style>
@endsection

@section('content')

<div class="container-fluid">

    <!-- Breadcrumb -->
    <div class="page-title py-3">
        <div class="row align-items-center">

            <div class="col-12 col-md-6">
                <h4 class="fw-bold mb-1 text-dark">
                    <i class="bi bi-pencil-square me-2"></i>
                    Edit Convention Centre Credentials
                </h4>
                <small class="text-muted">
                    Update the existing convention centre login details.
                </small>
            </div>

            <div class="col-12 col-md-6 text-md-end mt-2 mt-md-0">
                <ol class="breadcrumb justify-content-md-end mb-0 bg-transparent p-0">
                    <li class="breadcrumb-item">
                        <a href="">
                            <i class="fa fa-home"></i> Dashboard
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('superadmin.conventionlogins.index') }}">
                            Centre Masters
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Edit Credentials
                    </li>
                </ol>
            </div>

        </div>
    </div>

</div>


<div class="container-fluid py-4">

    <div class="card credential-card">

        <div class="card-header bg-white border-bottom p-4">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">

                <div>
                    <h5 class="fw-bold mb-1">
                        <i class="bi bi-person-gear me-2 text-primary"></i>
                        Convention Centre Details
                    </h5>

                    <small class="text-muted">
                        Editing existing credentials
                    </small>
                </div>

                <span class="badge bg-primary-subtle text-primary px-3 py-2">
                    ID: {{ $user->id }}
                </span>

            </div>
        </div>


        <div class="card-body p-4">

            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif


            <!-- Error Message -->
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    {{ session('error') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif


            <!-- Validation Errors -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Please correct the following errors:</strong>

                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form
                id="editCredentialForm"
                action="{{ route('superadmin.conventionlogins.update', $user->id) }}"
                method="POST"
                novalidate
            >

                @csrf
                @method('PUT')

                <div class="row g-4">

                    <!-- Venue ID -->
                    <div class="col-md-6">

                        <label class="form-label fw-semibold text-dark">
                            Venue ID
                        </label>

                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-building"></i>
                            </span>

                            <input
                                type="text"
                                class="form-control bg-light"
                                value="{{ $user->venue_id ?? 'Not Generated' }}"
                                readonly
                            >
                        </div>

                        <small class="text-muted">
                            Venue ID is system-generated and cannot be edited.
                        </small>

                    </div>


                    <!-- Name -->
                    <div class="col-md-6">

                        <label class="form-label fw-semibold text-dark">
                            Name <span class="required">*</span>
                        </label>

                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person"></i>
                            </span>

                            <input
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                name="name"
                                value="{{ old('name', $user->incharge_name) }}"
                                placeholder="Enter Full Name / Manager Name"
                                minlength="3"
                                maxlength="255"
                                required
                            >
                        </div>

                        <div class="invalid-feedback">
                            Please enter a valid name (minimum 3 characters).
                        </div>

                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <!-- Phone -->
                    <div class="col-md-6">

                        <label class="form-label fw-semibold text-dark">
                            Phone Number <span class="required">*</span>
                        </label>

                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-telephone"></i> +91
                            </span>

                            <input
                                type="tel"
                                class="form-control @error('phone') is-invalid @enderror"
                                id="phone"
                                name="phone"
                                value="{{ old('phone', $user->phone) }}"
                                placeholder="Enter 10-digit mobile number"
                                pattern="[0-9]{10}"
                                maxlength="10"
                                minlength="10"
                                inputmode="numeric"
                                oninput="this.value = this.value.replace(/\D/g, '').slice(0, 10)"
                                required
                            >
                        </div>

                        <div class="invalid-feedback">
                            Please enter a valid 10-digit mobile number.
                        </div>

                        @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <!-- Email -->
                    <div class="col-md-6">

                        <label class="form-label fw-semibold text-dark">
                            Email (Login ID) <span class="required">*</span>
                        </label>

                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-envelope"></i>
                            </span>

                            <input
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                name="email"
                                value="{{ old('email', $user->email) }}"
                                placeholder="example@conventioncentre.com"
                                maxlength="255"
                                required
                            >
                        </div>

                        <div class="invalid-feedback">
                            Please enter a valid email address.
                        </div>

                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <!-- Password -->
                    <div class="col-md-6">

                        <div class="d-flex justify-content-between align-items-center mb-1">

                            <label class="form-label fw-semibold text-dark mb-0">
                                New Password
                            </label>

                            <button
                                type="button"
                                class="btn btn-sm btn-link text-primary p-0 text-decoration-none fw-semibold"
                                id="autoGenerateBtn"
                            >
                                <i class="bi bi-magic me-1"></i>
                                Generate New
                            </button>

                        </div>

                        <div class="input-group">

                            <span class="input-group-text">
                                <i class="bi bi-lock"></i>
                            </span>

                            <input
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                id="password"
                                name="password"
                                placeholder="Enter new password (optional)"
                                minlength="6"
                                maxlength="255"
                            >

                            <button
                                class="btn btn-outline-secondary"
                                type="button"
                                id="togglePasswordBtn"
                            >
                                <i class="bi bi-eye" id="togglePasswordIcon"></i>
                            </button>

                        </div>

                        <div class="invalid-feedback">
                            Password must contain at least 6 characters.
                        </div>

                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                        <small class="text-muted d-block mt-2">
                            <i class="bi bi-info-circle me-1"></i>
                            Leave blank to retain the existing password.
                            Enter a new password only if you want to change it.
                        </small>

                    </div>


                   
                 {{--    <div class="col-md-6">

                        <label class="form-label fw-semibold text-dark">
                            Account Status
                        </label>

                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-toggle-on"></i>
                            </span>

                            <input
                                type="text"
                                class="form-control bg-light"
                                value="{{ $user->status }}"
                                readonly
                            >
                        </div>

                        <small class="text-muted">
                            Current account status.
                        </small>

                    </div>  --}}


                  
                    <div class="col-12">

                        <hr class="my-2">

                        <div class="d-flex justify-content-end flex-wrap gap-2">

                            <a
                                href="{{ route('superadmin.conventionlogins.index') }}"
                                class="btn btn-light border px-4"
                            >
                                <i class="bi bi-arrow-left me-1"></i>
                                Cancel
                            </a>

                            <button
                                type="submit"
                                class="btn btn-primary px-4 d-flex align-items-center gap-2 shadow-sm"
                                id="submitBtn"
                            >
                                <i class="bi bi-check-circle-fill"></i>
                                Update Credentials
                            </button>

                        </div>

                    </div>

                </div> 

            </form>

        </div>

    </div>

</div>

@endsection


@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('editCredentialForm');

    const passwordInput = document.getElementById('password');

    const togglePasswordBtn = document.getElementById('togglePasswordBtn');

    const togglePasswordIcon = document.getElementById('togglePasswordIcon');

    const autoGenerateBtn = document.getElementById('autoGenerateBtn');

    const submitBtn = document.getElementById('submitBtn');

    let isSubmitting = false;


    // Password visibility toggle
    togglePasswordBtn.addEventListener('click', function () {

        const type = passwordInput.type === 'password'
            ? 'text'
            : 'password';

        passwordInput.type = type;

        togglePasswordIcon.classList.toggle('bi-eye');

        togglePasswordIcon.classList.toggle('bi-eye-slash');

    });


    // Generate new password
    autoGenerateBtn.addEventListener('click', function () {

        const chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789!@#$%';

        let generated = '';

        for (let i = 0; i < 10; i++) {

            generated += chars.charAt(
                Math.floor(Math.random() * chars.length)
            );

        }

        passwordInput.value = generated;

        passwordInput.type = 'text';

        togglePasswordIcon.classList.remove('bi-eye');

        togglePasswordIcon.classList.add('bi-eye-slash');

        passwordInput.classList.remove('is-invalid');

        passwordInput.classList.add('is-valid');

    });


    // Validate individual fields
    function validateField(input) {

        const value = input.value.trim();

        let isValid = true;

        // Password is optional
        if (input.id === 'password' && value === '') {

            input.classList.remove('is-invalid');

            input.classList.remove('is-valid');

            return true;

        }

        isValid = input.checkValidity() && value !== '';

        if (!isValid) {

            input.classList.add('is-invalid');

            input.classList.remove('is-valid');

        } else {

            input.classList.remove('is-invalid');

            input.classList.add('is-valid');

        }

        return isValid;

    }


    // Real-time validation
    const inputs = form.querySelectorAll('input:not([readonly])');

    inputs.forEach(function (input) {

        input.addEventListener('input', function () {

            if (
                form.classList.contains('was-submitted') ||
                input.classList.contains('is-invalid')
            ) {
                validateField(input);
            }

        });

        input.addEventListener('change', function () {

            if (
                form.classList.contains('was-submitted') ||
                input.classList.contains('is-invalid')
            ) {
                validateField(input);
            }

        });

    });


    // Submit form with confirmation
    form.addEventListener('submit', function (event) {

        event.preventDefault();

        if (isSubmitting) {
            return;
        }

        form.classList.add('was-submitted');

        let isFormValid = true;

        inputs.forEach(function (input) {

            if (!validateField(input)) {

                isFormValid = false;

            }

        });


        if (!isFormValid) {

            const firstInvalid = form.querySelector('.is-invalid');

            if (firstInvalid) {
                firstInvalid.focus();
            }

            return;

        }


        const name = document.getElementById('name').value.trim();

        const phone = document.getElementById('phone').value.trim();

        const email = document.getElementById('email').value.trim();

        const passwordChanged = passwordInput.value.trim() !== '';


        // Confirmation popup
        Swal.fire({

            icon: 'question',

            title: 'Update Credentials?',

            html: `
                <div class="text-start bg-light p-3 rounded border small">

                    <div class="mb-2">
                        <strong>Name:</strong> ${escapeHtml(name)}
                    </div>

                    <div class="mb-2">
                        <strong>Phone:</strong> +91 ${escapeHtml(phone)}
                    </div>

                    <div class="mb-2">
                        <strong>Login Email:</strong> ${escapeHtml(email)}
                    </div>

                    <div>
                        <strong>Password:</strong>
                        ${passwordChanged ? 'A new password will be saved' : 'Existing password will remain unchanged'}
                    </div>

                </div>
            `,

            showCancelButton: true,

            confirmButtonColor: '#4338ca',

            cancelButtonColor: '#6c757d',

            confirmButtonText: 'Yes, Update',

            cancelButtonText: 'Cancel'

        }).then((result) => {

            if (result.isConfirmed) {

                isSubmitting = true;

                submitBtn.disabled = true;

                submitBtn.innerHTML = `
                    <span class="spinner-border spinner-border-sm"></span>
                    Updating...
                `;

                // Actually submit the form to Laravel
                form.submit();

            }

        });

    });


    // Safely display user-entered values in confirmation popup
    function escapeHtml(value) {

        return value.replace(/[&<>"']/g, function (char) {

            const entities = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            };

            return entities[char];

        });

    }


});

</script>

@endsection
