<!-- Simple, Elegant & High-Impact Footer -->
<footer class="site-footer pt-5 pb-4">
    <div class="container-xl">
        <div class="row g-4 g-lg-5 justify-content-between mb-5">
            <!-- Brand Column -->
            <div class="col-12 col-lg-4">
                <a class="d-flex align-items-center gap-2 text-decoration-none mb-3" href="{{ url('/') }}">
                    <div class="brand-icon">
                        <i class="bi bi-buildings-fill"></i>
                    </div>
                    <span class="brand-text text-white">Book<span class="text-gold">My</span>Slots</span>
                </a>
                <p class=" small mb-4 pe-lg-4 text-white">
                    The modern marketplace for booking premier convention centres, banquet halls, and marriage mandapams with guaranteed real-time slot locking.
                </p>
                <!-- Social Links -->
                <div class="d-flex align-items-center gap-2">
                    <a href="#" class="social-btn" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="social-btn" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="social-btn" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    <a href="#" class="social-btn" aria-label="X"><i class="bi bi-twitter-x"></i></a>
                </div>
            </div>

            <!-- Venues -->
            <div class="col-6 col-md-3 col-lg-2">
                <h6 class="footer-title">Venue Types</h6>
                <ul class="list-unstyled footer-menu">
                    <li><a href="#venues">Convention Centres</a></li>
                    <li><a href="#venues">Kalyana Mandapams</a></li>
                    <li><a href="#venues">Banquet Halls</a></li>
                    <li><a href="#venues">Auditoriums</a></li>
                    <li><a href="#venues">Open Lawns</a></li>
                </ul>
            </div>

            <!-- Quick Links -->
            <div class="col-6 col-md-3 col-lg-2">
                <h6 class="footer-title">Quick Links</h6>
                <ul class="list-unstyled footer-menu">
                    <li><a href="#venues">Explore Venues</a></li>
                    <li><a href="#how-it-works">How It Works</a></li>
                    <li><a href="#for-owners">List Your Venue</a></li>
                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#registerModal">Register Account</a></li>
                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Sign In</a></li>
                    <li><a href="#">Cancellation Policy</a></li>
                </ul>
            </div>

            <!-- Contact & Cities -->
            <div class="col-12 col-md-6 col-lg-3">
                <h6 class="footer-title">Booking Desk</h6>
                <p class="text-white small mb-2">Need help choosing a venue?</p>
                <a href="tel:18002665668" class="d-inline-flex align-items-center gap-2 text-gold text-decoration-none fw-bold fs-6 mb-3">
                    <i class="bi bi-telephone-fill"></i> 1800-266-5668
                </a>
                <div class="text-white small">
                    <i class="bi bi-geo-alt-fill text-gold me-1"></i> Serving Hyderabad, Bengaluru, Chennai, Mumbai &amp; Delhi-NCR
                </div>
            </div>
        </div>

        <hr class="footer-divider mb-4">

        <!-- Bottom Copyright -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 text-white small">
            <div>
                © {{ date('Y') }} <strong>Book My Slot</strong>. All rights reserved.
            </div>
            <div class="d-flex align-items-center gap-3">
                <span><i class="bi bi-shield-check text-success me-1"></i> 100% Verified Venues</span>
                <span><i class="bi bi-lock-fill text-gold me-1"></i> Secure Real-Time Slot Lock</span>
            </div>
        </div>
    </div>
</footer>
