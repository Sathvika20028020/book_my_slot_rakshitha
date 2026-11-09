@extends('admin.layout.admin.app')

@section('title') Convention Centre Credential Details @endsection

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<style>
    .table-details th {
        width: 25%;
        background-color: #f8fafc !important;
        color: #475569;
        font-weight: 600;
        font-size: 0.88rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        vertical-align: middle;
        padding: 1rem 1.25rem;
    }
    .table-details td {
        vertical-align: middle;
        padding: 1rem 1.25rem;
        color: #1e293b;
        font-size: 0.95rem;
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
                    <li class="breadcrumb-item active">View Details</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-4">
    <div class="card shadow-sm border-0" style="border-radius: 12px;">
       

        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-bordered table-details align-middle mb-0">
                    <tbody>
                        <!-- 1. Name -->
                        <tr>
                            <th>
                                <i class="bi bi-person text-primary fs-5 me-2 align-middle"></i>
                                Name
                            </th>
                            <td class="fw-bold text-dark fs-6">
                                Rajesh Kumar
                            </td>
                        </tr>

                        <!-- 2. Phone Number -->
                        <tr>
                            <th>
                                <i class="bi bi-telephone text-primary fs-5 me-2 align-middle"></i>
                                Phone Number
                            </th>
                            <td class="fw-semibold text-dark">
                                +91 98765 43210
                            </td>
                        </tr>

                        <!-- 3. Email -->
                        <tr>
                            <th>
                                <i class="bi bi-envelope text-primary fs-5 me-2 align-middle"></i>
                                Email
                            </th>
                            <td>
                                <span class="font-monospace text-primary fw-semibold">admin@grandpalace.com</span>
                            </td>
                        </tr>

                        

                        <!-- 5. Password -->
                        <tr>
                            <th>
                                <i class="bi bi-lock text-primary fs-5 me-2 align-middle"></i>
                                Password
                            </th>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="font-monospace fs-6" id="passwordDisplay">••••••••••••</span>
                                    <button class="btn btn-sm btn-outline-warning py-1 px-2" id="togglePasswordShow" title="Show/Hide Password">
                                        <i class="bi bi-eye" id="eyeIcon"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const passwordDisplay = document.getElementById('passwordDisplay');
    const toggleBtn = document.getElementById('togglePasswordShow');
    const eyeIcon = document.getElementById('eyeIcon');
    const rawPassword = 'Grand@2026!';

    // Toggle Password visibility
    toggleBtn.addEventListener('click', function() {
        if (passwordDisplay.textContent === '••••••••••••') {
            passwordDisplay.textContent = rawPassword;
            passwordDisplay.classList.add('text-primary', 'fw-bold');
            eyeIcon.classList.remove('bi-eye');
            eyeIcon.classList.add('bi-eye-slash');
        } else {
            passwordDisplay.textContent = '••••••••••••';
            passwordDisplay.classList.remove('text-primary', 'fw-bold');
            eyeIcon.classList.remove('bi-eye-slash');
            eyeIcon.classList.add('bi-eye');
        }
    });
});
</script>
@endsection
