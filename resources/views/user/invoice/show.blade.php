
@extends('layouts.user')

@section('title', 'Booking Invoice | Book My Slot')

@section('content')

@php
    // Frontend demo data. Replace these values with booking/payment data later.
    $invoice = [
        'number' => 'INV-' . ($bookingId ?? 'BMS-2026-001'),
        'booking_id' => $bookingId ?? 'BMS-2026-001',
        'date' => '14 November 2026',
        'customer' => 'Rahul Sharma',
        'email' => 'rahul@example.com',
        'mobile' => '+91 98765 43210',
        'centre' => 'Bengaluru Convention Centre',
        'address' => 'Bengaluru, Karnataka',
        'event' => 'Wedding Reception',
        'event_date' => '20 December 2026',
        'time' => '10:00 AM – 10:00 PM',
        'guests' => '500',
        'payment_id' => 'PAY-BMS-2026-001',
        'payment_method' => 'UPI',
        'payment_date' => '14 November 2026',
        'subtotal' => 100000,
        'gst' => 18000,
        'total' => 118000,
        'paid' => 50000,
        'balance' => 68000,
    ];
@endphp

<style>
    .invoice-page {
        background: #FAFAFB;
        min-height: 100vh;
        padding: 28px 0 45px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: #0A0F1D;
    }

    .invoice-container {
        max-width: 1050px;
        margin: 0 auto;
    }

    .invoice-topbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
        margin-bottom: 22px;
    }

    .invoice-back {
        color: #64748B;
        text-decoration: none;
        font-size: 14px;
        font-weight: 700;
    }

    .invoice-back:hover {
        color: #0A0F1D;
    }

    .invoice-download-btn {
        border: 0;
        border-radius: 10px;
        background: #0A0F1D;
        color: #fff;
        padding: 12px 20px;
        font-size: 14px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 9px;
        cursor: pointer;
    }

    .invoice-download-btn:hover {
        background: #F59E0B;
        color: #0A0F1D;
    }

    .invoice-card {
        background: #fff;
        border: 1px solid #E8EAF0;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(15, 23, 42, .05);
    }

    .invoice-success {
        padding: 25px 30px;
        background: #F0FDF4;
        border-bottom: 1px solid #DCFCE7;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .invoice-success-icon {
        width: 48px;
        height: 48px;
        min-width: 48px;
        border-radius: 50%;
        background: #DCFCE7;
        color: #15803D;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }

    .invoice-success h4 {
        margin: 0 0 5px;
        font-size: 18px;
        font-weight: 800;
        color: #166534;
    }

    .invoice-success p {
        margin: 0;
        color: #3F684C;
        font-size: 13px;
    }

    .invoice-body {
        padding: 35px;
    }

    .invoice-brand-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 20px;
        padding-bottom: 28px;
        border-bottom: 1px solid #E9EDF3;
    }

    .invoice-brand h3 {
        margin: 0 0 7px;
        font-size: 23px;
        font-weight: 800;
        letter-spacing: -.6px;
        color: #0A0F1D;
    }

    .invoice-brand p {
        margin: 0;
        font-size: 13px;
        color: #64748B;
        line-height: 1.7;
    }

    .invoice-title {
        text-align: right;
    }

    .invoice-title h2 {
        margin: 0 0 7px;
        font-size: 28px;
        font-weight: 800;
        letter-spacing: 1px;
        color: #0A0F1D;
    }

    .invoice-title span {
        display: inline-block;
        padding: 6px 12px;
        background: #FEF3C7;
        color: #92400E;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: .6px;
    }

    .invoice-meta {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        padding: 25px 0;
        border-bottom: 1px solid #E9EDF3;
    }

    .invoice-meta-label {
        color: #94A3B8;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .7px;
        margin-bottom: 7px;
    }

    .invoice-meta-value {
        color: #0A0F1D;
        font-size: 14px;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    .invoice-section {
        padding-top: 27px;
    }

    .invoice-section-title {
        font-size: 15px;
        font-weight: 800;
        color: #0A0F1D;
        margin: 0 0 17px;
    }

    .invoice-detail-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px 30px;
    }

    .invoice-detail-label {
        color: #94A3B8;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .invoice-detail-value {
        color: #1E293B;
        font-size: 14px;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    .invoice-table-wrap {
        width: 100%;
        overflow-x: auto;
    }

    .invoice-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 450px;
    }

    .invoice-table th {
        background: #F8FAFC;
        color: #64748B;
        padding: 13px 15px;
        text-align: left;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .5px;
        font-weight: 800;
    }

    .invoice-table td {
        padding: 16px 15px;
        border-bottom: 1px solid #EDF0F4;
        color: #334155;
        font-size: 13px;
        font-weight: 600;
    }

    .invoice-table th:last-child,
    .invoice-table td:last-child {
        text-align: right;
    }

    .invoice-totals {
        max-width: 370px;
        margin: 22px 0 0 auto;
    }

    .invoice-total-row {
        display: flex;
        justify-content: space-between;
        gap: 15px;
        padding: 9px 0;
        color: #64748B;
        font-size: 13px;
        font-weight: 600;
    }

    .invoice-total-row strong {
        color: #0A0F1D;
        font-weight: 800;
    }

    .invoice-total-row.grand-total {
        border-top: 1px solid #E2E8F0;
        margin-top: 7px;
        padding-top: 15px;
        font-size: 16px;
        color: #0A0F1D;
    }

    .invoice-total-row.grand-total strong {
        font-size: 18px;
    }

    .invoice-paid-row strong {
        color: #15803D;
    }

    .invoice-balance-row strong {
        color: #B45309;
    }

    .invoice-payment-status {
        margin-top: 25px;
        padding: 17px 19px;
        background: #FFFBEB;
        border: 1px solid #FDE68A;
        border-radius: 10px;
        display: flex;
        justify-content: space-between;
        gap: 15px;
        flex-wrap: wrap;
        align-items: center;
    }

    .invoice-payment-status span {
        color: #92400E;
        font-size: 13px;
        font-weight: 700;
    }

    .invoice-payment-status strong {
        color: #92400E;
        font-size: 14px;
        font-weight: 800;
    }

    .invoice-footer {
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px dashed #CBD5E1;
        text-align: center;
    }

    .invoice-footer h5 {
        font-size: 14px;
        font-weight: 800;
        color: #0A0F1D;
        margin-bottom: 7px;
    }

    .invoice-footer p {
        color: #94A3B8;
        font-size: 12px;
        margin: 0;
        line-height: 1.7;
    }

    @media (max-width: 767px) {
        .invoice-page {
            padding: 20px 0 35px;
        }

        .invoice-container {
            padding-left: 12px;
            padding-right: 12px;
        }

        .invoice-body {
            padding: 22px 18px;
        }

        .invoice-success {
            padding: 20px 18px;
        }

        .invoice-brand-row {
            flex-direction: column;
        }

        .invoice-title {
            text-align: left;
        }

        .invoice-title h2 {
            font-size: 24px;
        }

        .invoice-meta {
            gap: 17px 12px;
        }

        .invoice-detail-grid {
            gap: 17px 14px;
        }

        .invoice-download-btn {
            padding: 11px 14px;
        }
    }

    @media print {
        @page {
            size: A4;
            margin: 12mm;
        }

        body {
            background: #fff !important;
        }

        .invoice-page {
            padding: 0 !important;
            background: #fff !important;
        }

        .invoice-container {
            max-width: 100% !important;
        }

        .invoice-topbar,
        .invoice-success {
            display: none !important;
        }

        .invoice-card {
            border: 0 !important;
            box-shadow: none !important;
            border-radius: 0 !important;
        }

        .invoice-body {
            padding: 0 !important;
        }

        .invoice-section,
        .invoice-meta,
        .invoice-brand-row,
        .invoice-totals,
        .invoice-payment-status {
            break-inside: avoid;
        }

        * {
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }
    }
