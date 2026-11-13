@extends('admin.layout.centers.app')

@section('title') Convention Centre Bookings @endsection

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>




/* KPI Cards */
.kpi-card {
    border-radius: 14px;
    transition: all 0.2s ease;
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
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.35rem;
}

/* KPI Badges - High contrast with crisp readable text */
.badge-kpi-primary {
    background-color: #eff6ff !important;
    color: #1d4ed8 !important;
    border: 1px solid #bfdbfe !important;
    font-weight: 600 !important;
    font-size: 0.75rem !important;
    padding: 4px 8px !important;
    border-radius: 6px !important;
}

.badge-kpi-warning {
    background-color: #fef3c7 !important;
    color: #92400e !important;
    border: 1px solid #fde68a !important;
    font-weight: 700 !important;
    font-size: 0.75rem !important;
    padding: 4px 8px !important;
    border-radius: 6px !important;
}

.badge-kpi-success {
    background-color: #ecfdf5 !important;
    color: #065f46 !important;
    border: 1px solid #a7f3d0 !important;
    font-weight: 700 !important;
    font-size: 0.75rem !important;
    padding: 4px 8px !important;
    border-radius: 6px !important;
}

.badge-kpi-danger {
    background-color: #fee2e2 !important;
    color: #991b1b !important;
    border: 1px solid #fecaca !important;
    font-weight: 700 !important;
    font-size: 0.75rem !important;
    padding: 4px 8px !important;
    border-radius: 6px !important;
}

/* Filter Buttons */
.booking-filter-btn {
    border-radius: 9999px;
    padding: 0.45rem 1.25rem;
    font-weight: 600;
    font-size: 0.85rem;
    border: 1px solid #e2e8f0;
    transition: all 0.2s ease-in-out;
    color: #475569;
    background-color: #f8fafc;
    cursor: pointer;
}

.booking-filter-btn:hover {
    background-color: #e2e8f0;
    color: #0f172a;
}

.booking-filter-btn.active {
    background-color: #2563eb !important;
    border-color: #2563eb !important;
    color: #ffffff !important;
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.28);
}

/* Hall badges - Vibrant colors with clean high-contrast dark text */
.badge-hall-ballroom {
    background-color: #e0e7ff !important;
    color: #3730a3 !important;
    border: 1px solid #c7d2fe !important;
    font-weight: 700 !important;
    font-size: 0.76rem !important;
    padding: 3px 10px !important;
    border-radius: 6px !important;
    display: inline-block !important;
}

.badge-hall-lawn {
    background-color: #dcfce7 !important;
    color: #166534 !important;
    border: 1px solid #bbf7d0 !important;
    font-weight: 700 !important;
    font-size: 0.76rem !important;
    padding: 3px 10px !important;
    border-radius: 6px !important;
    display: inline-block !important;
}

.badge-hall-mini {
    background-color: #fef3c7 !important;
    color: #854d0e !important;
    border: 1px solid #fde68a !important;
    font-weight: 700 !important;
    font-size: 0.76rem !important;
    padding: 3px 10px !important;
    border-radius: 6px !important;
    display: inline-block !important;
}

/* Slot timing tag */
.slot-pill {
    background-color: #f1f5f9 !important;
    color: #334155 !important;
    border: 1px solid #e2e8f0 !important;
    font-weight: 600 !important;
    font-size: 0.74rem !important;
    padding: 3px 8px !important;
    border-radius: 6px !important;
    display: inline-block !important;
}

.slot-pill-blocked {
    background-color: #fff1f2 !important;
    color: #be123c !important;
    border: 1px solid #fecdd3 !important;
    font-weight: 600 !important;
    font-size: 0.74rem !important;
    padding: 3px 8px !important;
    border-radius: 6px !important;
    display: inline-block !important;
}

/* Payment Badges */
.badge-pay-adv {
    background-color: #ecfdf5 !important;
    color: #047857 !important;
    border: 1px solid #a7f3d0 !important;
    font-weight: 600 !important;
    font-size: 0.74rem !important;
    padding: 3px 8px !important;
    border-radius: 6px !important;
    display: inline-block !important;
}

.badge-pay-settled {
    background-color: #eff6ff !important;
    color: #1d4ed8 !important;
    border: 1px solid #bfdbfe !important;
    font-weight: 600 !important;
    font-size: 0.74rem !important;
    padding: 3px 8px !important;
    border-radius: 6px !important;
    display: inline-block !important;
}

