
@extends('superadmin.layout.app')

@section('title', 'Superadmin Calendar | Book My Slot')

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
    .super-calendar {
        background: #fff;
        border: 1px solid #e8edf4;
        border-radius: 18px;
        padding: 22px;
        box-shadow: 0 4px 18px rgba(15,23,42,.04);
    }

    .calendar-heading {
        font-size: 23px;
        font-weight: 750;
        color: #172554;
    }

    .calendar-subtitle {
        color: #64748b;
        font-size: 13px;
    }

    .calendar-filter {
        min-width: 155px;
        max-width: none;
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        font-size: 13px;
        font-weight: 600;
        color: #334155;
        padding: 9px 12px;
        background-color: #fff;
    }

    .calendar-stat {
        background: #fff;
        border: 1px solid #e8edf4;
        border-radius: 15px;
        padding: 17px;
        height: 100%;
    }

    .calendar-stat-label {
        color: #64748b;
        font-size: 12px;
        font-weight: 700;
    }

    .calendar-stat-value {
        font-size: 25px;
        font-weight: 800;
        color: #172554;
        margin: 5px 0 0;
    }

    .calendar-stat-icon {
        width: 43px;
        height: 43px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
    }

    .calendar-toolbar {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        margin-bottom: 22px;
    }

    .calendar-month-title {
        font-size: 21px;
        font-weight: 750;
        color: #172554;
        margin: 0;
    }

    .calendar-nav {
        width: 34px;
        height: 34px;
        border: 1px solid #e2e8f0;
        background: #f8fafc;
        color: #334155;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .calendar-nav:hover {
        background: #e2e8f0;
    }

    .calendar-weekdays,
    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, minmax(0, 1fr));
        gap: 9px;
    }

    .calendar-weekdays {
        margin-bottom: 10px;
    }

    .calendar-weekday {
        text-align: center;
        font-size: 12px;
        font-weight: 750;
        color: #64748b;
        padding: 8px 0;
    }

    .calendar-day {
        min-height: 115px;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 10px;
        background: #fff;
        cursor: pointer;
        transition: .18s ease;
        display: flex;
        flex-direction: column;
        gap: 7px;
    }

    .calendar-day:hover {
        border-color: #93c5fd;
        background: #f8fbff;
        transform: translateY(-2px);
    }

    .calendar-day.selected {
        border: 2px solid #2563eb;
        background: #eff6ff;
    }

    .calendar-day.empty {
        background: #f8fafc;
        border-style: dashed;
        cursor: default;
        opacity: .55;
    }

    .calendar-day.empty:hover {
        transform: none;
    }

    .calendar-day-number {
        font-size: 14px;
        font-weight: 750;
        color: #1e293b;
    }

    .calendar-day.today .calendar-day-number {
        width: 25px;
        height: 25px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #2563eb;
        color: #fff;
        border-radius: 50%;
    }

    .calendar-event {
        font-size: 10px;
        font-weight: 700;
        border-radius: 6px;
        padding: 4px 6px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .event-booked {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .event-pending {
        background: #fef3c7;
        color: #92400e;
    }

    .event-blocked {
        background: #fee2e2;
        color: #b91c1c;
    }

    .event-more {
        color: #64748b;
        font-size: 10px;
        font-weight: 700;
    }

    .calendar-free {
        color: #16a34a;
        font-size: 11px;
        font-weight: 650;
    }

    .calendar-legend {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 17px;
    }

    .legend-item {
        display: flex;
        align-items: center;
        gap: 7px;
        font-size: 12px;
        color: #64748b;
        font-weight: 600;
    }

    .legend-dot {
        width: 10px;
        height: 10px;
        border-radius: 3px;
    }

    .calendar-modal-event {
        border: 1px solid #e8edf4;
        border-radius: 12px;
        padding: 13px;
        margin-bottom: 10px;
    }

    .calendar-modal-event:last-child {
        margin-bottom: 0;
    }

    .calendar-status {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 750;
    }

    .calendar-status.booked {
        color: #1d4ed8;
        background: #dbeafe;
    }

    .calendar-status.pending {
        color: #92400e;
        background: #fef3c7;
    }

    .calendar-status.blocked {
        color: #b91c1c;
        background: #fee2e2;
    }

    @media(max-width: 767px) {
        .super-calendar {
            padding: 14px;
        }

        .calendar-grid,
        .calendar-weekdays {
            gap: 4px;
        }

        .calendar-day {
            min-height: 82px;
            padding: 5px;
            border-radius: 8px;
        }

        .calendar-event {
            font-size: 8px;
            padding: 3px;
        }

        .calendar-day-number {
            font-size: 11px;
        }

        .calendar-weekday {
            font-size: 10px;
        }

        .calendar-filter {
            max-width: 100%;
            width: 100%;
        }
    }
</style>
@endsection

@section('content')

<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="page-title mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h3 style="color:#1e2f65;font-family:sans-serif;font-weight:700;">
                    <i class="bi bi-calendar3 me-2"></i>All Convention Centre Calendar
                </h3>
                <p class="text-muted small mb-0">
                    Monitor bookings and availability across all registered convention centres.
                </p>
            </div>

            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('superadmin.dashboard') }}">
                            <i class="fa fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item active">Calendar</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- FILTERS -->
    <div class="card border-0 shadow-sm rounded-4 p-3 mb-4">
        <div class="d-flex align-items-center gap-2 mb-3">
            <i class="bi bi-funnel-fill text-primary"></i>
            <h6 class="fw-bold mb-0">Calendar Filters</h6>
        </div>

        <div class="row g-3">

            <div class="col-12 col-md-5">
                <label class="form-label small fw-bold text-secondary">
                    Convention Centre
                </label>

                <select id="centreFilter" class="form-select calendar-filter w-100">
                    <option value="all">All Convention Centres</option>
                </select>
            </div>

            <div class="col-12 col-md-3">
                <label class="form-label small fw-bold text-secondary">
                    Hall
                </label>

                <select id="hallFilter" class="form-select calendar-filter w-100">
                    <option value="all">All Halls</option>
                </select>
            </div>

            <div class="col-12 col-md-2">
                <label class="form-label small fw-bold text-secondary">
                    Booking Status
                </label>

                <select id="statusFilter" class="form-select calendar-filter w-100">
                    <option value="all">All Status</option>
                    <option value="Booked">Booked</option>
                    <option value="Pending">Pending</option>
                    <option value="Blocked">Blocked</option>
                </select>
            </div>

            <div class="col-12 col-md-2 d-flex align-items-end">
                <button type="button" id="resetFilters"
                    class="btn btn-outline-secondary rounded-3 w-100">
                    <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                </button>
            </div>

        </div>
    </div>

    <!-- KPI CARDS -->
    <div class="row g-3 mb-4">

        <div class="col-6 col-xl-3">
            <div class="calendar-stat">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="calendar-stat-label">Total Events</div>
                        <h4 class="calendar-stat-value" id="totalEvents">0</h4>
                    </div>
                    <div class="calendar-stat-icon" style="background:#ede9fe;color:#7c3aed;">
                        <i class="bi bi-calendar-event"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-xl-3">
            <div class="calendar-stat">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="calendar-stat-label">Confirmed Bookings</div>
                        <h4 class="calendar-stat-value text-primary" id="bookedEvents">0</h4>
                    </div>
                    <div class="calendar-stat-icon" style="background:#dbeafe;color:#2563eb;">
                        <i class="bi bi-check-circle"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-xl-3">
            <div class="calendar-stat">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="calendar-stat-label">Pending Approval</div>
                        <h4 class="calendar-stat-value text-warning" id="pendingEvents">0</h4>
                    </div>
                    <div class="calendar-stat-icon" style="background:#fef3c7;color:#d97706;">
                        <i class="bi bi-clock-history"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-xl-3">
            <div class="calendar-stat">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="calendar-stat-label">Blocked Dates / Slots</div>
                        <h4 class="calendar-stat-value text-danger" id="blockedEvents">0</h4>
                    </div>
                    <div class="calendar-stat-icon" style="background:#fee2e2;color:#dc2626;">
                        <i class="bi bi-slash-circle"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- CALENDAR -->
    <div class="super-calendar mb-4">

        <div class="calendar-toolbar">

            <div class="d-flex align-items-center flex-wrap gap-3">
                <h4 class="calendar-month-title" id="calendarMonthTitle">
                    November 2026
                </h4>

                <div class="d-flex gap-1">
                    <button type="button" class="calendar-nav" id="previousMonth">
                        <i class="bi bi-chevron-left"></i>
                    </button>

                    <button type="button" class="calendar-nav" id="nextMonth">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>

                <button type="button" class="btn btn-sm btn-light border rounded-pill"
                    id="todayButton">
                    Today
                </button>
            </div>

            <div class="d-flex flex-wrap gap-2">
                <select id="monthSelect" class="form-select calendar-filter">
                    <option value="0">January</option>
                    <option value="1">February</option>
                    <option value="2">March</option>
                    <option value="3">April</option>
                    <option value="4">May</option>
                    <option value="5">June</option>
                    <option value="6">July</option>
                    <option value="7">August</option>
                    <option value="8">September</option>
                    <option value="9">October</option>
                    <option value="10">November</option>
                    <option value="11">December</option>
                </select>

                <select id="yearSelect" class="form-select calendar-filter">
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                </select>
            </div>

        </div>

        <!-- LEGEND -->
        <div class="calendar-legend mb-3">
            <div class="legend-item">
                <span class="legend-dot" style="background:#3b82f6;"></span>
                Confirmed Booking
            </div>

            <div class="legend-item">
                <span class="legend-dot" style="background:#f59e0b;"></span>
                Pending Approval
            </div>

            <div class="legend-item">
                <span class="legend-dot" style="background:#ef4444;"></span>
                Blocked / Maintenance
            </div>

            <div class="legend-item">
                <span class="legend-dot" style="background:#16a34a;"></span>
                Available
            </div>
        </div>

        <!-- WEEKDAYS -->
        <div class="calendar-weekdays">
            <div class="calendar-weekday">Sun</div>
            <div class="calendar-weekday">Mon</div>
            <div class="calendar-weekday">Tue</div>
            <div class="calendar-weekday">Wed</div>
            <div class="calendar-weekday">Thu</div>
            <div class="calendar-weekday">Fri</div>
            <div class="calendar-weekday">Sat</div>
        </div>

        <!-- DAYS -->
        <div class="calendar-grid" id="calendarGrid"></div>

    </div>

    <div class="card border-0 shadow-sm rounded-4 p-3">
        <h6 class="fw-bold mb-2">
            <i class="bi bi-info-circle text-primary me-2"></i>
            Superadmin Calendar Information
        </h6>

        <p class="text-muted small mb-0">
            This calendar provides a consolidated view of all convention centres
            managed by the application. Select a convention centre to inspect its
            bookings, halls and blocked slots. Select All Convention Centres to
            view activity across the entire platform.
        </p>
    </div>

