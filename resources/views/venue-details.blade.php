
@extends('layouts.main')

@section('title', 'Venue Details | Book My Slot')

@section('content')

<style>
    .venue-details-page {
        background: #f8f9fb;
        padding-bottom: 60px;
    }

    .venue-breadcrumb {
        padding: 20px 0;
        font-size: 13px;
        color: #777;
    }

    .venue-breadcrumb a {
        color: #a77b2d;
        text-decoration: none;
    }

    .venue-gallery {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr;
        grid-template-rows: 190px 190px;
        gap: 10px;
        overflow: hidden;
        border-radius: 16px;
    }

    .venue-gallery img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .venue-gallery .gallery-main {
        grid-row: span 2;
    }

    .venue-gallery .gallery-last {
        position: relative;
    }

    .gallery-more {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(0,0,0,.55);
        color: #fff;
        font-weight: 700;
    }

    .venue-main-card,
    .venue-side-card {
        background: #fff;
        border: 1px solid #eee;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 20px;
    }

    .venue-title {
        font-size: 27px;
        font-weight: 800;
        color: #222;
    }

    .venue-location {
        color: #777;
        font-size: 14px;
    }

    .venue-rating {
        color: #bd913e;
        font-weight: 700;
    }

    .verified-label {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 6px 11px;
        border-radius: 30px;
        background: #e8f7ed;
        color: #198754;
        font-size: 11px;
        font-weight: 700;
    }

    .venue-section-title {
        font-size: 18px;
        font-weight: 800;
        margin-bottom: 17px;
        color: #252525;
    }

    .venue-description {
        color: #666;
        font-size: 14px;
        line-height: 1.8;
    }

    .venue-highlight-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 12px;
    }

    .venue-highlight {
        background: #faf9f6;
        border: 1px solid #eee9df;
        padding: 17px 10px;
        border-radius: 11px;
        text-align: center;
    }

    .venue-highlight i {
        font-size: 22px;
        color: #b78b3d;
        display: block;
        margin-bottom: 8px;
    }

    .venue-highlight strong {
        display: block;
        font-size: 15px;
        color: #222;
    }

    .venue-highlight small {
        color: #888;
        font-size: 11px;
    }

    .facility-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 13px;
    }

    .facility-item {
        display: flex;
        align-items: center;
        gap: 9px;
        font-size: 13px;
        color: #555;
    }

    .facility-item i {
        color: #b78b3d;
        font-size: 17px;
    }

    .venue-info-row {
        display: flex;
        justify-content: space-between;
        gap: 15px;
        padding: 12px 0;
        border-bottom: 1px solid #eee;
        font-size: 13px;
    }

    .venue-info-row:last-child {
        border-bottom: 0;
    }

    .venue-info-row span:first-child {
        color: #777;
    }

    .venue-info-row strong {
        color: #333;
        text-align: right;
    }

    .venue-price {
        font-size: 27px;
        font-weight: 800;
        color: #222;
    }

    .venue-price small {
        font-size: 12px;
        color: #888;
        font-weight: 400;
    }

    .venue-booking-card {
        position: sticky;
        top: 100px;
    }

    .venue-book-btn {
        width: 100%;
        padding: 13px;
        border: 0;
        border-radius: 9px;
        background: #c59b48;
        color: #fff;
        font-weight: 800;
        text-decoration: none;
        display: block;
        text-align: center;
    }

    .venue-book-btn:hover {
        background: #a77b2d;
        color: #fff;
    }

    .venue-outline-btn {
        width: 100%;
        padding: 11px;
        border: 1px solid #ddd;
        border-radius: 9px;
        background: #fff;
        color: #333;
        font-weight: 600;
        text-decoration: none;
        display: block;
        text-align: center;
    }

    .venue-outline-btn:hover {
        background: #f8f8f8;
    }

    .venue-policy {
        display: flex;
        gap: 12px;
        margin-bottom: 15px;
        color: #666;
        font-size: 13px;
        line-height: 1.6;
    }

    .venue-policy i {
        color: #b78b3d;
        font-size: 18px;
    }

    @media(max-width: 767px) {
        .venue-gallery {
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 200px 120px;
        }

        .venue-gallery .gallery-main {
            grid-column: span 2;
            grid-row: auto;
        }

        .venue-gallery img:nth-child(n+4) {
            display: none;
        }

        .venue-title {
            font-size: 21px;
        }

        .venue-highlight-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .facility-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .venue-main-card,
        .venue-side-card {
            padding: 18px;
        }

        .venue-booking-card {
            position: static;
        }
    }

