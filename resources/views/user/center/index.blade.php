@extends('layouts.user')

@section('title', 'Convention Centres | Book My Slot')

@section('content')

<div class="container-fluid px-3 px-md-4 py-4">

    <!-- PAGE HEADING -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1" style="color:#0A0F1D;">
                Convention Centres
            </h3>
            <p class="mb-0 text-muted">
                Explore venues and find the right place for your event.
            </p>
        </div>
    </div>

    <!-- SEARCH -->
    <div class="card border-0 shadow-sm mb-4" style="border-radius:14px;">
        <div class="card-body p-3">
            <div class="row g-2 align-items-center">
                <div class="col-md-9">
                    <div class="d-flex align-items-center"
                        style="border:1px solid #E2E8F0;border-radius:9px;padding:0 14px;height:48px;">
                        <i class="fas fa-search me-2" style="color:#94A3B8;"></i>
                        <input type="text"
                            id="centreSearch"
                            class="form-control border-0 shadow-none"
                            placeholder="Search by centre name ..."
                            style="font-size:14px;">
                    </div>
                </div>

                <div class="col-md-3">
                    <button type="button"
                        class="btn w-100"
                        id="searchButton"
                        style="height:48px;background:#0A0F1D;color:#F59E0B;font-weight:700;border-radius:9px;">
                        Search Centres
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- FILTER TOGGLE BUTTON -->
    <div class="d-flex justify-content-start mb-3">
        <button type="button"
            id="toggleFilters"
            class="btn d-flex align-items-center gap-2"
            aria-expanded="false"
            aria-controls="filterPanel"
            style="background:#0A0F1D;color:#F59E0B;
        border-radius:9px;padding:11px 20px;font-weight:700;">

            <i class="fas fa-sliders-h"></i>
            Filters
            <i class="fas fa-chevron-down" id="filterArrow"></i>

        </button>
    </div>

    <!-- FILTERS -->
    <div class="card border-0 shadow-sm mb-4"
        id="filterPanel"
        style="border-radius:14px;display:none;">
        <div class="card-body p-3">
            <div class="row g-3 align-items-end">

                <!-- LOCATION FILTER -->
                <div class="col-12 col-md-4">
                    <label class="form-label fw-semibold small">Location</label>
                    <div class="position-relative">
                        <input type="text" id="locationFilter"
                            class="form-control filter-input"
                            placeholder="Search city, area or location..."
                            autocomplete="off">

                        <div id="locationSuggestions"
                            class="location-suggestions"></div>
                    </div>
                </div>

                <!-- FACILITIES MULTI SELECT -->
                <div class="col-12 col-md-4">
                    <label class="form-label fw-semibold small">Facilities</label>
                    <select id="facilityFilter" class="form-select" multiple>
                        <option value="parking">Parking</option>
                        <option value="kitchen">Kitchen</option>
                        <option value="dining">Dining</option>
                        <option value="generator">Generator</option>
                        <option value="wifi">Wi-Fi</option>
                    </select>
                </div>

                <!-- PRICE FILTER -->
                <div class="col-6 col-md-2">
                    <label class="form-label fw-semibold small">Price Range</label>
                    <select id="priceFilter" class="form-select filter-input">
                        <option value="">Any Price</option>
                        <option value="0-25000">Below ₹25,000</option>
                        <option value="25000-50000">₹25,000–₹50,000</option>
                        <option value="50000-75000">₹50,000–₹75,000</option>
                        <option value="75000-999999999">Above ₹75,000</option>
                    </select>
                </div>

                <!-- CAPACITY FILTER -->
                <div class="col-6 col-md-2">
                    <label class="form-label fw-semibold small">Capacity</label>
                    <select id="capacityFilter" class="form-select filter-input">
                        <option value="">Any Capacity</option>
                        <option value="0-200">Below 200 People</option>
                        <option value="200-500">200–500 People</option>
                        <option value="500-1000">500–1,000 People</option>
                        <option value="1000-999999">Above 1,000 People</option>
                    </select>
                </div>

                <!-- PACKAGE FILTER -->
                <div class="col-6 col-md-3">
                    <label class="form-label fw-semibold small">Event Packages</label>
                    <select id="packageFilter" class="form-select filter-input">
                        <option value="">All Packages</option>
                        <option value="wedding">Wedding</option>
                        <option value="birthday">Birthday</option>
                        <option value="conference">Conference</option>
                    </select>
                </div>

                <!-- EVENT FROM DATE & TIME -->
                <div class="col-6 col-md-3">
                    <label class="form-label fw-semibold small">
                        Event From
                    </label>
                    <input type="datetime-local" id="fromDate"
                        class="form-control filter-input">
                </div>

                <!-- EVENT TO DATE & TIME -->
                <div class="col-6 col-md-3">
                    <label class="form-label fw-semibold small">
                        Event To
                    </label>
                    <input type="datetime-local" id="toDate"
                        class="form-control filter-input">
                </div>

                <!-- RESET -->
                <div class="col-12 col-md-3">
                    <button type="button" id="resetFilters"
                        class="btn w-100"
                        style="min-height:44px;background:#0A0F1D;
                    color:#F59E0B !important;border:1px solid #0A0F1D;
                    border-radius:8px;font-weight:700;">
                        <i class="fas fa-undo me-1"></i> Reset Filters
                    </button>
                </div>

            </div>
        </div>
    </div>



    <!-- SECTION TITLE -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0" style="color:#0A0F1D;">
            Available Centres
        </h5>
        <span class="text-muted" style="font-size:13px;" id="centreCount">
            3 centres
        </span>
    </div>

    <!-- CENTRE LIST -->
    <div class="row g-3" id="centreList">

        <!-- CENTRE 1 -->
        <div class="col-md-6 col-xl-4 centre-item"
            data-search="grand palace convention hall bengaluru"
            data-location="bengaluru"
            data-ac="ac"
            data-facilities="parking,kitchen,dining,generator"
            data-price="50000"
            data-capacity="800"
            data-package="wedding,birthday"
            data-booked-from=""
            data-booked-to=""
            data-booked-start=""
            data-booked-end="">

            <div class="card h-100 border-0 shadow-sm"
                style="border-radius:14px;overflow:hidden;">

                <div class="d-flex align-items-center justify-content-center"
                    style="height:175px;background:linear-gradient(135deg,#0A0F1D,#263653);">
                    <div class="text-center text-white">
                        <i class="fas fa-landmark mb-2"
                            style="font-size:42px;color:#F59E0B;"></i>
                        <div class="fw-bold">Convention Centre</div>
                        <small style="color:#CBD5E1;">Demo listing</small>
                    </div>
                </div>

                <div class="card-body p-3">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="fw-bold mb-0" style="font-size:16px;color:#0A0F1D;">
                            Grand Palace Convention Hall
                        </h5>
                        <span class="badge rounded-pill"
                            style="background:#DCFCE7;color:#166534;">
                            AC/Non-AC
                        </span>
                    </div>

                    <p class="text-muted mb-3" style="font-size:13px;">
                        <i class="fas fa-map-marker-alt me-1"
                            style="color:#F59E0B;"></i>
                        Bengaluru, Karnataka
                    </p>

                    <div class="d-flex align-items-center justify-content-between mb-3"
                        style="font-size:13px;color:#64748B;">
                        <span><i class="fas fa-users me-1"></i> Capacity details on request</span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center pt-3"
                        style="border-top:1px solid #E2E8F0;">
                        <span class="fw-bold" style="font-size:13px;color:#0A0F1D;">
                            Pricing on request
                        </span>

                        <a href="{{ route('user.center.details') }}"
                            class="btn btn-sm"
                            style="background:#0A0F1D;color:#F59E0B;border-radius:7px;font-weight:700;">
                            View Details <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- CENTRE 2 -->
        <div class="col-md-6 col-xl-4 centre-item"
            data-search="sunrise convention centre mysuru"
            data-location="mysuru"
            data-ac="non-ac"
            data-facilities="parking,dining,wifi"
            data-price="35000"
            data-capacity="400"
            data-package="birthday,conference"
            data-booked-from="2026-11-20"
            data-booked-to="2026-11-22"
            data-booked-start="09:00"
            data-booked-end="18:00">

            <div class="card h-100 border-0 shadow-sm"
                style="border-radius:14px;overflow:hidden;">

                <div class="d-flex align-items-center justify-content-center"
                    style="height:175px;background:linear-gradient(135deg,#3B2F24,#80613B);">
                    <div class="text-center text-white">
                        <i class="fas fa-building mb-2"
                            style="font-size:42px;color:#F59E0B;"></i>
                        <div class="fw-bold">Convention Centre</div>
                        <small style="color:#F1E6D6;">Demo listing</small>
                    </div>
                </div>

                <div class="card-body p-3">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="fw-bold mb-0" style="font-size:16px;color:#0A0F1D;">
                            Sunrise Convention Centre
                        </h5>
                        <span class="badge rounded-pill"
                            style="background:#F1F5F9;color:#334155;">
                            Non-AC
                        </span>
                    </div>

                    <p class="text-muted mb-3" style="font-size:13px;">
                        <i class="fas fa-map-marker-alt me-1"
                            style="color:#F59E0B;"></i>
                        Mysuru, Karnataka
                    </p>

                    <div class="d-flex align-items-center justify-content-between mb-3"
                        style="font-size:13px;color:#64748B;">
                        <span><i class="fas fa-users me-1"></i> Capacity details on request</span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center pt-3"
                        style="border-top:1px solid #E2E8F0;">
                        <span class="fw-bold" style="font-size:13px;color:#0A0F1D;">
                            Contact for pricing
                        </span>

                        <a href="{{ route('user.center.details') }}"
                            class="btn btn-sm"
                            style="background:#0A0F1D;color:#F59E0B;border-radius:7px;font-weight:700;">
                            View Details <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- CENTRE 3 -->
        <div class="col-md-6 col-xl-4 centre-item"
            data-search="green valley event centre mangaluru"
            data-location="mangaluru"
            data-ac="ac"
            data-facilities="parking,kitchen,generator,wifi"
            data-price="65000"
            data-capacity="1200"
            data-package="wedding,conference"
            data-booked-from=""
            data-booked-to=""
            data-booked-start=""
            data-booked-end="">

            <div class="card h-100 border-0 shadow-sm"
                style="border-radius:14px;overflow:hidden;">

                <div class="d-flex align-items-center justify-content-center"
                    style="height:175px;background:linear-gradient(135deg,#154712,#397343);">
                    <div class="text-center text-white">
                        <i class="fas fa-place-of-worship mb-2"
                            style="font-size:42px;color:#F59E0B;"></i>
                        <div class="fw-bold">Convention Centre</div>
                        <small style="color:#DCEBDD;">Demo listing</small>
                    </div>
                </div>

                <div class="card-body p-3">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="fw-bold mb-0" style="font-size:16px;color:#0A0F1D;">
                            Green Valley Event Centre
                        </h5>
                        <span class="badge rounded-pill"
                            style="background:#DCFCE7;color:#166534;">
                            AC/Non-Ac
                        </span>
                    </div>

                    <p class="text-muted mb-3" style="font-size:13px;">
                        <i class="fas fa-map-marker-alt me-1"
                            style="color:#F59E0B;"></i>
                        Mangaluru, Karnataka
                    </p>

                    <!-- CAPACITY -->
                    <div class="d-flex align-items-center justify-content-between mb-3"
                        style="font-size:13px;color:#64748B;">
                        <span>
                            <i class="fas fa-users me-1"></i>
                            Suitable for events of different sizes
                        </span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center pt-3"
                        style="border-top:1px solid #E2E8F0;">
                        <!-- PRICING -->
                        <span class="fw-bold" style="font-size:12px;color:#64748B;">
                            <i class="fas fa-info-circle me-1"></i>
                            Packages available on enquiry.
                        </span>
                        <a href="{{ route('user.center.details') }}"
                            class="btn btn-sm"
                            style="background:#0A0F1D;color:#F59E0B;border-radius:7px;font-weight:700;">
                            View Details <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- NO RESULTS -->
    <div id="noCentres" class="text-center py-5" style="display:none;">
        <i class="fas fa-search mb-3"
            style="font-size:35px;color:#CBD5E1;"></i>
        <h5 class="fw-bold">No centres found</h5>
        <p class="text-muted mb-0">
            Try searching with another centre name or location.
        </p>
    </div>

