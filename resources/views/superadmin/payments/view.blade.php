
@extends('superadmin.layout.app')

@section('title') Payment Receipt #{{ $transactionId ?? 'TXN-2026-9041' }} - Super Admin @endsection

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
    .invoice-card {
        background: #ffffff;
        border-radius: 20px;
        border: 1px solid rgba(0, 0, 0, 0.08);
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.04);
        padding: 36px;
    }

    .invoice-watermark {
        position: absolute;
        top: 20px;
        right: 40px;
        opacity: 0.06;
        font-size: 8rem;
        pointer-events: none;
    }

    .badge-verified-payment {
        background-color: #ecfdf5 !important;
        color: #047857 !important;
        border: 1px solid #a7f3d0 !important;
        padding: 6px 14px !important;
        border-radius: 9999px !important;
        font-weight: 700 !important;
        font-size: 0.85rem !important;
        display: inline-flex !important;
        align-items: center !important;
    }

    @media print {
        .page-title,
        .sidebar,
        .main-header,
        .no-print {
            display: none !important;
        }

        .invoice-card {
            box-shadow: none;
            border: 0;
            padding: 10px;
        }

        body {
            background: #fff !important;
        }
    }

    @media(max-width: 767px) {
        .invoice-card {
            padding: 18px;
        }

        .invoice-watermark {
            font-size: 5rem;
            right: 15px;
        }
    }
</style>
@endsection

@section('content')

