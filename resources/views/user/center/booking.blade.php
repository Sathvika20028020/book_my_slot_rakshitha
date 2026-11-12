
@extends('layouts.user')

@section('title', 'Book Convention Centre | Book My Slot')

@section('content')

<div class="container-fluid px-3 px-md-4 py-4">

    <!-- BACK LINK -->
    <a href="{{ route('user.center.details') }}"
       class="text-decoration-none d-inline-flex align-items-center mb-3"
       style="color:#64748B;font-size:14px;font-weight:700;">
        <i class="fas fa-arrow-left me-2"></i> Back to Centre Details
    </a>

    <div class="mb-4">
        <h3 class="fw-bold mb-1" style="color:#0A0F1D;">
            Book Your Venue
        </h3>
        <p class="text-muted mb-0" style="font-size:14px;">
            Select an available date and submit your booking request.
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
                        <p class="mb-0 text-muted" style="font-size:13px;">
                            <i class="fas fa-map-marker-alt me-1"></i>
                            Bengaluru, Karnataka
                        </p>
                    </div>
                </div>

                <form id="bookingForm">

                    <!-- EVENT DETAILS -->
                    <h6 class="form-section-title">Event Information</h6>

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Applicant Name <span>*</span></label>
                            <input type="text"
                                   id="applicantName"
                                   class="form-control"
                                   placeholder="Enter your full name"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Mobile Number <span>*</span></label>
                            <input type="tel"
                                   id="mobile"
                                   class="form-control"
                                   placeholder="10-digit mobile number"
                                   maxlength="10"
                                   inputmode="numeric"
                                   required>
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
                            <input type="number"
                                   id="guestCount"
                                   class="form-control"
                                   min="1"
                                   placeholder="Number of guests"
                                   required>
                        </div>

                    </div>

                    <hr class="my-4">

                    <!-- DATE AVAILABILITY -->
                    <h6 class="form-section-title">Select Event Date</h6>

                    <div class="availability-note mb-3">
                        <div>
                            <span class="date-dot available-dot"></span>
                            Available
                        </div>
                        <div>
                            <span class="date-dot booked-dot"></span>
                            Already Booked
                        </div>
                    </div>

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Event Date <span>*</span></label>

                            <input type="date"
                                   id="eventDate"
                                   class="form-control"
                                   required>

                            <small class="text-muted d-block mt-2">
                                Choose a date that is available for this hall.
                            </small>

                            <div id="dateMessage" class="date-message"></div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Booking Duration <span>*</span></label>

                            <select id="duration" class="form-select" required>
                                <option value="1">1 Day</option>
                                <option value="2">2 Days</option>
                                <option value="3">3 Days</option>
                            </select>
                        </div>

                    </div>


<hr class="my-4">

<!-- EVENT TIMING -->
<h6 class="form-section-title">Event Timing</h6>

<div class="p-3 mb-3" style="background:#F8FAFC;border:1px solid #E2E8F0;border-radius:10px;">

    <div class="mb-3">
        <label class="form-label">Event Day</label>
        <div class="form-control d-flex align-items-center"
             style="background:#fff;">
            <i class="fas fa-calendar-day me-2" style="color:#D97706;"></i>
            <span id="eventDayText">Select event date first</span>
        </div>
        <small class="text-muted">The day will be displayed automatically based on your selected date.</small>
    </div>

    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Event Starting Time <span>*</span></label>
            <input type="time" id="startTime" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Event Ending Time <span>*</span></label>
            <input type="time" id="endTime" class="form-control" required>
        </div>
    </div>

    <div id="timeMessage" class="mt-2" style="font-size:12px;font-weight:600;"></div>

    <small class="text-muted d-block mt-2">
        Select the time from which your event starts until it ends.
    </small>
