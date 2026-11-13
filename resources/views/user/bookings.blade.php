
@extends('layouts.user')

@section('title', 'My Bookings | Book My Slot')

@section('content')

<style>
    .bookings-page {
        padding: 20px 15px 35px;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .bookings-title {
        font-size: 23px;
        font-weight: 800;
        color: #0A0F1D;
        margin-bottom: 5px;
    }

    .bookings-subtitle {
        font-size: 14px;
        color: #64748b;
        margin-bottom: 22px;
    }

    .booking-summary {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
        margin-bottom: 24px;
    }

    .summary-card {
        background: #fff;
        border: 1px solid #E2E8F0;
        border-radius: 13px;
        padding: 14px 10px;
    }

    .summary-card h3 {
        font-size: 23px;
        font-weight: 800;
        color: #0A0F1D;
        margin: 0 0 5px;
    }

    .summary-card p {
        font-size: 11px;
        font-weight: 600;
        color: #64748b;
        margin: 0;
    }

    .booking-section-title {
        font-size: 17px;
        font-weight: 800;
        color: #0A0F1D;
        margin-bottom: 14px;
    }

    .booking-card {
        background: #fff;
        border: 1px solid #E2E8F0;
        border-radius: 15px;
        padding: 16px;
        margin-bottom: 15px;
    }

    .booking-card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 8px;
        margin-bottom: 7px;
    }

    .booking-card h5 {
        font-size: 15px;
        font-weight: 800;
        color: #0A0F1D;
        margin: 0;
    }

    .booking-id {
        font-size: 12px;
        color: #94a3b8;
        margin-bottom: 14px;
    }

    .status {
        padding: 6px 9px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 800;
        white-space: nowrap;
    }

    .status-confirmed {
        color: #166534;
        background: #dcfce7;
    }

    .status-pending {
        color: #92400e;
        background: #fef3c7;
    }

    .status-cancelled {
        color: #991b1b;
        background: #fee2e2;
    }

    .booking-details {
        border-top: 1px solid #f1f5f9;
        padding-top: 10px;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        gap: 10px;
        padding: 7px 0;
        font-size: 13px;
    }

    .detail-row span {
        color: #64748b;
    }

    .detail-row strong {
        color: #0A0F1D;
        font-weight: 700;
        text-align: right;
    }

    .payment-paid {
        color: #15803d !important;
    }

    .payment-pending {
        color: #d97706 !important;
    }

    .booking-button {
        display: block;
        width: 100%;
        text-align: center;
        background: #0A0F1D;
        color: #F59E0B !important;
        border-radius: 9px;
        padding: 12px;
        font-size: 13px;
        font-weight: 800;
        text-decoration: none;
        margin-top: 14px;
    }

    .booking-button:active {
        background: #1e293b;
    }

    .booking-filter {
        display: flex;
        gap: 9px;
        overflow-x: auto;
        padding-bottom: 15px;
        margin-bottom: 5px;
    }

    .filter-item {
        border: 1px solid #E2E8F0;
        border-radius: 25px;
        padding: 8px 15px;
        color: #64748b;
        font-size: 12px;
        font-weight: 700;
        white-space: nowrap;
        background: #fff;
    }

    .filter-item.active {
        background: #0A0F1D;
        color: #F59E0B;
        border-color: #0A0F1D;
    }

    @media(max-width: 380px) {
        .summary-card h3 {
            font-size: 19px;
        }

        .summary-card p {
            font-size: 10px;
        }

        .booking-card h5 {
            font-size: 13px;
        }
    }

    .status-completed {
    color: #166534;
    background: #dcfce7;
}
</style>

