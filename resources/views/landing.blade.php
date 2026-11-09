@extends('layouts.main')

@section('title', 'Book My Slot – Premier Convention Centre & Banquet Hall Booking')
@section('meta_description', 'Discover and book convention centres, banquet halls, and wedding mandapams with real-time slot locking.')

@section('content')

<!-- =========================================================================
     1. HERO & COMPACT SEARCH BAR
     ========================================================================= -->
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

       

        <!-- Trust Features Bar -->
        <div class="d-flex flex-wrap justify-content-center gap-4 mt-4 text-white-50 small">
            <span><i class="bi bi-check2-circle text-gold me-1"></i> 1,500+ Verified Halls</span>
            <span><i class="bi bi-clock-history text-gold me-1"></i> 15-Min Slot Lock</span>
            <span><i class="bi bi-wallet2 text-gold me-1"></i> Pay 25% to Reserve</span>
            <span><i class="bi bi-shield-check text-gold me-1"></i> Zero Double-Booking</span>
        </div>
    </div>
</section>

<!-- =========================================================================
     2. VENUE CATEGORIES
     ========================================================================= -->
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

<!-- =========================================================================
     3. FEATURED VENUES (HIGH IMPACT CARDS)
     ========================================================================= -->
<section class="py-5 bg-light" id="venues">
    <div class="container-xl">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h3 class="fw-bold text-dark mb-1">Featured Convention Centres</h3>
                <p class="text-muted small mb-0">Verified venues with live date-wise availability.</p>
            </div>
            <a href="#search-section" class="btn btn-outline-dark btn-sm rounded-pill px-3 fw-semibold">View All</a>
        </div>

        <div class="row g-4">
            <!-- Venue 1 -->
            <div class="col-12 col-md-6 col-lg-4">
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
                        <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                            <span class="small text-muted">Advance: <strong class="text-success">25% (₹46,250)</strong></span>
                            <button class="btn btn-gold btn-sm rounded-pill px-3 fw-bold" onclick="alert('Slot availability check: 2 morning slots and 1 evening slot available this week!');">
                                Check Slots
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Venue 2 -->
            <div class="col-12 col-md-6 col-lg-4">
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
                        <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                            <span class="small text-muted">Advance: <strong class="text-success">30% (₹34,500)</strong></span>
                            <button class="btn btn-gold btn-sm rounded-pill px-3 fw-bold" onclick="alert('Slot availability check: Morning and evening slots available on selected dates!');">
                                Check Slots
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Venue 3 -->
            <div class="col-12 col-md-6 col-lg-4">
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
                        <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                            <span class="small text-muted">Advance: <strong class="text-success">25% (₹23,750)</strong></span>
                            <button class="btn btn-gold btn-sm rounded-pill px-3 fw-bold" onclick="alert('Slot availability check: Evening reception slot open for instant booking!');">
                                Check Slots
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Owner-submitted venue profile preview -->
            <div class="col-12 col-md-6 col-lg-4">
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
                        <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                            <span class="small text-muted">Advance: <strong class="text-success" id="publicVenueAdvance">25%</strong></span>
                            <button class="btn btn-gold btn-sm rounded-pill px-3 fw-bold" type="button" onclick="alert('Slot availability check: Morning and evening slots available on selected dates!');">Check Slots</button>
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
</script>

<!-- =========================================================================
     4. HOW IT WORKS (3 SIMPLE STEPS)
     ========================================================================= -->
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