</style>

<div class="invoice-page">
    <div class="invoice-container">

        <div class="invoice-topbar">
            <a href="{{ route('user.bookings') }}" class="invoice-back">
                <i class="fas fa-arrow-left me-2"></i>Back to My Bookings
            </a>

            <button type="button" class="invoice-download-btn" onclick="downloadInvoice()">
                <i class="fas fa-download"></i>
                Download Invoice
            </button>
        </div>

        <div class="invoice-card">

            <div class="invoice-success">
                <div class="invoice-success-icon">
                    <i class="fas fa-check"></i>
                </div>
                <div>
                    <h4>Payment Successful!</h4>
                    <p>Your payment has been received. Your booking invoice is ready.</p>
                </div>
            </div>

            <div class="invoice-body">

                <div class="invoice-brand-row">
                    <div class="invoice-brand">
                        <h3>BOOK MY SLOT</h3>
                        <p>Convention Centre Booking Platform</p>
                        <p>Booking confirmation and payment receipt</p>
                    </div>

                    <div class="invoice-title">
                        <h2>INVOICE</h2>
                        <span>PAYMENT RECEIPT</span>
                    </div>
                </div>

                <div class="invoice-meta">
                    <div>
                        <div class="invoice-meta-label">Invoice Number</div>
                        <div class="invoice-meta-value">{{ $invoice['number'] }}</div>
                    </div>

                    <div>
                        <div class="invoice-meta-label">Invoice Date</div>
                        <div class="invoice-meta-value">{{ $invoice['date'] }}</div>
                    </div>

                    <div>
                        <div class="invoice-meta-label">Booking ID</div>
                        <div class="invoice-meta-value">{{ $invoice['booking_id'] }}</div>
                    </div>

                    <div>
                        <div class="invoice-meta-label">Payment Status</div>
                        <div class="invoice-meta-value" style="color:#15803D;">
                            <i class="fas fa-check-circle me-1"></i> Payment Received
                        </div>
                    </div>
                </div>

                <div class="invoice-section">
                    <h5 class="invoice-section-title">Customer Details</h5>

                    <div class="invoice-detail-grid">
                        <div>
                            <div class="invoice-detail-label">Full Name</div>
                            <div class="invoice-detail-value">{{ $invoice['customer'] }}</div>
                        </div>

                        <div>
                            <div class="invoice-detail-label">Mobile Number</div>
                            <div class="invoice-detail-value">{{ $invoice['mobile'] }}</div>
                        </div>

                        <div>
                            <div class="invoice-detail-label">Email Address</div>
                            <div class="invoice-detail-value">{{ $invoice['email'] }}</div>
                        </div>
                    </div>
                </div>

                <div class="invoice-section">
                    <h5 class="invoice-section-title">Convention Centre & Event Details</h5>

                    <div class="invoice-detail-grid">
                        <div>
                            <div class="invoice-detail-label">Convention Centre</div>
                            <div class="invoice-detail-value">{{ $invoice['centre'] }}</div>
                        </div>

                        <div>
                            <div class="invoice-detail-label">Location</div>
                            <div class="invoice-detail-value">{{ $invoice['address'] }}</div>
                        </div>

                        <div>
                            <div class="invoice-detail-label">Event Name / Type</div>
                            <div class="invoice-detail-value">{{ $invoice['event'] }}</div>
                        </div>

                        <div>
                            <div class="invoice-detail-label">Event Date</div>
                            <div class="invoice-detail-value">{{ $invoice['event_date'] }}</div>
                        </div>

                        <div>
                            <div class="invoice-detail-label">Event Time</div>
                            <div class="invoice-detail-value">{{ $invoice['time'] }}</div>
                        </div>

                        <div>
                            <div class="invoice-detail-label">Expected Guests</div>
                            <div class="invoice-detail-value">{{ $invoice['guests'] }}</div>
                        </div>
                    </div>
                </div>

                <div class="invoice-section">
                    <h5 class="invoice-section-title">Payment Summary</h5>

                    <div class="invoice-table-wrap">
                        <table class="invoice-table">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Convention Centre Booking</td>
                                    <td>₹{{ number_format($invoice['subtotal'], 2) }}</td>
                                </tr>
                                <tr>
                                    <td>GST</td>
                                    <td>₹{{ number_format($invoice['gst'], 2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="invoice-totals">
                        <div class="invoice-total-row">
                            <span>Subtotal</span>
                            <strong>₹{{ number_format($invoice['subtotal'], 2) }}</strong>
                        </div>

                        <div class="invoice-total-row">
                            <span>GST</span>
                            <strong>₹{{ number_format($invoice['gst'], 2) }}</strong>
                        </div>

                        <div class="invoice-total-row grand-total">
                            <span>Total Amount</span>
                            <strong>₹{{ number_format($invoice['total'], 2) }}</strong>
                        </div>

                        <div class="invoice-total-row invoice-paid-row">
                            <span>Amount Paid</span>
                            <strong>₹{{ number_format($invoice['paid'], 2) }}</strong>
                        </div>

                        <div class="invoice-total-row invoice-balance-row">
                            <span>Remaining Balance</span>
                            <strong>₹{{ number_format($invoice['balance'], 2) }}</strong>
                        </div>
                    </div>

                    <div class="invoice-payment-status">
                        <span>
                            <i class="fas fa-info-circle me-2"></i>
                            Advance payment received
                        </span>
                        <strong>₹{{ number_format($invoice['paid'], 2) }}</strong>
                    </div>
                </div>

                <div class="invoice-section">
                    <h5 class="invoice-section-title">Transaction Details</h5>

                    <div class="invoice-detail-grid">
                        <div>
                            <div class="invoice-detail-label">Payment ID</div>
                            <div class="invoice-detail-value">{{ $invoice['payment_id'] }}</div>
                        </div>

                        <div>
                            <div class="invoice-detail-label">Payment Method</div>
                            <div class="invoice-detail-value">{{ $invoice['payment_method'] }}</div>
                        </div>

                        <div>
                            <div class="invoice-detail-label">Payment Date</div>
                            <div class="invoice-detail-value">{{ $invoice['payment_date'] }}</div>
                        </div>

                        <div>
                            <div class="invoice-detail-label">Transaction Status</div>
                            <div class="invoice-detail-value" style="color:#15803D;">Successful</div>
                        </div>
                    </div>
                </div>

                <div class="invoice-footer">
                    <h5>Thank you for booking with Book My Slot!</h5>
                    <p>
                        This is a computer-generated invoice for your booking payment.<br>
                        Please keep this invoice for your records.
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    function downloadInvoice() {
        window.print();
    }
</script>

@endsection
