@extends('conventions.layouts.app')

@section('title') Add New Conventional Centre @endsection

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<!-- Leaflet CSS for Map Picker -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<!-- Summernote Lite CSS (WYSIWYG Rich Editor) -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">

<style>
    .section-card {
        border-radius: 14px;
        border: 1px solid rgba(0,0,0,0.07);
        box-shadow: 0 4px 16px rgba(0,0,0,0.03);
        margin-bottom: 1.5rem;
        background: #ffffff;
    }
    .section-header {
        background-color: #fafbfe;
        border-bottom: 1px solid #f1f3f9;
        padding: 1rem 1.25rem;
        border-top-left-radius: 14px;
        border-top-right-radius: 14px;
    }
    .step-badge {
        width: 28px;
        height: 28px;
        border-radius: 8px;
        background-color: #4338ca;
        color: #ffffff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.85rem;
        margin-right: 0.5rem;
    }
    #mapPicker {
        height: 340px;
        width: 100%;
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        z-index: 1;
    }
    .facility-row {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 1rem;
        margin-bottom: 0.75rem;
        transition: all 0.2s ease;
    }
    .facility-row:hover {
        background: #ffffff;
        border-color: #cbd5e1;
        box-shadow: 0 4px 12px rgba(0,0,0,0.04);
    }
    .media-preview-box {
        width: 110px;
        height: 80px;
        border-radius: 8px;
        object-fit: cover;
        border: 1px solid #cbd5e1;
    }
    .upload-zone {
        border: 2px dashed #cbd5e1;
        border-radius: 12px;
        padding: 2rem;
        text-align: center;
        background-color: #f8fafc;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .upload-zone:hover {
        background-color: #f1f5f9;
        border-color: #4338ca;
    }
    /* Document Upload Card */
    .doc-upload-card {
        border: 2px dashed #cbd5e1;
        border-radius: 12px;
        background: #f8fafc;
        padding: 1.25rem;
        transition: all 0.2s ease;
    }
    .doc-upload-card:hover {
        border-color: #4338ca;
        background: #f1f5f9;
    }
    /* Summernote Styling Integration */
    .note-editor.note-frame {
        border: 1px solid #cbd5e1 !important;
        border-radius: 10px !important;
        box-shadow: 0 1px 3px rgba(0,0,0,0.02) !important;
        overflow: hidden;
    }
    .note-editor.note-frame .note-toolbar {
        background-color: #f8fafc !important;
        border-bottom: 1px solid #e2e8f0 !important;
        padding: 8px 10px !important;
    }
    .note-btn {
        background: #ffffff !important;
        border: 1px solid #e2e8f0 !important;
        color: #334155 !important;
        border-radius: 6px !important;
        font-size: 0.82rem !important;
        padding: 4px 9px !important;
        margin: 1px !important;
        transition: all 0.15s ease !important;
    }
    .note-btn:hover {
        background: #f1f5f9 !important;
        color: #4338ca !important;
        border-color: #cbd5e1 !important;
    }
    .note-btn.active {
        background: #4338ca !important;
        color: #ffffff !important;
        border-color: #4338ca !important;
    }
    .note-editor .note-editable {
        font-family: 'Roboto', sans-serif !important;
        font-size: 0.92rem !important;
        color: #1e293b !important;
        line-height: 1.6 !important;
        background: #ffffff !important;
        min-height: 220px !important;
        padding: 1rem !important;
    }
    .note-statusbar {
        background: #f8fafc !important;
        border-top: 1px solid #e2e8f0 !important;
    }
    .btn-xs {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
        border-radius: 0.25rem;
    }
    .form-control:focus, .form-select:focus {
        border-color: #4338ca;
        box-shadow: 0 0 0 0.2rem rgba(67, 56, 202, 0.15);
    }
    /* Normal Bootstrap Validation Enhancements */
    .was-validated .form-control:invalid,
    .was-validated .form-select:invalid {
        border-color: #dc3545 !important;
        padding-right: calc(1.5em + 0.75rem);
        background-repeat: no-repeat;
        background-position: right calc(0.375em + 0.1875rem) center;
        background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
    }
    .was-validated .form-control:valid,
    .was-validated .form-select:valid {
        border-color: #198754 !important;
    }
    .invalid-feedback {
        font-size: 0.8rem;
        font-weight: 500;
        color: #dc3545;
        margin-top: 0.3rem;
    }
    .btn-submit-main {
        background: #4338ca;
        border-color: #4338ca;
        color: #ffffff;
        transition: all 0.2s ease;
    }
    .btn-submit-main:hover {
        background: #3730a3;
        border-color: #3730a3;
        color: #ffffff;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(67, 56, 202, 0.3);
    }

    .hall-setup-box {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 1rem;
        margin-bottom: 1rem;
    }
    .hall-name-row {
        display: flex;
        align-items: center;
        gap: .75rem;
        margin-bottom: .65rem;
    }
    .hall-name-row:last-child { margin-bottom: 0; }
    .hall-wise-panel { display: none; }
    .hall-wise-panel.active { display: block; }
    .hall-selector-wrap {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: .85rem 1rem;
        margin-bottom: 1rem;
    }
    .facility-hall-select { min-width: 140px; }