</div>

<!-- DATE DETAILS MODAL -->
<div class="modal fade" id="calendarDateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 shadow">

            <div class="modal-header border-0">
                <div>
                    <h5 class="modal-title fw-bold" id="modalDateHeading">
                        Date Details
                    </h5>
                    <p class="text-muted small mb-0" id="modalCentreHeading">
                        All Convention Centres
                    </p>
                </div>

                <button type="button" class="btn-close"
                    data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body pt-0">

                <div class="row g-2 mb-3">
                    <div class="col-4">
                        <div class="p-3 rounded-3 text-center" style="background:#eff6ff;">
                            <div class="small text-primary fw-semibold">Booked</div>
                            <h5 class="fw-bold mb-0 text-primary" id="modalBookedCount">0</h5>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="p-3 rounded-3 text-center" style="background:#fffbeb;">
                            <div class="small text-warning fw-semibold">Pending</div>
                            <h5 class="fw-bold mb-0 text-warning" id="modalPendingCount">0</h5>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="p-3 rounded-3 text-center" style="background:#fef2f2;">
                            <div class="small text-danger fw-semibold">Blocked</div>
                            <h5 class="fw-bold mb-0 text-danger" id="modalBlockedCount">0</h5>
                        </div>
                    </div>
                </div>

                <div id="modalEventList"></div>

            </div>

            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light rounded-pill px-4"
                    data-bs-dismiss="modal">
                    Close
                </button>
            </div>

        </div>
    </div>
