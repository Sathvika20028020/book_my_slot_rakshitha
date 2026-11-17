
@extends('user.layouts.app')

@section('title', 'Convention Centre Details | Book My Slot')

@section('content')

@php
    $halls = [
        [
            'name' => 'Grand Ballroom',
            'description' => 'Suitable for weddings, receptions and large gatherings.',
            'capacity' => 800,
            'ac_price' => '₹50,000',
            'non_ac_price' => '₹35,000',
            'seating' => 'Up to 800 Seats',
            'facilities' => [
                'Parking', 'Hot Water', 'Electricity', 'Power Backup',
                'Dining Area', 'Kitchen', 'Sound System',
                'Stage & Lighting', 'Restrooms'
            ],
            'media' => [
                [
                    'type' => 'image',
                    'src' => 'https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=1400',
                    'thumb' => 'https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=700',
                    'alt' => 'Grand Ballroom'
                ],
                [
                    'type' => 'image',
                    'src' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=1400',
                    'thumb' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=700',
                    'alt' => 'Ballroom Interior'
                ],
                [
                    'type' => 'video',
                    'src' => 'https://interactive-examples.mdn.mozilla.net/media/cc0-videos/flower.mp4',
                    'thumb' => 'https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=700',
                    'alt' => 'Ballroom Video'
                ],
            ],
        ],
        [
            'name' => 'Crystal Mini Hall',
            'description' => 'Ideal for birthday parties, engagements and family functions.',
            'capacity' => 250,
            'ac_price' => '₹25,000',
            'non_ac_price' => '₹18,000',
            'seating' => 'Up to 250 Seats',
            'facilities' => [
                'Parking', 'Hot Water', 'Electricity', 'Power Backup',
                'Dining Area', 'Air Conditioning', 'Sound System',
                'Restrooms'
            ],
            'media' => [
                [
                    'type' => 'image',
                    'src' => 'https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=1400',
                    'thumb' => 'https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=700',
                    'alt' => 'Crystal Mini Hall'
                ],
                [
                    'type' => 'image',
                    'src' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=1400',
                    'thumb' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=700',
                    'alt' => 'Crystal Hall Interior'
                ],
                [
                    'type' => 'video',
                    'src' => 'https://interactive-examples.mdn.mozilla.net/media/cc0-videos/flower.mp4',
                    'thumb' => 'https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=700',
                    'alt' => 'Crystal Hall Video'
                ],
            ],
        ],
        [
            'name' => 'Open Celebration Hall',
            'description' => 'Suitable for conferences, meetings and medium-sized events.',
            'capacity' => 400,
            'ac_price' => '₹30,000',
            'non_ac_price' => '₹22,000',
            'seating' => 'Up to 400 Seats',
            'facilities' => [
                'Parking', 'Electricity', 'Power Backup', 'Hot Water',
                'Wi-Fi', 'Sound System', 'Stage & Lighting', 'Restrooms'
            ],
            'media' => [
                [
                    'type' => 'image',
                    'src' => 'https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=1400',
                    'thumb' => 'https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=700',
                    'alt' => 'Celebration Hall'
                ],
                [
                    'type' => 'image',
                    'src' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=1400',
                    'thumb' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=700',
                    'alt' => 'Celebration Hall Interior'
                ],
                [
                    'type' => 'video',
                    'src' => 'https://interactive-examples.mdn.mozilla.net/media/cc0-videos/flower.mp4',
                    'thumb' => 'https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=700',
                    'alt' => 'Celebration Hall Video'
                ],
            ],
        ],
    ];

    $facilityIcons = [
        'Parking' => 'fa-parking',
        'Hot Water' => 'fa-faucet',
        'Electricity' => 'fa-bolt',
        'Power Backup' => 'fa-plug',
        'Dining Area' => 'fa-utensils',
        'Kitchen' => 'fa-kitchen-set',
        'Sound System' => 'fa-volume-up',
        'Stage & Lighting' => 'fa-lightbulb',
        'Restrooms' => 'fa-restroom',
        'Air Conditioning' => 'fa-snowflake',
        'Wi-Fi' => 'fa-wifi',
    ];
