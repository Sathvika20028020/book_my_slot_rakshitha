
@extends('user.layouts.app')

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
        color: #0A0F1D;
        margin-bottom: 14px;
        font-weight: 600 !important;
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
        color: #0A0F1D;
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

        <a href="javascript:void(0)" class="booking-button view-booking-btn"
   data-id="BMS-1001"
   data-venue="Sri Convention Centre"
   data-status="confirmed"
   data-date="25 December 2026"
   data-event="Wedding"
   data-amount="₹25,000"
   data-payment="Paid">
   <i class="fas fa-eye me-1"></i> View Booking Details
</a>

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

       <a href="javascript:void(0)" class="booking-button view-booking-btn"
   data-id="BMS-1002"
   data-venue="Royal Palace Convention Hall"
   data-status="pending"
   data-date="10 January 2027"
   data-event="Engagement"
   data-amount="₹18,000"
   data-payment="Awaiting Approval">
   <i class="fas fa-eye me-1"></i> View Booking Details
</a>

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

        <a href="javascript:void(0)" class="booking-button view-booking-btn"
   data-id="BMS-1003"
   data-venue="Green Garden Convention Centre"
   data-status="confirmed"
   data-date="15 February 2027"
   data-event="Reception"
   data-amount="₹30,000"
   data-payment="Paid">
   <i class="fas fa-eye me-1"></i> View Booking Details
</a>

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

       <a href="javascript:void(0)" class="booking-button view-booking-btn"
   data-id="BMS-1004"
   data-venue="Royal Star Convention Hall"
   data-status="cancelled"
   data-date="05 November 2026"
   data-event="Birthday"
   data-amount="₹12,000"
   data-payment="Refund Pending">
   <i class="fas fa-eye me-1"></i> View Booking Details
</a>

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


// OPEN BOOKING DETAILS
document.querySelectorAll('.view-booking-btn').forEach(function(button) {

    button.addEventListener('click', function() {

        const status = this.dataset.status;

        document.getElementById('modalVenue').textContent =
            this.dataset.venue;

        document.getElementById('modalBookingId').textContent =
            'Booking ID: ' + this.dataset.id;

        document.getElementById('modalDate').textContent =
            this.dataset.date;

        document.getElementById('modalEvent').textContent =
            this.dataset.event;

        document.getElementById('modalAmount').textContent =
            this.dataset.amount;

        document.getElementById('modalPayment').textContent =
            this.dataset.payment;

        const statusBadge = document.getElementById('modalStatus');

        statusBadge.className = 'status status-' + status;
        statusBadge.textContent =
            status.charAt(0).toUpperCase() + status.slice(1);

        const message = document.getElementById('modalStatusMessage');

        message.className = 'modal-status-message ' + status;

        const messages = {
            confirmed:
                'Your booking has been confirmed by the convention centre. Please refer to the event information and payment details above.',

            pending:
                'Your booking request has been submitted and is awaiting approval from the convention centre. Payment instructions will be available after approval.',

            cancelled:
                'This booking has been cancelled. The refund status shown above is Refund Pending. Please contact the convention centre for further assistance.'
        };

        message.textContent = messages[status] || 'Booking information.';

        document.getElementById('bookingDetailsModal')
            .classList.add('active');

        document.body.style.overflow = 'hidden';

    });

});

function closeBookingDetails() {

    document.getElementById('bookingDetailsModal')
        .classList.remove('active');

    document.body.style.overflow = '';

}

// CLOSE WHEN CLICKING OUTSIDE
document.getElementById('bookingDetailsModal')
    .addEventListener('click', function(event) {

        if (event.target === this) {
            closeBookingDetails();
        }

    });

// CLOSE WITH ESCAPE KEY
document.addEventListener('keydown', function(event) {

    if (event.key === 'Escape') {
        closeBookingDetails();
    }

});

</script>


