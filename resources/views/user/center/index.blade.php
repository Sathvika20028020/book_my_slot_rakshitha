
@extends('user.layouts.app')

@section('title', 'Convention Centres | Book My Slot')

@section('content')

<div class="container-fluid px-3 px-md-4 py-3">

    <!-- PAGE HEADING -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold mb-0" style="color:#0A0F1D;">
            Convention Centres
        </h3>
    </div>

    <!-- COMBINED SEARCH BAR -->
    <div class="mb-3">
        <div class="input-group centre-search-group">

            <span class="input-group-text search-icon">
                <i class="fas fa-search"></i>
            </span>

            <input type="text"
                   id="centreSearch"
                   class="form-control centre-search-input"
                   placeholder="Search by centre name ...">

            <button type="button"
                    class="btn search-centre-btn"
                    id="searchButton">
                Search Centres
            </button>

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
                border-radius:9px;padding:9px 18px;font-weight:700;">

            <i class="fas fa-sliders-h"></i>
            Filters
            <i class="fas fa-chevron-down" id="filterArrow"></i>

        </button>
    </div>


    <!-- FILTER PANEL (HIDDEN INITIALLY) -->
    <div class="card border-0 shadow-sm mb-3"
         id="filterPanel"
         style="border-radius:14px;display:none;">

        <div class="card-body p-3">

            <div class="row g-3 align-items-end">

                <!-- LOCATION FILTER -->
                <div class="col-12 col-md-4">
                    <label class="form-label fw-semibold small">Location</label>

                    <div class="position-relative">
                        <input type="text"
                               id="locationFilter"
                               class="form-control filter-input"
                               placeholder="Search city, area or location..."
                               autocomplete="off">

                        <div id="locationSuggestions"
                             class="location-suggestions"></div>
                    </div>
                </div>

                <!-- FACILITIES -->
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

                <!-- PRICE -->
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

                <!-- CAPACITY -->
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

                <!-- PACKAGE -->
                <div class="col-6 col-md-3">
                    <label class="form-label fw-semibold small">Event Packages</label>

                    <select id="packageFilter" class="form-select filter-input">
                        <option value="">All Packages</option>
                        <option value="wedding">Wedding</option>
                        <option value="birthday">Birthday</option>
                        <option value="conference">Conference</option>
                    </select>
                </div>

                <!-- EVENT FROM -->
                <div class="col-6 col-md-3">
                    <label class="form-label fw-semibold small">Event From</label>

                    <input type="datetime-local"
                           id="fromDate"
                           class="form-control filter-input">
                </div>

                <!-- EVENT TO -->
                <div class="col-6 col-md-3">
                    <label class="form-label fw-semibold small">Event To</label>

                    <input type="datetime-local"
                           id="toDate"
                           class="form-control filter-input">
                </div>

                <!-- RESET -->
                <div class="col-12 col-md-3">
                    <button type="button"
                            id="resetFilters"
                            class="btn w-100 reset-filter-btn">

                        <i class="fas fa-undo me-1"></i>
                        Reset Filters

                    </button>
                </div>

            </div>
        </div>
    </div>


    <!-- AVAILABLE CENTRES HEADING -->
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

            <div class="card h-100 border-0 shadow-sm centre-card">

                <div class="centre-image-placeholder"
                     style="background:linear-gradient(135deg,#0A0F1D,#263653);">

                    <div class="text-center text-white">
                        <i class="fas fa-landmark mb-2"
                           style="font-size:42px;color:#F59E0B;"></i>

                        <div class="fw-bold">Convention Centre</div>
                        <small style="color:#CBD5E1;">Demo listing</small>
                    </div>

                </div>

                <div class="card-body p-3">

                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="fw-bold mb-0 centre-name">
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
                        <span>
                            <i class="fas fa-users me-1"></i>
                            Capacity details on request
                        </span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center pt-3"
                         style="border-top:1px solid #E2E8F0;">

                        <span class="fw-bold"
                              style="font-size:13px;color:#0A0F1D;">
                            Pricing on request
                        </span>

                        <a href="{{ route('user.center.details') }}"
                           class="btn btn-sm centre-details-btn">
                            View Details
                            <i class="fas fa-arrow-right ms-1"></i>
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

            <div class="card h-100 border-0 shadow-sm centre-card">

                <div class="centre-image-placeholder"
                     style="background:linear-gradient(135deg,#3B2F24,#80613B);">

                    <div class="text-center text-white">
                        <i class="fas fa-building mb-2"
                           style="font-size:42px;color:#F59E0B;"></i>

                        <div class="fw-bold">Convention Centre</div>
                        <small style="color:#F1E6D6;">Demo listing</small>
                    </div>

                </div>

                <div class="card-body p-3">

                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="fw-bold mb-0 centre-name">
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
                        <span>
                            <i class="fas fa-users me-1"></i>
                            Capacity details on request
                        </span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center pt-3"
                         style="border-top:1px solid #E2E8F0;">

                        <span class="fw-bold"
                              style="font-size:13px;color:#0A0F1D;">
                            Contact for pricing
                        </span>

                        <a href="{{ route('user.center.details') }}"
                           class="btn btn-sm centre-details-btn">
                            View Details
                            <i class="fas fa-arrow-right ms-1"></i>
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

            <div class="card h-100 border-0 shadow-sm centre-card">

                <div class="centre-image-placeholder"
                     style="background:linear-gradient(135deg,#154712,#397343);">

                    <div class="text-center text-white">
                        <i class="fas fa-place-of-worship mb-2"
                           style="font-size:42px;color:#F59E0B;"></i>

                        <div class="fw-bold">Convention Centre</div>
                        <small style="color:#DCEBDD;">Demo listing</small>
                    </div>

                </div>

                <div class="card-body p-3">

                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="fw-bold mb-0 centre-name">
                            Green Valley Event Centre
                        </h5>

                        <span class="badge rounded-pill"
                              style="background:#DCFCE7;color:#166534;">
                            AC/Non-AC
                        </span>
                    </div>

                    <p class="text-muted mb-3" style="font-size:13px;">
                        <i class="fas fa-map-marker-alt me-1"
                           style="color:#F59E0B;"></i>
                        Mangaluru, Karnataka
                    </p>

                    <div class="d-flex align-items-center justify-content-between mb-3"
                         style="font-size:13px;color:#64748B;">
                        <span>
                            <i class="fas fa-users me-1"></i>
                            Suitable for events of different sizes
                        </span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center pt-3"
                         style="border-top:1px solid #E2E8F0;">

                        <span class="fw-bold"
                              style="font-size:12px;color:#64748B;">
                            <i class="fas fa-info-circle me-1"></i>
                            Packages available on enquiry.
                        </span>

                        <a href="{{ route('user.center.details') }}"
                           class="btn btn-sm centre-details-btn">
                            View Details
                            <i class="fas fa-arrow-right ms-1"></i>
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

