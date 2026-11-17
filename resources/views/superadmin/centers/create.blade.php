@extends('superadmin.layout.admin.app')

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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Please correct the following:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="centerCredentialForm"
                  action="{{ route('admin.centers.store') }}"
                  method="POST"
                  novalidate>
                @csrf
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-dark">Name <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   id="name" name="name"
                                   value="{{ old('name') }}"
                                   placeholder="Enter Full Name / Manager Name"
                                   minlength="3" maxlength="255" required>
                        </div>
                        <div class="invalid-feedback @error('name') d-block @enderror">
                            @error('name'){{ $message }}@else Please enter the name (minimum 3 characters).@enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-dark">Phone Number <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone"></i> +91</span>
                            <input type="tel"
                                   class="form-control @error('phone') is-invalid @enderror"
                                   id="phone" name="phone"
                                   value="{{ old('phone') }}"
                                   placeholder="Enter 10-digit mobile number"
                                   pattern="[0-9]{10}" maxlength="10" inputmode="numeric" required>
                        </div>
                        <div class="invalid-feedback @error('phone') d-block @enderror">
                            @error('phone'){{ $message }}@else Please enter a valid 10-digit mobile number.@enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-dark">Email (Login ID) <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email"
                                   value="{{ old('email') }}"
                                   placeholder="example@conventioncentre.com"
                                   maxlength="255" required>
                        </div>
                        <div class="invalid-feedback @error('email') d-block @enderror">
                            @error('email'){{ $message }}@else Please enter a valid email address.@enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <label class="form-label fw-semibold text-dark mb-0">Password <span class="text-danger">*</span></label>
                            <button type="button" class="btn btn-sm btn-link text-primary p-0 text-decoration-none fw-semibold" id="autoGenerateBtn">
                                <i class="bi bi-magic me-1"></i>Auto-Generate
                            </button>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   id="password" name="password"
                                   placeholder="Enter secure password"
                                   minlength="6" autocomplete="new-password" required>
                            <button class="btn btn-outline-secondary" type="button" id="togglePasswordBtn" aria-label="Show or hide password">
                                <i class="bi bi-eye" id="togglePasswordIcon"></i>
                            </button>
                        </div>
                        <div class="invalid-feedback @error('password') d-block @enderror">
                            @error('password'){{ $message }}@else Please enter a password (minimum 6 characters).@enderror
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-center">
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
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('centerCredentialForm');
    const passwordInput = document.getElementById('password');
    const togglePasswordBtn = document.getElementById('togglePasswordBtn');
    const togglePasswordIcon = document.getElementById('togglePasswordIcon');
    const autoGenerateBtn = document.getElementById('autoGenerateBtn');
    const submitBtn = document.getElementById('submitBtn');
    const inputs = form.querySelectorAll('input[required]');

    togglePasswordBtn.addEventListener('click', function () {
        const show = passwordInput.type === 'password';
        passwordInput.type = show ? 'text' : 'password';
        togglePasswordIcon.classList.toggle('bi-eye', !show);
        togglePasswordIcon.classList.toggle('bi-eye-slash', show);
    });

    autoGenerateBtn.addEventListener('click', function () {
        const chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789!@#$%';
        let generated = '';
        for (let i = 0; i < 12; i++) {
            generated += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        passwordInput.value = generated;
        passwordInput.type = 'text';
        togglePasswordIcon.classList.remove('bi-eye');
        togglePasswordIcon.classList.add('bi-eye-slash');
        validateField(passwordInput);
    });

    const phoneInput = document.getElementById('phone');
    phoneInput.addEventListener('input', function () {
        this.value = this.value.replace(/\D/g, '').slice(0, 10);
    });

    function validateField(input) {
        const parentCol = input.closest('.col-md-6');
        const feedback = parentCol ? parentCol.querySelector('.invalid-feedback') : null;
        const isValid = input.checkValidity() && input.value.trim() !== '';

        input.classList.toggle('is-invalid', !isValid);
        input.classList.toggle('is-valid', isValid);
        if (feedback) feedback.classList.toggle('d-block', !isValid);
        return isValid;
    }

    inputs.forEach(function (input) {
        input.addEventListener('input', function () {
            if (form.classList.contains('was-submitted') || input.classList.contains('is-invalid')) {
                validateField(input);
            }
        });
        input.addEventListener('change', function () {
            if (form.classList.contains('was-submitted') || input.classList.contains('is-invalid')) {
                validateField(input);
            }
        });
    });

    form.addEventListener('submit', function (event) {
        form.classList.add('was-submitted');
        let valid = true;

        inputs.forEach(function (input) {
            if (!validateField(input)) valid = false;
        });

        if (!valid) {
            event.preventDefault();
            event.stopPropagation();
            const firstInvalid = form.querySelector('.is-invalid');
            if (firstInvalid) firstInvalid.focus();
            return;
        }

        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Creating...';
    });

    @if (session('success'))
        Swal.fire({ icon: 'success', title: 'Success', text: @json(session('success')), confirmButtonColor: '#4338ca' });
    @endif
    @if (session('error'))
        Swal.fire({ icon: 'error', title: 'Error', text: @json(session('error')), confirmButtonColor: '#4338ca' });
    @endif
});
</script>
@endsection
