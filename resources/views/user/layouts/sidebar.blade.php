
<div id="menu-main"
     class="menu menu-box-right menu-box-detached rounded-m"
     data-menu-width="280"
     data-menu-effect="menu-over">

    <div class="menu-title mt-3">
        <h1>Book My Slot</h1>
        <p style="padding-top: 10px; font-weight: 500;">User Portal</p>

        <a href="#" class="close-menu">
            <i class="fa fa-times"></i>
        </a>
    </div>

    <div class="content">

        <div class="list-group list-custom-small">

            <a href="{{ url('/user/bookings') }}">
                <i class="fa fa-calendar-alt"></i>
                <span>My Bookings</span>
                <i class="fa fa-angle-right"></i>
            </a>
    
            <a href="{{ url('/user/profile') }}">
                <i class="fa fa-user"></i>
                <span>My Profile</span>
                <i class="fa fa-angle-right"></i>
            </a>


        </div>

        <div class="divider mt-3 mb-3"></div>

        <a href="{{ url('/logout') }}"
           class="btn btn-full btn-m rounded-s"
           style="background:#0A0F1D;color:#F59E0B;font-weight:700;">
            <i class="fa fa-sign-out-alt me-2"></i>
            Logout
        </a>

    </div>
</div>
