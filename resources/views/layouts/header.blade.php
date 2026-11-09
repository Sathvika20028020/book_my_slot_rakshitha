<!-- Clean, Modern & Sleek Header -->
<header class="sticky-top site-header">
    <nav class="navbar navbar-expand-lg navbar-dark site-navbar py-3">
        <div class="container-xl">
            <!-- Brand Logo -->
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
                <div class="brand-icon">
                    <i class="bi bi-buildings-fill"></i>
                </div>
                <span class="brand-text">Book<span class="text-gold">My</span>Slots</span>
            </a>

            <!-- Mobile Menu Toggle -->
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list fs-2 text-white"></i>
            </button>

            <!-- Navbar Links & Actions -->
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-lg-4">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#venues">Venues</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#how-it-works">How It Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#for-owners">For Venue Owners</a>
                    </li>
                </ul>

                <!-- Right Side Actions -->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    

                    <!-- Register Page Link -->
                    <a href="{{ route('register') }}" class="btn btn-outline-warning btn-sm rounded-pill px-3 py-2 fw-semibold">
                        <i class="bi bi-person-plus me-1"></i> Register
                    </a>

                    <!-- <a href="{{ route('owner.login') }}" class="btn btn-gold btn-sm rounded-pill px-3 py-2 fw-semibold">
                        <i class="bi bi-buildings me-1"></i> Owner Login
                    </a> -->

                    
                </div>
            </div>
        </div>
    </nav>
</header>
