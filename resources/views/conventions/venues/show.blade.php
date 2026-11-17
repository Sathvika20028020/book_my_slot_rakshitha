
@extends('admin.layout.centers.app')

@section('title')
    Sri Krishna Grand Convention Centre &amp; Kalyana Mantapa – Convention Centre Master
@endsection

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">

<style>
    .show-hero-card {
        background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%);
        border-radius: 16px;
        color: #fff;
        padding: 2rem;
        position: relative;
        overflow: hidden;
        border: 0;
    }

    .show-hero-card::after {
        content: '';
        position: absolute;
        right: -40px;
        bottom: -40px;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(245,158,11,.15) 0%, transparent 70%);
        border-radius: 50%;
    }

    .metric-pill-card {
        border-radius: 12px;
        border: 1px solid rgba(0,0,0,.06);
        background: #fff;
        padding: 1rem;
        transition: transform .2s ease;
    }

    .metric-pill-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(0,0,0,.04);
    }

    #showMap {
        height: 280px;
        width: 100%;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        z-index: 1;
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

    .badge-soft-danger {
        background-color: #fee2e2;
        color: #991b1b;
        border: 1px solid #fecaca;
    }

    .gallery-img-thumb {
        height: 180px;
        width: 100%;
        object-fit: cover;
        border-radius: 10px;
        transition: transform .25s ease;
        cursor: pointer;
    }

    .gallery-img-thumb:hover {
        transform: scale(1.02);
    }

    .nav-tabs .nav-link {
        font-weight: 600;
        color: #64748b;
        padding: .85rem 1.25rem;
        border: 0;
        border-bottom: 2px solid transparent;
    }

    .nav-tabs .nav-link.active {
        color: #4338ca;
        border-bottom: 2px solid #4338ca;
        background: transparent;
    }

    .video-wrapper {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
        border-radius: 12px;
    }

    .video-wrapper iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 0;
    }

    .hall-filter-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 18px 20px;
        margin-bottom: 20px;
    }

    .hall-filter-card label {
        font-size: 13px;
        font-weight: 700;
        color: #475569;
        margin-bottom: 8px;
    }

    .hall-filter-card select {
        min-height: 45px;
        font-weight: 600;
        border-color: #cbd5e1;
    }

    .hall-info-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #eef2ff;
        color: #3730a3;
        border-radius: 20px;
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 700;
    }

    @media(max-width:767px) {
        .show-hero-card {
            padding: 1.25rem;
        }

        .card-body.p-4 {
            padding: 1rem !important;
        }

        .nav-tabs {
            flex-wrap: nowrap;
            overflow-x: auto;
            white-space: nowrap;
        }

        .nav-tabs .nav-link {
            padding: .75rem .9rem;
            font-size: 13px;
        }
    }
</style>
@endsection

@section('content')

<div class="container-fluid">

    <!-- BREADCRUMB -->
    <div class="page-title py-3">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <h4 class="fw-bold mb-1 text-dark">
                    Conventional Centre Master
                </h4>
            </div>

            <div class="col-12 col-md-6 text-md-end mt-2 mt-md-0">
                <ol class="breadcrumb justify-content-md-end mb-0 bg-transparent p-0">
                    <li class="breadcrumb-item">
                        <a href="/admin/dashboard">
                            <i class="fa fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/admin/convention-centres">Centre Masters</a>
                    </li>
                    <li class="breadcrumb-item active">Details</li>
                </ol>
            </div>
        </div>
    </div>

</div>