</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Breadcrumb & Top Bar -->
   <div class="page-title py-3">
        <div class="row align-items-center">
            <div class="col-12 col-sm-6">
                <h4 class="fw-bold mb-1 text-dark">
                     Add New Conventional Centre 
                </h4>
                
            </div>
            <div class="col-12 col-sm-6 text-sm-end mt-2 mt-sm-0">
                <ol class="breadcrumb justify-content-sm-end mb-0 bg-transparent p-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" target="_blank"><i class="fa fa-home"></i> Frontend</a></li>
                    <li class="breadcrumb-item active">Add New Conventional Centre</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <form id="centreForm"
          action="{{ route('conventions.venue-lists.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="needs-validation"
          novalidate>
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Please correct the following:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="row">
            <!-- Full Form Column -->
            <div class="col-12">

                <!-- 1. Centre Basic Identification -->
                <div class="card section-card">
                    <div class="section-header d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <span class="step-badge">1</span>
                            <h6 class="fw-bold mb-0 text-dark">Basic Centre Information</h6>
                        </div>
                        <span class="badge bg-light text-primary border"><i class="bi bi-info-circle me-1"></i> System Auto-Generated ID</span>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <!-- Centre ID (Auto generated) -->
                            <div class="col-12 col-md-4">
                                <label class="form-label fw-semibold text-dark small">Centre ID <span class="badge bg-secondary ms-1">Auto-Generated</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-fingerprint"></i></span>
                                    <input type="text" name="centre_id" id="centreIdInput" class="form-control bg-light font-monospace fw-bold text-primary" value="{{ Auth::guard('convention')->user()->venue_id ?? 'Will be assigned on save' }}" readonly>
                                </div>
                                <small class="text-muted" style="font-size:0.75rem;">Unique civic venue identifier.</small>
                            </div>
                            <!-- Centre Type -->
                            <div class="col-12 col-md-4">
                                <label class="form-label fw-semibold text-dark small">Centre Type <span class="text-danger">*</span></label>
                                <select name="type" class="form-select" required id="centreTypeSelect">
                                    <option value="" disabled {{ old('type') ? '' : 'selected' }}>Select Centre Type...</option>
                                    <option value="Community Hall" {{ old('type') === 'Community Hall' ? 'selected' : '' }}>Community Hall</option>
                                    <option value="Convention Hall" {{ old('type') === 'Convention Hall' ? 'selected' : '' }}>Convention Hall</option>
                                    <option value="Kalyana Mantapa / Marriage Hall" {{ old('type') === 'Kalyana Mantapa / Marriage Hall' ? 'selected' : '' }}>Kalyana Mantapa / Marriage Hall</option>
                                    <option value="Auditorium" {{ old('type') === 'Auditorium' ? 'selected' : '' }}>Auditorium</option>
                                    <option value="Function Hall" {{ old('type') === 'Function Hall' ? 'selected' : '' }}>Function Hall</option>
                                    <option value="Banquet Hall" {{ old('type') === 'Banquet Hall' ? 'selected' : '' }}>Banquet Hall</option>
                                    <option value="Multipurpose Hall" {{ old('type') === 'Multipurpose Hall' ? 'selected' : '' }}>Multipurpose Hall</option>
                                    <option value="Meeting / Conference Hall" {{ old('type') === 'Meeting / Conference Hall' ? 'selected' : '' }}>Meeting / Conference Hall</option>
                                    <option value="Cultural Centre" {{ old('type') === 'Cultural Centre' ? 'selected' : '' }}>Cultural Centre</option>
                                    <option value="Sports / Recreation Centre" {{ old('type') === 'Sports / Recreation Centre' ? 'selected' : '' }}>Sports / Recreation Centre</option>
                                </select>
                                <div class="invalid-feedback">Please select the centre type.</div>
                            </div>

                            <!-- Centre Name -->
                            <div class="col-12">
                                <label class="form-label fw-semibold text-dark small">Centre Name <span class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-building"></i></span>
                                    <input type="text" name="name" id="centreNameInput" value="{{ old('name') }}" class="form-control border-start-0 ps-0" placeholder="e.g. Sri Krishna Grand Kalyana Mantapa & Cultural Centre" required minlength="3">
                                    <div class="invalid-feedback">Please enter the conventional centre name (at least 3 characters).</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. Location Details & Geo Coordinates -->
                <div class="card section-card">
                    <div class="section-header d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <span class="step-badge">2</span>
                            <h6 class="fw-bold mb-0 text-dark">Location &amp; Geo-Coordinates</h6>
                        </div>
                        <span class="badge bg-light text-primary border"><i class="bi bi-geo-alt-fill text-danger me-1"></i> Interactive GIS Map</span>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <!-- Address -->
                            <div class="col-12">
                                <label class="form-label fw-semibold text-dark small">Address (Street / Building / Landmark) <span class="text-danger">*</span></label>
                                <textarea name="address" id="addressInput" class="form-control" rows="2" placeholder="Full civic physical street address, building number, road, nearby landmark..." required minlength="5">{{ old('address') }}</textarea>
                                <div class="invalid-feedback">Please enter the complete physical address.</div>
                            </div>

                            <!-- PIN Code -->
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold text-dark small">PIN Code <span class="text-danger">*</span></label>
                                <input type="text" name="pin_code" id="pinCodeInput" value="{{ old('pin_code') }}" class="form-control" placeholder="e.g. 560102" pattern="[0-9]{6}" maxlength="6" required>
                                <div class="invalid-feedback">Please enter a valid 6-digit postal PIN code.</div>
                            </div>

                            <!-- Geo Coordinates (Lat / Long) Selection & Map -->
                            <div class="col-12">
                                <div class="p-3 rounded-3 border bg-light">
                                    <!-- Map Top Bar: Fetch Location Button on Top of the Map -->
                                    <div class="d-flex align-items-center justify-content-between mb-2 flex-wrap gap-2">
                                        <div>
                                            <span class="fw-semibold text-dark small"><i class="bi bi-geo-alt-fill text-danger me-1"></i> Interactive Geo Location Picker</span>
                                            <small class="text-muted d-block"><i class="bi bi-info-circle me-1"></i> Click anywhere on the map or drag the pin to set venue location.</small>
                                        </div>
                                        <button type="button" class="btn btn-primary btn-sm px-3 shadow-sm d-inline-flex align-items-center gap-2" id="btnFetchLocation">
                                            <i class="bi bi-crosshair2 fs-6"></i>
                                            <span class="fw-semibold" id="fetchLocationBtnText">Fetch Location</span>
                                        </button>
                                    </div>

                                    <!-- Leaflet Map Container -->
                                    <div id="mapPicker" class="mb-2 shadow-xs"></div>

                                    <!-- Hidden Inputs for Latitude and Longitude (Input fields below map are hidden per user requirement) -->
                                    <input type="hidden" name="latitude" id="latitudeInput" value="{{ old('latitude', '12.9716') }}">
                                    <input type="hidden" name="longitude" id="longitudeInput" value="{{ old('longitude', '77.5946') }}">

                                    <!-- Discreet Coordinate Status Chip & Guidance (No input fields below) -->
                                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 pt-1 px-1">
                                        <div class="d-inline-flex align-items-center gap-2">
                                            <span class="badge bg-white border text-secondary shadow-xs small py-1 px-2 d-inline-flex align-items-center gap-1">
                                                <i class="bi bi-pin-map-fill text-danger"></i> Selected GPS:
                                                <span id="coordsDisplay" class="font-monospace text-dark fw-bold">{{ old('latitude', '12.9716') }}, {{ old('longitude', '77.5946') }}</span>
                                            </span>
                                            <span id="locationFetchStatus" class="small text-muted fst-italic"></span>
                                        </div>
                                        <small class="text-muted"><i class="bi bi-hand-index me-1"></i> You can drag the red map pin or click anywhere to adjust.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3. Contact Details -->
                <div class="card section-card">
                    <div class="section-header d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <span class="step-badge">3</span>
                            <h6 class="fw-bold mb-0 text-dark">Contact Details</h6>
                        </div>
                        <span class="badge bg-light text-muted border">In-charge Official</span>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-12 col-md-4">
                                <label class="form-label fw-semibold text-dark small">Centre In-charge Name <span class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-person"></i></span>
                                    <input type="text" name="contact_name" id="contactNameInput" value="{{ old('contact_name') }}" class="form-control border-start-0 ps-0" placeholder="e.g. Srikanth Sharma" required minlength="3">
                                    <div class="invalid-feedback">Please enter the in-charge name.</div>
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label fw-semibold text-dark small">Mobile Number <span class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-telephone"></i></span>
                                    <input type="tel" name="contact_mobile" id="contactMobileInput" value="{{ old('contact_mobile') }}" class="form-control border-start-0 ps-0" placeholder="e.g. 9876543210" pattern="[0-9]{10}" maxlength="10" required>
                                    <div class="invalid-feedback">Please enter a valid 10-digit mobile number.</div>
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label fw-semibold text-dark small">Email ID <span class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-envelope"></i></span>
                                    <input type="email" name="contact_email" id="contactEmailInput" value="{{ old('contact_email') }}" class="form-control border-start-0 ps-0" placeholder="e.g. incharge@venue.gov.in" required>
                                    <div class="invalid-feedback">Please enter a valid email address.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 4. Halls & Facility Details -->
                <div class="card section-card">
                    <div class="section-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <div class="d-flex align-items-center">
                            <span class="step-badge">4</span>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">Halls &amp; Facility Details</h6>
                                <small class="text-muted">Create separately bookable halls and assign each facility to its hall</small>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1 shadow-sm" id="btnAddFacility">
                            <i class="bi bi-plus-circle"></i> Add Facility
                        </button>
                    </div>
                    <div class="card-body p-4">
                        <div class="hall-setup-box">
                            <div class="row g-3 align-items-end">
                                <div class="col-12 col-md-4">
                                    <label class="form-label fw-semibold text-dark small">Number of Halls <span class="text-danger">*</span></label>
                                    <input type="number" min="1" max="30"
                                           value="{{ max(1, count(old('halls', []))) }}"
                                           id="hallCountInput" class="form-control" required>
                                    <small class="text-muted">Enter how many separately bookable halls this centre has.</small>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <label class="form-label fw-semibold text-dark small mb-0">Hall Names</label>
                                        <span class="badge bg-primary" id="hallCountBadge">1 Hall</span>
                                    </div>
                                    <div id="hallNamesContainer"></div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark small">Additional Facilities / Sub-units</label>
                            <small class="text-muted d-block mb-2">Add dining rooms, kitchens, dressing rooms, parking areas, auditoriums, etc., and assign each to a hall.</small>
                        </div>
                        <div id="facilitiesContainer"></div>

                        <div class="mt-3 text-center">
                            <button type="button" class="btn btn-outline-primary btn-sm px-4" id="btnAddFacilityBottom">
                                <i class="bi bi-plus-lg me-1"></i> Add Another Facility Sub-unit
                            </button>
                        </div>
                    </div>
                </div>

                <!-- 5. Hall-wise Media Gallery -->
                <div class="card section-card">
                    <div class="section-header d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <span class="step-badge">5</span>
                            <h6 class="fw-bold mb-0 text-dark">Hall-wise Media Gallery (Images &amp; Video)</h6>
                        </div>
                        <span class="badge bg-light text-muted border">Separate media for each hall</span>
                    </div>
                    <div class="card-body p-4">
                        <div class="hall-selector-wrap">
                            <label class="form-label fw-semibold text-dark small mb-1">Select Hall</label>
                            <select id="mediaHallSelect" class="form-select"></select>
                            <small class="text-muted">Upload photographs and add the walkthrough video for the selected hall only.</small>
                        </div>
                        <div id="mediaHallPanels"></div>
                    </div>
                </div>

                <!-- 6. Hall-wise Charges & Tariffs -->
                <div class="card section-card">
                    <div class="section-header d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <span class="step-badge">6</span>
                            <h6 class="fw-bold mb-0 text-dark">Hall-wise Charges</h6>
                        </div>
                        <span class="badge bg-light text-success border"><i class="bi bi-currency-rupee"></i> INR Pricing</span>
                    </div>
                    <div class="card-body p-4">
                        <div class="hall-selector-wrap">
                            <label class="form-label fw-semibold text-dark small mb-1">Select Hall</label>
                            <select id="chargesHallSelect" class="form-select"></select>
                            <small class="text-muted">Enter booking fee, deposit and additional charges for each hall.</small>
                        </div>
                        <div id="chargesHallPanels"></div>
                    </div>
                </div>

                <!-- 7. Booking Rules & Policies -->
                <div class="card section-card">
                    <div class="section-header d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <span class="step-badge">7</span>
                            <h6 class="fw-bold mb-0 text-dark">Booking Rules &amp; Cancellation Policy</h6>
                        </div>
                        <span class="badge bg-light text-dark border"><i class="bi bi-shield-lock me-1"></i> Governance</span>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <!-- Minimum Advance Booking Period -->
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold text-dark small">Minimum Advance Booking Period (Days) <span class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-calendar-event"></i></span>
                                    <input type="number" name="min_advance_days" id="minAdvanceDaysInput" class="form-control border-start-0 ps-0" placeholder="e.g. 15" min="1" value="{{ old('min_advance_days') }}" required>
                                    <span class="input-group-text bg-light text-muted">Days prior</span>
                                    <div class="invalid-feedback">Please enter minimum advance booking days (at least 1).</div>
                                </div>
                            </div>

                            <!-- Maximum Booking Duration -->
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold text-dark small">Maximum Booking Duration <span class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-clock-history"></i></span>
                                    <select name="max_booking_duration" id="maxDurationSelect" class="form-select border-start-0 ps-0" required>
                                        <option value="" disabled {{ old('max_booking_duration') ? '' : 'selected' }}>Select max duration...</option>
                                        <option value="1 Day" {{ old('max_booking_duration') === '1 Day' ? 'selected' : '' }}>1 Day (Single event slot)</option>
                                        <option value="2 Days" {{ old('max_booking_duration') === '2 Days' ? 'selected' : '' }}>2 Days</option>
                                        <option value="3 Days" {{ old('max_booking_duration') === '3 Days' ? 'selected' : '' }}>3 Days (Standard Wedding / Muhurtham)</option>
                                        <option value="5 Days" {{ old('max_booking_duration') === '5 Days' ? 'selected' : '' }}>5 Days</option>
                                        <option value="7 Days" {{ old('max_booking_duration') === '7 Days' ? 'selected' : '' }}>7 Days (Full week exhibition)</option>
                                    </select>
                                    <div class="invalid-feedback">Please select maximum booking duration.</div>
                                </div>
                            </div>

                            <!-- Cancellation Rules & Refund Policy (Summernote WYSIWYG) -->
                            <div class="col-12">
                                <div class="d-flex align-items-center justify-content-between mb-2 flex-wrap gap-2">
                                    <div>
                                        <label class="form-label fw-semibold text-dark small mb-0">Cancellation Rules &amp; Refund Policy <span class="text-danger">*</span></label>
                                        
                                    </div>
                                   
                                </div>

                                <textarea name="cancellation_rules" id="cancellationRulesInput" class="form-control" rows="5">{{ old('cancellation_rules') }}</textarea>
                                <div id="cancellationRulesFeedback" class="invalid-feedback" style="display:none;">Please specify cancellation rules and refund policy.</div>
                            </div>

                            <!-- Optional Document Upload Field -->
                            <div class="col-12 mt-2">
                                <label class="form-label fw-semibold text-dark small mb-1">
                                    <i class="bi bi-file-earmark-arrow-up text-primary me-1"></i> Upload Supporting Document
                                    <span class="badge bg-light text-secondary border ms-1 fw-normal">Optional</span>
                                </label>
                                <div class="doc-upload-card">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="rounded-circle bg-primary-subtle text-primary p-3 d-inline-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                                <i class="bi bi-file-earmark-pdf fs-4"></i>
                                            </div>
                                            <div>
                                                <h6 class="fw-bold mb-1 text-dark small">Attach Venue Policy / Bylaws / NOC Document</h6>
                                                <p class="text-muted small mb-0">Upload official gazette circular, government tariff order, or cancellation guideline document.</p>
                                                <span class="text-muted" style="font-size:0.75rem;">Supported formats: PDF, DOC, DOCX, JPG, PNG (Max 10MB)</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <input type="file" name="policy_document" id="policyDocumentInput" class="d-none" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" onchange="handleDocUpload(event)">
                                            <button type="button" class="btn btn-outline-primary btn-sm px-3 shadow-xs" onclick="document.getElementById('policyDocumentInput').click()">
                                                <i class="bi bi-folder2-open me-1"></i> Browse Document
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Document Preview Box (Hidden until a file is selected) -->
                                    <div id="docPreviewContainer" class="mt-3 pt-3 border-top d-none">
                                        <div class="d-flex align-items-center justify-content-between bg-white border rounded p-2 px-3 shadow-xs">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="bi bi-file-earmark-check-fill text-success fs-5" id="docTypeIcon"></i>
                                                <div>
                                                    <span class="fw-bold text-dark small d-block" id="docFileName">Filename.pdf</span>
                                                    <span class="text-muted small" id="docFileSize" style="font-size:0.75rem;">0 KB</span>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-danger py-1 px-2" onclick="removeUploadedDoc()" title="Remove document">
                                                <i class="bi bi-trash3 me-1"></i> Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <!-- 8. Hall-wise Review Before Submit -->
                <div class="card section-card" id="hallReviewSection">
                    <div class="section-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <div class="d-flex align-items-center">
                            <span class="step-badge">8</span>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">Review Hall Details Before Submit</h6>
                                <small class="text-muted">Select each hall to verify its facilities, gallery and charges.</small>
                            </div>
                        </div>
                        <span class="badge bg-success-subtle text-success border">Live Preview</span>
                    </div>
                    <div class="card-body p-4">
                        <div class="hall-selector-wrap">
                            <label class="form-label fw-semibold text-dark small mb-1">View Details For Hall</label>
                            <select id="reviewHallSelect" class="form-select"></select>
                        </div>
                        <div id="hallReviewContent" class="mt-3" aria-live="polite"></div>
                    </div>
                </div>

                <!-- Bottom Action: Only Submit Button (Small & Centered in the middle) -->
                <div class="d-flex justify-content-center my-4 pb-3">
                    <button type="submit" id="btnSubmitBottom" class="btn btn-submit-main btn-sm px-4 py-2 fw-semibold shadow-sm d-inline-flex align-items-center gap-2">
                        <i class="bi bi-check-circle-fill"></i> Submit
                    </button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
