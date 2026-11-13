@extends('admin.layout.centers.app')

@section('title') Booking Details #CC-9041 - Convention Centre Portal @endsection

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    .detail-card {
        border-radius: 16px;
        border: 1px solid rgba(0, 0, 0, 0.08) !important;
        background: #ffffff !important;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
    }
    .badge-status {
        display: inline-flex !important;
        align-items: center !important;
        gap: 0.35rem !important;
        padding: 0.45rem 1rem !important;
        border-radius: 9999px !important;
        font-weight: 700 !important;
        font-size: 0.85rem !important;
    }
    .badge-status-approved {
        background-color: #ecfdf5 !important;
        color: #047857 !important;
        border: 1px solid #a7f3d0 !important;
    }
    .badge-status-pending {
        background-color: #fffbeb !important;
        color: #b45309 !important;
        border: 1px solid #fde68a !important;
    }
    .badge-status-rejected {
        background-color: #fff1f2 !important;
        color: #be123c !important;
        border: 1px solid #fecdd3 !important;
    }

    .badge-hall-ballroom {
        background-color: #e0e7ff !important;
        color: #3730a3 !important;
        border: 1px solid #c7d2fe !important;
        font-weight: 700 !important;
        font-size: 0.85rem !important;
        padding: 6px 14px !important;
        border-radius: 9999px !important;
        display: inline-block !important;
    }

    .badge-verified {
        background-color: #ecfdf5 !important;
        color: #047857 !important;
        border: 1px solid #a7f3d0 !important;
        font-weight: 600 !important;
        font-size: 0.75rem !important;
        padding: 3px 8px !important;
        border-radius: 6px !important;
    }

    .timeline-item {
        position: relative;
        padding-left: 28px;
        padding-bottom: 20px;
    }
    .timeline-item:last-child {
        padding-bottom: 0;
    }
    .timeline-item::before {
        content: '';
        position: absolute;
        left: 8px;
        top: 8px;
        bottom: -8px;
        width: 2px;
        background: #e2e8f0;
    }
    .timeline-item:last-child::before {
        display: none;
    }
    .timeline-dot {
        position: absolute;
        left: 0;
        top: 2px;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: #fff;
        border: 3px solid #2563eb;
    }
    .timeline-dot.done {
        border-color: #10b981;
        background: #10b981;
    }
    .timeline-dot.active {
        border-color: #f59e0b;
        background: #fff;
    }

    .feature-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        color: #334155;
        font-size: 0.8rem;
        padding: 6px 12px;
        border-radius: 8px;
        font-weight: 600;
    }

    .btn-action-reject-lg {
        background-color: #fee2e2 !important;
        border: 1px solid #f87171 !important;
        color: #dc2626 !important;
        font-weight: 700 !important;
    }
    .btn-action-reject-lg:hover {
        background-color: #ef4444 !important;
        color: #ffffff !important;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Breadcrumb & Top Bar -->
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 style="color: #1e2f65;font-family: sans-serif;">Bookings details</h3>
            </div>
            <div
                class="col-12 col-md-6 text-md-end mt-2 mt-md-0 d-flex align-items-center justify-content-md-end gap-2">
                <ol class="breadcrumb justify-content-md-end mb-0 bg-transparent p-0 me-3 d-none d-lg-flex">
                    <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Bookings details</li>
                </ol>

            </div>
        </div>
    </div>

  

    <div class="row g-4">
        <!-- Main Details (Left Column) -->
        <div class="col-lg-8">
            <!-- Hall & Slot Details Card -->
            <div class="card detail-card p-4 mb-4">
                <div class="d-flex align-items-center justify-content-between pb-3 border-bottom mb-3">
                    <h5 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                        <i class="bi bi-buildings text-primary"></i> Hall & Slot Specifications
                    </h5>
                    <span class="badge-hall-ballroom">Grand Ballroom</span>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-sm-6 col-md-3">
                        <span class="text-muted small d-block">Event Date</span>
                        <strong class="text-dark fs-6">15 Nov 2026</strong>
                        <span class="small text-muted d-block">(Sunday)</span>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <span class="text-muted small d-block">Slot Timings</span>
                        <strong class="text-dark fs-6">Evening Slot</strong>
                        <span class="small text-muted d-block">06:00 PM - 11:30 PM</span>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <span class="text-muted small d-block">Event Type</span>
                        <strong class="text-dark fs-6">Wedding Reception</strong>
                        <span class="small text-muted d-block">Family Function</span>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <span class="text-muted small d-block">Expected Guests</span>
                        <strong class="text-dark fs-6">850 People</strong>
                        <span class="small text-muted d-block">Max Hall: 1,200</span>
                    </div>
                </div>

                <div class="mb-3">
                    <span class="text-muted small d-block mb-2 fw-semibold">Amenities & Services Included in Request:</span>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="feature-chip"><i class="bi bi-snow text-info"></i> Central Air Conditioning</span>
                        <span class="feature-chip"><i class="bi bi-speaker text-primary"></i> JBL Linear Sound System</span>
                        <span class="feature-chip"><i class="bi bi-lamp text-warning"></i> Ambient Dynamic Stage Lighting</span>
                        <span class="feature-chip"><i class="bi bi-door-closed text-secondary"></i> 2 Bride/Groom Green Rooms</span>
                        <span class="feature-chip"><i class="bi bi-p-square text-success"></i> Valet Parking (250 Cars)</span>
                        <span class="feature-chip"><i class="bi bi-cup-hot text-danger"></i> Dedicated Catering Kitchen</span>
                        <span class="feature-chip"><i class="bi bi-lightning-charge text-warning"></i> 100% DG Generator Backup</span>
                    </div>
                </div>

                <div class="p-3 bg-light rounded-3 mt-3">
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <i class="bi bi-chat-left-quote text-primary"></i>
                        <span class="fw-semibold text-dark small">Client Special Instructions:</span>
                    </div>
                    <p class="small text-muted mb-0">
                        "Requires 4 extra high-power 16A plug points near stage for live orchestra; valet staff must be deployed starting at 5:30 PM sharp."
                    </p>
                </div>
            </div>

            <!-- Customer & Billing Details Card -->
            <div class="card detail-card p-4 mb-4">
                <h5 class="fw-bold text-dark mb-3 d-flex align-items-center gap-2">
                    <i class="bi bi-person-badge text-success"></i> Customer Details
                </h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center gap-3">
                            <div style="width: 50px; height: 50px; border-radius: 50%; background: #2563eb; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; font-weight: bold;">
                                AK
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-0">Aditya Kumar</h6>
                                <span class="badge-verified mt-1 d-inline-block">Aadhaar Verified</span>
                                <div class="text-muted small mt-1">Customer ID: #USR-98124</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="small text-muted mb-1"><i class="bi bi-telephone-fill me-2 text-primary"></i>+91 98765 43210</div>
                        <div class="small text-muted mb-1"><i class="bi bi-envelope-fill me-2 text-primary"></i>aditya.kumar@example.com</div>
                        <div class="small text-muted"><i class="bi bi-geo-alt-fill me-2 text-primary"></i>#42, 12th Main, HAL 2nd Stage, Indiranagar, Bengaluru - 560038</div>
                    </div>
                </div>
            </div>

            <!-- Payment Breakdown Card -->
            <div class="card detail-card p-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                        <i class="bi bi-receipt-cutoff text-warning"></i> Payment Breakdown & Tariffs
                    </h5>
                    <a href="{{ route('center_admin.payments.view') }}?id=TXN-9041" class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-semibold">
                        <i class="bi bi-box-arrow-up-right me-1"></i> View Payment Record
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-sm align-middle mb-0">
                        <thead class="table-light small">
                            <tr>
                                <th>Item Description</th>
                                <th class="text-center">Rate</th>
                                <th class="text-end">Amount (INR)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="fw-medium text-dark">Grand Ballroom Hall Rental</div>
                                    <div class="small text-muted">Evening slot 06:00 PM - 11:30 PM</div>
                                </td>
                                <td class="text-center">1 Slot</td>
                                <td class="text-end fw-semibold">Rs. 3,50,000</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="fw-medium text-dark">JBL Acoustic Audio & Stage Lighting Package</div>
                                    <div class="small text-muted">Standard convention package</div>
                                </td>
                                <td class="text-center">Fixed</td>
                                <td class="text-end fw-semibold">Rs. 40,000</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="fw-medium text-dark">Refundable Security Deposit</div>
                                    <div class="small text-muted">Refunded after event completion & damage inspection</div>
                                </td>
                                <td class="text-center">Deposit</td>
                                <td class="text-end fw-semibold">Rs. 50,000</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="fw-medium text-dark">Taxes (CGST 9% + SGST 9%)</div>
                                    <div class="small text-muted">Applicable on taxable services</div>
                                </td>
                                <td class="text-center">18%</td>
                                <td class="text-end fw-semibold">Rs. 70,200</td>
                            </tr>
                            <tr class="table-light">
                                <td colspan="2" class="fw-bold text-dark fs-6">Grand Total Amount</td>
                                <td class="text-end fw-bold text-primary fs-5">Rs. 5,10,200</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row g-3 mt-3 pt-3 border-top">
                    <div class="col-md-6">
                        <div class="p-3 rounded-3" style="background-color: #ecfdf5; border: 1px solid #a7f3d0;">
                            <span class="small fw-bold text-uppercase" style="color: #047857;">Advance Paid by Client</span>
                            <h4 class="fw-bold mb-0 mt-1" style="color: #065f46;">Rs. 1,50,000</h4>
                            <span class="small text-muted">Paid via Razorpay UPI &bull; Auth Ref: RZP-94812</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 border">
                            <span class="text-muted small fw-bold text-uppercase">Remaining Balance to CC</span>
                            <h4 class="fw-bold text-dark mb-0 mt-1">Rs. 3,60,200</h4>
                            <span class="small text-muted">Payable before 10 Nov 2026 (5 days prior to event)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Timeline & Actions (Right Column) -->
        <div class="col-lg-4">
            <!-- Quick Decision Box -->
            <div class="card detail-card p-4 mb-4 border-2 border-primary">
                <h6 class="fw-bold text-dark mb-2">Convention Centre Action</h6>
                <p class="small text-muted mb-3">Review the booking details and choose your decision for this slot.</p>
                <div class="d-grid gap-2" id="sidebarActionButtons">
                    <button class="btn btn-success rounded-pill py-2 fw-semibold d-flex align-items-center justify-content-center gap-2" onclick="openApproveModal()">
                        <i class="bi bi-check-circle-fill"></i> Approve & Lock Slot
                    </button>
                    <button class="btn btn-action-reject-lg rounded-pill py-2 fw-semibold d-flex align-items-center justify-content-center gap-2" onclick="openRejectModal()">
                        <i class="bi bi-x-circle-fill"></i> Reject with Reason
                    </button>
                </div>
            </div>

            <!-- Booking Timeline -->
            <div class="card detail-card p-4 mb-4">
                <h6 class="fw-bold text-dark mb-3">Booking History & Timeline</h6>
                <div class="timeline mt-2">
                    <div class="timeline-item">
                        <div class="timeline-dot done"></div>
                        <strong class="text-dark small d-block">Booking Request Created</strong>
                        <span class="text-muted small">Today at 10:20 AM by Client</span>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-dot done"></div>
                        <strong class="text-dark small d-block">Advance Payment Received</strong>
                        <span class="text-muted small">Rs. 1,50,000 held in Escrow</span>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-dot active" id="timelineDotCurrent"></div>
                        <strong class="text-dark small d-block" id="timelineTitleCurrent">Awaiting CC Approval</strong>
                        <span class="text-muted small" id="timelineDescCurrent">Convention Centre must accept slot</span>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-dot" style="border-color: #cbd5e1;"></div>
                        <strong class="text-muted small d-block">Event Execution</strong>
                        <span class="text-muted small">15 Nov 2026 (Pending confirmation)</span>
                    </div>
                </div>
            </div>

            <!-- Convention Centre Contact info -->
            <div class="card detail-card p-4">
                <h6 class="fw-bold text-dark mb-2">Centre Guidelines</h6>
                <ul class="list-unstyled small text-muted mb-0">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Approved slots are immediately reflected on the master calendar.</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-danger me-2"></i>Rejecting releases the slot immediately and initiates refund.</li>
                    <li><i class="bi bi-shield-check text-primary me-2"></i>Protected by BookMySlot Vendor Guarantee.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Approve Booking -->
<div class="modal fade" id="approveModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-0 pb-0">
                <div class="d-flex align-items-center gap-2">
                    <div style="width: 40px; height: 40px; border-radius: 12px; background: #ecfdf5; color: #059669; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold text-dark">Confirm Booking Approval</h5>
                        <p class="text-muted small mb-0">Booking #CC-9041 &bull; Grand Ballroom</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body py-4">
                <p class="text-secondary small mb-3">
                    By approving, you lock the <strong>Grand Ballroom</strong> on <strong>15 Nov 2026 (Evening Slot)</strong> exclusively for this customer.
                </p>
                <div class="mb-3">
                    <label class="form-label small fw-semibold text-dark">Manager Gate Pass Instructions (Optional):</label>
                    <textarea class="form-control rounded-3" rows="2" placeholder="e.g. Please present confirmation SMS at Gate 2. Decorators allowed from 3 PM."></textarea>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success rounded-pill px-4 fw-semibold" onclick="executeApprove()">
                    <i class="bi bi-check-lg me-1"></i> Yes, Approve & Lock Slot
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Reject Booking -->
<div class="modal fade" id="rejectModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-0 pb-0">
                <div class="d-flex align-items-center gap-2">
                    <div style="width: 40px; height: 40px; border-radius: 12px; background: #fee2e2; color: #dc2626; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
                        <i class="bi bi-x-circle-fill"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold text-dark">Reject Booking #CC-9041</h5>
                        <p class="text-muted small mb-0">Decline and release hold</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body py-4">
                <div class="mb-3">
                    <label class="form-label small fw-semibold text-dark">Rejection Reason <span class="text-danger">*</span>:</label>
                    <select class="form-select rounded-3 mb-2" id="rejectReasonField">
                        <option value="Slot already reserved offline">Slot already reserved offline</option>
                        <option value="Hall under maintenance or renovation">Hall under maintenance or renovation</option>
                        <option value="VIP security protocol required">VIP security protocol required</option>
                        <option value="Guest count exceeds maximum safe capacity">Guest count exceeds maximum safe capacity</option>
                        <option value="Other">Other</option>
                    </select>
                    <textarea class="form-control rounded-3" rows="2" placeholder="Explain reason to the customer..."></textarea>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-action-reject-lg rounded-pill px-4 fw-semibold" onclick="executeReject()">
                    <i class="bi bi-x-circle me-1"></i> Reject & Refund Client
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function openApproveModal() {
        const modal = new bootstrap.Modal(document.getElementById('approveModal'));
        modal.show();
    }

    function openRejectModal() {
        const modal = new bootstrap.Modal(document.getElementById('rejectModal'));
        modal.show();
    }

    function executeApprove() {
        const modalEl = document.getElementById('approveModal');
        const modal = bootstrap.Modal.getInstance(modalEl);
        if (modal) modal.hide();

        // Update badge
        const badge = document.getElementById('bookingStatusBadge');
        badge.className = 'badge-status badge-status-approved';
        badge.innerHTML = '<i class="bi bi-check-circle-fill"></i> Approved by CC';

        // Update banner
        const banner = document.getElementById('statusNoticeBanner');
        banner.className = 'alert alert-success border-0 shadow-sm rounded-4 p-3 mb-4 d-flex align-items-center justify-content-between';
        banner.style = 'background-color: #ecfdf5; border: 1px solid #a7f3d0 !important;';
        banner.innerHTML = `
            <div class="d-flex align-items-center gap-3">
                <i class="bi bi-check-circle-fill text-success fs-3"></i>
                <div>
                    <strong class="text-dark">Booking Approved & Confirmed</strong>
                    <p class="small text-muted mb-0">The slot is officially locked on your calendar. Customer has been notified.</p>
                </div>
            </div>
            <span class="badge bg-success px-3 py-2 rounded-pill">Slot Locked</span>
        `;

        // Update top action buttons
        document.getElementById('actionButtonContainer').innerHTML = `
            <button type="button" class="btn btn-outline-secondary rounded-pill px-3 py-2 d-inline-flex align-items-center gap-2" onclick="window.print()">
                <i class="bi bi-printer"></i> Print Invoice
            </button>
            <span class="badge px-4 py-2 rounded-pill fw-semibold d-inline-flex align-items-center gap-2" style="background-color: #ecfdf5; color: #047857; border: 1px solid #a7f3d0;">
                <i class="bi bi-check2-circle fs-5"></i> Approved
            </span>
        `;

        // Update sidebar
        document.getElementById('sidebarActionButtons').innerHTML = `
            <div class="p-3 rounded-3 text-center" style="background-color: #ecfdf5; border: 1px solid #a7f3d0;">
                <i class="bi bi-check-circle-fill text-success fs-4 d-block mb-1"></i>
                <strong class="small d-block" style="color: #047857;">Slot Successfully Approved</strong>
                <span class="text-muted small">No further action needed</span>
            </div>
        `;

        // Update timeline
        const dot = document.getElementById('timelineDotCurrent');
        dot.className = 'timeline-dot done';
        document.getElementById('timelineTitleCurrent').innerText = 'Approved by Convention Centre';
        document.getElementById('timelineDescCurrent').innerText = 'Slot confirmed & client notified';
    }

    function executeReject() {
        const modalEl = document.getElementById('rejectModal');
        const modal = bootstrap.Modal.getInstance(modalEl);
        if (modal) modal.hide();

        const reason = document.getElementById('rejectReasonField').value;

        // Update badge
        const badge = document.getElementById('bookingStatusBadge');
        badge.className = 'badge-status badge-status-rejected';
        badge.innerHTML = '<i class="bi bi-x-circle-fill"></i> Rejected by CC';

        // Update banner
        const banner = document.getElementById('statusNoticeBanner');
        banner.className = 'alert alert-danger border-0 shadow-sm rounded-4 p-3 mb-4 d-flex align-items-center justify-content-between';
        banner.style = 'background-color: #fff1f2; border: 1px solid #fecdd3 !important;';
        banner.innerHTML = `
            <div class="d-flex align-items-center gap-3">
                <i class="bi bi-x-circle-fill text-danger fs-3"></i>
                <div>
                    <strong class="text-dark">Booking Rejected</strong>
                    <p class="small text-muted mb-0">Reason: ${reason}. Slot released and advance refund initiated.</p>
                </div>
            </div>
            <span class="badge bg-danger px-3 py-2 rounded-pill">Slot Released</span>
        `;

        // Update top action buttons
        document.getElementById('actionButtonContainer').innerHTML = `
            <span class="badge px-4 py-2 rounded-pill fw-semibold d-inline-flex align-items-center gap-2" style="background-color: #fff1f2; color: #be123c; border: 1px solid #fecdd3;">
                <i class="bi bi-x-octagon fs-5"></i> Rejected
            </span>
        `;

        // Update sidebar
        document.getElementById('sidebarActionButtons').innerHTML = `
            <div class="p-3 rounded-3 text-center" style="background-color: #fff1f2; border: 1px solid #fecdd3;">
                <i class="bi bi-x-circle-fill text-danger fs-4 d-block mb-1"></i>
                <strong class="small d-block" style="color: #be123c;">Slot Hold Released</strong>
                <span class="text-muted small">Customer refunded</span>
            </div>
        `;

        const dot = document.getElementById('timelineDotCurrent');
        dot.style.borderColor = '#ef4444';
        dot.style.backgroundColor = '#ef4444';
        document.getElementById('timelineTitleCurrent').innerText = 'Booking Rejected';
        document.getElementById('timelineDescCurrent').innerText = reason;
    }
</script>
@endsection
