@extends('admin.layout.admin.app')

@section('title') Dashboard – Book My Slot @endsection

@section('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<style>
    .kpi-card {
        border-radius: 16px;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }
    .kpi-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 24px rgba(15, 23, 42, 0.08);
    }
    .kpi-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
    }
    .badge-soft-success {
        background-color: #d1fae5;
        color: #065f46;
        border: 1px solid #a7f3d0;
    }
    .badge-soft-warning {
        background-color: #fef3c7;
        color: #92400e;
        border: 1px solid #fde68a;
    }
    .badge-soft-primary {
        background-color: #e0e7ff;
        color: #3730a3;
        border: 1px solid #c7d2fe;
    }
    .app-avatar {
        width: 34px;
        height: 34px;
        border-radius: 8px;
        background: linear-gradient(135deg, #4F46E5 0%, #6366F1 100%);
        color: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.85rem;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Breadcrumb & Greeting -->
    <div class="page-title py-3">
        <div class="row align-items-center">
            <div class="col-12 col-sm-6">
                <h4 class="fw-bold mb-1 text-dark">
                    <i class="bi bi-speedometer2 text-warning me-2"></i>Platform Dashboard
                </h4>
                
            </div>
            <div class="col-12 col-sm-6 text-sm-end mt-2 mt-sm-0">
                <ol class="breadcrumb justify-content-sm-end mb-0 bg-transparent p-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" target="_blank"><i class="fa fa-home"></i> Frontend</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid general-widget">
    <!-- Top 4 KPI Metrics -->
    <div class="row g-3 mb-4">
        <!-- Metric 1: Total Registered Users / Applications -->
        <div class="col-sm-6 col-xl-3">
            <a href="{{ route('admin.application.index') }}" class="text-decoration-none">
                <div class="card kpi-card border-0 shadow-sm h-100">
                    <div class="card-body p-4 d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted small fw-semibold text-uppercase">Total Applications</span>
                            <h3 class="fw-bold text-dark mb-0 mt-1">1,248</h3>
                            <small class="text-primary fw-semibold"><i class="bi bi-arrow-right"></i> View Applications</small>
                        </div>
                        <div class="kpi-icon bg-primary-subtle text-primary">
                            <i class="bi bi-people-fill"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Metric 2: Verified Convention Centres -->
        <div class="col-sm-6 col-xl-3">
            <div class="card kpi-card border-0 shadow-sm h-100">
                <div class="card-body p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted small fw-semibold text-uppercase">Verified Venues</span>
                        <h3 class="fw-bold text-dark mb-0 mt-1">84</h3>
                        <small class="text-success fw-semibold"><i class="bi bi-patch-check-fill"></i> Across 5 cities</small>
                    </div>
                    <div class="kpi-icon bg-success-subtle text-success">
                        <i class="bi bi-building-check"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Metric 3: Active Slot Reservations -->
        <div class="col-sm-6 col-xl-3">
            <div class="card kpi-card border-0 shadow-sm h-100">
                <div class="card-body p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted small fw-semibold text-uppercase">Active Slot Locks</span>
                        <h3 class="fw-bold text-dark mb-0 mt-1">192</h3>
                        <small class="text-warning-emphasis fw-semibold"><i class="bi bi-clock-history"></i> 100% Collision-free</small>
                    </div>
                    <div class="kpi-icon bg-warning-subtle text-warning-emphasis">
                        <i class="bi bi-calendar2-check-fill"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Metric 4: Platform Revenue / Advances -->
        <div class="col-sm-6 col-xl-3">
            <div class="card kpi-card border-0 shadow-sm h-100">
                <div class="card-body p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted small fw-semibold text-uppercase">Total Advance Volume</span>
                        <h3 class="fw-bold text-dark mb-0 mt-1">₹42.8 L</h3>
                        <small class="text-info fw-semibold"><i class="bi bi-wallet2"></i> Escrow settled</small>
                    </div>
                    <div class="kpi-icon bg-info-subtle text-info">
                        <i class="bi bi-currency-rupee"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Middle Section: Recent Applications Preview & Quick Live Activity -->
     <div class="container-fluid">
    <div class="row g-4 mb-4">
        <!-- Recent Applications Table Widget -->
        
            <div class="card ">
                
                <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="fw-bold mb-0 text-dark">Recent Registered Applications</h5>
                        
                    </div>
                    <a href="{{ route('admin.application.index') }}" class="btn btn-outline-primary btn-sm rounded-pill px-3 fw-semibold">
                        View All Applications <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                         <table class="table table-bordered table-striped  text-center align-middle" id="data-source-1"
                            style="width:100%">
                            <thead class="table-light text-muted small text-uppercase">
                                <tr>
                                    <th class="ps-4">Applicant</th>
                                    <th>Mobile (10 Digits)</th>
                                    <th>Email</th>
                                    <th>City</th>
                                    <th>Status</th>
                                    <th class="text-end pe-4">Action</th>
                                </tr>
                            </thead>
                            <tbody class="small">
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="app-avatar">RV</div>
                                            <div>
                                                <div class="fw-bold text-dark">Ramesh Varma</div>
                                                <small class="text-muted">Customer / Organizer</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="fw-semibold text-dark">+91 9876543210</span></td>
                                    <td class="text-muted">ramesh.varma@gmail.com</td>
                                    <td><span class="badge bg-light text-dark border">Hyderabad</span></td>
                                    <td><span class="badge badge-soft-success px-2 py-1 rounded-pill">Approved</span></td>
                                    <td class="text-end pe-4">
                                        <a href="{{ route('admin.application.index') }}" class="btn btn-sm btn-outline-secondary">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="app-avatar" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">PS</div>
                                            <div>
                                                <div class="fw-bold text-dark">Priya Sundaram</div>
                                                <small class="text-muted">Event Organizer</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="fw-semibold text-dark">+91 9848012345</span></td>
                                    <td class="text-muted">priya.sundaram@cloudtech.com</td>
                                    <td><span class="badge bg-light text-dark border">Bengaluru</span></td>
                                    <td><span class="badge badge-soft-success px-2 py-1 rounded-pill">Approved</span></td>
                                    <td class="text-end pe-4">
                                        <a href="{{ route('admin.application.index') }}" class="btn btn-sm btn-outline-secondary">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="app-avatar" style="background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%); color: #0A0F1D;">MK</div>
                                            <div>
                                                <div class="fw-bold text-dark">Mohit Khemka</div>
                                                <small class="text-muted">Venue Manager</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="fw-semibold text-dark">+91 9988776655</span></td>
                                    <td class="text-muted">mohit.khemka@grandpalace.in</td>
                                    <td><span class="badge bg-light text-dark border">Chennai</span></td>
                                    <td><span class="badge badge-soft-success px-2 py-1 rounded-pill">Approved</span></td>
                                    <td class="text-end pe-4">
                                        <a href="{{ route('admin.application.index') }}" class="btn btn-sm btn-outline-secondary">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="app-avatar" style="background: linear-gradient(135deg, #EC4899 0%, #DB2777 100%);">AR</div>
                                            <div>
                                                <div class="fw-bold text-dark">Ananya Reddy</div>
                                                <small class="text-muted">Wedding Customer</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="fw-semibold text-dark">+91 9700112233</span></td>
                                    <td class="text-muted">ananya.reddy@gmail.com</td>
                                    <td><span class="badge bg-light text-dark border">Hyderabad</span></td>
                                    <td><span class="badge badge-soft-warning px-2 py-1 rounded-pill">Pending</span></td>
                                    <td class="text-end pe-4">
                                        <a href="{{ route('admin.application.index') }}" class="btn btn-sm btn-outline-secondary">View</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
</div>
@endsection