.badge-pay-refund {
    background-color: #fff1f2 !important;
    color: #be123c !important;
    border: 1px solid #fecdd3 !important;
    font-weight: 600 !important;
    font-size: 0.74rem !important;
    padding: 3px 8px !important;
    border-radius: 6px !important;
    display: inline-block !important;
}

/* CC Status Badges */
.badge-status {
    display: inline-flex !important;
    align-items: center !important;
    gap: 0.35rem !important;
    padding: 0.4rem 0.95rem !important;
    border-radius: 9999px !important;
    font-weight: 700 !important;
    font-size: 0.78rem !important;
    letter-spacing: 0.2px !important;
}

.badge-status-pending {
    background-color: #fffbeb !important;
    color: #b45309 !important;
    border: 1px solid #fde68a !important;
}

.badge-status-approved {
    background-color: #ecfdf5 !important;
    color: #047857 !important;
    border: 1px solid #a7f3d0 !important;
}

.badge-status-rejected {
    background-color: #fff1f2 !important;
    color: #be123c !important;
    border: 1px solid #fecdd3 !important;
}

.badge-status-completed {
    background-color: #f0f9ff !important;
    color: #0369a1 !important;
    border: 1px solid #bae6fd !important;
}

/* CC Action Buttons - Highly Visible & Explicit Colors */
.btn-action-approve {
    background-color: #10b981 !important;
    border: 1px solid #059669 !important;
    color: #ffffff !important;
    font-weight: 700 !important;
    font-size: 0.82rem !important;
    padding: 0.38rem 0.95rem !important;
    border-radius: 9999px !important;
    display: inline-flex !important;
    align-items: center !important;
    gap: 4px !important;
    cursor: pointer !important;
    box-shadow: 0 2px 4px rgba(16, 185, 129, 0.2) !important;
    transition: all 0.15s ease !important;
}

.btn-action-approve:hover {
    background-color: #059669 !important;
    color: #ffffff !important;
    transform: translateY(-1px);
}

.btn-action-reject {
    background-color: #fee2e2 !important;
    border: 1px solid #f87171 !important;
    color: #dc2626 !important;
    /* CRITICAL: High-contrast red text */
    font-weight: 700 !important;
    font-size: 0.82rem !important;
    padding: 0.38rem 0.95rem !important;
    border-radius: 9999px !important;
    display: inline-flex !important;
    align-items: center !important;
    gap: 4px !important;
    cursor: pointer !important;
    transition: all 0.15s ease !important;
}

.btn-action-reject:hover {
    background-color: #ef4444 !important;
    border-color: #dc2626 !important;
    color: #ffffff !important;
    transform: translateY(-1px);
}

.btn btn-sm btn-primary {
    background-color: #f8fafc !important;
    border: 1px solid #cbd5e1 !important;
    color: #475569 !important;
    width: 32px !important;
    height: 32px !important;
    border-radius: 50% !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    font-size: 0.85rem !important;
    transition: all 0.15s ease !important;
}

.btn btn-sm btn-primary:hover {
    background-color: #e2e8f0 !important;
    color: #0f172a !important;
}

.btn-receipt {
    background-color: #f8fafc !important;
    border: 1px solid #cbd5e1 !important;
    color: #334155 !important;
    font-weight: 600 !important;
    font-size: 0.8rem !important;
    padding: 0.35rem 0.85rem !important;
    border-radius: 9999px !important;
    display: inline-flex !important;
    align-items: center !important;
    gap: 4px !important;
}

.btn-receipt:hover {
    background-color: #e2e8f0 !important;
    color: #0f172a !important;
}

/* Table styles */
.table-bookings {
    border-collapse: separate !important;
    border-spacing: 0 !important;
    width: 100% !important;
}

.table-bookings thead th {
    background-color: #f8fafc !important;
    color: #64748b !important;
    font-weight: 700 !important;
    font-size: 0.74rem !important;
    letter-spacing: 0.5px !important;
    padding: 12px 14px !important;
    border-bottom: 2px solid #e2e8f0 !important;
    white-space: nowrap !important;
}

.table-bookings tbody td {
    padding: 14px 14px !important;
    vertical-align: middle !important;
    border-bottom: 1px solid #f1f5f9 !important;
    background-color: #ffffff !important;
}

.table-bookings tbody tr:hover td {
    background-color: #f8fafc !important;
}

.booking-id-link {
    font-weight: 700;
    color: #2563eb;
    text-decoration: none;
}

.booking-id-link:hover {
    text-decoration: underline;
}

