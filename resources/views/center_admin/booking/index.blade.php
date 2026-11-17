
@extends('admin.layout.centers.app')

@section('title')
    Convention Centre Bookings
@endsection

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
/* KPI CARDS */
.kpi-card {
    border-radius: 14px;
    border: 1px solid rgba(0,0,0,.08) !important;
    background: #fff !important;
    transition: all .2s ease;
}
.kpi-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 24px rgba(0,0,0,.06);
}
.kpi-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.35rem;
    flex-shrink: 0;
}
.badge-kpi-primary,.badge-kpi-warning,.badge-kpi-success,.badge-kpi-danger {
    display: inline-block;
    font-weight: 700;
    font-size: .75rem;
    padding: 4px 8px;
    border-radius: 6px;
}
.badge-kpi-primary {background:#eff6ff;color:#1d4ed8;border:1px solid #bfdbfe;}
.badge-kpi-warning {background:#fef3c7;color:#92400e;border:1px solid #fde68a;}
.badge-kpi-success {background:#ecfdf5;color:#065f46;border:1px solid #a7f3d0;}
.badge-kpi-danger {background:#fee2e2;color:#991b1b;border:1px solid #fecaca;}

/* FILTER BUTTONS */
.booking-filter-btn {
    border-radius: 9999px;
    padding: .45rem 1.25rem;
    font-weight: 600;
    font-size: .85rem;
    border: 1px solid #e2e8f0;
    color: #475569;
    background: #f8fafc;
    cursor: pointer;
    transition: all .2s ease;
}
.booking-filter-btn:hover {
    background: #e2e8f0;
    color: #0f172a;
}
.booking-filter-btn.active {
    background: #2563eb !important;
    border-color: #2563eb !important;
    color: #fff !important;
    box-shadow: 0 4px 12px rgba(37,99,235,.28);
}

/* HALL BADGES */
.badge-hall-ballroom,.badge-hall-lawn,.badge-hall-mini {
    display: inline-block;
    font-weight: 700;
    font-size: .76rem;
    padding: 3px 10px;
    border-radius: 6px;
}
.badge-hall-ballroom {background:#e0e7ff;color:#3730a3;border:1px solid #c7d2fe;}
.badge-hall-lawn {background:#dcfce7;color:#166534;border:1px solid #bbf7d0;}
.badge-hall-mini {background:#fef3c7;color:#854d0e;border:1px solid #fde68a;}

/* SLOT BADGES */
.slot-pill,.slot-pill-blocked {
    display:inline-block;
    font-weight:600;
    font-size:.74rem;
    padding:3px 8px;
    border-radius:6px;
}
.slot-pill {background:#f1f5f9;color:#334155;border:1px solid #e2e8f0;}
.slot-pill-blocked {background:#fff1f2;color:#be123c;border:1px solid #fecdd3;}

/* PAYMENT BADGES */
.badge-pay-adv,.badge-pay-settled,.badge-pay-refund {
    display:inline-block;
    font-weight:600;
    font-size:.74rem;
    padding:3px 8px;
    border-radius:6px;
}
.badge-pay-adv {background:#ecfdf5;color:#047857;border:1px solid #a7f3d0;}
.badge-pay-settled {background:#eff6ff;color:#1d4ed8;border:1px solid #bfdbfe;}
.badge-pay-refund {background:#fff1f2;color:#be123c;border:1px solid #fecdd3;}

/* STATUS BADGES */
.badge-status {
    display:inline-flex;
    align-items:center;
    gap:.35rem;
    padding:.4rem .95rem;
    border-radius:9999px;
    font-weight:700;
    font-size:.78rem;
    letter-spacing:.2px;
}
.badge-status-pending {background:#fffbeb;color:#b45309;border:1px solid #fde68a;}
.badge-status-approved {background:#ecfdf5;color:#047857;border:1px solid #a7f3d0;}
.badge-status-rejected {background:#fff1f2;color:#be123c;border:1px solid #fecdd3;}
.badge-status-completed {background:#f0f9ff;color:#0369a1;border:1px solid #bae6fd;}

/* ACTION BUTTONS */
.btn-action-approve,.btn-action-reject {
    display:inline-flex;
    align-items:center;
    gap:4px;
    font-weight:700;
    font-size:.82rem;
    padding:.38rem .95rem;
    border-radius:9999px;
    cursor:pointer;
    transition:all .15s ease;
}
.btn-action-approve {
    background:#10b981;
    border:1px solid #059669;
    color:#fff;
    box-shadow:0 2px 4px rgba(16,185,129,.2);
}
.btn-action-approve:hover {background:#059669;color:#fff;transform:translateY(-1px);}
.btn-action-reject {
    background:#fee2e2;
    border:1px solid #f87171;
    color:#dc2626;
}
.btn-action-reject:hover {background:#ef4444;border-color:#dc2626;color:#fff;transform:translateY(-1px);}

.btn.btn-sm.btn-primary {
    background:#f8fafc !important;
    border:1px solid #cbd5e1 !important;
    color:#475569 !important;
    width:32px;
    height:32px;
    border-radius:50%;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    font-size:.85rem;
}
.btn.btn-sm.btn-primary:hover {background:#e2e8f0 !important;color:#0f172a !important;}

.btn-receipt {
    background:#f8fafc;
    border:1px solid #cbd5e1;
    color:#334155;
    font-weight:600;
    font-size:.8rem;
    padding:.35rem .85rem;
    border-radius:9999px;
    display:inline-flex;
    align-items:center;
    gap:4px;
}
.btn-receipt:hover {background:#e2e8f0;color:#0f172a;}

/* TABLE */
.table-bookings {
    border-collapse:separate !important;
    border-spacing:0 !important;
    width:100% !important;
}
.table-bookings thead th {
    background:#f8fafc !important;
    color:#64748b !important;
    font-weight:700 !important;
    font-size:.74rem !important;
    letter-spacing:.5px !important;
    padding:12px 14px !important;
    border-bottom:2px solid #e2e8f0 !important;
    white-space:nowrap !important;
}
.table-bookings tbody td {
    padding:14px !important;
    vertical-align:middle !important;
    border-bottom:1px solid #f1f5f9 !important;
    background:#fff !important;
}
.table-bookings tbody tr:hover td {background:#f8fafc !important;}

.booking-id-link {
    font-weight:700;
    color:#2563eb;
    text-decoration:none;
}
.booking-id-link:hover {text-decoration:underline;}

.customer-avatar {
    width:38px;
    height:38px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:700;
    font-size:.85rem;
    flex-shrink:0;
}

/* HALL DROPDOWN */
.hall-filter-select {
    min-width:190px;
    border:1px solid #cbd5e1;
    border-radius:9px;
    padding:9px 35px 9px 12px;
    font-size:.88rem;
    font-weight:600;
    color:#334155;
    background-color:#fff;
}
.hall-filter-select:focus {
    border-color:#2563eb;
    box-shadow:0 0 0 3px rgba(37,99,235,.12);
}

/* RESPONSIVE */
@media(max-width:767px) {
    .booking-filter-btn {
        padding:.4rem .85rem;
        font-size:.78rem;
    }
    .hall-filter-select {width:100%;min-width:100%;}
    .booking-filter-wrapper {width:100%;}
}
</style>
@endsection

@section('content')
<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 style="color:#1e2f65;font-family:sans-serif;">Bookings</h3>
            </div>
            <div class="col-12 col-md-6 text-md-end mt-2 mt-md-0 d-flex align-items-center justify-content-md-end gap-2">
                <ol class="breadcrumb justify-content-md-end mb-0 bg-transparent p-0 me-3 d-none d-lg-flex">
                    <li class="breadcrumb-item">
                        <a href="/admin/dashboard"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Bookings</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- KPI CARDS -->
    <div class="row g-3 mb-4">

        <div class="col-xl-3 col-md-6">
            <div class="card kpi-card shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3 p-3">
                    <div class="kpi-icon" style="background:rgba(37,99,235,.1);color:#2563eb;">
                        <i class="bi bi-bookmark-star-fill"></i>
                    </div>
                    <div>
                        <span class="text-secondary small fw-bold text-uppercase" style="font-size:.72rem;letter-spacing:.5px;">Total Bookings</span>
                        <h3 class="fw-bold mb-0 text-dark" id="totalBookings">48</h3>
                        <span class="badge-kpi-primary mt-1" id="totalBookingsInfo">+6 this month</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card kpi-card shadow-sm h-100 border-warning border-start border-4">
                <div class="card-body d-flex align-items-center gap-3 p-3">
                    <div class="kpi-icon" style="background:rgba(245,158,11,.15);color:#d97706;">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <div>
                        <span class="text-secondary small fw-bold text-uppercase" style="font-size:.72rem;letter-spacing:.5px;">Pending CC Approval</span>
                        <h3 class="fw-bold mb-0 text-warning" id="pendingBookings">3</h3>
                        <span class="badge-kpi-warning mt-1" id="pendingBookingsInfo">Needs Attention</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card kpi-card shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3 p-3">
                    <div class="kpi-icon" style="background:rgba(16,185,129,.12);color:#059669;">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <div>
                        <span class="text-secondary small fw-bold text-uppercase" style="font-size:.72rem;letter-spacing:.5px;">Approved & Locked</span>
                        <h3 class="fw-bold mb-0 text-success" id="approvedBookings">38</h3>
                        <span class="badge-kpi-success mt-1" id="approvedBookingsInfo">94% Confirmation Rate</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card kpi-card shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3 p-3">
                    <div class="kpi-icon" style="background:rgba(239,68,68,.12);color:#dc2626;">
                        <i class="bi bi-x-circle-fill"></i>
                    </div>
                    <div>
                        <span class="text-secondary small fw-bold text-uppercase" style="font-size:.72rem;letter-spacing:.5px;">Rejected / Cancelled</span>
                        <h3 class="fw-bold mb-0 text-danger" id="rejectedBookings">7</h3>
                        <span class="badge-kpi-danger mt-1" id="rejectedBookingsInfo">Slots Released</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- BOOKINGS TABLE CARD -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-4">

            <!-- FILTER BAR -->
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">

                <!-- STATUS FILTERS -->
                <div class="d-flex flex-wrap gap-2" id="statusFilterButtons">
                    <button type="button" class="booking-filter-btn active" data-filter="all">
                        All Bookings
                    </button>

                    <button type="button" class="booking-filter-btn" data-filter="Pending">
                        Pending CC Approval
                        <span class="badge bg-warning text-dark ms-1" style="background:#fef08a!important;color:#854d0e!important;font-weight:700;">3</span>
                    </button>

                    <button type="button" class="booking-filter-btn" data-filter="Approved">
                        Approved
                    </button>

                    <button type="button" class="booking-filter-btn" data-filter="Completed">
                        Completed
                    </button>

                    <button type="button" class="booking-filter-btn" data-filter="Rejected">
                        Rejected
                    </button>
                </div>

                <!-- HALL DROPDOWN ONLY -->
                <div class="booking-filter-wrapper">
                    <select id="hallFilter" class="form-select hall-filter-select">
                        <option value="all" selected>All Halls</option>
                        <option value="Grand Ballroom">Grand Ballroom</option>
                        <option value="Garden Lawn">Garden Lawn</option>
                        <option value="Mini Hall">Mini Hall</option>
                    </select>
                </div>

            </div>

            <!-- BOOKINGS TABLE -->
            <div class="table-responsive" id="bookingsTableWrapper">
                <table class="table-bookings" id="bookingsMainTable">
                    <thead>
                        <tr>
                            <th>BOOKING ID</th>
                            <th>CUSTOMER DETAILS</th>
                            <th>HALL & EVENT</th>
                            <th>EVENT DATE & SLOT</th>
                            <th>TOTAL AMOUNT</th>
                            <th>CC STATUS</th>
                            <th class="text-center" style="min-width:180px;">ACTION</th>
                        </tr>
                    </thead>

                    <tbody id="bookingsTableBody">

                        <!-- BOOKING 1: GRAND BALLROOM / PENDING -->
                        <tr id="row-CC-9041" data-status="Pending" data-hall="Grand Ballroom">
                            <td>
                                <a href="#" class="booking-id-link">#CC-9041</a>
                                <div class="text-muted small">Booked Today, 10:20 AM</div>
                            </td>

                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="customer-avatar text-white" style="background:#2563eb;">AK</div>
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
                                    <button type="button" class="btn-action-approve"
                                        onclick="openApproveModal('CC-9041','Aditya Kumar','Grand Ballroom','15 Nov 2026')">
                                        <i class="bi bi-check-lg"></i> Approve
                                    </button>

                                    <button type="button" class="btn-action-reject"
                                        onclick="openRejectModal('CC-9041','Aditya Kumar')">
                                        <i class="bi bi-x-lg"></i> Reject
                                    </button>

                                    <a href="{{ route('center_admin.booking.show') }}?id=CC-9041"
                                        class="btn btn-sm btn-primary" title="View details">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <!-- BOOKING 2: GRAND BALLROOM / APPROVED -->
                        <tr id="row-CC-9035" data-status="Approved" data-hall="Grand Ballroom">
                            <td>
                                <a href="#" class="booking-id-link">#CC-9035</a>
                                <div class="text-muted small">08 Nov 2026</div>
                            </td>

                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="customer-avatar text-white" style="background:#f59e0b;">VP</div>
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
                                    <span class="badge bg-light text-success border fw-semibold px-2 py-1 small">
                                        Slot Confirmed
                                    </span>

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

            <!-- EMPTY STATE -->
            <div id="noBookingsState" class="text-center py-5 d-none">
                <i class="bi bi-calendar-x text-muted" style="font-size:3rem;"></i>
                <h5 class="fw-bold text-dark mt-3">No bookings found</h5>
                <p class="text-muted small">No bookings match your selected hall and status.</p>
                <button type="button" class="btn btn-outline-primary btn-sm rounded-pill px-3"
                    onclick="resetFilters()">
                    Reset Filters
                </button>
            </div>

        </div>
    </div>
</div>

<!-- APPROVE BOOKING MODAL -->
<div class="modal fade" id="approveBookingModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">

            <div class="modal-header border-0 pb-0">
                <div class="d-flex align-items-center gap-2">
                    <div style="width:40px;height:40px;border-radius:12px;background:#ecfdf5;color:#059669;display:flex;align-items:center;justify-content:center;font-size:1.25rem;">
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
                    <label class="form-check-label small fw-medium" for="sendEmailCustomer">
                        Send instant approval notification & slot pass to customer
                    </label>
                </div>

                <div class="mb-2">
                    <label class="form-label small fw-semibold text-dark">Convention Centre Note (Optional):</label>
                    <textarea class="form-control rounded-3" id="approveNote" rows="2"
                        placeholder="e.g. Stage setup permitted 2 hours prior to slot."></textarea>
                </div>
            </div>

            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success rounded-pill px-4 fw-semibold"
                    id="confirmApproveBtn" onclick="confirmApproveAction()">
                    <i class="bi bi-check-lg me-1"></i> Confirm & Approve Slot
                </button>
            </div>

        </div>
    </div>
</div>

<!-- REJECT BOOKING MODAL -->
<div class="modal fade" id="rejectBookingModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">

            <div class="modal-header border-0 pb-0">
                <div class="d-flex align-items-center gap-2">
                    <div style="width:40px;height:40px;border-radius:12px;background:#fee2e2;color:#dc2626;display:flex;align-items:center;justify-content:center;font-size:1.25rem;">
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
                    <label class="form-label small fw-semibold text-dark">
                        Reason for Rejection <span class="text-danger">*</span>:
                    </label>

                    <select class="form-select rounded-3 mb-2" id="rejectReasonSelect">
                        <option value="Slot already reserved / double booked">Slot already reserved / double booked</option>
                        <option value="Hall under scheduled maintenance / renovation">Hall under scheduled maintenance / renovation</option>
                        <option value="VIP Government or Protocol Event priority">VIP Government or Protocol Event priority</option>
                        <option value="Guest count exceeds maximum hall capacity">Guest count exceeds maximum hall capacity</option>
                        <option value="Other specific reason">Other specific reason</option>
                    </select>

                    <textarea class="form-control rounded-3" id="rejectReasonDetail" rows="2"
                        placeholder="Provide details to help customer re-book another slot or hall..."></textarea>
                </div>

                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="autoRefundDeposit" checked>
                    <label class="form-check-label small fw-medium" for="autoRefundDeposit">
                        Initiate 100% immediate advance refund to customer
                    </label>
                </div>
            </div>

            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger rounded-pill px-4 fw-semibold"
                    id="confirmRejectBtn" onclick="confirmRejectAction()">
                    <i class="bi bi-x-circle me-1"></i> Confirm Rejection
                </button>
            </div>

        </div>
    </div>
</div>

<!-- TOAST -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index:1080">
    <div id="actionToast" class="toast align-items-center text-white border-0 rounded-4 shadow"
        role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body d-flex align-items-center gap-2" id="toastMessage">
                <i class="bi bi-check-circle-fill fs-5"></i>
                <span>Action executed successfully</span>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto"
                data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
let activeBookingId = null;
let currentStatusFilter = 'all';

/*
|--------------------------------------------------------------------------
| FRONTEND DEMONSTRATION KPI DATA
|--------------------------------------------------------------------------
| Replace these demo figures with actual database counts when connecting
| this page to your booking data.
*/
const hallKpiData = {
    all: {
        total: 48,
        pending: 3,
        approved: 38,
        rejected: 7,
        totalInfo: '+6 this month',
        pendingInfo: 'Needs Attention',
        approvedInfo: '94% Confirmation Rate',
        rejectedInfo: 'Slots Released'
    },

    'Grand Ballroom': {
        total: 26,
        pending: 2,
        approved: 20,
        rejected: 4,
        totalInfo: 'Grand Ballroom bookings',
        pendingInfo: 'Needs Attention',
        approvedInfo: '77% Approved',
        rejectedInfo: 'Slots Released'
    },

    'Garden Lawn': {
        total: 14,
        pending: 1,
        approved: 12,
        rejected: 1,
        totalInfo: 'Garden Lawn bookings',
        pendingInfo: 'Needs Attention',
        approvedInfo: '86% Approved',
        rejectedInfo: 'Slots Released'
    },

    'Mini Hall': {
        total: 8,
        pending: 0,
        approved: 6,
        rejected: 2,
        totalInfo: 'Mini Hall bookings',
        pendingInfo: 'No Pending Requests',
        approvedInfo: '75% Approved',
        rejectedInfo: 'Slots Released'
    }
};

/* UPDATE KPI CARDS BASED ON SELECTED HALL */
function updateKpiCards() {
    const selectedHall = document.getElementById('hallFilter').value;
    const data = hallKpiData[selectedHall] || hallKpiData.all;

    document.getElementById('totalBookings').textContent = data.total;
    document.getElementById('pendingBookings').textContent = data.pending;
    document.getElementById('approvedBookings').textContent = data.approved;
    document.getElementById('rejectedBookings').textContent = data.rejected;

    document.getElementById('totalBookingsInfo').textContent = data.totalInfo;
    document.getElementById('pendingBookingsInfo').textContent = data.pendingInfo;
    document.getElementById('approvedBookingsInfo').textContent = data.approvedInfo;
    document.getElementById('rejectedBookingsInfo').textContent = data.rejectedInfo;
}

/* STATUS FILTER BUTTONS */
const filterButtons = document.querySelectorAll('#statusFilterButtons .booking-filter-btn');

filterButtons.forEach(btn => {
    btn.addEventListener('click', function() {
        filterButtons.forEach(button => button.classList.remove('active'));

        this.classList.add('active');
        currentStatusFilter = this.getAttribute('data-filter');

        applyFilters();
    });
});

/* HALL DROPDOWN */
const hallFilter = document.getElementById('hallFilter');

hallFilter.addEventListener('change', function() {
    updateKpiCards();
    applyFilters();
});

/* APPLY BOTH STATUS AND HALL FILTERS */
function applyFilters() {
    const selectedHall = hallFilter.value;
    const rows = document.querySelectorAll('#bookingsTableBody tr');

    let visibleCount = 0;

    rows.forEach(row => {
        const rowStatus = row.getAttribute('data-status');
        const rowHall = row.getAttribute('data-hall');

        const matchStatus =
            currentStatusFilter === 'all' ||
            rowStatus === currentStatusFilter;

        const matchHall =
            selectedHall === 'all' ||
            rowHall === selectedHall;

        if (matchStatus && matchHall) {
            row.style.display = '';
            visibleCount++;
        } else {
            row.style.display = 'none';
        }
    });

    const noState = document.getElementById('noBookingsState');
    const tableWrapper = document.getElementById('bookingsTableWrapper');

    if (visibleCount === 0) {
        noState.classList.remove('d-none');
        tableWrapper.classList.add('d-none');
    } else {
        noState.classList.add('d-none');
        tableWrapper.classList.remove('d-none');
    }
}

/* RESET FILTERS */
function resetFilters() {
    hallFilter.value = 'all';
    currentStatusFilter = 'all';

    filterButtons.forEach(btn => {
        btn.classList.toggle(
            'active',
            btn.getAttribute('data-filter') === 'all'
        );
    });

    updateKpiCards();
    applyFilters();
}

/* STATUS TAB HELPER */
function filterByStatus(status) {
    filterButtons.forEach(btn => {
        if (btn.getAttribute('data-filter') === status) {
            btn.click();
        }
    });
}

/* OPEN APPROVE MODAL */
function openApproveModal(id, customer, hall, date) {
    activeBookingId = id;

    document.getElementById('modalApproveId').innerText = '#' + id;
    document.getElementById('modalApproveCustomer').innerText = customer;
    document.getElementById('modalApproveHall').innerText = hall;
    document.getElementById('modalApproveDate').innerText = date;

    const modal = new bootstrap.Modal(
        document.getElementById('approveBookingModal')
    );

    modal.show();
}

/* OPEN REJECT MODAL */
function openRejectModal(id, customer) {
    activeBookingId = id;

    document.getElementById('modalRejectId').innerText = '#' + id;
    document.getElementById('modalRejectCustomer').innerText = customer;

    const modal = new bootstrap.Modal(
        document.getElementById('rejectBookingModal')
    );

    modal.show();
}

/* CONFIRM APPROVAL - FRONTEND DEMO ONLY */
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
                <span class="badge bg-light text-success border fw-semibold px-2 py-1 small">
                    Slot Confirmed
                </span>
                <a href="{{ route('center_admin.booking.show') }}?id=${activeBookingId}"
                    class="btn btn-sm btn-primary" title="View details">
                    <i class="bi bi-eye"></i>
                </a>
            </div>
        `;

        updateDemoCountsAfterAction();
    }

    const modalEl = document.getElementById('approveBookingModal');
    const modal = bootstrap.Modal.getInstance(modalEl);

    if (modal) modal.hide();

    showToast(
        'Booking #' + activeBookingId + ' has been APPROVED! Slot locked successfully.',
        'bg-success'
    );

    applyFilters();
}

/* CONFIRM REJECTION - FRONTEND DEMO ONLY */
function confirmRejectAction() {
    if (!activeBookingId) return;

    const row = document.getElementById('row-' + activeBookingId);
    const reason = document.getElementById('rejectReasonSelect').value;
    const extraReason = document.getElementById('rejectReasonDetail').value;

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
                <span class="badge bg-light text-danger border fw-semibold px-2 py-1 small">
                    Rejected
                </span>
                <a href="{{ route('center_admin.booking.show') }}?id=${activeBookingId}"
                    class="btn btn-sm btn-primary" title="View details">
                    <i class="bi bi-eye"></i>
                </a>
            </div>
        `;

        updateDemoCountsAfterAction();
    }

    const modalEl = document.getElementById('rejectBookingModal');
    const modal = bootstrap.Modal.getInstance(modalEl);

    if (modal) modal.hide();

    showToast(
        'Booking #' + activeBookingId + ' was REJECTED. Slot released.',
        'bg-danger'
    );

    applyFilters();
}

/* UPDATE DEMO KPI COUNTS AFTER APPROVE / REJECT */
function updateDemoCountsAfterAction() {
    const selectedHall = hallFilter.value;
    const data = hallKpiData[selectedHall] || hallKpiData.all;

    /*
     * The KPI figures above are demonstration values.
     * This updates the selected hall's displayed figures for this session.
     */
    const row = document.getElementById('row-' + activeBookingId);

    if (!row) return;

    const newStatus = row.getAttribute('data-status');
    const oldStatus = row.dataset.previousStatus || 'Pending';

    if (oldStatus === newStatus) return;

    if (oldStatus === 'Pending') data.pending = Math.max(0, data.pending - 1);
    if (oldStatus === 'Approved') data.approved = Math.max(0, data.approved - 1);
    if (oldStatus === 'Rejected') data.rejected = Math.max(0, data.rejected - 1);

    if (newStatus === 'Approved') data.approved++;
    if (newStatus === 'Rejected') data.rejected++;

    row.dataset.previousStatus = newStatus;

    updateKpiCards();
}

/* TOAST MESSAGE */
function showToast(message, bgClass) {
    const toastEl = document.getElementById('actionToast');

    toastEl.className =
        `toast align-items-center text-white border-0 rounded-4 shadow ${bgClass}`;

    document.getElementById('toastMessage').innerHTML = `
        <i class="bi bi-info-circle-fill fs-5"></i>
        <span>${message}</span>
    `;

    const toast = new bootstrap.Toast(toastEl, {
        delay: 4000
    });

    toast.show();
}

/* INITIAL LOAD */
document.addEventListener('DOMContentLoaded', function() {
    updateKpiCards();
    applyFilters();
});
</script>
@endsection
