@extends('admin.layout.admin.app')

@section('title') Booking Details - BMS-4821 @endsection

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    .booking-detail-card {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
        margin-bottom: 1.5rem;
        overflow: hidden;
    }
    .booking-detail-header {
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid #f3f4f6;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .booking-detail-body {
        padding: 1.5rem;
    }
    .badge-status {
        display: inline-block;
        padding: 0.35rem 0.95rem;
        border-radius: 9999px;
        font-size: 0.82rem;
        font-weight: 600;
        line-height: 1.2;
    }
    .badge-status-confirmed {
        background-color: #e6f9ed;
        color: #10b981;
    }
    .info-label {
        font-size: 0.8rem;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.25rem;
        font-weight: 600;
    }
    .info-value {
        font-size: 0.98rem;
        color: #111827;
        font-weight: 500;
    }
    .timeline-dot {
        width: 14px;
        height: 14px;
        border-radius: 50%;
        background-color: #7044f2;
        position: relative;
        z-index: 2;
    }
    .timeline-line {
        position: absolute;
        left: 6px;
        top: 14px;
        bottom: 0;
        width: 2px;
        background-color: #e5e7eb;
    }
    .timeline-item {
        position: relative;
        padding-left: 28px;
        padding-bottom: 1.25rem;
    }
    .timeline-item:last-child {
        padding-bottom: 0;
    }
    .timeline-item:last-child .timeline-line {
        display: none;
    }
    .cost-item {
        display: flex;
        justify-content: space-between;
        padding: 0.65rem 0;
        border-bottom: 1px dashed #f3f4f6;
        font-size: 0.92rem;
    }
    .cost-item:last-child {
        border-bottom: none;
    }
    .venue-preview-img {
        width: 100%;
        height: 190px;
        object-fit: cover;
        border-radius: 12px;
    }
</style>
@endsection