.customer-avatar {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 0.85rem;
    flex-shrink: 0;
}
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Top Header -->
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 style="color: #1e2f65;font-family: sans-serif;">Bookings</h3>
            </div>
            <div
                class="col-12 col-md-6 text-md-end mt-2 mt-md-0 d-flex align-items-center justify-content-md-end gap-2">
                <ol class="breadcrumb justify-content-md-end mb-0 bg-transparent p-0 me-3 d-none d-lg-flex">
                    <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Bookings</li>
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
                        <i class="bi bi-bookmark-star-fill"></i>
                    </div>
                    <div>
                        <span class="text-secondary small fw-bold text-uppercase"
                            style="font-size: 0.72rem; letter-spacing: 0.5px;">Total Bookings</span>
                        <h3 class="fw-bold mb-0 text-dark">48</h3>
                        <span class="badge-kpi-primary mt-1 d-inline-block">+6 this month</span>
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
                        <span class="text-secondary small fw-bold text-uppercase"
                            style="font-size: 0.72rem; letter-spacing: 0.5px;">Pending CC Approval</span>
                        <h3 class="fw-bold mb-0 text-warning">3</h3>
                        <span class="badge-kpi-warning mt-1 d-inline-block">Needs Attention</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card kpi-card shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3 p-3">
                    <div class="kpi-icon" style="background: rgba(16, 185, 129, 0.12); color: #059669;">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <div>
                        <span class="text-secondary small fw-bold text-uppercase"
                            style="font-size: 0.72rem; letter-spacing: 0.5px;">Approved & Locked</span>
                        <h3 class="fw-bold mb-0 text-success">38</h3>
                        <span class="badge-kpi-success mt-1 d-inline-block">94% Confirmation Rate</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card kpi-card shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3 p-3">
                    <div class="kpi-icon" style="background: rgba(239, 68, 68, 0.12); color: #dc2626;">
                        <i class="bi bi-x-circle-fill"></i>
                    </div>
                    <div>
                        <span class="text-secondary small fw-bold text-uppercase"
                            style="font-size: 0.72rem; letter-spacing: 0.5px;">Rejected / Cancelled</span>
                        <h3 class="fw-bold mb-0 text-danger">7</h3>
                        <span class="badge-kpi-danger mt-1 d-inline-block">Slots Released</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters & Table Card -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-4">
            <!-- Filter Bar -->
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
                <!-- Status Tabs -->
                <div class="d-flex flex-wrap gap-2" id="statusFilterButtons">
                    <button class="booking-filter-btn active" data-filter="all">All Bookings</button>
                    <button class="booking-filter-btn" data-filter="Pending">
                        Pending CC Approval <span class="badge bg-warning text-dark ms-1"
                            style="background-color: #fef08a !important; color: #854d0e !important; font-weight: 700;">3</span>
                    </button>
                    <button class="booking-filter-btn" data-filter="Approved">Approved</button>
                    <button class="booking-filter-btn" data-filter="Completed">Completed</button>
                    <button class="booking-filter-btn" data-filter="Rejected">Rejected</button>
                </div>

                <!-- Search and Hall filter -->
                <div class="d-flex flex-wrap align-items-center gap-2 ms-auto">
                    

                    <select id="hallFilter" class="form-select border-1" style="width: 170px;">
                        <option value="all" selected>All Halls</option>
                        <option value="Grand Ballroom">Grand Ballroom</option>
                        <option value="Garden Lawn">Garden Lawn</option>
                        <option value="Mini Hall">Mini Hall</option>
                    </select>
                </div>
            </div>

           
            <div class="table-responsive">
                <table class="display" id="data-source-1" style="width:100%">
                    <thead>
                        <tr>
                            <th>BOOKING ID</th>
                            <th>CUSTOMER DETAILS</th>
                            <th>HALL & EVENT</th>
                            <th>EVENT DATE & SLOT</th>
                            <th>TOTAL AMOUNT</th>
                            <th>CC STATUS</th>
                            <th class="text-center" style="min-width: 180px;">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Row 1 (Pending) -->
                        <tr>
                            <td>
                                <a href="#" class="booking-id-link">#CC-9041</a>
                                <div class="text-muted small">Booked Today, 10:20 AM</div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="customer-avatar text-white" style="background: #2563eb;">AK</div>
                                    <div>
                                        <div class="fw-bold text-dark">Aditya Kumar</div>
                                        <div class="small text-muted">+91 98765 43210</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge-hall-ballroom mb-1">Grand Ballroom</span>
                                <div class="fw-medium text-dark small">Wedding Reception (850 Guests)</div>
                            </td>
                            <td>
                                <div class="fw-bold text-dark">15 Nov 2026</div>
                                <span class="slot-pill">Evening (6:00 PM - 11:30 PM)</span>
                            </td>
                            <td>
                                <div class="fw-bold text-dark">Rs. 4,50,000</div>
                                <span class="badge-pay-adv">Adv. Rs. 1,00,000 Paid</span>
                            </td>
                            <td class="status-cell">
                                <span class="badge-status badge-status-pending">
                                    <i class="bi bi-clock-fill"></i> Pending
                                </span>
                            </td>
                            <td class="text-center action-cell">
                                <div class="d-flex align-items-center justify-content-center gap-2">
                                    <button class="btn-action-approve"
                                        onclick="openApproveModal('CC-9041', 'Aditya Kumar', 'Grand Ballroom', '15 Nov 2026')">
                                        <i class="bi bi-check-lg"></i> Approve
                                    </button>
                                    <button class="btn-action-reject"
                                        onclick="openRejectModal('CC-9041', 'Aditya Kumar')">
                                        <i class="bi bi-x-lg"></i> Reject
                                    </button>
                                    <a href="{{ route('center_admin.booking.show') }}?id=CC-9041"
                                        class="btn btn-sm btn-primary" title="View details">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>





                        <!-- Row 4 (Approved) -->
                        <tr>
                            <td>
                                <a href="#" class="booking-id-link">#CC-9035</a>
                                <div class="text-muted small">08 Nov 2026</div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="customer-avatar text-white" style="background: #f59e0b;">VP</div>
                                    <div>
                                        <div class="fw-bold text-dark">Vikram Patel</div>
                                        <div class="small text-muted">+91 97234 56789</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge-hall-ballroom mb-1">Grand Ballroom</span>
                                <div class="fw-medium text-dark small">Grand Wedding & Reception (1200 Guests)</div>
                            </td>
                            <td>
                                <div class="fw-bold text-dark">09 Nov 2026</div>
                                <span class="slot-pill">Full Day (8:00 AM - 11:00 PM)</span>
                            </td>
                            <td>
                                <div class="fw-bold text-dark">Rs. 6,80,000</div>
                                <span class="badge-pay-settled">Full Paid</span>
                            </td>
                            <td class="status-cell">
                                <span class="badge-status badge-status-approved">
                                    <i class="bi bi-check-circle-fill"></i> Approved
                                </span>
                            </td>
                            <td class="text-center action-cell">
                                <div class="d-flex align-items-center justify-content-center gap-2">
                                    <span class="badge bg-light text-success border fw-semibold px-2 py-1 small">Slot
                                        Confirmed</span>
                                    <a href="{{ route('center_admin.booking.show') }}?id=CC-9035"
                                        class="btn btn-sm btn-primary" title="View details">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>





                    </tbody>
                </table>
            </div>

            <!-- Empty State -->
            <div id="noBookingsState" class="text-center py-5 d-none">
                <i class="bi bi-calendar-x text-muted" style="font-size: 3rem;"></i>
                <h5 class="fw-bold text-dark mt-3">No bookings found</h5>
                <p class="text-muted small">No bookings match your selected filter criteria.</p>
                <button class="btn btn-outline-primary btn-sm rounded-pill px-3" onclick="resetFilters()">Reset
                    Filters</button>
            </div>
        </div>
    </div>
