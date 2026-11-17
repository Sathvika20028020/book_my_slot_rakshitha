@extends('superadmin.layout.admin.app')

@section('title') Add New Convention Centre @endsection

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<!-- Leaflet CSS for Map Picker -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

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
            <div class="col-12 col-sm-6">
                <h4 class="fw-bold mb-1 text-dark">
                     Add New Convention Centre 
                </h4>
                
            </div>
            <div class="col-12 col-sm-6 text-sm-end mt-2 mt-sm-0">
                <ol class="breadcrumb justify-content-sm-end mb-0 bg-transparent p-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" target="_blank"><i class="fa fa-home"></i> Frontend</a></li>
                    <li class="breadcrumb-item active">Add New Convention Centre</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <form id="centreForm" action="{{ route('superadmin.conventions.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
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
                                    <input type="text" id="centreIdInput" class="form-control bg-light font-monospace fw-bold text-primary" value="Generated after saving" readonly>
                                </div>
                                <small class="text-muted" style="font-size:0.75rem;">Unique civic venue identifier.</small>
                            </div>

                            <!-- Operational Status -->
                            <div class="col-12 col-md-4">
                                <label class="form-label fw-semibold text-dark small">Operational Status <span class="text-danger">*</span></label>
                                <div class="d-flex align-items-center gap-3 pt-1">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="statusActive" value="Active" checked>
                                        <label class="form-check-label text-success fw-semibold" for="statusActive">
                                            <i class="bi bi-check-circle-fill me-1"></i> Active
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="statusInactive" value="Inactive">
                                        <label class="form-check-label text-danger fw-semibold" for="statusInactive">
                                            <i class="bi bi-slash-circle-fill me-1"></i> Inactive
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Centre Type -->
                            <div class="col-12 col-md-4">
                                <label class="form-label fw-semibold text-dark small">Centre Type <span class="text-danger">*</span></label>
                                <select name="centre_type" class="form-select" required id="centreTypeSelect">
                                    <option value="" disabled selected>Select Centre Type...</option>
                                    <option value="Community Hall">Community Hall</option>
                                    <option value="Convention Hall">Convention Hall</option>
                                    <option value="Kalyana Mantapa / Marriage Hall">Kalyana Mantapa / Marriage Hall</option>
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
                                    <input type="text" name="convention_name" id="centreNameInput" class="form-control border-start-0 ps-0" placeholder="e.g. Sri Krishna Grand Kalyana Mantapa & Cultural Centre" required minlength="3">
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
                                <textarea name="address" id="addressInput" class="form-control" rows="2" placeholder="Full civic physical street address, building number, road, nearby landmark..." required minlength="5"></textarea>
                                <div class="invalid-feedback">Please enter the complete physical address.</div>
                            </div>

                            <!-- PIN Code -->
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold text-dark small">PIN Code <span class="text-danger">*</span></label>
                                <input type="text" name="pincode" id="pinCodeInput" class="form-control" placeholder="e.g. 560102" pattern="[0-9]{6}" maxlength="6" required>
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
                                    <input type="hidden" name="latitude" id="latitudeInput" value="12.9716">
                                    <input type="hidden" name="longitude" id="longitudeInput" value="77.5946">

                                    <!-- Discreet Coordinate Status Chip & Guidance (No input fields below) -->
                                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 pt-1 px-1">
                                        <div class="d-inline-flex align-items-center gap-2">
                                            <span class="badge bg-white border text-secondary shadow-xs small py-1 px-2 d-inline-flex align-items-center gap-1">
                                                <i class="bi bi-pin-map-fill text-danger"></i> Selected GPS:
                                                <span id="coordsDisplay" class="font-monospace text-dark fw-bold">12.9716, 77.5946</span>
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
                                    <input type="text" name="incharge_name" id="contactNameInput" class="form-control border-start-0 ps-0" placeholder="e.g. Srikanth Sharma" required minlength="3">
                                    <div class="invalid-feedback">Please enter the in-charge name.</div>
                                @error('incharge_name')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label fw-semibold text-dark small">Mobile Number <span class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-telephone"></i></span>
                                    <input type="tel" name="phone" id="contactMobileInput" class="form-control border-start-0 ps-0" placeholder="e.g. 9876543210" pattern="[0-9]{10}" maxlength="10" required>
                                    <div class="invalid-feedback">Please enter a valid 10-digit mobile number.</div>
                                @error('phone')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label fw-semibold text-dark small">Email ID <span class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-envelope"></i></span>
                                    <input type="email" name="email" id="contactEmailInput" class="form-control border-start-0 ps-0" placeholder="e.g. incharge@venue.gov.in" required>
                                    <div class="invalid-feedback">Please enter a valid email address.</div>
                                @error('email')<small class="text-danger">{{ $message }}</small>@enderror
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
                                <small class="text-muted">Add halls, dining rooms, conference auditoriums, dressing suites</small>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1 shadow-sm" id="btnAddFacility">
                            <i class="bi bi-plus-circle"></i> Add Facility
                        </button>
                    </div>
                    <div class="card-body p-4">
                        <div id="facilitiesContainer">
                            <!-- Facility Row 1 (Default Clean Initial Row) -->
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
                                        <input type="text" name="facilities[0][name]" class="form-control form-control-sm" placeholder="e.g. Main Auditorium / Plenary Hall" required>
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
                                        </select>
                                    </div>
                                    <div class="col-6 col-md-2">
                                        <label class="form-label small text-muted mb-1">Seating Capacity <span class="text-danger">*</span></label>
                                        <input type="number" name="facilities[0][capacity]" class="form-control form-control-sm" placeholder="e.g. 1000" min="1" required>
                                        <div class="invalid-feedback">Min 1 seat required.</div>
                                    </div>
                                    <div class="col-6 col-md-2">
                                        <label class="form-label small text-muted mb-1">Area / Size <span class="text-muted">(Optional)</span></label>
                                        <input type="number" step="0.01" min="0" name="facilities[0][area]" class="form-control form-control-sm" placeholder="e.g. 10000 sq.ft">
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
                            <h6 class="fw-bold mb-1">Drag &amp; Drop Images or <span class="text-primary text-decoration-underline">Browse Files</span></h6>
                            <p class="text-muted small mb-0">Supports JPG, PNG, WEBP up to 10MB each (Multiple photos allowed)</p>
                            <input type="file" name="convention_images[]" id="imageFileInput" class="d-none" multiple accept="image/jpeg,image/png,image/webp" onchange="previewImages(event)">
                        </div>

                        <!-- Gallery Thumbnails Preview Container (Starts Clean) -->
                        <div class="d-flex flex-wrap gap-2 mb-3" id="imagesPreviewContainer">
                            <div id="noImagesNotice" class="text-muted small py-2">
                                <i class="bi bi-images me-1"></i> No images uploaded yet. Click above to upload photographs.
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
                                    <input type="url" name="video_url" id="videoUrlInput" class="form-control border-start-0 ps-0" placeholder="https://www.youtube.com/watch?v=...">
                                </div>
                                <small class="text-muted">Citizens can watch a virtual walkthrough before booking.</small>
                            </div>
                            <div class="col-12 col-md-5">
                                <label class="form-label small text-muted">Or Upload Video File (MP4, Max 50MB)</label>
                                <input type="file" name="convention_video_file" class="form-control" accept="video/mp4,video/webm">
                            </div>
                        </div>

                        <hr class="my-3">
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
    let facilityIndex = 1; // 1 initial row (index 0)

    document.addEventListener("DOMContentLoaded", function () {
        initMap();

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
                const totalRows = document.querySelectorAll('.facility-row').length;
                if (totalRows <= 1) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Facility Required',
                        text: 'At least one facility unit must be recorded for this Convention Centre.',
                        confirmButtonColor: '#4338ca'
                    });
                    return;
                }
                const row = e.target.closest('.facility-row');
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

        // Submit the real Laravel form after Bootstrap validation.
        const centreForm = document.getElementById('centreForm');
        centreForm.addEventListener('submit', function (e) {
            if (!centreForm.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
                centreForm.classList.add('was-validated');
                const firstInvalid = centreForm.querySelector(':invalid');
                if (firstInvalid) {
                    firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    firstInvalid.focus();
                }
                return;
            }

            centreForm.classList.add('was-validated');
            const submitButton = document.getElementById('btnSubmitBottom');
            if (submitButton) {
                submitButton.disabled = true;
                submitButton.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Saving...';
            }
        });
    });

    function initMap() {
        const defaultLat = 12.9716;
        const defaultLng = 77.5946;

        map = L.map('mapPicker').setView([defaultLat, defaultLng], 12);

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
                    <input type="text" name="facilities[${facilityIndex}][name]" class="form-control form-control-sm" placeholder="e.g. Dining Hall / Conference Room" required>
                    <div class="invalid-feedback">Facility name required.</div>
                </div>
                <div class="col-6 col-md-3">
                    <label class="form-label small text-muted mb-1">Facility Type <span class="text-danger">*</span></label>
                    <select name="facilities[${facilityIndex}][type]" class="form-select form-select-sm" required>
                        <option value="Main Auditorium / Hall">Main Auditorium / Hall</option>
                        <option value="Dining Area" selected>Dining Area</option>
                        <option value="Conference Room">Conference Room</option>
                        <option value="Banquet / Function Hall">Banquet / Function Hall</option>
                        <option value="Dressing / Rest Rooms">Dressing / Rest Rooms</option>
                        <option value="Kitchen">Kitchen</option>
                        <option value="Open Lawn / Outdoor">Open Lawn / Outdoor</option>
                        <option value="Parking Area">Parking Area</option>
                    </select>
                </div>
                <div class="col-6 col-md-2">
                    <label class="form-label small text-muted mb-1">Seating Capacity <span class="text-danger">*</span></label>
                    <input type="number" name="facilities[${facilityIndex}][capacity]" class="form-control form-control-sm" placeholder="e.g. 500" min="1" required>
                    <div class="invalid-feedback">Capacity required.</div>
                </div>
                <div class="col-6 col-md-2">
                    <label class="form-label small text-muted mb-1">Area / Size <span class="text-muted">(Optional)</span></label>
                    <input type="number" step="0.01" min="0" name="facilities[${facilityIndex}][area]" class="form-control form-control-sm" placeholder="e.g. 5000 sq.ft">
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
                badge.textContent = `Facility #${idx + 1}` + (idx === 0 ? ' (Primary Hall)' : '');
            }
        });
    }

    function previewImages(event) {
        const container = document.getElementById('imagesPreviewContainer');
        const notice = document.getElementById('noImagesNotice');
        if (notice) notice.remove();

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
        const item = btn.parentElement;
        const container = document.getElementById('imagesPreviewContainer');
        item.remove();
        if (container.querySelectorAll('.media-preview-box').length === 0) {
            container.innerHTML = `
                <div id="noImagesNotice" class="text-muted small py-2">
                    <i class="bi bi-images me-1"></i> No images uploaded yet. Click above to upload photographs.
                </div>
            `;
        }
    }
</script>
@endsection
