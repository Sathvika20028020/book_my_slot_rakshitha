@extends('layouts.main')

@section('title', 'Convention Centre Owner Login')

@section('content')
<section class="py-5 bg-light min-vh-100">
    <div class="container py-4">
        <div class="row justify-content-center align-items-center g-4">
            <div class="col-lg-5">
                <div class="mb-4">
                    <span class="badge rounded-pill text-bg-warning mb-3"><i class="bi bi-buildings me-1"></i>Venue owner portal</span>
                    <h1 class="fw-bold text-dark">Manage your venue profile</h1>
                    <p class="text-muted">Sign in to add your halls, facilities, photos and booking information. Your published profile can appear on BookMySlots.</p>
                </div>
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-md-5">
                        <h4 class="fw-bold mb-1">Welcome back</h4>
                        <p class="text-muted small mb-4">Use your convention centre account</p>
                        <form action="{{ route('owner.dashboard') }}" method="get">
                            <div class="mb-3">
                                <label class="form-label fw-semibold" for="ownerEmail">Email address</label>
                                <input class="form-control form-control-lg" type="email" id="ownerEmail" value="booking@srikrishnagrand.com" placeholder="you@venue.com" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold" for="ownerPassword">Password</label>
                                <input class="form-control form-control-lg" type="password" id="ownerPassword" value="venueowner" placeholder="Enter your password" required>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-4 small">
                                <label class="text-muted"><input class="form-check-input me-1" type="checkbox" checked> Remember me</label>
                                <a href="#" class="text-decoration-none">Forgot password?</a>
                            </div>
                            <button class="btn btn-dark btn-lg w-100" type="submit">Sign in <i class="bi bi-arrow-right ms-2"></i></button>
                        </form>
                        <div class="text-center small text-muted mt-4">New to BookMySlots? <a href="{{ route('register') }}" class="fw-semibold text-decoration-none">Create an owner account</a></div>
                    </div>
                </div>
                <p class="text-center text-muted small mt-3"><i class="bi bi-shield-check text-success me-1"></i>Your venue details stay under your account.</p>
            </div>
            <div class="col-lg-5 d-none d-lg-block">
                <div class="rounded-4 overflow-hidden position-relative shadow" style="min-height:500px;background:linear-gradient(180deg,rgba(10,15,29,.08),rgba(10,15,29,.86)),url('https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&w=1000&q=85') center/cover;">
                    <div class="position-absolute bottom-0 p-5 text-white">
                        <span class="badge text-bg-warning mb-3">GROW WITH BOOKMYSLOTS</span>
                        <h2 class="fw-bold">Make your venue easier to discover.</h2>
                        <p class="text-white-50 mb-0">Show guests your spaces, capacity, amenities and pricing in one clear profile.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
