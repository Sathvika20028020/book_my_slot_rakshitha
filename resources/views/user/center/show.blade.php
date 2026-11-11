
@extends('layouts.user')

@section('title', 'Convention Centre Details | Book My Slot')

@section('content')

<div class="container-fluid px-3 px-md-4 py-4">

    <!-- BACK LINK -->
    <a href="{{ route('user.center') }}"
       class="text-decoration-none d-inline-flex align-items-center mb-3"
       style="color:#64748B;font-size:14px;font-weight:700;">
        <i class="fas fa-arrow-left me-2"></i> Back to Convention Centres
    </a>

    <!-- CENTRE HEADER -->
    <div class="card border-0 shadow-sm mb-4"
         style="border-radius:16px;overflow:hidden;">

        <div class="centre-cover">
            <div class="cover-content">
                <span class="centre-tag">CONVENTION CENTRE</span>
                <h2>Grand Palace Convention Hall</h2>
                <p>
                    <i class="fas fa-map-marker-alt me-2"></i>
                    Bengaluru, Karnataka
                </p>
            </div>
        </div>

        <div class="card-body p-3 p-md-4">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="fw-bold mb-2" style="color:#0A0F1D;">
                        Grand Palace Convention Hall
                    </h4>
                    <p class="text-muted mb-0" style="font-size:14px;">
                        A spacious venue designed for weddings, receptions,
                        cultural events, conferences and celebrations.
                    </p>
                </div>

                <div class="col-md-4 mt-3 mt-md-0 text-md-end">
                    <span class="price-label">Pricing</span>
                    <h4 class="fw-bold mb-0" style="color:#0A0F1D;">
                        On Request
                    </h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">

        <!-- LEFT CONTENT -->
        <div class="col-lg-8">

            <!-- ABOUT -->
            <div class="detail-card mb-4">
                <h5 class="section-heading">About the Centre</h5>
                <p class="section-description">
                    Grand Palace Convention Hall is a sample venue profile
                    for the Book My Slot portal. It demonstrates how users
                    can view venue information before submitting a booking
                    request.
                </p>
            </div>

            <!-- FACILITIES -->
            <div class="detail-card mb-4">
                <h5 class="section-heading">Facilities & Amenities</h5>

                <div class="row g-3 mt-1">

                    <div class="col-6 col-md-4">
                        <div class="facility-item">
                            <i class="fas fa-parking"></i>
                            <span>Parking</span>
                        </div>
                    </div>

                    <div class="col-6 col-md-4">
                        <div class="facility-item">
                            <i class="fas fa-snowflake"></i>
                            <span>Air Conditioning</span>
                        </div>
                    </div>

                    <div class="col-6 col-md-4">
                        <div class="facility-item">
                            <i class="fas fa-utensils"></i>
                            <span>Dining Area</span>
                        </div>
                    </div>

                    <div class="col-6 col-md-4">
                        <div class="facility-item">
                            <i class="fas fa-volume-up"></i>
                            <span>Sound System</span>
                        </div>
                    </div>

                    <div class="col-6 col-md-4">
                        <div class="facility-item">
                            <i class="fas fa-video"></i>
                            <span>Stage & Lighting</span>
                        </div>
                    </div>

                    <div class="col-6 col-md-4">
                        <div class="facility-item">
                            <i class="fas fa-restroom"></i>
                            <span>Restrooms</span>
                        </div>
                    </div>

                </div>
            </div>

            <!-- GALLERY -->
            <div class="detail-card mb-4">
                <h5 class="section-heading">Photo Gallery</h5>

                <div class="row g-3 mt-1">
                    <div class="col-6">
                        <div class="gallery-placeholder">
                            <i class="fas fa-image"></i>
                            <span>Venue Photo 1</span>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="gallery-placeholder">
                            <i class="fas fa-image"></i>
                            <span>Venue Photo 2</span>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="gallery-placeholder">
                            <i class="fas fa-image"></i>
                            <span>Venue Photo 3</span>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="gallery-placeholder">
                            <i class="fas fa-image"></i>
                            <span>Venue Photo 4</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- LOCATION -->
            <div class="detail-card mb-4">
                <h5 class="section-heading">Location</h5>

                <p class="section-description mb-0">
                    <i class="fas fa-map-marker-alt me-2"
                       style="color:#F59E0B;"></i>
                    Bengaluru, Karnataka, India
                </p>

                <div class="location-placeholder mt-3">
                    <i class="fas fa-map-marked-alt"></i>
                    <span>Location map will be displayed here</span>
                </div>
            </div>

        </div>

        <!-- RIGHT SIDEBAR -->
        <div class="col-lg-4">

            <div class="booking-card">

                <h5 class="fw-bold mb-1">Interested in this venue?</h5>

                <p class="text-muted mb-4" style="font-size:13px;">
                    Check available dates and submit your booking request.
                </p>

                <div class="booking-info">
                    <div class="info-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div>
                        <strong>Flexible Booking Dates</strong>
                        <small>Select your preferred event date.</small>
                    </div>
                </div>

                <div class="booking-info">
                    <div class="info-icon">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <div>
                        <strong>Booking Approval</strong>
                        <small>Your request will be reviewed by the centre.</small>
                    </div>
                </div>

                <div class="booking-info">
                    <div class="info-icon">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <div>
                        <strong>Online Payment</strong>
                        <small>Payment details after approval.</small>
                    </div>
                </div>

                <hr style="border-color:#E2E8F0;">

                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted" style="font-size:13px;">
                        Booking Price
                    </span>
                    <strong style="color:#0A0F1D;">On Request</strong>
                </div>

                <a href="{{ route('user.center.booking') }}"
   class="btn w-100 py-3"
   style="background:#0A0F1D;color:#F59E0B;border-radius:9px;font-weight:800;">
    Book Now <i class="fas fa-arrow-right ms-2"></i>
