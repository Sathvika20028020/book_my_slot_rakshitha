<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper d-flex align-items-center gap-2 py-3 px-3">
            <a href="{{ route('center_admin.dashboard') }}" class="d-flex align-items-center gap-2 text-decoration-none">
                <div style="width: 36px; height: 36px; border-radius: 10px; background: #2563EB; display: flex; align-items: center; justify-content: center; color: #FFFFFF; font-size: 1.2rem; font-weight: bold;">
                    <i class="bi bi-buildings-fill"></i>
                </div>
                <div class="d-flex flex-column">
                    <span class="fw-bold text-dark fs-6" style="letter-spacing: -0.5px;">Book Slots</span>
                    <span style="font-size: 0.68rem; color: #2563EB; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">Center Admin Portal</span>
                </div>
            </a>
            <div class="back-btn ms-auto">
                <i class="fa fa-angle-left"></i>
            </div>
        </div>

        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <div class="mobile-back text-end">
                            <span>Back</span>
                            <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                        </div>
                    </li>

                    <!-- Dashboard -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ request()->is('*dashboard*') ? 'active' : '' }}"
                            href="{{ route('center_admin.dashboard') }}">
                            <span><i class="bi bi-speedometer2 me-2"></i></span>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <!-- Convention Centres -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ request()->is('*convention-centre*') ? 'active' : '' }}"
                            href="{{ route('center_admin.convention-centres.index') }}">
                            <span><i class="bi bi-buildings-fill me-2"></i></span>
                            <span>Convention Centres</span>
                        </a>
                    </li>

                    <!-- Bookings (with Approve / Reject option for CC) -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ request()->is('*booking*') ? 'active' : '' }}"
                            href="{{ route('center_admin.bookings.index') }}">
                            <span><i class="bi bi-calendar2-check-fill me-2"></i></span>
                            <span>Bookings</span>
                            <span class="badge rounded-pill bg-warning text-dark ms-auto py-1 px-2" style="font-size: 0.68rem; font-weight: 700;">3 New</span>
                        </a>
                    </li>

                    <!-- Calendar (Slot Availability & Block Dates) -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ request()->is('*calendar*') ? 'active' : '' }}"
                            href="{{ route('center_admin.calendar.index') }}">
                            <span><i class="bi bi-calendar3 me-2"></i></span>
                            <span>Calendar</span>
                        </a>
                    </li>

                    <!-- Payments & Settlements (Index & View) -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ request()->is('*payment*') ? 'active' : '' }}"
                            href="{{ route('center_admin.payments.index') }}">
                            <span><i class="bi bi-credit-card-2-front-fill me-2"></i></span>
                            <span>Payments</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