</div>

<!-- CC Approve Booking Modal -->
<div class="modal fade" id="approveBookingModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-0 pb-0">
                <div class="d-flex align-items-center gap-2">
                    <div
                        style="width: 40px; height: 40px; border-radius: 12px; background: #ecfdf5; color: #059669; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold text-dark" id="approveModalLabel">Approve Booking</h5>
                        <p class="text-muted small mb-0">Confirm slot allocation for convention centre</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-4">
                <div class="p-3 bg-light rounded-3 mb-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted small">Booking ID:</span>
                        <span class="fw-bold text-dark" id="modalApproveId">#CC-9041</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted small">Customer Name:</span>
                        <span class="fw-semibold text-dark" id="modalApproveCustomer">Aditya Kumar</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted small">Hall Name:</span>
                        <span class="fw-semibold text-primary" id="modalApproveHall">Grand Ballroom</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-muted small">Event Date:</span>
                        <span class="fw-semibold text-dark" id="modalApproveDate">15 Nov 2026</span>
                    </div>
                </div>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="sendEmailCustomer" checked>
                    <label class="form-check-label small fw-medium" for="sendEmailCustomer">Send instant approval
                        notification & slot pass to customer</label>
                </div>

                <div class="mb-2">
                    <label class="form-label small fw-semibold text-dark">Convention Centre Note (Optional):</label>
                    <textarea class="form-control rounded-3" id="approveNote" rows="2"
                        placeholder="e.g. Stage setup permitted 2 hours prior to slot."></textarea>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success rounded-pill px-4 fw-semibold" id="confirmApproveBtn"
                    onclick="confirmApproveAction()">
                    <i class="bi bi-check-lg me-1"></i> Confirm & Approve Slot
                </button>
            </div>
        </div>
    </div>
