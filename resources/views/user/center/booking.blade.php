
@extends('user.layouts.app')

@section('title', 'Book Convention Centre | Book My Slot')

@section('content')

<div class="container-fluid px-3 px-md-4 py-4">

    <a href="{{ route('user.center.details') }}" class="booking-back">
        <i class="fas fa-arrow-left me-2"></i> Back to Centre Details
    </a>

    <div class="mb-4">
        <h3 class="fw-bold mb-1 page-heading">Book Your Venue</h3>
        <p class="text-muted mb-0 page-subtitle">
            Select your hall, event dates and timings to submit your booking request.
        </p>
    </div>

    <div class="row g-4">

        <!-- BOOKING FORM -->
        <div class="col-lg-8">
            <div class="booking-section">

                <h5 class="section-title">
                    <i class="fas fa-calendar-check me-2"></i>
                    Booking Details
                </h5>

                <div class="selected-hall mb-4">
                    <div class="hall-icon">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Grand Palace Convention Hall</h6>
                        <p class="mb-0 text-muted">
                            <i class="fas fa-map-marker-alt me-1"></i>
                            Bengaluru, Karnataka
                        </p>
                    </div>
                </div>

                <form id="bookingForm">

                    <!-- HALL SELECTION -->
                    <h6 class="form-section-title">Select Hall</h6>

                    <div class="row g-3 mb-4">

                        <div class="col-md-6">
                            <label class="form-label">Hall Name <span>*</span></label>
                            <select id="hallName" class="form-select" required>
                                <option value="Grand Palace Convention Hall">
                                    Grand Palace Convention Hall
                                </option>
                                <option value="Banquet Hall">Banquet Hall</option>
                                <option value="Mini Hall">Mini Hall</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Hall Type <span>*</span></label>
                            <select id="hallType" class="form-select" required>
                                <option value="AC" data-price="25000">AC Hall</option>
                                <option value="Non-AC" data-price="20000">Non-AC Hall</option>
                            </select>
                        </div>

                    </div>

                    <hr class="my-4">

                    <!-- APPLICANT DETAILS -->
                    <h6 class="form-section-title">Applicant & Event Information</h6>

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Applicant Name <span>*</span></label>
                            <input type="text" id="applicantName"
                                   class="form-control"
                                   placeholder="Enter your full name" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Mobile Number <span>*</span></label>
                            <input type="tel" id="mobile"
                                   class="form-control"
                                   placeholder="10-digit mobile number"
                                   maxlength="10"
                                   inputmode="numeric" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Event Type <span>*</span></label>
                            <select id="eventType" class="form-select" required>
                                <option value="">Select event type</option>
                                <option>Wedding</option>
                                <option>Reception</option>
                                <option>Engagement</option>
                                <option>Birthday Celebration</option>
                                <option>Conference</option>
                                <option>Cultural Programme</option>
                                <option>Other</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Expected Guests <span>*</span></label>
                            <input type="number" id="guestCount"
                                   class="form-control"
                                   min="1"
                                   placeholder="Number of guests" required>
                        </div>

                    </div>

                    <hr class="my-4">

                    <!-- DATE SELECTION -->
                    <h6 class="form-section-title">Select Event Dates</h6>

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">From Date <span>*</span></label>
                            <input type="date" id="fromDate"
                                   class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">To Date <span>*</span></label>
                            <input type="date" id="toDate"
                                   class="form-control" required>
                        </div>

                    </div>

                    <div id="dateMessage" class="date-message"></div>

                    <div class="date-range-summary mt-3">
                        <div class="d-flex justify-content-between flex-wrap gap-2">
                            <strong>Selected Event Dates</strong>
                            <span id="numberOfDays">0 Days</span>
                        </div>
                        <div id="selectedDatesList" class="selected-dates-list">
                            Select your event dates to view them here.
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- CHECK-IN AND CHECK-OUT TIME -->
                    <h6 class="form-section-title">Check-in & Check-out Time</h6>

                    <div class="timing-box mb-3">

                        <p class="timing-info mb-3">
                            <i class="fas fa-info-circle me-1"></i>
                            Select one check-in and check-out time for your entire booking period.
                            These timings will apply to all selected event dates.
                        </p>

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label">
                                    Check-in Time <span>*</span>
                                </label>
                                <input type="time"
                                       id="checkInTime"
                                       class="form-control"
                                       required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">
                                    Check-out Time <span>*</span>
                                </label>
                                <input type="time"
                                       id="checkOutTime"
                                       class="form-control"
                                       required>
                            </div>

                        </div>

                        <div id="timingMessage" class="date-message"></div>

                    </div>

                    <hr class="my-4">

                    <!-- ADDITIONAL INFORMATION -->
                    <h6 class="form-section-title">Additional Information</h6>

                    <div class="mb-3">
                        <label class="form-label">Special Requirements (Optional)</label>
                        <textarea id="requirements"
                                  class="form-control"
                                  rows="3"
                                  placeholder="Mention any additional requirements..."></textarea>
                    </div>

                    <!-- PRICE -->
                    <div class="price-summary mt-4">

                        <div class="summary-row">
                            <span>Selected Hall</span>
                            <strong id="priceHallName">Grand Palace Convention Hall</strong>
                        </div>

                        <div class="summary-row">
                            <span>Hall Type</span>
                            <strong id="priceHallType">AC</strong>
                        </div>

                        <div class="summary-row">
                            <span>Price per day</span>
                            <strong id="dailyPrice">₹25,000</strong>
                        </div>

                        <div class="summary-row">
                            <span>Number of days</span>
                            <strong id="durationText">0 Days</strong>
                        </div>

                        <div class="price-total">
                            <strong>Estimated Total</strong>
                            <strong id="totalPrice">₹0</strong>
                        </div>

                        <small class="text-muted d-block mt-2">
                            Sample price for demonstration. Final amount is subject to centre confirmation.
                        </small>

                    </div>

                    <div class="form-check mt-4">
                        <input class="form-check-input"
                               type="checkbox" id="agree" required>
                        <label class="form-check-label" for="agree">
                            I confirm that the booking details provided above are correct.
                        </label>
                    </div>

                    <button type="submit" class="btn submit-booking-btn w-100 mt-4">
                        Submit Booking Request
                        <i class="fas fa-arrow-right ms-2"></i>
                    </button>

                    <p class="text-muted text-center mt-3 mb-0 payment-note">
                        No payment is required now. Payment will be available only after approval.
                    </p>

                </form>
            </div>
        </div>

        <!-- BOOKING SUMMARY -->
        <div class="col-lg-4">
            <div class="booking-sidebar">

                <h5 class="fw-bold mb-3">Booking Summary</h5>

                <div class="summary-hall">
                    <i class="fas fa-landmark"></i>
                    <div>
                        <strong id="summaryHallName">Grand Palace Convention Hall</strong>
                        <small>Bengaluru, Karnataka</small>
                    </div>
                </div>

                <hr>

                <div class="summary-row">
                    <span>Hall Type</span>
                    <strong id="summaryHallType">AC</strong>
                </div>

                <div class="summary-row">
                    <span>Price per day</span>
                    <strong id="summaryDailyPrice">₹25,000</strong>
                </div>

                <div class="summary-row">
                    <span>From Date</span>
                    <strong id="summaryFromDate">Not selected</strong>
                </div>

                <div class="summary-row">
                    <span>To Date</span>
                    <strong id="summaryToDate">Not selected</strong>
                </div>

                <div class="summary-row">
                    <span>Duration</span>
                    <strong id="summaryDuration">0 Days</strong>
                </div>

                <hr>

                <div class="summary-row total-row">
                    <span>Estimated Total</span>
                    <strong id="summaryTotal">₹0</strong>
                </div>

                <div class="approval-note mt-4">
                    <i class="fas fa-info-circle me-2"></i>
                    Your booking request will be reviewed by the centre. It is not confirmed until approval and payment are completed.
                </div>

            </div>
        </div>

    </div>
