
@extends('conventions.layouts.app')

@section('title', 'Edit Centre Master')

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<style>
    .page-title{display:flex;justify-content:space-between;align-items:center;gap:15px;flex-wrap:wrap}
    .section-card{background:#fff;border:1px solid #e5eaf0;border-radius:12px;margin-bottom:22px;overflow:hidden}
    .section-header{display:flex;align-items:center;gap:12px;padding:16px 20px;background:#f8fafc;border-bottom:1px solid #e5eaf0}
    .step-badge{width:34px;height:34px;border-radius:9px;background:#087b43;color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;flex-shrink:0}
    .section-header h5{font-size:16px;font-weight:700;margin:0;color:#26364a}
    .section-header p{font-size:12px;color:#84909e;margin:3px 0 0}
    .section-body{padding:22px}
    .form-label{font-size:13px;font-weight:600;color:#344256;margin-bottom:7px}
    .form-control,.form-select{min-height:42px;border-color:#dce3eb;border-radius:7px;font-size:13px}
    .form-control:focus,.form-select:focus{border-color:#087b43;box-shadow:0 0 0 .15rem rgba(8,123,67,.12)}
    textarea.form-control{min-height:90px}
    .required{color:#dc3545}
    .form-text,.small-muted{font-size:11px;color:#8994a2}
    .btn-submit-main{background:#087b43;color:#fff;border:1px solid #087b43;border-radius:7px;padding:10px 19px;font-size:13px;font-weight:600}
    .btn-submit-main:hover{background:#056536;color:#fff}
    .btn-outline-main{background:#fff;color:#087b43;border:1px solid #087b43;border-radius:7px}
    .btn-outline-main:hover{background:#087b43;color:#fff}
    #mapPicker{height:290px;width:100%;border:1px solid #dce3eb;border-radius:9px;z-index:1}
    .hall-card{border:1px solid #dce5ed;border-radius:12px;margin-bottom:22px;overflow:hidden;background:#fff}
    .hall-card-header{background:#f2f8f4;padding:15px 18px;border-bottom:1px solid #dce5ed;display:flex;justify-content:space-between;align-items:center;gap:10px;flex-wrap:wrap}
    .hall-card-header h5{font-size:15px;font-weight:700;margin:0;color:#087b43}
    .hall-card-body{padding:18px}
    .hall-subsection{border:1px solid #e5eaf0;border-radius:9px;padding:16px;margin-bottom:16px}
    .hall-subsection:last-child{margin-bottom:0}
    .hall-subsection-title{display:flex;align-items:center;gap:8px;margin-bottom:15px}
    .hall-subsection-title h6{font-size:13px;font-weight:700;margin:0;color:#344256}
    .hall-subsection-title i{color:#087b43;font-size:16px}
    .facility-row{border:1px solid #e5eaf0;border-radius:8px;padding:12px;background:#fafbfd;margin-bottom:10px}
    .media-preview-box{border:1px solid #e5eaf0;border-radius:8px;padding:9px;height:100%;background:#fff}
    .media-preview-box img{width:100%;height:120px;object-fit:cover;border-radius:6px}
    .upload-zone{border:1px dashed #b9c8d6;border-radius:9px;padding:17px;background:#fafcfd;text-align:center}
    .upload-zone i{font-size:25px;color:#087b43}
    .charge-summary{background:#f2f9f5;border:1px solid #d9ebe1;border-radius:8px;padding:12px}
    .action-footer{display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap}
    .breadcrumb{font-size:12px;margin-bottom:0}
    .breadcrumb a{color:#087b43;text-decoration:none}
    @media(max-width:767px){
        .section-body,.hall-card-body{padding:14px}
        .section-header{padding:14px}
        #mapPicker{height:240px}
        .action-footer .btn{width:100%}
    }
</style>
@endsection

@section('content')
<div class="container-fluid">

    <div class="page-title py-3">
        <div>
            <h4 class="fw-bold mb-1 text-dark">Edit Centre Master</h4>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('conventions.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('conventions.preview.venues.index') }}">Centres</a></li>
                    <li class="breadcrumb-item active">Edit Centre</li>
                </ol>
            </nav>
        </div>

        <button type="submit" form="editCentreForm" class="btn btn-submit-main">
            <i class="bi bi-check-circle-fill me-1"></i> Update Centre
        </button>
    </div>

    <form id="editCentreForm" novalidate>

        <!-- 1. BASIC CENTRE INFORMATION -->
        <div class="section-card">
            <div class="section-header">
                <span class="step-badge">1</span>
                <div>
                    <h5>Basic Centre Information</h5>
                    <p>Update the basic information of your conventional centre</p>
                </div>
            </div>

            <div class="section-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Centre ID</label>
                        <input type="text" class="form-control" value="CC-2026-001" readonly>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Centre Type <span class="required">*</span></label>
                        <select class="form-select" required>
                            <option>Kalyana Mantapa / Marriage Hall</option>
                            <option>Convention Centre</option>
                            <option>Community Hall</option>
                            <option>Auditorium</option>
                            <option>Banquet Hall</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Centre Name <span class="required">*</span></label>
                        <input type="text" class="form-control" value="Sri Krishna Grand Convention Centre & Kalyana Mantapa" required>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. LOCATION -->
        <div class="section-card">
            <div class="section-header">
                <span class="step-badge">2</span>
                <div>
                    <h5>Location & Geo-Coordinates</h5>
                    <p>Update centre address and geographical location</p>
                </div>
            </div>

            <div class="section-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Address <span class="required">*</span></label>
                        <textarea class="form-control" required>#45/2, 14th Main Road, 4th Sector, HSR Layout</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Landmark</label>
                        <textarea class="form-control">Near HSR Layout BDA Complex</textarea>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Corporation / Municipality</label>
                        <select class="form-select">
                            <option selected>BBMP (Bruhat Bengaluru Mahanagara Palike)</option>
                            <option>Other Municipality</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Zone</label>
                        <select class="form-select">
                            <option selected>South Zone</option>
                            <option>East Zone</option>
                            <option>West Zone</option>
                            <option>North Zone</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Ward</label>
                        <input type="text" class="form-control" value="Ward 174 - HSR Layout">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">PIN Code <span class="required">*</span></label>
                        <input type="text" class="form-control" id="pinCode" value="560102" maxlength="6" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Latitude</label>
                        <input type="text" class="form-control" id="latitude" value="12.9121" readonly>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Longitude</label>
                        <input type="text" class="form-control" id="longitude" value="77.6446" readonly>
                    </div>

                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-2">
                            <label class="form-label mb-0">Select Centre Location on Map</label>
                            <button type="button" class="btn btn-sm btn-outline-main" id="getCurrentLocation">
                                <i class="bi bi-crosshair me-1"></i> Use Current Location
                            </button>
                        </div>
                        <div id="mapPicker"></div>
                        <div class="small-muted mt-2">Drag the marker or click on the map to update the location.</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. CONTACT DETAILS -->
        <div class="section-card">
            <div class="section-header">
                <span class="step-badge">3</span>
                <div>
                    <h5>Contact Details</h5>
                    <p>Update centre contact person and communication information</p>
                </div>
            </div>

            <div class="section-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Contact Person Name <span class="required">*</span></label>
                        <input type="text" class="form-control" value="Rajeshwar Hegde" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Mobile Number <span class="required">*</span></label>
                        <input type="tel" class="form-control" value="9845012345" maxlength="10" pattern="[0-9]{10}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control" value="rajesh.hegde@bbmp.gov.in">
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. HALL DETAILS - EACH HALL HAS EVERYTHING INSIDE ITS CARD -->
        <div class="section-card">
            <div class="section-header">
                <span class="step-badge">4</span>
                <div>
                    <h5>Hall Details, Facilities, Media & Charges</h5>
                    <p>Each hall has its own details, facilities, gallery, video and booking charges</p>
                </div>
            </div>

            <div class="section-body">

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                    <div>
                        <h6 class="fw-bold mb-1">Centre Halls</h6>
                        <div class="small-muted">Manage each hall separately using its own complete card.</div>
                    </div>
                    <button type="button" class="btn btn-submit-main" id="addHallBtn">
                        <i class="bi bi-plus-circle me-1"></i> Add Another Hall
                    </button>
                </div>

                <div id="hallCardsContainer"></div>

            </div>
        </div>

        <!-- 5. BOOKING RULES -->
        <div class="section-card">
            <div class="section-header">
                <span class="step-badge">5</span>
                <div>
                    <h5>Booking Rules & Cancellation Policy</h5>
                    <p>Update advance booking rules and cancellation conditions</p>
                </div>
            </div>

            <div class="section-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Minimum Advance Booking (Days)</label>
                        <input type="number" class="form-control" value="15" min="0">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Maximum Booking Duration</label>
                        <select class="form-select">
                            <option>1 Day</option>
                            <option selected>3 Days</option>
                            <option>5 Days</option>
                            <option>7 Days</option>
                            <option>15 Days</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Policy Template</label>
                        <select class="form-select" id="policyTemplate">
                            <option value="">Choose Policy Template</option>
                            <option value="standard">Standard Policy</option>
                            <option value="flexible">Flexible Policy</option>
                            <option value="strict">Strict Policy</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Cancellation Policy <span class="required">*</span></label>
                        <textarea class="form-control" id="cancellationPolicy" rows="5" required>Cancellation requests must be submitted in writing. Cancellations made 30 days or more before the event date are eligible for a 90% refund. Cancellations made 15 to 29 days before the event date are eligible for a 50% refund. Cancellations made less than 15 days before the event date are not eligible for a refund. Security deposit refunds are subject to inspection and clearance of the premises.</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Supporting Document (Optional)</label>
                        <input type="file" class="form-control" accept=".pdf,.doc,.docx" id="policyDocument">
                        <div class="form-text">Allowed formats: PDF, DOC, DOCX</div>
                        <div id="policyDocumentName" class="small-muted mt-2"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ACTIONS -->
        <div class="section-card">
            <div class="section-body action-footer">
                <span class="small-muted"><i class="bi bi-info-circle me-1"></i> Review the details before updating.</span>
                <div class="d-flex gap-2 flex-wrap">
                    <a href="{{ route('conventions.preview.venues.index') }}" class="btn btn-light border px-4">Cancel</a>
                    <button type="submit" class="btn btn-submit-main px-4">
                        <i class="bi bi-check-circle-fill me-1"></i> Update Centre
                    </button>
                </div>
            </div>
        </div>

    </form>
</div>
@endsection

@section('script')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    /* ---------------------------------------
       MAP
    --------------------------------------- */
    let map = null;
    let marker = null;

    const latitudeInput = document.getElementById('latitude');
    const longitudeInput = document.getElementById('longitude');

    if (typeof L !== 'undefined') {
        map = L.map('mapPicker').setView([12.9121, 77.6446], 16);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        marker = L.marker([12.9121, 77.6446], {draggable:true}).addTo(map);

        function updateMapCoordinates(position) {
            latitudeInput.value = position.lat.toFixed(6);
            longitudeInput.value = position.lng.toFixed(6);
        }

        marker.on('dragend', function () {
            updateMapCoordinates(marker.getLatLng());
        });

        map.on('click', function (event) {
            marker.setLatLng(event.latlng);
            updateMapCoordinates(event.latlng);
        });

        setTimeout(function () {
            map.invalidateSize();
        }, 500);
    }

    document.getElementById('getCurrentLocation').addEventListener('click', function () {
        if (!navigator.geolocation) {
            Swal.fire('Unavailable', 'Geolocation is not supported by this browser.', 'warning');
            return;
        }

        navigator.geolocation.getCurrentPosition(function (position) {
            const lat = position.coords.latitude;
            const lng = position.coords.longitude;

            latitudeInput.value = lat.toFixed(6);
            longitudeInput.value = lng.toFixed(6);

            if (map && marker) {
                marker.setLatLng([lat, lng]);
                map.setView([lat, lng], 16);
            }
        }, function () {
            Swal.fire('Location unavailable', 'Please allow location access or select the location manually on the map.', 'warning');
        });
    });

    /* ---------------------------------------
       HALL DATA
       Every hall contains its own:
       1. Hall details
       2. Facilities
       3. Media gallery and video
       4. Booking charges
    --------------------------------------- */

    let nextHallId = 2;

    const hallData = [
        {
            id: 1,
            name: 'Main Kalyana Mantapa Hall',
            type: 'Main Auditorium / Hall',
            capacity: 1500,
            area: 14000,
            status: 'Available',
            facilities: [
                {name:'Main Kalyana Mantapa Hall', type:'Main Auditorium / Hall', capacity:1500, area:14000, status:'Available'}
            ],
            video: 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            images: [
                {url:'https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=600', name:'Hall cover image'},
                {url:'https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?w=600', name:'Hall gallery image'},
                {url:'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?w=600', name:'Hall gallery image'}
            ],
            bookingFee:75000,
            security:25000,
            additional:12500,
            gst:18
        }
    ];

    const hallCardsContainer = document.getElementById('hallCardsContainer');

    function escapeHtml(value) {
        return String(value ?? '').replace(/[&<>"']/g, function (character) {
            return {
                '&':'&amp;',
                '<':'&lt;',
                '>':'&gt;',
                '"':'&quot;',
                "'":'&#039;'
            }[character];
        });
    }

    function facilityMarkup(facility, hallId) {
        return `
            <div class="facility-row">
                <div class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label class="form-label">Facility Name</label>
                        <input type="text" class="form-control facility-name"
                            value="${escapeHtml(facility.name)}" placeholder="Enter facility name">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Facility Type</label>
                        <select class="form-select facility-type">
                            ${['Main Auditorium / Hall','Dining Hall','Kitchen','Parking','AC Facility','Generator','Other'].map(type =>
                                `<option ${facility.type === type ? 'selected' : ''}>${type}</option>`
                            ).join('')}
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Capacity</label>
                        <input type="number" class="form-control facility-capacity"
                            value="${escapeHtml(facility.capacity)}" min="0">
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Area (Sq. Ft.)</label>
                        <input type="number" class="form-control facility-area"
                            value="${escapeHtml(facility.area)}" min="0">
                    </div>

                    <div class="col-md-1">
                        <button type="button" class="btn btn-outline-danger w-100 remove-facility" title="Remove facility">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Facility Status</label>
                        <select class="form-select facility-status">
                            <option ${facility.status === 'Available' ? 'selected' : ''}>Available</option>
                            <option ${facility.status === 'Unavailable' ? 'selected' : ''}>Unavailable</option>
                            <option ${facility.status === 'Maintenance' ? 'selected' : ''}>Maintenance</option>
                        </select>
                    </div>
                </div>
            </div>
        `;
    }

    function imageMarkup(image, index) {
        return `
            <div class="col-6 col-md-4 col-lg-3 gallery-item">
                <div class="media-preview-box">
                    <img src="${escapeHtml(image.url)}" alt="Hall image">
                    <div class="d-flex justify-content-between align-items-center mt-2 gap-1">
                        <span class="small-muted text-truncate">${escapeHtml(image.name)}</span>
                        <button type="button" class="btn btn-sm btn-outline-danger remove-image" title="Remove image">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                    <label class="small mt-2 d-flex align-items-center gap-1">
                        <input type="radio" class="cover-image-radio" name="cover_hall_${index}" ${index === 0 ? 'checked' : ''}>
                        Cover Image
                    </label>
                </div>
            </div>
        `;
    }

    function hallCardMarkup(hall, index) {
        return `
        <div class="hall-card" data-hall-id="${hall.id}">

            <!-- HALL CARD HEADER -->
            <div class="hall-card-header">
                <div class="d-flex align-items-center gap-2">
                    <span class="step-badge">H${index + 1}</span>
                    <div>
                        <h5 class="hall-card-title">Hall ${index + 1} - ${escapeHtml(hall.name)}</h5>
                        <div class="small-muted">Complete details, facilities, media and charges for this hall</div>
                    </div>
                </div>

                ${index > 0 ? `
                    <button type="button" class="btn btn-sm btn-outline-danger remove-hall">
                        <i class="bi bi-trash me-1"></i> Remove Hall
                    </button>
                ` : '<span class="badge bg-success">Primary Hall</span>'}
            </div>

            <div class="hall-card-body">

                <!-- A. HALL DETAILS -->
                <div class="hall-subsection">
                    <div class="hall-subsection-title">
                        <i class="bi bi-building"></i>
                        <h6>1. Hall Details</h6>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Hall Name <span class="required">*</span></label>
                            <input type="text" class="form-control hall-name"
                                value="${escapeHtml(hall.name)}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Hall Type <span class="required">*</span></label>
                            <select class="form-select hall-type" required>
                                ${['Main Auditorium / Hall','Banquet Hall','Conference Hall','Dining Hall','Open Lawn','Meeting Room','Other'].map(type =>
                                    `<option ${hall.type === type ? 'selected' : ''}>${type}</option>`
                                ).join('')}
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Seating Capacity</label>
                            <input type="number" class="form-control hall-capacity"
                                value="${escapeHtml(hall.capacity)}" min="0">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Area (Sq. Ft.)</label>
                            <input type="number" class="form-control hall-area"
                                value="${escapeHtml(hall.area)}" min="0">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Hall Status</label>
                            <select class="form-select hall-status">
                                <option ${hall.status === 'Available' ? 'selected' : ''}>Available</option>
                                <option ${hall.status === 'Unavailable' ? 'selected' : ''}>Unavailable</option>
                                <option ${hall.status === 'Maintenance' ? 'selected' : ''}>Maintenance</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- B. FACILITIES -->
                <div class="hall-subsection">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                        <div class="hall-subsection-title mb-0">
                            <i class="bi bi-grid"></i>
                            <h6>2. Hall Facilities & Amenities</h6>
                        </div>

                        <button type="button" class="btn btn-sm btn-outline-main add-facility">
                            <i class="bi bi-plus-circle me-1"></i> Add Facility
                        </button>
                    </div>

                    <div class="facility-container">
                        ${hall.facilities.map(facility => facilityMarkup(facility, hall.id)).join('')}
                    </div>
                </div>

                <!-- C. MEDIA -->
                <div class="hall-subsection">
                    <div class="hall-subsection-title">
                        <i class="bi bi-images"></i>
                        <h6>3. Hall Media Gallery (Images & Video)</h6>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Video URL</label>
                            <input type="url" class="form-control hall-video"
                                value="${escapeHtml(hall.video)}"
                                placeholder="Enter YouTube or video URL">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Upload Hall Images</label>
                            <input type="file" class="form-control hall-image-upload" accept="image/*" multiple>
                            <div class="form-text">You can select multiple images for this hall.</div>
                        </div>

                        <div class="col-12">
                            <div class="row g-3 gallery-preview">
                                ${hall.images.map((image, imageIndex) => imageMarkup(image, imageIndex)).join('')}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- D. CHARGES -->
                <div class="hall-subsection">
                    <div class="hall-subsection-title">
                        <i class="bi bi-currency-rupee"></i>
                        <h6>4. Hall-wise Booking Charges</h6>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label">Booking Fee (₹) <span class="required">*</span></label>
                            <input type="number" class="form-control booking-fee"
                                value="${escapeHtml(hall.bookingFee)}" min="0" required>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Security Deposit (₹)</label>
                            <input type="number" class="form-control security-deposit"
                                value="${escapeHtml(hall.security)}" min="0">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Additional Charges (₹)</label>
                            <input type="number" class="form-control additional-charges"
                                value="${escapeHtml(hall.additional)}" min="0">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">GST (%)</label>
                            <select class="form-select gst-rate">
                                ${[0,5,12,18,28].map(rate =>
                                    `<option value="${rate}" ${Number(hall.gst) === rate ? 'selected' : ''}>${rate}%</option>`
                                ).join('')}
                            </select>
                        </div>

                        <div class="col-12">
                            <div class="charge-summary d-flex justify-content-between align-items-center flex-wrap gap-2">
                                <span class="fw-semibold small">Estimated Total (including GST)</span>
                                <strong class="text-success hall-total">₹0</strong>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>`;
    }

    function calculateTotal(card) {
        const booking = Number(card.querySelector('.booking-fee').value) || 0;
        const security = Number(card.querySelector('.security-deposit').value) || 0;
        const additional = Number(card.querySelector('.additional-charges').value) || 0;
        const gst = Number(card.querySelector('.gst-rate').value) || 0;

        const subtotal = booking + security + additional;
        const total = subtotal + (subtotal * gst / 100);

        card.querySelector('.hall-total').textContent = '₹' + total.toLocaleString('en-IN', {
            maximumFractionDigits:2
        });
    }

    function refreshHallCards() {
        const cards = hallCardsContainer.querySelectorAll('.hall-card');

        cards.forEach((card, index) => {
            const name = card.querySelector('.hall-name').value.trim() || `Hall ${index + 1}`;
            const title = card.querySelector('.hall-card-title');

            title.textContent = `Hall ${index + 1} - ${name}`;

            const badge = card.querySelector('.step-badge');
            badge.textContent = `H${index + 1}`;

            const removeButton = card.querySelector('.remove-hall');
            if (index === 0 && removeButton) removeButton.remove();
        });
    }

    function addHallCard(hall) {
        const wrapper = document.createElement('div');
        wrapper.innerHTML = hallCardMarkup(hall, hallCardsContainer.children.length);

        const card = wrapper.firstElementChild;
        hallCardsContainer.appendChild(card);

        calculateTotal(card);
        refreshHallCards();
    }

    hallData.forEach(hall => addHallCard(hall));

    /* ---------------------------------------
       ADD ANOTHER COMPLETE HALL CARD
    --------------------------------------- */
    document.getElementById('addHallBtn').addEventListener('click', function () {
        const newHall = {
            id: nextHallId++,
            name: `Additional Hall ${nextHallId - 1}`,
            type: 'Banquet Hall',
            capacity: '',
            area: '',
            status: 'Available',
            facilities: [],
            video: '',
            images: [],
            bookingFee: 0,
            security: 0,
            additional: 0,
            gst: 18
        };

        addHallCard(newHall);

        const newCard = hallCardsContainer.lastElementChild;
        newCard.scrollIntoView({behavior:'smooth', block:'start'});
        newCard.querySelector('.hall-name').focus();
    });

    /* ---------------------------------------
       HALL CARD ACTIONS
       All actions are scoped to their own card.
    --------------------------------------- */
    hallCardsContainer.addEventListener('click', function (event) {
        const card = event.target.closest('.hall-card');
        if (!card) return;

        if (event.target.closest('.remove-hall')) {
            Swal.fire({
                icon:'warning',
                title:'Remove this hall?',
                text:'All details, facilities, media and charges inside this hall card will be removed.',
                showCancelButton:true,
                confirmButtonText:'Yes, Remove',
                cancelButtonText:'Keep Hall',
                confirmButtonColor:'#dc3545',
                cancelButtonColor:'#6c757d'
            }).then(result => {
                if (result.isConfirmed) {
                    card.remove();
                    refreshHallCards();
                }
            });
        }

        if (event.target.closest('.add-facility')) {
            const container = card.querySelector('.facility-container');

            const wrapper = document.createElement('div');
            wrapper.innerHTML = facilityMarkup({
                name:'',
                type:'Other',
                capacity:'',
                area:'',
                status:'Available'
            }, card.dataset.hallId);

            container.appendChild(wrapper.firstElementChild);
        }

        if (event.target.closest('.remove-facility')) {
            event.target.closest('.facility-row').remove();
        }

        if (event.target.closest('.remove-image')) {
            event.target.closest('.gallery-item').remove();
        }
    });

    /* ---------------------------------------
       HALL NAME AND CHARGES UPDATES
    --------------------------------------- */
    hallCardsContainer.addEventListener('input', function (event) {
        const card = event.target.closest('.hall-card');
        if (!card) return;

        if (event.target.classList.contains('hall-name')) {
            refreshHallCards();
        }

        if (
            event.target.classList.contains('booking-fee') ||
            event.target.classList.contains('security-deposit') ||
            event.target.classList.contains('additional-charges')
        ) {
            calculateTotal(card);
        }
    });

    hallCardsContainer.addEventListener('change', function (event) {
        const card = event.target.closest('.hall-card');
        if (!card) return;

        if (event.target.classList.contains('gst-rate')) {
            calculateTotal(card);
        }

        if (event.target.classList.contains('hall-image-upload')) {
            const preview = card.querySelector('.gallery-preview');
            const files = Array.from(event.target.files || []);

            files.forEach(file => {
                if (!file.type.startsWith('image/')) return;

                const reader = new FileReader();

                reader.onload = function (e) {
                    const column = document.createElement('div');
                    column.className = 'col-6 col-md-4 col-lg-3 gallery-item';

                    const box = document.createElement('div');
                    box.className = 'media-preview-box';

                    const image = document.createElement('img');
                    image.src = e.target.result;
                    image.alt = file.name;

                    const info = document.createElement('div');
                    info.className = 'd-flex justify-content-between align-items-center gap-1 mt-2';

                    const name = document.createElement('span');
                    name.className = 'small-muted text-truncate';
                    name.textContent = file.name;

                    const remove = document.createElement('button');
                    remove.type = 'button';
                    remove.className = 'btn btn-sm btn-outline-danger remove-image';
                    remove.innerHTML = '<i class="bi bi-trash"></i>';

                    info.append(name, remove);
                    box.append(image, info);
                    column.appendChild(box);
                    preview.appendChild(column);
                };

                reader.readAsDataURL(file);
            });

            event.target.value = '';
        }
    });

    /* ---------------------------------------
       POLICY TEMPLATE
    --------------------------------------- */
    const policies = {
        standard:'Cancellation requests must be submitted in writing. Cancellations made 30 days or more before the event date are eligible for a 90% refund. Cancellations made 15 to 29 days before the event date are eligible for a 50% refund. Cancellations made less than 15 days before the event date are not eligible for a refund. Security deposit refunds are subject to inspection and clearance of the premises.',
        flexible:'Cancellation requests must be submitted in writing. Cancellations made 15 days or more before the event date are eligible for a full refund, subject to applicable administrative charges. Cancellations made 7 to 14 days before the event date are eligible for a 75% refund. Cancellations made less than 7 days before the event date may not be eligible for a refund.',
        strict:'All booking cancellations must be submitted in writing. Cancellations made 45 days or more before the event date are eligible for a 75% refund. Cancellations made 30 to 44 days before the event date are eligible for a 50% refund. Cancellations made less than 30 days before the event date are non-refundable. Security deposit refunds are subject to inspection.'
    };

    document.getElementById('policyTemplate').addEventListener('change', function () {
        if (policies[this.value]) {
            document.getElementById('cancellationPolicy').value = policies[this.value];
        }
    });

    document.getElementById('policyDocument').addEventListener('change', function () {
        document.getElementById('policyDocumentName').textContent =
            this.files.length ? 'Selected: ' + this.files[0].name : '';
    });

    document.getElementById('pinCode').addEventListener('input', function () {
        this.value = this.value.replace(/\D/g, '').slice(0, 6);
    });

    document.querySelectorAll('input[type="tel"]').forEach(input => {
        input.addEventListener('input', function () {
            this.value = this.value.replace(/\D/g, '').slice(0, 10);
        });
    });

    /* ---------------------------------------
       FRONTEND-ONLY UPDATE BUTTON
       No loader and no database submission.
    --------------------------------------- */
    document.getElementById('editCentreForm').addEventListener('submit', function (event) {
        event.preventDefault();

        if (!this.checkValidity()) {
            this.classList.add('was-validated');

            Swal.fire({
                icon:'warning',
                title:'Check Required Fields',
                text:'Please complete all required fields before updating.',
                confirmButtonColor:'#087b43'
            });

            const invalid = this.querySelector(':invalid');
            if (invalid) {
                invalid.scrollIntoView({behavior:'smooth', block:'center'});
                invalid.focus({preventScroll:true});
            }

            return;
        }

        if (!document.getElementById('cancellationPolicy').value.trim()) {
            Swal.fire({
                icon:'warning',
                title:'Cancellation Policy Required',
                text:'Please enter the cancellation policy.',
                confirmButtonColor:'#087b43'
            });
            return;
        }

        const hallCards = document.querySelectorAll('.hall-card');

        if (hallCards.length === 0) {
            Swal.fire({
                icon:'warning',
                title:'Add at Least One Hall',
                text:'The centre must contain at least one hall.',
                confirmButtonColor:'#087b43'
            });
            return;
        }

        Swal.fire({
            icon:'question',
            title:'Update Centre Details?',
            text:'Are you sure you want to update the centre details?',
            showCancelButton:true,
            confirmButtonText:'Yes, Update',
            cancelButtonText:'Review Again',
            confirmButtonColor:'#087b43',
            cancelButtonColor:'#6c757d',
            reverseButtons:true
        }).then(result => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon:'success',
                    title:'Centre Details Updated!',
                    text:'Frontend demo update completed successfully.',
                    confirmButtonText:'OK',
                    confirmButtonColor:'#087b43'
                });
            }
        });
    });

});
</script>
@endsection