</div>

@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const monthNames = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];

    const today = new Date();

    let currentYear = today.getFullYear();
    let currentMonth = today.getMonth();
    let selectedDate = null;

    /*
     * DEMO DATA
     * Replace this sample data with records from your database/controller.
     * One event represents one booking or one blocked slot.
     */

    const centres = [
        {
            id: 1,
            name: 'Sri Krishna Grand Convention Centre',
            halls: ['Grand Ballroom', 'Mini Hall', 'Garden Lawn']
        },
        {
            id: 2,
            name: 'Royal Orchid Convention Centre',
            halls: ['Royal Hall', 'Banquet Hall']
        },
        {
            id: 3,
            name: 'Grand Palace Convention Centre',
            halls: ['Main Hall', 'Dining Hall', 'Open Lawn']
        },
        {
            id: 4,
            name: 'Lotus Garden Convention Centre',
            halls: ['Lotus Hall', 'Garden Hall']
        }
    ];

    const events = [
        {
            date: '2026-11-18',
            centreId: 1,
            hall: 'Grand Ballroom',
            slot: 'Full Day',
            time: '08:00 AM - 11:30 PM',
            status: 'Booked',
            bookingId: 'BMS-1001',
            customer: 'Priya Nair'
        },
        {
            date: '2026-11-18',
            centreId: 2,
            hall: 'Royal Hall',
            slot: 'Morning',
            time: '08:00 AM - 02:00 PM',
            status: 'Pending',
            bookingId: 'BMS-1002',
            customer: 'Arun Kumar'
        },
        {
            date: '2026-11-19',
            centreId: 3,
            hall: 'Main Hall',
            slot: 'Evening',
            time: '05:00 PM - 11:30 PM',
            status: 'Booked',
            bookingId: 'BMS-1003',
            customer: 'Sneha Rao'
        },
        {
            date: '2026-11-20',
            centreId: 1,
            hall: 'Garden Lawn',
            slot: 'Full Day',
            time: '08:00 AM - 11:30 PM',
            status: 'Blocked',
            bookingId: '',
            customer: 'Maintenance'
        },
        {
            date: '2026-11-21',
            centreId: 4,
            hall: 'Lotus Hall',
            slot: 'Morning',
            time: '08:00 AM - 02:00 PM',
            status: 'Booked',
            bookingId: 'BMS-1004',
            customer: 'Vikram Shah'
        },
        {
            date: '2026-11-22',
            centreId: 2,
            hall: 'Banquet Hall',
            slot: 'Evening',
            time: '05:00 PM - 11:30 PM',
            status: 'Blocked',
            bookingId: '',
            customer: 'Hall Maintenance'
        },
        {
            date: '2026-11-23',
            centreId: 3,
            hall: 'Dining Hall',
            slot: 'Morning',
            time: '08:00 AM - 02:00 PM',
            status: 'Pending',
            bookingId: 'BMS-1005',
            customer: 'Meena Iyer'
        },
        {
            date: '2026-11-25',
            centreId: 1,
            hall: 'Mini Hall',
            slot: 'Evening',
            time: '05:00 PM - 11:30 PM',
            status: 'Booked',
            bookingId: 'BMS-1006',
            customer: 'Rahul Jain'
        },
        {
            date: '2026-11-26',
            centreId: 4,
            hall: 'Garden Hall',
            slot: 'Full Day',
            time: '08:00 AM - 11:30 PM',
            status: 'Booked',
            bookingId: 'BMS-1007',
            customer: 'Divya Menon'
        },
        {
            date: '2026-12-02',
            centreId: 2,
            hall: 'Royal Hall',
            slot: 'Full Day',
            time: '08:00 AM - 11:30 PM',
            status: 'Booked',
            bookingId: 'BMS-1008',
            customer: 'Karan Patel'
        },
        {
            date: '2026-12-05',
            centreId: 1,
            hall: 'Grand Ballroom',
            slot: 'Morning',
            time: '08:00 AM - 02:00 PM',
            status: 'Pending',
            bookingId: 'BMS-1009',
            customer: 'Ananya Rao'
        }
    ];

    const centreFilter = document.getElementById('centreFilter');
    const hallFilter = document.getElementById('hallFilter');
    const statusFilter = document.getElementById('statusFilter');
    const monthSelect = document.getElementById('monthSelect');
    const yearSelect = document.getElementById('yearSelect');
    const calendarGrid = document.getElementById('calendarGrid');

    // Populate convention centre dropdown
    centres.forEach(centre => {
        const option = document.createElement('option');
        option.value = centre.id;
        option.textContent = centre.name;
        centreFilter.appendChild(option);
    });

    function getFilteredEvents() {

        return events.filter(event => {

            const centreMatch =
                centreFilter.value === 'all' ||
                String(event.centreId) === centreFilter.value;

            const hallMatch =
                hallFilter.value === 'all' ||
                event.hall === hallFilter.value;

            const statusMatch =
                statusFilter.value === 'all' ||
                event.status === statusFilter.value;

            const eventDate = new Date(event.date + 'T00:00:00');

            const monthMatch =
                eventDate.getFullYear() === currentYear &&
                eventDate.getMonth() === currentMonth;

            return centreMatch && hallMatch && statusMatch && monthMatch;

        });
    }

    function updateHallOptions() {

        const selectedCentre = centreFilter.value;

        hallFilter.innerHTML = '<option value="all">All Halls</option>';

        let availableHalls = [];

        if (selectedCentre === 'all') {

            centres.forEach(centre => {
                availableHalls.push(...centre.halls);
            });

        } else {

            const centre = centres.find(
                item => String(item.id) === selectedCentre
            );

            if (centre) {
                availableHalls = centre.halls;
            }

        }

        [...new Set(availableHalls)].sort().forEach(hall => {

            const option = document.createElement('option');
            option.value = hall;
            option.textContent = hall;

            hallFilter.appendChild(option);

        });

        hallFilter.value = 'all';
    }

    function updateStats(filteredEvents) {

        document.getElementById('totalEvents').textContent =
            filteredEvents.length;

        document.getElementById('bookedEvents').textContent =
            filteredEvents.filter(event => event.status === 'Booked').length;

        document.getElementById('pendingEvents').textContent =
            filteredEvents.filter(event => event.status === 'Pending').length;

        document.getElementById('blockedEvents').textContent =
            filteredEvents.filter(event => event.status === 'Blocked').length;
    }

    function renderCalendar() {

        document.getElementById('calendarMonthTitle').textContent =
            `${monthNames[currentMonth]} ${currentYear}`;

        monthSelect.value = currentMonth;
        yearSelect.value = currentYear;

        const firstWeekday = new Date(
            currentYear, currentMonth, 1
        ).getDay();

        const daysInMonth = new Date(
            currentYear, currentMonth + 1, 0
        ).getDate();

        const filteredEvents = getFilteredEvents();

        updateStats(filteredEvents);

        calendarGrid.innerHTML = '';

        // Leading empty cells
        for (let i = 0; i < firstWeekday; i++) {

            const empty = document.createElement('div');
            empty.className = 'calendar-day empty';

            calendarGrid.appendChild(empty);
        }

        for (let day = 1; day <= daysInMonth; day++) {

            const dateKey =
                `${currentYear}-${String(currentMonth + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;

            const dayEvents = filteredEvents.filter(
                event => event.date === dateKey
            );

            const cell = document.createElement('div');
            cell.className = 'calendar-day';

            if (
                today.getFullYear() === currentYear &&
                today.getMonth() === currentMonth &&
                today.getDate() === day
            ) {
                cell.classList.add('today');
            }

            if (selectedDate === dateKey) {
                cell.classList.add('selected');
            }

            let html = `<div class="calendar-day-number">${day}</div>`;

            if (dayEvents.length === 0) {

                html += `<span class="calendar-free">Available</span>`;

            } else {

                dayEvents.slice(0, 3).forEach(event => {

                    const statusClass =
                        event.status === 'Booked' ? 'event-booked' :
                        event.status === 'Pending' ? 'event-pending' :
                        'event-blocked';

                    const centre = centres.find(
                        item => item.id === event.centreId
                    );

                    html += `
                        <div class="calendar-event ${statusClass}"
                             title="${centre ? centre.name : ''} - ${event.hall} - ${event.status}">
                            ${event.hall}: ${event.status}
                        </div>
                    `;
                });

                if (dayEvents.length > 3) {
                    html += `
                        <span class="event-more">
                            +${dayEvents.length - 3} more
                        </span>
                    `;
                }

            }

            cell.innerHTML = html;

            cell.addEventListener('click', function () {
                selectedDate = dateKey;
                renderCalendar();
                openDateDetails(dateKey, dayEvents);
            });

            calendarGrid.appendChild(cell);
        }

    }

    function openDateDetails(dateKey, dayEvents) {

        const dateParts = dateKey.split('-');

        const date = new Date(
            Number(dateParts[0]),
            Number(dateParts[1]) - 1,
            Number(dateParts[2])
        );

        document.getElementById('modalDateHeading').textContent =
            date.toLocaleDateString('en-IN', {
                weekday: 'long',
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });

        document.getElementById('modalCentreHeading').textContent =
            centreFilter.value === 'all'
                ? 'All Convention Centres'
                : centres.find(item =>
                    String(item.id) === centreFilter.value
                )?.name || '';

        document.getElementById('modalBookedCount').textContent =
            dayEvents.filter(event => event.status === 'Booked').length;

        document.getElementById('modalPendingCount').textContent =
            dayEvents.filter(event => event.status === 'Pending').length;

        document.getElementById('modalBlockedCount').textContent =
            dayEvents.filter(event => event.status === 'Blocked').length;

        const list = document.getElementById('modalEventList');

        if (dayEvents.length === 0) {

            list.innerHTML = `
                <div class="text-center py-5">
                    <i class="bi bi-calendar-check text-success"
                       style="font-size:38px;"></i>
                    <h6 class="fw-bold mt-3">No Bookings or Blocked Slots</h6>
                    <p class="text-muted small mb-0">
                        No events found for the selected filters on this date.
                    </p>
                </div>
            `;

        } else {

            list.innerHTML = dayEvents.map(event => {

                const centre = centres.find(
                    item => item.id === event.centreId
                );

                const statusClass =
                    event.status === 'Booked' ? 'booked' :
                    event.status === 'Pending' ? 'pending' :
                    'blocked';

                return `
                    <div class="calendar-modal-event">

                        <div class="d-flex justify-content-between flex-wrap gap-2">
                            <div>
                                <h6 class="fw-bold mb-1">
                                    ${centre ? centre.name : 'Convention Centre'}
                                </h6>
                                <div class="text-muted small">
                                    <i class="bi bi-building me-1"></i>
                                    ${event.hall}
                                </div>
                            </div>

                            <span class="calendar-status ${statusClass}">
                                ${event.status}
                            </span>
                        </div>

                        <hr class="my-2">

                        <div class="row g-2">
                            <div class="col-sm-4">
                                <div class="small text-muted">Slot</div>
                                <div class="small fw-semibold">${event.slot}</div>
                            </div>

                            <div class="col-sm-4">
                                <div class="small text-muted">Time</div>
                                <div class="small fw-semibold">${event.time}</div>
                            </div>

                            <div class="col-sm-4">
                                <div class="small text-muted">
                                    ${event.status === 'Blocked' ? 'Reason' : 'Customer'}
                                </div>
                                <div class="small fw-semibold">${event.customer}</div>
                            </div>
                        </div>

                        ${event.bookingId ? `
                            <div class="mt-2 small text-muted">
                                Booking ID: <strong>${event.bookingId}</strong>
                            </div>
                        ` : ''}

                    </div>
                `;

            }).join('');

        }

        const modalElement =
            document.getElementById('calendarDateModal');

        bootstrap.Modal.getOrCreateInstance(modalElement).show();
    }

    // CENTRE FILTER
    centreFilter.addEventListener('change', function () {
        updateHallOptions();
        selectedDate = null;
        renderCalendar();
    });

    // HALL FILTER
    hallFilter.addEventListener('change', function () {
        selectedDate = null;
        renderCalendar();
    });

    // STATUS FILTER
    statusFilter.addEventListener('change', function () {
        selectedDate = null;
        renderCalendar();
    });

    // MONTH / YEAR
    monthSelect.addEventListener('change', function () {
        currentMonth = Number(this.value);
        selectedDate = null;
        renderCalendar();
    });

    yearSelect.addEventListener('change', function () {
        currentYear = Number(this.value);
        selectedDate = null;
        renderCalendar();
    });

    // PREVIOUS MONTH
    document.getElementById('previousMonth').addEventListener('click', function () {

        currentMonth--;

        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }

        if (currentYear < 2025 || currentYear > 2028) {
            currentYear = 2025;
            currentMonth = 0;
        }

        selectedDate = null;
        renderCalendar();
    });

    // NEXT MONTH
    document.getElementById('nextMonth').addEventListener('click', function () {

        currentMonth++;

        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }

        if (currentYear < 2025 || currentYear > 2028) {
            currentYear = 2028;
            currentMonth = 11;
        }

        selectedDate = null;
        renderCalendar();
    });

    // TODAY
    document.getElementById('todayButton').addEventListener('click', function () {

        currentYear = today.getFullYear();
        currentMonth = today.getMonth();
        selectedDate = null;

        renderCalendar();
    });

    // RESET FILTERS
    document.getElementById('resetFilters').addEventListener('click', function () {

        centreFilter.value = 'all';
        statusFilter.value = 'all';

        updateHallOptions();

        selectedDate = null;

        renderCalendar();
    });

    // INITIALIZE
    updateHallOptions();
    renderCalendar();

});
</script>
@endsection
