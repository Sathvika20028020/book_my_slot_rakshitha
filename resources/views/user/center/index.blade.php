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
                            placeholder="Search by centre name or location..."
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


    <!-- FILTERS -->
    <div class="card border-0 shadow-sm mb-4" style="border-radius:14px;">
        <div class="card-body p-3">
            <div class="row g-2 align-items-center">

                <div class="col-6 col-md-2">
                    <select id="acFilter" class="form-select">
                        <option value="">AC / Non-AC</option>
                        <option value="ac">AC</option>
                        <option value="non-ac">Non-AC</option>
                    </select>
                </div>

                <div class="col-6 col-md-2">
                    <select id="facilityFilter" class="form-select">
                        <option value="">All Facilities</option>
                        <option value="parking">Parking</option>
                        <option value="kitchen">Kitchen</option>
                        <option value="dining">Dining</option>
                        <option value="generator">Generator</option>
                        <option value="wifi">Wi-Fi</option>
                    </select>
                </div>

                <div class="col-6 col-md-2">
                    <select id="priceFilter" class="form-select">
                        <option value="">Any Price</option>
                        <option value="0-25000">Below ₹25,000</option>
                        <option value="25000-50000">₹25,000–₹50,000</option>
                        <option value="50000-75000">₹50,000–₹75,000</option>
                        <option value="75000-999999999">Above ₹75,000</option>
                    </select>
                </div>

                <div class="col-6 col-md-2">
                    <select id="packageFilter" class="form-select">
                        <option value="">All Packages</option>
                        <option value="wedding">Wedding</option>
                        <option value="birthday">Birthday</option>
                        <option value="conference">Conference</option>
                    </select>
                </div>

                <div class="col-6 col-md-2">
                    <select id="availabilityFilter" class="form-select">
                        <option value="">Any Availability</option>
                        <option value="available">Available</option>
                        <option value="booked">Booked</option>
                    </select>
                </div>

                <div class="col-6 col-md-2">
                    <button type="button" id="resetFilters"
                        class="btn w-100"
                        style="min-height:44px;background:#0A0F1D;color:#F59E0B !important;
    border:1px solid #0A0F1D;border-radius:8px;font-weight:700;">
                        <i class="fas fa-undo me-1"></i> Reset
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
            data-ac="ac"
            data-facilities="parking,kitchen,dining,generator"
            data-price="50000"
            data-package="wedding,birthday"
            data-availability="available">

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
                            style="background:#FEF3C7;color:#92400E;">
                            Demo
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
            data-ac="non-ac"
            data-facilities="parking,dining,wifi"
            data-price="35000"
            data-package="birthday,conference"
            data-availability="booked">

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
                            style="background:#FEF3C7;color:#92400E;">
                            Demo
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

        <!-- CENTRE 3 -->
        <div class="col-md-6 col-xl-4 centre-item"
            data-search="green valley event centre mangaluru"
            data-ac="ac"
            data-facilities="parking,kitchen,generator,wifi"
            data-price="65000"
            data-package="wedding,conference"
            data-availability="available">

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
                            style="background:#FEF3C7;color:#92400E;">
                            Demo
                        </span>
                    </div>

                    <p class="text-muted mb-3" style="font-size:13px;">
                        <i class="fas fa-map-marker-alt me-1"
                            style="color:#F59E0B;"></i>
                        Mangaluru, Karnataka
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
</style>

<script>
    const centreSearch = document.getElementById('centreSearch');
    const centreItems = document.querySelectorAll('.centre-item');
    const centreCount = document.getElementById('centreCount');
    const noCentres = document.getElementById('noCentres');

    function filterCentres() {
        const search = centreSearch.value.toLowerCase().trim();
        const ac = document.getElementById('acFilter').value;
        const facility = document.getElementById('facilityFilter').value;
        const price = document.getElementById('priceFilter').value;
        const packageType = document.getElementById('packageFilter').value;
        const availability = document.getElementById('availabilityFilter').value;

        let visibleCount = 0;

        centreItems.forEach(item => {
            const searchMatch = item.dataset.search.toLowerCase().includes(search);
            const acMatch = !ac || item.dataset.ac === ac;
            const facilityMatch = !facility || item.dataset.facilities.split(',').includes(facility);
            const priceMatch = !price || (
                Number(item.dataset.price) >= Number(price.split('-')[0]) &&
                Number(item.dataset.price) <= Number(price.split('-')[1])
            );
            const packageMatch = !packageType || item.dataset.package.split(',').includes(packageType);
            const availabilityMatch = !availability || item.dataset.availability === availability;

            const show = searchMatch && acMatch && facilityMatch &&
                priceMatch && packageMatch && availabilityMatch;

            item.style.display = show ? '' : 'none';

            if (show) visibleCount++;
        });

        centreCount.textContent = visibleCount + ' centres';
        noCentres.style.display = visibleCount === 0 ? 'block' : 'none';
    }

    centreSearch.addEventListener('input', filterCentres);

    document.getElementById('searchButton').addEventListener('click', filterCentres);

    ['acFilter', 'facilityFilter', 'priceFilter', 'packageFilter', 'availabilityFilter']
    .forEach(id => document.getElementById(id).addEventListener('change', filterCentres));

    document.getElementById('resetFilters').addEventListener('click', function() {
        centreSearch.value = '';

        ['acFilter', 'facilityFilter', 'priceFilter', 'packageFilter', 'availabilityFilter']
        .forEach(id => document.getElementById(id).value = '');

        filterCentres();
    });
</script>
@endsection