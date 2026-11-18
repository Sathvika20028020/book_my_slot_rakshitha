
@extends('conventions.layouts.app')

@section('title') Payments & Settlements - Convention Centre Portal @endsection

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
    .kpi-card {
        border-radius: 14px;
        transition: all 0.2s ease;
        border: 1px solid rgba(0, 0, 0, 0.08) !important;
        background: #ffffff !important;
    }

    .kpi-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.06);
    }

    .kpi-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.35rem;
        flex-shrink: 0;
    }

    .badge-kpi-success,
    .badge-kpi-warning,
    .badge-kpi-danger,
    .badge-kpi-primary {
        font-weight: 700 !important;
        font-size: 0.75rem !important;
        padding: 3px 8px !important;
        border-radius: 6px !important;
        display: inline-block;
    }

    .badge-kpi-success {
        background-color: #ecfdf5 !important;
        color: #047857 !important;
        border: 1px solid #a7f3d0 !important;
    }

    .badge-kpi-warning {
        background-color: #fef3c7 !important;
        color: #92400e !important;
        border: 1px solid #fde68a !important;
    }

    .badge-kpi-danger {
        background-color: #fee2e2 !important;
        color: #991b1b !important;
        border: 1px solid #fecaca !important;
    }

    .badge-kpi-primary {
        background-color: #eff6ff !important;
        color: #1d4ed8 !important;
        border: 1px solid #bfdbfe !important;
    }

    .payment-filter-btn {
        border-radius: 9999px;
        padding: 0.45rem 1.25rem;
        font-weight: 600;
        font-size: 0.85rem;
        border: 1px solid #e2e8f0;
        transition: all 0.2s ease-in-out;
        color: #475569;
        background-color: #f8fafc;
        cursor: pointer;
    }

    .payment-filter-btn:hover {
        background-color: #e2e8f0;
        color: #0f172a;
    }

    .payment-filter-btn.active {
        background-color: #059669 !important;
        border-color: #059669 !important;
        color: #ffffff !important;
        box-shadow: 0 4px 12px rgba(5, 150, 105, 0.28);
    }

    .hall-filter-select {
        min-width: 190px;
        border: 1px solid #e2e8f0;
        border-radius: 9px;
        padding: 9px 35px 9px 12px;
        font-size: 0.88rem;
        font-weight: 600;
        color: #334155;
        background-color: #fff;
        outline: none;
    }

    .hall-filter-select:focus {
        border-color: #059669;
        box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.10);
    }

    .badge-pay-status {
        display: inline-flex !important;
        align-items: center !important;
        gap: 0.35rem !important;
        padding: 0.38rem 0.85rem !important;
        border-radius: 9999px !important;
        font-weight: 700 !important;
        font-size: 0.78rem !important;
        white-space: nowrap;
    }

    .badge-pay-completed {
        background-color: #ecfdf5 !important;
        color: #047857 !important;
        border: 1px solid #a7f3d0 !important;
    }

    .badge-pay-pending {
        background-color: #fffbeb !important;
        color: #b45309 !important;
        border: 1px solid #fde68a !important;
    }

    .badge-pay-refunded {
        background-color: #fff1f2 !important;
        color: #be123c !important;
        border: 1px solid #fecdd3 !important;
    }

    .table-payments {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table-payments thead th {
        background-color: #f8fafc !important;
        color: #64748b !important;
        font-weight: 700 !important;
        font-size: 0.74rem !important;
        letter-spacing: 0.5px !important;
        padding: 12px 14px !important;
        border-bottom: 2px solid #e2e8f0 !important;
        white-space: nowrap !important;
    }

    .table-payments tbody td {
        padding: 14px 14px !important;
        vertical-align: middle !important;
        border-bottom: 1px solid #f1f5f9 !important;
        background-color: #ffffff !important;
    }

    .table-payments tbody tr:hover td {
        background-color: #f8fafc !important;
    }

    #noPaymentsState {
        display: none;
        padding: 35px 15px;
        text-align: center;
        color: #64748b;
    }

    @media(max-width: 767px) {
        .hall-filter-select {
            width: 100%;
        }

        .payment-filter-btn {
            padding: 0.4rem 0.85rem;
            font-size: 0.78rem;
        }
    }
</style>
@endsection


@section('content')

