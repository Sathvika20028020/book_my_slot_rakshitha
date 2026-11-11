
@extends('layouts.user')

@section('title', 'Dashboard | Book My Slot')

@section('content')

    <!-- Welcome Banner -->
    <div class="bms-welcome">

        <div>
            <h2>Welcome to Book My Slot</h2>
            <p>Manage your convention centre bookings easily.</p>
        </div>

        <div class="bms-welcome-icon">
            <i class="fa fa-calendar-check"></i>
        </div>

    </div>

    <!-- Booking Overview -->
    <div class="content mt-0">

        <h5 class="bms-section-title">My Booking Overview</h5>

        <div class="row mb-0">

            <div class="col-6 mb-3">
                <div class="bms-stat-card">
                    <div class="bms-stat-icon">
                        <i class="fa fa-clock"></i>
                    </div>
                    <div class="bms-stat-info">
                        <h3>0</h3>
                        <p>Pending Requests</p>
                    </div>
                </div>
            </div>

            <div class="col-6 mb-3">
                <div class="bms-stat-card">
                    <div class="bms-stat-icon">
                        <i class="fa fa-calendar-check"></i>
                    </div>
                    <div class="bms-stat-info">
                        <h3>0</h3>
                        <p>Confirmed Bookings</p>
                    </div>
                </div>
            </div>

            <div class="col-6 mb-3">
                <div class="bms-stat-card">
                    <div class="bms-stat-icon">
                        <i class="fa fa-credit-card"></i>
                    </div>
                    <div class="bms-stat-info">
                        <h3>0</h3>
                        <p>Payments</p>
                    </div>
                </div>
            </div>

            <div class="col-6 mb-3">
                <div class="bms-stat-card">
                    <div class="bms-stat-icon">
                        <i class="fa fa-file-invoice"></i>
                    </div>
                    <div class="bms-stat-info">
                        <h3>0</h3>
                        <p>Invoices</p>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Quick Actions -->
    <div class="content mt-3">

        <h5 class="bms-section-title">Quick Actions</h5>

        <div class="bms-action-card">

            <a href="{{ url('/user/centres') }}" class="bms-action-item">

                <div class="bms-action-icon">
                    <i class="fa fa-building"></i>
                </div>

                <div class="bms-action-info">
                    <h5>Explore Convention Centres</h5>
                    <p>View available centres and details</p>
                </div>

                <i class="fa fa-chevron-right bms-action-arrow"></i>

            </a>

            <a href="{{ url('/user/availability') }}" class="bms-action-item">

                <div class="bms-action-icon">
                    <i class="fa fa-calendar-alt"></i>
                </div>

                <div class="bms-action-info">
                    <h5>Check Availability</h5>
                    <p>Select your preferred booking date</p>
                </div>

                <i class="fa fa-chevron-right bms-action-arrow"></i>

            </a>

            <a href="{{ url('/user/booking-requests') }}" class="bms-action-item">

                <div class="bms-action-icon">
                    <i class="fa fa-clipboard-list"></i>
                </div>

                <div class="bms-action-info">
                    <h5>My Booking Requests</h5>
                    <p>Track your booking request status</p>
                </div>

                <i class="fa fa-chevron-right bms-action-arrow"></i>

            </a>

            <a href="{{ url('/user/bookings') }}" class="bms-action-item">

                <div class="bms-action-icon">
                    <i class="fa fa-calendar-check"></i>
                </div>

                <div class="bms-action-info">
                    <h5>My Bookings</h5>
                    <p>View your confirmed bookings</p>
                </div>

                <i class="fa fa-chevron-right bms-action-arrow"></i>

            </a>

        </div>

    </div>

@endsection
