@extends('superadmin.layout.app')

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
    <div class="page-title py-3">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <h4 class="fw-bold mb-1 text-dark d-flex align-items-center gap-2">
                    Conventional Centre Masters
                </h4>
            </div>
            <div class="col-12 col-md-6 text-md-end mt-2 mt-md-0 d-flex align-items-center justify-content-md-end gap-2">
                <ol class="breadcrumb justify-content-md-end mb-0 bg-transparent p-0 me-3 d-none d-lg-flex">
                    <li class="breadcrumb-item"><a href="{{ url('/superadmin/dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Centre Masters</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body p-3">
            <form class="row g-2 align-items-center" method="GET" action="{{ route('superadmin.conventions.index') }}">
                <div class="col-12 col-md-4">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-search"></i></span>
                        <input type="text" name="search" value="{{ request('search') }}"
                            class="form-control border-start-0 ps-0"
                            placeholder="Search by Centre ID, Name, Address, Phone...">
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <select name="type" class="form-select">
                        <option value="">-- All Centre Types --</option>
                        @foreach([
                            'Community Hall',
                            'Convention Hall',
                            'Kalyana Mantapa / Marriage Hall',
                            'Auditorium',
                            'Function Hall',
                            'Banquet Hall',
                            'Multipurpose Hall',
                            'Meeting / Conference Hall',
                            'Cultural Centre',
                            'Sports / Recreation Centre'
                        ] as $type)
                            <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 col-md-2">
                    <select name="status" class="form-select">
                        <option value="">-- Status (All) --</option>
                        <option value="active" {{ strtolower(request('status')) == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ strtolower(request('status')) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="col-12 col-md-3 d-flex gap-2">
                    <button type="submit" class="btn btn-primary flex-grow-1 d-inline-flex align-items-center justify-content-center gap-1">
                        <i class="bi bi-funnel"></i> Filter
                    </button>
                    <a href="{{ route('superadmin.conventions.index') }}" class="btn btn-outline-secondary" title="Reset Filters">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between p-3">
                <h6 class="mb-0 fw-bold text-dark">Convention Centre Masters</h6>
                <a href="{{ route('superadmin.conventions.create') }}" class="btn btn-sm btn-primary d-inline-flex align-items-center gap-1">
                    <i class="bi bi-plus-circle"></i> Create New Centre
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mx-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center align-middle" id="data-source-1" style="width:100%">
                    <thead class="table-light text-uppercase small text-muted" style="font-size: 0.76rem; letter-spacing: 0.5px;">
                        <tr>
                            <th class="ps-3" style="width: 110px;">Centre ID</th>
                            <th style="min-width: 250px;">Centre Name &amp; Photo</th>
                            <th style="min-width: 170px;">Centre Type</th>
                            <th style="min-width: 200px;">Location Details</th>
                            <th style="min-width: 180px;">In-Charge Contact</th>
                            <th style="min-width: 150px;">Facilities</th>
                            <th style="min-width: 110px;">Status</th>
                            <th class="text-end pe-3" style="width: 120px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($conventions as $convention)
                            @php
                                $status = strtolower($convention->status ?? 'inactive');
                                $imagePath = $convention->convention_image ?? null;
                                $imageUrl = $imagePath
                                    ? (\Illuminate\Support\Str::startsWith($imagePath, ['http://', 'https://'])
                                        ? $imagePath
                                        : asset('storage/' . ltrim($imagePath, '/')))
                                    : null;
                            @endphp
                            <tr>
                                <td class="ps-3">
                                    <span class="badge bg-dark fw-bold text-white px-2 py-1 font-monospace">
                                        {{ $convention->venue_id ?: 'CC-' . str_pad($convention->id, 4, '0', STR_PAD_LEFT) }}
                                    </span>
                                    <div class="text-muted small mt-1">
                                        {{ $convention->created_at ? \Carbon\Carbon::parse($convention->created_at)->format('d M Y') : '-' }}
                                    </div>
                                </td>
                                <td class="text-start">
                                    <div class="d-flex align-items-center gap-2">
                                        @if($imageUrl)
                                            <img src="{{ $imageUrl }}" alt="{{ $convention->convention_name }}" class="centre-thumb shadow-xs">
                                        @else
                                            <div class="centre-thumb bg-light d-flex align-items-center justify-content-center text-muted">
                                                <i class="bi bi-building fs-4"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <span class="fw-bold text-dark d-block mb-1">{{ $convention->convention_name ?? '-' }}</span>
                                            <small class="text-muted">
                                                <i class="bi bi-geo-alt text-danger me-1"></i>{{ \Illuminate\Support\Str::limit($convention->address ?? 'Address not added', 75) }}
                                            </small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge badge-soft-primary px-2 py-1 rounded-pill">{{ $convention->centre_type ?? '-' }}</span>
                                </td>
                                <td>
                                    <div class="fw-medium text-dark">{{ $convention->address ?? '-' }}</div>
                                    <div class="text-secondary font-monospace small">PIN: {{ $convention->pincode ?? '-' }}</div>
                                </td>
                                <td>
                                    <div class="fw-semibold text-dark">{{ $convention->incharge_name ?? '-' }}</div>
                                    <div class="text-muted small"><i class="bi bi-telephone text-success me-1"></i>{{ $convention->phone ?? '-' }}</div>
                                    <div class="text-muted small">{{ $convention->email ?? '-' }}</div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border">{{ (int) ($convention->facilities_count ?? 0) }} Facilities</span>
                                    <div class="text-muted small mt-1">Max {{ number_format((int) ($convention->max_capacity ?? 0)) }} Pax</div>
                                </td>
                                <td>
                                    @if($status === 'active')
                                        <span class="badge badge-soft-success rounded-pill"><span class="status-dot bg-success"></span>Active</span>
                                    @else
                                        <span class="badge badge-soft-danger rounded-pill"><span class="status-dot bg-danger"></span>Inactive</span>
                                    @endif
                                </td>
                                <td class="text-end pe-3">
                                    <div class="d-inline-flex gap-1">
                                        @if(\Illuminate\Support\Facades\Route::has('conventions.show'))
                                            <a href="{{ route('superadmin.conventions.show', $convention->id) }}" class="btn btn-info action-btn" title="View">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                        @endif
                                        <a href="{{ route('superadmin.conventions.edit', $convention->id) }}" class="btn btn-sm btn-primary action-btn" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('superadmin.conventions.destroy', $convention->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Are you sure you want to delete this convention centre?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger action-btn" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">No convention centres found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if(method_exists($conventions, 'links'))
                <div class="d-flex justify-content-end mt-3">
                    {{ $conventions->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