/* SEARCH BAR */
.centre-search-group {
    height: 46px;
    border-radius: 9px;
    overflow: hidden;
    border: 1px solid #CBD5E1;
    background: #fff;
}

.centre-search-group:focus-within {
    border-color: #F59E0B;
    box-shadow: 0 0 0 2px rgba(245, 158, 11, .12);
}

.search-icon {
    background: #fff !important;
    border: 0 !important;
    color: #94A3B8;
    padding: 0 14px;
}

.centre-search-input {
    height: 44px;
    border: 0 !important;
    box-shadow: none !important;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    min-width: 0;
}

.search-centre-btn {
    background: #0A0F1D !important;
    color: #F59E0B !important;
    border: 0 !important;
    border-radius: 0 !important;
    padding: 0 22px;
    font-size: 13px;
    font-weight: 700;
    white-space: nowrap;
}

.search-centre-btn:hover {
    background: #182541 !important;
    color: #FBBF24 !important;
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

#facilityFilter {
    min-height: 44px;
    background-color: #fff !important;
    color: #0A0F1D !important;
    border: 1px solid #CBD5E1 !important;
    border-radius: 8px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    font-weight: 600;
    box-shadow: none !important;
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

/* LOCATION SUGGESTIONS */
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

/* CENTRE CARDS */
.centre-card {
    border-radius: 14px;
    overflow: hidden;
    transition: transform .2s ease, box-shadow .2s ease;
}

.centre-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(10, 15, 29, .10) !important;
}

