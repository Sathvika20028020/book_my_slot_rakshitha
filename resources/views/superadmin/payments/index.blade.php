
@extends('superadmin.layout.app')

@section('title', 'Payments & Settlements - Book My Slot')

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
    .payment-kpi {
        background: #fff;
        border: 1px solid #e8edf3;
        border-radius: 14px;
        height: 100%;
        transition: .2s ease;
    }

    .payment-kpi:hover {
        transform: translateY(-2px);
        box-shadow: 0 7px 18px rgba(15, 23, 42, .06);
    }

    .payment-kpi-icon {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
        flex-shrink: 0;
    }

    .payment-filter-label {
        color: #475569;
        font-size: 13px;
        font-weight: 600;
        white-space: nowrap;
        margin: 0;
    }

    .payment-filter-select {
        min-width: 175px;
        height: 40px;
        padding: 7px 34px 7px 12px;
        border: 1px solid #dce3ec;
        border-radius: 8px;
        background-color: #fff;
        color: #334155;
        font-size: 13px;
        font-weight: 500;
        outline: none;
    }

    .payment-filter-select:focus,
    .payment-search:focus {
        border-color: #059669;
        box-shadow: 0 0 0 3px rgba(5, 150, 105, .10);
    }

    .payment-filter-group {
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .payment-table {
        width: 100%;
        min-width: 1050px;
        border-collapse: separate;
        border-spacing: 0;
    }

    .payment-table thead th {
        background: #f8fafc;
        color: #64748b;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .45px;
        padding: 14px 12px;
        white-space: nowrap;
        border-top: 1px solid #e8edf3;
        border-bottom: 1px solid #e8edf3;
    }

    .payment-table tbody td {
        padding: 15px 12px;
        vertical-align: middle;
        border-bottom: 1px solid #edf1f5;
        background: #fff;
        font-size: 13px;
    }

    .payment-table tbody tr:hover td {
        background: #fbfdff;
    }

    .payment-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border-radius: 30px;
        padding: 6px 11px;
        font-size: 12px;
        font-weight: 700;
        white-space: nowrap;
    }

    .payment-status.pending {
        background: #fff7e6;
        border: 1px solid #fde2a7;
        color: #a16207;
    }

    .payment-status.completed {
        background: #ecfdf5;
        border: 1px solid #a7f3d0;
        color: #047857;
    }

    .payment-status.refunded {
        background: #fff1f2;
        border: 1px solid #fecdd3;
        color: #be123c;
    }

    .payment-view-btn {
        background: #625be8;
        color: #fff;
        border: 0;
        border-radius: 6px;
        padding: 7px 14px;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .payment-view-btn:hover {
        background: #5149d6;
        color: #fff;
    }

    .payment-search {
        height: 39px;
        border: 1px solid #dce3ec;
        border-radius: 7px;
        padding: 7px 11px;
        outline: none;
        font-size: 13px;
        width: 220px;
    }

    .payment-toolbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 20px;
    }

    .payment-empty {
        display: none;
        padding: 40px 15px;
        text-align: center;
        color: #64748b;
    }

    @media(max-width: 767px) {
        .payment-filter-group {
            width: 100%;
            justify-content: space-between;
        }

        .payment-filter-select {
            flex: 1;
            min-width: 0;
            max-width: 70%;
        }

        .payment-search {
            width: 100%;
        }

        .payment-toolbar > div {
            width: 100%;
        }
    }
</style>
@endsection


