@extends('admin.layout.centers.app')

@section('title') Edit Master – Sri Krishna Grand Convention Centre &amp; Kalyana Mantapa @endsection

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
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Breadcrumb & Top Bar -->
    <div class="page-title py-3">
        <div class="row align-items-center">
            <div class="col-12 col-md-4">
                <h4 class="fw-bold mb-1 text-dark d-flex align-items-center gap-2">
                    Edit Centre Master
                </h4>
            </div>
            <!-- Top of the Middle: Small Submit Button -->
            <div class="col-12 col-md-4 text-center my-2 my-md-0">
                <button type="submit" form="editCentreForm" id="btnSubmitTop" class="btn btn-submit-main btn-sm px-3 py-1 fw-semibold shadow-sm d-inline-flex align-items-center gap-1">
                    <i class="bi bi-check-circle-fill"></i> Update Centre Master
                </button>
            </div>
            <div class="col-12 col-md-4 text-md-end mt-2 mt-md-0 d-flex align-items-center justify-content-md-end gap-2">
                <ol class="breadcrumb justify-content-md-end mb-0 bg-transparent p-0 d-none d-lg-flex">
                    <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/admin/convention-centres">Centres</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
   

    <form id="editCentreForm" class="needs-validation" novalidate>

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
                        <span class="badge bg-light text-primary border font-monospace">CC-2026-001</span>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <!-- Centre ID (Auto generated / Immutable) -->
                            <div class="col-12 col-md-4">
                                <label class="form-label fw-semibold text-dark small">Centre ID <span class="badge bg-secondary ms-1">Immutable Master</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-fingerprint"></i></span>
                                    <input type="text" name="centre_id" id="centreIdInput" class="form-control bg-light font-monospace fw-bold text-primary" value="CC-2026-001" readonly>
                                </div>
                            </div>

                            <!-- Operational Status -->
                            <div class="col-12 col-md-4">
                                <label class="form-label fw-semibold text-dark small">Operational Status <span class="text-danger">*</span></label>
                                <div class="d-flex align-items-center gap-3 pt-1">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="operational_status" id="statusActive" value="Active" checked>
                                        <label class="form-check-label text-success fw-semibold" for="statusActive">
                                            <i class="bi bi-check-circle-fill me-1"></i> Active
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="operational_status" id="statusInactive" value="Inactive">
                                        <label class="form-check-label text-danger fw-semibold" for="statusInactive">
                                            <i class="bi bi-slash-circle-fill me-1"></i> Inactive
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Centre Type -->
                            <div class="col-12 col-md-4">
                                <label class="form-label fw-semibold text-dark small">Centre Type <span class="text-danger">*</span></label>
                                <select name="type" class="form-select" required id="centreTypeSelect">
                                    <option value="Community Hall">Community Hall</option>
                                    <option value="Convention Hall">Convention Hall</option>
                                    <option value="Kalyana Mantapa / Marriage Hall" selected>Kalyana Mantapa / Marriage Hall</option>
                                    <option value="Auditorium">Auditorium</option>
                                    <option value="Function Hall">Function Hall</option>
                                    <option value="Banquet Hall">Banquet Hall</option>
                                    <option value="Multipurpose Hall">Multipurpose Hall</option>
                                    <option value="Meeting / Conference Hall">Meeting / Conference Hall</option>
                                    <option value="Cultural Centre">Cultural Centre</option>
                                    <option value="Sports / Recreation Centre">Sports / Recreation Centre</option>
                                </select>
                                <div class="invalid-feedback">Please select the centre type.</div>
                            </div>

                            <!-- Centre Name -->
                            <div class="col-12">
                                <label class="form-label fw-semibold text-dark small">Centre Name <span class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-building"></i></span>
                                    <input type="text" name="name" id="centreNameInput" class="form-control border-start-0 ps-0" value="Sri Krishna Grand Convention Centre &amp; Kalyana Mantapa" required minlength="3">
                                    <div class="invalid-feedback">Please enter the centre name (minimum 3 characters).</div>
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
                                <textarea name="address" id="addressInput" class="form-control" rows="2" required minlength="5">#45/2, 14th Main Road, 4th Sector, HSR Layout</textarea>
                                <div class="invalid-feedback">Please enter the complete physical address.</div>
                            </div>

                            <!-- Corporation / District -->
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold text-dark small">Corporation / District <span class="text-danger">*</span></label>
                                <input type="text" name="corporation" id="corporationInput" class="form-control" value="BBMP (Bruhat Bengaluru Mahanagara Palike)" required>
                                <div class="invalid-feedback">Please enter the corporation or district name.</div>
                            </div>

                            <!-- Zone -->
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold text-dark small">Zone <span class="text-danger">*</span></label>
                                <select name="zone" id="zoneSelect" class="form-select" required>
                                    <option value="South Zone" selected>South Zone</option>
                                    <option value="East Zone">East Zone</option>
                                    <option value="West Zone">West Zone</option>
                                    <option value="Central Zone">Central Zone</option>
                                    <option value="Mahadevapura Zone">Mahadevapura Zone</option>
                                    <option value="Bommanahalli Zone">Bommanahalli Zone</option>
                                    <option value="Yelahanka Zone">Yelahanka Zone</option>
                                    <option value="Dasarahalli Zone">Dasarahalli Zone</option>
                                    <option value="Rajarajeshwari Nagar Zone">Rajarajeshwari Nagar Zone</option>
                                </select>
                                <div class="invalid-feedback">Please select the civic zone.</div>
                            </div>

                            <!-- Ward -->
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold text-dark small">Ward <span class="text-danger">*</span></label>
                                <input type="text" name="ward" id="wardInput" class="form-control" value="Ward 174 - HSR Layout" required>
                                <div class="invalid-feedback">Please enter the ward name or number.</div>
                            </div>

                            <!-- PIN Code -->
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold text-dark small">PIN Code <span class="text-danger">*</span></label>
                                <input type="text" name="pin_code" id="pinCodeInput" class="form-control" value="560102" pattern="[0-9]{6}" maxlength="6" required>
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
                                    <input type="hidden" name="latitude" id="latitudeInput" value="12.9121">
                                    <input type="hidden" name="longitude" id="longitudeInput" value="77.6446">

                                    <!-- Discreet Coordinate Status Chip & Guidance (No input fields below) -->
                                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 pt-1 px-1">
                                        <div class="d-inline-flex align-items-center gap-2">
                                            <span class="badge bg-white border text-secondary shadow-xs small py-1 px-2 d-inline-flex align-items-center gap-1">
                                                <i class="bi bi-pin-map-fill text-danger"></i> Selected GPS:
                                                <span id="coordsDisplay" class="font-monospace text-dark fw-bold">12.9121, 77.6446</span>
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
                                    <input type="text" name="contact_name" id="contactNameInput" class="form-control border-start-0 ps-0" value="Rajeshwar Hegde" required minlength="3">
                                    <div class="invalid-feedback">Please enter the in-charge name.</div>
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label fw-semibold text-dark small">Mobile Number <span class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-telephone"></i></span>
                                    <input type="tel" name="contact_mobile" id="contactMobileInput" class="form-control border-start-0 ps-0" value="9845012345" pattern="[0-9]{10}" maxlength="10" required>
                                    <div class="invalid-feedback">Please enter a valid 10-digit mobile number.</div>
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label fw-semibold text-dark small">Email ID <span class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-envelope"></i></span>
                                    <input type="email" name="contact_email" id="contactEmailInput" class="form-control border-start-0 ps-0" value="rajesh.hegde@bbmp.gov.in" required>
                                    <div class="invalid-feedback">Please enter a valid email address.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 4. Facility Details (Multiple Addition Option) -->
                <div class="card section-card">
                    <div class="section-header d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <span class="step-badge">4</span>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">Facility Details (Multiple Addition Option)</h6>
                                <small class="text-muted">Dynamic facility units &amp; capacity limits for Sri Krishna Grand Convention Centre &amp; Kalyana Mantapa</small>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1 shadow-sm" id="btnAddFacility">
                            <i class="bi bi-plus-circle"></i> Add Facility
                        </button>
                    </div>
                    <div class="card-body p-4">
                        <div id="facilitiesContainer">
                            <div class="facility-row" id="facilityRow0">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="badge bg-primary facility-index-badge">Facility #1 (Primary Hall)</span>
                                    <button type="button" class="btn btn-sm btn-outline-danger btn-remove-facility" title="Remove Facility" style="padding: 2px 8px;">
                                        <i class="bi bi-trash"></i> Remove
                                    </button>
                                </div>
                                <div class="row g-2">
                                    <div class="col-12 col-md-3">
                                        <label class="form-label small text-muted mb-1">Facility Name <span class="text-danger">*</span></label>
                                        <input type="text" name="facilities[0][name]" class="form-control form-control-sm" value="Main Kalyana Mantapa Hall" required>
                                        <div class="invalid-feedback">Facility name required.</div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <label class="form-label small text-muted mb-1">Facility Type <span class="text-danger">*</span></label>
                                        <select name="facilities[0][type]" class="form-select form-select-sm" required>
                                            <option value="Main Auditorium / Hall" selected>Main Auditorium / Hall</option>
                                            <option value="Dining Area">Dining Area</option>
                                            <option value="Conference Room">Conference Room</option>
                                            <option value="Banquet / Function Hall">Banquet / Function Hall</option>
                                            <option value="Dressing / Rest Rooms">Dressing / Rest Rooms</option>
                                            <option value="Kitchen">Kitchen</option>
                                            <option value="Open Lawn / Outdoor">Open Lawn / Outdoor</option>
                                            <option value="Parking Area">Parking Area</option>
                                            <option value="Sports / Recreation Centre">Sports / Recreation Centre</option>
                                        </select>
                                    </div>
                                    <div class="col-6 col-md-2">
                                        <label class="form-label small text-muted mb-1">Seating Capacity <span class="text-danger">*</span></label>
                                        <input type="number" name="facilities[0][capacity]" class="form-control form-control-sm" value="1500" min="1" required>
                                        <div class="invalid-feedback">Min 1 seat required.</div>
                                    </div>
                                    <div class="col-6 col-md-2">
                                        <label class="form-label small text-muted mb-1">Area / Size <span class="text-muted">(Optional)</span></label>
                                        <input type="text" name="facilities[0][area]" class="form-control form-control-sm" value="14,000 sq.ft">
                                    </div>
                                    <div class="col-6 col-md-2">
                                        <label class="form-label small text-muted mb-1">Availability Status <span class="text-danger">*</span></label>
                                        <select name="facilities[0][status]" class="form-select form-select-sm" required>
                                            <option value="Available" selected>Available</option>
                                            <option value="Under Maintenance">Under Maintenance</option>
                                            <option value="Booked">Booked</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 text-center">
                            <button type="button" class="btn btn-outline-primary btn-sm px-4" id="btnAddFacilityBottom">
                                <i class="bi bi-plus-lg me-1"></i> Add Another Facility Sub-unit
                            </button>
                        </div>
                    </div>
                </div>

                <!-- 5. Images Addition & Video Addition -->
                <div class="card section-card">
                    <div class="section-header d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <span class="step-badge">5</span>
                            <h6 class="fw-bold mb-0 text-dark">Media Gallery (Images &amp; Video Addition)</h6>
                        </div>
                        <span class="badge bg-light text-muted border">High-Res Media</span>
                    </div>
                    <div class="card-body p-4">
                        <!-- Image Upload Area -->
                        <label class="form-label fw-semibold text-dark small mb-2">Centre Photographs / Gallery Images</label>
                        <div class="upload-zone mb-3" onclick="document.getElementById('imageFileInput').click()">
                            <i class="bi bi-cloud-arrow-up display-6 text-primary mb-2 d-block"></i>
                            <h6 class="fw-bold mb-1">Add More Images or <span class="text-primary text-decoration-underline">Browse Files</span></h6>
                            <p class="text-muted small mb-0">Supports JPG, PNG, WEBP up to 10MB each</p>
                            <input type="file" id="imageFileInput" class="d-none" multiple accept="image/*" onchange="previewImages(event)">
                        </div>

                        <!-- Gallery Thumbnails Preview Container -->
                        <div class="d-flex flex-wrap gap-2 mb-4" id="imagesPreviewContainer">
                            <div class="position-relative border rounded p-1 bg-white shadow-xs">
                                <img src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&amp;fit=crop&amp;w=800&amp;q=80" class="media-preview-box" alt="Gallery Image 1">
                                <span class="badge bg-primary position-absolute top-0 start-0 m-1" style="font-size:0.6rem;">Cover</span>
                                <button type="button" class="btn btn-danger btn-sm p-0 position-absolute top-0 end-0 m-1 rounded-circle" style="width:20px;height:20px;font-size:0.65rem;" onclick="removeImagePreview(this)">
                                    <i class="bi bi-x"></i>
                                </button>
                            </div>
                            <div class="position-relative border rounded p-1 bg-white shadow-xs">
                                <img src="https://images.unsplash.com/photo-1545232979-fbf68fe9b1af?auto=format&amp;fit=crop&amp;w=800&amp;q=80" class="media-preview-box" alt="Gallery Image 2">
                                <button type="button" class="btn btn-danger btn-sm p-0 position-absolute top-0 end-0 m-1 rounded-circle" style="width:20px;height:20px;font-size:0.65rem;" onclick="removeImagePreview(this)">
                                    <i class="bi bi-x"></i>
                                </button>
                            </div>
                            <div class="position-relative border rounded p-1 bg-white shadow-xs">
                                <img src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?auto=format&amp;fit=crop&amp;w=800&amp;q=80" class="media-preview-box" alt="Gallery Image 3">
                                <button type="button" class="btn btn-danger btn-sm p-0 position-absolute top-0 end-0 m-1 rounded-circle" style="width:20px;height:20px;font-size:0.65rem;" onclick="removeImagePreview(this)">
                                    <i class="bi bi-x"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Video Addition Area -->
                        <hr class="my-3">
                        <label class="form-label fw-semibold text-dark small mb-2">Video Addition (Walkthrough / Promo Video)</label>
                        <div class="row g-3">
                            <div class="col-12 col-md-7">
                                <label class="form-label small text-muted">Video Embed Link (YouTube / Vimeo / CDN Stream)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-play-circle-fill text-danger"></i></span>
                                    <input type="url" name="video_url" id="videoUrlInput" class="form-control border-start-0 ps-0" value="https://www.youtube.com/watch?v=dQw4w9WgXcQ" placeholder="https://www.youtube.com/watch?v=...">
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <label class="form-label small text-muted">Or Replace Video File (MP4, Max 50MB)</label>
                                <input type="file" class="form-control" accept="video/mp4,video/webm">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 6. Charges & Tariffs -->
                <div class="card section-card">
                    <div class="section-header d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <span class="step-badge">6</span>
                            <h6 class="fw-bold mb-0 text-dark">Charges &amp; Tariff Structure</h6>
                        </div>
                        <span class="badge bg-light text-success border"><i class="bi bi-currency-rupee"></i> INR Pricing</span>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <!-- Booking Fee -->
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold text-dark small">Base Booking Fee (₹ / per slot or day) <span class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" name="booking_fee" id="bookingFeeInput" class="form-control" value="75000" min="0" required>
                                    <div class="invalid-feedback">Base booking fee required (0 or greater).</div>
                                </div>
                            </div>

                            <!-- Security Deposit -->
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold text-dark small">Security Deposit (₹ Refundable) <span class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" name="security_deposit" id="securityDepositInput" class="form-control" value="25000" min="0" required>
                                    <div class="invalid-feedback">Security deposit amount required.</div>
                                </div>
                            </div>

                            <!-- Additional Charges -->
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold text-dark small">Additional Charges (₹ Cleaning, AC, Generator, Sound) <span class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" name="additional_charges" id="additionalChargesInput" class="form-control" value="12500" min="0" required>
                                    <div class="invalid-feedback">Additional charges required (0 if none).</div>
                                </div>
                            </div>

                            <!-- GST -->
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold text-dark small">GST Rate (%) <span class="text-danger">*</span></label>
                                <select name="gst_percentage" id="gstSelect" class="form-select" required>
                                    <option value="18" selected>18% (Standard GST)</option>
                                    <option value="12">12% (Concessional)</option>
                                    <option value="5">5% (Minimal)</option>
                                    <option value="0">0% (Exempted / Non-Commercial)</option>
                                </select>
                                <div class="invalid-feedback">Please select a GST rate.</div>
                            </div>
                        </div>
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
                                    <input type="number" name="min_advance_days" id="minAdvanceDaysInput" class="form-control border-start-0 ps-0" value="15" min="1" required>
                                    <span class="input-group-text bg-light text-muted">Days prior</span>
                                    <div class="invalid-feedback">Please enter minimum advance days (at least 1).</div>
                                </div>
                            </div>

                            <!-- Maximum Booking Duration -->
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold text-dark small">Maximum Booking Duration <span class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-clock-history"></i></span>
                                    <select name="max_booking_duration" id="maxDurationSelect" class="form-select border-start-0 ps-0" required>
                                        <option value="1 Day">1 Day (Single event slot)</option>
                                        <option value="2 Days">2 Days</option>
                                        <option value="3 Days" selected>3 Days (Standard Wedding / Muhurtham)</option>
                                        <option value="5 Days">5 Days</option>
                                        <option value="7 Days">7 Days (Full week exhibition)</option>
                                    </select>
                                    <div class="invalid-feedback">Please select maximum duration.</div>
                                </div>
                            </div>

                            <!-- Cancellation Rules & Refund Policy (Summernote WYSIWYG) -->
                            <div class="col-12">
                                <div class="d-flex align-items-center justify-content-between mb-2 flex-wrap gap-2">
                                    <div>
                                        <label class="form-label fw-semibold text-dark small mb-0">Cancellation Rules &amp; Refund Policy <span class="text-danger">*</span></label>
                                        <small class="text-muted d-block">Rich text policy description formatted with refund brackets, timeline guidelines, and terms.</small>
                                    </div>
                                    <!-- Examples / Preset Templates Bar -->
                                    <div class="d-flex align-items-center gap-1 flex-wrap">
                                        <span class="small text-muted fw-semibold me-1"><i class="bi bi-magic text-primary me-1"></i> Quick Examples:</span>
                                        <button type="button" class="btn btn-xs btn-outline-primary py-1 px-2" onclick="loadPolicyTemplate('standard')" title="Standard refund policy">
                                            <i class="bi bi-file-earmark-text me-1"></i> Standard Policy
                                        </button>
                                        <button type="button" class="btn btn-xs btn-outline-secondary py-1 px-2" onclick="loadPolicyTemplate('flexible')" title="Generous refund policy with rescheduling option">
                                            <i class="bi bi-arrow-repeat me-1"></i> Flexible Policy
                                        </button>
                                        <button type="button" class="btn btn-xs btn-outline-warning py-1 px-2" onclick="loadPolicyTemplate('strict')" title="Strict policy for peak season bookings">
                                            <i class="bi bi-shield-shaded me-1"></i> Strict Policy
                                        </button>
                                        <button type="button" class="btn btn-xs btn-outline-light text-muted border py-1 px-2" onclick="clearPolicyEditor()" title="Clear editor content">
                                            <i class="bi bi-eraser me-1"></i> Clear
                                        </button>
                                    </div>
                                </div>

                                <textarea name="cancellation_rules" id="cancellationRulesInput" class="form-control" rows="5"></textarea>
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

                <!-- Bottom Action: Only Submit Button (Small & Centered in the middle) -->
                <div class="d-flex justify-content-center my-4 pb-3">
                    <button type="submit" id="btnUpdateBottom" class="btn btn-submit-main btn-sm px-4 py-2 fw-semibold shadow-sm d-inline-flex align-items-center gap-2">
                        <i class="bi bi-check-circle-fill"></i> Update Centre Master
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
    // SweetAlert Fallback in case of network issue
    if (typeof Swal === 'undefined') {
        window.Swal = {
            fire: function(opts) {
                return new Promise(function(resolve) {
                    const isSuccess = opts.icon === 'success';
                    const alertMsg = (opts.title ? opts.title + '\n\n' : '') + 
                                     (opts.html ? opts.html.replace(/<[^>]*>?/gm, ' ') : (opts.text || ''));
                    alert(alertMsg);
                    resolve({ isConfirmed: true });
                });
            }
        };
    }

    // Policy Templates & Examples for Summernote
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

    function loadPolicyTemplate(type) {
        if (policyTemplates[type]) {
            $('#cancellationRulesInput').summernote('code', policyTemplates[type]);
            const feedback = document.getElementById('cancellationRulesFeedback');
            if (feedback) feedback.style.display = 'none';
            const noteEditor = document.querySelector('.note-editor');
            if (noteEditor) noteEditor.style.borderColor = '#cbd5e1';
        }
    }

    function clearPolicyEditor() {
        $('#cancellationRulesInput').summernote('code', '');
    }

    // Document Upload handlers
    function handleDocUpload(event) {
        const file = event.target.files[0];
        if (!file) return;

        // Check file size (10MB maximum)
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

        const previewContainer = document.getElementById('docPreviewContainer');
        const fileNameEl = document.getElementById('docFileName');
        const fileSizeEl = document.getElementById('docFileSize');
        const docIcon = document.getElementById('docTypeIcon');

        fileNameEl.textContent = file.name;
        const sizeKB = (file.size / 1024).toFixed(1);
        const sizeMB = (file.size / (1024 * 1024)).toFixed(2);
        fileSizeEl.textContent = file.size > 1024 * 1024 ? `${sizeMB} MB` : `${sizeKB} KB`;

        // Update icon based on file extension
        const ext = file.name.split('.').pop().toLowerCase();
        if (ext === 'pdf') {
            docIcon.className = 'bi bi-file-earmark-pdf-fill text-danger fs-4';
        } else if (['doc', 'docx'].includes(ext)) {
            docIcon.className = 'bi bi-file-earmark-word-fill text-primary fs-4';
        } else if (['jpg', 'jpeg', 'png'].includes(ext)) {
            docIcon.className = 'bi bi-file-earmark-image-fill text-info fs-4';
        } else {
            docIcon.className = 'bi bi-file-earmark-text-fill text-secondary fs-4';
        }

        previewContainer.classList.remove('d-none');
    }

    function removeUploadedDoc() {
        const input = document.getElementById('policyDocumentInput');
        if (input) input.value = '';
        const previewContainer = document.getElementById('docPreviewContainer');
        if (previewContainer) previewContainer.classList.add('d-none');
    }

    let map, marker;
    let facilityIndex = 1;

    document.addEventListener("DOMContentLoaded", function () {
        initMap();

        // Initialize Summernote Rich Text Editor
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
                onChange: function(contents, $editable) {
                    const isEmpty = $('#cancellationRulesInput').summernote('isEmpty');
                    const feedback = document.getElementById('cancellationRulesFeedback');
                    if (feedback) feedback.style.display = isEmpty ? 'block' : 'none';
                    const noteEditor = document.querySelector('.note-editor');
                    if (noteEditor) noteEditor.style.borderColor = isEmpty ? '#dc3545' : '#cbd5e1';
                }
            }
        });

        // Real-time mobile input formatting (digits only, max 10)
        const mobileInput = document.getElementById('contactMobileInput');
        if (mobileInput) {
            mobileInput.addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);
            });
        }

        // Real-time PIN code formatting (digits only, max 6)
        const pinInput = document.getElementById('pinCodeInput');
        if (pinInput) {
            pinInput.addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6);
            });
        }

        // Add Facility Buttons
        document.getElementById('btnAddFacility').addEventListener('click', addFacilityRow);
        document.getElementById('btnAddFacilityBottom').addEventListener('click', addFacilityRow);

        // Remove Facility Row delegation
        document.getElementById('facilitiesContainer').addEventListener('click', function(e) {
            if (e.target.closest('.btn-remove-facility')) {
                const row = e.target.closest('.facility-row');
                const totalRows = document.querySelectorAll('.facility-row').length;
                if (totalRows <= 1) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Facility Required',
                        text: 'At least one facility unit must remain for this Convention Centre.',
                        confirmButtonColor: '#4338ca'
                    });
                    return;
                }
                row.remove();
                renumberFacilityRows();
            }
        });

        // "Fetch Location" Button on top of the map
        const fetchLocationBtn = document.getElementById('btnFetchLocation');
        if (fetchLocationBtn) {
            fetchLocationBtn.addEventListener('click', function() {
                const statusSpan = document.getElementById('locationFetchStatus');
                const btn = this;

                if (navigator.geolocation) {
                    btn.disabled = true;
                    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status"></span> Fetching GPS...';
                    if (statusSpan) statusSpan.textContent = 'Acquiring GPS location...';

                    navigator.geolocation.getCurrentPosition(
                        function(pos) {
                            const lat = parseFloat(pos.coords.latitude.toFixed(6));
                            const lng = parseFloat(pos.coords.longitude.toFixed(6));

                            updateMapCoords(lat, lng);
                            map.setView([lat, lng], 16);

                            btn.disabled = false;
                            btn.className = 'btn btn-success btn-sm px-3 shadow-sm d-inline-flex align-items-center gap-1';
                            btn.innerHTML = '<i class="bi bi-check2-circle fs-6"></i> <span class="fw-semibold">Location Fetched!</span>';
                            if (statusSpan) {
                                statusSpan.innerHTML = '<span class="text-success"><i class="bi bi-check-circle me-1"></i>Accurate to ' + Math.round(pos.coords.accuracy) + 'm</span>';
                            }

                            setTimeout(() => {
                                btn.className = 'btn btn-primary btn-sm px-3 shadow-sm d-inline-flex align-items-center gap-2';
                                btn.innerHTML = '<i class="bi bi-crosshair2 fs-6"></i> <span class="fw-semibold">Fetch Location</span>';
                            }, 3000);
                        },
                        function(err) {
                            btn.disabled = false;
                            btn.className = 'btn btn-primary btn-sm px-3 shadow-sm d-inline-flex align-items-center gap-2';
                            btn.innerHTML = '<i class="bi bi-crosshair2 fs-6"></i> <span class="fw-semibold">Fetch Location</span>';
                            if (statusSpan) statusSpan.textContent = '';

                            let msg = 'Unable to fetch your precise GPS coordinates. You can click anywhere on the map or drag the pin.';
                            if (err.code === 1) {
                                msg = 'Location access was denied in your browser. Please allow location permissions or click on the map to place pin.';
                            } else if (err.code === 2) {
                                msg = 'Location position is currently unavailable.';
                            } else if (err.code === 3) {
                                msg = 'Location request timed out. Please try again.';
                            }

                            Swal.fire({
                                icon: 'info',
                                title: 'Location Notice',
                                text: msg,
                                confirmButtonColor: '#4338ca'
                            });
                        },
                        { enableHighAccuracy: true, timeout: 10000, maximumAge: 0 }
                    );
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Not Supported',
                        text: 'Geolocation is not supported by your browser.',
                        confirmButtonColor: '#4338ca'
                    });
                }
            });
        }

        // Bootstrap Validation & Form Submission (Normal Bootstrap inline validation only, SweetAlert on Success)
        const editForm = document.getElementById('editCentreForm');
        editForm.addEventListener('submit', function(e) {
            e.preventDefault();
            e.stopPropagation();

            // Sync Summernote content to underlying textarea before validation check
            const cancellationCode = $('#cancellationRulesInput').summernote('code');
            const isCancellationEmpty = $('#cancellationRulesInput').summernote('isEmpty') || !cancellationCode.trim() || cancellationCode === '<p><br></p>';
            const feedback = document.getElementById('cancellationRulesFeedback');
            const noteEditor = document.querySelector('.note-editor');

            if (isCancellationEmpty) {
                if (feedback) feedback.style.display = 'block';
                if (noteEditor) {
                    noteEditor.style.borderColor = '#dc3545';
                }
            } else {
                if (feedback) feedback.style.display = 'none';
                if (noteEditor) {
                    noteEditor.style.borderColor = '#cbd5e1';
                }
            }

            // Normal Bootstrap Validation check
            if (!editForm.checkValidity() || isCancellationEmpty) {
                editForm.classList.add('was-validated');

                if (isCancellationEmpty && editForm.checkValidity()) {
                    if (noteEditor) {
                        noteEditor.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                    return;
                }

                const firstInvalid = editForm.querySelector(':invalid');
                if (firstInvalid) {
                    firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    firstInvalid.focus();
                }
                return; // DO NOT show warning modal; show normal Bootstrap validation!
            }

            editForm.classList.remove('was-validated');

            const centreId = document.getElementById('centreIdInput').value;
            const centreName = document.getElementById('centreNameInput').value.trim();
            const centreType = document.getElementById('centreTypeSelect').value;
            const contactName = document.getElementById('contactNameInput').value.trim();
            const mobile = document.getElementById('contactMobileInput').value.trim();

            Swal.fire({
                icon: 'success',
                title: 'Centre Master Updated!',
                html: `
                    <div class="py-2 text-center">
                        <p class="text-muted small mb-3">Changes to the convention centre master record and facilities have been saved successfully.</p>
                        <div class="bg-light p-3 rounded-3 text-start border mb-3">
                            <div class="d-flex justify-content-between mb-1 small">
                                <span class="text-muted">Master ID:</span>
                                <span class="font-monospace fw-bold text-primary">${centreId}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-1 small">
                                <span class="text-muted">Centre Name:</span>
                                <strong class="text-dark">${centreName}</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-1 small">
                                <span class="text-muted">Type:</span>
                                <span class="badge bg-primary text-white">${centreType}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-0 small">
                                <span class="text-muted">In-charge:</span>
                                <span class="text-dark">${contactName} (${mobile})</span>
                            </div>
                        </div>
                        <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2">
                            <i class="bi bi-check-circle-fill me-1"></i> Operational Status: Active
                        </span>
                    </div>
                `,
                confirmButtonColor: '#4338ca',
                confirmButtonText: '<i class="bi bi-eye me-1"></i> View Master Profile',
                showCancelButton: true,
                cancelButtonText: '<i class="bi bi-list-check me-1"></i> All Centres List',
                cancelButtonColor: '#6b7280',
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('admin.convention-centres.show') }}";
                } else {
                    window.location.href = "{{ route('admin.convention-centres.index') }}";
                }
            });
        });
    });

    function initMap() {
        const defaultLat = 12.9121;
        const defaultLng = 77.6446;

        map = L.map('mapPicker').setView([defaultLat, defaultLng], 14);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        marker = L.marker([defaultLat, defaultLng], { draggable: true }).addTo(map);

        marker.on('dragend', function (event) {
            const position = marker.getLatLng();
            updateMapCoords(position.lat, position.lng);
        });

        map.on('click', function (e) {
            updateMapCoords(e.latlng.lat, e.latlng.lng);
        });
    }

    function updateMapCoords(lat, lng) {
        lat = parseFloat(lat).toFixed(6);
        lng = parseFloat(lng).toFixed(6);
        const latInput = document.getElementById('latitudeInput');
        const lngInput = document.getElementById('longitudeInput');
        if (latInput) latInput.value = lat;
        if (lngInput) lngInput.value = lng;
        
        const coordsDisplay = document.getElementById('coordsDisplay');
        if (coordsDisplay) {
            coordsDisplay.textContent = `${lat}, ${lng}`;
        }
        if (marker) marker.setLatLng([lat, lng]);
    }

    function syncCoordsFromInputs() {
        const lat = parseFloat(document.getElementById('latitudeInput').value);
        const lng = parseFloat(document.getElementById('longitudeInput').value);
        if (!isNaN(lat) && !isNaN(lng)) {
            marker.setLatLng([lat, lng]);
            map.panTo([lat, lng]);
        }
    }

    function addFacilityRow() {
        const container = document.getElementById('facilitiesContainer');
        const count = document.querySelectorAll('.facility-row').length + 1;
        const newRow = document.createElement('div');
        newRow.className = 'facility-row';
        newRow.id = `facilityRow${facilityIndex}`;
        newRow.innerHTML = `
            <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="badge bg-secondary facility-index-badge">Facility #${count}</span>
                <button type="button" class="btn btn-sm btn-outline-danger btn-remove-facility" title="Remove Facility" style="padding: 2px 8px;">
                    <i class="bi bi-trash"></i> Remove
                </button>
            </div>
            <div class="row g-2">
                <div class="col-12 col-md-3">
                    <label class="form-label small text-muted mb-1">Facility Name <span class="text-danger">*</span></label>
                    <input type="text" name="facilities[${facilityIndex}][name]" class="form-control form-control-sm" placeholder="e.g. VIP Conference Suite" required>
                    <div class="invalid-feedback">Facility name required.</div>
                </div>
                <div class="col-6 col-md-3">
                    <label class="form-label small text-muted mb-1">Facility Type <span class="text-danger">*</span></label>
                    <select name="facilities[${facilityIndex}][type]" class="form-select form-select-sm" required>
                        <option value="Main Auditorium / Hall">Main Auditorium / Hall</option>
                        <option value="Dining Area">Dining Area</option>
                        <option value="Conference Room" selected>Conference Room</option>
                        <option value="Banquet / Function Hall">Banquet / Function Hall</option>
                        <option value="Dressing / Rest Rooms">Dressing / Rest Rooms</option>
                        <option value="Kitchen">Kitchen</option>
                        <option value="Open Lawn / Outdoor">Open Lawn / Outdoor</option>
                        <option value="Parking Area">Parking Area</option>
                    </select>
                </div>
                <div class="col-6 col-md-2">
                    <label class="form-label small text-muted mb-1">Seating Capacity <span class="text-danger">*</span></label>
                    <input type="number" name="facilities[${facilityIndex}][capacity]" class="form-control form-control-sm" placeholder="e.g. 150" min="1" required>
                    <div class="invalid-feedback">Capacity required.</div>
                </div>
                <div class="col-6 col-md-2">
                    <label class="form-label small text-muted mb-1">Area / Size <span class="text-muted">(Optional)</span></label>
                    <input type="text" name="facilities[${facilityIndex}][area]" class="form-control form-control-sm" placeholder="e.g. 2,000 sq.ft">
                </div>
                <div class="col-6 col-md-2">
                    <label class="form-label small text-muted mb-1">Availability Status <span class="text-danger">*</span></label>
                    <select name="facilities[${facilityIndex}][status]" class="form-select form-select-sm" required>
                        <option value="Available" selected>Available</option>
                        <option value="Under Maintenance">Under Maintenance</option>
                        <option value="Booked">Booked</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
            </div>
        `;
        container.appendChild(newRow);
        facilityIndex++;
    }

    function renumberFacilityRows() {
        const rows = document.querySelectorAll('.facility-row');
        rows.forEach((row, idx) => {
            const badge = row.querySelector('.facility-index-badge');
            if (badge) {
                badge.textContent = `Facility #${idx + 1}` + (idx === 0 ? ' (Primary)' : '');
            }
        });
    }

    function previewImages(event) {
        const container = document.getElementById('imagesPreviewContainer');
        const files = event.target.files;
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();
            reader.onload = function(e) {
                const div = document.createElement('div');
                div.className = 'position-relative border rounded p-1 bg-white shadow-xs';
                div.innerHTML = `
                    <img src="${e.target.result}" class="media-preview-box" alt="Uploaded Preview">
                    <button type="button" class="btn btn-danger btn-sm p-0 position-absolute top-0 end-0 m-1 rounded-circle" style="width:20px;height:20px;font-size:0.65rem;" onclick="removeImagePreview(this)">
                        <i class="bi bi-x"></i>
                    </button>
                `;
                container.appendChild(div);
            };
            reader.readAsDataURL(file);
        }
    }

    function removeImagePreview(btn) {
        btn.parentElement.remove();    }
</script>
@endsection