.centre-image-placeholder {
    height: 155px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.centre-name {
    font-size: 16px;
    color: #0A0F1D;
}

.centre-details-btn {
    background: #0A0F1D;
    color: #F59E0B;
    border-radius: 7px;
    font-weight: 700;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 12px;
    white-space: nowrap;
}

.centre-details-btn:hover {
    background: #182541;
    color: #FBBF24;
}

/* RESET BUTTON */
.reset-filter-btn {
    min-height: 44px;
    background: #0A0F1D;
    color: #F59E0B !important;
    border: 1px solid #0A0F1D;
    border-radius: 8px;
    font-weight: 700;
}

/* MOBILE */
@media(max-width:575px) {

    .container-fluid {
        padding-left: 14px !important;
        padding-right: 14px !important;
    }

    .centre-search-group {
        height: 44px;
    }

    .centre-search-input {
        font-size: 12px;
        padding-left: 4px;
    }

    .search-icon {
        padding: 0 10px;
    }

    .search-centre-btn {
        padding: 0 12px;
        font-size: 11px;
    }

    .centre-image-placeholder {
        height: 145px;
    }

    .centre-details-btn {
        padding: 6px 9px;
        font-size: 11px;
    }
}

</style>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const centreSearch = document.getElementById('centreSearch');
    const centreItems = document.querySelectorAll('.centre-item');
    const centreCount = document.getElementById('centreCount');
    const noCentres = document.getElementById('noCentres');

    const locationInput = document.getElementById('locationFilter');
    const locationSuggestions = document.getElementById('locationSuggestions');


    // SELECT2 MULTIPLE FACILITIES
    if (window.jQuery && $('#facilityFilter').length) {
        $('#facilityFilter').select2({
            placeholder: 'Select facilities',
            closeOnSelect: false,
            allowClear: true,
            width: '100%'
        });
    }


    // LOCATION AUTOCOMPLETE
    let locationTimer;
    let locationController;

    locationInput.addEventListener('input', function () {

        clearTimeout(locationTimer);

        locationInput.dataset.match = '';

        const query = locationInput.value.trim();

        if (query.length < 2) {
            locationSuggestions.style.display = 'none';
            filterCentres();
            return;
        }

        locationTimer = setTimeout(async function () {

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
                    encodeURIComponent(query),
                    {
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

                locations.forEach(function (place) {

                    const option = document.createElement('div');

                    option.className = 'location-option';
                    option.textContent = place.display_name;

                    option.addEventListener('click', function () {

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
    document.addEventListener('click', function (event) {

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

        const facilities =
            window.jQuery ? ($('#facilityFilter').val() || []) : [];

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

        centreItems.forEach(function (item) {

            const searchMatch =
                item.dataset.search.toLowerCase().includes(search);

            const locationMatch = !location ||
                item.dataset.location.toLowerCase().includes(selectedLocation);

            const centreFacilities =
                item.dataset.facilities.split(',');

            const facilityMatch =
                facilities.every(function (facility) {
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


    // SEARCH INPUT
    centreSearch.addEventListener('input', filterCentres);

    document.getElementById('searchButton')
        .addEventListener('click', filterCentres);

    centreSearch.addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            filterCentres();
        }
    });


    // FILTER EVENTS
    [
        'priceFilter',
        'capacityFilter',
        'packageFilter',
        'fromDate',
        'toDate'
    ].forEach(function (id) {

        const element = document.getElementById(id);

        if (element) {
            element.addEventListener('change', filterCentres);
        }

    });

    if (window.jQuery) {
        $('#facilityFilter').on('change', filterCentres);
    }


    // RESET FILTERS
    document.getElementById('resetFilters')
        .addEventListener('click', function () {

            centreSearch.value = '';

            locationInput.value = '';
            locationInput.dataset.match = '';

            document.getElementById('priceFilter').value = '';
            document.getElementById('capacityFilter').value = '';
            document.getElementById('packageFilter').value = '';

            document.getElementById('fromDate').value = '';
            document.getElementById('toDate').value = '';

            if (window.jQuery) {
                $('#facilityFilter').val(null).trigger('change');
            }

            locationSuggestions.style.display = 'none';

            filterCentres();

        });


    // FILTER PANEL OPEN / CLOSE
    const toggleFilters = document.getElementById('toggleFilters');
    const filterPanel = document.getElementById('filterPanel');
    const filterArrow = document.getElementById('filterArrow');

    toggleFilters.addEventListener('click', function () {

        const isOpen = filterPanel.style.display !== 'none';

        filterPanel.style.display = isOpen ? 'none' : 'block';

        toggleFilters.setAttribute('aria-expanded', String(!isOpen));

        filterArrow.classList.toggle('fa-chevron-down', isOpen);
        filterArrow.classList.toggle('fa-chevron-up', !isOpen);

    });


    // INITIAL FILTER
    filterCentres();

});
</script>

@endsection