</div>


                    <hr class="my-4">

                    <!-- ADDITIONAL DETAILS -->
                    <h6 class="form-section-title">Additional Information</h6>

                    <div class="mb-3">
                        <label class="form-label">Special Requirements (Optional)</label>
                        <textarea id="requirements"
                                  class="form-control"
                                  rows="3"
                                  placeholder="Mention any additional requirements..."></textarea>
                    </div>

                    <!-- PRICE SUMMARY -->
                    <div class="price-summary mt-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>Hall rental per day</span>
                            <strong id="dailyPrice">₹25,000</strong>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <span>Duration</span>
                            <strong id="durationText">1 Day</strong>
                        </div>

                        <div class="price-total d-flex justify-content-between align-items-center mt-3 pt-3">
                            <strong>Estimated Total</strong>
                            <strong id="totalPrice">₹25,000</strong>
                        </div>

                        <small class="text-muted d-block mt-2">
                            Sample price for demonstration. Final amount is subject to centre confirmation.
                        </small>
                    </div>

                    <div class="form-check mt-4">
                        <input class="form-check-input"
                               type="checkbox"
                               id="agree"
                               required>
                        <label class="form-check-label" for="agree"
                               style="font-size:13px;color:#64748B;">
                            I confirm that the booking details provided above are correct.
                        </label>
                    </div>

                    <button type="submit"
                            class="btn submit-booking-btn w-100 mt-4">
                        Submit Booking Request
                        <i class="fas fa-arrow-right ms-2"></i>
                    </button>

                    <p class="text-muted text-center mt-3 mb-0"
                       style="font-size:12px;">
                        No payment is required now. Payment will be available only after approval.
                    </p>

                </form>

                <!-- FRONTEND SUCCESS MESSAGE -->
                <div id="successMessage" class="success-message mt-4" style="display:none;">
                    <div class="success-icon">
                        <i class="fas fa-check"></i>
                    </div>

                    <h5 class="fw-bold mt-3">Booking Request Submitted!</h5>

                    <p class="mb-0">
                        Your request has been submitted for approval.
                        You will get the payment option after the Admin or Convention Centre approves it.
                    </p>
                </div>

            </div>
        </div>

        <!-- PRICE AND AVAILABILITY SIDEBAR -->
        <div class="col-lg-4">

            <div class="booking-sidebar">

                <h5 class="fw-bold mb-3">Booking Summary</h5>

                <div class="summary-hall">
                    <i class="fas fa-landmark"></i>
                    <div>
                        <strong>Grand Palace Convention Hall</strong>
                        <small>Bengaluru, Karnataka</small>
                    </div>
                </div>

                <hr>

                <div class="summary-row">
                    <span>Price per day</span>
                    <strong>₹25,000</strong>
                </div>

                <div class="summary-row">
                    <span>Selected date</span>
                    <strong id="summaryDate">Not selected</strong>
                </div>

                <div class="summary-row">
                    <span>Duration</span>
                    <strong id="summaryDuration">1 Day</strong>
                </div>

                <hr>

                <div class="summary-row total-row">
                    <span>Estimated Total</span>
                    <strong id="summaryTotal">₹25,000</strong>
                </div>

                <div class="approval-note mt-4">
                    <i class="fas fa-info-circle me-2"></i>
                    Your booking is confirmed only after approval and payment.
                </div>

            </div>

        </div>

    </div>
</div>

<style>
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
        font-size: 14px;
    }

    .form-section-title {
        color: #0A0F1D;
        font-size: 15px;
        font-weight: 800;
        margin-bottom: 17px;
    }

    .form-label {
        color: #334155;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .form-label span {
        color: #DC2626;
    }

    .form-control,
    .form-select {
        min-height: 46px;
        border: 1px solid #E2E8F0;
        border-radius: 8px;
        font-family: inherit;
        font-size: 13px;
        color: #0A0F1D;
    }

    textarea.form-control {
        min-height: 90px;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #F59E0B;
        box-shadow: 0 0 0 3px rgba(245,158,11,.12);
    }

    .availability-note {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        color: #64748B;
        font-size: 12px;
    }

    .date-dot {
        width: 9px;
        height: 9px;
        display: inline-block;
        border-radius: 50%;
        margin-right: 5px;
    }

    .available-dot {
        background: #16A34A;
    }

    .booked-dot {
        background: #DC2626;
    }

    .date-message {
        margin-top: 8px;
        font-size: 12px;
        font-weight: 700;
    }

    .price-summary {
        padding: 17px;
        background: #F8FAFC;
        border: 1px solid #E2E8F0;
        border-radius: 10px;
        color: #64748B;
        font-size: 13px;
    }

    .price-summary strong {
        color: #0A0F1D;
    }

    .price-total {
        border-top: 1px solid #E2E8F0;
        font-size: 15px;
    }

    .submit-booking-btn {
        min-height: 51px;
        background: #0A0F1D;
        color: #F59E0B;
        border: 0;
        border-radius: 9px;
        font-family: inherit;
        font-size: 14px;
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
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 9px;
        background: #FEF3C7;
        color: #B45309;
        font-size: 18px;
    }

    .summary-hall strong {
        display: block;
        font-size: 12px;
    }

    .summary-hall small {
        display: block;
        margin-top: 4px;
        color: #64748B;
        font-size: 11px;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        gap: 10px;
        margin: 15px 0;
        color: #64748B;
        font-size: 13px;
    }

    .summary-row strong {
        color: #0A0F1D;
        text-align: right;
    }

    .total-row {
        font-size: 15px;
        font-weight: 800;
    }

    .approval-note {
        padding: 13px;
        background: #FFFBEB;
        border: 1px solid #FDE68A;
        border-radius: 8px;
        color: #92400E;
        font-size: 12px;
        line-height: 1.6;
    }

    .success-message {
        padding: 25px;
        background: #F0FDF4;
        border: 1px solid #BBF7D0;
        border-radius: 12px;
        text-align: center;
        color: #166534;
    }

    .success-icon {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: auto;
        background: #DCFCE7;
        border-radius: 50%;
        font-size: 22px;
    }

    .success-message p {
        font-size: 13px;
        line-height: 1.7;
    }

    @media (max-width: 575px) {
        .booking-section,
        .booking-sidebar {
            padding: 17px;
        }

        .booking-sidebar {
            position: static;
        }
    }
