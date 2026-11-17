@extends('admin.layout.centers.app')

@section('title') Sri Krishna Grand Convention Centre &amp; Kalyana Mantapa – Convention Centre Master @endsection

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<!-- Leaflet CSS for Map View -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
    .show-hero-card {
        background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%);
        border-radius: 16px;
        color: #ffffff;
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
        background: radial-gradient(circle, rgba(245, 158, 11, 0.15) 0%, transparent 70%);
        border-radius: 50%;
    }
    .metric-pill-card {
        border-radius: 12px;
        border: 1px solid rgba(0,0,0,0.06);
        background: #ffffff;
        padding: 1rem;
        transition: transform 0.2s ease;
    }
    .metric-pill-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.04);
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
        transition: transform 0.25s ease;
        cursor: pointer;
    }
    .gallery-img-thumb:hover {
        transform: scale(1.02);
    }
    .nav-tabs .nav-link {
        font-weight: 600;
        color: #64748b;
        padding: 0.85rem 1.25rem;
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
        padding-bottom: 56.25%; /* 16:9 aspect ratio */
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
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Breadcrumb & Top Bar -->
   <div class="page-title py-3">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <h4 class="fw-bold mb-1 text-dark d-flex align-items-center gap-2">
                   
                     Conventional Centre Master
                </h4>
               
            </div>
            <div class="col-12 col-md-6 text-md-end mt-2 mt-md-0">
                <ol class="breadcrumb justify-content-md-end mb-0 bg-transparent p-0">
                    <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/admin/convention-centres">Centre Masters</a></li>
                    <li class="breadcrumb-item active">Details</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <!-- 1. Hero Summary Header Card -->
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
                <h3 class="fw-bold text-white mb-2">Sri Krishna Grand Convention Centre &amp; Kalyana Mantapa</h3>
                <p class="text-white-50 mb-3" style="font-size: 0.92rem;">
                    <i class="bi bi-geo-alt-fill text-danger me-1"></i> #45/2, 14th Main Road, 4th Sector, HSR Layout &bull; Ward 174 - HSR Layout, South Zone &bull; PIN: 560102
                </p>
                <div class="d-flex align-items-center gap-3 text-white-50 small flex-wrap">
                    <span><i class="bi bi-shield-check text-success me-1"></i> BBMP (Bruhat Bengaluru Mahanagara Palike)</span>
                    <span>&bull;</span>
                    <span><i class="bi bi-calendar-check me-1"></i> Created: 15 Jan 2026</span>
                </div>
            </div>
            <div class="col-12 col-lg-4 text-lg-end mt-3 mt-lg-0">
                <div class="bg-white bg-opacity-10 p-3 rounded-3 d-inline-block text-start border border-white border-opacity-10">
                    <span class="text-dark small d-block mb-1">Standard Daily Booking Fee</span>
                    <h2 class="fw-bold text-warning mb-0">₹75,000</h2>
                    <small class="text-dark">+ ₹25,000 Refundable Deposit | GST 18%</small>
                </div>
            </div>
        </div>
    </div>

   

    <!-- 3. Navigation Tabs -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white border-bottom p-0">
            <ul class="nav nav-tabs border-0" id="centreMasterTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab">
                        <i class="bi bi-geo-alt me-1"></i> Location &amp; In-Charge
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="facilities-tab" data-bs-toggle="tab" data-bs-target="#facilities" type="button" role="tab">
                        <i class="bi bi-door-open me-1"></i> Facilities (4)
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="media-tab" data-bs-toggle="tab" data-bs-target="#media" type="button" role="tab">
                        <i class="bi bi-images me-1"></i> Photos &amp; Video Walkthrough
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="charges-tab" data-bs-toggle="tab" data-bs-target="#charges" type="button" role="tab">
                        <i class="bi bi-currency-rupee me-1"></i> Tariff &amp; GST Breakdown
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="rules-tab" data-bs-toggle="tab" data-bs-target="#rules" type="button" role="tab">
                        <i class="bi bi-journal-text me-1"></i> Booking Rules &amp; Cancellation
                    </button>
                </li>
            </ul>
        </div>

        <div class="card-body p-4">
            <div class="tab-content" id="centreMasterTabsContent">

                <!-- TAB 1: LOCATION & IN-CHARGE -->
                <div class="tab-pane fade show active" id="overview" role="tabpanel">
                    <div class="row g-4">
                        <!-- Left: Location Details -->
                        <div class="col-12 col-lg-7">
                            <h6 class="fw-bold text-dark mb-3"><i class="bi bi-pin-map-fill text-danger me-2"></i>Civic Venue Location Details</h6>
                            <table class="table table-bordered mb-4">
                                <tbody>
                                    <tr>
                                        <th class="bg-light text-muted w-25 small">Address</th>
                                        <td class="fw-medium text-dark">#45/2, 14th Main Road, 4th Sector, HSR Layout</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light text-muted small">Corporation / District</th>
                                        <td class="fw-medium text-dark">BBMP (Bruhat Bengaluru Mahanagara Palike)</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light text-muted small">Zone</th>
                                        <td><span class="badge badge-soft-primary">South Zone</span></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light text-muted small">Ward</th>
                                        <td class="fw-medium text-dark">Ward 174 - HSR Layout</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light text-muted small">PIN Code</th>
                                        <td class="font-monospace fw-bold text-dark">560102</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light text-muted small">Geo Coordinates</th>
                                        <td>
                                            <span class="font-monospace text-secondary me-2">Lat: 12.9121, Long: 77.6446</span>
                                            <a href="https://www.google.com/maps?q=12.9121,77.6446" target="_blank" class="btn btn-xs btn-outline-primary py-0 px-2 small">
                                                <i class="bi bi-box-arrow-up-right me-1"></i> Google Maps
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- In-Charge Contact Card -->
                            <h6 class="fw-bold text-dark mb-3"><i class="bi bi-person-badge-fill text-primary me-2"></i>Centre In-Charge Details</h6>
                            <div class="p-3 rounded-3 border bg-light d-flex align-items-center gap-3">
                                <div class="p-3 rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width:52px;height:52px;font-size:1.5rem;">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold text-dark mb-1">Rajeshwar Hegde</h6>
                                    <div class="text-muted small mb-1">
                                        <i class="bi bi-telephone-fill text-success me-1"></i>
                                        <a href="tel:+919845012345" class="text-decoration-none text-dark fw-medium">+91 98450 12345</a>
                                    </div>
                                    <div class="text-muted small">
                                        <i class="bi bi-envelope-fill text-primary me-1"></i>
                                        <a href="mailto:rajesh.hegde@bbmp.gov.in" class="text-decoration-none text-muted">rajesh.hegde@bbmp.gov.in</a>
                                    </div>
                                </div>
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2">
                                    <i class="bi bi-check-circle me-1"></i>Verified Officer
                                </span>
                            </div>
                        </div>

                        <!-- Right: Interactive Leaflet Map -->
                        <div class="col-12 col-lg-5">
                            <h6 class="fw-bold text-dark mb-3"><i class="bi bi-map-fill text-primary me-2"></i>Geo-Location Pin</h6>
                            <div id="showMap" class="shadow-xs mb-2"></div>
                            <small class="text-muted d-block text-center">
                                <i class="bi bi-info-circle me-1"></i> Coordinates pinned at Latitude 12.9121, Longitude 77.6446
                            </small>
                        </div>
                    </div>
                </div>

                <!-- TAB 2: FACILITIES DETAILS (Multiple Addition Option) -->
                <div class="tab-pane fade" id="facilities" role="tabpanel">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <h6 class="fw-bold text-dark mb-0">Registered Facility Sub-Units</h6>
                            <small class="text-muted">Citizens can book the entire convention venue or specific sub-facilities</small>
                        </div>
                        <a href="/admin/convention-centres/edit" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-plus-lg me-1"></i> Add / Edit Facilities
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-light text-uppercase small text-muted">
                                <tr>
                                    <th style="width: 50px;">#</th>
                                    <th>Facility Name</th>
                                    <th>Facility Type</th>
                                    <th class="text-center">Seating Capacity</th>
                                    <th>Area / Size</th>
                                    <th class="text-center">Availability Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-muted text-center fw-bold">1</td>
                                    <td>
                                        <div class="fw-bold text-dark">Main Kalyana Mantapa Hall</div>
                                        <span class="badge bg-primary text-white" style="font-size:0.65rem;">Primary Hall</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border">Main Auditorium / Hall</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="fw-bold text-dark">1,500</span> <span class="text-muted small">Pax</span>
                                    </td>
                                    <td class="text-muted">14,000 sq.ft</td>
                                    <td class="text-center">
                                        <span class="badge badge-soft-success px-2 py-1 rounded-pill"><i class="bi bi-check-circle me-1"></i> Available</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted text-center fw-bold">2</td>
                                    <td><div class="fw-bold text-dark">Traditional Dining Hall</div></td>
                                    <td><span class="badge bg-light text-dark border">Dining Area</span></td>
                                    <td class="text-center"><span class="fw-bold text-dark">600</span> <span class="text-muted small">Pax</span></td>
                                    <td class="text-muted">7,500 sq.ft</td>
                                    <td class="text-center"><span class="badge badge-soft-success px-2 py-1 rounded-pill"><i class="bi bi-check-circle me-1"></i> Available</span></td>
                                </tr>
                                <tr>
                                    <td class="text-muted text-center fw-bold">3</td>
                                    <td><div class="fw-bold text-dark">Mini AC Reception Hall</div></td>
                                    <td><span class="badge bg-light text-dark border">Banquet / Function Hall</span></td>
                                    <td class="text-center"><span class="fw-bold text-dark">300</span> <span class="text-muted small">Pax</span></td>
                                    <td class="text-muted">3,200 sq.ft</td>
                                    <td class="text-center"><span class="badge badge-soft-success px-2 py-1 rounded-pill"><i class="bi bi-check-circle me-1"></i> Available</span></td>
                                </tr>
                                <tr>
                                    <td class="text-muted text-center fw-bold">4</td>
                                    <td><div class="fw-bold text-dark">Bridal Suites &amp; Groom Lounge (6 Rooms)</div></td>
                                    <td><span class="badge bg-light text-dark border">Dressing / Rest Rooms</span></td>
                                    <td class="text-center"><span class="fw-bold text-dark">50</span> <span class="text-muted small">Pax</span></td>
                                    <td class="text-muted">1,800 sq.ft</td>
                                    <td class="text-center"><span class="badge badge-soft-success px-2 py-1 rounded-pill"><i class="bi bi-check-circle me-1"></i> Available</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- TAB 3: MEDIA (Photos & Video Addition) -->
                <div class="tab-pane fade" id="media" role="tabpanel">
                    <h6 class="fw-bold text-dark mb-3"><i class="bi bi-images text-primary me-2"></i>Photographic Gallery</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="position-relative border rounded p-1 bg-white shadow-xs">
                                <img src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&amp;fit=crop&amp;w=800&amp;q=80" class="gallery-img-thumb" alt="Convention centre exterior">
                                <span class="badge bg-primary position-absolute top-0 start-0 m-2 shadow-sm">Cover Thumbnail</span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="position-relative border rounded p-1 bg-white shadow-xs">
                                <img src="https://images.unsplash.com/photo-1545232979-fbf68fe9b1af?auto=format&amp;fit=crop&amp;w=800&amp;q=80" class="gallery-img-thumb" alt="Convention centre interior">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="position-relative border rounded p-1 bg-white shadow-xs">
                                <img src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?auto=format&amp;fit=crop&amp;w=800&amp;q=80" class="gallery-img-thumb" alt="Convention centre event space">
                            </div>
                        </div>
                    </div>

                    <h6 class="fw-bold text-dark mb-3"><i class="bi bi-play-circle-fill text-danger me-2"></i>Video Walkthrough / Virtual Tour</h6>
                        <div class="card border bg-light p-3">
                            <div class="video-wrapper shadow-sm">
                                <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Walkthrough Video" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="mt-2 text-muted small d-flex align-items-center justify-content-between">
                                <span><i class="bi bi-link-45deg me-1"></i> Source URL: <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="text-decoration-none">https://www.youtube.com/watch?v=dQw4w9WgXcQ</a></span>
                                <span class="badge bg-light text-dark border">360° Walkthrough</span>
                            </div>
                        </div>
                </div>

                <!-- TAB 4: CHARGES & TARIFFS -->
                <div class="tab-pane fade" id="charges" role="tabpanel">
                    <div class="row g-4">
                        <div class="col-12 col-md-7">
                            <h6 class="fw-bold text-dark mb-3"><i class="bi bi-receipt text-success me-2"></i>Official Fee Schedule</h6>
                            <table class="table table-bordered align-middle">
                                <tbody>
                                    <tr>
                                        <th class="bg-light text-muted w-50">Base Booking Fee (Per day / slot)</th>
                                        <td class="fw-bold text-dark fs-6">₹75,000</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light text-muted">Additional Charges (Power, Cleaning, AC)</th>
                                        <td class="fw-bold text-dark">₹12,500</td>
                                    </tr>
                                    <tr class="table-light">
                                        <th class="text-dark fw-bold">Taxable Sub-Total</th>
                                        <td class="text-dark fw-bold">₹87,500</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light text-muted">Applicable GST Rate</th>
                                        <td>
                                            <span class="badge bg-primary">18% GST</span>
                                            <small class="text-muted ms-2">(CGST 9% + SGST 9%)</small>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light text-muted">GST Tax Amount</th>
                                        <td class="fw-bold text-danger">+₹15,750</td>
                                    </tr>
                                    <tr class="table-primary">
                                        <th class="text-primary fw-bold">Total Rental Payable</th>
                                        <td class="text-primary fw-bold fs-6">₹1,03,250</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light text-muted">Refundable Security Deposit</th>
                                        <td class="fw-bold text-secondary">₹25,000 <span class="badge bg-light text-muted border small">Refundable</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-12 col-md-5">
                            <div class="card border-0 bg-light p-4 rounded-3 text-center">
                                <span class="text-muted small text-uppercase fw-semibold d-block mb-1">Total Initial Deposit Required</span>
                                <h2 class="fw-bold text-success mb-2">₹1,28,250</h2>
                                <p class="text-muted small mb-0">Includes full rental charges, GST, and 100% refundable caution deposit released post-event.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 5: BOOKING RULES & CANCELLATION POLICY -->
                <div class="tab-pane fade" id="rules" role="tabpanel">
                    <div class="row g-4">
                        <div class="col-12 col-md-6">
                            <div class="card border p-3 rounded-3 h-100">
                                <h6 class="fw-bold text-dark mb-2"><i class="bi bi-clock-history text-primary me-2"></i>Booking Reservation Window</h6>
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
                                <h6 class="fw-bold text-dark mb-2"><i class="bi bi-shield-x text-danger me-2"></i>Cancellation &amp; Refund Policy</h6>
                                <div class="p-3 bg-light rounded text-dark small mb-3" style="line-height: 1.6;">
                                    100% refund prior to 30 days of event; 50% refund between 15-30 days; non-refundable within 15 days of event date.
                                </div>
                                <div class="alert alert-warning py-2 mb-0 small">
                                    <i class="bi bi-exclamation-circle-fill me-1"></i> Security deposits are processed for full refund within 7 working days following civic site clearance.
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
<!-- Leaflet JS for Map View -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const lat = 12.9121;
        const lng = 77.6446;

        const showMap = L.map('showMap').setView([lat, lng], 14);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap contributors'
        }).addTo(showMap);

        const marker = L.marker([lat, lng]).addTo(showMap);
        marker.bindPopup("<b>Sri Krishna Grand Convention Centre &amp; Kalyana Mantapa</b><br>#45/2, 14th Main Road, 4th Sector, HSR Layout").openPopup();

        // Invalidate map size when tab switches to overview
        const overviewTab = document.getElementById('overview-tab');
        if (overviewTab) {
            overviewTab.addEventListener('shown.bs.tab', function () {
                showMap.invalidateSize();
            });
        }
    });
</script>
@endsection
