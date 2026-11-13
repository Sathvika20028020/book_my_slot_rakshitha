@extends('admin.layout.centers.app')

@section('title') Convention Centre Dashboard @endsection

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    .kpi-card {
        border-radius: 16px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        border: 1px solid rgba(0, 0, 0, 0.08) !important;
        background: #ffffff !important;
    }
    .kpi-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 24px rgba(0, 0, 0, 0.06);
    }
    .kpi-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
    }
    .badge-kpi-success {
        background-color: #ecfdf5 !important;
        color: #047857 !important;
        border: 1px solid #a7f3d0 !important;
        font-weight: 700 !important;
        font-size: 0.75rem !important;
        padding: 3px 8px !important;
        border-radius: 6px !important;
    }
    .badge-kpi-warning {
        background-color: #fef3c7 !important;
        color: #92400e !important;
        border: 1px solid #fde68a !important;
        font-weight: 700 !important;
        font-size: 0.75rem !important;
        padding: 3px 8px !important;
        border-radius: 6px !important;
    }
    .badge-active-status {
        background-color: #ecfdf5 !important;
        color: #047857 !important;
        border: 1px solid #a7f3d0 !important;
        font-weight: 600 !important;
        font-size: 0.8rem !important;
        padding: 4px 10px !important;
        border-radius: 9999px !important;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Top Welcome Banner -->
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 style="color: #1e2f65;font-family: sans-serif;">Dashboard</h3>
            </div>
            <div
                class="col-12 col-md-6 text-md-end mt-2 mt-md-0 d-flex align-items-center justify-content-md-end gap-2">
                <ol class="breadcrumb justify-content-md-end mb-0 bg-transparent p-0 me-3 d-none d-lg-flex">
                    <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Grand Royal Convention Centre</li>
                </ol>

            </div>
        </div>
    </div>

    

    <!-- KPI Metric Cards -->
    <div class="row g-3 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card kpi-card shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3 p-3">
                    <div class="kpi-icon" style="background: rgba(37, 99, 235, 0.1); color: #2563eb;">
                        <i class="bi bi-calendar2-range-fill"></i>
                    </div>
                    <div>
                        <span class="text-secondary small fw-bold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.5px;">Total Bookings</span>
                        <h3 class="fw-bold mb-0 text-dark">48</h3>
                        <span class="badge bg-light text-muted border small mt-1">+8 this month</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card kpi-card shadow-sm h-100 border-warning border-start border-4">
                <div class="card-body d-flex align-items-center gap-3 p-3">
                    <div class="kpi-icon" style="background: rgba(245, 158, 11, 0.15); color: #d97706;">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <div>
                        <span class="text-secondary small fw-bold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.5px;">Pending CC Approval</span>
                        <h3 class="fw-bold mb-0 text-warning">3</h3>
                        <span class="badge-kpi-warning mt-1 d-inline-block">Action Required</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card kpi-card shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3 p-3">
                    <div class="kpi-icon" style="background: rgba(16, 185, 129, 0.12); color: #059669;">
                        <i class="bi bi-wallet2"></i>
                    </div>
                    <div>
                        <span class="text-secondary small fw-bold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.5px;">Total Revenue</span>
                        <h3 class="fw-bold mb-0 text-dark">Rs. 42.85 L</h3>
                        <span class="badge-kpi-success mt-1 d-inline-block">92% Settled</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card kpi-card shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3 p-3">
                    <div class="kpi-icon" style="background: rgba(14, 165, 233, 0.12); color: #0284c7;">
                        <i class="bi bi-door-open-fill"></i>
                    </div>
                    <div>
                        <span class="text-secondary small fw-bold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.5px;">Convention Halls</span>
                        <h3 class="fw-bold mb-0 text-dark">3</h3>
                        <span class="badge bg-light text-muted border small mt-1">Ballroom, Lawn, Mini</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Navigation Links -->
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-bold text-dark mb-1">Bookings Management</h6>
                        <p class="small text-muted mb-0">Approve or reject customer slot bookings</p>
                    </div>
                    <a href="{{ route('center_admin.booking.index') }}" class="btn btn-primary btn-sm rounded-pill px-3 fw-semibold">Open</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-bold text-dark mb-1">Slot Calendar</h6>
                        <p class="small text-muted mb-0">View monthly schedule & block specific dates</p>
                    </div>
                    <a href="{{ route('center_admin.calendar.index') }}" class="btn btn-outline-primary btn-sm rounded-pill px-3 fw-semibold">Open</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-bold text-dark mb-1">Payments & Settlements</h6>
                        <p class="small text-muted mb-0">Track customer payouts, escrow & bank deposits</p>
                    </div>
                    <a href="{{ route('center_admin.payments.index') }}" class="btn btn-outline-success btn-sm rounded-pill px-3 fw-semibold">Open</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