@endphp

<div class="container-fluid px-3 px-md-4 py-4">

    <!-- BACK LINK -->
    <a href="{{ route('user.center') }}" class="back-link">
        <i class="fas fa-arrow-left"></i>
        Back to Convention Centres
    </a>

    <!-- VENUE HEADER -->
    <div class="venue-header card border-0 shadow-sm mb-4">

        <div class="venue-cover">
            <div>
                <span class="venue-tag">CONVENTION CENTRE</span>
                <h2>Grand Palace Convention Hall</h2>
                <p><i class="fas fa-map-marker-alt me-2"></i>Bengaluru, Karnataka</p>
            </div>
        </div>

        <div class="venue-summary">
    <div>
        <h4>Grand Palace Convention Hall</h4>
        <p>
            A spacious venue designed for weddings, receptions,
            cultural events, conferences and celebrations.
        </p>
    </div>

    <div class="venue-summary-actions">
        <div class="hall-count">
            <i class="fas fa-building"></i>
            {{ count($halls) }} Halls Available
        </div>

        <a href="{{ route('user.center.booking') }}" class="summary-book-btn">
            <i class="fas fa-calendar-check me-2"></i>
            Book Now
            <i class="fas fa-arrow-right ms-2"></i>
        </a>
    </div>
</div>
    </div>

    <div class="row g-4">

        <!-- MAIN CONTENT -->
        <div class="col-lg-8">

            <!-- ABOUT -->
            <div class="detail-card mb-4">
                <h5 class="section-heading">About the Centre</h5>
                <p class="description mb-0">
                    Grand Palace Convention Hall offers multiple halls
                    with different capacities and facilities to suit
                    weddings, receptions, cultural events, conferences
                    and other celebrations.
                </p>
            </div>

            <!-- HALL LIST -->
            <div class="mb-4">

                <div class="mb-3">
                    <h5 class="section-heading mb-1">Available Halls</h5>
                    <p class="description mb-0">
                        Explore hall photos, videos, pricing, capacity and amenities.
                    </p>
                </div>

                @foreach($halls as $index => $hall)

                    <div class="hall-card mb-4">

                        <!-- HALL HEADER -->
                        <div class="hall-header">
                            <div>
                                <span class="hall-number">
                                    HALL {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </span>
                                <h5>{{ $hall['name'] }}</h5>
                                <p>{{ $hall['description'] }}</p>
                            </div>

                            <span class="capacity-badge">
                                <i class="fas fa-users"></i>
                                {{ number_format($hall['capacity']) }} People
                            </span>
                        </div>

                        <!-- HALL GALLERY -->
                        <div class="hall-gallery">

                            @foreach($hall['media'] as $media)
                                <div class="hall-media-item"
                                     data-type="{{ $media['type'] }}"
                                     data-src="{{ $media['src'] }}">

                                    <img src="{{ $media['thumb'] }}"
                                         alt="{{ $media['alt'] }}"
                                         loading="lazy">

                                    @if($media['type'] === 'video')
                                        <span class="media-play">
                                            <i class="fas fa-play"></i>
                                        </span>
                                    @else
                                        <span class="media-expand">
                                            <i class="fas fa-expand"></i>
                                        </span>
                                    @endif

                                </div>
                            @endforeach

                        </div>

                        <!-- HALL INFORMATION -->
                        <div class="hall-body">

                            <!-- CAPACITY -->
                            <h6 class="sub-heading">Hall Capacity</h6>

                            <div class="capacity-grid">
                                <div class="info-box">
                                    <i class="fas fa-users"></i>
                                    <span>Maximum Capacity</span>
                                    <strong>{{ number_format($hall['capacity']) }} People</strong>
                                </div>

                                <div class="info-box">
                                    <i class="fas fa-chair"></i>
                                    <span>Seating Arrangement</span>
                                    <strong>{{ $hall['seating'] }}</strong>
                                </div>
                            </div>

                            <!-- PRICING -->
                            <h6 class="sub-heading mt-4">Available Options & Pricing</h6>

                            <div class="pricing-grid">

                                <div class="pricing-box">
                                    <div class="pricing-label">
                                        <i class="fas fa-snowflake"></i>
                                        AC Hall
                                    </div>
                                    <strong>{{ $hall['ac_price'] }}</strong>
                                    <small>Per day</small>
                                </div>

                                <div class="pricing-box">
                                    <div class="pricing-label">
                                        <i class="fas fa-fan"></i>
                                        Non-AC Hall
                                    </div>
                                    <strong>{{ $hall['non_ac_price'] }}</strong>
                                    <small>Per day</small>
                                </div>

                            </div>

                            <!-- FACILITIES -->
                            <h6 class="sub-heading mt-4">Facilities & Amenities</h6>

                            <div class="facility-grid">
                                @foreach($hall['facilities'] as $facility)
                                    <div class="facility-item">
                                        <i class="fas {{ $facilityIcons[$facility] ?? 'fa-check-circle' }}"></i>
                                        <span>{{ $facility }}</span>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>

                @endforeach

            </div>

            <!-- LOCATION -->
            <div class="detail-card mb-4">
                <h5 class="section-heading">Location</h5>

                <p class="description mb-0">
                    <i class="fas fa-map-marker-alt location-icon"></i>
                    Bengaluru, Karnataka, India
                </p>

                <div class="location-placeholder mt-3">
                    <i class="fas fa-map-marked-alt"></i>
                    <span>Location map will be displayed here</span>
                </div>
            </div>

        </div>

        <!-- BOOKING SIDEBAR -->
        <div class="col-lg-4">

            <div class="booking-card">

                <a href="{{ route('user.center.booking') }}" class="book-btn">
                    Book Now <i class="fas fa-arrow-right"></i>
                </a>

                <p class="booking-note">
                    Booking is subject to centre approval.
                </p>
                
                <hr>

                <h5>Interested in this venue?</h5>

                <p class="description mb-4">
                    Choose your preferred hall, check available dates
                    and submit your booking request.
                </p>

                <div class="booking-info">
                    <div class="info-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <div>
                        <strong>Multiple Halls</strong>
                        <small>Choose a hall based on your event size.</small>
                    </div>
                </div>

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
            </div>

        </div>
    </div>
</div>

<!-- FULL SCREEN MEDIA VIEWER -->
<div class="media-lightbox" id="mediaLightbox">

    <button type="button" class="lightbox-close" id="mediaClose" aria-label="Close">
        <i class="fas fa-times"></i>
    </button>

    <button type="button" class="lightbox-nav lightbox-prev" id="mediaPrev" aria-label="Previous">
        <i class="fas fa-chevron-left"></i>
    </button>

    <div class="lightbox-content" id="mediaContent"></div>

    <button type="button" class="lightbox-nav lightbox-next" id="mediaNext" aria-label="Next">
        <i class="fas fa-chevron-right"></i>
    </button>

    <div class="lightbox-counter" id="mediaCounter"></div>
</div>

<style>
    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        margin-bottom: 16px;
        color: #64748B;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
    }

    .back-link:hover { color: #D97706; }

    .venue-header {
        overflow: hidden;
        border-radius: 16px;
    }

    .venue-cover {
    min-height: 250px;
    display: flex;
    align-items: flex-end;
    padding: 30px;
    color: #fff;

    background:
        linear-gradient( 90deg, #7a7c7e, rgba(10, 15, 29, .20) ),
        url('https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=1600')
        center/cover no-repeat;
        /* url('{{ asset("images/convention-hall.jpg") }}') */
}

    .venue-tag {
        display: inline-block;
        margin-bottom: 12px;
        padding: 6px 11px;
        background: #F59E0B;
        color: #0A0F1D;
        border-radius: 5px;
        font-size: 10px;
        font-weight: 800;
        letter-spacing: .7px;
    }

    .venue-cover h2 {
        margin-bottom: 8px;
        font-size: 27px;
        font-weight: 800;
    }

    .venue-cover p {
        margin: 0;
        color: #E2E8F0;
        font-size: 14px;
    }

    .venue-summary {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        padding: 22px;
    }

    .venue-summary h4 {
        margin-bottom: 7px;
        color: #0A0F1D;
        font-size: 19px;
        font-weight: 800;
    }

    .venue-summary p {
        margin: 0;
        color: #64748B;
        font-size: 13px;
        line-height: 1.7;
    }

    .hall-count {
        flex-shrink: 0;
        padding: 11px 14px;
        border-radius: 8px;
        background: #FEF3C7;
        color: #92400E;
        font-size: 13px;
        font-weight: 800;
    }

    .hall-count i { margin-right: 6px; }

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

    .description {
        color: #64748B;
        font-size: 13px;
        line-height: 1.8;
    }

    /* HALL */
    .hall-card {
        overflow: hidden;
        background: #fff;
        border: 1px solid #E2E8F0;
        border-radius: 14px;
        box-shadow: 0 4px 15px rgba(10,15,29,.035);
    }

    .hall-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        padding: 19px;
        background: #F8FAFC;
        border-bottom: 1px solid #E2E8F0;
    }

    .hall-number {
        color: #B45309;
        font-size: 10px;
        font-weight: 800;
        letter-spacing: 1px;
    }

    .hall-header h5 {
        margin: 5px 0;
        color: #0A0F1D;
        font-size: 18px;
        font-weight: 800;
    }

    .hall-header p {
        margin: 0;
        color: #64748B;
        font-size: 12px;
        line-height: 1.6;
    }

    .capacity-badge {
        flex-shrink: 0;
        padding: 8px 10px;
        border-radius: 7px;
        background: #FEF3C7;
        color: #92400E;
        font-size: 11px;
        font-weight: 800;
    }

    /* GALLERY */
    .hall-gallery {
        display: grid;
        grid-template-columns: 1.5fr 1fr 1fr;
        gap: 9px;
        padding: 14px;
    }

    .hall-media-item {
        position: relative;
        height: 145px;
        overflow: hidden;
        border-radius: 9px;
        background: #F1F5F9;
        cursor: pointer;
    }

    .hall-media-item:first-child {
        height: 145px;
    }

    .hall-media-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .3s ease;
    }

    .hall-media-item:hover img {
        transform: scale(1.05);
    }

    .media-expand,
    .media-play {
        position: absolute;
        right: 9px;
        bottom: 9px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: rgba(10,15,29,.8);
        color: #fff;
        font-size: 12px;
    }

    .media-play {
        inset: 0;
        width: auto;
        height: auto;
        border-radius: 0;
        background: rgba(10,15,29,.3);
        font-size: 28px;
    }

    /* HALL DETAILS */
    .hall-body {
        padding: 20px;
        border-top: 1px solid #E2E8F0;
    }

    .sub-heading {
        margin-bottom: 12px;
        color: #0A0F1D;
        font-size: 14px;
        font-weight: 800;
    }

    .capacity-grid,
    .pricing-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
    }

    .info-box {
        display: flex;
        flex-direction: column;
        gap: 6px;
        padding: 13px;
        background: #F8FAFC;
        border: 1px solid #E2E8F0;
        border-radius: 9px;
    }

    .info-box i {
        color: #D97706;
        font-size: 17px;
    }

    .info-box span {
        color: #64748B;
        font-size: 11px;
    }

    .info-box strong {
        color: #0A0F1D;
        font-size: 13px;
    }

    /* PRICING */
    .pricing-box {
        padding: 15px;
        background: #FFFBEB;
        border: 1px solid #FDE68A;
        border-radius: 10px;
    }

    .pricing-label {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #334155;
        font-size: 12px;
        font-weight: 700;
    }

    .pricing-label i { color: #B45309; }

    .pricing-box strong {
        display: block;
        margin-top: 9px;
        color: #0A0F1D;
        font-size: 21px;
        font-weight: 800;
    }

    .pricing-box small {
        color: #64748B;
        font-size: 11px;
    }

    /* FACILITIES */
    .facility-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 9px;
    }

    .facility-item {
        display: flex;
        align-items: center;
        gap: 9px;
        min-height: 40px;
        padding: 10px;
        background: #FAFAFB;
        border: 1px solid #E2E8F0;
        border-radius: 8px;
        color: #334155;
        font-size: 11px;
        font-weight: 700;
    }

    .facility-item i {
        color: #D97706;
        font-size: 14px;
    }

    /* LOCATION */
    .location-icon {
        margin-right: 6px;
        color: #F59E0B;
    }

    .location-placeholder {
        height: 170px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 10px;
        border-radius: 10px;
        background: #F1F5F9;
        color: #64748B;
        font-size: 13px;
    }

    .location-placeholder i {
        color: #D97706;
        font-size: 30px;
    }

    /* BOOKING */
    .booking-card {
        position: sticky;
        top: 90px;
    }

    .booking-card h5 {
        color: #0A0F1D;
        font-size: 18px;
        font-weight: 800;
    }

    .booking-info {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 19px;
    }

    .info-icon {
        width: 40px;
        height: 40px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: #FEF3C7;
        color: #B45309;
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

    .book-btn {
        display: block;
        width: 100%;
        padding: 14px;
        border-radius: 9px;
        background: #0A0F1D;
        color: #F59E0B;
        text-align: center;
        text-decoration: none;
        font-weight: 800;
    }

    .book-btn:hover {
        background: #1E293B;
        color: #FBBF24;
    }

    .book-btn i { margin-left: 7px; }

    .booking-note {
        margin: 13px 0 0;
        color: #64748B;
        text-align: center;
        font-size: 11px;
    }

    /* FULL SCREEN VIEWER */
    .media-lightbox {
        position: fixed;
        inset: 0;
        z-index: 999999;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 55px 65px;
        background: rgba(0,0,0,.96);
    }

    .media-lightbox.active { display: flex; }

    .lightbox-content {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
    }

    .lightbox-content img,
    .lightbox-content video {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .lightbox-content video {
        width: 100%;
        height: 100%;
    }

    .lightbox-close,
    .lightbox-nav {
        position: absolute;
        z-index: 2;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 0;
        background: rgba(255,255,255,.16);
        color: #fff;
        cursor: pointer;
    }

    .lightbox-close {
        top: 18px;
        right: 22px;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        font-size: 21px;
    }

    .lightbox-nav {
        top: 50%;
        width: 44px;
        height: 54px;
        transform: translateY(-50%);
        border-radius: 8px;
        font-size: 18px;
    }

    .lightbox-prev { left: 15px; }
    .lightbox-next { right: 15px; }

    .lightbox-close:hover,
    .lightbox-nav:hover {
        background: #D97706;
    }

    .lightbox-counter {
        position: absolute;
        bottom: 18px;
        left: 50%;
        transform: translateX(-50%);
        padding: 7px 14px;
        border-radius: 20px;
        background: rgba(255,255,255,.15);
        color: #fff;
        font-size: 13px;
    }

    body.media-open { overflow: hidden; }

    /* RESPONSIVE */
    @media(max-width:767px) {
        .venue-summary {
            align-items: flex-start;
            flex-direction: column;
        }

        .hall-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .hall-gallery {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .hall-media-item:first-child {
            grid-column: span 2;
        }

        .booking-card { position: static; }
    }

    @media(max-width:575px) {
        .venue-cover {
            min-height: 210px;
            padding: 20px;
        }

        .venue-cover h2 { font-size: 22px; }

        .venue-summary,
        .detail-card,
        .booking-card { padding: 17px; }

        .hall-header,
        .hall-body { padding: 15px; }

        .hall-gallery { padding: 10px; }

        .capacity-grid,
        .pricing-grid,
        .facility-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .media-lightbox { padding: 55px 10px; }

        .lightbox-nav {
            width: 35px;
            height: 45px;
        }

        .lightbox-prev { left: 4px; }
        .lightbox-next { right: 4px; }

        .lightbox-close {
            top: 10px;
            right: 10px;
        }
    }

    @media(max-width:360px) {
        .capacity-grid,
        .pricing-grid,
        .facility-grid {
            grid-template-columns: 1fr;
        }
    }

    /* VENUE SUMMARY ACTIONS */
.venue-summary-actions {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-shrink: 0;
}

.summary-book-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 12px 20px;
    border-radius: 9px;
    background: #0A0F1D;
    color: #F59E0B;
    font-size: 13px;
    font-weight: 800;
    text-decoration: none;
    white-space: nowrap;
    transition: all .2s ease;
}

.summary-book-btn:hover {
    background: #1E293B;
    color: #FBBF24;
    transform: translateY(-2px);
}

@media(max-width:767px) {
    .venue-summary-actions {
        width: 100%;
        flex-wrap: wrap;
    }

    .summary-book-btn {
        flex: 1;
    }
}

@media(max-width:420px) {
    .venue-summary-actions {
        flex-direction: column;
        align-items: stretch;
    }

    .hall-count {
        text-align: center;
    }

    .summary-book-btn {
        width: 100%;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const lightbox = document.getElementById('mediaLightbox');
    const content = document.getElementById('mediaContent');
    const closeBtn = document.getElementById('mediaClose');
    const prevBtn = document.getElementById('mediaPrev');
    const nextBtn = document.getElementById('mediaNext');
    const counter = document.getElementById('mediaCounter');

    const mediaItems = Array.from(
        document.querySelectorAll('.hall-media-item')
    );

    let currentIndex = 0;

    function showMedia(index) {

        currentIndex = (index + mediaItems.length) % mediaItems.length;

        const item = mediaItems[currentIndex];
        const type = item.dataset.type;
        const src = item.dataset.src;

        content.innerHTML = '';

        if (type === 'video') {
            const video = document.createElement('video');
            video.src = src;
            video.controls = true;
            video.autoplay = true;
            video.playsInline = true;

            content.appendChild(video);

            video.play().catch(function () {});
        } else {
            const image = document.createElement('img');
            image.src = src;
            image.alt = item.querySelector('img').alt;

            content.appendChild(image);
        }

        counter.textContent =
            (currentIndex + 1) + ' / ' + mediaItems.length;

        const showNavigation = mediaItems.length > 1;
        prevBtn.style.display = showNavigation ? 'flex' : 'none';
        nextBtn.style.display = showNavigation ? 'flex' : 'none';
    }

    function openLightbox(index) {
        lightbox.classList.add('active');
        document.body.classList.add('media-open');
        showMedia(index);
    }

    function closeLightbox() {
        lightbox.classList.remove('active');
        document.body.classList.remove('media-open');

        const video = content.querySelector('video');

        if (video) {
            video.pause();
            video.removeAttribute('src');
            video.load();
        }

        content.innerHTML = '';
    }

    mediaItems.forEach(function (item, index) {
        item.addEventListener('click', function () {
            openLightbox(index);
        });
    });

    closeBtn.addEventListener('click', closeLightbox);

    prevBtn.addEventListener('click', function () {
        showMedia(currentIndex - 1);
    });

    nextBtn.addEventListener('click', function () {
        showMedia(currentIndex + 1);
    });

    lightbox.addEventListener('click', function (event) {
        if (event.target === lightbox) {
            closeLightbox();
        }
    });

    document.addEventListener('keydown', function (event) {
        if (!lightbox.classList.contains('active')) return;

        if (event.key === 'Escape') closeLightbox();
        if (event.key === 'ArrowLeft') showMedia(currentIndex - 1);
        if (event.key === 'ArrowRight') showMedia(currentIndex + 1);
    });

});
</script>

@endsection