/* =========================================
   BOOK MY SLOT – PREMIUM VENUE DETAILS THEME
========================================= */

.venue-details-page {
    background: #f6f7f9;
    color: #252b35;
    font-family: 'Plus Jakarta Sans', sans-serif;
}

.venue-breadcrumb {
    padding: 22px 0;
    color: #7b8491;
    font-size: 13px;
    font-weight: 500;
}

.venue-breadcrumb a {
    color: #ad8137;
    font-weight: 700;
}

.venue-breadcrumb a:hover {
    color: #805b20;
}

.venue-gallery {
    gap: 12px;
    border-radius: 18px;
}

.venue-gallery img {
    cursor: pointer;
    transition: transform .35s ease, filter .35s ease;
}

.venue-gallery > div {
    overflow: hidden;
    border-radius: 12px;
    position: relative;
}

.venue-gallery > div:hover img {
    transform: scale(1.045);
    filter: brightness(.88);
}

.gallery-more {
    cursor: pointer;
    font-size: 15px;
    letter-spacing: .2px;
    background: rgba(20, 25, 32, .58);
    transition: background .25s ease;
}

.gallery-last:hover .gallery-more {
    background: rgba(20, 25, 32, .72);
}

.venue-main-card,
.venue-side-card {
    border: 1px solid #e9edf2;
    border-radius: 17px;
    padding: 27px;
    box-shadow: 0 5px 22px rgba(31, 41, 55, .035);
    transition: box-shadow .25s ease;
}

.venue-main-card:hover,
.venue-side-card:hover {
    box-shadow: 0 9px 28px rgba(31, 41, 55, .065);
}

.venue-title {
    color: #202936;
    font-size: 27px;
    line-height: 1.4;
    letter-spacing: -.7px;
    font-weight: 800;
}

.venue-location {
    color: #737d8b;
    font-weight: 500;
}

.verified-label {
    background: #eaf6ee;
    color: #21834b;
    border: 1px solid #d8eddf;
    letter-spacing: .45px;
}

.venue-rating {
    color: #c18d2d;
    background: #fff9ed;
    border: 1px solid #f5e8cb;
    padding: 8px 12px;
    border-radius: 9px;
    white-space: nowrap;
}

.venue-section-title {
    color: #202936;
    font-size: 18px;
    letter-spacing: -.3px;
    font-weight: 800;
}

.venue-description {
    color: #687383;
    font-size: 13.5px;
    line-height: 1.9;
}

.venue-highlight {
    background: #fbfaf7;
    border: 1px solid #eee8dc;
    transition: all .25s ease;
}

.venue-highlight:hover {
    background: #fff8e9;
    border-color: #e6d2a8;
    transform: translateY(-3px);
}

.venue-highlight i,
.facility-item i,
.venue-policy i {
    color: #b78b3d;
}

.venue-highlight strong {
    color: #27313e;
    font-weight: 800;
}

.facility-item {
    color: #566171;
    font-weight: 500;
}

.venue-main-card .table {
    font-size: 13px;
    color: #596474;
    margin-bottom: 0;
}

.venue-main-card .table thead th {
    background: #f7f8fa;
    color: #374151;
    font-weight: 700;
    border-bottom: 1px solid #e9edf2;
    padding: 14px;
}

.venue-main-card .table tbody td {
    padding: 14px;
    border-color: #edf0f3;
}

.venue-price {
    color: #202936;
    letter-spacing: -.7px;
}

.venue-booking-card {
    border: 1px solid #e8e3d8;
    box-shadow: 0 10px 32px rgba(31, 41, 55, .07);
}