</div>

<style>
    .booking-back {
        display: inline-flex;
        align-items: center;
        margin-bottom: 18px;
        color: #64748B;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
    }

    .booking-back:hover {
        color: #D97706;
    }

    .page-heading {
        color: #0A0F1D;
        font-size: 24px;
    }

    .page-subtitle {
        font-size: 14px;
    }

    .booking-section,
    .booking-sidebar {
        background: #fff;
        border: 1px solid #E2E8F0;
        border-radius: 14px;
        padding: 24px;
        box-shadow: 0 4px 15px rgba(10,15,29,.035);
    }

    .section-title {
        color: #0A0F1D;
        font-size: 18px;
        font-weight: 800;
        margin-bottom: 22px;
    }

    .section-title i {
        color: #D97706;
    }

    .selected-hall {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 15px;
        background: #F8FAFC;
        border: 1px solid #E2E8F0;
        border-radius: 10px;
    }

    .hall-icon {
        width: 48px;
        height: 48px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #0A0F1D;
        color: #F59E0B;
        border-radius: 10px;
        font-size: 20px;
    }

    .selected-hall h6 {
        color: #0A0F1D;
        font-size: 15px;
    }

    .selected-hall p {
        font-size: 13px;
    }

    .form-section-title {
        color: #0A0F1D;
        font-size: 16px;
        font-weight: 800;
        margin-bottom: 17px;
    }

    .form-label {
        color: #334155;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .form-label span {
        color: #DC2626;
    }

    .booking-section .form-control,
    .booking-section .form-select {
        min-height: 47px;
        border: 1px solid #CBD5E1;
        border-radius: 8px;
        font-family: inherit;
        font-size: 14px;
        color: #0A0F1D;
    }

    .booking-section textarea.form-control {
        min-height: 95px;
    }

    .booking-section .form-control:focus,
    .booking-section .form-select:focus {
        border-color: #F59E0B;
        box-shadow: 0 0 0 3px rgba(245,158,11,.12);
    }

    .date-message {
        margin-top: 10px;
        font-size: 13px;
        font-weight: 700;
    }

    .date-range-summary,
    .timing-box {
        padding: 16px;
        background: #F8FAFC;
        border: 1px solid #E2E8F0;
        border-radius: 10px;
    }

    .date-range-summary {
        color: #334155;
        font-size: 14px;
    }

    .date-range-summary > div:first-child span {
        color: #B45309;
        font-weight: 800;
    }

    .selected-dates-list {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 12px;
        color: #64748B;
        font-size: 13px;
    }

    .selected-date-chip {
        padding: 7px 10px;
        background: #fff;
        border: 1px solid #DCE3EC;
        border-radius: 7px;
        color: #334155;
        font-weight: 600;
    }

    .timing-info {
        color: #64748B;
        font-size: 13px;
        line-height: 1.6;
    }

    .timing-info i {
        color: #D97706;
    }

    .price-summary {
        padding: 18px;
        background: #F8FAFC;
        border: 1px solid #E2E8F0;
        border-radius: 10px;
        color: #64748B;
        font-size: 14px;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 12px;
        margin: 14px 0;
        color: #64748B;
        font-size: 14px;
    }

    .summary-row strong {
        color: #0A0F1D;
        text-align: right;
        overflow-wrap: anywhere;
    }

    .price-total {
        display: flex;
        justify-content: space-between;
        gap: 10px;
        border-top: 1px solid #E2E8F0;
        padding-top: 15px;
        margin-top: 15px;
        color: #0A0F1D;
        font-size: 16px;
        font-weight: 800;
    }

    .submit-booking-btn {
        min-height: 52px;
        background: #0A0F1D;
        color: #F59E0B;
        border: 0;
        border-radius: 9px;
        font-family: inherit;
        font-size: 15px;
        font-weight: 800;
    }

    .submit-booking-btn:hover {
        background: #1E293B;
        color: #F59E0B;
    }

    .booking-sidebar {
        position: sticky;
        top: 90px;
    }

    .summary-hall {
        display: flex;
        align-items: center;
        gap: 12px;
        color: #0A0F1D;
    }

    .summary-hall > i {
        width: 44px;
        height: 44px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 9px;
        background: #FEF3C7;
        color: #B45309;
        font-size: 19px;
    }

    .summary-hall strong {
        display: block;
        font-size: 13px;
    }

    .summary-hall small {
        display: block;
        margin-top: 4px;
        color: #64748B;
        font-size: 12px;
    }

    .total-row {
        font-size: 16px;
        font-weight: 800;
    }

    .approval-note {
        padding: 14px;
        background: #FFFBEB;
        border: 1px solid #FDE68A;
        border-radius: 8px;
        color: #92400E;
        font-size: 13px;
        line-height: 1.6;
    }

    .form-check-label {
        color: #64748B;
        font-size: 13px;
        line-height: 1.6;
    }

    .payment-note {
        font-size: 13px;
    }

    @media (max-width: 575px) {
        .booking-section,
        .booking-sidebar {
            padding: 17px;
        }

        .booking-sidebar {
            position: static;
        }

        .page-heading {
            font-size: 22px;
        }
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // DEMO BOOKED DATES
    const bookedDates = [
        '2026-11-15',
        '2026-11-20',
        '2026-11-25',
        '2026-12-05',
        '2026-12-10'
    ];

    const fromDate = document.getElementById('fromDate');
    const toDate = document.getElementById('toDate');
    const hallName = document.getElementById('hallName');
    const hallType = document.getElementById('hallType');

    const checkInTime = document.getElementById('checkInTime');
    const checkOutTime = document.getElementById('checkOutTime');

    const dateMessage = document.getElementById('dateMessage');
    const timingMessage = document.getElementById('timingMessage');
    const form = document.getElementById('bookingForm');

    let selectedDays = 0;
    let currentPrice = 25000;

    function formatCurrency(amount) {
        return '₹' + amount.toLocaleString('en-IN');
    }

    function formatDate(dateString) {
        if (!dateString) return 'Not selected';

        return new Date(dateString + 'T00:00:00').toLocaleDateString('en-IN', {
            day: '2-digit',
            month: 'short',
            year: 'numeric'
        });
    }

    function getLocalDate() {
        const today = new Date();

        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');

        return `${year}-${month}-${day}`;
    }

    // PRICE CALCULATION
    function updatePrice() {

        const selectedOption = hallType.options[hallType.selectedIndex];

        currentPrice = Number(selectedOption?.dataset.price || 0);

        const total = currentPrice * selectedDays;
        const daysText = selectedDays + (selectedDays === 1 ? ' Day' : ' Days');

        document.getElementById('priceHallName').textContent = hallName.value;
        document.getElementById('priceHallType').textContent = hallType.value;
        document.getElementById('dailyPrice').textContent = formatCurrency(currentPrice);
        document.getElementById('durationText').textContent = daysText;
        document.getElementById('totalPrice').textContent = formatCurrency(total);

        document.getElementById('summaryHallName').textContent = hallName.value;
        document.getElementById('summaryHallType').textContent = hallType.value;
        document.getElementById('summaryDailyPrice').textContent = formatCurrency(currentPrice);
        document.getElementById('summaryDuration').textContent = daysText;
        document.getElementById('summaryTotal').textContent = formatCurrency(total);
    }

    // VALIDATE CHECK-IN AND CHECK-OUT TIME
   
// VALIDATE CHECK-IN AND CHECK-OUT TIME
function validateBookingTimes() {

    const startTime = checkInTime.value;
    const endTime = checkOutTime.value;

    timingMessage.textContent = '';
    timingMessage.style.color = '#64748B';

    if (!startTime || !endTime) {

        timingMessage.textContent =
            'Please select both check-in and check-out times.';

        timingMessage.style.color = '#DC2626';

        return {
            valid: false,
            firstInvalid: !startTime ? checkInTime : checkOutTime
        };
    }

    const startDateValue = fromDate.value;
    const endDateValue = toDate.value;

    if (!startDateValue || !endDateValue) {

        timingMessage.textContent =
            'Please select your event dates first.';

        timingMessage.style.color = '#DC2626';

        return {
            valid: false,
            firstInvalid: fromDate
        };
    }

    // Build complete date-time values.
    // Check-in uses the From Date.
    // Check-out uses the To Date.
    const checkInDateTime = new Date(
        startDateValue + 'T' + startTime
    );

    const checkOutDateTime = new Date(
        endDateValue + 'T' + endTime
    );

    // Compare complete date and time, not just the time.
    if (checkOutDateTime <= checkInDateTime) {

        timingMessage.textContent =
            'Check-out must be after check-in. Please check your selected dates and times.';

        timingMessage.style.color = '#DC2626';

        return {
            valid: false,
            firstInvalid: checkOutTime
        };
    }

    timingMessage.textContent =
        'Your check-in and check-out timings are valid.';

    timingMessage.style.color = '#16A34A';

    return {
        valid: true,
        firstInvalid: null
    };
}

checkInTime.addEventListener('change', validateBookingTimes);
checkOutTime.addEventListener('change', validateBookingTimes);
fromDate.addEventListener('change', validateBookingTimes);
toDate.addEventListener('change', validateBookingTimes);


    // UPDATE DATE RANGE
    function updateDates() {

        const start = fromDate.value;
        const end = toDate.value;

        dateMessage.textContent = '';
        dateMessage.style.color = '#64748B';

        document.getElementById('summaryFromDate').textContent = formatDate(start);
        document.getElementById('summaryToDate').textContent = formatDate(end);

        selectedDays = 0;

        if (!start || !end) {

            document.getElementById('numberOfDays').textContent = '0 Days';

            document.getElementById('selectedDatesList').textContent =
                'Select your event dates to view them here.';

            updatePrice();

            return false;
        }

        if (end < start) {

            dateMessage.textContent = 'To Date cannot be earlier than From Date.';
            dateMessage.style.color = '#DC2626';

            document.getElementById('selectedDatesList').textContent =
                'Please select a valid date range.';

            updatePrice();

            return false;
        }

        const startDate = new Date(start + 'T00:00:00');
        const endDate = new Date(end + 'T00:00:00');

        const dates = [];
        const unavailableDates = [];

        for (
            let current = new Date(startDate);
            current <= endDate;
            current.setDate(current.getDate() + 1)
        ) {

            const year = current.getFullYear();
            const month = String(current.getMonth() + 1).padStart(2, '0');
            const day = String(current.getDate()).padStart(2, '0');

            const dateString = `${year}-${month}-${day}`;

            dates.push(dateString);

            if (bookedDates.includes(dateString)) {
                unavailableDates.push(dateString);
            }
        }

        selectedDays = dates.length;

        document.getElementById('numberOfDays').textContent =
            selectedDays + (selectedDays === 1 ? ' Day' : ' Days');

        document.getElementById('selectedDatesList').innerHTML =
            dates.map(date =>
                `<span class="selected-date-chip">${formatDate(date)}</span>`
            ).join('');

        updatePrice();

        if (unavailableDates.length) {

            dateMessage.textContent =
                'The following date(s) are already booked: ' +
                unavailableDates.map(formatDate).join(', ') +
                '. Please select another date range.';

            dateMessage.style.color = '#DC2626';

            return false;
        }

        dateMessage.textContent =
            'Your selected date range is available in the schedule.';

        dateMessage.style.color = '#16A34A';

        return true;
    }

    // MINIMUM DATE
    fromDate.min = getLocalDate();
    toDate.min = getLocalDate();

    // DATE EVENTS
    fromDate.addEventListener('change', function () {

        toDate.min = this.value || getLocalDate();

        if (toDate.value && toDate.value < this.value) {
            toDate.value = this.value;
        }

        updateDates();
    });

    toDate.addEventListener('change', updateDates);

    // HALL AND TYPE EVENTS
    hallName.addEventListener('change', updatePrice);
    hallType.addEventListener('change', updatePrice);

    // MOBILE NUMBER VALIDATION
    document.getElementById('mobile').addEventListener('input', function () {
        this.value = this.value.replace(/\D/g, '').slice(0, 10);
    });

    // FORM SUBMISSION
    form.addEventListener('submit', function (e) {

        e.preventDefault();

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        if (!updateDates()) {
            fromDate.focus();
            return;
        }

        const timeValidation = validateBookingTimes();

        if (!timeValidation.valid) {
            timeValidation.firstInvalid.focus();
            return;
        }

        const mobile = document.getElementById('mobile').value;

        if (!/^[6-9]\d{9}$/.test(mobile)) {

            Swal.fire({
                icon: 'error',
                title: 'Invalid Mobile Number',
                text: 'Please enter a valid 10-digit mobile number.',
                confirmButtonColor: '#0A0F1D'
            });

            return;
        }

        const applicantName = document.getElementById('applicantName').value;
        const eventType = document.getElementById('eventType').value;
        const guestCount = document.getElementById('guestCount').value;

        const bookingDetails = `
            <div style="text-align:left;font-size:14px;line-height:1.9;">

                <div style="padding:12px;background:#F8FAFC;border-radius:8px;margin-bottom:12px;">
                    <strong>Applicant:</strong> ${applicantName}<br>
                    <strong>Mobile:</strong> ${mobile}<br>
                    <strong>Event:</strong> ${eventType}<br>
                    <strong>Expected Guests:</strong> ${guestCount}
                </div>

                <strong>Hall:</strong> ${hallName.value}<br>
                <strong>Hall Type:</strong> ${hallType.value}<br>

                <strong>Event Dates:</strong>
                ${formatDate(fromDate.value)} to ${formatDate(toDate.value)}<br>

                <strong>Duration:</strong> ${selectedDays} day(s)<br>

                <strong>Check-in Time:</strong> ${checkInTime.value}<br>
                <strong>Check-out Time:</strong> ${checkOutTime.value}<br>

                <strong>Estimated Total:</strong>
                ${formatCurrency(currentPrice * selectedDays)}

                <hr style="border-color:#E2E8F0;">

                <div style="padding:12px;background:#FFFBEB;border:1px solid #FDE68A;border-radius:8px;color:#92400E;">
                    <strong>Important:</strong><br>
                    This is a booking request only. Your venue is not confirmed yet.
                    The centre will review your request and notify you about approval
                    and the next payment steps.
                </div>

            </div>
        `;

        Swal.fire({
            icon: 'success',
            title: 'Booking Request Submitted!',
            html: `
                <p style="font-size:14px;line-height:1.7;">
                    Thank you! Your booking request details have been submitted
                    for review.
                </p>

                ${bookingDetails}

                <p style="font-size:13px;color:#64748B;margin-top:14px;">
                    <i class="fas fa-info-circle me-1"></i>
                    No payment has been made at this stage. Please wait for
                    the centre's approval before proceeding with payment.
                </p>
            `,
            confirmButtonText: 'Got It',
            confirmButtonColor: '#0A0F1D',
            allowOutsideClick: false
        });

    });

    // INITIAL DISPLAY
    updateDates();
    updatePrice();

});
</script>

@endsection