<div class="bookings-page">

    <h2 class="bookings-title">My Bookings</h2>

    <p class="bookings-subtitle">
        Manage and track your convention centre bookings.
    </p>

    <!-- SUMMARY -->
    <div class="booking-summary">

        <div class="summary-card">
            <h3>05</h3>
            <p>Total Bookings</p>
        </div>

        <div class="summary-card">
            <h3>02</h3>
            <p>Confirmed</p>
        </div>

        <div class="summary-card">
            <h3>02</h3>
            <p>Pending</p>
        </div>

    </div>

    <!-- FILTERS -->
    <div class="booking-filter">
        <button class="filter-item active" type="button" onclick="filterBookings('all', this)">All</button>
        <button class="filter-item" type="button" onclick="filterBookings('confirmed', this)">Confirmed</button>
        <button class="filter-item" type="button" onclick="filterBookings('pending', this)">Pending</button>
        <button class="filter-item" type="button" onclick="filterBookings('cancelled', this)">Cancelled</button>
        <button class="filter-item" type="button"
    onclick="filterBookings('completed', this)">Completed</button>
    </div>

    <h5 class="booking-section-title">Your Booking History</h5>

    <!-- BOOKING 1 -->
    <div class="booking-card" data-status="confirmed">

        <div class="booking-card-header">
            <h5>Sri Convention Centre</h5>
            <span class="status status-confirmed">Confirmed</span>
        </div>

        <div class="booking-id">Booking ID: BMS-1001</div>

        <div class="booking-details">
            <div class="detail-row">
                <span>Event Date</span>
                <strong>25 December 2026</strong>
            </div>

            <div class="detail-row">
                <span>Event Type</span>
                <strong>Wedding</strong>
            </div>

            <div class="detail-row">
                <span>Booking Amount</span>
                <strong>₹25,000</strong>
            </div>

            <div class="detail-row">
                <span>Payment Status</span>
                <strong class="payment-paid">Paid</strong>
            </div>
        </div>

        <a href="#" class="booking-button">View Booking Details</a>

    </div>

    <!-- BOOKING 2 -->
    <div class="booking-card" data-status="pending">

        <div class="booking-card-header">
            <h5>Royal Palace Convention Hall</h5>
            <span class="status status-pending">Pending</span>
        </div>

        <div class="booking-id">Booking ID: BMS-1002</div>

        <div class="booking-details">
            <div class="detail-row">
                <span>Event Date</span>
                <strong>10 January 2027</strong>
            </div>

            <div class="detail-row">
                <span>Event Type</span>
                <strong>Engagement</strong>
            </div>

            <div class="detail-row">
                <span>Booking Amount</span>
                <strong>₹18,000</strong>
            </div>

            <div class="detail-row">
                <span>Payment Status</span>
                <strong class="payment-pending">Awaiting Approval</strong>
            </div>
        </div>

        <a href="#" class="booking-button">View Booking Details</a>

    </div>

    <!-- BOOKING 3 -->
    <div class="booking-card" data-status="confirmed">

        <div class="booking-card-header">
            <h5>Green Garden Convention Centre</h5>
            <span class="status status-confirmed">Confirmed</span>
        </div>

        <div class="booking-id">Booking ID: BMS-1003</div>

        <div class="booking-details">
            <div class="detail-row">
                <span>Event Date</span>
                <strong>15 February 2027</strong>
            </div>

            <div class="detail-row">
                <span>Event Type</span>
                <strong>Reception</strong>
            </div>

            <div class="detail-row">
                <span>Booking Amount</span>
                <strong>₹30,000</strong>
            </div>

            <div class="detail-row">
                <span>Payment Status</span>
                <strong class="payment-paid">Paid</strong>
            </div>
        </div>

        <a href="#" class="booking-button">View Booking Details</a>

    </div>

    <!-- BOOKING 4 -->
    <div class="booking-card" data-status="cancelled">

        <div class="booking-card-header">
            <h5>Royal Star Convention Hall</h5>
            <span class="status status-cancelled">Cancelled</span>
        </div>

        <div class="booking-id">Booking ID: BMS-1004</div>

        <div class="booking-details">
            <div class="detail-row">
                <span>Event Date</span>
                <strong>05 November 2026</strong>
            </div>

            <div class="detail-row">
                <span>Event Type</span>
                <strong>Birthday</strong>
            </div>

            <div class="detail-row">
                <span>Booking Amount</span>
                <strong>₹12,000</strong>
            </div>

            <div class="detail-row">
                <span>Payment Status</span>
                <strong>Refund Pending</strong>
            </div>
        </div>

        <a href="#" class="booking-button">View Booking Details</a>

    </div>


<!-- BOOKING 5 - COMPLETED -->
<div class="booking-card" data-status="completed">

    <div class="booking-card-header">
        <h5>Grand Palace Convention Hall</h5>
        <span class="status status-completed">Completed</span>
    </div>

    <div class="booking-id">Booking ID: BMS-1005</div>

    <div class="booking-details">

        <div class="detail-row">
            <span>Event Date</span>
            <strong>05 November 2026</strong>
        </div>

        <div class="detail-row">
            <span>Event Type</span>
            <strong>Wedding</strong>
        </div>

        <div class="detail-row">
            <span>Booking Amount</span>
            <strong>₹25,000</strong>
        </div>

        <div class="detail-row">
            <span>Payment Status</span>
            <strong class="payment-paid">Paid</strong>
        </div>

    </div>

    <a href="{{ route('user.reviews.create', ['booking' => 'BMS-1005']) }}"
       class="booking-button">
        <i class="fas fa-star me-1"></i> Rate & Review
    </a>

</div>


</div>

<script>
    function filterBookings(status, button) {

        document.querySelectorAll('.filter-item').forEach(function(item) {
            item.classList.remove('active');
        });

        button.classList.add('active');

        document.querySelectorAll('.booking-card').forEach(function(card) {

            if (status === 'all' || card.dataset.status === status) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }

        });
    }
</script>

@endsection
