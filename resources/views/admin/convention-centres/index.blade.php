@extends('admin.layout.admin.app')

@section('title') Conventional Centre Masters @endsection

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
.kpi-card {
    border-radius: 14px;
    transition: all 0.2s ease;
    border: 1px solid rgba(0, 0, 0, 0.06);
}

.kpi-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.06);
}

.kpi-icon {
    width: 46px;
    height: 46px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.35rem;
}

.badge-soft-success {
    background-color: #d1fae5;
    color: #065f46;
    border: 1px solid #a7f3d0;
}

.badge-soft-danger {
    background-color: #fee2e2;
    color: #991b1b;
    border: 1px solid #fecaca;
}

.badge-soft-primary {
    background-color: #e0e7ff;
    color: #3730a3;
    border: 1px solid #c7d2fe;
}

.badge-soft-warning {
    background-color: #fef3c7;
    color: #92400e;
    border: 1px solid #fde68a;
}

.badge-soft-info {
    background-color: #e0f2fe;
    color: #0369a1;
    border: 1px solid #bae6fd;
}

.centre-thumb {
    width: 60px;
    height: 52px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid #e2e8f0;
}

.action-btn {
    width: 32px;
    height: 32px;
    padding: 0;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    font-size: 0.85rem;
}

.table> :not(caption)>*>* {
    padding: 0.85rem 0.75rem;
    vertical-align: middle;
}

.status-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    display: inline-block;
    margin-right: 6px;
}
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Breadcrumb & Top Bar -->
    <div class="page-title py-3">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <h4 class="fw-bold mb-1 text-dark d-flex align-items-center gap-2">

                    Conventional Centre Masters
                </h4>

            </div>
            <div
                class="col-12 col-md-6 text-md-end mt-2 mt-md-0 d-flex align-items-center justify-content-md-end gap-2">
                <ol class="breadcrumb justify-content-md-end mb-0 bg-transparent p-0 me-3 d-none d-lg-flex">
                    <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Centre Masters</li>
                </ol>

            </div>
        </div>
    </div>
</div>

