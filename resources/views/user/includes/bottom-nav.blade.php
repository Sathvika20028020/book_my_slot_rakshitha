
<nav id="footer-bar">

    <a href="{{ url('/user/dashboard') }}"
       class="{{ request()->is('user/dashboard') ? 'active-nav' : '' }}">
        <i class="fa fa-home"></i>
        <span>Home</span>
    </a>

    <a href="{{ url('/user/center') }}"
   class="{{ request()->is('user/center*') ? 'active-nav' : '' }}">
    <i class="fa fa-map-marker-alt"></i>
    <span>Centres</span>
</a>

    <a href="{{ url('/user/bookings') }}"
       class="{{ request()->is('user/bookings*') ? 'active-nav' : '' }}">
        <i class="fa fa-calendar-alt"></i>
        <span>Bookings</span>
    </a>

    <a href="{{ url('/user/payments') }}"
       class="{{ request()->is('user/payments*') ? 'active-nav' : '' }}">
        <i class="fa fa-credit-card"></i>
        <span>Payments</span>
    </a>

    <!-- <a href="{{ url('/user/profile') }}"
       class="{{ request()->is('user/profile*') ? 'active-nav' : '' }}">
        <i class="fa fa-user"></i>
        <span>Profile</span>
    </a> -->

</nav>
