
@extends('layouts.user')

@section('title', 'Payment | Book My Slot')

@section('content')

<style>
    .bms-payment-page {
        padding: 20px 15px 35px;
        color: #0A0F1D;
    }

    .bms-payment-page .payment-heading {
        font-size: 22px;
        font-weight: 800;
        margin-bottom: 5px;
    }

    .bms-payment-page .payment-subtitle {
        color: #64748B;
        font-size: 13px;
        margin-bottom: 22px;
    }

    .bms-payment-card {
        background: #fff;
        border: 1px solid #E2E8F0;
        border-radius: 13px;
        padding: 18px;
        margin-bottom: 16px;
    }

    .bms-payment-card h5 {
        font-size: 16px;
        font-weight: 800;
        margin-bottom: 16px;
    }

    .bms-approved {
        display: inline-block;
        background: #DCFCE7;
        color: #15803D;
        font-size: 11px;
        font-weight: 800;
        padding: 6px 11px;
        border-radius: 20px;
        margin-bottom: 12px;
    }

    .bms-detail-row {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        padding: 10px 0;
        border-bottom: 1px solid #F1F5F9;
        font-size: 13px;
    }

    .bms-detail-row:last-child {
        border-bottom: none;
    }

    .bms-detail-label {
        color: #64748B;
    }

    .bms-detail-value {
        font-weight: 700;
        text-align: right;
    }

    .bms-total-box {
        background: #0A0F1D;
        color: #fff;
        border-radius: 11px;
        padding: 17px;
        margin-top: 12px;
    }

    .bms-total-box small {
        color: #CBD5E1;
    }

    .bms-total-amount {
        color: #F59E0B;
        font-size: 25px;
        font-weight: 800;
        margin-top: 5px;
    }

    .bms-payment-option {
        display: flex;
        align-items: center;
        gap: 12px;
        border: 1px solid #E2E8F0;
        border-radius: 10px;
        padding: 14px;
        margin-bottom: 10px;
        cursor: pointer;
    }

    .bms-payment-option:has(input:checked) {
        border-color: #F59E0B;
        background: #FFFBEB;
    }

    .bms-payment-option input {
        accent-color: #0A0F1D;
        width: 17px;
        height: 17px;
    }

    .bms-payment-option strong {
        display: block;
        font-size: 13px;
    }

    .bms-payment-option small {
        color: #64748B;
        font-size: 11px;
    }

    .bms-pay-button {
        width: 100%;
        border: none;
        border-radius: 9px;
        padding: 14px;
        background: #0A0F1D;
        color: #F59E0B;
        font-size: 14px;
        font-weight: 800;
        margin-top: 10px;
    }

    .bms-payment-note {
        color: #64748B;
        font-size: 11px;
        line-height: 1.6;
        margin-top: 12px;
        text-align: center;
    }
</style>

<div class="bms-payment-page">

    <h3 class="payment-heading">Make Payment</h3>
    <p class="payment-subtitle">
        Complete your payment for the approved booking.
    </p>

    <div class="bms-payment-card">

        <span class="bms-approved">
            <i class="fas fa-check-circle"></i> Booking Approved
        </span>

        <h5>Booking Details</h5>

        <div class="bms-detail-row">
            <span class="bms-detail-label">Booking ID</span>
            <span class="bms-detail-value">BMS-2026-001</span>
        </div>

        <div class="bms-detail-row">
            <span class="bms-detail-label">Convention Centre</span>
            <span class="bms-detail-value">Grand Palace Convention Hall</span>
        </div>

        <div class="bms-detail-row">
            <span class="bms-detail-label">Location</span>
            <span class="bms-detail-value">Bengaluru</span>
        </div>

        <div class="bms-detail-row">
            <span class="bms-detail-label">Event Type</span>
            <span class="bms-detail-value">Wedding</span>
        </div>

        <div class="bms-detail-row">
            <span class="bms-detail-label">Event Date</span>
            <span class="bms-detail-value">20 November 2026</span>
        </div>

        <div class="bms-detail-row">
            <span class="bms-detail-label">Duration</span>
            <span class="bms-detail-value">1 Day</span>
        </div>

    </div>

    <div class="bms-payment-card">

        <h5>Payment Summary</h5>

        <div class="bms-detail-row">
            <span class="bms-detail-label">Hall Booking Amount</span>
            <span class="bms-detail-value">₹25,000</span>
        </div>

        <div class="bms-detail-row">
            <span class="bms-detail-label">Additional Charges</span>
            <span class="bms-detail-value">₹0</span>
        </div>

        <div class="bms-total-box">
            <small>Total Amount Payable</small>
            <div class="bms-total-amount">₹25,000</div>
        </div>

    </div>

    <div class="bms-payment-card">

        <h5>Select Payment Method</h5>

        <form id="paymentForm">

            <label class="bms-payment-option">
                <input type="radio" name="payment_method" value="upi" checked>
                <div>
                    <strong><i class="fas fa-mobile-alt me-2"></i>UPI</strong>
                    <small>Google Pay, PhonePe, Paytm, BHIM</small>
                </div>
            </label>

            <label class="bms-payment-option">
                <input type="radio" name="payment_method" value="card">
                <div>
                    <strong><i class="fas fa-credit-card me-2"></i>Credit / Debit Card</strong>
                    <small>Visa, Mastercard and RuPay</small>
                </div>
            </label>

            <label class="bms-payment-option">
                <input type="radio" name="payment_method" value="netbanking">
                <div>
                    <strong><i class="fas fa-university me-2"></i>Net Banking</strong>
                    <small>Pay through your bank account</small>
                </div>
            </label>

            <button type="submit" class="bms-pay-button">
                Proceed to Pay ₹25,000
                <i class="fas fa-arrow-right ms-2"></i>
            </button>

            <p class="bms-payment-note">
                <i class="fas fa-lock me-1"></i>
                Your payment will be processed securely through the payment gateway.
            </p>

        </form>

    </div>

</div>

@endsection

@push('scripts')
<script>
    document.getElementById('paymentForm').addEventListener('submit', function(e) {
        e.preventDefault();

        alert('Payment gateway integration will be connected here.');
    });
</script>
@endpush