<div class="container-fluid">


    <!-- Filters & Search Toolbar -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body p-3">
            <form class="row g-2 align-items-center" onsubmit="return false;">
                <div class="col-12 col-md-4">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 text-muted"><i
                                class="bi bi-search"></i></span>
                        <input type="text" class="form-control border-start-0 ps-0"
                            placeholder="Search by Centre ID, Name, Ward, Zone...">
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <select name="type" class="form-select">
                        <option value="">-- All Centre Types --</option>
                        <option value="Community Hall">Community Hall</option>
                        <option value="Convention Hall">Convention Hall</option>
                        <option value="Kalyana Mantapa / Marriage Hall">Kalyana Mantapa / Marriage Hall</option>
                        <option value="Auditorium">Auditorium</option>
                        <option value="Function Hall">Function Hall</option>
                        <option value="Banquet Hall">Banquet Hall</option>
                        <option value="Multipurpose Hall">Multipurpose Hall</option>
                        <option value="Meeting / Conference Hall">Meeting / Conference Hall</option>
                        <option value="Cultural Centre">Cultural Centre</option>
                        <option value="Sports / Recreation Centre">Sports / Recreation Centre</option>
                    </select>
                </div>

                <div class="col-6 col-md-2">
                    <select name="status" class="form-select">
                        <option value="">-- Status (All) --</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <div class="col-12 col-md-3 d-flex gap-2">
                    <button type="button"
                        class="btn btn-primary flex-grow-1 d-inline-flex align-items-center justify-content-center gap-1">
                        <i class="bi bi-funnel"></i> Filter
                    </button>
                    <button type="reset" class="btn btn-outline-secondary" title="Reset Filters">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </button>

                </div>
            </form>
        </div>
    </div>

   

    <!-- Master Convention Centres Table Card -->
    <div class="card ">


        <div class="card-body ">
            <div class="d-flex align-items-center justify-content-between p-3  ">
                <h6 class="mb-0 fw-bold text-dark">Convention Centre Masters</h6>
                <a href="/admin/convention-centres/create"
                    class="btn btn-sm btn-primary d-inline-flex align-items-center gap-1">
                    <i class="bi bi-plus-circle"></i> Create New Centre
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped  text-center align-middle" id="data-source-1"
                    style="width:100%">
                    <thead class="table-light text-uppercase small text-muted"
                        style="font-size: 0.76rem; letter-spacing: 0.5px;">
                        <tr>
                            <th class="ps-3" style="width: 110px;">Centre ID</th>
                            <th style="min-width: 250px;">Centre Name &amp; Photo</th>
                            <th style="min-width: 170px;">Centre Type</th>
                            <th style="min-width: 200px;">Location Details</th>
                            <th style="min-width: 180px;">In-Charge Contact</th>
                            <th style="min-width: 150px;">Facilities</th>
                            <th style="min-width: 140px;">Tariff &amp; Charges</th>
                            <th style="min-width: 110px;">Status</th>
                            <th class="text-end pe-3" style="width: 120px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="ps-3"><a href="/admin/convention-centres/show"
                                    class="badge bg-dark text-decoration-none fw-bold text-white px-2 py-1 font-monospace">CC-2026-001</a>
                                <div class="text-muted small mt-1">15 Jan 2026</div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2"><img
                                        src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&amp;fit=crop&amp;w=400&amp;q=80"
                                        alt="Sri Krishna Grand Convention Centre" class="centre-thumb shadow-xs">
                                    <div><a href="/admin/convention-centres/show"
                                            class="fw-bold text-dark text-decoration-none d-block mb-1">Sri Krishna
                                            Grand Convention Centre &amp; Kalyana Mantapa</a><small
                                            class="text-muted"><i class="bi bi-geo-alt text-danger me-1"></i>#45/2, 14th
                                            Main Road, HSR Layout</small></div>
                                </div>
                            </td>
                            <td><span class="badge badge-soft-warning px-2 py-1 rounded-pill">Kalyana Mantapa / Marriage
                                    Hall</span></td>
                            <td>
                                <div class="fw-medium text-dark">South Zone</div>
                                <div class="text-muted small">Ward 174 - HSR Layout</div>
                                <div class="text-secondary font-monospace small">PIN: 560102</div>
                            </td>
                            <td>
                                <div class="fw-semibold text-dark">Rajeshwar Hegde</div>
                                <div class="text-muted small"><i class="bi bi-telephone text-success me-1"></i>+91 98450
                                    12345</div>
                                <div class="text-muted small">rajesh.hegde@bbmp.gov.in</div>
                            </td>
                            <td><span class="badge bg-light text-dark border">4 Facilities</span>
                                <div class="text-muted small mt-1">Max 1,500 Pax</div>
                            </td>
                            <td>
                                <div class="fw-bold text-dark">₹75,000 <span
                                        class="text-muted fw-normal small">/day</span></div>
                                <div class="text-muted small">Dep: ₹25,000 | GST 18%</div>
                            </td>
                            <td><span class="badge badge-soft-success rounded-pill"><span
                                        class="status-dot bg-success"></span>Active</span></td>
                            <td class="text-end pe-3">
                                <div class="d-inline-flex gap-1"><a href="/admin/convention-centres/show"
                                        class="btn btn-info action-btn" title="View"><i class="bi bi-eye"></i></a><a
                                        href="/admin/convention-centres/edit" class="btn btn-sm btn-primary action-btn"
                                        title="Edit"><i class="bi bi-pencil"></i></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-3"><a href="/admin/convention-centres/show"
                                    class="badge bg-dark text-decoration-none fw-bold text-white px-2 py-1 font-monospace">CC-2026-002</a>
                                <div class="text-muted small mt-1">10 Feb 2026</div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2"><img
                                        src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&amp;fit=crop&amp;w=400&amp;q=80"
                                        alt="Dr. B.R. Ambedkar Memorial Cultural Centre" class="centre-thumb shadow-xs">
                                    <div><a href="/admin/convention-centres/show"
                                            class="fw-bold text-dark text-decoration-none d-block mb-1">Dr. B.R.
                                            Ambedkar Memorial Cultural Centre &amp; Auditorium</a><small
                                            class="text-muted"><i class="bi bi-geo-alt text-danger me-1"></i>Plot 12,
                                            Miller Tank Bund Road, Vasanth Nagar</small></div>
                                </div>
                            </td>
                            <td><span class="badge badge-soft-primary px-2 py-1 rounded-pill">Auditorium</span></td>
                            <td>
                                <div class="fw-medium text-dark">East Zone</div>
                                <div class="text-muted small">Ward 93 - Vasanth Nagar</div>
                                <div class="text-secondary font-monospace small">PIN: 560052</div>
                            </td>
                            <td>
                                <div class="fw-semibold text-dark">P. Ramesh Babu</div>
                                <div class="text-muted small"><i class="bi bi-telephone text-success me-1"></i>+91 94480
                                    87654</div>
                                <div class="text-muted small">ramesh.babu@bbmp.gov.in</div>
                            </td>
                            <td><span class="badge bg-light text-dark border">3 Facilities</span>
                                <div class="text-muted small mt-1">Max 1,200 Pax</div>
                            </td>
                            <td>
                                <div class="fw-bold text-dark">₹45,000 <span
                                        class="text-muted fw-normal small">/day</span></div>
                                <div class="text-muted small">Dep: ₹15,000 | GST 18%</div>
                            </td>
                            <td><span class="badge badge-soft-success rounded-pill"><span
                                        class="status-dot bg-success"></span>Active</span></td>
                            <td class="text-end pe-3">
                                <div class="d-inline-flex gap-1"><a href="/admin/convention-centres/show"
                                        class="btn btn-sm btn-info action-btn" title="View"><i
                                            class="bi bi-eye"></i></a><a href="/admin/convention-centres/edit"
                                        class="btn btn-sm btn-primary action-btn" title="Edit"><i
                                            class="bi bi-pencil"></i></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-3"><a href="/admin/convention-centres/show"
                                    class="badge bg-dark text-decoration-none fw-bold text-white px-2 py-1 font-monospace">CC-2026-003</a>
                                <div class="text-muted small mt-1">01 Mar 2026</div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2"><img
                                        src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?auto=format&amp;fit=crop&amp;w=400&amp;q=80"
                                        alt="Kuvempu Samudaya Bhavana" class="centre-thumb shadow-xs">
                                    <div><a href="/admin/convention-centres/show"
                                            class="fw-bold text-dark text-decoration-none d-block mb-1">Kuvempu Samudaya
                                            Bhavana (Community Hall)</a><small class="text-muted"><i
                                                class="bi bi-geo-alt text-danger me-1"></i>Near BDA Complex, 3rd Block,
                                            Koramangala</small></div>
                                </div>
                            </td>
                            <td><span class="badge badge-soft-success px-2 py-1 rounded-pill">Community Hall</span></td>
                            <td>
                                <div class="fw-medium text-dark">South Zone</div>
                                <div class="text-muted small">Ward 151 - Koramangala</div>
                                <div class="text-secondary font-monospace small">PIN: 560034</div>
                            </td>
                            <td>
                                <div class="fw-semibold text-dark">Smt. Shailaja M.</div>
                                <div class="text-muted small"><i class="bi bi-telephone text-success me-1"></i>+91 97312
                                    44332</div>
                                <div class="text-muted small">shailaja.m@bbmp.gov.in</div>
                            </td>
                            <td><span class="badge bg-light text-dark border">2 Facilities</span>
                                <div class="text-muted small mt-1">Max 700 Pax</div>
                            </td>
                            <td>
                                <div class="fw-bold text-dark">₹20,000 <span
                                        class="text-muted fw-normal small">/day</span></div>
                                <div class="text-muted small">Dep: ₹10,000 | GST 12%</div>
                            </td>
                            <td><span class="badge badge-soft-success rounded-pill"><span
                                        class="status-dot bg-success"></span>Active</span></td>
                            <td class="text-end pe-3">
                                <div class="d-inline-flex gap-1"><a href="/admin/convention-centres/show"
                                        class="btn btn-sm btn-info action-btn" title="View"><i
                                            class="bi bi-eye"></i></a><a href="/admin/convention-centres/edit"
                                        class="btn btn-sm btn-primary action-btn" title="Edit"><i
                                            class="bi bi-pencil"></i></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-3"><a href="/admin/convention-centres/show"
                                    class="badge bg-dark text-decoration-none fw-bold text-white px-2 py-1 font-monospace">CC-2026-004</a>
                                <div class="text-muted small mt-1">12 Mar 2026</div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2"><img
                                        src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?auto=format&amp;fit=crop&amp;w=400&amp;q=80"
                                        alt="Mahatma Gandhi Civic Convention Hall" class="centre-thumb shadow-xs">
                                    <div><a href="/admin/convention-centres/show"
                                            class="fw-bold text-dark text-decoration-none d-block mb-1">Mahatma Gandhi
                                            Civic Convention Hall</a><small class="text-muted"><i
                                                class="bi bi-geo-alt text-danger me-1"></i>8th Cross, Malleshwaram
                                            West</small></div>
                                </div>
                            </td>
                            <td><span class="badge badge-soft-info px-2 py-1 rounded-pill">Convention Hall</span></td>
                            <td>
                                <div class="fw-medium text-dark">West Zone</div>
                                <div class="text-muted small">Ward 65 - Malleshwaram</div>
                                <div class="text-secondary font-monospace small">PIN: 560003</div>
                            </td>
                            <td>
                                <div class="fw-semibold text-dark">G. Manjunath</div>
                                <div class="text-muted small"><i class="bi bi-telephone text-success me-1"></i>+91 99001
                                    55443</div>
                                <div class="text-muted small">manjunath.g@bbmp.gov.in</div>
                            </td>
                            <td><span class="badge bg-light text-dark border">1 Facility</span>
                                <div class="text-muted small mt-1">Max 900 Pax</div>
                            </td>
                            <td>
                                <div class="fw-bold text-dark">₹50,000 <span
                                        class="text-muted fw-normal small">/day</span></div>
                                <div class="text-muted small">Dep: ₹20,000 | GST 18%</div>
                            </td>
                            <td><span class="badge badge-soft-danger rounded-pill"><span
                                        class="status-dot bg-danger"></span>Inactive</span></td>
                            <td class="text-end pe-3">
                                <div class="d-inline-flex gap-1"><a href="/admin/convention-centres/show"
                                        class="btn btn-sm btn-info action-btn" title="View"><i
                                            class="bi bi-eye"></i></a><a href="/admin/convention-centres/edit"
                                        class="btn btn-sm btn-primary action-btn" title="Edit"><i
                                            class="bi bi-pencil"></i></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-3"><a href="/admin/convention-centres/show"
                                    class="badge bg-dark text-decoration-none fw-bold text-white px-2 py-1 font-monospace">CC-2026-005</a>
                                <div class="text-muted small mt-1">25 Mar 2026</div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2"><img
                                        src="https://images.unsplash.com/photo-1527529482837-4698179dc6ce?auto=format&amp;fit=crop&amp;w=400&amp;q=80"
                                        alt="Sir M. Visvesvaraya Conference and Banquet Complex"
                                        class="centre-thumb shadow-xs">
                                    <div><a href="/admin/convention-centres/show"
                                            class="fw-bold text-dark text-decoration-none d-block mb-1">Sir M.
                                            Visvesvaraya Conference &amp; Banquet Complex</a><small
                                            class="text-muted"><i class="bi bi-geo-alt text-danger me-1"></i>Subhash
                                            Nagar, Opposite Metro Station, Majestic</small></div>
                                </div>
                            </td>
                            <td><span class="badge badge-soft-primary px-2 py-1 rounded-pill">Banquet Hall</span></td>
                            <td>
                                <div class="fw-medium text-dark">Central Zone</div>
                                <div class="text-muted small">Ward 109 - Chickpete</div>
                                <div class="text-secondary font-monospace small">PIN: 560009</div>
                            </td>
                            <td>
                                <div class="fw-semibold text-dark">Venkatappa K.</div>
                                <div class="text-muted small"><i class="bi bi-telephone text-success me-1"></i>+91 98801
                                    88776</div>
                                <div class="text-muted small">venkatappa.k@bbmp.gov.in</div>
                            </td>
                            <td><span class="badge bg-light text-dark border">3 Facilities</span>
                                <div class="text-muted small mt-1">Max 1,250 Pax</div>
                            </td>
                            <td>
                                <div class="fw-bold text-dark">₹60,000 <span
                                        class="text-muted fw-normal small">/day</span></div>
                                <div class="text-muted small">Dep: ₹20,000 | GST 18%</div>
                            </td>
                            <td><span class="badge badge-soft-success rounded-pill"><span
                                        class="status-dot bg-success"></span>Active</span></td>
                            <td class="text-end pe-3">
                                <div class="d-inline-flex gap-1"><a href="/admin/convention-centres/show"
                                        class="btn btn-sm btn-info action-btn" title="View"><i
                                            class="bi bi-eye"></i></a><a href="/admin/convention-centres/edit"
                                        class="btn btn-sm btn-primary action-btn" title="Edit"><i
                                            class="bi bi-pencil"></i></a></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        
    </div>
</div>
<script>
    const savedOwnerVenueProfile = localStorage.getItem('bookMySlotsOwnerProfile');

    if (savedOwnerVenueProfile) {
        const ownerVenueProfile = JSON.parse(savedOwnerVenueProfile);
        document.getElementById('adminOwnerVenueName').textContent = ownerVenueProfile.name;
        document.getElementById('adminOwnerVenueLocation').textContent = `${ownerVenueProfile.area}, ${ownerVenueProfile.city}`;
        document.getElementById('adminOwnerVenueCapacity').textContent = `${Number(ownerVenueProfile.capacity).toLocaleString()} guests`;
        document.getElementById('adminOwnerVenuePhone').textContent = `+91 ${ownerVenueProfile.phone}`;
        document.getElementById('adminOwnerVenueEmail').textContent = ownerVenueProfile.email;
    }
</script>
@endsection