</div>

<!-- CC Reject Booking Modal -->
<div class="modal fade" id="rejectBookingModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-0 pb-0">
                <div class="d-flex align-items-center gap-2">
                    <div
                        style="width: 40px; height: 40px; border-radius: 12px; background: #fee2e2; color: #dc2626; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
                        <i class="bi bi-x-circle-fill"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold text-dark" id="rejectModalLabel">Reject Booking Request</h5>
                        <p class="text-muted small mb-0">Decline slot and release hold</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-4">
                <div class="p-3 bg-light rounded-3 mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted small">Booking ID:</span>
                        <span class="fw-bold text-dark" id="modalRejectId">#CC-9041</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-muted small">Customer Name:</span>
                        <span class="fw-semibold text-dark" id="modalRejectCustomer">Aditya Kumar</span>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-semibold text-dark">Reason for Rejection <span
                            class="text-danger">*</span>:</label>
                    <select class="form-select rounded-3 mb-2" id="rejectReasonSelect">
                        <option value="Slot already reserved / double booked">Slot already reserved / double booked
                        </option>
                        <option value="Hall under scheduled maintenance / renovation">Hall under scheduled maintenance /
                            renovation</option>
                        <option value="VIP Government or Protocol Event priority">VIP Government or Protocol Event
                            priority</option>
                        <option value="Guest count exceeds maximum hall capacity">Guest count exceeds maximum hall
                            capacity</option>
                        <option value="Other specific reason">Other specific reason</option>
                    </select>
                    <textarea class="form-control rounded-3" id="rejectReasonDetail" rows="2"
                        placeholder="Provide details to help customer re-book another slot or hall..."></textarea>
                </div>

                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="autoRefundDeposit" checked>
                    <label class="form-check-label small fw-medium" for="autoRefundDeposit">Initiate 100% immediate
                        advance refund to customer</label>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger rounded-pill px-4 fw-semibold" id="confirmRejectBtn"
                    onclick="confirmRejectAction()">
                    <i class="bi bi-x-circle me-1"></i> Confirm Rejection
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Notification Toast -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1080">
    <div id="actionToast" class="toast align-items-center text-white border-0 rounded-4 shadow" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body d-flex align-items-center gap-2" id="toastMessage">
                <i class="bi bi-check-circle-fill fs-5"></i>
                <span>Action executed successfully</span>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
let activeBookingId = null;
let currentStatusFilter = 'all';

// Status Tab Filtering
const filterButtons = document.querySelectorAll('#statusFilterButtons .booking-filter-btn');
filterButtons.forEach(btn => {
    btn.addEventListener('click', function() {
        filterButtons.forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        currentStatusFilter = this.getAttribute('data-filter');
        applyFilters();
    });
});

function filterByStatus(status) {
    filterButtons.forEach(b => {
        if (b.getAttribute('data-filter') === status) {
            b.click();
        }
    });
}

// Search and Hall filters
const searchInput = document.getElementById('searchInput');
const hallFilter = document.getElementById('hallFilter');

if (searchInput) searchInput.addEventListener('input', applyFilters);
if (hallFilter) hallFilter.addEventListener('change', applyFilters);