<!-- Leaflet JS for Map Picker -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Summernote Lite JS (WYSIWYG Rich Editor) -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

<script>
    // Old input is restored after a validation failure (uploaded files cannot be restored by browsers).
    if (typeof Swal === 'undefined') {
        window.Swal = {
            fire: function (options) {
                const message = (options.title ? options.title + '\n\n' : '') +
                    (options.text || (options.html ? options.html.replace(/<[^>]*>/g, ' ') : ''));
                alert(message);
                return Promise.resolve({ isConfirmed: true });
            }
        };
    }

    const oldHallValues = @json(old('halls', []));
    const oldFacilityValues = @json(old('facilities', []));

    let map;
    let marker;
    let facilityIndex = 0;

    const facilityTypes = [
        'Main Auditorium / Hall',
        'Dining Area',
        'Conference Room',
        'Banquet / Function Hall',
        'Dressing / Rest Rooms',
        'Kitchen',
        'Open Lawn / Outdoor',
        'Parking Area'
    ];

    const facilityStatuses = [
        'Available',
        'Under Maintenance',
        'Booked',
        'Inactive'
    ];

    const policyTemplates = {
        standard: `<p><strong>Cancellation Rules &amp; Refund Guidelines:</strong></p>
<ul>
    <li><strong>30+ Days Prior to Event:</strong> 100% refund of venue booking charges.</li>
    <li><strong>15 to 30 Days Prior:</strong> 50% refund of venue booking charges.</li>
    <li><strong>Less than 15 Days Prior:</strong> Non-refundable.</li>
    <li><strong>Security Deposit:</strong> 100% refundable following site clearance.</li>
</ul>`,
        flexible: `<p><strong>Flexible Cancellation Policy:</strong></p>
<ul>
    <li>100% refund or free date reschedule up to 7 days before event.</li>
    <li>50% refund between 3 to 7 days before event.</li>
    <li>Security deposit is 100% refundable.</li>
</ul>`,
        strict: `<p><strong>Strict / Peak Season Policy:</strong></p>
<ul>
    <li>Prior to 30 days: 50% refund of booking charges.</li>
    <li>Within 30 days: No refund applicable.</li>
    <li>Security deposit is refundable after utility verification.</li>
</ul>`
    };

    function escapeHtml(value) {
        return String(value ?? '').replace(/[&<>"']/g, function (char) {
            return {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            }[char];
        });
    }

    function loadPolicyTemplate(type) {
        if (policyTemplates[type]) {
            $('#cancellationRulesInput').summernote('code', policyTemplates[type]);
            const feedback = document.getElementById('cancellationRulesFeedback');
            if (feedback) feedback.style.display = 'none';
            const editor = document.querySelector('.note-editor');
            if (editor) editor.style.borderColor = '#cbd5e1';
        }
    }

    function clearPolicyEditor() {
        $('#cancellationRulesInput').summernote('code', '');
    }

    function initMap() {
        const defaultLat = parseFloat(document.getElementById('latitudeInput').value) || 12.9716;
        const defaultLng = parseFloat(document.getElementById('longitudeInput').value) || 77.5946;

        map = L.map('mapPicker').setView([defaultLat, defaultLng], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        marker = L.marker([defaultLat, defaultLng], { draggable: true }).addTo(map);

        marker.on('dragend', function () {
            const position = marker.getLatLng();
            updateMapCoords(position.lat, position.lng);
        });

        map.on('click', function (event) {
            updateMapCoords(event.latlng.lat, event.latlng.lng);
        });

        updateMapCoords(defaultLat, defaultLng);
        setTimeout(() => map.invalidateSize(), 200);
    }

    function updateMapCoords(lat, lng) {
        lat = Number(parseFloat(lat).toFixed(6));
        lng = Number(parseFloat(lng).toFixed(6));

        const latInput = document.getElementById('latitudeInput');
        const lngInput = document.getElementById('longitudeInput');
        const display = document.getElementById('coordsDisplay');

        if (latInput) latInput.value = lat.toFixed(6);
        if (lngInput) lngInput.value = lng.toFixed(6);
        if (display) display.textContent = `${lat.toFixed(6)}, ${lng.toFixed(6)}`;
        if (marker) marker.setLatLng([lat, lng]);
    }

    function getHallNames() {
        return Array.from(document.querySelectorAll('.hall-name-input')).map((input, index) => {
            return input.value.trim() || `Hall ${index + 1}`;
        });
    }

    function getInitialHallNames() {
        const keys = Object.keys(oldHallValues || {}).sort((a, b) => Number(a) - Number(b));
        if (keys.length) {
            return keys.map((key, index) => oldHallValues[key]?.name || `Hall ${index + 1}`);
        }
        return ['Main Hall'];
    }

    function renderHallManagement() {
        const countInput = document.getElementById('hallCountInput');
        let count = parseInt(countInput.value, 10);
        if (!Number.isFinite(count) || count < 1) count = 1;
        if (count > 30) count = 30;
        countInput.value = count;

        let previousNames = getHallNames();
        if (!previousNames.length) previousNames = getInitialHallNames();

        const namesContainer = document.getElementById('hallNamesContainer');
        namesContainer.innerHTML = '';

        for (let i = 0; i < count; i++) {
            const oldName = oldHallValues?.[i]?.name || '';
            const name = previousNames[i] || oldName || (i === 0 ? 'Main Hall' : '');
            const row = document.createElement('div');
            row.className = 'hall-name-row';
            row.innerHTML = `
                <span class="badge bg-primary text-nowrap">Hall ${i + 1}</span>
                <input type="text" name="halls[${i}][name]"
                       class="form-control form-control-sm hall-name-input"
                       placeholder="Enter Hall ${i + 1} name"
                       value="${escapeHtml(name)}" required>
            `;
            namesContainer.appendChild(row);
        }

        document.getElementById('hallCountBadge').textContent = `${count} ${count === 1 ? 'Hall' : 'Halls'}`;

        const names = getHallNames();
        renderHallSelectors(names);
        renderHallPanels(names);
        renderHallReview();
    }

    function renderHallSelectors(names) {
        ['mediaHallSelect', 'chargesHallSelect', 'reviewHallSelect'].forEach(id => {
            const select = document.getElementById(id);
            if (!select) return;
            const previous = select.value;
            select.innerHTML = names.map((name, index) =>
                `<option value="${index}">Hall ${index + 1} - ${escapeHtml(name)}</option>`
            ).join('');
            select.value = previous && Number(previous) < names.length ? previous : '0';
        });

        document.querySelectorAll('.facility-hall-select').forEach(select => {
            const previous = select.value;
            select.innerHTML = names.map((name, index) =>
                `<option value="${index}">Hall ${index + 1} - ${escapeHtml(name)}</option>`
            ).join('');
            if (previous !== '' && Number(previous) < names.length) select.value = previous;
        });
    }

    function renderHallPanels(names) {
        const mediaContainer = document.getElementById('mediaHallPanels');
        const chargesContainer = document.getElementById('chargesHallPanels');
        const oldMedia = new Map();
        const oldCharges = new Map();

        mediaContainer.querySelectorAll('.hall-wise-panel').forEach(panel => oldMedia.set(panel.dataset.hall, panel));
        chargesContainer.querySelectorAll('.hall-wise-panel').forEach(panel => oldCharges.set(panel.dataset.hall, panel));

        mediaContainer.innerHTML = '';
        chargesContainer.innerHTML = '';

        names.forEach((name, index) => {
            const mediaPanel = oldMedia.get(String(index)) || createMediaPanel(index);
            mediaPanel.querySelector('.hall-panel-title').textContent = `Media for ${name}`;
            mediaContainer.appendChild(mediaPanel);

            const chargesPanel = oldCharges.get(String(index)) || createChargesPanel(index);
            chargesPanel.querySelector('.hall-panel-title').textContent = `Charges for ${name}`;
            chargesContainer.appendChild(chargesPanel);
        });

        showHallPanel('mediaHallPanels', document.getElementById('mediaHallSelect').value || '0');
        showHallPanel('chargesHallPanels', document.getElementById('chargesHallSelect').value || '0');
    }

    function createMediaPanel(index) {
        const panel = document.createElement('div');
        panel.className = 'hall-wise-panel';
        panel.dataset.hall = index;
        panel.innerHTML = `
            <h6 class="hall-panel-title fw-bold text-dark mb-3"></h6>
            <label class="form-label fw-semibold text-dark small mb-2">Hall Photographs / Gallery Images</label>
            <div class="upload-zone mb-3" onclick="this.querySelector('input').click()">
                <i class="bi bi-cloud-arrow-up display-6 text-primary mb-2 d-block"></i>
                <h6 class="fw-bold mb-1">Drag &amp; Drop Images or <span class="text-primary text-decoration-underline">Browse Files</span></h6>
                <p class="text-muted small mb-0">Supports JPG, PNG, WEBP up to 10MB each (Multiple photos allowed)</p>
                <input type="file" id="hallImages_${index}" name="halls[${index}][gallery_images][]"
                       class="d-none hall-gallery-input" data-hall="${index}"
                       multiple accept="image/jpeg,image/png,image/webp" onchange="previewImages(event)">
            </div>
            <div class="d-flex flex-wrap gap-2 mb-3 images-preview-container">
                <div class="text-muted small py-2 no-images-notice"><i class="bi bi-images me-1"></i> No images uploaded for this hall yet.</div>
            </div>
            <hr class="my-3">
            <label class="form-label fw-semibold text-dark small mb-2">Hall Walkthrough / Promo Video</label>
            <div class="row g-3">
                <div class="col-12 col-md-7">
                    <label class="form-label small text-muted">Video Embed Link (YouTube / Vimeo / CDN Stream)</label>
                    <input type="url" name="halls[${index}][video_url]" class="form-control hall-video-url"
                           value="${escapeHtml(oldHallValues?.[index]?.video_url || '')}"
                           placeholder="https://www.youtube.com/watch?v=...">
                </div>
                <div class="col-12 col-md-5">
                    <label class="form-label small text-muted">Or Upload Video File (MP4, Max 50MB)</label>
                    <input type="file" name="halls[${index}][video_file]" class="form-control hall-video-file"
                           accept="video/mp4,video/webm">
                </div>
            </div>
        `;
        return panel;
    }

    function createChargesPanel(index) {
        const data = oldHallValues?.[index] || {};
        const panel = document.createElement('div');
        panel.className = 'hall-wise-panel';
        panel.dataset.hall = index;
        panel.innerHTML = `
            <h6 class="hall-panel-title fw-bold text-dark mb-3"></h6>
            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <label class="form-label fw-semibold text-dark small">Base Booking Fee (₹ / per slot or day) <span class="text-danger">*</span></label>
                    <div class="input-group"><span class="input-group-text">₹</span>
                        <input type="number" name="halls[${index}][booking_fee]" class="form-control hall-booking-fee"
                               placeholder="e.g. 50000" min="0" step="0.01" value="${escapeHtml(data.booking_fee ?? '0')}">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label fw-semibold text-dark small">Security Deposit (₹ Refundable) <span class="text-danger">*</span></label>
                    <div class="input-group"><span class="input-group-text">₹</span>
                        <input type="number" name="halls[${index}][security_deposit]" class="form-control hall-security-deposit"
                               placeholder="e.g. 20000" min="0" step="0.01" value="${escapeHtml(data.security_deposit ?? '0')}">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label fw-semibold text-dark small">Additional Charges (₹ Cleaning, AC, Generator, Sound) <span class="text-danger">*</span></label>
                    <div class="input-group"><span class="input-group-text">₹</span>
                        <input type="number" name="halls[${index}][additional_charges]" class="form-control hall-additional-charges"
                               placeholder="e.g. 5000" min="0" step="0.01" value="${escapeHtml(data.additional_charges ?? '0')}">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label fw-semibold text-dark small">GST Rate (%) <span class="text-danger">*</span></label>
                    <select name="halls[${index}][gst_percentage]" class="form-select hall-gst-select">
                        <option value="18" ${(String(data.gst_percentage ?? '18') === '18') ? 'selected' : ''}>18% (Standard GST)</option>
                        <option value="12" ${(String(data.gst_percentage ?? '') === '12') ? 'selected' : ''}>12% (Concessional)</option>
                        <option value="5" ${(String(data.gst_percentage ?? '') === '5') ? 'selected' : ''}>5% (Minimal)</option>
                        <option value="0" ${(String(data.gst_percentage ?? '') === '0') ? 'selected' : ''}>0% (Exempted / Non-Commercial)</option>
                    </select>
                </div>
            </div>
        `;
        return panel;
    }

    function createFacilityRow(index, data = {}) {
        const row = document.createElement('div');
        row.className = 'facility-row';
        row.id = `facilityRow${index}`;

        const typeOptions = facilityTypes.map((type, optionIndex) =>
            `<option value="${escapeHtml(type)}" ${String(data.type || (optionIndex === 0 ? facilityTypes[0] : '')) === type ? 'selected' : ''}>${escapeHtml(type)}</option>`
        ).join('');

        const statusOptions = facilityStatuses.map((status, optionIndex) =>
            `<option value="${escapeHtml(status)}" ${String(data.status || 'Available') === status ? 'selected' : ''}>${escapeHtml(status)}</option>`
        ).join('');

        row.innerHTML = `
            <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="badge bg-primary facility-index-badge">Facility #${index + 1}</span>
                <button type="button" class="btn btn-sm btn-outline-danger btn-remove-facility" title="Remove Facility" style="padding: 2px 8px;">
                    <i class="bi bi-trash"></i> Remove
                </button>
            </div>
            <div class="row g-2">
                <div class="col-12 col-md-2">
                    <label class="form-label small text-muted mb-1">Belongs to Hall <span class="text-danger">*</span></label>
                    <select name="facilities[${index}][hall_index]" class="form-select form-select-sm facility-hall-select">
                        <option value="0">Hall 1</option>
                    </select>
                </div>
                <div class="col-12 col-md-3">
                    <label class="form-label small text-muted mb-1">Facility Name <span class="text-danger">*</span></label>
                    <input type="text" name="facilities[${index}][name]" class="form-control form-control-sm"
                           placeholder="e.g. Main Auditorium / Plenary Hall" value="${escapeHtml(data.name || '')}">
                    <div class="invalid-feedback">Facility name required.</div>
                </div>
                <div class="col-6 col-md-3">
                    <label class="form-label small text-muted mb-1">Facility Type <span class="text-danger">*</span></label>
                    <select name="facilities[${index}][type]" class="form-select form-select-sm">${typeOptions}</select>
                </div>
                <div class="col-6 col-md-2">
                    <label class="form-label small text-muted mb-1">Seating Capacity <span class="text-danger">*</span></label>
                    <input type="number" name="facilities[${index}][capacity]" class="form-control form-control-sm"
                           placeholder="e.g. 1000" min="1" value="${escapeHtml(data.capacity || '')}">
                    <div class="invalid-feedback">Min 1 seat required.</div>
                </div>
                <div class="col-6 col-md-2">
                    <label class="form-label small text-muted mb-1">Area / Size <span class="text-muted">(Optional)</span></label>
                    <input type="number" step="0.01" min="0" name="facilities[${index}][area]"
                           class="form-control form-control-sm" placeholder="e.g. 10000" value="${escapeHtml(data.area || '')}">
                </div>
                <div class="col-6 col-md-2">
                    <label class="form-label small text-muted mb-1">Availability Status <span class="text-danger">*</span></label>
                    <select name="facilities[${index}][status]" class="form-select form-select-sm">${statusOptions}</select>
                </div>
            </div>
        `;

        row.querySelector('.facility-hall-select').value = String(data.hall_index ?? '0');
        return row;
    }

    function addFacilityRow(data = {}) {
        const container = document.getElementById('facilitiesContainer');
        const row = createFacilityRow(facilityIndex, data);
        container.appendChild(row);
        renderHallSelectors(getHallNames());
        row.querySelector('.facility-hall-select').value = String(data.hall_index ?? '0');
        facilityIndex++;
        renumberFacilityRows();
    }

    function renumberFacilityRows() {
        document.querySelectorAll('.facility-row').forEach((row, index) => {
            const badge = row.querySelector('.facility-index-badge');
            if (badge) badge.textContent = `Facility #${index + 1}` + (index === 0 ? ' (Primary Facility)' : '');
        });
    }

    function showHallPanel(containerId, hallIndex) {
        document.querySelectorAll(`#${containerId} .hall-wise-panel`).forEach(panel => {
            panel.classList.toggle('active', panel.dataset.hall === String(hallIndex));
        });
    }

    function renderImagesPreview(input) {
        const panel = input.closest('.hall-wise-panel');
        const container = panel?.querySelector('.images-preview-container');
        if (!container) return;

        container.innerHTML = '';
        const files = Array.from(input.files || []);

        if (!files.length) {
            container.innerHTML = '<div class="text-muted small py-2 no-images-notice"><i class="bi bi-images me-1"></i> No images uploaded for this hall yet.</div>';
            return;
        }

        files.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function (event) {
                const item = document.createElement('div');
                item.className = 'position-relative border rounded p-1 bg-white shadow-xs';
                item.innerHTML = `
                    <img src="${event.target.result}" class="media-preview-box" alt="Uploaded Preview">
                    <button type="button" class="btn btn-danger btn-sm p-0 position-absolute top-0 end-0 m-1 rounded-circle"
                            style="width:20px;height:20px;font-size:0.65rem;"
                            data-file-index="${index}" onclick="removeImagePreview(this)">
                        <i class="bi bi-x"></i>
                    </button>
                `;
                container.appendChild(item);
            };
            reader.readAsDataURL(file);
        });
    }

    function previewImages(event) {
        renderImagesPreview(event.target);
    }

    function removeImagePreview(button) {
        const panel = button.closest('.hall-wise-panel');
        const input = panel?.querySelector('.hall-gallery-input');
        if (!input) return;

        const removeIndex = Number(button.dataset.fileIndex);
        const transfer = new DataTransfer();
        Array.from(input.files || []).forEach((file, index) => {
            if (index !== removeIndex) transfer.items.add(file);
        });
        input.files = transfer.files;
        renderImagesPreview(input);
    }

    function handleDocUpload(event) {
        const file = event.target.files[0];
        if (!file) return;

        if (file.size > 10 * 1024 * 1024) {
            Swal.fire({
                icon: 'warning',
                title: 'File Too Large',
                text: 'The selected document exceeds 10MB. Please choose a smaller file.',
                confirmButtonColor: '#4338ca'
            });
            event.target.value = '';
            return;
        }

        document.getElementById('docFileName').textContent = file.name;
        const sizeKB = (file.size / 1024).toFixed(1);
        const sizeMB = (file.size / (1024 * 1024)).toFixed(2);
        document.getElementById('docFileSize').textContent = file.size > 1024 * 1024 ? `${sizeMB} MB` : `${sizeKB} KB`;

        const ext = file.name.split('.').pop().toLowerCase();
        const icon = document.getElementById('docTypeIcon');
        if (ext === 'pdf') icon.className = 'bi bi-file-earmark-pdf-fill text-danger fs-4';
        else if (['doc', 'docx'].includes(ext)) icon.className = 'bi bi-file-earmark-word-fill text-primary fs-4';
        else if (['jpg', 'jpeg', 'png'].includes(ext)) icon.className = 'bi bi-file-earmark-image-fill text-info fs-4';
        else icon.className = 'bi bi-file-earmark-text-fill text-secondary fs-4';

        document.getElementById('docPreviewContainer').classList.remove('d-none');
    }

    function removeUploadedDoc() {
        const input = document.getElementById('policyDocumentInput');
        if (input) input.value = '';
        const preview = document.getElementById('docPreviewContainer');
        if (preview) preview.classList.add('d-none');
    }

    function renderHallReview() {
        const select = document.getElementById('reviewHallSelect');
        const output = document.getElementById('hallReviewContent');
        if (!select || !output) return;

        const hallIndex = Number(select.value || 0);
        const names = getHallNames();
        const hallName = names[hallIndex] || `Hall ${hallIndex + 1}`;
        const money = value => value !== '' && value != null ? '₹' + Number(value || 0).toLocaleString('en-IN') : 'Not entered';
        const textValue = (panel, selector) => panel?.querySelector(selector)?.value?.trim() || '';

        const facilityRows = Array.from(document.querySelectorAll('#facilitiesContainer .facility-row')).filter(row =>
            Number(row.querySelector('.facility-hall-select')?.value) === hallIndex
        );

        let facilitiesHtml = '<p class="text-muted small mb-0">No facilities assigned to this hall.</p>';
        if (facilityRows.length) {
            facilitiesHtml = `
                <div class="table-responsive">
                    <table class="table table-sm table-bordered align-middle mb-0">
                        <thead class="table-light"><tr><th>Facility Name</th><th>Type</th><th>Capacity</th><th>Area</th><th>Status</th></tr></thead>
                        <tbody>${facilityRows.map(row => {
                            const name = row.querySelector('input[name$="[name]"]')?.value || '—';
                            const type = row.querySelector('select[name$="[type]"]')?.selectedOptions[0]?.textContent || '—';
                            const capacity = row.querySelector('input[name$="[capacity]"]')?.value || '—';
                            const area = row.querySelector('input[name$="[area]"]')?.value || '—';
                            const status = row.querySelector('select[name$="[status]"]')?.value || '—';
                            return `<tr><td>${escapeHtml(name)}</td><td>${escapeHtml(type)}</td><td>${escapeHtml(capacity)}</td><td>${escapeHtml(area)}</td><td>${escapeHtml(status)}</td></tr>`;
                        }).join('')}</tbody>
                    </table>
                </div>`;
        }

        const mediaPanel = document.querySelector(`#mediaHallPanels .hall-wise-panel[data-hall="${hallIndex}"]`);
        const imageInput = mediaPanel?.querySelector('.hall-gallery-input');
        const imageNames = Array.from(imageInput?.files || []).map(file => file.name);
        const videoUrl = textValue(mediaPanel, '.hall-video-url');
        const videoFile = mediaPanel?.querySelector('.hall-video-file')?.files?.[0]?.name || '';
        const imageHtml = imageNames.length
            ? `<ul class="mb-0 ps-3">${imageNames.map(name => `<li>${escapeHtml(name)}</li>`).join('')}</ul>`
            : '<span class="text-muted">No images selected</span>';

        const chargesPanel = document.querySelector(`#chargesHallPanels .hall-wise-panel[data-hall="${hallIndex}"]`);
        const booking = textValue(chargesPanel, '.hall-booking-fee');
        const deposit = textValue(chargesPanel, '.hall-security-deposit');
        const additional = textValue(chargesPanel, '.hall-additional-charges');
        const gst = chargesPanel?.querySelector('.hall-gst-select')?.selectedOptions[0]?.textContent || 'Not selected';
        const subtotal = (parseFloat(booking) || 0) + (parseFloat(additional) || 0);
        const gstRate = parseFloat(chargesPanel?.querySelector('.hall-gst-select')?.value || 0);
        const grandTotal = money(subtotal + (subtotal * gstRate / 100) + (parseFloat(deposit) || 0));

        output.innerHTML = `
            <div class="border rounded-3 p-3 mb-3 bg-light">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div><small class="text-muted d-block">Selected Hall</small><h5 class="fw-bold text-primary mb-0">${escapeHtml(hallName)}</h5></div>
                    <span class="badge bg-primary">Hall ${hallIndex + 1} of ${names.length}</span>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-12">
                    <div class="border rounded-3 p-3 h-100"><h6 class="fw-bold mb-3"><i class="bi bi-building me-2 text-primary"></i>Facilities / Sub-units</h6>${facilitiesHtml}</div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="border rounded-3 p-3 h-100"><h6 class="fw-bold mb-3"><i class="bi bi-images me-2 text-primary"></i>Media Gallery</h6>
                        <div class="small mb-2"><strong>Images:</strong><div class="mt-1">${imageHtml}</div></div>
                        <div class="small mb-2"><strong>Video URL:</strong> ${videoUrl ? `<a href="${escapeHtml(videoUrl)}" target="_blank" rel="noopener">${escapeHtml(videoUrl)}</a>` : '<span class="text-muted">Not entered</span>'}</div>
                        <div class="small"><strong>Video file:</strong> ${videoFile ? escapeHtml(videoFile) : '<span class="text-muted">No file selected</span>'}</div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="border rounded-3 p-3 h-100"><h6 class="fw-bold mb-3"><i class="bi bi-currency-rupee me-2 text-primary"></i>Charges &amp; Tariffs</h6>
                        <div class="d-flex justify-content-between small mb-2"><span>Booking Fee</span><strong>${money(booking)}</strong></div>
                        <div class="d-flex justify-content-between small mb-2"><span>Security Deposit</span><strong>${money(deposit)}</strong></div>
                        <div class="d-flex justify-content-between small mb-2"><span>Additional Charges</span><strong>${money(additional)}</strong></div>
                        <div class="d-flex justify-content-between small mb-2"><span>GST</span><strong>${escapeHtml(gst)}</strong></div>
                        <hr class="my-2"><div class="d-flex justify-content-between"><strong>Estimated Total (incl. deposit)</strong><strong class="text-success">${grandTotal}</strong></div>
                    </div>
                </div>
            </div>`;
    }

    document.addEventListener('DOMContentLoaded', function () {
        initMap();

        // Initialize Summernote. The layout must provide jQuery.
        $('#cancellationRulesInput').summernote({
            placeholder: 'Specify cancellation rules, refund percentage tiers, and refund guidelines...',
            tabsize: 2,
            height: 220,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            callbacks: {
                onChange: function () {
                    const isEmpty = $('#cancellationRulesInput').summernote('isEmpty');
                    const feedback = document.getElementById('cancellationRulesFeedback');
                    if (feedback) feedback.style.display = isEmpty ? 'block' : 'none';
                }
            }
        });

        renderHallManagement();

        // Restore old facilities after a validation failure, or show one clean row.
        const oldFacilityKeys = Object.keys(oldFacilityValues || {}).sort((a, b) => Number(a) - Number(b));
        if (oldFacilityKeys.length) {
            oldFacilityKeys.forEach(key => addFacilityRow(oldFacilityValues[key] || {}));
        } else {
            addFacilityRow({});
        }

        // Changes to hall count rebuild hall name inputs and the hall-specific panels.
        document.getElementById('hallCountInput').addEventListener('change', renderHallManagement);
        document.getElementById('hallCountInput').addEventListener('input', function () {
            if (this.value !== '') renderHallManagement();
        });

        document.getElementById('hallNamesContainer').addEventListener('input', function () {
            const names = getHallNames();
            renderHallSelectors(names);
            document.querySelectorAll('.hall-wise-panel').forEach(panel => {
                const index = Number(panel.dataset.hall);
                const title = panel.querySelector('.hall-panel-title');
                if (title) title.textContent = `${panel.closest('#mediaHallPanels') ? 'Media for' : 'Charges for'} ${names[index] || `Hall ${index + 1}`}`;
            });
            renderHallReview();
        });

        document.getElementById('mediaHallSelect').addEventListener('change', function () {
            showHallPanel('mediaHallPanels', this.value);
        });
        document.getElementById('chargesHallSelect').addEventListener('change', function () {
            showHallPanel('chargesHallPanels', this.value);
        });
        document.getElementById('reviewHallSelect').addEventListener('change', renderHallReview);

        document.getElementById('btnAddFacility').addEventListener('click', () => addFacilityRow({}));
        document.getElementById('btnAddFacilityBottom').addEventListener('click', () => addFacilityRow({}));

        document.getElementById('facilitiesContainer').addEventListener('click', function (event) {
            const removeButton = event.target.closest('.btn-remove-facility');
            if (!removeButton) return;

            const rows = document.querySelectorAll('.facility-row');
            if (rows.length <= 1) {
                Swal.fire({
                    icon: 'info',
                    title: 'Facility Required',
                    text: 'At least one facility unit must be recorded for this Convention Centre.',
                    confirmButtonColor: '#4338ca'
                });
                return;
            }

            removeButton.closest('.facility-row').remove();
            renumberFacilityRows();
            renderHallReview();
        });

        // Update the hall review as fields change.
        document.getElementById('centreForm').addEventListener('input', renderHallReview);
        document.getElementById('centreForm').addEventListener('change', renderHallReview);

        // Fetch current GPS coordinates when explicitly requested.
        const fetchLocationBtn = document.getElementById('btnFetchLocation');
        fetchLocationBtn.addEventListener('click', function () {
            const button = this;
            const status = document.getElementById('locationFetchStatus');

            if (!navigator.geolocation) {
                Swal.fire({
                    icon: 'warning', title: 'Not Supported',
                    text: 'Geolocation is not supported by your browser.',
                    confirmButtonColor: '#4338ca'
                });
                return;
            }

            button.disabled = true;
            button.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Fetching GPS...';
            if (status) status.textContent = 'Acquiring GPS location...';

            navigator.geolocation.getCurrentPosition(function (position) {
                const lat = Number(position.coords.latitude.toFixed(6));
                const lng = Number(position.coords.longitude.toFixed(6));
                updateMapCoords(lat, lng);
                map.setView([lat, lng], 16);
                button.disabled = false;
                button.innerHTML = '<i class="bi bi-check2-circle fs-6"></i> <span class="fw-semibold">Location Fetched!</span>';
                if (status) status.textContent = `Accurate to ${Math.round(position.coords.accuracy)}m`;
                setTimeout(() => {
                    button.innerHTML = '<i class="bi bi-crosshair2 fs-6"></i> <span class="fw-semibold">Fetch Location</span>';
                }, 3000);
            }, function (error) {
                button.disabled = false;
                button.innerHTML = '<i class="bi bi-crosshair2 fs-6"></i> <span class="fw-semibold">Fetch Location</span>';
                if (status) status.textContent = '';
                let message = 'Unable to fetch your precise GPS coordinates. You can click on the map or drag the pin.';
                if (error.code === 1) message = 'Location access was denied. Allow location permission or select a point on the map.';
                else if (error.code === 2) message = 'Location is currently unavailable.';
                else if (error.code === 3) message = 'Location request timed out. Please try again.';
                Swal.fire({ icon: 'info', title: 'Location Notice', text: message, confirmButtonColor: '#4338ca' });
            }, { enableHighAccuracy: true, timeout: 10000, maximumAge: 0 });
        });

        // Digit-only entry for mobile and PIN.
        document.getElementById('contactMobileInput').addEventListener('input', function () {
            this.value = this.value.replace(/\D/g, '').slice(0, 10);
        });
        document.getElementById('pinCodeInput').addEventListener('input', function () {
            this.value = this.value.replace(/\D/g, '').slice(0, 6);
        });

        // Real Laravel submission; no client-side fake-success popup.
        const centreForm = document.getElementById('centreForm');
        centreForm.addEventListener('submit', function (event) {
            const cancellationCode = $('#cancellationRulesInput').summernote('code');
            const cancellationEmpty = $('#cancellationRulesInput').summernote('isEmpty') ||
                !cancellationCode.replace(/<[^>]*>/g, '').trim();

            const policyFeedback = document.getElementById('cancellationRulesFeedback');
            const noteEditor = document.querySelector('.note-editor');
            if (cancellationEmpty) {
                event.preventDefault();
                if (policyFeedback) policyFeedback.style.display = 'block';
                if (noteEditor) {
                    noteEditor.style.borderColor = '#dc3545';
                    noteEditor.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
                return;
            }
            if (policyFeedback) policyFeedback.style.display = 'none';

            // Validate charge fields in every hall panel, including currently hidden panels.
            let missingChargePanel = null;
            document.querySelectorAll('#chargesHallPanels .hall-wise-panel').forEach(panel => {
                const fields = panel.querySelectorAll(
                    '.hall-booking-fee, .hall-security-deposit, .hall-additional-charges, .hall-gst-select'
                );
                fields.forEach(field => {
                    if (!String(field.value).trim() && !missingChargePanel) missingChargePanel = panel;
                });
            });

            if (missingChargePanel) {
                event.preventDefault();
                const hallIndex = missingChargePanel.dataset.hall;
                document.getElementById('chargesHallSelect').value = hallIndex;
                showHallPanel('chargesHallPanels', hallIndex);
                Swal.fire({
                    icon: 'warning',
                    title: 'Hall Charges Required',
                    text: `Please complete all charge details for ${missingChargePanel.querySelector('.hall-panel-title').textContent}.`,
                    confirmButtonColor: '#4338ca'
                });
                return;
            }

            if (!centreForm.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
                centreForm.classList.add('was-validated');
                const firstInvalid = centreForm.querySelector(':invalid');
                if (firstInvalid) {
                    firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    firstInvalid.focus();
                }
                return;
            }

            const submitButton = document.getElementById('btnSubmitBottom');
            if (submitButton) {
                submitButton.disabled = true;
                submitButton.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Saving...';
            }
        });

        renderHallReview();
    });
</script>
@endsection
