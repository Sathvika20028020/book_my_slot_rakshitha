
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
             data-search="grand palace convention hall bengaluru">

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
             data-search="sunrise convention centre mysuru">

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
             data-search="green valley event centre mangaluru">

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
        box-shadow: 0 10px 25px rgba(10,15,29,.10) !important;
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
</style>

<script>
    const centreSearch = document.getElementById('centreSearch');
    const centreItems = document.querySelectorAll('.centre-item');
    const centreCount = document.getElementById('centreCount');
    const noCentres = document.getElementById('noCentres');

    function filterCentres() {
        const searchValue = centreSearch.value.toLowerCase().trim();
        let visibleCount = 0;

        centreItems.forEach(function (item) {
            const searchText = item.dataset.search.toLowerCase();
            const isVisible = searchText.includes(searchValue);

            item.style.display = isVisible ? '' : 'none';

            if (isVisible) visibleCount++;
        });

        centreCount.textContent = visibleCount + ' centres';
        noCentres.style.display = visibleCount === 0 ? 'block' : 'none';
    }

    centreSearch.addEventListener('input', filterCentres);

    document.getElementById('searchButton').addEventListener('click', filterCentres);

    function showDetailsMessage() {
        alert('The Convention Centre Details page will be connected next.');
    }
</script>

@endsection
