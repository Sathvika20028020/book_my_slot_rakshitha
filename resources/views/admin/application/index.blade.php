@extends('admin.layout.admin.app')

@section('title') User Applications &amp; Registrations @endsection

@section('style')
<style>
    .card-header-flex {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
    }
    .table-responsive {
        border-radius: 12px;
        overflow: hidden;
    }
    .badge-soft-success {
        background-color: #d1fae5;
        color: #065f46;
        border: 1px solid #a7f3d0;
    }
    .badge-soft-warning {
        background-color: #fef3c7;
        color: #92400e;
        border: 1px solid #fde68a;
    }
    .badge-soft-primary {
        background-color: #e0e7ff;
        color: #3730a3;
        border: 1px solid #c7d2fe;
    }
    .app-avatar {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        background: linear-gradient(135deg, #4F46E5 0%, #6366F1 100%);
        color: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.95rem;
    }
    .action-btn-group .btn {
        padding: 5px 10px;
        font-size: 0.82rem;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Header / Breadcrumb -->
    <div class="page-title py-3">
        <div class="row align-items-center">
            <div class="col-12 col-sm-6">
                <h4 class="fw-bold mb-1 text-dark">
                    <i class="bi bi-file-earmark-person-fill text-warning me-2"></i>Applications &amp; Registrations
                </h4>
                
            </div>
            <div class="col-12 col-sm-6 text-sm-end mt-2 mt-sm-0">
                <ol class="breadcrumb justify-content-sm-end mb-0 bg-transparent p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Applications</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

    <!-- Main Applications Table Card -->
    <div class="card">
        <div class="card-body ">
            <div class="table-responsive">
                <table class="table table-bordered table-striped  text-center align-middle" id="data-source-1"
                            style="width:100%">
                    <thead class="table-light text-muted small text-uppercase">
                        <tr>
                            <th class="ps-4">App ID</th>
                            <th>Applicant Name</th>
                            <th>Mobile </th>
                            <th>Email Address</th>
                            <th>City</th>
                           
                            <th>Registered Date</th>
                            <th>Status</th>
                            <th class="text-center pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody >
                        <!-- Application Row 1 -->
                        <tr class="app-row" data-name="Ramesh Varma" data-mobile="9876543210" data-email="ramesh.varma@gmail.com" data-city="Hyderabad">
                            <td class="ps-4 fw-bold text-primary">#BMS-101</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                   
                                    <div>
                                        <div class="fw-bold text-dark">Ramesh Varma</div>
                                        <small class="text-muted">Customer / Organizer</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="fw-semibold text-dark"><i class="bi bi-phone text-muted me-1"></i>+91 9876543210</span>
                            </td>
                            <td>
                                <span class="text-muted">ramesh.varma@gmail.com</span>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border px-2 py-1"><i class="bi bi-geo-alt-fill text-danger me-1"></i>Hyderabad</span>
                            </td>
                           
                           
                            <td class="text-muted">
                                28 Oct 2026, 04:30 PM
                            </td>
                            <td>
                                <span class="badge badge-soft-success px-2.5 py-1.5 rounded-pill fw-semibold">Approved</span>
                            </td>
                            <td class="text-center pe-4">
                                <div class="btn-group action-btn-group">
                                    <button class="btn btn-primary" title="View Details" onclick="viewDetails('Ramesh Varma', '9876543210', 'ramesh.varma@gmail.com', 'Hyderabad', '28 Oct 2026, 04:30 PM', 'Approved')">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button class="btn btn-success" title="Approve" onclick="approveUser('Ramesh Varma')">
                                        <i class="bi bi-check-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                       

                       

                       
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<!-- Modal for Viewing Applicant Details -->
<div class="modal fade" id="applicantDetailsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header bg-dark text-white p-4">
                <div class="d-flex align-items-center gap-2">
                    <div style="width: 36px; height: 36px; border-radius: 8px; background: #F59E0B; display: flex; align-items: center; justify-content: center; color: #0A0F1D; font-weight: bold;">
                        <i class="bi bi-person-lines-fill"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0" id="modalApplicantName">Applicant Details</h5>
                        <small class="text-white-50">Registered Profile Overview</small>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 bg-light">
                <div class="p-3 bg-white rounded-3 border mb-3">
                    <div class="row g-3 small">
                        <div class="col-6">
                            <span class="text-muted d-block">Full Name</span>
                            <strong class="text-dark fs-6" id="modalNameText">-</strong>
                        </div>
                        <div class="col-6">
                            <span class="text-muted d-block">Mobile Number (10 Digits)</span>
                            <strong class="text-dark fs-6" id="modalMobileText">-</strong>
                        </div>
                        <div class="col-12">
                            <span class="text-muted d-block">Email Address</span>
                            <strong class="text-dark" id="modalEmailText">-</strong>
                        </div>
                        <div class="col-6">
                            <span class="text-muted d-block">City Location</span>
                            <strong class="text-dark" id="modalCityText">-</strong>
                        </div>
                        <div class="col-6">
                            <span class="text-muted d-block">Application Status</span>
                            <span class="badge bg-success" id="modalStatusBadge">Approved</span>
                        </div>
                        <div class="col-12">
                            <span class="text-muted d-block">Registered At</span>
                            <span class="text-dark" id="modalDateText">-</span>
                        </div>
                        <div class="col-12">
                            <span class="text-muted d-block">Terms &amp; Security</span>
                            <span class="text-success"><i class="bi bi-shield-check me-1"></i> Terms Accepted • Password Bcrypt Hashed</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light p-3 border-top">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm" onclick="alert('Application verified & notification email sent!');" data-bs-dismiss="modal">
                    <i class="bi bi-envelope-check me-1"></i> Send Confirmation
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    // Live Search Filter
    const searchInput = document.getElementById('searchTableInput');
    const citySelect = document.getElementById('cityFilterSelect');
    const rows = document.querySelectorAll('.app-row');

    function filterRows() {
        const query = searchInput.value.toLowerCase().trim();
        const city = citySelect.value.toLowerCase().trim();

        rows.forEach(row => {
            const name = row.getAttribute('data-name').toLowerCase();
            const mobile = row.getAttribute('data-mobile').toLowerCase();
            const email = row.getAttribute('data-email').toLowerCase();
            const rowCity = row.getAttribute('data-city').toLowerCase();

            const matchesQuery = !query || name.includes(query) || mobile.includes(query) || email.includes(query);
            const matchesCity = !city || rowCity === city;

            if (matchesQuery && matchesCity) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    if (searchInput) searchInput.addEventListener('input', filterRows);
    if (citySelect) citySelect.addEventListener('change', filterRows);

    // View Details Modal
    function viewDetails(name, mobile, email, city, date, status) {
        document.getElementById('modalApplicantName').textContent = name;
        document.getElementById('modalNameText').textContent = name;
        document.getElementById('modalMobileText').textContent = '+91 ' + mobile;
        document.getElementById('modalEmailText').textContent = email;
        document.getElementById('modalCityText').textContent = city;
        document.getElementById('modalDateText').textContent = date;
        document.getElementById('modalStatusBadge').textContent = status;

        const modal = new bootstrap.Modal(document.getElementById('applicantDetailsModal'));
        modal.show();
    }

    // Approve user action
    function approveUser(name) {
        alert('Application for ' + name + ' is approved! Status updated.');
    }
</script>
@endsection