<div class="container-fluid">

    <!-- HERO SUMMARY -->
    <div class="card show-hero-card mb-4 shadow">
        <div class="row align-items-center">

            <div class="col-12 col-lg-8">
                <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">

                    <span class="badge bg-warning text-dark font-monospace fw-bold px-2 py-1 fs-6">
                        <i class="bi bi-fingerprint me-1"></i>CC-2026-001
                    </span>

                    <span class="badge bg-white bg-opacity-25 text-dark px-2 py-1">
                        <i class="bi bi-tag-fill me-1"></i>Kalyana Mantapa / Marriage Hall
                    </span>

                    <span class="badge bg-success text-white px-2 py-1">
                        <i class="bi bi-check-circle-fill me-1"></i>Active &amp; Bookable
                    </span>

                </div>

                <h3 class="fw-bold text-white mb-2">
                    Sri Krishna Grand Convention Centre &amp; Kalyana Mantapa
                </h3>

                <p class="text-white-50 mb-3" style="font-size:.92rem;">
                    <i class="bi bi-geo-alt-fill text-danger me-1"></i>
                    #45/2, 14th Main Road, 4th Sector, HSR Layout &bull;
                    Ward 174 - HSR Layout, South Zone &bull; PIN: 560102
                </p>

                <div class="d-flex align-items-center gap-3 text-white-50 small flex-wrap">
                    <span>
                        <i class="bi bi-shield-check text-success me-1"></i>
                        BBMP (Bruhat Bengaluru Mahanagara Palike)
                    </span>
                    <span>&bull;</span>
                    <span>
                        <i class="bi bi-calendar-check me-1"></i>
                        Created: 15 Jan 2026
                    </span>
                </div>
            </div>

            <div class="col-12 col-lg-4 text-lg-end mt-3 mt-lg-0">
                <div class="bg-white bg-opacity-10 p-3 rounded-3 d-inline-block text-start border border-white border-opacity-10">
                    <span class="text-dark small d-block mb-1">
                        Selected Hall Daily Booking Fee
                    </span>

                    <h2 class="fw-bold text-warning mb-0" id="heroHallFee">
                        ₹75,000
                    </h2>

                    <small class="text-dark">
                        <span id="heroHallDeposit">₹25,000</span>
                        Refundable Deposit | GST
                        <span id="heroHallGST">18%</span>
                    </small>
                </div>
            </div>

        </div>
    </div>

    <!-- NEW: HALL FILTER -->
    <div class="hall-filter-card shadow-sm">
        <div class="row align-items-center g-3">

            <div class="col-12 col-md-5">
                <h6 class="fw-bold text-dark mb-1">
                    <i class="bi bi-buildings text-primary me-2"></i>
                    Hall Details Filter
                </h6>

                <small class="text-muted">
                    Select a hall to view its facilities, photos and charges.
                </small>
            </div>

            <div class="col-12 col-md-7">
                <label for="hallSelector">
                    Select Convention Centre Hall
                </label>

                <select id="hallSelector" class="form-select">
                    <option value="main">Main Kalyana Mantapa Hall</option>
                    <option value="dining">Traditional Dining Hall</option>
                    <option value="mini">Mini AC Reception Hall</option>
                    <option value="bridal">Bridal Suites &amp; Groom Lounge</option>
                </select>
            </div>

            <div class="col-12">
                <span class="hall-info-badge">
                    <i class="bi bi-door-open"></i>
                    <span id="selectedHallName">Main Kalyana Mantapa Hall</span>
                </span>

                <span class="hall-info-badge ms-1">
                    <i class="bi bi-people"></i>
                    Capacity:
                    <span id="selectedHallCapacity">1,500 Pax</span>
                </span>

                <span class="hall-info-badge ms-1">
                    <i class="bi bi-rulers"></i>
                    <span id="selectedHallArea">14,000 sq.ft</span>
                </span>
            </div>

        </div>
    </div>

    <!-- NAVIGATION TABS -->
    <div class="card shadow-sm border-0 mb-4">

        <div class="card-header bg-white border-bottom p-0">
            <ul class="nav nav-tabs border-0" id="centreMasterTabs" role="tablist">

                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="overview-tab"
                        data-bs-toggle="tab" data-bs-target="#overview"
                        type="button" role="tab">
                        <i class="bi bi-geo-alt me-1"></i>
                        Location &amp; In-Charge
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="facilities-tab"
                        data-bs-toggle="tab" data-bs-target="#facilities"
                        type="button" role="tab">
                        <i class="bi bi-door-open me-1"></i>
                        Facilities (<span id="facilityCount">4</span>)
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="media-tab"
                        data-bs-toggle="tab" data-bs-target="#media"
                        type="button" role="tab">
                        <i class="bi bi-images me-1"></i>
                        Photos &amp; Video Walkthrough
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="charges-tab"
                        data-bs-toggle="tab" data-bs-target="#charges"
                        type="button" role="tab">
                        <i class="bi bi-currency-rupee me-1"></i>
                        Tariff &amp; GST Breakdown
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="rules-tab"
                        data-bs-toggle="tab" data-bs-target="#rules"
                        type="button" role="tab">
                        <i class="bi bi-journal-text me-1"></i>
                        Booking Rules &amp; Cancellation
                    </button>
                </li>

            </ul>
        </div>

        <div class="card-body p-4">

            <div class="tab-content" id="centreMasterTabsContent">

                <!-- TAB 1: LOCATION & IN-CHARGE (UNCHANGED) -->
                <div class="tab-pane fade show active" id="overview" role="tabpanel">

                    <div class="row g-4">

                        <div class="col-12 col-lg-7">

                            <h6 class="fw-bold text-dark mb-3">
                                <i class="bi bi-pin-map-fill text-danger me-2"></i>
                                Civic Venue Location Details
                            </h6>

                            <table class="table table-bordered mb-4">
                                <tbody>

                                    <tr>
                                        <th class="bg-light text-muted w-25 small">Address</th>
                                        <td class="fw-medium text-dark">
                                            #45/2, 14th Main Road, 4th Sector, HSR Layout
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="bg-light text-muted small">Corporation / District</th>
                                        <td class="fw-medium text-dark">
                                            BBMP (Bruhat Bengaluru Mahanagara Palike)
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="bg-light text-muted small">Zone</th>
                                        <td>
                                            <span class="badge badge-soft-primary">South Zone</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="bg-light text-muted small">Ward</th>
                                        <td class="fw-medium text-dark">
                                            Ward 174 - HSR Layout
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="bg-light text-muted small">PIN Code</th>
                                        <td class="font-monospace fw-bold text-dark">560102</td>
                                    </tr>

                                    <tr>
                                        <th class="bg-light text-muted small">Geo Coordinates</th>
                                        <td>
                                            <span class="font-monospace text-secondary me-2">
                                                Lat: 12.9121, Long: 77.6446
                                            </span>

                                            <a href="https://www.google.com/maps?q=12.9121,77.6446"
                                                target="_blank"
                                                class="btn btn-xs btn-outline-primary py-0 px-2 small">
                                                <i class="bi bi-box-arrow-up-right me-1"></i>
                                                Google Maps
                                            </a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>

                            <h6 class="fw-bold text-dark mb-3">
                                <i class="bi bi-person-badge-fill text-primary me-2"></i>
                                Centre In-Charge Details
                            </h6>

                            <div class="p-3 rounded-3 border bg-light d-flex align-items-center gap-3">

                                <div class="p-3 rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                    style="width:52px;height:52px;font-size:1.5rem;">
                                    <i class="bi bi-person-fill"></i>
                                </div>

                                <div class="flex-grow-1">
                                    <h6 class="fw-bold text-dark mb-1">Rajeshwar Hegde</h6>

                                    <div class="text-muted small mb-1">
                                        <i class="bi bi-telephone-fill text-success me-1"></i>
                                        <a href="tel:+919845012345"
                                            class="text-decoration-none text-dark fw-medium">
                                            +91 98450 12345
                                        </a>
                                    </div>

                                    <div class="text-muted small">
                                        <i class="bi bi-envelope-fill text-primary me-1"></i>
                                        <a href="mailto:rajesh.hegde@bbmp.gov.in"
                                            class="text-decoration-none text-muted">
                                            rajesh.hegde@bbmp.gov.in
                                        </a>
                                    </div>
                                </div>

                                <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2">
                                    <i class="bi bi-check-circle me-1"></i>
                                    Verified Officer
                                </span>

                            </div>

                        </div>

                        <div class="col-12 col-lg-5">

                            <h6 class="fw-bold text-dark mb-3">
                                <i class="bi bi-map-fill text-primary me-2"></i>
                                Geo-Location Pin
                            </h6>

                            <div id="showMap" class="shadow-xs mb-2"></div>

                            <small class="text-muted d-block text-center">
                                <i class="bi bi-info-circle me-1"></i>
                                Coordinates pinned at Latitude 12.9121, Longitude 77.6446
                            </small>

                        </div>

                    </div>
                </div>

                <!-- TAB 2: DYNAMIC HALL FACILITIES -->
                <div class="tab-pane fade" id="facilities" role="tabpanel">

                    <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                        <div>
                            <h6 class="fw-bold text-dark mb-0">
                                Hall Facility Details
                            </h6>
                            <small class="text-muted">
                                Facilities belonging to the selected hall
                            </small>
                        </div>

                        <a href="/admin/convention-centres/edit"
                            class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-plus-lg me-1"></i>
                            Add / Edit Facilities
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">

                            <thead class="table-light text-uppercase small text-muted">
                                <tr>
                                    <th style="width:50px;">#</th>
                                    <th>Facility Name</th>
                                    <th>Facility Type</th>
                                    <th class="text-center">Seating Capacity</th>
                                    <th>Area / Size</th>
                                    <th class="text-center">Availability Status</th>
                                </tr>
                            </thead>

                            <tbody id="hallFacilitiesBody"></tbody>

                        </table>
                    </div>

                </div>

                <!-- TAB 3: DYNAMIC MEDIA -->
                <div class="tab-pane fade" id="media" role="tabpanel">

                    <h6 class="fw-bold text-dark mb-3">
                        <i class="bi bi-images text-primary me-2"></i>
                        Photographic Gallery
                    </h6>

                    <div class="row g-3 mb-4" id="hallGallery"></div>

                    <h6 class="fw-bold text-dark mb-3">
                        <i class="bi bi-play-circle-fill text-danger me-2"></i>
                        Video Walkthrough / Virtual Tour
                    </h6>

                    <div class="card border bg-light p-3">
                        <div class="video-wrapper shadow-sm">
                            <iframe id="hallVideo"
                                src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                                title="Walkthrough Video"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </div>

                        <div class="mt-2 text-muted small d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <span>
                                <i class="bi bi-link-45deg me-1"></i>
                                Source URL:
                                <a id="hallVideoLink"
                                    href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                                    target="_blank"
                                    class="text-decoration-none">
                                    Video link
                                </a>
                            </span>

                            <span class="badge bg-light text-dark border">
                                <span id="hallVideoType">360° Walkthrough</span>
                            </span>
                        </div>
                    </div>

                </div>

                <!-- TAB 4: DYNAMIC CHARGES -->
                <div class="tab-pane fade" id="charges" role="tabpanel">

                    <div class="row g-4">

                        <div class="col-12 col-md-7">

                            <h6 class="fw-bold text-dark mb-3">
                                <i class="bi bi-receipt text-success me-2"></i>
                                Official Fee Schedule
                            </h6>

                            <table class="table table-bordered align-middle">
                                <tbody>

                                    <tr>
                                        <th class="bg-light text-muted w-50">
                                            Base Booking Fee (Per day / slot)
                                        </th>
                                        <td class="fw-bold text-dark fs-6" id="baseFee"></td>
                                    </tr>

                                    <tr>
                                        <th class="bg-light text-muted">
                                            Additional Charges (Power, Cleaning, AC)
                                        </th>
                                        <td class="fw-bold text-dark" id="additionalFee"></td>
                                    </tr>

                                    <tr class="table-light">
                                        <th class="text-dark fw-bold">Taxable Sub-Total</th>
                                        <td class="text-dark fw-bold" id="subTotal"></td>
                                    </tr>

                                    <tr>
                                        <th class="bg-light text-muted">Applicable GST Rate</th>
                                        <td>
                                            <span class="badge bg-primary" id="gstRate"></span>
                                            <small class="text-muted ms-2">(CGST + SGST)</small>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="bg-light text-muted">GST Tax Amount</th>
                                        <td class="fw-bold text-danger" id="gstAmount"></td>
                                    </tr>

                                    <tr class="table-primary">
                                        <th class="text-primary fw-bold">Total Rental Payable</th>
                                        <td class="text-primary fw-bold fs-6" id="totalRental"></td>
                                    </tr>

                                    <tr>
                                        <th class="bg-light text-muted">Refundable Security Deposit</th>
                                        <td class="fw-bold text-secondary">
                                            <span id="securityDeposit"></span>
                                            <span class="badge bg-light text-muted border small">Refundable</span>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>

                        </div>

                        <div class="col-12 col-md-5">

                            <div class="card border-0 bg-light p-4 rounded-3 text-center">
                                <span class="text-muted small text-uppercase fw-semibold d-block mb-1">
                                    Total Initial Deposit Required
                                </span>

                                <h2 class="fw-bold text-success mb-2" id="initialDeposit"></h2>

                                <p class="text-muted small mb-0">
                                    Includes full rental charges, GST, and refundable caution deposit released post-event.
                                </p>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- TAB 5: BOOKING RULES (UNCHANGED) -->
                <div class="tab-pane fade" id="rules" role="tabpanel">

                    <div class="row g-4">

                        <div class="col-12 col-md-6">
                            <div class="card border p-3 rounded-3 h-100">

                                <h6 class="fw-bold text-dark mb-2">
                                    <i class="bi bi-clock-history text-primary me-2"></i>
                                    Booking Reservation Window
                                </h6>

                                <ul class="list-unstyled mb-0 d-flex flex-column gap-2 small">

                                    <li class="d-flex align-items-center justify-content-between p-2 rounded bg-light">
                                        <span class="text-muted">Minimum Advance Notice:</span>
                                        <span class="fw-bold text-dark">15 Days prior to event</span>
                                    </li>

                                    <li class="d-flex align-items-center justify-content-between p-2 rounded bg-light">
                                        <span class="text-muted">Maximum Allowed Duration:</span>
                                        <span class="fw-bold text-dark">3 Days</span>
                                    </li>

                                    <li class="d-flex align-items-center justify-content-between p-2 rounded bg-light">
                                        <span class="text-muted">Slot Allotment Basis:</span>
                                        <span class="fw-bold text-dark">First-Come, First-Served</span>
                                    </li>

                                </ul>

                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="card border p-3 rounded-3 h-100">

                                <h6 class="fw-bold text-dark mb-2">
                                    <i class="bi bi-shield-x text-danger me-2"></i>
                                    Cancellation &amp; Refund Policy
                                </h6>

                                <div class="p-3 bg-light rounded text-dark small mb-3" style="line-height:1.6;">
                                    100% refund prior to 30 days of event; 50% refund between 15-30 days; non-refundable within 15 days of event date.
                                </div>

                                <div class="alert alert-warning py-2 mb-0 small">
                                    <i class="bi bi-exclamation-circle-fill me-1"></i>
                                    Security deposits are processed for full refund within 7 working days following civic site clearance.
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection

