@extends('layouts.main')

@section('title', 'Book My Slot – Premier Convention Centre & Banquet Hall Booking')
@section('meta_description', 'Discover and book convention centres, banquet halls, and wedding mandapams with real-time slot locking.')

@section('content')

<style>
    /* =====================================
       VENUE LOCATION SEARCH
    ===================================== */

    .venue-search-box {
        max-width: 760px;
        padding: 8px;
        display: flex;
        align-items: center;
        gap: 10px;
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 12px 35px rgba(0, 0, 0, .18);
        position: relative;
        z-index: 20;
    }

    .venue-location-wrap {
        flex: 1;
        min-width: 0;
        padding: 8px 12px;
        display: flex;
        align-items: center;
        gap: 12px;
        position: relative;
    }

    .venue-location-wrap>i {
        color: #c59b48;
        font-size: 23px;
    }

    .venue-location-input {
        flex: 1;
        min-width: 0;
        text-align: left;
    }

    .venue-location-input label {
        display: block;
        margin-bottom: 3px;
        color: #777;
        font-size: 11px;
        font-weight: 700;
    }

    .venue-location-input input {
        width: 100%;
        padding: 0;
        border: 0;
        outline: none;
        background: transparent;
        color: #252525;
        font-size: 14px;
        font-weight: 600;
    }

    .venue-location-input input::placeholder {
        color: #aaa;
        font-weight: 400;
    }

    .location-clear-btn {
        display: none;
        padding: 5px;
        border: 0;
        background: transparent;
        color: #999;
    }

    .venue-search-btn {
        min-height: 53px;
        padding: 0 25px;
        border-radius: 13px;
        font-weight: 700;
        white-space: nowrap;
    }

    .location-search-note {
        margin-top: 12px;
        color: rgba(255, 255, 255, .7);
        font-size: 12px;
    }

    /* =====================================
       LOCATION AUTOCOMPLETE
    ===================================== */

    .location-suggestions {
        display: none;
        position: absolute;
        top: calc(100% + 12px);
        left: 0;
        right: 0;
        z-index: 1000;
        max-height: 270px;
        padding: 8px;
        overflow-y: auto;
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 12px 35px rgba(0, 0, 0, .17);
        text-align: left;
    }

    .location-suggestions.show {
        display: block;
    }

    .location-suggestion-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 12px;
        border-radius: 9px;
        color: #333;
        font-size: 13px;
        cursor: pointer;
        transition: .2s;
    }

    .location-suggestion-item:hover {
        background: #fff8eb;
        color: #a77b2d;
    }

    .location-suggestion-item i {
        color: #c59b48;
        font-size: 17px;
    }

    /* =====================================
       VENUE FILTER TOOLBAR
    ===================================== */

    .venue-filter-toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
    }

    .venue-result-count {
        color: #777;
        font-size: 12px;
        font-weight: 600;
    }

    .filter-count-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 20px;
        height: 20px;
        margin-left: 4px;
        border-radius: 50%;
        background: #c59b48;
        color: #fff;
        font-size: 11px;
    }

    /* =====================================
       COMPACT FILTER PANEL
    ===================================== */

    .venue-filter-panel {
        display: none;
        padding: 16px 18px;
        border: 1px solid #eee;
        border-radius: 14px;
        background: #fff;
        box-shadow: 0 4px 18px rgba(0, 0, 0, .04);
        animation: filterSlide .25s ease;
    }

    .venue-filter-panel.show {
        display: block;
    }

    @keyframes filterSlide {
        from {
            opacity: 0;
            transform: translateY(-8px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .venue-filter-panel .filter-top {
        margin-bottom: 14px !important;
    }

    .venue-filter-panel .filter-top h5 {
        margin-bottom: 2px !important;
        font-size: 16px;
    }

    .venue-filter-panel .filter-top p {
        font-size: 11px;
    }

    .venue-filter-panel .row {
        --bs-gutter-x: 12px;
        --bs-gutter-y: 12px;
    }

    .filter-heading {
        display: block;
        margin-bottom: 5px;
        color: #555;
        font-size: 11px;
        font-weight: 700;
    }

    .venue-filter-panel .form-select {
        height: 39px;
        min-height: 39px;
        padding: 7px 30px 7px 11px;
        border: 1px solid #e5e5e5;
        border-radius: 8px;
        background-color: #fff;
        font-size: 12px;
    }

    .venue-filter-panel .form-select:focus {
        border-color: #c59b48;
        box-shadow: 0 0 0 3px rgba(197, 155, 72, .12);
    }

    /* FACILITIES */

    .facility-filter-list {
        display: flex;
        flex-wrap: wrap;
        gap: 7px;
    }

    .facility-filter {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 10px;
        border: 1px solid #e9e9e9;
        border-radius: 7px;
        background: #fff;
        color: #555;
        font-size: 11px;
        font-weight: 600;
        cursor: pointer;
        transition: .2s;
    }

    .facility-filter:has(input:checked) {
        border-color: #c59b48;
        background: #fff9ed;
        color: #946b25;
    }

    .facility-filter input {
        width: 13px;
        height: 13px;
        accent-color: #b78b3d;
        cursor: pointer;
    }

    .facility-filter i {
        font-size: 14px;
    }

    /* FILTER ACTIONS */

    .venue-filter-panel .filter-actions {
        margin-top: 14px !important;
        padding-top: 12px !important;
    }

    .venue-filter-panel .filter-actions button {
        padding: 7px 16px !important;
        font-size: 12px;
    }

    /* =====================================
       FILTERED VENUE RESULTS
    ===================================== */

    .venue-grid-item {
        transition: opacity .2s ease;
    }

    .venue-grid-item.filter-hidden {
        display: none !important;
    }

    /* =====================================
       RESPONSIVE DESIGN
    ===================================== */

    @media (max-width: 767px) {
        .venue-search-box {
            flex-direction: column;
            gap: 5px;
            padding: 10px;
            border-radius: 15px;
        }

        .venue-location-wrap {
            width: 100%;
        }

        .venue-search-btn {
            width: 100%;
            min-height: 48px;
        }

        .location-suggestions {
            top: calc(100% + 5px);
        }

        .venue-filter-toolbar {
            align-items: flex-start;
            flex-direction: column;
        }

        .venue-filter-toolbar>div:last-child {
            width: 100%;
        }

        .venue-filter-panel {
            padding: 13px;
        }

        .venue-filter-panel .filter-top {
            margin-bottom: 12px !important;
        }

        .facility-filter-list {
            gap: 6px;
        }

        .facility-filter {
            padding: 7px 8px;
            font-size: 10px;
        }
    }

    @media (max-width: 380px) {
        .venue-filter-toolbar>div:last-child {
            gap: 6px !important;
        }

        .venue-filter-toolbar button {
            padding: 8px 12px !important;
            font-size: 12px;
        }
    }
</style>


<!-- 1. HERO & COMPACT SEARCH BAR -->
<section class="hero-wrap text-center" id="search-section">
    <div class="container-xl">
        <!-- Badge -->
        <div class="d-inline-flex align-items-center gap-2 px-3 py-1.5 rounded-pill bg-white bg-opacity-10 text-gold small fw-semibold mb-3">
            <i class="bi bi-shield-check"></i>
            <span>Real-Time Slot Booking Engine</span>
        </div>

        <!-- Main Heading -->
        <h1 class="hero-title mb-3">
            Book Premier <span class="text-gold">Convention Centres</span><br class="d-none d-md-block">
            with Instant Slot Locking
        </h1>

        <p class="hero-subtitle mb-4">
            Discover verified banquet halls, marriage mandapams, and auditoriums. Check date-wise slot availability and reserve instantly with zero double-booking risk.
        </p>


        <!-- SMART LOCATION SEARCH -->
        <div class="venue-search-box mx-auto mt-4">
            <div class="venue-location-wrap">
                <i class="bi bi-geo-alt-fill"></i>
                <div class="venue-location-input">
                    <label for="venueLocationSearch">Where do you want to host your event?</label>
                    <input type="text"
                        id="venueLocationSearch"
                        placeholder="Search Bengaluru, Whitefield, HSR Layout..."
                        autocomplete="off">
                </div>
                <button type="button" id="clearLocationSearch"
                    class="location-clear-btn" aria-label="Clear location">
                    <i class="bi bi-x-circle"></i>
                </button>
                <div id="locationSuggestions" class="location-suggestions"></div>
            </div>

            <button type="button" id="searchVenuesBtn"
                class="btn btn-gold venue-search-btn">
                <i class="bi bi-search me-2"></i>Search Venues
            </button>
        </div>

        <div class="location-search-note">
            <i class="bi bi-info-circle me-1"></i>
            Explore venues across Bengaluru and its neighbourhoods.
        </div>


        <!-- Trust Features Bar -->
        <div class="d-flex flex-wrap justify-content-center gap-4 mt-4 text-white-50 small">
            <span><i class="bi bi-check2-circle text-gold me-1"></i> 1,500+ Verified Halls</span>
            <span><i class="bi bi-clock-history text-gold me-1"></i> 15-Min Slot Lock</span>
            <span><i class="bi bi-wallet2 text-gold me-1"></i> Pay 25% to Reserve</span>
            <span><i class="bi bi-shield-check text-gold me-1"></i> Zero Double-Booking</span>
        </div>
    </div>
</section>

<!-- 2. VENUE CATEGORIES -->
<section class="py-5 bg-white border-bottom">
    <div class="container-xl">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold text-dark mb-1">Explore by Venue Type</h3>
                <p class="text-muted small mb-0">Choose the ideal space tailored to your event format.</p>
            </div>
        </div>

        <div class="row g-3">
            <!-- 1 -->
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#venues" class="text-decoration-none">
                    <div class="p-3 rounded-4 bg-light text-center h-100 border transition-all hover-shadow">
                        <div class="fs-2 text-gold mb-2"><i class="bi bi-bank"></i></div>
                        <h6 class="fw-bold text-dark mb-1 small">Convention</h6>
                        <small class="text-muted d-block">1,000+ Guests</small>
                    </div>
                </a>
            </div>
            <!-- 2 -->
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#venues" class="text-decoration-none">
                    <div class="p-3 rounded-4 bg-light text-center h-100 border transition-all hover-shadow">
                        <div class="fs-2 text-danger mb-2"><i class="bi bi-heart-fill"></i></div>
                        <h6 class="fw-bold text-dark mb-1 small">Mandapams</h6>
                        <small class="text-muted d-block">Weddings</small>
                    </div>
                </a>
            </div>
            <!-- 3 -->
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#venues" class="text-decoration-none">
                    <div class="p-3 rounded-4 bg-light text-center h-100 border transition-all hover-shadow">
                        <div class="fs-2 text-primary mb-2"><i class="bi bi-cup-straw"></i></div>
                        <h6 class="fw-bold text-dark mb-1 small">Banquets</h6>
                        <small class="text-muted d-block">200–800 Guests</small>
                    </div>
                </a>
            </div>
            <!-- 4 -->
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#venues" class="text-decoration-none">
                    <div class="p-3 rounded-4 bg-light text-center h-100 border transition-all hover-shadow">
                        <div class="fs-2 text-info mb-2"><i class="bi bi-mic-fill"></i></div>
                        <h6 class="fw-bold text-dark mb-1 small">Auditoriums</h6>
                        <small class="text-muted d-block">Conferences</small>
                    </div>
                </a>
            </div>
            <!-- 5 -->
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#venues" class="text-decoration-none">
                    <div class="p-3 rounded-4 bg-light text-center h-100 border transition-all hover-shadow">
                        <div class="fs-2 text-success mb-2"><i class="bi bi-tree-fill"></i></div>
                        <h6 class="fw-bold text-dark mb-1 small">Open Lawns</h6>
                        <small class="text-muted d-block">Outdoor Events</small>
                    </div>
                </a>
            </div>
            <!-- 6 -->
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#venues" class="text-decoration-none">
                    <div class="p-3 rounded-4 bg-light text-center h-100 border transition-all hover-shadow">
                        <div class="fs-2 text-secondary mb-2"><i class="bi bi-door-open-fill"></i></div>
                        <h6 class="fw-bold text-dark mb-1 small">Mini Halls</h6>
                        <small class="text-muted d-block">50–200 Guests</small>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- 3. FEATURED VENUES (HIGH IMPACT CARDS) -->
<section class="py-5 bg-light" id="venues">
    <div class="container-xl">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h3 class="fw-bold text-dark mb-1">Featured Convention Centres</h3>
                <p class="text-muted small mb-0">Verified venues with live date-wise availability.</p>
            </div>
            <a href="#search-section" class="btn btn-outline-dark btn-sm rounded-pill px-3 fw-semibold">View All</a>
        </div>


        <!-- VENUE FILTER TOOLBAR -->
        <div class="venue-filter-toolbar mb-4">

            <div>
                <!-- <h5 class="fw-bold text-dark mb-1">
                    Find Your Perfect Venue
                </h5> -->
                <!-- <p class="text-muted small mb-0">
                    Refine your search based on your event requirements.
                </p> -->
            </div>

            <div class="d-flex align-items-center gap-2 flex-wrap">
                <span class="venue-result-count" id="venueResultCount">
                    4 venues found
                </span>

                <button type="button" id="toggleVenueFilters"
                    class="btn btn-dark rounded-pill px-4">
                    <i class="bi bi-sliders2 me-2"></i>
                    Filters
                    <span id="activeFilterCount" class="filter-count-badge">0</span>
                </button>

                <button type="button" id="resetVenueFilters"
                    class="btn btn-outline-secondary rounded-pill">
                    Reset
                </button>
            </div>
        </div>

        <!-- COMPACT ADVANCED FILTER PANEL -->
        <div id="venueFilterPanel" class="venue-filter-panel mb-4">

            <!-- Header -->
            <div class="filter-top d-flex justify-content-between align-items-center">
                <div>

                    <p class="text-muted small mb-0">
                        Select your preferred venue requirements.
                    </p>
                </div>

                <button type="button" id="closeVenueFilters"
                    class="btn-close" aria-label="Close filters"></button>
            </div>

            <div class="row">

                <!-- VENUE TYPE -->
                <div class="col-6 col-md-3">
                    <label class="filter-heading">Venue Type</label>
                    <select id="filterVenueType" class="form-select">
                        <option value="">All Types</option>
                        <option value="convention">Convention Centre</option>
                        <option value="mandapam">Marriage Mandapam</option>
                        <option value="banquet">Banquet Hall</option>
                        <option value="auditorium">Auditorium</option>
                        <option value="lawn">Open Lawn</option>
                        <option value="mini">Mini Hall</option>
                    </select>
                </div>

                <!-- CAPACITY -->
                <div class="col-6 col-md-3">
                    <label class="filter-heading">Guest Capacity</label>
                    <select id="filterCapacity" class="form-select">
                        <option value="">Any Capacity</option>
                        <option value="200">200+ Guests</option>
                        <option value="500">500+ Guests</option>
                        <option value="1000">1,000+ Guests</option>
                        <option value="2000">2,000+ Guests</option>
                        <option value="2501">Above 2,000</option>
                    </select>
                </div>

                <!-- PRICE -->
                <div class="col-6 col-md-3">
                    <label class="filter-heading">Maximum Slot Price</label>
                    <select id="filterPrice" class="form-select">
                        <option value="">Any Budget</option>
                        <option value="50000">Up to ₹50,000</option>
                        <option value="100000">Up to ₹1 Lakh</option>
                        <option value="150000">Up to ₹1.5 Lakh</option>
                        <option value="200000">Up to ₹2 Lakh</option>
                        <option value="500000">Up to ₹5 Lakh</option>
                    </select>
                </div>

                <!-- RATING -->
                <div class="col-6 col-md-3">
                    <label class="filter-heading">Minimum Rating</label>
                    <select id="filterRating" class="form-select">
                        <option value="">Any Rating</option>
                        <option value="4">4+ Stars</option>
                        <option value="4.5">4.5+ Stars</option>
                        <option value="4.8">4.8+ Stars</option>
                    </select>
                </div>

                <!-- FACILITIES -->
                <div class="col-12">
                    <label class="filter-heading">Facilities & Amenities</label>

                    <div class="facility-filter-list">

                        <label class="facility-filter">
                            <input type="checkbox" value="ac" class="facility-option">
                            <i class="bi bi-snow"></i> AC
                        </label>

                        <label class="facility-filter">
                            <input type="checkbox" value="parking" class="facility-option">
                            <i class="bi bi-car-front"></i> Parking
                        </label>

                        <label class="facility-filter">
                            <input type="checkbox" value="kitchen" class="facility-option">
                            <i class="bi bi-cup-hot"></i> Kitchen
                        </label>

                        <label class="facility-filter">
                            <input type="checkbox" value="rooms" class="facility-option">
                            <i class="bi bi-door-open"></i> Guest Rooms
                        </label>

                        <label class="facility-filter">
                            <input type="checkbox" value="lawn" class="facility-option">
                            <i class="bi bi-tree"></i> Lawn
                        </label>

                        <label class="facility-filter">
                            <input type="checkbox" value="catering" class="facility-option">
                            <i class="bi bi-egg-fried"></i> Catering
                        </label>

                        <label class="facility-filter">
                            <input type="checkbox" value="valet" class="facility-option">
                            <i class="bi bi-car-front-fill"></i> Valet Parking
                        </label>

                    </div>
                </div>

            </div>

            <!-- ACTIONS -->
            <div class="filter-actions d-flex justify-content-end align-items-center gap-2 border-top">

                <button type="button" id="clearAllFilters"
                    class="btn btn-light rounded-pill">
                    Clear All
                </button>

                <button type="button" id="applyVenueFilters"
                    class="btn btn-gold rounded-pill fw-bold">
                    <i class="bi bi-check2 me-1"></i>
                    Show Results
                </button>

            </div>

        </div>

        <div class="row g-4">
            <!-- Venue 1 -->
            <div class="col-12 col-md-6 col-lg-4 venue-grid-item"
                data-type="convention"
                data-location="gachibowli hyderabad"
                data-city="hyderabad"
                data-capacity="2500"
                data-price="185000"
                data-rating="4.9"
                data-facilities="ac parking">
                <div class="venue-card-clean h-100 d-flex flex-column">
                    <div class="venue-thumb">
                        <img src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&w=700&q=80" alt="The Grand Kohinoor">
                        <span class="badge bg-success position-absolute top-0 start-0 m-3 px-2 py-1 small fw-bold">
                            <i class="bi bi-patch-check-fill me-1"></i>VERIFIED
                        </span>
                        <div class="badge-slot-price">
                            ₹1,85,000 <small class="text-white-50">/ Slot</small>
                        </div>
                    </div>
                    <div class="p-4 flex-grow-1 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-1 text-muted small">
                            <span><i class="bi bi-geo-alt-fill text-gold me-1"></i>Gachibowli, Hyderabad</span>
                            <span><i class="bi bi-star-fill text-gold me-1"></i>4.9 (184)</span>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">The Grand Kohinoor Convention Centre</h5>
                        <div class="d-flex flex-wrap gap-2 mb-3 small text-muted">
                            <span><i class="bi bi-people me-1"></i>2,500 Seated</span>
                            <span>•</span>
                            <span><i class="bi bi-p-circle me-1"></i>450 Cars</span>
                            <span>•</span>
                            <span><i class="bi bi-snow me-1"></i>Central AC</span>
                        </div>
                        <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <span class="small text-muted">
                                Advance: <strong class="text-success">25%</strong>
                            </span>

                            <div class="d-flex gap-2">
                                <a href="{{ url('/venue-details/grand-kohinoor') }}"
                                    class="btn btn-outline-dark btn-sm rounded-pill px-3 fw-semibold">
                                    View Details
                                </a>

                                <a href="{{ url('/user/login') }}"
                                    class="btn btn-gold btn-sm rounded-pill px-3 fw-bold">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Venue 2 -->
            <div class="col-12 col-md-6 col-lg-4 venue-grid-item"
                data-type="mandapam"
                data-location="t nagar chennai"
                data-city="chennai"
                data-capacity="1200"
                data-price="115000"
                data-rating="4.8"
                data-facilities="ac kitchen rooms">
                <div class="venue-card-clean h-100 d-flex flex-column">
                    <div class="venue-thumb">
                        <img src="https://images.unsplash.com/photo-1545232979-fbf68fe9b1af?auto=format&fit=crop&w=700&q=80" alt="Sri Venkateswara Kalyana Mandapam">
                        <span class="badge bg-success position-absolute top-0 start-0 m-3 px-2 py-1 small fw-bold">
                            <i class="bi bi-patch-check-fill me-1"></i>VERIFIED
                        </span>
                        <div class="badge-slot-price">
                            ₹1,15,000 <small class="text-white-50">/ Slot</small>
                        </div>
                    </div>
                    <div class="p-4 flex-grow-1 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-1 text-muted small">
                            <span><i class="bi bi-geo-alt-fill text-gold me-1"></i>T. Nagar, Chennai</span>
                            <span><i class="bi bi-star-fill text-gold me-1"></i>4.8 (142)</span>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Sri Venkateswara Kalyana Mandapam</h5>
                        <div class="d-flex flex-wrap gap-2 mb-3 small text-muted">
                            <span><i class="bi bi-people me-1"></i>1,200 Seated</span>
                            <span>•</span>
                            <span><i class="bi bi-cup-hot me-1"></i>Veg Kitchen</span>
                            <span>•</span>
                            <span><i class="bi bi-door-closed me-1"></i>22 AC Rooms</span>
                        </div>
                        <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <span class="small text-muted">
                                Advance: <strong class="text-success">25%</strong>
                            </span>

                            <div class="d-flex gap-2">
                                <a href="{{ url('/venue-details/sri-venkateswara') }}"
                                    class="btn btn-outline-dark btn-sm rounded-pill px-3 fw-semibold">
                                    View Details
                                </a>

                                <a href="{{ url('/user/login') }}"
                                    class="btn btn-gold btn-sm rounded-pill px-3 fw-bold">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Venue 3 -->
            <div class="col-12 col-md-6 col-lg-4 venue-grid-item"
                data-type="banquet"
                data-location="whitefield bengaluru bangalore"
                data-city="bengaluru"
                data-capacity="800"
                data-price="95000"
                data-rating="4.9"
                data-facilities="lawn parking valet">
                <div class="venue-card-clean h-100 d-flex flex-column">
                    <div class="venue-thumb">
                        <img src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?auto=format&fit=crop&w=700&q=80" alt="Imperial Palace Banquet">
                        <span class="badge bg-success position-absolute top-0 start-0 m-3 px-2 py-1 small fw-bold">
                            <i class="bi bi-patch-check-fill me-1"></i>VERIFIED
                        </span>
                        <div class="badge-slot-price">
                            ₹95,000 <small class="text-white-50">/ Slot</small>
                        </div>
                    </div>
                    <div class="p-4 flex-grow-1 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-1 text-muted small">
                            <span><i class="bi bi-geo-alt-fill text-gold me-1"></i>Whitefield, Bengaluru</span>
                            <span><i class="bi bi-star-fill text-gold me-1"></i>4.9 (210)</span>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Imperial Palace Banquet &amp; Lawns</h5>
                        <div class="d-flex flex-wrap gap-2 mb-3 small text-muted">
                            <span><i class="bi bi-people me-1"></i>800 Seated</span>
                            <span>•</span>
                            <span><i class="bi bi-tree me-1"></i>Lawn Attached</span>
                            <span>•</span>
                            <span><i class="bi bi-car-front me-1"></i>Valet</span>
                        </div>
                        <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <span class="small text-muted">
                                Advance: <strong class="text-success">25%</strong>
                            </span>

                            <div class="d-flex gap-2">
                                <a href="{{ url('/venue-details/imperial-palace') }}"
                                    class="btn btn-outline-dark btn-sm rounded-pill px-3 fw-semibold">
                                    View Details
                                </a>

                                <a href="{{ url('/user/login') }}"
                                    class="btn btn-gold btn-sm rounded-pill px-3 fw-bold">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Owner-submitted venue profile preview -->
            <div class="col-12 col-md-6 col-lg-4 venue-grid-item"
                data-type="convention"
                data-location="hsr layout bengaluru bangalore"
                data-city="bengaluru"
                data-capacity="1500"
                data-price="75000"
                data-rating="4.8"
                data-facilities="ac parking">
                <div class="venue-card-clean h-100 d-flex flex-column">
                    <div class="venue-thumb">
                        <img src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&w=700&q=80" alt="Sri Krishna Grand Convention Centre">
                        <span class="badge bg-success position-absolute top-0 start-0 m-3 px-2 py-1 small fw-bold">
                            <i class="bi bi-patch-check-fill me-1"></i>VERIFIED
                        </span>
                        <div class="badge-slot-price">₹75,000 <small class="text-white-50">/ Slot</small></div>
                    </div>
                    <div class="p-4 flex-grow-1 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-1 text-muted small">
                            <span><i class="bi bi-geo-alt-fill text-gold me-1"></i><span id="publicVenueLocation">HSR Layout, Bengaluru</span></span>
                            <span><i class="bi bi-star-fill text-gold me-1"></i>4.8 (96)</span>
                        </div>
                        <h5 class="fw-bold text-dark mb-2" id="publicVenueName">Sri Krishna Grand Convention Centre</h5>
                        <div class="d-flex flex-wrap gap-2 mb-3 small text-muted">
                            <span><i class="bi bi-people me-1"></i><span id="publicVenueCapacity">1,500 Seated</span></span>
                            <span>•</span>
                            <span><i class="bi bi-snow me-1"></i>Central AC</span>
                            <span>•</span>
                            <span><i class="bi bi-car-front me-1"></i>300 Parking</span>
                        </div>
                        <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <span class="small text-muted">
                                Advance: <strong class="text-success">25%</strong>
                            </span>

                            <div class="d-flex gap-2">
                                <a href="{{ url('/venue-details/sri-krishna-grand') }}"
                                    class="btn btn-outline-dark btn-sm rounded-pill px-3 fw-semibold">
                                    View Details
                                </a>

                                <a href="{{ url('/user/login') }}"
                                    class="btn btn-gold btn-sm rounded-pill px-3 fw-bold">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const savedVenueProfile = localStorage.getItem('bookMySlotsOwnerProfile');

    if (savedVenueProfile) {
        const venueProfile = JSON.parse(savedVenueProfile);
        document.getElementById('publicVenueName').textContent = venueProfile.name;
        document.getElementById('publicVenueLocation').textContent = `${venueProfile.area}, ${venueProfile.city}`;
        document.getElementById('publicVenueCapacity').textContent = `${Number(venueProfile.capacity).toLocaleString()} Seated`;
        document.getElementById('publicVenueAdvance').textContent = `${venueProfile.advance}%`;
    }


    document.addEventListener('DOMContentLoaded', function() {

        const venueCards = Array.from(
            document.querySelectorAll('.venue-grid-item')
        );

        const locationInput = document.getElementById('venueLocationSearch');
        const suggestionsBox = document.getElementById('locationSuggestions');
        const clearLocationBtn = document.getElementById('clearLocationSearch');

        const filterPanel = document.getElementById('venueFilterPanel');
        const filterButton = document.getElementById('toggleVenueFilters');

        const typeFilter = document.getElementById('filterVenueType');
        const capacityFilter = document.getElementById('filterCapacity');
        const priceFilter = document.getElementById('filterPrice');
        const ratingFilter = document.getElementById('filterRating');

        const resultCount = document.getElementById('venueResultCount');
        const activeFilterCount = document.getElementById('activeFilterCount');

        let selectedLocation = '';

        // =====================================
        // EXISTING OWNER PROFILE FUNCTIONALITY

        const savedVenueProfile = localStorage.getItem(
            'bookMySlotsOwnerProfile'
        );

        if (savedVenueProfile) {
            try {
                const venueProfile = JSON.parse(savedVenueProfile);

                const name = document.getElementById('publicVenueName');
                const location = document.getElementById('publicVenueLocation');
                const capacity = document.getElementById('publicVenueCapacity');
                const advance = document.getElementById('publicVenueAdvance');

                if (name) name.textContent = venueProfile.name;
                if (location) {
                    location.textContent =
                        `${venueProfile.area}, ${venueProfile.city}`;
                }

                if (capacity) {
                    capacity.textContent =
                        `${Number(venueProfile.capacity).toLocaleString()} Seated`;
                }

                if (advance) {
                    advance.textContent = `${venueProfile.advance}%`;
                }

                // Update searchable attributes of owner-submitted venue.
                const ownerCard = document.querySelector(
                    '.venue-grid-item:has(#publicVenueName)'
                );

                if (ownerCard) {
                    ownerCard.dataset.location =
                        `${venueProfile.area} ${venueProfile.city}`;

                    ownerCard.dataset.city = venueProfile.city;
                    ownerCard.dataset.capacity = venueProfile.capacity;
                }

            } catch (error) {
                console.error('Unable to read saved venue profile:', error);
            }
        }

        // BENGALURU LOCATION SUGGESTIONS

        const bengaluruLocations = [
            'Bengaluru',
            'Bangalore',
            'Whitefield',
            'HSR Layout',
            'Electronic City',
            'Sarjapur Road',
            'Marathahalli',
            'Indiranagar',
            'Koramangala',
            'Jayanagar',
            'JP Nagar',
            'Banashankari',
            'Basavanagudi',
            'Rajajinagar',
            'Malleshwaram',
            'Hebbal',
            'Yelahanka',
            'Bannerghatta Road',
            'BTM Layout',
            'Bellandur',
            'Mahadevapura',
            'KR Puram',
            'Vijayanagar',
            'RR Nagar',
            'Kengeri',
            'Devanahalli',
            'Hennur',
            'Thanisandra',
            'Domlur',
            'MG Road',
            'HSR Sector 1',
            'HSR Sector 2',
            'HSR Sector 3',
            'HSR Sector 4',
            'HSR Sector 5',
            'HSR Sector 6',
            'HSR Sector 7'
        ];

        function normalizeLocation(value) {
            return value
                .toLowerCase()
                .trim()
                .replace(/bangalore/g, 'bengaluru')
                .replace(/[^a-z0-9\s]/g, ' ')
                .replace(/\s+/g, ' ');
        }

        function showSuggestions(query) {

            suggestionsBox.innerHTML = '';

            if (!query.trim()) {
                suggestionsBox.classList.remove('show');
                return;
            }

            const normalizedQuery = normalizeLocation(query);

            const matches = bengaluruLocations.filter(location =>
                normalizeLocation(location).includes(normalizedQuery)
            ).slice(0, 8);

            if (!matches.length) {
                suggestionsBox.classList.remove('show');
                return;
            }

            matches.forEach(location => {

                const item = document.createElement('div');

                item.className = 'location-suggestion-item';

                const icon = document.createElement('i');
                icon.className = 'bi bi-geo-alt';

                const text = document.createElement('span');
                text.textContent = location;

                item.append(icon, text);

                item.addEventListener('click', function() {

                    locationInput.value = location;
                    selectedLocation = location;

                    suggestionsBox.classList.remove('show');

                    applyFilters();
                });

                suggestionsBox.appendChild(item);
            });

            suggestionsBox.classList.add('show');
        }

        locationInput.addEventListener('input', function() {

            selectedLocation = '';

            clearLocationBtn.style.display =
                this.value ? 'block' : 'none';

            showSuggestions(this.value);
        });

        locationInput.addEventListener('focus', function() {
            if (this.value) showSuggestions(this.value);
        });

        clearLocationBtn.addEventListener('click', function() {

            locationInput.value = '';
            selectedLocation = '';

            this.style.display = 'none';
            suggestionsBox.classList.remove('show');

            applyFilters();
        });

        document.addEventListener('click', function(event) {

            if (!event.target.closest('.venue-location-wrap')) {
                suggestionsBox.classList.remove('show');
            }
        });

        // FILTER PANEL OPEN / CLOSE

        filterButton.addEventListener('click', function() {
            filterPanel.classList.toggle('show');
        });

        document.getElementById('closeVenueFilters')
            .addEventListener('click', function() {
                filterPanel.classList.remove('show');
            });

        // SEARCH AND FILTER FUNCTION

        function applyFilters() {

            const location = normalizeLocation(
                selectedLocation || locationInput.value
            );

            const type = typeFilter.value;

            const capacity = capacityFilter.value;
            const maxPrice = priceFilter.value;
            const minRating = ratingFilter.value;

            const selectedFacilities = Array.from(
                document.querySelectorAll('.facility-option:checked')
            ).map(input => input.value);

            let visibleCount = 0;

            venueCards.forEach(card => {

                const cardLocation = normalizeLocation(
                    card.dataset.location || ''
                );

                const cardType = card.dataset.type || '';

                const cardCapacity = Number(card.dataset.capacity || 0);
                const cardPrice = Number(card.dataset.price || 0);
                const cardRating = Number(card.dataset.rating || 0);

                const cardFacilities = (
                    card.dataset.facilities || ''
                ).split(/\s+/).filter(Boolean);

                // Location matching
                const locationMatch = !location ||
                    cardLocation.includes(location) ||
                    (
                        location === 'bengaluru' &&
                        card.dataset.city === 'bengaluru'
                    );

                // Venue type matching
                const typeMatch = !type || cardType === type;

                // Capacity: show venues that can accommodate the selected guest count.
                const capacityMatch = !capacity ||
                    (
                        capacity === '2501' ?
                        cardCapacity > 2000 :
                        cardCapacity >= Number(capacity)
                    );

                // Price matching
                const priceMatch = !maxPrice ||
                    cardPrice <= Number(maxPrice);

                // Rating matching
                const ratingMatch = !minRating ||
                    cardRating >= Number(minRating);

                // All selected facilities must be available
                const facilitiesMatch = selectedFacilities.every(
                    facility => cardFacilities.includes(facility)
                );

                const isMatch =
                    locationMatch &&
                    typeMatch &&
                    capacityMatch &&
                    priceMatch &&
                    ratingMatch &&
                    facilitiesMatch;

                card.classList.toggle('filter-hidden', !isMatch);

                if (isMatch) visibleCount++;
            });

            resultCount.textContent =
                `${visibleCount} ${visibleCount === 1 ? 'venue' : 'venues'} found`;

            const activeCount =
                (location ? 1 : 0) +
                (type ? 1 : 0) +
                (capacity ? 1 : 0) +
                (maxPrice ? 1 : 0) +
                (minRating ? 1 : 0) +
                selectedFacilities.length;

            activeFilterCount.textContent = activeCount;

            clearLocationBtn.style.display =
                locationInput.value ? 'block' : 'none';
        }

        // SEARCH BUTTON

        document.getElementById('searchVenuesBtn')
            .addEventListener('click', function() {

                selectedLocation = locationInput.value;

                suggestionsBox.classList.remove('show');

                applyFilters();

                document.getElementById('venues').scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            });

        locationInput.addEventListener('keydown', function(event) {

            if (event.key === 'Enter') {
                event.preventDefault();

                selectedLocation = this.value;
                suggestionsBox.classList.remove('show');

                applyFilters();

                document.getElementById('venues').scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });

        // APPLY FILTER BUTTON

        document.getElementById('applyVenueFilters')
            .addEventListener('click', function() {

                applyFilters();

                filterPanel.classList.remove('show');

                document.getElementById('venues').scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            });

        // CLEAR ALL FILTERS

        function resetFilters() {

            typeFilter.value = '';
            capacityFilter.value = '';
            priceFilter.value = '';
            ratingFilter.value = '';

            document.querySelectorAll('.facility-option')
                .forEach(input => input.checked = false);

            locationInput.value = '';
            selectedLocation = '';

            clearLocationBtn.style.display = 'none';

            suggestionsBox.classList.remove('show');

            applyFilters();
        }

        document.getElementById('clearAllFilters')
            .addEventListener('click', resetFilters);

        document.getElementById('resetVenueFilters')
            .addEventListener('click', resetFilters);

        // Initial result count
        applyFilters();

    });
</script>

<!-- 4. HOW IT WORKS (3 SIMPLE STEPS)-->
<section class="py-5 bg-white border-top border-bottom" id="how-it-works">
    <div class="container-xl">
        <div class="text-center mb-5">
            <h3 class="fw-bold text-dark mb-2">How It Works</h3>
            <p class="text-muted small">Book your event slot in 3 simple steps.</p>
        </div>

        <div class="row g-4">
            <!-- Step 1 -->
            <div class="col-12 col-md-4">
                <div class="step-clean-box">
                    <div class="step-number">01</div>
                    <h5 class="fw-bold mb-2">Search &amp; Compare</h5>
                    <p class="text-muted small mb-0">Browse verified convention centres, check guest capacity, amenities, and transparent slot rates.</p>
                </div>
            </div>
            <!-- Step 2 -->
            <div class="col-12 col-md-4">
                <div class="step-clean-box">
                    <div class="step-number">02</div>
                    <h5 class="fw-bold mb-2">Select Date &amp; Slot</h5>
                    <p class="text-muted small mb-0">Pick morning, evening, or full-day slots. Add catering, decoration, or audio-visual options.</p>
                </div>
            </div>
            <!-- Step 3 -->
            <div class="col-12 col-md-4">
                <div class="step-clean-box">
                    <div class="step-number">03</div>
                    <h5 class="fw-bold mb-2">Lock with 25% Advance</h5>
                    <p class="text-muted small mb-0">Lock your slot securely for 15 minutes during payment and receive instant digital confirmation.</p>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Vendor Register Modal -->
<div class="modal fade" id="vendorRegisterModal" tabindex="-1" aria-labelledby="vendorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header bg-dark text-white p-4 border-0">
                <h5 class="modal-title fw-bold" id="vendorModalLabel">Register Your Venue</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 bg-light">
                <form onsubmit="event.preventDefault(); alert('Thank you! Our onboarding team will contact you within 24 hours.');">
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Convention Centre / Hall Name</label>
                        <input type="text" class="form-control" placeholder="e.g. Royal Palace Hall" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">City</label>
                        <input type="text" class="form-control" placeholder="e.g. Hyderabad" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Contact Mobile</label>
                        <input type="tel" class="form-control" placeholder="10-digit number" required>
                    </div>
                    <button type="submit" class="btn btn-gold w-100 py-2.5 fw-bold rounded-3">
                        Submit for Verification
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection