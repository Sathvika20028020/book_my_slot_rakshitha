@extends('admin.layout.centers.app')

@section('title') Convention Centre Slot Calendar @endsection

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    .cal-container {
        background: #ffffff;
        border-radius: 20px;
        padding: 24px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(0, 0, 0, 0.08);
    }
    .cal-header-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #0f172a;
    }
    .hall-pill {
        border-radius: 9999px;
        padding: 0.5rem 1.4rem;
        font-weight: 600;
        font-size: 0.88rem;
        border: none;
        transition: all 0.2s ease;
        background-color: #f1f5f9;
        color: #334155;
        cursor: pointer;
    }
    .hall-pill:hover {
        background-color: #e2e8f0;
        color: #0f172a;
    }
    .hall-pill.active {
        background-color: #2563eb;
        color: #ffffff;
        box-shadow: 0 4px 14px rgba(37, 99, 235, 0.35);
    }

    /* Weekday Headers */
    .cal-weekday-row {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 12px;
        margin-bottom: 12px;
        text-align: center;
    }
    .cal-weekday {
        font-weight: 700;
        font-size: 0.85rem;
        color: #64748b;
        padding: 4px 0;
    }

    /* Days Grid */
    .cal-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 12px;
    }
    .cal-day-cell {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 12px 14px;
        min-height: 105px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: all 0.2s ease;
        cursor: pointer;
        position: relative;
    }
    .cal-day-cell:hover {
        border-color: #94a3b8;
        transform: translateY(-2px);
        box-shadow: 0 6px 14px rgba(0, 0, 0, 0.05);
    }
    .cal-day-cell.selected {
        border: 2px solid #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
    }
    .cal-day-cell.empty-pad {
        background: #f8fafc;
        border: 1px dashed #e2e8f0;
        cursor: default;
        opacity: 0.5;
    }
    .cal-day-cell.empty-pad:hover {
        transform: none;
        box-shadow: none;
        border-color: #e2e8f0;
    }

    .cal-day-num {
        font-weight: 700;
        font-size: 1rem;
        color: #1e293b;
        margin-bottom: 8px;
    }
    .slot-tag-free {
        color: #16a34a;
        font-size: 0.82rem;
        font-weight: 600;
        letter-spacing: -0.2px;
    }
    .slot-tag-badge {
        display: inline-block;
        padding: 0.35rem 0.85rem;
        border-radius: 8px;
        font-size: 0.82rem;
        font-weight: 600;
        text-align: center;
        width: 100%;
    }
    .slot-tag-blue {
        background-color: #dbeafe;
        color: #1d4ed8;
    }
    .slot-tag-blocked {
        background-color: #fee2e2;
        color: #dc2626;
    }

    .cal-nav-btn {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background-color: #f1f5f9;
        border: 1px solid #e2e8f0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #334155;
        cursor: pointer;
        transition: all 0.15s ease;
        padding: 0;
    }
    .cal-nav-btn:hover {
        background-color: #e2e8f0;
        color: #0f172a;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Top Breadcrumb -->
   <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 style="color: #1e2f65;font-family: sans-serif;">Calendar</h3>
            </div>
            <div
                class="col-12 col-md-6 text-md-end mt-2 mt-md-0 d-flex align-items-center justify-content-md-end gap-2">
                <ol class="breadcrumb justify-content-md-end mb-0 bg-transparent p-0 me-3 d-none d-lg-flex">
                    <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Calendar</li>
                </ol>

            </div>
        </div>
    </div>

    <!-- Main Calendar Container -->
    <div class="cal-container mb-4">
        <!-- Top Bar: Month Title, Navigation Arrows, Select Dropdowns & Hall Switchers -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
            <!-- Left Side: Month Title + Arrows + Select Dropdown Options -->
            <div class="d-flex align-items-center gap-3 flex-wrap">
                <h2 class="cal-header-title mb-0" id="currentMonthYear">November 2026</h2>
                
                <!-- Chevron Arrows -->
                <div class="d-flex align-items-center gap-1">
                    <button type="button" class="cal-nav-btn" onclick="navigateMonth(-1)" title="Previous Month">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button type="button" class="cal-nav-btn" onclick="navigateMonth(1)" title="Next Month">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>

                <!-- Month & Year Select Dropdowns (Right here beside title & arrows) -->
                <div class="d-flex align-items-center gap-2 ms-2">
                    <select id="monthSelectDropdown" class="form-select form-select-sm fw-semibold rounded-pill  border" style="width: 140px; cursor: pointer;" onchange="onDropdownChange()">
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
                        <option value="10" selected>November</option>
                        <option value="11">December</option>
                    </select>

                    <select id="yearSelectDropdown" class="form-select form-select-sm fw-semibold rounded-pill  border" style="width: 95px; cursor: pointer;" onchange="onDropdownChange()">
                        <option value="2025">2025</option>
                        <option value="2026" selected>2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                    </select>
                </div>
            </div>

            <!-- Right Side: Hall Selector Pills (Grand Ballroom, Garden Lawn, Mini Hall) -->
            <div class="d-flex flex-wrap gap-2" id="hallSelector">
                <button class="hall-pill active" data-hall="Grand Ballroom">Grand Ballroom</button>
                <button class="hall-pill" data-hall="Garden Lawn">Garden Lawn</button>
                <button class="hall-pill" data-hall="Mini Hall">Mini Hall</button>
            </div>
        </div>

        <!-- Weekday Headers -->
        <div class="cal-weekday-row">
            <div class="cal-weekday">Sun</div>
            <div class="cal-weekday">Mon</div>
            <div class="cal-weekday">Tue</div>
            <div class="cal-weekday">Wed</div>
            <div class="cal-weekday">Thu</div>
            <div class="cal-weekday">Fri</div>
            <div class="cal-weekday">Sat</div>
        </div>

        <!-- Dynamic Days Grid Container -->
        <div class="cal-grid" id="calendarDaysGrid">
            <!-- Populated dynamically by JavaScript -->
        </div>
    </div>

    <!-- Calendar Legend & Summary -->
    <div class="row g-3">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-3">
                <h6 class="fw-bold text-dark mb-2">Slot Color Legend</h6>
                <div class="d-flex flex-wrap align-items-center gap-3">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-light text-success border fw-bold">3 slots free</span>
                        <span class="small text-muted">All slots open for booking</span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="slot-tag-badge slot-tag-blue" style="width: auto; padding: 2px 10px;">Booked</span>
                        <span class="small text-muted">Slot confirmed by CC</span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="slot-tag-badge slot-tag-blocked" style="width: auto; padding: 2px 10px;">Blocked</span>
                        <span class="small text-muted">Reserved / Maintenance</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-3">
                <h6 class="fw-bold text-dark mb-2">Quick Slot Rules</h6>
                <p class="small text-muted mb-0">
                    Each hall operates 3 standard slots daily: Morning (8:00 AM - 2:00 PM), Evening (5:00 PM - 11:30 PM), or Full Day (8:00 AM - 11:30 PM). Clicking a date allows you to view bookings or block dates.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Date Details / Slot Management -->
<div class="modal fade" id="dateSlotModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-0 pb-0">
                <div>
                    <h5 class="modal-title fw-bold text-dark" id="modalDateTitle">12 November 2026</h5>
                    <span class="badge" style="background-color: #e0e7ff; color: #3730a3; border: 1px solid #c7d2fe; font-weight: 700;" id="modalActiveHall">Grand Ballroom</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body py-4">
                <div class="d-flex flex-column gap-3" id="slotDetailList">
                    <!-- Morning Slot -->
                    <div class="p-3 bg-light rounded-3 d-flex align-items-center justify-content-between">
                        <div>
                            <strong class="text-dark small d-block">Morning Slot (08:00 AM - 02:00 PM)</strong>
                            <span class="text-muted small" id="morningSlotStatus">Slot Status</span>
                        </div>
                        <button class="btn btn-sm btn-outline-secondary rounded-pill" onclick="toggleSlot('morning')">Toggle</button>
                    </div>

                    <!-- Evening Slot -->
                    <div class="p-3 bg-light rounded-3 d-flex align-items-center justify-content-between">
                        <div>
                            <strong class="text-dark small d-block">Evening Slot (05:00 PM - 11:30 PM)</strong>
                            <span class="text-muted small" id="eveningSlotStatus">Slot Status</span>
                        </div>
                        <button class="btn btn-sm btn-outline-secondary rounded-pill" onclick="toggleSlot('evening')">Toggle</button>
                    </div>

                    <!-- Full Day -->
                    <div class="p-3 bg-light rounded-3 d-flex align-items-center justify-content-between">
                        <div>
                            <strong class="text-dark small d-block">Full Day Booking</strong>
                            <span class="text-muted small" id="fullDaySlotStatus">Combined Slot</span>
                        </div>
                        <a href="{{ route('center_admin.booking.show') }}" class="btn btn-sm btn-primary rounded-pill">View Booking</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Block Date -->
<div class="modal fade" id="blockDateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-0 pb-0">
                <div class="d-flex align-items-center gap-2">
                    <div style="width: 40px; height: 40px; border-radius: 12px; background: #fee2e2; color: #dc2626; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-slash-circle fs-5"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold text-dark">Block Hall Date</h5>
                        <p class="text-muted small mb-0">Prevent users from booking this slot</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body py-4">
                <div class="mb-3">
                    <label class="form-label small fw-semibold text-dark">Select Hall:</label>
                    <select class="form-select rounded-3">
                        <option>Grand Ballroom</option>
                        <option>Garden Lawn</option>
                        <option>Mini Hall</option>
                        <option>All Halls (Entire Convention Centre)</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-semibold text-dark">Date to Block:</label>
                    <input type="date" class="form-control rounded-3" value="2026-11-12">
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-semibold text-dark">Reason for Blocking:</label>
                    <select class="form-select rounded-3 mb-2">
                        <option>Hall Maintenance & Electrical Works</option>
                        <option>VIP Protocol / Offline Govt Event</option>
                        <option>Annual Renovation / Deep Cleaning</option>
                        <option>Centre Holiday / Festival Closure</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger rounded-pill px-4" data-bs-dismiss="modal" onclick="alert('Date blocked on calendar!')">
                    Block Date
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    const monthNames = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    let currentYear = 2026;
    let currentMonth = 10; // 0-indexed: 10 = November
    let currentHall = 'Grand Ballroom';

    // Mock schedules for November 2026 matching exact reference image
    const november2026Schedule = {
        4: { type: 'blue', text: 'Morning' },
        7: { type: 'blue', text: 'Evening' },
        9: { type: 'blue', text: 'Full day' },
        12: { type: 'blocked', text: 'Blocked', selected: true },
        14: { type: 'blue', text: 'Evening' },
        15: { type: 'blue', text: 'Full day' },
        17: { type: 'blue', text: 'Evening' },
        19: { type: 'blue', text: 'Morning' },
        21: { type: 'blue', text: 'Evening' },
        22: { type: 'blue', text: 'Evening' },
        26: { type: 'blocked', text: 'Blocked' },
        28: { type: 'blue', text: 'Full day' }
    };

    function renderCalendar(year, month) {
        currentYear = year;
        currentMonth = month;

        // Update Header Title
        document.getElementById('currentMonthYear').innerText = `${monthNames[month]} ${year}`;

        // Update Dropdown selects
        const monthDropdown = document.getElementById('monthSelectDropdown');
        const yearDropdown = document.getElementById('yearSelectDropdown');
        if (monthDropdown) monthDropdown.value = month;
        if (yearDropdown) yearDropdown.value = year;

        // Calculate days in month & starting weekday
        const firstDayWeekday = new Date(year, month, 1).getDay(); // 0 = Sun
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        const grid = document.getElementById('calendarDaysGrid');
        grid.innerHTML = '';

        // Add leading padding empty cells
        for (let i = 0; i < firstDayWeekday; i++) {
            const padCell = document.createElement('div');
            padCell.className = 'cal-day-cell empty-pad';
            grid.appendChild(padCell);
        }

        // Render each day of the month
        for (let day = 1; day <= daysInMonth; day++) {
            const cell = document.createElement('div');
            cell.className = 'cal-day-cell';

            let slotHtml = '';
            let slotType = 'free';
            let slotText = '3 slots free';

            if (year === 2026 && month === 10) {
                // Exact November 2026 data matching reference image
                const dayData = november2026Schedule[day];
                if (dayData) {
                    slotType = dayData.type;
                    slotText = dayData.text;
                    if (dayData.selected) {
                        cell.classList.add('selected');
                    }
                    if (slotType === 'blue') {
                        slotHtml = `<span class="slot-tag-badge slot-tag-blue">${slotText}</span>`;
                    } else if (slotType === 'blocked') {
                        slotHtml = `<span class="slot-tag-badge slot-tag-blocked">${slotText}</span>`;
                    }
                } else {
                    slotHtml = `<span class="slot-tag-free">3 slots free</span>`;
                }
            } else {
                // Procedural slots for other months
                if (day % 7 === 0) {
                    slotType = 'blue';
                    slotText = 'Full day';
                    slotHtml = `<span class="slot-tag-badge slot-tag-blue">Full day</span>`;
                } else if (day % 5 === 0) {
                    slotType = 'blue';
                    slotText = 'Evening';
                    slotHtml = `<span class="slot-tag-badge slot-tag-blue">Evening</span>`;
                } else if (day === 15) {
                    slotType = 'blocked';
                    slotText = 'Blocked';
                    slotHtml = `<span class="slot-tag-badge slot-tag-blocked">Blocked</span>`;
                } else {
                    slotHtml = `<span class="slot-tag-free">3 slots free</span>`;
                }
            }

            cell.innerHTML = `
                <span class="cal-day-num">${day}</span>
                ${slotHtml}
            `;

            cell.onclick = function() {
                selectDate(day, slotText, slotType);
            };

            grid.appendChild(cell);
        }
    }

    // Dropdown change handler
    function onDropdownChange() {
        const m = parseInt(document.getElementById('monthSelectDropdown').value);
        const y = parseInt(document.getElementById('yearSelectDropdown').value);
        renderCalendar(y, m);
    }

    // Arrow navigation
    function navigateMonth(delta) {
        let newMonth = currentMonth + delta;
        let newYear = currentYear;

        if (newMonth < 0) {
            newMonth = 11;
            newYear--;
        } else if (newMonth > 11) {
            newMonth = 0;
            newYear++;
        }

        renderCalendar(newYear, newMonth);
    }

    // Hall switcher
    const hallPills = document.querySelectorAll('#hallSelector .hall-pill');
    hallPills.forEach(pill => {
        pill.addEventListener('click', function() {
            hallPills.forEach(p => p.classList.remove('active'));
            this.classList.add('active');
            currentHall = this.getAttribute('data-hall');
            renderCalendar(currentYear, currentMonth);
        });
    });

    // Date detail modal
    function selectDate(day, statusText, type) {
        document.querySelectorAll('.cal-day-cell').forEach(c => c.classList.remove('selected'));
        if (event && event.currentTarget) {
            event.currentTarget.classList.add('selected');
        }

        document.getElementById('modalDateTitle').innerText = `${day} ${monthNames[currentMonth]} ${currentYear}`;
        document.getElementById('modalActiveHall').innerText = currentHall;

        document.getElementById('morningSlotStatus').innerText = (type === 'blue' || type === 'blocked') ? 'Booked / Reserved' : 'Free (Rs. 1,80,000)';
        document.getElementById('eveningSlotStatus').innerText = (type === 'blue' || type === 'blocked') ? 'Booked / Reserved' : 'Free (Rs. 2,50,000)';
        document.getElementById('fullDaySlotStatus').innerText = statusText;

        const modal = new bootstrap.Modal(document.getElementById('dateSlotModal'));
        modal.show();
    }

    function openBlockModal() {
        const modal = new bootstrap.Modal(document.getElementById('blockDateModal'));
        modal.show();
    }

    function toggleSlot(slot) {
        alert(slot.toUpperCase() + ' slot status updated for this date.');
    }

    // Initial render on page load
    document.addEventListener('DOMContentLoaded', function() {
        renderCalendar(2026, 10); // November 2026
    });
</script>
@endsection