@section('content')
<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="page-title">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <h3 style="color:#1e2f65;font-family:sans-serif;">Payments</h3>
            </div>

            <div class="col-12 col-md-6 text-md-end">
                <ol class="breadcrumb justify-content-md-end mb-0 bg-transparent p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('superadmin.dashboard') }}">
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

        <div class="col-xl-3 col-md-6">
            <div class="payment-kpi p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="payment-kpi-icon" style="background:#e8f8f1;color:#059669;">
                        <i class="bi bi-cash-stack"></i>
                    </div>
                    <div>
                        <div class="small text-secondary fw-semibold">Total Received</div>
                        <h4 class="fw-bold text-dark mb-0" id="totalReceived">₹0</h4>
                        <small class="text-secondary" id="totalReceivedInfo">0 transactions</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="payment-kpi p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="payment-kpi-icon" style="background:#fff5df;color:#d97706;">
                        <i class="bi bi-hourglass-split"></i>
                    </div>
                    <div>
                        <div class="small text-secondary fw-semibold">Escrow / Pending Payout</div>
                        <h4 class="fw-bold text-warning mb-0" id="pendingPayout">₹0</h4>
                        <small class="text-secondary" id="pendingPayoutInfo">0 transactions</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="payment-kpi p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="payment-kpi-icon" style="background:#edf4ff;color:#2563eb;">
                        <i class="bi bi-bank"></i>
                    </div>
                    <div>
                        <div class="small text-secondary fw-semibold">Net Settled</div>
                        <h4 class="fw-bold text-primary mb-0" id="netSettled">₹0</h4>
                        <small class="text-secondary" id="netSettledInfo">0 transactions</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="payment-kpi p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="payment-kpi-icon" style="background:#fff0f1;color:#dc2626;">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </div>
                    <div>
                        <div class="small text-secondary fw-semibold">Refunds / Cancellations</div>
                        <h4 class="fw-bold text-danger mb-0" id="totalRefunds">₹0</h4>
                        <small class="text-secondary" id="refundInfo">0 transactions</small>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- PAYMENT TABLE CARD -->
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-3 p-md-4">

            <!-- FILTERS -->
            <div class="d-flex flex-wrap align-items-center gap-3 mb-4">

                <div class="payment-filter-group">
                    <label class="payment-filter-label" for="statusFilter">
                        <i class="bi bi-funnel me-1"></i> Status:
                    </label>
                    <select id="statusFilter" class="payment-filter-select">
                        <option value="all">All Payments</option>
                        <option value="Completed">Settled &amp; Completed</option>
                        <option value="Pending">In Escrow / Pending</option>
                        <option value="Refunded">Refunded</option>
                    </select>
                </div>

                <div class="payment-filter-group">
                    <label class="payment-filter-label" for="centerFilter">
                        <i class="bi bi-buildings me-1"></i> Centre:
                    </label>
                    <select id="centerFilter" class="payment-filter-select" style="min-width:220px;">
                        <option value="all">All Convention Centres</option>
                    </select>
                </div>

                <div class="payment-filter-group">
                    <label class="payment-filter-label" for="hallFilter">
                        <i class="bi bi-building me-1"></i> Hall:
                    </label>
                    <select id="hallFilter" class="payment-filter-select">
                        <option value="all">All Halls</option>
                    </select>
                </div>

                <button type="button" class="btn btn-sm btn-light border" id="resetFilters">
                    <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                </button>

            </div>


            <!-- SEARCH AND ENTRIES -->
            <div class="payment-toolbar">
                <div class="d-flex align-items-center gap-2">
                    <span class="small text-secondary">Show</span>
                    <select id="entriesPerPage" class="form-select form-select-sm" style="width:75px;">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="all">All</option>
                    </select>
                    <span class="small text-secondary">entries</span>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <label for="paymentSearch" class="small text-secondary mb-0">Search:</label>
                    <input type="text" id="paymentSearch" class="payment-search" placeholder="Search payments...">
                </div>
            </div>


            <!-- TABLE -->
            <div class="table-responsive">
                <table class="payment-table" id="paymentsTable">
                    <thead>
                        <tr>
                            <th>TXN REFERENCE</th>
                            <th>BOOKING ID</th>
                            <th>CLIENT &amp; HALL</th>
                            <th>PAYMENT MODE</th>
                            <th>AMOUNT PAID</th>
                            <th>NET CC PAYOUT</th>
                            <th>STATUS</th>
                            <th>DATE &amp; TIME</th>
                            <th class="text-end">ACTION</th>
                        </tr>
                    </thead>

                    <tbody id="paymentsTableBody">

                        <!-- PAYMENT 1 -->
                        <tr data-status="Pending"
                            data-center="Sri Krishna Grand Convention Centre"
                            data-hall="Grand Ballroom"
                            data-amount="150000"
                            data-payout="147000">

                            <td>
                                <div class="fw-bold text-primary">TXN-2026-9041</div>
                                <small class="text-muted">Razorpay UPI</small>
                            </td>
                            <td><span class="badge bg-light text-dark border">#CC-9041</span></td>
                            <td>
                                <div class="fw-bold text-dark">Aditya Kumar</div>
                                <small class="text-muted">Sri Krishna Grand Convention Centre</small>
                                <div class="small text-muted">Grand Ballroom · 15 Nov</div>
                            </td>
                            <td><span class="badge bg-light text-dark border"><i class="bi bi-qr-code text-primary me-1"></i>UPI (PhonePe)</span></td>
                            <td class="fw-bold text-dark">₹1,50,000</td>
                            <td class="fw-bold text-success">₹1,47,000</td>
                            <td><span class="payment-status pending"><i class="bi bi-clock-history"></i> Escrow Hold</span></td>
                            <td class="small text-muted">13 Nov 2026, 10:22 AM</td>
                            <td class="text-end">
                                <a href="{{ route('superadmin.payments.view', ['id' => 'TXN-2026-9041']) }}" class="payment-view-btn">
                                    <i class="bi bi-eye"></i> View
                                </a>
                            </td>
                        </tr>

                        <!-- PAYMENT 2 -->
                        <tr data-status="Completed"
                            data-center="Sri Krishna Grand Convention Centre"
                            data-hall="Grand Ballroom"
                            data-amount="680000"
                            data-payout="666400">

                            <td>
                                <div class="fw-bold text-primary">TXN-2026-9035</div>
                                <small class="text-muted">HDFC NetBanking</small>
                            </td>
                            <td><span class="badge bg-light text-dark border">#CC-9035</span></td>
                            <td>
                                <div class="fw-bold text-dark">Vikram Patel</div>
                                <small class="text-muted">Sri Krishna Grand Convention Centre</small>
                                <div class="small text-muted">Grand Ballroom · 09 Nov</div>
                            </td>
                            <td><span class="badge bg-light text-dark border"><i class="bi bi-bank text-info me-1"></i>Net Banking</span></td>
                            <td class="fw-bold text-dark">₹6,80,000</td>
                            <td class="fw-bold text-success">₹6,66,400</td>
                            <td><span class="payment-status completed"><i class="bi bi-check-circle-fill"></i> Settled</span></td>
                            <td class="small text-muted">08 Nov 2026</td>
                            <td class="text-end">
                                <a href="{{ route('superadmin.payments.view', ['id' => 'TXN-2026-9035']) }}" class="payment-view-btn">
                                    <i class="bi bi-eye"></i> View
                                </a>
                            </td>
                        </tr>

                        <!-- PAYMENT 3 -->
                        <tr data-status="Completed"
                            data-center="Vijaya Convention Centre"
                            data-hall="Garden Lawn"
                            data-amount="310000"
                            data-payout="303800">

                            <td>
                                <div class="fw-bold text-primary">TXN-2026-9032</div>
                                <small class="text-muted">Credit Card (Visa)</small>
                            </td>
                            <td><span class="badge bg-light text-dark border">#CC-9032</span></td>
                            <td>
                                <div class="fw-bold text-dark">Pooja Agarwal</div>
                                <small class="text-muted">Vijaya Convention Centre</small>
                                <div class="small text-muted">Garden Lawn · 07 Nov</div>
                            </td>
                            <td><span class="badge bg-light text-dark border"><i class="bi bi-credit-card text-warning me-1"></i>Visa Card</span></td>
                            <td class="fw-bold text-dark">₹3,10,000</td>
                            <td class="fw-bold text-success">₹3,03,800</td>
                            <td><span class="payment-status completed"><i class="bi bi-check-circle-fill"></i> Settled</span></td>
                            <td class="small text-muted">04 Nov 2026</td>
                            <td class="text-end">
                                <a href="{{ route('superadmin.payments.view', ['id' => 'TXN-2026-9032']) }}" class="payment-view-btn">
                                    <i class="bi bi-eye"></i> View
                                </a>
                            </td>
                        </tr>

                        <!-- PAYMENT 4 -->
                        <tr data-status="Refunded"
                            data-center="Vijaya Convention Centre"
                            data-hall="Grand Ballroom"
                            data-amount="100000"
                            data-payout="0">

                            <td>
                                <div class="fw-bold text-danger">TXN-2026-9028</div>
                                <small class="text-muted">Refunded to Source</small>
                            </td>
                            <td><span class="badge bg-light text-dark border">#CC-9028</span></td>
                            <td>
                                <div class="fw-bold text-dark">Manoj Kuldeep</div>
                                <small class="text-muted">Vijaya Convention Centre</small>
                                <div class="small text-muted">Grand Ballroom · 12 Nov</div>
                            </td>
                            <td><span class="badge bg-light text-dark border"><i class="bi bi-arrow-counterclockwise text-danger me-1"></i>Reversal</span></td>
                            <td class="fw-bold text-danger">₹1,00,000</td>
                            <td class="fw-bold text-muted">₹0</td>
                            <td><span class="payment-status refunded"><i class="bi bi-x-circle-fill"></i> Refunded</span></td>
                            <td class="small text-muted">01 Nov 2026</td>
                            <td class="text-end">
                                <a href="{{ route('superadmin.payments.view', ['id' => 'TXN-2026-9028']) }}" class="payment-view-btn">
                                    <i class="bi bi-eye"></i> View
                                </a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>


            <!-- EMPTY STATE -->
            <div class="payment-empty" id="noPaymentsState">
                <i class="bi bi-receipt-cutoff" style="font-size:40px;"></i>
                <h6 class="fw-bold text-dark mt-2">No Payments Found</h6>
                <p class="small mb-0">No payment records match the selected filters.</p>
            </div>

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mt-3">
                <small class="text-secondary" id="paymentCountInfo">Showing 0 entries</small>
            </div>

        </div>
    </div>
