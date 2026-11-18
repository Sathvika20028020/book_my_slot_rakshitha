@extends('superadmin.layout.app')

@section('title') Convention Centre Credentials @endsection

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<style>
    .centre-avatar {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1rem;
        background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        color: #ffffff;
        flex-shrink: 0;
    }
    .table> :not(caption)>*>* {
        padding: 0.95rem 0.85rem;
        vertical-align: middle;
    }
    .action-btn {
        width: 32px;
        height: 32px;
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        font-size: 0.85rem;
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

                    Conventional Centre
                </h4>

            </div>
            <div
                class="col-12 col-md-6 text-md-end mt-2 mt-md-0 d-flex align-items-center justify-content-md-end gap-2">
                <ol class="breadcrumb justify-content-md-end mb-0 bg-transparent p-0 me-3 d-none d-lg-flex">
                    <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Conventional Centre</li>
                </ol>

            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4">
    

    <!-- Table Card -->
    <div class="card">
        <div class="card-body p-4">
       
<div class="row g-3 align-items-end">
    <div class="col-md-3 ms-auto">
        <a href="{{ route('superadmin.conventionlogins.create') }}"
           class="btn btn-primary d-flex align-items-center justify-content-center gap-2 shadow-sm">
            <i class="bi bi-plus-circle-fill"></i> Add Credentials
        </a>
    </div>
</div>
        <!-- Table View -->
      
<div class="table-responsive">
    <table class="table table-bordered table-striped text-center align-middle"
           id="data-source-1" style="width:100%">

        <thead>
            <tr>
                <th>Sl.no</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                 <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($user as $key => $item)
                <tr>
                    <td class="text-muted fw-bold">
                        {{ $key + 1 }}
                    </td>

                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <span class="fw-bold text-dark">
                                {{ $item->incharge_name ?? '-' }}
                            </span>
                        </div>
                    </td>

                    <td>
                        {{ $item->phone ?? '-' }}
                    </td>

                    <td>
                        <span class="font-monospace text-dark">
                            {{ $item->email ?? '-' }}
                        </span>
                    </td>
                    <td>
                           @if ($item->status === 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                   
                    </td>

                    <td class="text-end">
                        <div class="d-flex align-items-center justify-content-end gap-1">

                            <a href="{{ route('superadmin.conventionlogins.show', $item->id) }}"
                               class="btn btn-primary btn-sm"
                               title="View Details">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="{{ route('superadmin.conventionlogins.edit', $item->id) }}"
                               class="btn btn-warning btn-sm text-white"
                               title="Edit Credentials">
                                <i class="bi bi-pencil"></i>
                            </a>

                        </div>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="5" class="text-center py-4">
                        No convention centre login accounts found.
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>
</div>


       
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Copy buttons
    document.querySelectorAll('.copy-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            navigator.clipboard.writeText(this.dataset.copy);
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: 'Copied to clipboard',
                showConfirmButton: false,
                timer: 1200
            });
        });
    });

    // Toggle show/hide password in table row
    document.querySelectorAll('.toggle-pass-row').forEach(btn => {
        btn.addEventListener('click', function() {
            const span = this.previousElementSibling;
            const isHidden = span.textContent.includes('•');
            if (isHidden) {
                span.textContent = span.dataset.raw;
                span.classList.remove('text-muted');
                span.classList.add('text-primary', 'fw-bold');
                this.innerHTML = '<i class="bi bi-eye-slash"></i>';
            } else {
                span.textContent = '••••••••••••';
                span.classList.add('text-muted');
                span.classList.remove('text-primary', 'fw-bold');
                this.innerHTML = '<i class="bi bi-eye"></i>';
            }
        });
    });

    // Delete confirmation
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            Swal.fire({
                title: 'Delete Credentials?',
                text: 'This will remove the login credentials for this convention centre.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Yes, Delete'
            }).then((res) => {
                if (res.isConfirmed) {
                    Swal.fire('Deleted!', 'Credentials have been removed.', 'success');
                }
            });
        });
    });
});
</script>
@endsection