<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6">
                <h3 style="color: #1e2f65;font-family: sans-serif;">
                    Payment Receipt
                </h3>
            </div>

            <div class="col-12 col-md-6 text-md-end mt-2 mt-md-0">
                <ol class="breadcrumb justify-content-md-end mb-0 bg-transparent p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('superadmin.dashboard') }}">
                            <i class="fa fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('superadmin.payments.index') }}">
                            Payments
                        </a>
                    </li>
                    <li class="breadcrumb-item active">Receipt</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- RECEIPT ACTIONS -->
    <div class="d-flex justify-content-end gap-2 mb-3 no-print">
        <a href="{{ route('superadmin.payments.index') }}"
           class="btn btn-light border">
            <i class="bi bi-arrow-left me-1"></i> Back to Payments
        </a>

        <button type="button"
                onclick="window.print()"
                class="btn btn-primary">
            <i class="bi bi-printer me-1"></i> Print Receipt
        </button>
    </div>

    <!-- RECEIPT CARD -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-12">

            <div class="invoice-card position-relative">

                <div class="invoice-watermark">
                    <i class="bi bi-receipt"></i>
                </div>

                <!-- HEADER -->
                <div class="d-flex flex-wrap align-items-center justify-content-between pb-4 border-bottom mb-4">

                    <div>
                        <div class="d-flex align-items-center gap-2 mb-2">

                            <div style="width: 40px; height: 40px; border-radius: 10px; background: #2563eb; color: #fff; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 1.2rem;">
                                <i class="bi bi-buildings-fill"></i>
                            </div>

                            <span class="fs-4 fw-bold text-dark">
                                Book My Slot
                            </span>
                        </div>

                        <span class="text-muted small">
                            Official Transaction Receipt & Escrow Voucher
                        </span>
                    </div>

                    <div class="text-md-end mt-3 mt-md-0">

                        <span class="badge-verified-payment">
                            <i class="bi bi-shield-check me-1"></i>
                            Payment Verified
                        </span>

                        <div class="fw-bold text-dark fs-5 mt-2">
                            Receipt #{{ isset($transactionId) ? str_replace('TXN-', 'INV-', $transactionId) : 'INV-2026-9041' }}
                        </div>

                        <span class="text-muted small">
                            Date: 13 Nov 2026, 10:22 AM IST
                        </span>
                    </div>
                </div>

                <!-- CUSTOMER AND CONVENTION CENTRE DETAILS -->
                <div class="row g-4 mb-4 pb-4 border-bottom">

                    <div class="col-sm-6">

                        <span class="text-muted small fw-semibold text-uppercase d-block mb-1">
                            Customer (Payer):
                        </span>

                        <h6 class="fw-bold text-dark mb-1">
                            Aditya Kumar
                        </h6>

                        <div class="small text-muted mb-1">
                            <i class="bi bi-telephone me-1"></i>
                            +91 98765 43210
                        </div>

                        <div class="small text-muted mb-1">
                            <i class="bi bi-envelope me-1"></i>
                            aditya.kumar@example.com
                        </div>

                        <div class="small text-muted">
                            HAL 2nd Stage, Indiranagar, Bengaluru - 560038
                        </div>

                    </div>

                    <div class="col-sm-6 text-sm-end">

                        <span class="text-muted small fw-semibold text-uppercase d-block mb-1">
                            Payee (Convention Centre):
                        </span>

                        <h6 class="fw-bold text-dark mb-1">
                            Grand Royal Convention Centre
                        </h6>

                        <div class="small text-muted mb-1">
                            GSTIN: 29AABCU9821R1ZX
                        </div>

                        <div class="small text-muted mb-1">
                            Settlement A/C: HDFC Bank ******9812
                        </div>

                        <div class="small text-muted">
                            Bellary Road, Hebbal, Bengaluru - 560024
                        </div>

                    </div>
                </div>

                <!-- BOOKING DETAILS -->
                <div class="p-3 bg-light rounded-3 d-flex flex-wrap align-items-center justify-content-between mb-4">

                    <div>
                        <span class="text-muted small d-block">
                            Linked Booking:
                        </span>

                        <span class="fw-bold text-primary">
                            Booking #CC-9041 &bull; Grand Ballroom (Evening Slot)
                        </span>
                    </div>

                    <div class="mt-2 mt-md-0">
                        <span class="text-muted small d-block text-md-end">
                            Event Date:
                        </span>

                        <strong class="text-dark">
                            Sunday, 15 November 2026
                        </strong>
                    </div>

                </div>

                <!-- TARIFF AND SETTLEMENT TABLE -->
                <div class="table-responsive mb-4">

                    <table class="table align-middle">

                        <thead class="table-light small text-uppercase">
                            <tr>
                                <th>Transaction Item</th>
                                <th class="text-center">Rate / Basis</th>
                                <th class="text-end">Amount</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>
                                    <div class="fw-bold text-dark">
                                        Advance Booking Token Payment
                                    </div>

                                    <div class="small text-muted">
                                        Authorized via Razorpay Gateway &bull;
                                        UPI Auth #RZP-98412
                                    </div>
                                </td>

                                <td class="text-center">
                                    30% Advance
                                </td>

                                <td class="text-end fw-semibold">
                                    Rs. 1,50,000.00
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="text-muted small">
                                        Platform Convenience & Gateway Charge (2%)
                                    </div>
                                </td>

                                <td class="text-center text-muted small">
                                    Deduction
                                </td>

                                <td class="text-end text-danger">
                                    - Rs. 3,000.00
                                </td>
                            </tr>

                            <tr class="table-light">
                                <td colspan="2" class="fw-bold text-dark">
                                    Net Payout Scheduled to Convention Centre
                                </td>

                                <td class="text-end fw-bold text-success fs-5">
                                    Rs. 1,47,000.00
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <!-- GATEWAY AUDIT TRAIL -->
                <div class="row g-3 p-3 bg-light rounded-4 mb-4">

                    <div class="col-sm-6 col-md-3">
                        <span class="text-muted small d-block">
                            Payment Mode
                        </span>
                        <strong class="text-dark small">
                            UPI (PhonePe)
                        </strong>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <span class="text-muted small d-block">
                            Transaction ID
                        </span>
                        <strong class="text-dark small">
                            pay_P1o98Kjsd761m
                        </strong>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <span class="text-muted small d-block">
                            Bank UTR Number
                        </span>
                        <strong class="text-dark small">
                            SBIN00298172910
                        </strong>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <span class="text-muted small d-block">
                            Escrow Release Date
                        </span>
                        <strong class="text-success small">
                            Upon CC Slot Approval
                        </strong>
                    </div>

                </div>

                <!-- FOOTER -->
                <div class="d-flex flex-wrap justify-content-between align-items-center pt-3 border-top">

                    <span class="small text-muted">
                        This is an electronically generated voucher and requires no physical signature.
                    </span>

                    <span class="small text-muted">
                        Support: billing@bookmyslot.com
                    </span>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