</a>

                <p class="text-center text-muted mt-3 mb-0"
                   style="font-size:11px;">
                    Booking is subject to centre approval.
                </p>

            </div>

        </div>

    </div>

</div>

<style>
    .centre-cover {
        min-height: 270px;
        display: flex;
        align-items: flex-end;
        padding: 30px;
        background:
            linear-gradient(90deg, rgba(10,15,29,.92), rgba(10,15,29,.25)),
            linear-gradient(135deg, #263653, #0A0F1D);
    }

    .cover-content {
        color: #fff;
    }

    .centre-tag {
        display: inline-block;
        padding: 6px 11px;
        margin-bottom: 12px;
        background: #F59E0B;
        color: #0A0F1D;
        border-radius: 5px;
        font-size: 10px;
        font-weight: 800;
        letter-spacing: .7px;
    }

    .cover-content h2 {
        font-size: 27px;
        font-weight: 800;
        margin-bottom: 9px;
    }

    .cover-content p {
        margin: 0;
        color: #E2E8F0;
        font-size: 14px;
    }

    .price-label {
        color: #64748B;
        font-size: 12px;
    }

    .detail-card,
    .booking-card {
        padding: 22px;
        background: #fff;
        border: 1px solid #E2E8F0;
        border-radius: 14px;
        box-shadow: 0 4px 15px rgba(10,15,29,.035);
    }

    .section-heading {
        margin-bottom: 12px;
        color: #0A0F1D;
        font-size: 17px;
        font-weight: 800;
    }

    .section-description {
        color: #64748B;
        font-size: 14px;
        line-height: 1.8;
    }

    .facility-item {
        min-height: 65px;
        display: flex;
        align-items: center;
        gap: 11px;
        padding: 12px;
        background: #FAFAFB;
        border: 1px solid #E2E8F0;
        border-radius: 9px;
        color: #334155;
        font-size: 12px;
        font-weight: 700;
    }

    .facility-item i {
        color: #D97706;
        font-size: 17px;
    }

    .gallery-placeholder {
        height: 125px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 9px;
        background: #F1F5F9;
        border: 1px dashed #CBD5E1;
        border-radius: 10px;
        color: #94A3B8;
        font-size: 12px;
        font-weight: 700;
    }

    .gallery-placeholder i {
        font-size: 25px;
    }

    .location-placeholder {
        height: 180px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 10px;
        background: #F1F5F9;
        border-radius: 10px;
        color: #64748B;
        font-size: 13px;
    }

    .location-placeholder i {
        font-size: 30px;
        color: #D97706;
    }

    .booking-card {
        position: sticky;
        top: 90px;
    }

    .booking-info {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
    }

    .info-icon {
        width: 40px;
        height: 40px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #FEF3C7;
        color: #B45309;
        border-radius: 10px;
    }

    .booking-info strong {
        display: block;
        color: #0A0F1D;
        font-size: 12px;
    }

    .booking-info small {
        display: block;
        margin-top: 4px;
        color: #64748B;
        font-size: 11px;
    }

    @media (max-width: 575px) {
        .centre-cover {
            min-height: 220px;
            padding: 20px;
        }

        .cover-content h2 {
            font-size: 22px;
        }

        .detail-card,
        .booking-card {
            padding: 17px;
        }

        .booking-card {
            position: static;
        }
    }
</style>

@endsection