function applyFilters() {
    const query = searchInput.value.toLowerCase().trim();
    const selectedHall = hallFilter.value;
    const rows = document.querySelectorAll('#bookingsTableBody tr');
    let visibleCount = 0;

    rows.forEach(row => {
        const rowStatus = row.getAttribute('data-status');
        const rowHall = row.getAttribute('data-hall');
        const rowText = row.innerText.toLowerCase();

        const matchStatus = (currentStatusFilter === 'all') || (rowStatus === currentStatusFilter);
        const matchHall = (selectedHall === 'all') || (rowHall === selectedHall);
        const matchSearch = !query || rowText.includes(query);

        if (matchStatus && matchHall && matchSearch) {
            row.style.display = '';
            visibleCount++;
        } else {
            row.style.display = 'none';
        }
    });

    const noState = document.getElementById('noBookingsState');
    const table = document.getElementById('bookingsMainTable');
    if (visibleCount === 0) {
        noState.classList.remove('d-none');
        table.classList.add('d-none');
    } else {
        noState.classList.add('d-none');
        table.classList.remove('d-none');
    }
}

function resetFilters() {
    if (searchInput) searchInput.value = '';
    if (hallFilter) hallFilter.value = 'all';
    filterByStatus('all');
}

// Modal Triggers
function openApproveModal(id, customer, hall, date) {
    activeBookingId = id;
    document.getElementById('modalApproveId').innerText = '#' + id;
    document.getElementById('modalApproveCustomer').innerText = customer;
    document.getElementById('modalApproveHall').innerText = hall;
    document.getElementById('modalApproveDate').innerText = date;
    const modal = new bootstrap.Modal(document.getElementById('approveBookingModal'));
    modal.show();
}

function openRejectModal(id, customer) {
    activeBookingId = id;
    document.getElementById('modalRejectId').innerText = '#' + id;
    document.getElementById('modalRejectCustomer').innerText = customer;
    const modal = new bootstrap.Modal(document.getElementById('rejectBookingModal'));
    modal.show();
}

function confirmApproveAction() {
    if (!activeBookingId) return;
    const row = document.getElementById('row-' + activeBookingId);
    if (row) {
        row.setAttribute('data-status', 'Approved');
        const statusCell = row.querySelector('.status-cell');
        const actionCell = row.querySelector('.action-cell');

        statusCell.innerHTML = `
                <span class="badge-status badge-status-approved">
                    <i class="bi bi-check-circle-fill"></i> Approved by CC
                </span>
            `;

        actionCell.innerHTML = `
                <div class="d-flex align-items-center justify-content-center gap-2">
                    <span class="badge bg-light text-success border fw-semibold px-2 py-1 small">Slot Confirmed</span>
                    <a href="{{ route('center_admin.booking.show') }}?id=${activeBookingId}" class="btn btn-sm btn-primary" title="View details">
                        <i class="bi bi-eye"></i>
                    </a>
                </div>
            `;
    }

    const modalEl = document.getElementById('approveBookingModal');
    const modal = bootstrap.Modal.getInstance(modalEl);
    if (modal) modal.hide();

    showToast('Booking #' + activeBookingId + ' has been APPROVED! Slot locked successfully.', 'bg-success');
}

function confirmRejectAction() {
    if (!activeBookingId) return;
    const row = document.getElementById('row-' + activeBookingId);
    const reason = document.getElementById('rejectReasonSelect').value;

    if (row) {
        row.setAttribute('data-status', 'Rejected');
        const statusCell = row.querySelector('.status-cell');
        const actionCell = row.querySelector('.action-cell');

        statusCell.innerHTML = `
                <span class="badge-status badge-status-rejected">
                    <i class="bi bi-x-circle-fill"></i> Rejected by CC
                </span>
            `;

        actionCell.innerHTML = `
                <div class="d-flex align-items-center justify-content-center gap-2">
                    <span class="badge bg-light text-danger border fw-semibold px-2 py-1 small">Rejected</span>
                    <a href="{{ route('center_admin.booking.show') }}?id=${activeBookingId}" class="btn btn-sm btn-primary" title="View details">
                        <i class="bi bi-eye"></i>
                    </a>
                </div>
            `;
    }

    const modalEl = document.getElementById('rejectBookingModal');
    const modal = bootstrap.Modal.getInstance(modalEl);
    if (modal) modal.hide();

    showToast('Booking #' + activeBookingId + ' was REJECTED. Slot released.', 'bg-danger');
}

function showToast(message, bgClass) {
    const toastEl = document.getElementById('actionToast');
    toastEl.className = `toast align-items-center text-white border-0 rounded-4 shadow ${bgClass}`;
    document.getElementById('toastMessage').innerHTML =
        `<i class="bi bi-info-circle-fill fs-5"></i> <span>${message}</span>`;
    const toast = new bootstrap.Toast(toastEl, {
        delay: 4000
    });
    toast.show();
}
</script>
@endsection