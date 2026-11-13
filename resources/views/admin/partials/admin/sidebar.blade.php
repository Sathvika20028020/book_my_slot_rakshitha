<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper d-flex align-items-center gap-2 py-3 px-3">
            <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-2 text-decoration-none">
                <div style="width: 36px; height: 36px; border-radius: 10px; background: #F59E0B; display: flex; align-items: center; justify-content: center; color: #0A0F1D; font-size: 1.2rem; font-weight: bold;">
                    <i class="bi bi-buildings-fill"></i>
                </div>
                <div class="d-flex flex-column">
                    <span class="fw-bold text-dark fs-6" style="letter-spacing: -0.5px;">Book Slots</span>
                    <span style="font-size: 0.68rem; color: #94A3B8; text-transform: uppercase; letter-spacing: 0.5px;">Admin Portal</span>
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
                        <a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                            href="{{ route('admin.dashboard') }}">
                            <span><i class="bi bi-speedometer2 me-2"></i></span>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <!-- Applications (User Registrations) -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('admin.application.*') ? 'active' : '' }}"
                            href="{{ route('admin.application.index') }}">
                            <span><i class="bi bi-file-earmark-person-fill me-2"></i></span>
                            <span>Applications</span>

                        </a>
                    </li>

                    <!-- Bookings -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}"
                            href="{{ route('admin.bookings.index') }}">
                            <span><i class="bi bi-calendar2-check-fill me-2"></i></span>
                            <span>Bookings</span>
                        </a>
                    </li>

                    <!-- Convention Centres (Vendors & Credentials) -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('admin.convention-centres.index.*') ? 'active' : '' }}"
                            href="{{ route('admin.convention-centres.index') }}">
                            <span><i class="bi bi-buildings-fill me-2"></i></span>
                            <span>Convention Centres</span>
                            
                        </a>
                    </li>

                    <!-- Conventional Centre Masters -->
                      <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title d-flex flex-row gap-2" href="#">
                            <span><i class="bi bi-gear-fill"></i></span>
                            <span>Master</span>
                        </a>

                        <ul class="sidebar-submenu">

                            <li>
                                <a class="sidebar-link "
                                    href="{{ route('admin.centers.index') }}">
                                    <i class="bi bi-diagram-3-fill me-2"></i> Centers
                                </a>
                            </li>
                           

                           

                           

                           

                           

                           

                        </ul>
                    </li>

                   


                   
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>