@section('content')
<div class="container-fluid py-4">
    <!-- Breadcrumb & Top Bar -->
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <a href="{{ route('admin.bookings.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3 d-inline-flex align-items-center gap-1">
                    <i class="bi bi-arrow-left"></i> Back to Bookings
                </a>
                <span class="text-muted">/</span>
                <span class="text-muted small">Booking Overview</span>
            </div>
            <div class="d-flex align-items-center gap-3 mt-2">
                <h3 class="fw-bold text-dark mb-0">Booking #BMS-4821</h3>
                <span class="badge-status badge-status-confirmed">Confirmed</span>
            </div>
            <p class="text-muted small mb-0 mt-1">Booked on 15 Oct 2026, 04:30 PM &bull; Slot Reference: SLT-2026-9812</p>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <button class="btn btn-outline-secondary rounded-pill px-3 d-inline-flex align-items-center gap-2" onclick="window.print()">
                <i class="bi bi-printer"></i> Print Details
            </button>
            <button class="btn btn-outline-danger rounded-pill px-3 d-inline-flex align-items-center gap-2" onclick="alert('Booking BMS-4821 Rejected'); document.querySelector('.badge-status').className='badge-status badge-status-cancelled'; document.querySelector('.badge-status').innerText='Rejected';">
                <i class="bi bi-x-circle"></i> Reject
            </button>
            <button class="btn btn-success rounded-pill px-3 d-inline-flex align-items-center gap-2" onclick="alert('Booking BMS-4821 Approved'); document.querySelector('.badge-status').className='badge-status badge-status-confirmed'; document.querySelector('.badge-status').innerText='Confirmed';">
                <i class="bi bi-check-circle"></i> Approve
            </button>
            <a href="#" class="btn btn-outline-primary rounded-pill px-3 d-inline-flex align-items-center gap-2">
                <i class="bi bi-download"></i> Invoice PDF
            </a>
            <div class="dropdown">
                <button class="btn btn-primary rounded-pill px-3 d-inline-flex align-items-center gap-2 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #7044f2; border-color: #7044f2;">
                    <i class="bi bi-gear-fill"></i> Manage Status
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                    <li><a class="dropdown-item py-2" href="#"><i class="bi bi-check-circle text-success me-2"></i> Mark as Confirmed</a></li>
                    <li><a class="dropdown-item py-2" href="#"><i class="bi bi-clock-history text-warning me-2"></i> Set as Pending</a></li>
                    <li><a class="dropdown-item py-2" href="#"><i class="bi bi-check2-all text-info me-2"></i> Mark as Completed</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item py-2 text-danger" href="#"><i class="bi bi-x-circle me-2"></i> Cancel Booking</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-lg-3">
            <div class="booking-detail-card p-3 mb-0">
                <span class="info-label">Total Booking Amount</span>
                <h4 class="fw-bold text-dark mb-1">₹5,86,000</h4>
                <span class="badge bg-success-subtle text-success small">Full Paid (100%)</span>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="booking-detail-card p-3 mb-0">
                <span class="info-label">Event Date</span>
                <h4 class="fw-bold text-dark mb-1">12 Dec 2026</h4>
                <span class="text-muted small"><i class="bi bi-clock me-1"></i>08:00 AM – 03:00 PM</span>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="booking-detail-card p-3 mb-0">
                <span class="info-label">Guest Capacity</span>
                <h4 class="fw-bold text-dark mb-1">650 Guests</h4>
                <span class="text-muted small"><i class="bi bi-people me-1"></i>Grand Ballroom</span>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="booking-detail-card p-3 mb-0">
                <span class="info-label">Event Category</span>
                <h4 class="fw-bold text-dark mb-1">Wedding</h4>
                <span class="text-muted small"><i class="bi bi-gem me-1"></i>Reception &amp; Ceremony</span>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Left Column: Customer & Venue Details -->
        <div class="col-lg-8">
            <!-- Venue & Hall Details -->
            <div class="booking-detail-card">
                <div class="booking-detail-header">
                    <h5 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                        <i class="bi bi-buildings text-primary"></i> Venue &amp; Slot Information
                    </h5>
                    <span class="badge bg-light text-secondary">Verified Venue</span>
                </div>
                <div class="booking-detail-body">
                    <div class="row g-3 mb-4">
                        <div class="col-md-5">
                            <img src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&w=700&q=80" alt="Royal Orchid Venue" class="venue-preview-img shadow-sm">
                        </div>
                        <div class="col-md-7 d-flex flex-column justify-content-center">
                            <h5 class="fw-bold text-dark mb-1">Royal Orchid Convention Centre</h5>
                            <p class="text-muted small mb-2">
                                <i class="bi bi-geo-alt-fill text-danger me-1"></i> No. 45/1, Old Airport Road, Indiranagar, Bengaluru, Karnataka 560008
                            </p>
                            <div class="d-flex flex-wrap gap-2 mb-3">
                                <span class="badge bg-light text-dark border"><i class="bi bi-door-open me-1"></i> Hall: Grand Ballroom</span>
                                <span class="badge bg-light text-dark border"><i class="bi bi-tree me-1"></i> Lawn Courtyard</span>
                                <span class="badge bg-light text-dark border"><i class="bi bi-p-square me-1"></i> Valet Available</span>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <div>
                                    <span class="text-muted small d-block">Venue In-Charge</span>
                                    <span class="fw-semibold text-dark small">Rajesh Sharma (+91 98450 88219)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 pt-3 border-top">
                        <div class="col-6 col-md-3">
                            <div class="info-label">City</div>
                            <div class="info-value">Bengaluru</div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="info-label">Slot Timing</div>
                            <div class="info-value">Morning (7 Hrs)</div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="info-label">Catering Type</div>
                            <div class="info-value">Vegetarian Buffet</div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="info-label">Security Deposit</div>
                            <div class="info-value text-success">₹25,000 (Refundable)</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Customer & Contact Info -->
            <div class="booking-detail-card">
                <div class="booking-detail-header">
                    <h5 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                        <i class="bi bi-person-badge text-primary"></i> Customer Details
                    </h5>
                    <button class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                        <i class="bi bi-envelope me-1"></i> Send Email
                    </button>
                </div>
                <div class="booking-detail-body">
                    <div class="row g-4">
                        <div class="col-sm-6 col-md-4">
                            <div class="info-label">Full Name</div>
                            <div class="info-value fw-bold text-dark">Priya Nair</div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="info-label">Primary Mobile</div>
                            <div class="info-value">+91 98765 43210</div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="info-label">Email Address</div>
                            <div class="info-value">priya.nair@example.com</div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="info-label">Alternate Contact</div>
                            <div class="info-value">Suresh Nair (+91 98765 12345)</div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="info-label">Identity Verification</div>
                            <div class="info-value text-success"><i class="bi bi-shield-check me-1"></i> Aadhaar Verified</div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="info-label">City / State</div>
                            <div class="info-value">Bengaluru, Karnataka</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Special Requests & Requirements -->
            <div class="booking-detail-card">
                <div class="booking-detail-header">
                    <h5 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                        <i class="bi bi-card-checklist text-primary"></i> Special Instructions &amp; Amenities
                    </h5>
                </div>
                <div class="booking-detail-body">
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex align-items-start gap-2 mb-2">
                            <i class="bi bi-check-circle-fill text-success mt-1"></i>
                            <div>
                                <strong class="text-dark">Early Vendor Setup:</strong> Decorators need early access from 06:00 AM for stage flower decoration.
                            </div>
                        </li>
                        <li class="d-flex align-items-start gap-2 mb-2">
                            <i class="bi bi-check-circle-fill text-success mt-1"></i>
                            <div>
                                <strong class="text-dark">Valet Parking:</strong> Reserved parking spot for 120 cars near the north gate.
                            </div>
                        </li>
                        <li class="d-flex align-items-start gap-2">
                            <i class="bi bi-check-circle-fill text-success mt-1"></i>
                            <div>
                                <strong class="text-dark">Bridal Suite:</strong> Two air-conditioned green rooms requested next to the ballroom.
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Right Column: Cost Breakdown & Timeline -->
        <div class="col-lg-4">
            <!-- Payment & Price Breakdown -->
            <div class="booking-detail-card">
                <div class="booking-detail-header">
                    <h5 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                        <i class="bi bi-receipt-cutoff text-primary"></i> Payment Summary
                    </h5>
                    <span class="badge bg-success-subtle text-success">Paid</span>
                </div>
                <div class="booking-detail-body">
                    <div class="cost-item">
                        <span class="text-muted">Grand Ballroom Slot Rental</span>
                        <span class="fw-semibold text-dark">₹4,20,000</span>
                    </div>
                    <div class="cost-item">
                        <span class="text-muted">Dining Lawn &amp; Buffet Access</span>
                        <span class="fw-semibold text-dark">₹55,000</span>
                    </div>
                    <div class="cost-item">
                        <span class="text-muted">A/V &amp; Stage Lighting</span>
                        <span class="fw-semibold text-dark">₹35,000</span>
                    </div>
                    <div class="cost-item">
                        <span class="text-muted">GST &amp; Govt Charges (18%)</span>
                        <span class="fw-semibold text-dark">₹76,000</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center py-3 border-top mt-2">
                        <span class="fw-bold text-dark fs-6">Grand Total</span>
                        <span class="fw-bold text-primary fs-5">₹5,86,000</span>
                    </div>

                    <!-- Payment Transactions -->
                    <div class="mt-3 p-3 bg-light rounded-3">
                        <span class="fw-semibold text-dark small d-block mb-2">Transaction History:</span>
                        <div class="small text-muted mb-2 pb-2 border-bottom">
                            <div class="d-flex justify-content-between">
                                <span class="fw-medium text-dark">Advance Paid (UPI)</span>
                                <span class="text-success fw-bold">₹3,00,000</span>
                            </div>
                            <span>Ref: RZP_TXN_9841289 &bull; 15 Oct 2026</span>
                        </div>
                        <div class="small text-muted">
                            <div class="d-flex justify-content-between">
                                <span class="fw-medium text-dark">Final Balance (NEFT)</span>
                                <span class="text-success fw-bold">₹2,86,000</span>
                            </div>
                            <span>Ref: HDFC_N0981726 &bull; 02 Nov 2026</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking Lifecycle Stepper -->
            <div class="booking-detail-card">
                <div class="booking-detail-header">
                    <h5 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                        <i class="bi bi-clock-history text-primary"></i> Booking Timeline
                    </h5>
                </div>
                <div class="booking-detail-body">
                    <div class="timeline-item">
                        <div class="timeline-line"></div>
                        <div class="timeline-dot"></div>
                        <h6 class="fw-bold text-dark mb-0 small">Booking Created</h6>
                        <span class="text-muted small">15 Oct 2026, 04:30 PM &bull; Online Reservation</span>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-line"></div>
                        <div class="timeline-dot"></div>
                        <h6 class="fw-bold text-dark mb-0 small">Advance Payment Received</h6>
                        <span class="text-muted small">15 Oct 2026, 04:35 PM &bull; ₹3,00,000 verified</span>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-line"></div>
                        <div class="timeline-dot"></div>
                        <h6 class="fw-bold text-dark mb-0 small">Venue Admin Approved</h6>
                        <span class="text-muted small">16 Oct 2026, 11:15 AM &bull; Slot Locked</span>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-line"></div>
                        <div class="timeline-dot"></div>
                        <h6 class="fw-bold text-dark mb-0 small">Full Settlement Done</h6>
                        <span class="text-muted small">02 Nov 2026, 02:40 PM &bull; ₹2,86,000 cleared</span>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-dot bg-success"></div>
                        <h6 class="fw-bold text-success mb-0 small">Event Scheduled</h6>
                        <span class="text-muted small">12 Dec 2026 &bull; Ready for execution</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