</div>

<style>
    #centreSearch {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .centre-item .card {
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .centre-item .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(10, 15, 29, .10) !important;
    }

    .centre-details-btn {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 12px;
    }

    @media (max-width: 575px) {
        .container-fluid {
            padding-left: 14px !important;
            padding-right: 14px !important;
        }
    }

    #acFilter,
    #facilityFilter,
    #priceFilter,
    #packageFilter,
    #availabilityFilter {
        min-height: 44px;
        background-color: #FFFFFF !important;
        color: #0A0F1D !important;
        border: 1px solid #CBD5E1 !important;
        border-radius: 8px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 13px;
        font-weight: 600;
        box-shadow: none !important;
    }

    #acFilter option,
    #facilityFilter option,
    #priceFilter option,
    #packageFilter option,
    #availabilityFilter option {
        color: #0A0F1D;
        background: #FFFFFF;
    }


    /* FILTER INPUTS */
    .filter-input {
        min-height: 44px;
        background-color: #fff !important;
        color: #0A0F1D !important;
        border: 1px solid #CBD5E1 !important;
        border-radius: 8px !important;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 13px;
        font-weight: 600;
        box-shadow: none !important;
    }

    .filter-input:focus {
        border-color: #F59E0B !important;
        outline: none;
        box-shadow: 0 0 0 2px rgba(245, 158, 11, .12) !important;
    }

    /* SELECT2 */
    .select2-container {
        width: 100% !important;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 13px;
    }

    .select2-container--default .select2-selection--multiple {
        min-height: 44px;
        border: 1px solid #CBD5E1 !important;
        border-radius: 8px !important;
        padding: 4px 7px;
        background: #fff;
    }

    .select2-container--default.select2-container--focus .select2-selection--multiple {
        border-color: #F59E0B !important;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background: #FEF3C7 !important;
        border: 1px solid #F59E0B !important;
        color: #92400E !important;
        border-radius: 5px;
        padding: 3px 17px;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: #92400E !important;
        margin-right: 5px;
    }

    .select2-dropdown {
        border: 1px solid #CBD5E1 !important;
        border-radius: 8px !important;
        overflow: hidden;
    }

    /* LOCATION AUTOCOMPLETE */
    .location-suggestions {
        display: none;
        position: absolute;
        top: calc(100% + 4px);
        left: 0;
        width: 100%;
        max-height: 230px;
        overflow-y: auto;
        background: #fff;
        border: 1px solid #CBD5E1;
        border-radius: 9px;
        box-shadow: 0 8px 20px rgba(10, 15, 29, .12);
        z-index: 1000;
    }

    .location-option {
        padding: 11px 13px;
        font-size: 13px;
        color: #0A0F1D;
        cursor: pointer;
        border-bottom: 1px solid #F1F5F9;
    }

    .location-option:hover {
        background: #FEF3C7;
    }

    .location-option:last-child {
        border-bottom: 0;
    }

    @media(max-width:575px) {
        .select2-container--default .select2-selection--multiple {
            min-height: 44px;
        }

        .location-suggestions {
            max-height: 200px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const centreSearch = document.getElementById('centreSearch');
        const centreItems = document.querySelectorAll('.centre-item');
        const centreCount = document.getElementById('centreCount');
        const noCentres = document.getElementById('noCentres');

        const locationInput = document.getElementById('locationFilter');
        const locationSuggestions = document.getElementById('locationSuggestions');

        // SELECT2 MULTIPLE FACILITIES
        $('#facilityFilter').select2({
            placeholder: 'Select facilities',
            closeOnSelect: false,
            allowClear: true,
            width: '100%'
        });

        // LOCATION AUTOCOMPLETE - OPENSTREETMAP
        let locationTimer;
        let locationController;

        locationInput.addEventListener('input', function() {

            clearTimeout(locationTimer);

            locationInput.dataset.match = '';
            const query = locationInput.value.trim();

            if (query.length < 2) {
                locationSuggestions.style.display = 'none';
                filterCentres();
                return;
            }

            locationTimer = setTimeout(async function() {

                if (locationController) {
                    locationController.abort();
                }

                locationController = new AbortController();

                locationSuggestions.innerHTML =
                    '<div class="location-option">Searching locations...</div>';

                locationSuggestions.style.display = 'block';

                try {

                    const response = await fetch(
                        'https://nominatim.openstreetmap.org/search?format=jsonv2&addressdetails=1&limit=7&accept-language=en&q=' +
                        encodeURIComponent(query), {
                            signal: locationController.signal
                        }
                    );

                    if (!response.ok) {
                        throw new Error('Location search failed');
                    }

                    const locations = await response.json();

                    locationSuggestions.innerHTML = '';

                    if (locations.length === 0) {
                        locationSuggestions.innerHTML =
                            '<div class="location-option">No locations found</div>';
                        return;
                    }

                    locations.forEach(function(place) {

                        const option = document.createElement('div');

                        option.className = 'location-option';

                        option.textContent = place.display_name;

                        option.addEventListener('click', function() {

                            const address = place.address || {};

                            const city =
                                address.city ||
                                address.town ||
                                address.village ||
                                address.municipality ||
                                address.county ||
                                address.state_district ||
                                address.state ||
                                place.display_name;

                            locationInput.value = place.display_name;
                            locationInput.dataset.match = city.toLowerCase();

                            locationSuggestions.style.display = 'none';

                            filterCentres();
                        });

                        locationSuggestions.appendChild(option);

                    });

                } catch (error) {

                    if (error.name !== 'AbortError') {
                        locationSuggestions.innerHTML =
                            '<div class="location-option">Unable to load locations. Try again.</div>';
                    }

                }

            }, 450);

        });

        // CLOSE LOCATION SUGGESTIONS
        document.addEventListener('click', function(event) {

            if (!locationInput.contains(event.target) &&
                !locationSuggestions.contains(event.target)) {

                locationSuggestions.style.display = 'none';

            }

        });

        // AVAILABILITY CHECK
        function checkAvailability(item, fromDate, toDate) {

            const bookedFrom = item.dataset.bookedFrom;
            const bookedTo = item.dataset.bookedTo;
            const bookedStart = item.dataset.bookedStart;
            const bookedEnd = item.dataset.bookedEnd;

            if (!bookedFrom || !bookedTo) {
                return true;
            }

            const requestedStart = new Date(fromDate);
            const requestedEnd = new Date(toDate);

            const bookingStart = new Date(
                bookedFrom + 'T' + (bookedStart || '00:00')
            );

            const bookingEnd = new Date(
                bookedTo + 'T' + (bookedEnd || '23:59')
            );

            return !(requestedStart < bookingEnd &&
                requestedEnd > bookingStart);
        }
        // FILTER CENTRES
        function filterCentres() {

            const search = centreSearch.value.toLowerCase().trim();

            const location = locationInput.value.toLowerCase().trim();

            const selectedLocation =
                locationInput.dataset.match || location;

            const facilities = $('#facilityFilter').val() || [];

            const price = document.getElementById('priceFilter').value;

            const capacity = document.getElementById('capacityFilter').value;

            const packageType = document.getElementById('packageFilter').value;

            const fromDate = document.getElementById('fromDate').value;
            const toDate = document.getElementById('toDate').value;

            const availabilitySelected = fromDate || toDate;

            if (availabilitySelected && (!fromDate || !toDate)) {
                centreCount.textContent = 'Select both event start and end';
                return;
            }

            if (availabilitySelected && fromDate >= toDate) {
                centreCount.textContent = 'End date and time must be after start';
                return;
            }
            let visibleCount = 0;

            centreItems.forEach(function(item) {

                const searchMatch =
                    item.dataset.search.toLowerCase().includes(search);

                const locationMatch = !location ||
                    item.dataset.location.toLowerCase().includes(selectedLocation);

                const centreFacilities =
                    item.dataset.facilities.split(',');

                const facilityMatch =
                    facilities.every(function(facility) {
                        return centreFacilities.includes(facility);
                    });

                let priceMatch = true;

                if (price) {

                    const range = price.split('-').map(Number);
                    const centrePrice = Number(item.dataset.price);

                    priceMatch =
                        centrePrice >= range[0] &&
                        centrePrice <= range[1];
                }

                let capacityMatch = true;

                if (capacity) {

                    const range = capacity.split('-').map(Number);
                    const centreCapacity = Number(item.dataset.capacity);

                    capacityMatch =
                        centreCapacity >= range[0] &&
                        centreCapacity <= range[1];
                }

                const packageMatch = !packageType ||
                    item.dataset.package.split(',').includes(packageType);

                const availabilityMatch = !availabilitySelected ||
                    checkAvailability(item, fromDate, toDate);

                const show =
                    searchMatch &&
                    locationMatch &&
                    facilityMatch &&
                    priceMatch &&
                    capacityMatch &&
                    packageMatch &&
                    availabilityMatch;

                item.style.display = show ? '' : 'none';

                if (show) {
                    visibleCount++;
                }

            });

            centreCount.textContent = visibleCount + ' centres';

            noCentres.style.display =
                visibleCount === 0 ? 'block' : 'none';

        }

        // SEARCH
        centreSearch.addEventListener('input', filterCentres);

        document.getElementById('searchButton')
            .addEventListener('click', filterCentres);


        // FILTER EVENTS
        [
            'priceFilter',
            'capacityFilter',
            'packageFilter',
            'fromDate',
            'toDate'
        ].forEach(function(id) {

            const element = document.getElementById(id);

            if (element) {
                element.addEventListener('change', filterCentres);
            }

        });

        $('#facilityFilter').on('change', filterCentres);

        // RESET ALL FILTERS
        // RESET ALL FILTERS
document.getElementById('resetFilters')
    .addEventListener('click', function() {

        // Clear search
        centreSearch.value = '';

        // Clear location
        locationInput.value = '';
        locationInput.dataset.match = '';

        // Clear dropdown filters
        document.getElementById('priceFilter').value = '';
        document.getElementById('capacityFilter').value = '';
        document.getElementById('packageFilter').value = '';

        // Clear event dates and timings
        document.getElementById('fromDate').value = '';
        document.getElementById('toDate').value = '';

        // Clear multiple facilities
        $('#facilityFilter').val(null).trigger('change');

        // Close location suggestions
        locationSuggestions.style.display = 'none';

        // Display all centres again
        centreItems.forEach(function(item) {
            item.style.display = '';
        });

        // Update count
        centreCount.textContent = centreItems.length + ' centres';

        // Hide no-results message
        noCentres.style.display = 'none';

    });

        filterCentres();

        // FILTER CARD OPEN / CLOSE
        const toggleFilters = document.getElementById('toggleFilters');
        const filterPanel = document.getElementById('filterPanel');
        const filterArrow = document.getElementById('filterArrow');

        toggleFilters.addEventListener('click', function() {

            const isOpen = filterPanel.style.display !== 'none';

            filterPanel.style.display = isOpen ? 'none' : 'block';

            toggleFilters.setAttribute('aria-expanded', String(!isOpen));

            filterArrow.classList.toggle('fa-chevron-down', isOpen);
            filterArrow.classList.toggle('fa-chevron-up', !isOpen);

        });

    });
</script>
@endsection