</div>
@endsection


@section('script')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const tableBody = document.getElementById('paymentsTableBody');
    const rows = Array.from(tableBody.querySelectorAll('tr'));

    const statusFilter = document.getElementById('statusFilter');
    const centerFilter = document.getElementById('centerFilter');
    const hallFilter = document.getElementById('hallFilter');
    const searchInput = document.getElementById('paymentSearch');
    const entriesSelect = document.getElementById('entriesPerPage');

    const noPaymentsState = document.getElementById('noPaymentsState');
    const paymentsTable = document.getElementById('paymentsTable');
    const countInfo = document.getElementById('paymentCountInfo');

    let currentPageRows = [];

    function formatCurrency(amount) {
        return '₹' + Number(amount).toLocaleString('en-IN');
    }

    // Populate unique centres from the payment records.
    function populateCentreDropdown() {
        const centres = [...new Set(
            rows.map(row => row.dataset.center).filter(Boolean)
        )].sort((a, b) => a.localeCompare(b));

        centres.forEach(centre => {
            const option = document.createElement('option');
            option.value = centre;
            option.textContent = centre;
            centerFilter.appendChild(option);
        });
    }

    // Populate halls according to the selected centre.
    function populateHallDropdown() {
        const selectedCentre = centerFilter.value;
        const previousHall = hallFilter.value;

        const matchingRows = rows.filter(row =>
            selectedCentre === 'all' || row.dataset.center === selectedCentre
        );

        const halls = [...new Set(
            matchingRows.map(row => row.dataset.hall).filter(Boolean)
        )].sort((a, b) => a.localeCompare(b));

        hallFilter.innerHTML = '<option value="all">All Halls</option>';

        halls.forEach(hall => {
            const option = document.createElement('option');
            option.value = hall;
            option.textContent = hall;
            hallFilter.appendChild(option);
        });

        hallFilter.value = halls.includes(previousHall) ? previousHall : 'all';
    }

    // Apply all filters and search.
    function getFilteredRows() {
        const selectedStatus = statusFilter.value;
        const selectedCentre = centerFilter.value;
        const selectedHall = hallFilter.value;
        const searchTerm = searchInput.value.trim().toLowerCase();

        return rows.filter(row => {
            const matchesStatus =
                selectedStatus === 'all' ||
                row.dataset.status === selectedStatus;

            const matchesCentre =
                selectedCentre === 'all' ||
                row.dataset.center === selectedCentre;

            const matchesHall =
                selectedHall === 'all' ||
                row.dataset.hall === selectedHall;

            const matchesSearch =
                !searchTerm || row.textContent.toLowerCase().includes(searchTerm);

            return matchesStatus && matchesCentre && matchesHall && matchesSearch;
        });
    }

    // KPI totals are calculated from the currently filtered rows.
    function updateKpis(filteredRows) {
        let totalReceived = 0;
        let pendingPayout = 0;
        let netSettled = 0;
        let totalRefunds = 0;

        let receivedCount = 0;
        let pendingCount = 0;
        let settledCount = 0;
        let refundedCount = 0;

        filteredRows.forEach(row => {
            const status = row.dataset.status;
            const amount = Number(row.dataset.amount) || 0;
            const payout = Number(row.dataset.payout) || 0;

            if (status === 'Pending') {
                totalReceived += amount;
                pendingPayout += payout;
                receivedCount++;
                pendingCount++;
            } else if (status === 'Completed') {
                totalReceived += amount;
                netSettled += payout;
                receivedCount++;
                settledCount++;
            } else if (status === 'Refunded') {
                totalRefunds += amount;
                refundedCount++;
            }
        });

        document.getElementById('totalReceived').textContent = formatCurrency(totalReceived);
        document.getElementById('pendingPayout').textContent = formatCurrency(pendingPayout);
        document.getElementById('netSettled').textContent = formatCurrency(netSettled);
        document.getElementById('totalRefunds').textContent = formatCurrency(totalRefunds);

        document.getElementById('totalReceivedInfo').textContent =
            receivedCount + ' payment transaction(s)';

        document.getElementById('pendingPayoutInfo').textContent =
            pendingCount + ' pending transaction(s)';

        document.getElementById('netSettledInfo').textContent =
            settledCount + ' settled transaction(s)';

        document.getElementById('refundInfo').textContent =
            refundedCount + ' refunded transaction(s)';
    }

    // Display filtered rows and apply the selected page size.
    function renderTable() {
        const filteredRows = getFilteredRows();
        updateKpis(filteredRows);

        const pageSize = entriesSelect.value === 'all'
            ? filteredRows.length
            : Number(entriesSelect.value);

        const visibleRows = filteredRows.slice(0, pageSize);

        rows.forEach(row => {
            row.style.display = visibleRows.includes(row) ? '' : 'none';
        });

        if (filteredRows.length === 0) {
            paymentsTable.style.display = 'none';
            noPaymentsState.style.display = 'block';
        } else {
            paymentsTable.style.display = '';
            noPaymentsState.style.display = 'none';
        }

        countInfo.textContent = filteredRows.length === 0
            ? 'Showing 0 entries'
            : 'Showing 1 to ' + visibleRows.length + ' of ' + filteredRows.length + ' entries';
    }

    statusFilter.addEventListener('change', renderTable);

    centerFilter.addEventListener('change', function () {
        populateHallDropdown();
        renderTable();
    });

    hallFilter.addEventListener('change', renderTable);
    searchInput.addEventListener('input', renderTable);
    entriesSelect.addEventListener('change', renderTable);

    document.getElementById('resetFilters').addEventListener('click', function () {
        statusFilter.value = 'all';
        centerFilter.value = 'all';
        searchInput.value = '';
        entriesSelect.value = '10';

        populateHallDropdown();
        hallFilter.value = 'all';

        renderTable();
    });

    // Initial setup.
    populateCentreDropdown();
    populateHallDropdown();
    renderTable();

});
</script>
@endsection