.venue-book-btn {
    background: linear-gradient(135deg, #c9a052, #a77b2d);
    box-shadow: 0 5px 14px rgba(167, 123, 45, .2);
    transition: all .25s ease;
}

.venue-book-btn:hover {
    background: linear-gradient(135deg, #b78b3d, #90651f);
    transform: translateY(-2px);
    box-shadow: 0 7px 18px rgba(167, 123, 45, .28);
}

.venue-outline-btn {
    border-color: #dfe3e8;
    color: #374151;
    transition: all .2s ease;
}

.venue-outline-btn:hover {
    border-color: #c6a15c;
    background: #fffaf0;
    color: #946c29;
}

/* Video gallery tile */
.venue-video-tile {
    width: 100%;
    height: 100%;
    min-height: 100%;
    padding: 0;
    border: 0;
    background: #202936;
    position: relative;
    cursor: pointer;
    display: block;
    overflow: hidden;
}

.venue-video-tile img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: .78;
}

.venue-video-play {
    position: absolute;
    inset: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #fff;
    gap: 8px;
    font-size: 12px;
    font-weight: 700;
    background: rgba(20, 25, 32, .18);
}

.venue-video-play i {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: #c49a4a;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    padding-left: 3px;
    box-shadow: 0 4px 18px rgba(0,0,0,.25);
}

/* Full-screen photo/video viewer */
.venue-lightbox {
    position: fixed;
    inset: 0;
    z-index: 99999;
    background: rgba(10, 14, 20, .94);
    display: none;
    align-items: center;
    justify-content: center;
    padding: 65px 65px 35px;
}

.venue-lightbox.active {
    display: flex;
}

.venue-lightbox-content {
    width: 100%;
    max-width: 1100px;
    height: 100%;
    max-height: 80vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.venue-lightbox-content img,
.venue-lightbox-content video {
    max-width: 100%;
    max-height: 80vh;
    object-fit: contain;
    border-radius: 8px;
}

.venue-lightbox-close,
.venue-lightbox-prev,
.venue-lightbox-next {
    position: absolute;
    border: 0;
    color: #fff;
    background: rgba(255,255,255,.13);
    width: 44px;
    height: 44px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: background .2s ease;
}

.venue-lightbox-close:hover,
.venue-lightbox-prev:hover,
.venue-lightbox-next:hover {
    background: #b78b3d;
}

.venue-lightbox-close {
    top: 20px;
    right: 25px;
    font-size: 22px;
}

.venue-lightbox-prev {
    left: 18px;
    top: 50%;
    font-size: 21px;
}

.venue-lightbox-next {
    right: 18px;
    top: 50%;
    font-size: 21px;
}

.venue-lightbox-caption {
    position: absolute;
    bottom: 18px;
    left: 0;
    right: 0;
    text-align: center;
    color: #fff;
    font-size: 13px;
}

@media(max-width: 767px) {
    .venue-lightbox {
        padding: 65px 15px 55px;
    }

    .venue-lightbox-content img,
    .venue-lightbox-content video {
        max-height: 70vh;
    }

    .venue-lightbox-prev {
        left: 8px;
    }

    .venue-lightbox-next {
        right: 8px;
    }

    .venue-title {
        font-size: 21px;
    }
}

.venue-map-wrapper {
    width: 100%;
    height: 350px;
    overflow: hidden;
    border-radius: 13px;
    border: 1px solid #e6e9ee;
    background: #f1f3f5;
}

.venue-map-wrapper iframe {
    width: 100%;
    height: 100%;
    display: block;
}

.venue-directions-link {
    display: inline-flex;
    align-items: center;
    color: #a77b2d;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
}

.venue-directions-link:hover {
    color: #805b20;
    text-decoration: underline;
}

@media(max-width: 767px) {
    .venue-map-wrapper {
        height: 270px;
    }
}

</style>

<div class="venue-details-page">
    <div class="container-xl">

        <!-- BREADCRUMB -->
        <div class="venue-breadcrumb">
            <a href="{{ url('/') }}">Home</a>
            <i class="bi bi-chevron-right mx-2"></i>
            <a href="{{ url('/#venues') }}">Convention Centres</a>
            <i class="bi bi-chevron-right mx-2"></i>
            <span>The Grand Kohinoor</span>
        </div>

        <!-- PHOTO GALLERY -->
      
<!-- PHOTO & VIDEO GALLERY -->
<div class="venue-gallery mb-4">

    <div class="gallery-main">
        <img
            src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&w=1200&q=85"
            alt="Convention centre main view"
            class="venue-gallery-image"
            data-caption="Convention Centre Main View">
    </div>

    <div>
        <img
            src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?auto=format&fit=crop&w=700&q=85"
            alt="Event hall"
            class="venue-gallery-image"
            data-caption="Event Hall">
    </div>

    <div>
        <img
            src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?auto=format&fit=crop&w=700&q=85"
            alt="Wedding arrangement"
            class="venue-gallery-image"
            data-caption="Wedding Arrangement">
    </div>

    <div>
        <img
            src="https://blogpakistan.pk/wp-content/uploads/2023/02/Gourmet-1-1024x817.jpg"
            alt="Banquet interior"
            class="venue-gallery-image"
            data-caption="Banquet Interior">
    </div>

    <!-- VIDEO PREVIEW -->
    <div class="gallery-last">
        <button type="button"
                class="venue-video-tile"
                id="openVenueVideo"
                data-video="{{ asset('videos/venue-tour.mp4') }}"
                data-poster="https://images.unsplash.com/photo-1507504031003-b417219a0fde?auto=format&fit=crop&w=700&q=85">

            <img
                src="https://images.unsplash.com/photo-1507504031003-b417219a0fde?auto=format&fit=crop&w=700&q=85"
                alt="Venue video preview">

            <span class="venue-video-play">
                <i class="bi bi-play-fill"></i>
                Watch Venue Tour
            </span>
        </button>
    </div>

</div>

        <div class="row g-4">

            <!-- LEFT: VENUE INFORMATION -->
            <div class="col-lg-8">

                <!-- BASIC INFORMATION -->
                <div class="venue-main-card">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
                        <div>
                            <span class="verified-label mb-3">
                                <i class="bi bi-patch-check-fill"></i>
                                VERIFIED VENUE
                            </span>

                            <h1 class="venue-title mt-3 mb-2">
                                The Grand Kohinoor Convention Centre
                            </h1>

                            <div class="venue-location">
                                <i class="bi bi-geo-alt-fill me-1"></i>
                                Gachibowli, Hyderabad, Telangana
                            </div>
                        </div>

                        <div class="venue-rating">
                            <i class="bi bi-star-fill"></i> 4.9
                            <small class="text-muted fw-normal">(184 Reviews)</small>
                        </div>
                    </div>

                    <hr>

                    <p class="venue-description">
                        The Grand Kohinoor Convention Centre offers an elegant
                        and spacious venue for weddings, receptions, corporate
                        events and special celebrations. With a large event
                        space, modern amenities, convenient parking and
                        dedicated event facilities, it provides a comfortable
                        setting for memorable occasions.
                    </p>

                    <div class="venue-highlight-grid mt-4">
                        <div class="venue-highlight">
                            <i class="bi bi-people-fill"></i>
                            <strong>2,500</strong>
                            <small>Guest Capacity</small>
                        </div>

                        <div class="venue-highlight">
                            <i class="bi bi-car-front-fill"></i>
                            <strong>450</strong>
                            <small>Car Parking</small>
                        </div>

                        <div class="venue-highlight">
                            <i class="bi bi-snow"></i>
                            <strong>Central AC</strong>
                            <small>Climate Control</small>
                        </div>

                        <div class="venue-highlight">
                            <i class="bi bi-building"></i>
                            <strong>Convention</strong>
                            <small>Venue Type</small>
                        </div>
                    </div>
                </div>

                <!-- ABOUT -->
                <div class="venue-main-card">
                    <h4 class="venue-section-title">About This Venue</h4>
                    <p class="venue-description">
                        Designed to host both intimate gatherings and large
                        celebrations, this convention centre offers spacious
                        interiors, comfortable guest arrangements and facilities
                        to support different event requirements.
                    </p>
                    <p class="venue-description mb-0">
                        Suitable for wedding ceremonies, receptions, engagement
                        functions, birthday celebrations, exhibitions,
                        conferences and corporate gatherings.
                    </p>
                </div>

                <!-- FACILITIES -->
                <div class="venue-main-card">
                    <h4 class="venue-section-title">Facilities & Amenities</h4>

                    <div class="facility-grid">
                        <div class="facility-item"><i class="bi bi-snow"></i> Central Air Conditioning</div>
                        <div class="facility-item"><i class="bi bi-car-front"></i> Ample Parking</div>
                        <div class="facility-item"><i class="bi bi-camera-video"></i> CCTV Security</div>
                        <div class="facility-item"><i class="bi bi-lightning-charge"></i> Power Backup</div>
                        <div class="facility-item"><i class="bi bi-cup-hot"></i> Catering Kitchen</div>
                        <div class="facility-item"><i class="bi bi-door-open"></i> Guest Rooms</div>
                        <div class="facility-item"><i class="bi bi-person-wheelchair"></i> Accessibility</div>
                        <div class="facility-item"><i class="bi bi-music-note-beamed"></i> Sound System</div>
                        <div class="facility-item"><i class="bi bi-shield-check"></i> Security Staff</div>
                    </div>
                </div>

                <!-- EVENT SPACES -->
                <div class="venue-main-card">
                    <h4 class="venue-section-title">Event Spaces & Capacity</h4>

                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Space</th>
                                    <th>Seating Capacity</th>
                                    <th>Suitable For</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Main Convention Hall</td>
                                    <td>2,500 Guests</td>
                                    <td>Weddings & Receptions</td>
                                </tr>
                                <tr>
                                    <td>Dining Area</td>
                                    <td>800 Guests</td>
                                    <td>Dining & Catering</td>
                                </tr>
                                <tr>
                                    <td>Meeting Space</td>
                                    <td>150 Guests</td>
                                    <td>Corporate Events</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- LOCATION -->
                <div class="venue-main-card">
                    <h4 class="venue-section-title">Location & Address</h4>

                    <div class="venue-policy">
                        <i class="bi bi-geo-alt-fill"></i>
                        <div>
                            <strong class="text-dark d-block">Venue Address</strong>
                            Gachibowli, Hyderabad, Telangana, India
                        </div>
                    </div>

                   
<div class="venue-map-wrapper">

    <iframe
        src="https://maps.google.com/maps?q=The%20Grand%20Kohinoor%20Convention%20Centre%2C%20Gachibowli%2C%20Hyderabad&t=&z=15&ie=UTF8&iwloc=&output=embed"
        width="100%"
        height="350"
        style="border:0;"
        allowfullscreen
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>

</div>

<a href="https://www.google.com/maps/search/?api=1&query=The%20Grand%20Kohinoor%20Convention%20Centre%2C%20Gachibowli%2C%20Hyderabad"
   target="_blank"
   rel="noopener"
   class="venue-directions-link mt-3">
    <i class="bi bi-geo-alt-fill me-2"></i>
    View Location & Get Directions
    <i class="bi bi-arrow-up-right ms-2"></i>
</a>

                </div>

                <!-- POLICIES -->
                <div class="venue-main-card">
                    <h4 class="venue-section-title">Venue Policies</h4>

                    <div class="venue-policy">
                        <i class="bi bi-clock"></i>
                        <div>
                            <strong class="text-dark d-block">Event Timings</strong>
                            Timings depend on the selected booking slot and venue availability.
                        </div>
                    </div>

                    <div class="venue-policy">
                        <i class="bi bi-cash-stack"></i>
                        <div>
                            <strong class="text-dark d-block">Advance Payment</strong>
                            An advance payment is required to confirm the booking.
                        </div>
                    </div>

                    <div class="venue-policy">
                        <i class="bi bi-calendar-x"></i>
                        <div>
                            <strong class="text-dark d-block">Cancellation Policy</strong>
                            Cancellation and refund terms are subject to the venue's policy.
                        </div>
                    </div>

                    <div class="venue-policy mb-0">
                        <i class="bi bi-info-circle"></i>
                        <div>
                            <strong class="text-dark d-block">Additional Requirements</strong>
                            Confirm decoration, catering and other arrangements with the venue.
                        </div>
                    </div>
                </div>

            </div>

            <!-- RIGHT: BOOKING SIDEBAR -->
            <div class="col-lg-4">
                <div class="venue-side-card venue-booking-card">

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="text-muted small">Starting slot price</span>
                        <span class="verified-label">
                            <i class="bi bi-patch-check-fill"></i> Verified
                        </span>
                    </div>

                    <div class="venue-price">
                        ₹1,85,000 <small>/ Slot</small>
                    </div>

                    <hr>

                    <div class="venue-info-row">
                        <span>Venue Type</span>
                        <strong>Convention Centre</strong>
                    </div>

                    <div class="venue-info-row">
                        <span>Guest Capacity</span>
                        <strong>2,500 Guests</strong>
                    </div>

                    <div class="venue-info-row">
                        <span>Advance Amount (25%)</span>
                        <strong class="text-success">₹46,250</strong>
                    </div>

                    <div class="venue-info-row">
                        <span>Availability</span>
                        <strong class="text-success">Check Selected Date</strong>
                    </div>

                    <a href="{{ url('/user/login') }}"
                       class="venue-book-btn mt-4">
                        <i class="bi bi-calendar-check me-2"></i>
                        Book This Venue
                    </a>

                    <p class="text-muted text-center small mt-3 mb-3">
                        Login or register to continue with your booking.
                    </p>

                    <a href="tel:+910000000000" class="venue-outline-btn">
                        <i class="bi bi-telephone me-2"></i>
                        Contact Venue
                    </a>

                    <div class="border-top mt-4 pt-3">
                        <div class="d-flex align-items-center gap-2 text-muted small">
                            <i class="bi bi-shield-check text-success fs-5"></i>
                            Secure booking through Book My Slot
                        </div>
                        <div class="d-flex align-items-center gap-2 text-muted small mt-2">
                            <i class="bi bi-calendar2-check text-success fs-5"></i>
                            Date-wise slot availability
                        </div>
                        <div class="d-flex align-items-center gap-2 text-muted small mt-2">
                            <i class="bi bi-bell text-success fs-5"></i>
                            Booking status notifications
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- FULL SCREEN PHOTO / VIDEO VIEWER -->
<div class="venue-lightbox" id="venueLightbox">

    <button type="button"
            class="venue-lightbox-close"
            id="closeVenueLightbox"
            aria-label="Close viewer">
        <i class="bi bi-x-lg"></i>
    </button>

    <button type="button"
            class="venue-lightbox-prev"
            id="venueLightboxPrev"
            aria-label="Previous photo">
        <i class="bi bi-chevron-left"></i>
    </button>

    <div class="venue-lightbox-content" id="venueLightboxContent"></div>

    <button type="button"
            class="venue-lightbox-next"
            id="venueLightboxNext"
            aria-label="Next photo">
        <i class="bi bi-chevron-right"></i>
    </button>

    <div class="venue-lightbox-caption" id="venueLightboxCaption"></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const lightbox = document.getElementById('venueLightbox');
    const content = document.getElementById('venueLightboxContent');
    const caption = document.getElementById('venueLightboxCaption');

    const images = Array.from(
        document.querySelectorAll('.venue-gallery-image')
    );

    let currentIndex = 0;

    function showImage(index) {
        if (!images.length) return;

        currentIndex = (index + images.length) % images.length;

        const selectedImage = images[currentIndex];

        content.innerHTML = '';

        const image = document.createElement('img');
        image.src = selectedImage.src;
        image.alt = selectedImage.alt || 'Venue photo';

        content.appendChild(image);

        caption.textContent =
            selectedImage.dataset.caption || selectedImage.alt;

        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';

        document.getElementById('venueLightboxPrev').style.display = 'flex';
        document.getElementById('venueLightboxNext').style.display = 'flex';
    }

    function showVideo() {
        const videoButton = document.getElementById('openVenueVideo');
        const videoUrl = videoButton.dataset.video;
        const posterUrl = videoButton.dataset.poster;

        content.innerHTML = '';

        const video = document.createElement('video');
        video.src = videoUrl;
        video.poster = posterUrl;
        video.controls = true;
        video.autoplay = true;
        video.playsInline = true;

        content.appendChild(video);

        caption.textContent = 'Venue Tour Video';

        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';

        document.getElementById('venueLightboxPrev').style.display = 'none';
        document.getElementById('venueLightboxNext').style.display = 'none';

        video.play().catch(function () {});
    }

    function closeViewer() {
        const video = content.querySelector('video');

        if (video) {
            video.pause();
            video.removeAttribute('src');
            video.load();
        }

        lightbox.classList.remove('active');
        content.innerHTML = '';
        document.body.style.overflow = '';
    }

    images.forEach(function (img, index) {
        img.addEventListener('click', function () {
            showImage(index);
        });
    });

    document.getElementById('openVenueVideo')
        .addEventListener('click', showVideo);

    document.getElementById('closeVenueLightbox')
        .addEventListener('click', closeViewer);

    document.getElementById('venueLightboxPrev')
        .addEventListener('click', function () {
            showImage(currentIndex - 1);
        });

    document.getElementById('venueLightboxNext')
        .addEventListener('click', function () {
            showImage(currentIndex + 1);
        });

    lightbox.addEventListener('click', function (event) {
        if (event.target === lightbox) {
            closeViewer();
        }
    });

    document.addEventListener('keydown', function (event) {
        if (!lightbox.classList.contains('active')) return;

        if (event.key === 'Escape') {
            closeViewer();
        }

        if (event.key === 'ArrowLeft') {
            showImage(currentIndex - 1);
        }

        if (event.key === 'ArrowRight') {
            showImage(currentIndex + 1);
        }
    });

});
</script>

@endsection
