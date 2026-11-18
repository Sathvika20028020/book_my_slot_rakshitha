
@extends('conventions.layouts.app')

@section('title')
    Conventional Centre Masters
@endsection

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

.table > :not(caption) > * > * {
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

    {{-- Breadcrumb & Top Bar --}}
    <div class="page-title py-3">
        <div class="row align-items-center">

            <div class="col-12 col-md-6">
                <h4 class="fw-bold mb-1 text-dark d-flex align-items-center gap-2">
                    Conventional Centre Masters
                </h4>
            </div>

            <div class="col-12 col-md-6 text-md-end mt-2 mt-md-0">
                <ol class="breadcrumb justify-content-md-end mb-0 bg-transparent p-0 me-3 d-none d-lg-flex">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <i class="fa fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        Centre Masters
                    </li>
                </ol>
            </div>

        </div>
    </div>

</div>

<div class="container-fluid">

    {{-- Success / Error Messages --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle me-1"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Filters & Search Toolbar --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body p-3">

            <form method="GET"
                  action="{{ route('conventions.venue-lists.index') }}"
                  class="row g-2 align-items-center">

                <div class="col-12 col-md-4">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 text-muted">
                            <i class="bi bi-search"></i>
                        </span>

                        <input type="text"
                               name="search"
                               class="form-control border-start-0 ps-0"
                               placeholder="Search by Centre ID, Name, Address..."
                               value="{{ request('search') }}">
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <select name="type" class="form-select">
                        <option value="">-- All Centre Types --</option>

                        @php
                            $centreTypes = [
                                'Community Hall',
                                'Convention Hall',
                                'Kalyana Mantapa / Marriage Hall',
                                'Auditorium',
                                'Function Hall',
                                'Banquet Hall',
                                'Multipurpose Hall',
                                'Meeting / Conference Hall',
                                'Cultural Centre',
                                'Sports / Recreation Centre',
                            ];
                        @endphp

                        @foreach($centreTypes as $type)
                            <option value="{{ $type }}"
                                {{ request('type') == $type ? 'selected' : '' }}>
                                {{ $type }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-6 col-md-2">
                    <select name="status" class="form-select">
                        <option value="">-- Status (All) --</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>
                            Active
                        </option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>
                </div>

                <div class="col-12 col-md-3 d-flex gap-2">

                    <button type="submit"
                            class="btn btn-primary flex-grow-1 d-inline-flex align-items-center justify-content-center gap-1">
                        <i class="bi bi-funnel"></i>
                        Filter
                    </button>

                    <a href="{{ route('conventions.venue-lists.index') }}"
                       class="btn btn-outline-secondary"
                       title="Reset Filters">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </a>

                </div>

            </form>

        </div>
    </div>

    {{-- Master Convention Centres Table --}}
    <div class="card">

        <div class="card-body">

            <div class="d-flex align-items-center justify-content-between p-3">

                <div>
                    <h6 class="mb-0 fw-bold text-dark">
                        Convention Centre Masters
                    </h6>

                    <small class="text-muted">
                        Total centres: {{ $conventions->total() }}
                    </small>
                </div>

                <a href="{{ route('conventions.venue-lists.create') }}"
                   class="btn btn-sm btn-primary d-inline-flex align-items-center gap-1">
                    <i class="bi bi-plus-circle"></i>
                    Create New Centre
                </a>

            </div>

            <div class="table-responsive">

                <table class="table table-bordered table-striped text-center align-middle"
                       id="data-source-1"
                       style="width:100%">

                    <thead class="table-light text-uppercase small text-muted"
                           style="font-size: 0.76rem; letter-spacing: 0.5px;">

                        <tr>
                            <th class="ps-3" style="width: 130px;">Centre ID</th>
                            <th style="min-width: 250px;">Centre Name &amp; Photo</th>
                            <th style="min-width: 120px;">Total Halls</th>
                            <th style="min-width: 170px;">Centre Type</th>
                            <th style="min-width: 180px;">In-Charge Contact</th>
                            <th style="min-width: 110px;">Status</th>
                            <th class="text-end pe-3" style="width: 120px;">Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($conventions as $convention)

                            @php
                                $status = strtolower($convention->status ?? '');
                                $isActive = $status === 'active';

                                $imagePath = $convention->convention_image
                                    ? asset($convention->convention_image)
                                    : null;

                                $typeClass = match($convention->centre_type) {
                                    'Community Hall' => 'badge-soft-success',
                                    'Convention Hall' => 'badge-soft-info',
                                    'Auditorium' => 'badge-soft-primary',
                                    'Kalyana Mantapa / Marriage Hall' => 'badge-soft-warning',
                                    'Banquet Hall' => 'badge-soft-primary',
                                    default => 'badge-soft-info',
                                };
                            @endphp

                            <tr>

                                {{-- Centre ID --}}
                                <td class="ps-3">

                                    <span class="badge bg-dark text-white px-2 py-1 font-monospace">
                                        {{ $convention->venue_id ?? 'CC-' . str_pad($convention->id, 4, '0', STR_PAD_LEFT) }}
                                    </span>

                                    <div class="text-muted small mt-1">
                                        {{ $convention->created_at
                                            ? \Carbon\Carbon::parse($convention->created_at)->format('d M Y')
                                            : '-' }}
                                    </div>

                                </td>

                                {{-- Centre Name & Photo --}}
                                <td class="text-start">

                                    <div class="d-flex align-items-center gap-2">

                                        @if($imagePath)
                                            <img src="{{ $imagePath }}"
                                                 alt="{{ $convention->convention_name }}"
                                                 class="centre-thumb shadow-xs">
                                        @else
                                            <div class="centre-thumb bg-light d-flex align-items-center justify-content-center">
                                                <i class="bi bi-building text-secondary fs-4"></i>
                                            </div>
                                        @endif

                                        <div>

                                            <span class="fw-bold text-dark d-block mb-1">
                                                {{ $convention->convention_name }}
                                            </span>

                                            <small class="text-muted">
                                                <i class="bi bi-geo-alt text-danger me-1"></i>
                                                {{ \Illuminate\Support\Str::limit($convention->address, 65) }}
                                            </small>

                                        </div>

                                    </div>

                                </td>

                                {{-- Hall Count --}}
                                <td>
                                    <span class="badge bg-light text-dark border">
                                        {{ $convention->halls_count }} Halls
                                    </span>

                                    <div class="small text-muted mt-1">
                                        {{ $convention->facilities_count }} Facilities
                                    </div>
                                </td>

                                {{-- Centre Type --}}
                                <td>
                                    <span class="badge {{ $typeClass }} px-2 py-1 rounded-pill">
                                        {{ $convention->centre_type ?? '-' }}
                                    </span>
                                </td>

                                {{-- Contact --}}
                                <td>

                                    <div class="fw-semibold text-dark">
                                        {{ $convention->incharge_name ?? '-' }}
                                    </div>

                                    <div class="text-muted small">
                                        <i class="bi bi-telephone text-success me-1"></i>
                                        {{ $convention->phone ?? '-' }}
                                    </div>

                                    <div class="text-muted small">
                                        {{ $convention->email ?? '-' }}
                                    </div>

                                </td>

                                {{-- Status --}}
                                <td>

                                    @if($isActive)
                                        <span class="badge badge-soft-success px-3 py-2 rounded-pill">
                                            <span class="status-dot bg-success"></span>
                                            Active
                                        </span>
                                    @else
                                        <span class="badge badge-soft-danger px-3 py-2 rounded-pill">
                                            <span class="status-dot bg-danger"></span>
                                            {{ $convention->status ?: 'Inactive' }}
                                        </span>
                                    @endif

                                </td>

                                {{-- Actions --}}
                                <td class="text-end pe-3">

                                    <div class="d-inline-flex gap-1">

                                        <a href="{{ route('conventions.venue-lists.show', $convention->id) }}"
                                           class="btn btn-info action-btn"
                                           title="View">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <a href="{{ route('conventions.venue-lists.edit', $convention->id) }}"
                                           class="btn btn-primary action-btn"
                                           title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center py-5">

                                    <div class="mb-2">
                                        <i class="bi bi-building text-muted" style="font-size: 2.5rem;"></i>
                                    </div>

                                    <h6 class="text-muted mb-1">
                                        No convention centres found
                                    </h6>

                                    <p class="text-muted small mb-0">
                                        Add a new convention centre or change your search filters.
                                    </p>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- Pagination --}}
            <div class="d-flex flex-wrap justify-content-between align-items-center mt-3">

                <div class="text-muted small mb-2">
                    Showing
                    {{ $conventions->firstItem() ?? 0 }}
                    to
                    {{ $conventions->lastItem() ?? 0 }}
                    of
                    {{ $conventions->total() }}
                    centres
                </div>

                <div>
                    {{ $conventions->links() }}
                </div>

            </div>

        </div>

    </div>

</div>

@endsection
