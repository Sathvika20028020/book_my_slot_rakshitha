@extends('superadmin.layout.app')

@section('title') Bookings Management @endsection

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    .booking-filter-btn {
        border-radius: 9999px;
        padding: 0.45rem 1.35rem;
        font-weight: 500;
        font-size: 0.88rem;
        border: none;
        transition: all 0.2s ease-in-out;
        color: #4b5563;
        background-color: #f3f4f6;
        text-decoration: none;
        display: inline-block;
        cursor: pointer;
    }

    .booking-filter-btn:hover {
        background-color: #e5e7eb;
        color: #1f2937;
    }

    .booking-filter-btn.active {
        background-color: #7044f2;
        color: #ffffff;
        box-shadow: 0 4px 12px rgba(112, 68, 242, 0.28);
    }

    .dropdown-filter-pill {
        background-color: #f3f4f6;
        border-radius: 12px;
        padding: 0.45rem 1.1rem;
        font-size: 0.875rem;
        color: #374151;
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
    }

    .dropdown-filter-pill select {
        background: transparent;
        border: none;
        font-size: 0.875rem;
        font-weight: 500;
        color: #374151;
        outline: none;
        cursor: pointer;
    }

    .bookings-table {
        margin-bottom: 0;
    }

    .bookings-table thead th {
        font-size: 0.76rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #6b7280;
        font-weight: 600;
        border-bottom: 1px solid #e5e7eb;
        padding: 1rem 1.25rem;
        background-color: #ffffff;
        white-space: nowrap;
    }

    .bookings-table tbody tr {
        transition: background-color 0.15s ease;
        border-bottom: 1px solid #f3f4f6;
    }

    .bookings-table tbody tr:hover {
        background-color: #f9fafb;
    }

    .bookings-table tbody td {
        padding: 1.15rem 1.25rem;
        vertical-align: middle;
        font-size: 0.915rem;
        color: #374151;
        white-space: nowrap;
    }

    .booking-id-link {
        font-weight: 700;
        color: #111827;
        text-decoration: none;
        transition: color 0.15s;
    }

    .booking-id-link:hover {
        color: #7044f2;
        text-decoration: underline;
    }

    .badge-status {
        display: inline-block;
        padding: 0.35rem 0.95rem;
        border-radius: 9999px;
        font-size: 0.78rem;
        font-weight: 600;
        line-height: 1.2;
        text-align: center;
    }

    .badge-status-confirmed {
        background-color: #e6f9ed;
        color: #10b981;
    }

    .badge-status-pending {
        background-color: #fef3c7;
        color: #b45309;
    }

    .badge-status-cancelled {
        background-color: #fde8e8;
        color: #e02424;
    }

    .badge-status-disputed {
        background-color: #fde8e8;
        color: #e02424;
    }

    .badge-status-completed {
        background-color: #e6f9ed;
        color: #10b981;
    }

    .booking-card {
        border-radius: 16px;
        border: 1px solid #e5e7eb;
        background: #ffffff;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .quick-stat-pill {
        background: #f9fafb;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 0.85rem 1.15rem;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 style="color: #1e2f65;font-family: sans-serif;">Bookings</h3>
            </div>
            <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a>
                    </li>

                    <li class="breadcrumb-item active">Details</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4">



    <!-- Quick Stats Cards -->
    <div class="row g-3 mb-4">
        <div class="col-6 col-lg-3">
            <div class="quick-stat-pill d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted d-block small fw-semibold">Total Bookings</span>
                    <h4 class="fw-bold mb-0 text-dark" id="totalBookingsCount">1,482</h4>
                </div>
                <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; background: #ede9fe; color: #7c3aed;">
                    <i class="bi bi-calendar-event fs-5"></i>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="quick-stat-pill d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted d-block small fw-semibold">Confirmed</span>
                    <h4 class="fw-bold mb-0 text-success" id="confirmedBookingsCount">1,210</h4>
                </div>
                <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; background: #e6f9ed; color: #10b981;">
                    <i class="bi bi-check2-circle fs-5"></i>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="quick-stat-pill d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted d-block small fw-semibold">Pending Approval</span>
                    <h4 class="fw-bold mb-0 text-warning" id="pendingBookingsCount">184</h4>
                </div>
                <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; background: #fef3c7; color: #d97706;">
                    <i class="bi bi-clock-history fs-5"></i>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="quick-stat-pill d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted d-block small fw-semibold">Revenue (MTD)</span>
                    <h4 class="fw-bold mb-0 text-dark" id="totalRevenueCount">₹42.8 L</h4>
                </div>
                <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; background: #e0f2fe; color: #0284c7;">
                    <i class="bi bi-currency-rupee fs-5"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Card matching User Image -->
    <div class="booking-card p-3 p-md-4">
        <!-- Filter Tabs & City/Date Pill Bar -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
            <!-- Filter Pills -->
            <div class="d-flex flex-wrap gap-2" id="statusFilterButtons">
                <button class="booking-filter-btn active" data-filter="all">All</button>
                <button class="booking-filter-btn" data-filter="Confirmed">Confirmed</button>
                <button class="booking-filter-btn" data-filter="Pending">Pending</button>
                <button class="booking-filter-btn" data-filter="Cancelled">Cancelled</button>

            </div>

            <!-- City & Month Filter Pill (Exact matching reference image) -->
            <!-- Venue Owner & Month Filter -->
            <div class="d-flex flex-wrap align-items-center gap-3">

                <div class="dropdown-filter-pill">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-person-badge text-secondary"></i>
                        <span class="text-secondary fw-normal">Owner:</span>

                        <select id="ownerFilterSelect">
                            <option value="all" selected>All Owners</option>
                            <option value="Owner 1">Owner 1</option>
                            <option value="Owner 2">Owner 2</option>
                            <option value="Owner 3">Owner 3</option>
                            <option value="Owner 4">Owner 4</option>
                            <option value="Owner 5">Owner 5</option>
                            <option value="Owner 6">Owner 6</option>
                            <option value="Owner 7">Owner 7</option>
                            <option value="Owner 8">Owner 8</option>
                        </select>
                    </div>

                    <span class="text-muted">|</span>

                    <div class="d-flex align-items-center gap-1">
                        <i class="bi bi-calendar3 text-secondary"></i>

                        <select id="monthFilterSelect">
                            <option value="all">All Months</option>
                            <option value="Nov 2026" selected>Nov 2026</option>
                            <option value="Dec 2026">Dec 2026</option>
                        </select>
                    </div>
                </div>

            </div>
        </div>

        <!-- Bookings Table matching User Reference Image -->
        <div class="table-responsive">
            <table class="display" id="data-source-1" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">CUSTOMER</th>
                        <th scope="col">VENUE</th>
                        <th scope="col">CITY</th>
                        <th scope="col">EVENT DATE</th>
                        <th scope="col">AMOUNT</th>
                        <th scope="col">STATUS</th>
                        <th scope="col" class="text-end">ACTION</th>
                    </tr>
                </thead>
                <tbody id="bookingsTableBody">
                    <!-- Row 1 -->
                    <tr data-status="Confirmed"
                        data-city="Bengaluru"
                        data-owner="Owner 1"
                        data-date="12 Dec 2026"
                        data-amount="5.86">
                        <td>
                            <a href="{{ route('admin.bookings.show') }}" class="booking-id-link">BMS-4821</a>
                        </td>
                        <td class="fw-medium text-dark">Priya Nair</td>
                        <td>Royal Orchid</td>
                        <td>Bengaluru</td>
                        <td>12 Dec 2026</td>
                        <td class="fw-semibold">Rs. 5.86 L</td>
                        <td>
                            <span class="badge-status badge-status-confirmed">Confirmed</span>
                        </td>
                        <td class="text-end">
                            <div class="d-inline-flex align-items-center gap-1">
                                <a href="{{ route('admin.bookings.show') }}" class="btn btn-sm btn-light border" title="View details">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr data-status="Pending"
                        data-city="Hyderabad"
                        data-owner="Owner 2"
                        data-date="10 Dec 2026"
                        data-amount="3.20">
                        <td>
                            <a href="{{ route('admin.bookings.show') }}" class="booking-id-link">BMS-4820</a>
                        </td>
                        <td class="fw-medium text-dark">Arun Kumar</td>
                        <td>Grand Palace</td>
                        <td>Hyderabad</td>
                        <td>10 Dec 2026</td>
                        <td class="fw-semibold">Rs. 3.20 L</td>
                        <td>
                            <span class="badge-status badge-status-pending">Pending</span>
                        </td>
                        <td class="text-end">
                            <div class="d-inline-flex align-items-center gap-1">
                                <button type="button" class="btn btn-sm btn-success rounded-pill px-2 py-1" title="Approve Booking" onclick="this.closest('tr').querySelector('.badge-status').className='badge-status badge-status-confirmed'; this.closest('tr').querySelector('.badge-status').innerText='Confirmed'; this.parentElement.innerHTML='<span class=\'badge bg-success bg-opacity-10 text-success me-1\'>Approved</span><a href=\'{{ route('admin.bookings.show') }}\' class=\'btn btn-sm btn-light border\'><i class=\'bi bi-eye\'></i></a>';">
                                    <i class="bi bi-check-lg"></i> Approve
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-danger rounded-pill px-2 py-1" title="Reject Booking" onclick="this.closest('tr').querySelector('.badge-status').className='badge-status badge-status-cancelled'; this.closest('tr').querySelector('.badge-status').innerText='Rejected'; this.parentElement.innerHTML='<span class=\'badge bg-danger bg-opacity-10 text-danger me-1\'>Rejected</span><a href=\'{{ route('admin.bookings.show') }}\' class=\'btn btn-sm btn-light border\'><i class=\'bi bi-eye\'></i></a>';">
                                    <i class="bi bi-x-lg"></i> Reject
                                </button>
                                <a href="{{ route('admin.bookings.show') }}" class="btn btn-sm btn-light border" title="View details">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr data-status="Confirmed"
                        data-city="Bengaluru"
                        data-owner="Owner 3"
                        data-date="08 Dec 2026"
                        data-amount="0.95">
                        <td>
                            <a href="{{ route('admin.bookings.show') }}" class="booking-id-link">BMS-4819</a>
                        </td>
                        <td class="fw-medium text-dark">Sneha Rao</td>
                        <td>Lotus Garden</td>
                        <td>Bengaluru</td>
                        <td>08 Dec 2026</td>
                        <td class="fw-semibold">Rs. 0.95 L</td>
                        <td>
                            <span class="badge-status badge-status-confirmed">Confirmed</span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.bookings.show') }}" class="btn btn-sm btn-primary" title="View details">
                                <i class="bi bi-eye me-1"></i> View
                            </a>
                        </td>
                    </tr>

                    <!-- Row 4 -->
                    <tr data-status="Confirmed"
                        data-city="Mumbai"
                        data-owner="Owner 4"
                        data-date="05 Dec 2026"
                        data-amount="2.40">
                        <td>
                            <a href="{{ route('admin.bookings.show') }}" class="booking-id-link">BMS-4818</a>
                        </td>
                        <td class="fw-medium text-dark">Vikram Shah</td>
                        <td>Skyline Hall</td>
                        <td>Mumbai</td>
                        <td>05 Dec 2026</td>
                        <td class="fw-semibold">Rs. 2.40 L</td>
                        <td>
                            <span class="badge-status badge-status-confirmed">Confirmed</span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.bookings.show') }}" class="btn btn-sm btn-primary" title="View details">
                                <i class="bi bi-eye me-1"></i> View
                            </a>
                        </td>
                    </tr>

                    <!-- Row 5 -->
                    <tr data-status="Disputed"
                        data-city="Chennai"
                        data-owner="Owner 5"
                        data-date="03 Dec 2026"
                        data-amount="1.80">
                        <td>
                            <a href="{{ route('admin.bookings.show') }}" class="booking-id-link">BMS-4817</a>
                        </td>
                        <td class="fw-medium text-dark">Meena Iyer</td>
                        <td>Palm Grove</td>
                        <td>Chennai</td>
                        <td>03 Dec 2026</td>
                        <td class="fw-semibold">Rs. 1.80 L</td>
                        <td>
                            <span class="badge-status badge-status-disputed">Disputed</span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.bookings.show') }}" class="btn btn-sm btn-primary" title="View details">
                                <i class="bi bi-eye me-1"></i> View
                            </a>
                        </td>
                    </tr>

                    <!-- Row 6 -->
                    <tr data-status="Completed"
                        data-city="Pune"
                        data-owner="Owner 6"
                        data-date="30 Nov 2026"
                        data-amount="6.10">
                        <td>
                            <a href="{{ route('admin.bookings.show') }}" class="booking-id-link">BMS-4816</a>
                        </td>
                        <td class="fw-medium text-dark">Rahul Jain</td>
                        <td>Orion Hall</td>
                        <td>Pune</td>
                        <td>30 Nov 2026</td>
                        <td class="fw-semibold">Rs. 6.10 L</td>
                        <td>
                            <span class="badge-status badge-status-completed">Completed</span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.bookings.show') }}" class="btn btn-sm btn-primary" title="View details">
                                <i class="bi bi-eye me-1"></i> View
                            </a>
                        </td>
                    </tr>

                    <!-- Row 7 -->
                    <tr data-status="Cancelled"
                        data-city="Kochi"
                        data-owner="Owner 7"
                        data-date="28 Nov 2026"
                        data-amount="2.75">
                        <td>
                            <a href="{{ route('admin.bookings.show') }}" class="booking-id-link">BMS-4815</a>
                        </td>
                        <td class="fw-medium text-dark">Divya Menon</td>
                        <td>Green Valley</td>
                        <td>Kochi</td>
                        <td>28 Nov 2026</td>
                        <td class="fw-semibold">Rs. 2.75 L</td>
                        <td>
                            <span class="badge-status badge-status-cancelled">Cancelled</span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.bookings.show') }}" class="btn btn-sm btn-primary" title="View details">
                                <i class="bi bi-eye me-1"></i> View
                            </a>
                        </td>
                    </tr>

                    <!-- Row 8 -->
                    <tr data-status="Pending"
                        data-city="Ahmedabad"
                        data-owner="Owner 8"
                        data-date="26 Nov 2026"
                        data-amount="4.90">
                        <td>
                            <a href="{{ route('admin.bookings.show') }}" class="booking-id-link">BMS-4814</a>
                        </td>
                        <td class="fw-medium text-dark">Karan Patel</td>
                        <td>Crystal Palace</td>
                        <td>Ahmedabad</td>
                        <td>26 Nov 2026</td>
                        <td class="fw-semibold">Rs. 4.90 L</td>
                        <td>
                            <span class="badge-status badge-status-pending">Pending</span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.bookings.show') }}" class="btn btn-sm btn-primary" title="View details">
                                <i class="bi bi-eye me-1"></i> View
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const filterButtons = document.querySelectorAll('.booking-filter-btn');
        const ownerFilterSelect = document.getElementById('ownerFilterSelect');
        const monthFilterSelect = document.getElementById('monthFilterSelect');
        const searchInput = document.getElementById('bookingSearchInput');

        const rows = Array.from(
            document.querySelectorAll('#bookingsTableBody tr')
        );

        const totalBookingsCount = document.getElementById('totalBookingsCount');
        const confirmedBookingsCount = document.getElementById('confirmedBookingsCount');
        const pendingBookingsCount = document.getElementById('pendingBookingsCount');
        const totalRevenueCount = document.getElementById('totalRevenueCount');

        let currentStatus = 'all';
        let currentOwner = 'all';
        let currentMonth = monthFilterSelect ? monthFilterSelect.value : 'all';
        let searchKeyword = '';

        function getMonthYear(dateString) {
            const date = new Date(dateString);

            if (isNaN(date.getTime())) {
                return '';
            }

            return date.toLocaleDateString('en-US', {
                month: 'short',
                year: 'numeric'
            });
        }

        function updateKpis(filteredRows) {

            let total = filteredRows.length;
            let confirmed = 0;
            let pending = 0;
            let revenue = 0;

            filteredRows.forEach(row => {

                const status = row.getAttribute('data-status');

                if (status === 'Confirmed') {
                    confirmed++;
                }

                if (status === 'Pending') {
                    pending++;
                }

                revenue += parseFloat(row.getAttribute('data-amount')) || 0;

            });

            if (totalBookingsCount) {
                totalBookingsCount.textContent = total.toLocaleString('en-IN');
            }

            if (confirmedBookingsCount) {
                confirmedBookingsCount.textContent = confirmed.toLocaleString('en-IN');
            }

            if (pendingBookingsCount) {
                pendingBookingsCount.textContent = pending.toLocaleString('en-IN');
            }

            if (totalRevenueCount) {
                totalRevenueCount.textContent =
                    '₹' + revenue.toFixed(2) + ' L';
            }
        }

        function filterRows() {

            const filteredRows = [];

            rows.forEach(row => {

                const rowStatus = row.getAttribute('data-status');
                const rowOwner = row.getAttribute('data-owner');
                const rowDate = row.getAttribute('data-date');
                const rowText = row.innerText.toLowerCase();

                const statusMatch =
                    currentStatus === 'all' || rowStatus === currentStatus;

                const ownerMatch =
                    currentOwner === 'all' || rowOwner === currentOwner;

                const monthMatch =
                    currentMonth === 'all' ||
                    getMonthYear(rowDate) === currentMonth;

                const searchMatch = !searchKeyword || rowText.includes(searchKeyword);

                const isVisible =
                    statusMatch && ownerMatch && monthMatch && searchMatch;

                row.style.display = isVisible ? '' : 'none';

                if (isVisible) {
                    filteredRows.push(row);
                }

            });

            updateKpis(filteredRows);
        }

        // STATUS FILTER
        filterButtons.forEach(btn => {

            btn.addEventListener('click', function() {

                filterButtons.forEach(button => {
                    button.classList.remove('active');
                });

                this.classList.add('active');

                currentStatus = this.getAttribute('data-filter');

                filterRows();
            });

        });

        // OWNER FILTER
        if (ownerFilterSelect) {

            ownerFilterSelect.addEventListener('change', function() {

                currentOwner = this.value;

                filterRows();
            });

        }

        // MONTH FILTER
        if (monthFilterSelect) {

            monthFilterSelect.addEventListener('change', function() {

                currentMonth = this.value;

                filterRows();
            });

        }

        // SEARCH FILTER
        if (searchInput) {

            searchInput.addEventListener('input', function() {

                searchKeyword = this.value.trim().toLowerCase();

                filterRows();
            });

        }

        // INITIAL COUNTS
        filterRows();

    });
</script>
@endsection