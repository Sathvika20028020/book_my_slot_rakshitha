
@extends('layouts.main')

@section('title', 'Venue Details | Book My Slot')

@section('content')

<style>
.venue-details-page {
    background:#f6f7f9;
    color:#252b35;
    padding-bottom:60px;
    font-family:'Plus Jakarta Sans',sans-serif;
}
.venue-breadcrumb {
    padding:22px 0;
    color:#7b8491;
    font-size:13px;
    font-weight:500;
}
.venue-breadcrumb a {
    color:#ad8137;
    font-weight:700;
    text-decoration:none;
}
.venue-gallery {
    display:grid;
    grid-template-columns:2fr 1fr 1fr;
    grid-template-rows:190px 190px;
    gap:12px;
    overflow:hidden;
    border-radius:18px;
    margin-bottom:25px;
}
.venue-gallery > div {
    overflow:hidden;
    border-radius:12px;
    position:relative;
}
.venue-gallery .gallery-main {grid-row:span 2;}
.venue-gallery img {
    width:100%;
    height:100%;
    object-fit:cover;
    cursor:pointer;
    transition:transform .35s;
}
.venue-gallery > div:hover img {transform:scale(1.04);}
.venue-video-tile {
    width:100%;
    height:100%;
    border:0;
    padding:0;
    background:#202936;
    position:relative;
    cursor:pointer;
}
.venue-video-tile img {opacity:.78;}
.venue-video-play {
    position:absolute;
    inset:0;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    color:#fff;
    gap:8px;
    font-size:12px;
    font-weight:700;
    background:rgba(20,25,32,.2);
}
.venue-video-play i {
    width:48px;height:48px;border-radius:50%;
    background:#c49a4a;display:flex;align-items:center;
    justify-content:center;font-size:21px;
}
.venue-main-card,.venue-side-card {
    background:#fff;
    border:1px solid #e9edf2;
    border-radius:17px;
    padding:27px;
    margin-bottom:20px;
    box-shadow:0 5px 22px rgba(31,41,55,.035);
}
.venue-title {
    color:#202936;
    font-size:27px;
    line-height:1.4;
    font-weight:800;
}
.venue-location {color:#737d8b;font-size:14px;}
.verified-label {
    display:inline-flex;
    align-items:center;
    gap:5px;
    padding:6px 11px;
    border-radius:30px;
    background:#eaf6ee;
    color:#21834b;
    border:1px solid #d8eddf;
    font-size:11px;
    font-weight:700;
}
.venue-rating {
    color:#c18d2d;
    background:#fff9ed;
    border:1px solid #f5e8cb;
    padding:8px 12px;
    border-radius:9px;
    white-space:nowrap;
    font-weight:700;
}
.venue-section-title {
    color:#202936;
    font-size:18px;
    font-weight:800;
    margin-bottom:17px;
}
.venue-description {
    color:#687383;
    font-size:13.5px;
    line-height:1.9;
}
.venue-highlight-grid {
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:12px;
}
.venue-highlight {
    background:#fbfaf7;
    border:1px solid #eee8dc;
    padding:17px 10px;
    border-radius:11px;
    text-align:center;
}
.venue-highlight i {
    font-size:22px;color:#b78b3d;
    display:block;margin-bottom:8px;
}
.venue-highlight strong {
    display:block;font-size:15px;color:#27313e;font-weight:800;
}
.venue-highlight small {color:#888;font-size:11px;}
.facility-grid {
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:13px;
}
.facility-item {
    display:flex;align-items:center;gap:9px;
    font-size:13px;color:#566171;font-weight:500;
}
.facility-item i {color:#b78b3d;font-size:17px;}
.venue-info-row {
    display:flex;justify-content:space-between;gap:15px;
    padding:12px 0;border-bottom:1px solid #eee;font-size:13px;
}
.venue-info-row:last-child {border-bottom:0;}
.venue-info-row span:first-child {color:#777;}
.venue-info-row strong {color:#333;text-align:right;}
.venue-price {font-size:27px;font-weight:800;color:#202936;}
.venue-price small {font-size:12px;color:#888;font-weight:400;}
.venue-booking-card {position:sticky;top:100px;}
.venue-book-btn {
    width:100%;padding:13px;border:0;border-radius:9px;
    background:linear-gradient(135deg,#c9a052,#a77b2d);
    color:#fff;font-weight:800;text-decoration:none;
    display:block;text-align:center;
}
.venue-book-btn:hover {color:#fff;background:#90651f;}
.venue-outline-btn {
    width:100%;padding:11px;border:1px solid #ddd;
    border-radius:9px;background:#fff;color:#333;
    font-weight:600;text-decoration:none;display:block;text-align:center;
}
.venue-outline-btn:hover {background:#fffaf0;color:#946c29;}
.venue-policy {
    display:flex;gap:12px;margin-bottom:15px;
    color:#666;font-size:13px;line-height:1.6;
}
.venue-policy i {color:#b78b3d;font-size:18px;}

/* HALL DETAILS */
.hall-section-card {
    background:#fff;
    border:1px solid #e9edf2;
    border-radius:17px;
    padding:25px;
    margin-bottom:22px;
    box-shadow:0 5px 22px rgba(31,41,55,.035);
}
.hall-heading {
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
    gap:15px;
    flex-wrap:wrap;
    border-bottom:1px solid #edf0f3;
    padding-bottom:17px;
    margin-bottom:20px;
}
.hall-name {
    font-size:21px;
    font-weight:800;
    color:#202936;
    margin:0 0 7px;
}
.hall-type {color:#7b8491;font-size:13px;}
.hall-status {
    background:#eaf6ee;color:#21834b;
    border-radius:30px;padding:6px 13px;
    font-size:11px;font-weight:700;
}
.hall-summary {
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:12px;
    margin-bottom:23px;
}
.hall-summary-item {
    background:#faf9f6;
    border:1px solid #eee8dc;
    border-radius:10px;
    padding:14px;
}
.hall-summary-item small {
    display:block;color:#858d98;font-size:11px;margin-bottom:5px;
}
.hall-summary-item strong {
    color:#26313f;font-size:15px;font-weight:800;
}
.hall-subtitle {
    font-size:15px;font-weight:800;color:#27313e;
    margin:22px 0 15px;
}
.hall-photo-grid {
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:10px;
}
.hall-photo-grid img {
    width:100%;height:145px;object-fit:cover;
    border-radius:10px;cursor:pointer;
}
.hall-video-box {
    display:flex;align-items:center;gap:15px;
    background:#f8f9fb;border:1px solid #edf0f3;
    border-radius:11px;padding:13px;
}
.hall-video-box img {
    width:120px;height:75px;object-fit:cover;border-radius:8px;
}
.hall-video-box button {
    border:0;background:#c49a4a;color:#fff;
    padding:9px 15px;border-radius:7px;font-size:12px;
}
.hall-charge-table {
    width:100%;font-size:13px;border-collapse:collapse;
}
.hall-charge-table td {
    padding:12px 10px;border-bottom:1px solid #edf0f3;
}
.hall-charge-table td:last-child {
    text-align:right;font-weight:700;color:#27313e;
}
.hall-charge-table tr.total-row td {
    color:#198754;font-weight:800;border-top:2px solid #ddd;
}
.hall-total-box {
    background:#faf9f6;border:1px solid #eee8dc;
    border-radius:11px;padding:15px;margin-top:15px;
}
.hall-total-box .total-line {
    display:flex;justify-content:space-between;
    gap:10px;padding:7px 0;font-size:13px;
}
.hall-total-box .grand-total {
    border-top:1px solid #ddd;margin-top:7px;padding-top:13px;
    font-size:16px;font-weight:800;color:#198754;
}
.venue-map-wrapper {
    width:100%;height:350px;overflow:hidden;
    border-radius:13px;border:1px solid #e6e9ee;
}
.venue-map-wrapper iframe {width:100%;height:100%;border:0;}
.venue-directions-link {
    display:inline-flex;align-items:center;color:#a77b2d;
    font-size:13px;font-weight:700;text-decoration:none;
}
.venue-directions-link:hover {color:#805b20;text-decoration:underline;}

/* LIGHTBOX */
.venue-lightbox {
    position:fixed;inset:0;z-index:99999;
    background:rgba(10,14,20,.94);
    display:none;align-items:center;justify-content:center;
    padding:65px;
}
.venue-lightbox.active {display:flex;}
.venue-lightbox-content {
    width:100%;max-width:1100px;height:100%;
    max-height:80vh;display:flex;
    align-items:center;justify-content:center;
}
.venue-lightbox-content img,.venue-lightbox-content video {
    max-width:100%;max-height:80vh;
    object-fit:contain;border-radius:8px;
}
.venue-lightbox-close,.venue-lightbox-prev,.venue-lightbox-next {
    position:absolute;border:0;color:#fff;
    background:rgba(255,255,255,.13);
    width:44px;height:44px;border-radius:50%;
    display:flex;align-items:center;justify-content:center;
    cursor:pointer;
}
.venue-lightbox-close {top:20px;right:25px;font-size:22px;}
.venue-lightbox-prev {left:18px;top:50%;font-size:21px;}
.venue-lightbox-next {right:18px;top:50%;font-size:21px;}
.venue-lightbox-caption {
    position:absolute;bottom:18px;left:0;right:0;
    text-align:center;color:#fff;font-size:13px;
}

@media(max-width:767px) {
    .venue-gallery {
        grid-template-columns:1fr 1fr;
        grid-template-rows:200px 120px;
    }
    .venue-gallery .gallery-main {grid-column:span 2;grid-row:auto;}
    .venue-gallery > div:nth-child(4) {display:none;}
    .venue-title {font-size:21px;}
    .venue-highlight-grid,.hall-summary {grid-template-columns:repeat(2,1fr);}
    .facility-grid {grid-template-columns:repeat(2,1fr);}
    .hall-photo-grid {grid-template-columns:repeat(2,1fr);}
    .venue-main-card,.venue-side-card,.hall-section-card {padding:18px;}
    .venue-booking-card {position:static;}
    .venue-map-wrapper {height:270px;}
    .venue-lightbox {padding:65px 15px 55px;}
    .venue-lightbox-content img,.venue-lightbox-content video {max-height:70vh;}
    .venue-lightbox-prev {left:8px;}
    .venue-lightbox-next {right:8px;}
}

/* FULL-WIDTH VENUE DETAILS PAGE */
.venue-details-page {
    width: 100%;
    max-width: 100%;
    margin: 0;
}

.venue-details-page > .container-fluid {
    width: 100%;
    max-width: 100%;
    padding-left: 24px;
    padding-right: 24px;
}

@media (max-width: 767px) {
    .venue-details-page > .container-fluid {
        padding-left: 12px;
        padding-right: 12px;
    }
}
</style>

@php
$venue = [
    'name' => 'The Grand Kohinoor Convention Centre',
    'location' => 'Gachibowli, Hyderabad, Telangana',
    'address' => 'Gachibowli, Hyderabad, Telangana, India',
    'type' => 'Convention Centre',
    'description' => 'The Grand Kohinoor Convention Centre offers an elegant and spacious venue for weddings, receptions, corporate events and special celebrations. With modern amenities, convenient parking and dedicated event facilities, it provides a comfortable setting for memorable occasions.',
    'parking' => 450,
    'latitude' => 17.4401,
    'longitude' => 78.3489,
    'contact' => '+919845012345',
    'rating' => '4.9',
    'reviews' => 184,
    'advance_percent' => 25,
    'min_advance_days' => 15,
    'max_booking_duration' => '3 Days',
    'cancellation' => 'Cancellations made 30 days before the event are eligible for a refund after applicable deductions. Cancellations made within 15 days may not be eligible for a refund. Security deposit will be refunded after inspection, subject to deductions for damages.'
];

$halls = [
    [
        'name' => 'Main Convention Hall',
        'type' => 'Main Wedding & Reception Hall',
        'description' => 'The Main Convention Hall is a spacious and elegant event space designed for grand weddings, receptions, engagements and large-scale celebrations. With a seating capacity of 2,500 guests, modern amenities, professional sound systems, central air conditioning and ample parking facilities, it provides a comfortable and luxurious setting for unforgettable occasions.',
        'status' => 'Available',
        'capacity' => 2500,
        'area' => '25,000 sq.ft',
        'base_fee' => 150000,
        'additional_fee' => 35000,
        'gst_rate' => 18,
        'deposit' => 50000,
        'facilities' => [
            ['name'=>'Central Air Conditioning','icon'=>'bi-snow'],
            ['name'=>'450 Car Parking','icon'=>'bi-car-front'],
            ['name'=>'CCTV Security','icon'=>'bi-camera-video'],
            ['name'=>'Power Backup','icon'=>'bi-lightning-charge'],
            ['name'=>'Catering Kitchen','icon'=>'bi-cup-hot'],
            ['name'=>'Guest Rooms','icon'=>'bi-door-open'],
            ['name'=>'Wheelchair Accessibility','icon'=>'bi-person-wheelchair'],
            ['name'=>'Professional Sound System','icon'=>'bi-music-note-beamed'],
            ['name'=>'Security Staff','icon'=>'bi-shield-check']
        ],
        'images' => [
            'https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&w=700&q=85',
            'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?auto=format&fit=crop&w=700&q=85',
            'https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?auto=format&fit=crop&w=700&q=85',
            'https://images.unsplash.com/photo-1507504031003-b417219a0fde?auto=format&fit=crop&w=700&q=85'
        ],
        'video' => 'videos/venue-tour.mp4',
        'poster' => 'https://images.unsplash.com/photo-1507504031003-b417219a0fde?auto=format&fit=crop&w=700&q=85'
    ],
    [
        'name' => 'Grand Dining Hall',
        'type' => 'Dining & Catering Hall',
        'description' => 'The Grand Dining Hall offers a spacious and comfortable dining environment for wedding feasts, receptions, corporate gatherings and special celebrations. With a capacity of 800 guests, well-arranged dining tables, catering kitchen facilities, RO drinking water and air conditioning, it ensures a convenient and pleasant dining experience for guests.',
        'status' => 'Available',
        'capacity' => 800,
        'area' => '9,000 sq.ft',
        'base_fee' => 55000,
        'additional_fee' => 12000,
        'gst_rate' => 18,
        'deposit' => 20000,
        'facilities' => [
            ['name'=>'Air Conditioning','icon'=>'bi-snow'],
            ['name'=>'Dining Tables & Chairs','icon'=>'bi-table'],
            ['name'=>'Catering Kitchen','icon'=>'bi-cup-hot'],
            ['name'=>'RO Drinking Water','icon'=>'bi-droplet'],
            ['name'=>'Washroom Facilities','icon'=>'bi-water'],
            ['name'=>'Power Backup','icon'=>'bi-lightning-charge']
        ],
        'images' => [
            'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?auto=format&fit=crop&w=700&q=85',
            'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=700&q=85',
            'https://images.unsplash.com/photo-1559339352-11d035aa65de?auto=format&fit=crop&w=700&q=85'
        ],
        'video' => 'videos/dining-hall-tour.mp4',
        'poster' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?auto=format&fit=crop&w=700&q=85'
    ],
    [
        'name' => 'Mini AC Reception Hall',
        'type' => 'Reception & Meeting Hall',
        'description' => 'The Mini AC Reception Hall is an ideal space for intimate receptions, engagement ceremonies, birthday celebrations, meetings and small family functions. Designed to accommodate 300 guests, it features central air conditioning, projector facilities, a sound system, Wi-Fi and dedicated parking to provide a comfortable setting for smaller gatherings.',
        'status' => 'Available',
        'capacity' => 300,
        'area' => '3,500 sq.ft',
        'base_fee' => 30000,
        'additional_fee' => 7000,
        'gst_rate' => 18,
        'deposit' => 10000,
        'facilities' => [
            ['name'=>'Central Air Conditioning','icon'=>'bi-snow'],
            ['name'=>'Projector & Screen','icon'=>'bi-projector'],
            ['name'=>'Sound System','icon'=>'bi-speaker'],
            ['name'=>'Wi-Fi','icon'=>'bi-wifi'],
            ['name'=>'Power Backup','icon'=>'bi-lightning-charge'],
            ['name'=>'Dedicated Parking','icon'=>'bi-car-front']
        ],
        'images' => [
            'https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&w=700&q=85',
            'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?auto=format&fit=crop&w=700&q=85',
            'https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?auto=format&fit=crop&w=700&q=85'
        ],
        'video' => 'videos/reception-hall-tour.mp4',
        'poster' => 'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?auto=format&fit=crop&w=700&q=85'
    ]
];

$formatMoney = fn($amount) => '₹'.number_format($amount);
$totalStartingPrice = min(array_map(fn($hall) => $hall['base_fee'] + $hall['additional_fee'], $halls));
$totalCapacity = array_sum(array_column($halls, 'capacity'));
@endphp

<div class="venue-details-page">
<div class="container-fluid px-3 px-lg-4">
    <div class="venue-breadcrumb">
        <a href="{{ url('/') }}">Home</a>
        <i class="bi bi-chevron-right mx-2"></i>
        <a href="{{ url('/#venues') }}">Convention Centres</a>
        <i class="bi bi-chevron-right mx-2"></i>
        <span>{{ $venue['name'] }}</span>
    </div>

    <!-- MAIN VENUE GALLERY -->
    <div class="venue-gallery">
        <div class="gallery-main">
            <img class="venue-gallery-image"
                 src="{{ $halls[0]['images'][0] }}"
                 alt="Convention centre main view"
                 data-caption="Convention Centre Main View">
        </div>
        <div>
            <img class="venue-gallery-image"
                 src="{{ $halls[0]['images'][1] }}"
                 alt="Event hall"
                 data-caption="Main Event Hall">
        </div>
        <div>
            <img class="venue-gallery-image"
                 src="{{ $halls[0]['images'][2] }}"
                 alt="Wedding arrangement"
                 data-caption="Wedding Arrangement">
        </div>
        <div class="gallery-last">
            <button type="button" class="venue-video-tile"
                    id="openVenueVideo"
                    data-video="{{ asset($halls[0]['video']) }}"
                    data-poster="{{ $halls[0]['poster'] }}">
                <img src="{{ $halls[0]['poster'] }}" alt="Venue video preview">
                <span class="venue-video-play">
                    <i class="bi bi-play-fill"></i>
                    Watch Venue Tour
                </span>
            </button>
        </div>
    </div>

    <div class="row g-4">

        <div class="col-lg-8">

            <!-- BASIC VENUE INFORMATION -->
            <div class="venue-main-card">
                <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
                    <div>
                        <span class="verified-label mb-3">
                            <i class="bi bi-patch-check-fill"></i> VERIFIED VENUE
                        </span>
                        <h1 class="venue-title mt-3 mb-2">{{ $venue['name'] }}</h1>
                        <div class="venue-location">
                            <i class="bi bi-geo-alt-fill me-1"></i>
                            {{ $venue['location'] }}
                        </div>
                    </div>
                    <div class="venue-rating">
                        <i class="bi bi-star-fill"></i> {{ $venue['rating'] }}
                        <small class="text-muted fw-normal">({{ $venue['reviews'] }} Reviews)</small>
                    </div>
                </div>

                <hr>
                <p class="venue-description">{{ $venue['description'] }}</p>

                <div class="venue-highlight-grid mt-4">
                    <div class="venue-highlight">
                        <i class="bi bi-people-fill"></i>
                        <strong>{{ number_format($totalCapacity) }}</strong>
                        <small>Total Hall Capacity</small>
                    </div>
                    <div class="venue-highlight">
                        <i class="bi bi-car-front-fill"></i>
                        <strong>{{ $venue['parking'] }}</strong>
                        <small>Car Parking</small>
                    </div>
                    <div class="venue-highlight">
                        <i class="bi bi-building"></i>
                        <strong>{{ count($halls) }}</strong>
                        <small>Event Spaces</small>
                    </div>
                    <div class="venue-highlight">
                        <i class="bi bi-bookmark-check"></i>
                        <strong>{{ $venue['type'] }}</strong>
                        <small>Venue Type</small>
                    </div>
                </div>
            </div>

        
            <!-- ALL HALLS -->
            <div class="venue-main-card">
                <h4 class="venue-section-title">Halls & Event Spaces</h4>
                <p class="venue-description mb-0">
                    Explore each hall below to view its capacity, facilities, gallery,
                    rental charges, GST and security deposit.
                </p>
            </div>

            @foreach($halls as $index => $hall)
                @php
                    $subTotal = $hall['base_fee'] + $hall['additional_fee'];
                    $gstAmount = round($subTotal * $hall['gst_rate'] / 100);
                    $grandTotal = $subTotal + $gstAmount;
                    $advanceAmount = round($grandTotal * $venue['advance_percent'] / 100);
                @endphp

                <div class="hall-section-card">

                    <!-- HALL HEADER -->
                    <div class="hall-heading">
                        <div>
                            <h3 class="hall-name">
                                {{ $index + 1 }}. {{ $hall['name'] }}
                            </h3>
                            <div class="hall-type">{{ $hall['type'] }}</div>
                        </div>
                        <span class="hall-status">
                            <i class="bi bi-check-circle-fill me-1"></i>
                            {{ $hall['status'] }}
                        </span>
                    </div>

                    <!-- HALL SUMMARY -->
                    <div class="hall-summary">
                        <div class="hall-summary-item">
                            <small><i class="bi bi-people me-1"></i> Guest Capacity</small>
                            <strong>{{ number_format($hall['capacity']) }} Guests</strong>
                        </div>
                        <div class="hall-summary-item">
                            <small><i class="bi bi-rulers me-1"></i> Hall Area</small>
                            <strong>{{ $hall['area'] }}</strong>
                        </div>
                        <div class="hall-summary-item">
                            <small><i class="bi bi-currency-rupee me-1"></i> Starting Rental</small>
                            <strong>{{ $formatMoney($hall['base_fee']) }}</strong>
                        </div>
                        <div class="hall-summary-item">
                            <small><i class="bi bi-shield-check me-1"></i> Security Deposit</small>
                            <strong>{{ $formatMoney($hall['deposit']) }}</strong>
                        </div>
                    </div>

                    <!-- HALL DESCRIPTION -->
<div class="venue-description mb-4">
    {{ $hall['description'] }}
</div>

                    <!-- FACILITIES -->
                    <h5 class="hall-subtitle">
                        <i class="bi bi-stars me-2"></i>Facilities & Amenities
                    </h5>
                    <div class="facility-grid">
                        @foreach($hall['facilities'] as $facility)
                            <div class="facility-item">
                                <i class="bi {{ $facility['icon'] }}"></i>
                                {{ $facility['name'] }}
                            </div>
                        @endforeach
                    </div>

                    <!-- HALL GALLERY -->
                    <h5 class="hall-subtitle">
                        <i class="bi bi-images me-2"></i>Photos & Gallery
                    </h5>
                    <div class="hall-photo-grid">
                        @foreach($hall['images'] as $imageIndex => $image)
                            <img src="{{ $image }}"
                                 class="hall-gallery-image"
                                 alt="{{ $hall['name'] }} photo"
                                 data-caption="{{ $hall['name'] }} - Photo {{ $imageIndex + 1 }}">
                        @endforeach
                    </div>

                    <!-- HALL VIDEO -->
                    @if(!empty($hall['video']))
                        <h5 class="hall-subtitle">
                            <i class="bi bi-camera-video me-2"></i>Video Walkthrough
                        </h5>
                        <div class="hall-video-box">
                            <img src="{{ $hall['poster'] }}" alt="Hall video preview">
                            <div class="flex-grow-1">
                                <strong class="d-block mb-2">{{ $hall['name'] }} Tour</strong>
                                <button type="button"
                                        class="hall-video-open"
                                        data-video="{{ asset($hall['video']) }}"
                                        data-poster="{{ $hall['poster'] }}">
                                    <i class="bi bi-play-fill me-1"></i> Watch Video
                                </button>
                            </div>
                        </div>
                    @endif

                    <!-- HALL CHARGES -->
                    <h5 class="hall-subtitle">
                        <i class="bi bi-receipt me-2"></i>Rental Charges & GST Breakdown
                    </h5>

                    <div class="table-responsive">
                        <table class="hall-charge-table">
                            <tr>
                                <td>Base Hall Rental</td>
                                <td>{{ $formatMoney($hall['base_fee']) }}</td>
                            </tr>
                            <tr>
                                <td>Additional Charges</td>
                                <td>{{ $formatMoney($hall['additional_fee']) }}</td>
                            </tr>
                            <tr>
                                <td>Subtotal</td>
                                <td>{{ $formatMoney($subTotal) }}</td>
                            </tr>
                            <tr>
                                <td>GST ({{ $hall['gst_rate'] }}%)</td>
                                <td>{{ $formatMoney($gstAmount) }}</td>
                            </tr>
                            <tr class="total-row">
                                <td>Total Hall Rental</td>
                                <td>{{ $formatMoney($grandTotal) }}</td>
                            </tr>
                            <tr>
                                <td>Refundable Security Deposit</td>
                                <td>{{ $formatMoney($hall['deposit']) }}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="hall-total-box">
                        <div class="total-line">
                            <span>Total Rental (including GST)</span>
                            <strong>{{ $formatMoney($grandTotal) }}</strong>
                        </div>
                        <div class="total-line">
                            <span>Security Deposit</span>
                            <strong>{{ $formatMoney($hall['deposit']) }}</strong>
                        </div>
                        <div class="total-line grand-total">
                            <span>Advance Amount ({{ $venue['advance_percent'] }}%)</span>
                            <strong>{{ $formatMoney($advanceAmount) }}</strong>
                        </div>
                    </div>

                </div>
            @endforeach

            <!-- LOCATION -->
            <div class="venue-main-card">
                <h4 class="venue-section-title">Location & Address</h4>
                <div class="venue-policy">
                    <i class="bi bi-geo-alt-fill"></i>
                    <div>
                        <strong class="text-dark d-block">Venue Address</strong>
                        {{ $venue['address'] }}
                    </div>
                </div>

                <div class="venue-map-wrapper">
                    <iframe
                        src="https://maps.google.com/maps?q={{ urlencode($venue['latitude'].','.$venue['longitude']) }}&t=&z=15&ie=UTF8&iwloc=&output=embed"
                        loading="lazy"
                        allowfullscreen
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($venue['latitude'].','.$venue['longitude']) }}"
                   target="_blank" rel="noopener"
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
                    <i class="bi bi-calendar-check"></i>
                    <div>
                        <strong class="text-dark d-block">Minimum Advance Booking</strong>
                        Book at least {{ $venue['min_advance_days'] }} days before the event.
                    </div>
                </div>

                <div class="venue-policy">
                    <i class="bi bi-calendar-range"></i>
                    <div>
                        <strong class="text-dark d-block">Maximum Booking Duration</strong>
                        {{ $venue['max_booking_duration'] }}
                    </div>
                </div>

                <div class="venue-policy">
                    <i class="bi bi-cash-stack"></i>
                    <div>
                        <strong class="text-dark d-block">Advance Payment</strong>
                        {{ $venue['advance_percent'] }}% advance payment is required to confirm the booking.
                    </div>
                </div>

                <div class="venue-policy mb-0">
                    <i class="bi bi-calendar-x"></i>
                    <div>
                        <strong class="text-dark d-block">Cancellation Policy</strong>
                        {{ $venue['cancellation'] }}
                    </div>
                </div>
            </div>

        </div>

        <!-- RIGHT BOOKING SIDEBAR -->
        <div class="col-lg-4">
            <div class="venue-side-card venue-booking-card">

                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-muted small">Starting slot price</span>
                    <span class="verified-label">
                        <i class="bi bi-patch-check-fill"></i> Verified
                    </span>
                </div>

                <div class="venue-price">
                    {{ $formatMoney($totalStartingPrice) }} <small>/ Slot + GST</small>
                </div>

                <hr>

                <div class="venue-info-row">
                    <span>Venue Type</span>
                    <strong>{{ $venue['type'] }}</strong>
                </div>
                <div class="venue-info-row">
                    <span>Number of Halls</span>
                    <strong>{{ count($halls) }}</strong>
                </div>
                <div class="venue-info-row">
                    <span>Total Hall Capacity</span>
                    <strong>{{ number_format($totalCapacity) }} Guests</strong>
                </div>
                <div class="venue-info-row">
                    <span>Advance Payment</span>
                    <strong class="text-success">{{ $venue['advance_percent'] }}%</strong>
                </div>
                <div class="venue-info-row">
                    <span>Availability</span>
                    <strong class="text-success">Check Selected Date</strong>
                </div>

                <a href="{{ url('/user/login') }}" class="venue-book-btn mt-4">
                    <i class="bi bi-calendar-check me-2"></i>
                    Book This Venue
                </a>

                <p class="text-muted text-center small mt-3 mb-3">
                    Login or register to continue with your booking.
                </p>

                <a href="tel:{{ $venue['contact'] }}" class="venue-outline-btn">
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
    <button type="button" class="venue-lightbox-close" id="closeVenueLightbox">
        <i class="bi bi-x-lg"></i>
    </button>
    <button type="button" class="venue-lightbox-prev" id="venueLightboxPrev">
        <i class="bi bi-chevron-left"></i>
    </button>
    <div class="venue-lightbox-content" id="venueLightboxContent"></div>
    <button type="button" class="venue-lightbox-next" id="venueLightboxNext">
        <i class="bi bi-chevron-right"></i>
    </button>
    <div class="venue-lightbox-caption" id="venueLightboxCaption"></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const lightbox = document.getElementById('venueLightbox');
    const content = document.getElementById('venueLightboxContent');
    const caption = document.getElementById('venueLightboxCaption');
    const prev = document.getElementById('venueLightboxPrev');
    const next = document.getElementById('venueLightboxNext');

    const images = Array.from(
        document.querySelectorAll('.venue-gallery-image, .hall-gallery-image')
    );

    let currentIndex = 0;

    function openViewer() {
        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function showImage(index) {
        if (!images.length) return;

        currentIndex = (index + images.length) % images.length;
        const selected = images[currentIndex];

        content.innerHTML = '';

        const image = document.createElement('img');
        image.src = selected.src;
        image.alt = selected.alt || 'Venue photo';
        content.appendChild(image);

        caption.textContent = selected.dataset.caption || selected.alt || '';
        prev.style.display = 'flex';
        next.style.display = 'flex';
        openViewer();
    }

    function showVideo(videoUrl, posterUrl, title) {
        content.innerHTML = '';

        const video = document.createElement('video');
        video.src = videoUrl;
        video.poster = posterUrl || '';
        video.controls = true;
        video.autoplay = true;
        video.playsInline = true;

        content.appendChild(video);
        caption.textContent = title || 'Venue Tour Video';

        prev.style.display = 'none';
        next.style.display = 'none';

        openViewer();
        video.play().catch(function(){});
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

    document.getElementById('openVenueVideo').addEventListener('click', function () {
        showVideo(this.dataset.video, this.dataset.poster, 'Main Venue Tour');
    });

    document.querySelectorAll('.hall-video-open').forEach(function (button) {
        button.addEventListener('click', function () {
            const hallName = this.closest('.hall-section-card')
                .querySelector('.hall-name').textContent.trim();

            showVideo(this.dataset.video, this.dataset.poster, hallName + ' Tour');
        });
    });

    document.getElementById('closeVenueLightbox')
        .addEventListener('click', closeViewer);

    prev.addEventListener('click', function () {
        showImage(currentIndex - 1);
    });

    next.addEventListener('click', function () {
        showImage(currentIndex + 1);
    });

    lightbox.addEventListener('click', function (event) {
        if (event.target === lightbox) closeViewer();
    });

    document.addEventListener('keydown', function (event) {
        if (!lightbox.classList.contains('active')) return;

        if (event.key === 'Escape') closeViewer();

        if (event.key === 'ArrowLeft' && prev.style.display !== 'none') {
            showImage(currentIndex - 1);
        }

        if (event.key === 'ArrowRight' && next.style.display !== 'none') {
            showImage(currentIndex + 1);
        }
    });

});
</script>

@endsection