<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 style="color: #1e2f65;font-family: sans-serif;">Payments</h3>
            </div>

            <div class="col-12 col-md-6 text-md-end mt-2 mt-md-0 d-flex align-items-center justify-content-md-end gap-2">
                <ol class="breadcrumb justify-content-md-end mb-0 bg-transparent p-0 me-3 d-none d-lg-flex">
                    <li class="breadcrumb-item">
                        <a href="/admin/dashboard">
                            <i class="fa fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item active">Payments</li>
                </ol>
            </div>
        </div>
    </div>


    <!-- KPI CARDS -->
    <div class="row g-3 mb-4">

        <!-- TOTAL RECEIVED -->
        <div class="col-xl-3 col-md-6">
            <div class="card kpi-card shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3 p-3">
                    <div class="kpi-icon" style="background: rgba(16, 185, 129, 0.12); color: #059669;">
                        <i class="bi bi-cash-stack"></i>
                    </div>

                    <div>
                        <span class="text-secondary small fw-bold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.5px;">
                            Total Received
                        </span>

                        <h3 class="fw-bold mb-0 text-dark" id="totalReceived">₹0</h3>

                        <span class="badge-kpi-success mt-1" id="totalReceivedInfo">
                            All payments
                        </span>
                    </div>
                </div>
            </div>
        </div>


        <!-- ESCROW / PENDING -->
        <div class="col-xl-3 col-md-6">
            <div class="card kpi-card shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3 p-3">
                    <div class="kpi-icon" style="background: rgba(245, 158, 11, 0.15); color: #d97706;">
                        <i class="bi bi-hourglass-split"></i>
                    </div>

                    <div>
                        <span class="text-secondary small fw-bold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.5px;">
                            Escrow / Pending Payout
                        </span>

                        <h3 class="fw-bold mb-0 text-warning" id="pendingPayout">₹0</h3>

                        <span class="badge-kpi-warning mt-1" id="pendingPayoutInfo">
                            Pending transactions
                        </span>
                    </div>
                </div>
            </div>
        </div>


        <!-- NET SETTLED -->
        <div class="col-xl-3 col-md-6">
            <div class="card kpi-card shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3 p-3">
                    <div class="kpi-icon" style="background: rgba(37, 99, 235, 0.1); color: #2563eb;">
                        <i class="bi bi-bank"></i>
                    </div>

                    <div>
                        <span class="text-secondary small fw-bold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.5px;">
                            Direct Net Settled
                        </span>

                        <h3 class="fw-bold mb-0 text-primary" id="netSettled">₹0</h3>

                        <span class="badge-kpi-primary mt-1" id="netSettledInfo">
                            Settled transactions
                        </span>
                    </div>
                </div>
            </div>
        </div>


        <!-- REFUNDS -->
        <div class="col-xl-3 col-md-6">
            <div class="card kpi-card shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3 p-3">
                    <div class="kpi-icon" style="background: rgba(239, 68, 68, 0.12); color: #dc2626;">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </div>

                    <div>
                        <span class="text-secondary small fw-bold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.5px;">
                            Refunds / Cancellations
                        </span>

                        <h3 class="fw-bold mb-0 text-danger" id="totalRefunds">₹0</h3>

                        <span class="badge-kpi-danger mt-1" id="refundInfo">
                            Refunded transactions
                        </span>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- PAYMENTS LIST -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body p-4">

            <!-- FILTER BAR -->
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">

                <!-- STATUS FILTERS -->
                <div class="d-flex flex-wrap gap-2" id="paymentFilterButtons">

                    <button type="button" class="payment-filter-btn active" data-filter="all">
                        All Payments
                    </button>

                    <button type="button" class="payment-filter-btn" data-filter="Completed">
                        Settled & Completed
                    </button>

                    <button type="button" class="payment-filter-btn" data-filter="Pending">
                        In Escrow / Pending
                    </button>

                    <button type="button" class="payment-filter-btn" data-filter="Refunded">
                        Refunded
                    </button>

                </div>


                <!-- HALL FILTER -->
                <div class="d-flex align-items-center gap-2">
                    <label for="hallFilter" class="fw-bold text-secondary small mb-0">
                        <i class="bi bi-building me-1"></i> Hall:
                    </label>

                    <select id="hallFilter" class="hall-filter-select">
                        <option value="all">All Halls</option>
                    </select>
                </div>

            </div>


            <!-- PAYMENT TABLE -->
            <div class="table-responsive">

                <table class="table-payments" id="data-source-1" style="width:100%">

                    <thead>
                        <tr>
                            <th>TXN REFERENCE</th>
                            <th>BOOKING ID</th>
                            <th>CLIENT & HALL</th>
                            <th>PAYMENT MODE</th>
                            <th>AMOUNT PAID</th>
                            <th>NET CC PAYOUT</th>
                            <th>STATUS</th>
                            <th>DATE & TIME</th>
                            <th class="text-end">ACTION</th>
                        </tr>
                    </thead>


                    <tbody id="paymentsTableBody">

                        <!-- ROW 1 -->
                        <tr
                            data-status="Pending"
                            data-hall="Grand Ballroom"
                            data-amount="150000"
                            data-payout="147000"
                        >
                            <td>
                                <a href="{{ route('center_admin.payments.view') }}?id=TXN-9041"
                                   class="fw-bold text-primary text-decoration-none">
                                    TXN-2026-9041
                                </a>
                                <div class="text-muted small">Razorpay UPI</div>
                            </td>

                            <td>
                                <a href="{{ route('center_admin.booking.show') }}?id=CC-9041"
                                   class="badge bg-light text-dark border text-decoration-none fw-semibold">
                                    #CC-9041
                                </a>
                            </td>

                            <td>
                                <div class="fw-bold text-dark">Aditya Kumar</div>
                                <div class="small text-muted">
                                    Grand Ballroom &bull; 15 Nov
                                </div>
                            </td>

                            <td>
                                <span class="badge bg-light text-dark border px-2 py-1">
                                    <i class="bi bi-qr-code text-primary me-1"></i>
                                    UPI (PhonePe)
                                </span>
                            </td>

                            <td class="fw-bold text-dark">₹1,50,000</td>

                            <td class="fw-bold text-success">₹1,47,000</td>

                            <td>
                                <span class="badge-pay-status badge-pay-pending">
                                    <i class="bi bi-clock-history"></i> Escrow Hold
                                </span>
                            </td>

                            <td class="small text-muted">Today, 10:22 AM</td>

                            <td class="text-end">
                                <a href="{{ route('center_admin.payments.view') }}?id=TXN-9041"
                                   class="btn btn-sm btn-primary">
                                    <i class="bi bi-eye me-1"></i> View
                                </a>
                            </td>
                        </tr>


                        <!-- ROW 2 -->
                        <tr
                            data-status="Completed"
                            data-hall="Grand Ballroom"
                            data-amount="680000"
                            data-payout="666400"
                        >
                            <td>
                                <a href="{{ route('center_admin.payments.view') }}?id=TXN-9035"
                                   class="fw-bold text-primary text-decoration-none">
                                    TXN-2026-9035
                                </a>
                                <div class="text-muted small">HDFC NetBanking</div>
                            </td>

                            <td>
                                <a href="{{ route('center_admin.booking.show') }}?id=CC-9035"
                                   class="badge bg-light text-dark border text-decoration-none fw-semibold">
                                    #CC-9035
                                </a>
                            </td>

                            <td>
                                <div class="fw-bold text-dark">Vikram Patel</div>
                                <div class="small text-muted">
                                    Grand Ballroom &bull; 09 Nov
                                </div>
                            </td>

                            <td>
                                <span class="badge bg-light text-dark border px-2 py-1">
                                    <i class="bi bi-bank text-info me-1"></i>
                                    Net Banking
                                </span>
                            </td>

                            <td class="fw-bold text-dark">₹6,80,000</td>

                            <td class="fw-bold text-success">₹6,66,400</td>

                            <td>
                                <span class="badge-pay-status badge-pay-completed">
                                    <i class="bi bi-check-circle-fill"></i> Settled
                                </span>
                            </td>

                            <td class="small text-muted">08 Nov 2026</td>

                            <td class="text-end">
                                <a href="{{ route('center_admin.payments.view') }}?id=TXN-9035"
                                   class="btn btn-sm btn-primary">
                                    <i class="bi bi-eye me-1"></i> View
                                </a>
                            </td>
                        </tr>


                        <!-- ROW 3 -->
                        <tr
                            data-status="Completed"
                            data-hall="Garden Lawn"
                            data-amount="310000"
                            data-payout="303800"
                        >
                            <td>
                                <a href="{{ route('center_admin.payments.view') }}?id=TXN-9032"
                                   class="fw-bold text-primary text-decoration-none">
                                    TXN-2026-9032
                                </a>
                                <div class="text-muted small">Credit Card (Visa)</div>
                            </td>

                            <td>
                                <a href="{{ route('center_admin.booking.show') }}?id=CC-9032"
                                   class="badge bg-light text-dark border text-decoration-none fw-semibold">
                                    #CC-9032
                                </a>
                            </td>

                            <td>
                                <div class="fw-bold text-dark">Pooja Agarwal</div>
                                <div class="small text-muted">
                                    Garden Lawn &bull; 07 Nov
                                </div>
                            </td>

                            <td>
                                <span class="badge bg-light text-dark border px-2 py-1">
                                    <i class="bi bi-credit-card text-warning me-1"></i>
                                    Visa Card
                                </span>
                            </td>

                            <td class="fw-bold text-dark">₹3,10,000</td>

                            <td class="fw-bold text-success">₹3,03,800</td>

                            <td>
                                <span class="badge-pay-status badge-pay-completed">
                                    <i class="bi bi-check-circle-fill"></i> Settled
                                </span>
                            </td>

                            <td class="small text-muted">04 Nov 2026</td>

                            <td class="text-end">
                                <a href="{{ route('center_admin.payments.view') }}?id=TXN-9032"
                                   class="btn btn-sm btn-primary">
                                    <i class="bi bi-eye me-1"></i> View
                                </a>
                            </td>
                        </tr>


                        <!-- ROW 4 -->
                        <tr
                            data-status="Refunded"
                            data-hall="Grand Ballroom"
                            data-amount="100000"
                            data-payout="0"
                        >
                            <td>
                                <a href="{{ route('center_admin.payments.view') }}?id=TXN-9028"
                                   class="fw-bold text-danger text-decoration-none">
                                    TXN-2026-9028
                                </a>
                                <div class="text-muted small">Refunded to Source</div>
                            </td>

                            <td>
                                <a href="{{ route('center_admin.booking.show') }}?id=CC-9028"
                                   class="badge bg-light text-dark border text-decoration-none fw-semibold">
                                    #CC-9028
                                </a>
                            </td>

                            <td>
                                <div class="fw-bold text-dark">Manoj Kuldeep</div>
                                <div class="small text-muted">
                                    Grand Ballroom &bull; 12 Nov
                                </div>
                            </td>

                            <td>
                                <span class="badge bg-light text-dark border px-2 py-1">
                                    <i class="bi bi-arrow-counterclockwise text-danger me-1"></i>
                                    Reversal
                                </span>
                            </td>

                            <td class="fw-bold text-danger">₹1,00,000</td>

                            <td class="fw-bold text-muted">₹0</td>

                            <td>
                                <span class="badge-pay-status badge-pay-refunded">
                                    <i class="bi bi-x-circle-fill"></i> Refunded
                                </span>
                            </td>

                            <td class="small text-muted">01 Nov 2026</td>

                            <td class="text-end">
                                <a href="{{ route('center_admin.payments.view') }}?id=TXN-9028"
                                   class="btn btn-sm btn-primary">
                                    <i class="bi bi-eye me-1"></i> View
                                </a>
                            </td>
                        </tr>

                    </tbody>
                </table>


                <!-- EMPTY STATE -->
                <div id="noPaymentsState">
                    <i class="bi bi-receipt-cutoff fs-1 d-block mb-2"></i>
                    <h6 class="fw-bold text-dark">No Payments Found</h6>
                    <p class="mb-0 small">
                        There are no payment records for the selected hall and status.
                    </p>
                </div>

            </div>

        </div>
    </div>