<!-- BOOKING DETAILS MODAL -->
<div id="bookingDetailsModal" class="booking-details-modal">

    <div class="booking-modal-content">

        <div class="booking-modal-header">
            <div>
                <span class="modal-label">BOOKING INFORMATION</span>
                <h4>Booking Details</h4>
            </div>

            <button type="button" class="modal-close"
                    onclick="closeBookingDetails()">
                &times;
            </button>
        </div>

        <div class="booking-modal-body">

            <div class="modal-booking-heading">
                <div>
                    <h5 id="modalVenue"></h5>
                    <p id="modalBookingId"></p>
                </div>

                <span id="modalStatus" class="status"></span>
            </div>

            <h6 class="modal-section-title">Event Information</h6>

            <div class="modal-info-grid">
                <div class="modal-info-item">
                    <span>Event Date</span>
                    <strong id="modalDate"></strong>
                </div>

                <div class="modal-info-item">
                    <span>Event Type</span>
                    <strong id="modalEvent"></strong>
                </div>
            </div>

            <h6 class="modal-section-title">Payment Information</h6>

            <div class="modal-info-grid">
                <div class="modal-info-item">
                    <span>Booking Amount</span>
                    <strong id="modalAmount"></strong>
                </div>

                <div class="modal-info-item">
                    <span>Payment Status</span>
                    <strong id="modalPayment"></strong>
                </div>
            </div>

            <div id="modalStatusMessage" class="modal-status-message"></div>

            <button type="button" class="booking-button"
                    onclick="closeBookingDetails()">
                Close Details
            </button>

        </div>

    </div>
</div>

<style>
.booking-details-modal {
    display: none;
    position: fixed;
    inset: 0;
    z-index: 99999;
    background: rgba(10,15,29,.65);
    padding: 20px;
    align-items: center;
    justify-content: center;
}

.booking-details-modal.active {
    display: flex;
}

.booking-modal-content {
    width: 100%;
    max-width: 550px;
    max-height: 90vh;
    overflow-y: auto;
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 15px 50px rgba(0,0,0,.2);
}

.booking-modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 22px;
    border-bottom: 1px solid #E2E8F0;
}

.booking-modal-header h4 {
    margin: 5px 0 0;
    font-size: 20px;
    font-weight: 800;
    color: #0A0F1D;
}

.modal-label {
    font-size: 10px;
    font-weight: 800;
    color: #D97706;
    letter-spacing: 1px;
}

.modal-close {
    width: 35px;
    height: 35px;
    border: 0;
    border-radius: 50%;
    background: #F1F5F9;
    font-size: 25px;
    color: #334155;
    cursor: pointer;
}

.booking-modal-body {
    padding: 22px;
}

.modal-booking-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    padding-bottom: 20px;
    border-bottom: 1px solid #E2E8F0;
}

.modal-booking-heading h5 {
    margin: 0 0 5px;
    font-size: 16px;
    font-weight: 800;
    color: #0A0F1D;
}

.modal-booking-heading p {
    margin: 0;
    color: #0A0F1D;
    font-size: 13px;
}

.modal-section-title {
    margin: 22px 0 12px;
    font-size: 14px;
    font-weight: 800;
    color: #0A0F1D;
}

.modal-info-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 12px;
}

.modal-info-item {
    display: flex;
    flex-direction: column;
    gap: 7px;
    padding: 14px;
    background: #F8FAFC;
    border: 1px solid #E2E8F0;
    border-radius: 10px;
    min-width: 0;
}

.modal-info-item span {
    font-size: 12px;
    color: #0A0F1D;
}

.modal-info-item strong {
    font-size: 13px;
    color: #0A0F1D;
    overflow-wrap: anywhere;
}

.modal-status-message {
    margin-top: 20px;
    padding: 15px;
    border-radius: 10px;
    font-size: 13px;
    line-height: 1.7;
}

.modal-status-message.confirmed {
    background: #DCFCE7;
    color: #166534;
}

.modal-status-message.pending {
    background: #FEF3C7;
    color: #92400E;
}

.modal-status-message.cancelled {
    background: #FEE2E2;
    color: #991B1B;
}

@media(max-width:450px) {
    .booking-details-modal {
        padding: 12px;
    }

    .booking-modal-header,
    .booking-modal-body {
        padding: 16px;
    }

    .modal-booking-heading {
        align-items: flex-start;
        flex-direction: column;
    }
}
</style>


@endsection