@section('script')

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    /*
    |--------------------------------------------------------------------------
    | FRONTEND DEMO HALL DATA
    |--------------------------------------------------------------------------
    | These are sample values for demonstrating the hall filter.
    | Replace these values with database data when backend integration is done.
    */

    const hallData = {

        main: {
            name: "Main Kalyana Mantapa Hall",
            capacity: "1,500 Pax",
            area: "14,000 sq.ft",

            baseFee: 75000,
            additionalFee: 12500,
            gst: 18,
            deposit: 25000,

            facilities: [
                {
                    name: "Main Kalyana Mantapa Hall",
                    type: "Main Auditorium / Hall",
                    capacity: "1,500 Pax",
                    area: "14,000 sq.ft"
                },
                {
                    name: "Stage & Event Area",
                    type: "Event Facility",
                    capacity: "150 Pax",
                    area: "2,000 sq.ft"
                },
                {
                    name: "Guest Seating Area",
                    type: "Seating Facility",
                    capacity: "1,500 Pax",
                    area: "Included in main hall"
                },
                {
                    name: "Air Conditioning",
                    type: "Hall Facility",
                    capacity: "1,500 Pax",
                    area: "Full Hall"
                }
            ],

            images: [
                "https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&w=800&q=80",
                "https://images.unsplash.com/photo-1545232979-fbf68fe9b1af?auto=format&fit=crop&w=800&q=80",
                "https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?auto=format&fit=crop&w=800&q=80"
            ],

            video: "https://www.youtube.com/embed/dQw4w9WgXcQ",
            videoLink: "https://www.youtube.com/watch?v=dQw4w9WgXcQ",
            videoType: "360° Walkthrough"
        },

        dining: {
            name: "Traditional Dining Hall",
            capacity: "600 Pax",
            area: "7,500 sq.ft",

            baseFee: 35000,
            additionalFee: 7500,
            gst: 18,
            deposit: 15000,

            facilities: [
                {
                    name: "Traditional Dining Hall",
                    type: "Dining Area",
                    capacity: "600 Pax",
                    area: "7,500 sq.ft"
                },
                {
                    name: "Dining Tables & Chairs",
                    type: "Dining Facility",
                    capacity: "600 Pax",
                    area: "Main Dining Area"
                },
                {
                    name: "Kitchen & Serving Area",
                    type: "Kitchen Facility",
                    capacity: "Staff Use",
                    area: "Included"
                },
                {
                    name: "Hand Wash Area",
                    type: "Utility Facility",
                    capacity: "Multiple Users",
                    area: "Attached"
                }
            ],

            images: [
                "https://images.unsplash.com/photo-1414235077428-338989a2e8c0?auto=format&fit=crop&w=800&q=80",
                "https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=800&q=80",
                "https://images.unsplash.com/photo-1515003197210-e0cd7184f8b5?auto=format&fit=crop&w=800&q=80"
            ],

            video: "https://www.youtube.com/embed/dQw4w9WgXcQ",
            videoLink: "https://www.youtube.com/watch?v=dQw4w9WgXcQ",
            videoType: "Dining Hall Walkthrough"
        },

        mini: {
            name: "Mini AC Reception Hall",
            capacity: "300 Pax",
            area: "3,200 sq.ft",

            baseFee: 25000,
            additionalFee: 5000,
            gst: 18,
            deposit: 10000,

            facilities: [
                {
                    name: "Mini AC Reception Hall",
                    type: "Banquet / Function Hall",
                    capacity: "300 Pax",
                    area: "3,200 sq.ft"
                },
                {
                    name: "Reception Stage",
                    type: "Event Facility",
                    capacity: "50 Pax",
                    area: "500 sq.ft"
                },
                {
                    name: "Air Conditioning",
                    type: "Hall Facility",
                    capacity: "300 Pax",
                    area: "Full Hall"
                },
                {
                    name: "Guest Seating Area",
                    type: "Seating Facility",
                    capacity: "300 Pax",
                    area: "Included in main hall"
                }
            ],

            images: [
                "https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&w=800&q=80",
                "https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=800&q=80",
                "https://images.unsplash.com/photo-1511795409834-ef04bbd61622?auto=format&fit=crop&w=800&q=80"
            ],

            video: "https://www.youtube.com/embed/dQw4w9WgXcQ",
            videoLink: "https://www.youtube.com/watch?v=dQw4w9WgXcQ",
            videoType: "Reception Hall Walkthrough"
        },

        bridal: {
            name: "Bridal Suites & Groom Lounge",
            capacity: "50 Pax",
            area: "1,800 sq.ft",

            baseFee: 15000,
            additionalFee: 3000,
            gst: 18,
            deposit: 5000,

            facilities: [
                {
                    name: "Bridal Suites",
                    type: "Dressing / Rest Rooms",
                    capacity: "25 Pax",
                    area: "900 sq.ft"
                },
                {
                    name: "Groom Lounge",
                    type: "Dressing / Rest Rooms",
                    capacity: "25 Pax",
                    area: "900 sq.ft"
                },
                {
                    name: "Attached Washrooms",
                    type: "Utility Facility",
                    capacity: "Multiple Users",
                    area: "Included"
                },
                {
                    name: "Dressing & Makeup Area",
                    type: "Room Facility",
                    capacity: "Multiple Users",
                    area: "Included"
                }
            ],

            images: [
                "https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=800&q=80",
                "https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=800&q=80",
                "https://images.unsplash.com/photo-1616486029423-aaa4789e8c9a?auto=format&fit=crop&w=800&q=80"
            ],

            video: "https://www.youtube.com/embed/dQw4w9WgXcQ",
            videoLink: "https://www.youtube.com/watch?v=dQw4w9WgXcQ",
            videoType: "Suite Walkthrough"
        }

    };


    /*
    |--------------------------------------------------------------------------
    | FORMAT CURRENCY
    |--------------------------------------------------------------------------
    */

    function formatRupees(amount) {
        return "₹" + Number(amount).toLocaleString("en-IN");
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE SELECTED HALL DETAILS
    |--------------------------------------------------------------------------
    */

    function updateHallDetails(hallKey) {

        const hall = hallData[hallKey];

        if (!hall) {
            return;
        }

        // Hall summary
        document.getElementById("selectedHallName").textContent = hall.name;
        document.getElementById("selectedHallCapacity").textContent = hall.capacity;
        document.getElementById("selectedHallArea").textContent = hall.area;

        // Hero booking fee
        document.getElementById("heroHallFee").textContent =
            formatRupees(hall.baseFee);

        document.getElementById("heroHallDeposit").textContent =
            formatRupees(hall.deposit);

        document.getElementById("heroHallGST").textContent =
            hall.gst + "%";


        /*
        |--------------------------------------------------------------------------
        | FACILITIES
        |--------------------------------------------------------------------------
        */

        const facilitiesBody = document.getElementById("hallFacilitiesBody");

        facilitiesBody.innerHTML = "";

        hall.facilities.forEach(function (facility, index) {

            facilitiesBody.innerHTML += `
                <tr>
                    <td class="text-muted text-center fw-bold">${index + 1}</td>

                    <td>
                        <div class="fw-bold text-dark">${facility.name}</div>
                        ${index === 0 ? '<span class="badge bg-primary text-white" style="font-size:.65rem;">Selected Hall</span>' : ''}
                    </td>

                    <td>
                        <span class="badge bg-light text-dark border">
                            ${facility.type}
                        </span>
                    </td>

                    <td class="text-center">
                        <span class="fw-bold text-dark">${facility.capacity}</span>
                    </td>

                    <td class="text-muted">${facility.area}</td>

                    <td class="text-center">
                        <span class="badge badge-soft-success px-2 py-1 rounded-pill">
                            <i class="bi bi-check-circle me-1"></i> Available
                        </span>
                    </td>
                </tr>
            `;

        });

        document.getElementById("facilityCount").textContent =
            hall.facilities.length;


        /*
        |--------------------------------------------------------------------------
        | PHOTOS / GALLERY
        |--------------------------------------------------------------------------
        */

        const gallery = document.getElementById("hallGallery");

        gallery.innerHTML = "";

        hall.images.forEach(function (image, index) {

            gallery.innerHTML += `
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="position-relative border rounded p-1 bg-white shadow-xs">

                        <img src="${image}"
                            class="gallery-img-thumb"
                            alt="${hall.name} photo ${index + 1}">

                        ${index === 0
                            ? '<span class="badge bg-primary position-absolute top-0 start-0 m-2 shadow-sm">Cover Thumbnail</span>'
                            : ''
                        }

                    </div>
                </div>
            `;

        });


        /*
        |--------------------------------------------------------------------------
        | VIDEO
        |--------------------------------------------------------------------------
        */

        document.getElementById("hallVideo").src = hall.video;

        document.getElementById("hallVideoLink").href = hall.videoLink;

        document.getElementById("hallVideoLink").textContent =
            hall.videoLink;

        document.getElementById("hallVideoType").textContent =
            hall.videoType;


        /*
        |--------------------------------------------------------------------------
        | CHARGES / GST
        |--------------------------------------------------------------------------
        */

        const subTotal = hall.baseFee + hall.additionalFee;

        const gstAmount = Math.round(subTotal * hall.gst / 100);

        const totalRental = subTotal + gstAmount;

        const initialDeposit = totalRental + hall.deposit;

        document.getElementById("baseFee").textContent =
            formatRupees(hall.baseFee);

        document.getElementById("additionalFee").textContent =
            formatRupees(hall.additionalFee);

        document.getElementById("subTotal").textContent =
            formatRupees(subTotal);

        document.getElementById("gstRate").textContent =
            hall.gst + "% GST";

        document.getElementById("gstAmount").textContent =
            "+" + formatRupees(gstAmount);

        document.getElementById("totalRental").textContent =
            formatRupees(totalRental);

        document.getElementById("securityDeposit").textContent =
            formatRupees(hall.deposit);

        document.getElementById("initialDeposit").textContent =
            formatRupees(initialDeposit);

    }


    /*
    |--------------------------------------------------------------------------
    | HALL FILTER CHANGE EVENT
    |--------------------------------------------------------------------------
    */

    const hallSelector = document.getElementById("hallSelector");

    hallSelector.addEventListener("change", function () {
        updateHallDetails(this.value);
    });


    // Load default selected hall on page load
    updateHallDetails(hallSelector.value);


    /*
    |--------------------------------------------------------------------------
    | LEAFLET MAP
    |--------------------------------------------------------------------------
    */

    const lat = 12.9121;
    const lng = 77.6446;

    const showMap = L.map("showMap").setView([lat, lng], 14);

    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        maxZoom: 19,
        attribution: "© OpenStreetMap contributors"
    }).addTo(showMap);

    const marker = L.marker([lat, lng]).addTo(showMap);

    marker.bindPopup(
        "<b>Sri Krishna Grand Convention Centre &amp; Kalyana Mantapa</b><br>#45/2, 14th Main Road, 4th Sector, HSR Layout"
    ).openPopup();


    // Fix map size when Overview tab is opened
    const overviewTab = document.getElementById("overview-tab");

    if (overviewTab) {
        overviewTab.addEventListener("shown.bs.tab", function () {
            showMap.invalidateSize();
        });
    }

});
</script>

@endsection