</div>

@endsection


@section('script')

<script>
document.addEventListener('DOMContentLoaded', function () {

    const hallFilter = document.getElementById('hallFilter');
    const tableBody = document.getElementById('paymentsTableBody');
    const rows = Array.from(tableBody.querySelectorAll('tr'));

    const filterButtons = document.querySelectorAll(
        '#paymentFilterButtons .payment-filter-btn'
    );

    const noPaymentsState = document.getElementById('noPaymentsState');
    const paymentTable = document.getElementById('data-source-1');

    let currentPayStatus = 'all';


    // KPI ELEMENTS
    const totalReceivedElement = document.getElementById('totalReceived');
    const pendingPayoutElement = document.getElementById('pendingPayout');
    const netSettledElement = document.getElementById('netSettled');
    const totalRefundsElement = document.getElementById('totalRefunds');

    const totalReceivedInfo = document.getElementById('totalReceivedInfo');
    const pendingPayoutInfo = document.getElementById('pendingPayoutInfo');
    const netSettledInfo = document.getElementById('netSettledInfo');
    const refundInfo = document.getElementById('refundInfo');


    // FORMAT AMOUNT IN INDIAN CURRENCY
    function formatCurrency(amount) {
        return '₹' + Number(amount).toLocaleString('en-IN');
    }


    // AUTOMATICALLY ADD HALLS FROM PAYMENT ROWS
    function populateHallDropdown() {

        const halls = [
            ...new Set(
                rows
                    .map(row => row.dataset.hall)
                    .filter(hall => hall && hall.trim() !== '')
            )
        ];

        halls.sort((a, b) => a.localeCompare(b));

        halls.forEach(hall => {
            const option = document.createElement('option');

            option.value = hall;
            option.textContent = hall;

            hallFilter.appendChild(option);
        });
    }


    // UPDATE KPI CARDS BASED ON SELECTED HALL
    function updateKpiCards() {

        const selectedHall = hallFilter.value;

        const hallRows = rows.filter(row => {
            return selectedHall === 'all' ||
                   row.dataset.hall === selectedHall;
        });

        let totalReceived = 0;
        let pendingPayout = 0;
        let netSettled = 0;
        let totalRefunds = 0;

        let pendingCount = 0;
        let completedCount = 0;
        let refundedCount = 0;

        hallRows.forEach(row => {

            const status = row.dataset.status;
            const amount = Number(row.dataset.amount) || 0;
            const payout = Number(row.dataset.payout) || 0;

            if (status === 'Pending') {
                totalReceived += amount;
                pendingPayout += payout;
                pendingCount++;
            }

            else if (status === 'Completed') {
                totalReceived += amount;
                netSettled += payout;
                completedCount++;
            }

            else if (status === 'Refunded') {
                totalRefunds += amount;
                refundedCount++;
            }
        });


        // UPDATE CARD VALUES
        totalReceivedElement.textContent = formatCurrency(totalReceived);

        pendingPayoutElement.textContent = formatCurrency(pendingPayout);

        netSettledElement.textContent = formatCurrency(netSettled);

        totalRefundsElement.textContent = formatCurrency(totalRefunds);


        // UPDATE CARD SUBTEXT
        totalReceivedInfo.textContent =
            (pendingCount + completedCount) + ' payment transactions';

        pendingPayoutInfo.textContent =
            pendingCount + ' pending transaction(s)';

        netSettledInfo.textContent =
            completedCount + ' settled transaction(s)';

        refundInfo.textContent =
            refundedCount + ' refunded transaction(s)';
    }


    // FILTER TABLE BY HALL AND STATUS
    function filterPaymentRows() {

        const selectedHall = hallFilter.value;

        let visibleCount = 0;

        rows.forEach(row => {

            const rowHall = row.dataset.hall;
            const rowStatus = row.dataset.status;

            const matchHall =
                selectedHall === 'all' || rowHall === selectedHall;

            const matchStatus =
                currentPayStatus === 'all' ||
                rowStatus === currentPayStatus;

            const shouldShow = matchHall && matchStatus;

            row.style.display = shouldShow ? '' : 'none';

            if (shouldShow) {
                visibleCount++;
            }
        });


        // EMPTY STATE
        if (visibleCount === 0) {
            paymentTable.style.display = 'none';
            noPaymentsState.style.display = 'block';
        } else {
            paymentTable.style.display = '';
            noPaymentsState.style.display = 'none';
        }
    }


    // STATUS FILTER BUTTONS
    filterButtons.forEach(button => {

        button.addEventListener('click', function () {

            filterButtons.forEach(btn => {
                btn.classList.remove('active');
            });

            this.classList.add('active');

            currentPayStatus = this.dataset.filter;

            filterPaymentRows();
        });
    });


    // HALL FILTER
    hallFilter.addEventListener('change', function () {

        updateKpiCards();

        filterPaymentRows();
    });


    // INITIALIZE
    populateHallDropdown();

    updateKpiCards();

    filterPaymentRows();

});
</script>

@endsection
