
@extends('user.layouts.app')

@section('title', 'My Payments | Book My Slot')

@section('content')

<style>
    .payments-page {
        padding: 20px 15px 35px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: #0A0F1D;
    }

    .payments-title {
        font-size: 23px;
        font-weight: 800;
        margin-bottom: 5px;
    }

    .payments-subtitle {
        font-size: 13px;
        color: #64748B;
        margin-bottom: 22px;
    }

    .payment-summary {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 12px;
        margin-bottom: 25px;
    }

    .payment-summary-card {
        padding: 16px;
        background: #fff;
        border: 1px solid #E2E8F0;
        border-radius: 13px;
    }

    .payment-summary-card h3 {
        font-size: 23px;
        font-weight: 800;
        margin: 0 0 5px;
    }

    .payment-summary-card p {
        margin: 0;
        font-size: 11px;
        color: #64748B;
        font-weight: 600;
    }

    .payments-section-title {
        font-size: 17px;
        font-weight: 800;
        margin-bottom: 15px;
    }

    .payment-list-card {
        background: #fff;
        border: 1px solid #E2E8F0;
        border-radius: 14px;
        padding: 18px;
        margin-bottom: 15px;
    }

    .payment-card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 7px;
    }

    .payment-card-header h5 {
        font-size: 15px;
        font-weight: 800;
        margin: 0;
    }

    .payment-booking-id {
        color: #0A0F1D;
        font-size: 12px;
        margin-bottom: 14px;
        font-weight: 600;
    }

    .payment-status {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 800;
        white-space: nowrap;
    }

    .payment-approved {
        background: #DCFCE7;
        color: #166534;
    }

    .payment-paid {
        background: #DBEAFE;
        color: #1D4ED8;
    }

    .payment-pending {
        background: #FEF3C7;
        color: #92400E;
    }

    .payment-detail-row {
        display: flex;
        justify-content: space-between;
        gap: 10px;
        padding: 9px 0;
        border-top: 1px solid #F1F5F9;
        font-size: 13px;
    }

    .payment-detail-row span {
        color: #0A0F1D;
    }

    .payment-detail-row strong {
        text-align: right;
        font-weight: 700;
    }

    .payment-amount {
        color: #0A0F1D;
        font-size: 17px;
        font-weight: 800;
    }
.payment-action {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    width: 100%;
    margin-top: 15px;
    padding: 12px;
    border-radius: 9px;
    background: #0A0F1D;
    color: #F59E0B !important;
    text-decoration: none !important;
    text-align: center;
    font-size: 13px;
    font-weight: 800;
    border: none;
    transition: all 0.2s ease;
}

.payment-action:hover {
    background: #1E293B;
    color: #FBBF24 !important;
    transform: translateY(-1px);
}

    .payment-empty {
        padding: 35px 20px;
        text-align: center;
        background: #fff;
        border: 1px solid #E2E8F0;
        border-radius: 14px;
    }

    .payment-empty i {
        font-size: 35px;
        color: #94A3B8;
        margin-bottom: 12px;
    }

    @media(max-width: 480px) {
        .payment-summary {
            gap: 8px;
        }

        .payment-summary-card {
            padding: 12px 9px;
        }

        .payment-summary-card h3 {
            font-size: 19px;
        }

        .payment-summary-card p {
            font-size: 10px;
        }

        .payment-card-header h5 {
            font-size: 13px;
        }
    }
</style>

<div class="payments-page">

    <h2 class="payments-title">My Payments</h2>

    <p class="payments-subtitle">
        View your approved bookings and manage your payments.
    </p>

    <!-- PAYMENT SUMMARY -->
    <div class="payment-summary">

        <div class="payment-summary-card">
            <h3>03</h3>
            <p>Total Approved</p>
        </div>

        <div class="payment-summary-card">
            <h3>02</h3>
            <p>Payment Due</p>
        </div>

        <div class="payment-summary-card">
            <h3>01</h3>
            <p>Paid</p>
        </div>

    </div>

    <h5 class="payments-section-title">Approved Bookings</h5>

    <!-- PAYMENT 1 -->
    <div class="payment-list-card">

        <div class="payment-card-header">
            <h5>Grand Palace Convention Hall</h5>
            <span class="payment-status payment-approved">Approved</span>
        </div>

        <div class="payment-booking-id">Booking ID: BMS-2026-001</div>

        <div class="payment-detail-row">
            <span>Event Date</span>
            <strong>20 November 2026</strong>
        </div>

        <div class="payment-detail-row">
            <span>Event Type</span>
            <strong>Wedding</strong>
        </div>

        <div class="payment-detail-row">
            <span>Booking Amount</span>
            <strong class="payment-amount">₹25,000</strong>
        </div>

        <div class="payment-detail-row">
            <span>Payment Status</span>
            <strong style="color:#D97706;">Payment Due</strong>
        </div>

        <a href="{{ route('user.payments.show', ['booking' => 'BMS-2026-001']) }}"
   class="payment-action">
    <i class="fas fa-credit-card me-2"></i>
    View & Pay
</a>

    </div>

    <!-- PAYMENT 2 -->
    <div class="payment-list-card">

        <div class="payment-card-header">
            <h5>Sri Convention Centre</h5>
            <span class="payment-status payment-approved">Approved</span>
        </div>

        <div class="payment-booking-id">Booking ID: BMS-2026-002</div>

        <div class="payment-detail-row">
            <span>Event Date</span>
            <strong>15 December 2026</strong>
        </div>

        <div class="payment-detail-row">
            <span>Event Type</span>
            <strong>Reception</strong>
        </div>

        <div class="payment-detail-row">
            <span>Booking Amount</span>
            <strong class="payment-amount">₹30,000</strong>
        </div>

        <div class="payment-detail-row">
            <span>Payment Status</span>
            <strong style="color:#D97706;">Payment Due</strong>
        </div>

       <a href="{{ route('user.payments.show', ['booking' => 'BMS-2026-002']) }}"
   class="payment-action">
    <i class="fas fa-credit-card me-2"></i>
    View & Pay
</a>

    </div>

    <!-- PAYMENT 3 -->
    <div class="payment-list-card">

        <div class="payment-card-header">
            <h5>Green Garden Convention Centre</h5>
            <span class="payment-status payment-paid">Paid</span>
        </div>

        <div class="payment-booking-id">Booking ID: BMS-2026-003</div>

        <div class="payment-detail-row">
            <span>Event Date</span>
            <strong>25 December 2026</strong>
        </div>

        <div class="payment-detail-row">
            <span>Event Type</span>
            <strong>Engagement</strong>
        </div>

        <div class="payment-detail-row">
            <span>Booking Amount</span>
            <strong class="payment-amount">₹18,000</strong>
        </div>

        <div class="payment-detail-row">
            <span>Payment Status</span>
            <strong style="color:#15803D;">Paid</strong>
        </div>

        <a href="{{ route('user.invoice.preview', ['bookingId' => 'BMS-2026-003']) }}"
   class="payment-action">
    <i class="fas fa-file-invoice me-2"></i>
    Download Receipt
</a>
    </div>

</div>

@endsection