</style>

<script>
    // DEMO DATA FOR THIS HALL ONLY.
    // Replace these dates with actual booked dates from the database later.
    const bookedDates = [
        '2026-11-15',
        '2026-11-20',
        '2026-11-25',
        '2026-12-05',
        '2026-12-10'
    ];

    // DEMO PRICE. Replace with the actual hall price later.
    const pricePerDay = 25000;

    const eventDate = document.getElementById('eventDate');
    const duration = document.getElementById('duration');
    const dateMessage = document.getElementById('dateMessage');
    
    const eventDayText = document.getElementById('eventDayText');
const startTime = document.getElementById('startTime');
const endTime = document.getElementById('endTime');
const timeMessage = document.getElementById('timeMessage');

    const dailyPrice = document.getElementById('dailyPrice');
    const totalPrice = document.getElementById('totalPrice');
    const durationText = document.getElementById('durationText');

    const summaryDate = document.getElementById('summaryDate');
    const summaryDuration = document.getElementById('summaryDuration');
    const summaryTotal = document.getElementById('summaryTotal');

    function formatCurrency(amount) {
        return '₹' + amount.toLocaleString('en-IN');
    }

    function updatePrice() {
        const days = parseInt(duration.value) || 1;
        const total = pricePerDay * days;

        dailyPrice.textContent = formatCurrency(pricePerDay);
        totalPrice.textContent = formatCurrency(total);
        durationText.textContent = days + (days === 1 ? ' Day' : ' Days');

        summaryDuration.textContent = days + (days === 1 ? ' Day' : ' Days');
        summaryTotal.textContent = formatCurrency(total);
    }

    function updateEventDay() {
    if (!eventDate.value) {
        eventDayText.textContent = 'Select event date first';
        return;
    }

    const selected = new Date(eventDate.value + 'T00:00:00');

    eventDayText.textContent = selected.toLocaleDateString('en-IN', {
        weekday: 'long',
        day: '2-digit',
        month: 'long',
        year: 'numeric'
    });
}

function checkTiming() {
    const start = startTime.value;
    const end = endTime.value;

    if (!start || !end) {
        timeMessage.textContent = 'Please select both starting and ending times.';
        timeMessage.style.color = '#DC2626';
        return false;
    }

    if (end <= start) {
        timeMessage.textContent = 'Ending time must be later than starting time.';
        timeMessage.style.color = '#DC2626';
        return false;
    }

    timeMessage.textContent = 'Event timing looks good.';
    timeMessage.style.color = '#16A34A';
    return true;
}

    function checkDate() {
        const selectedDate = eventDate.value;

        dateMessage.textContent = '';
        dateMessage.style.color = '#64748B';
        summaryDate.textContent = 'Not selected';

        if (!selectedDate) return true;

        const today = new Date();
        today.setHours(0, 0, 0, 0);

        const chosen = new Date(selectedDate + 'T00:00:00');

        if (chosen < today) {
            dateMessage.textContent = 'Please select a future date.';
            dateMessage.style.color = '#DC2626';
            return false;
        }

        if (bookedDates.includes(selectedDate)) {
            dateMessage.textContent = 'This date is already booked. Please choose another date.';
            dateMessage.style.color = '#DC2626';
            return false;
        }

        dateMessage.textContent = 'This date is available in the demo schedule.';
        dateMessage.style.color = '#16A34A';

        summaryDate.textContent = new Date(selectedDate + 'T00:00:00')
            .toLocaleDateString('en-IN', {
                day: '2-digit',
                month: 'short',
                year: 'numeric'
            });

        return true;
    }

    eventDate.min = new Date().toISOString().split('T')[0];

    eventDate.addEventListener('change', checkDate);
    eventDate.addEventListener('change', updateEventDay);
startTime.addEventListener('change', checkTiming);
endTime.addEventListener('change', checkTiming);
    duration.addEventListener('change', updatePrice);

    document.getElementById('mobile').addEventListener('input', function () {
        this.value = this.value.replace(/\D/g, '').slice(0, 10);
    });

    document.getElementById('bookingForm').addEventListener('submit', function (e) {
        e.preventDefault();

        if (!checkDate()) {
            eventDate.focus();
            return;
        }

        if (!checkTiming()) {
    startTime.focus();
    return;
}

        const mobile = document.getElementById('mobile').value;

        if (!/^[6-9]\d{9}$/.test(mobile)) {
            alert('Please enter a valid 10-digit mobile number.');
            return;
        }

        // Frontend demo only. No request is saved in the database yet.
        this.style.display = 'none';
        document.getElementById('successMessage').style.display = 'block';

        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    updatePrice();
</script>

@endsection
