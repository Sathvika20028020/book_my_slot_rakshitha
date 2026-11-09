@extends('layouts.main')

@section('title', 'Venue Owner Dashboard')

@section('content')
<section class="py-4 py-lg-5 bg-light min-vh-100">
    <div class="container-xl">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
            <div>
                <div class="small text-muted mb-1">Owner portal <i class="bi bi-chevron-right mx-1"></i> Venue profile</div>
                <h1 class="h2 fw-bold text-dark mb-1">Good morning, Rajeshwar</h1>
                <p class="text-muted mb-0">Keep your venue information up to date for guests and the BookMySlots team.</p>
            </div>
            <a href="{{ route('home') }}#venues" class="btn btn-outline-dark rounded-pill"><i class="bi bi-box-arrow-up-right me-2"></i>View public listing</a>
        </div>

        <div class="row g-4">
            <div class="col-12 col-xl-8">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-header bg-white border-0 px-4 pt-4">
                        <div class="d-flex justify-content-between align-items-start gap-3">
                            <div><h5 class="fw-bold mb-1">Venue details</h5><p class="small text-muted mb-0">These details are shown to guests after your profile is published.</p></div>
                            <span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-3 py-2"><i class="bi bi-check-circle-fill me-1"></i>Published</span>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <form id="venueProfileForm">
                            <div class="row g-3">
                                <div class="col-12"><label class="form-label fw-semibold" for="venueName">Venue name</label><input class="form-control" id="venueName" value="Sri Krishna Grand Convention Centre" required></div>
                                <div class="col-12"><label class="form-label fw-semibold" for="venueDescription">About your venue</label><textarea class="form-control" id="venueDescription" rows="3">A spacious, elegant venue for weddings, receptions and special gatherings in HSR Layout, Bengaluru.</textarea></div>
                                <div class="col-md-6"><label class="form-label fw-semibold" for="venueType">Venue type</label><select class="form-select" id="venueType"><option selected>Convention Centre</option><option>Kalyana Mantapa</option><option>Banquet Hall</option><option>Auditorium</option></select></div>
                                <div class="col-md-6"><label class="form-label fw-semibold" for="venueCapacity">Seated capacity</label><div class="input-group"><input class="form-control" id="venueCapacity" type="number" value="1500"><span class="input-group-text">guests</span></div></div>
                                <div class="col-12"><label class="form-label fw-semibold" for="venueAddress">Street address</label><input class="form-control" id="venueAddress" value="#45/2, 14th Main Road, HSR Layout"></div>
                                <div class="col-md-5"><label class="form-label fw-semibold" for="venueCity">City</label><input class="form-control" id="venueCity" value="Bengaluru"></div>
                                <div class="col-md-4"><label class="form-label fw-semibold" for="venueArea">Area / locality</label><input class="form-control" id="venueArea" value="HSR Layout"></div>
                                <div class="col-md-3"><label class="form-label fw-semibold" for="venuePin">PIN code</label><input class="form-control" id="venuePin" value="560102"></div>
                                <div class="col-md-6"><label class="form-label fw-semibold" for="venuePhone">Contact phone</label><input class="form-control" id="venuePhone" value="9845012345" inputmode="numeric" maxlength="10" pattern="[0-9]{10}"></div>
                                <div class="col-md-6"><label class="form-label fw-semibold" for="venueEmail">Booking email</label><input class="form-control" type="email" id="venueEmail" value="booking@srikrishnagrand.com"></div>
                                <div class="col-md-6"><label class="form-label fw-semibold" for="venueRate">Starting price per slot</label><div class="input-group"><span class="input-group-text">₹</span><input class="form-control" type="number" id="venueRate" value="75000"></div></div>
                                <div class="col-md-6"><label class="form-label fw-semibold" for="venueAdvance">Advance payment</label><div class="input-group"><input class="form-control" type="number" id="venueAdvance" value="25"><span class="input-group-text">%</span></div></div>
                                <div class="col-12"><label class="form-label fw-semibold">Facilities and amenities</label><div class="d-flex flex-wrap gap-2"><label class="btn btn-sm btn-outline-secondary rounded-pill"><input class="form-check-input me-1" type="checkbox" checked> Central AC</label><label class="btn btn-sm btn-outline-secondary rounded-pill"><input class="form-check-input me-1" type="checkbox" checked> Parking</label><label class="btn btn-sm btn-outline-secondary rounded-pill"><input class="form-check-input me-1" type="checkbox" checked> Catering kitchen</label><label class="btn btn-sm btn-outline-secondary rounded-pill"><input class="form-check-input me-1" type="checkbox"> Guest rooms</label></div></div>
                                <div class="col-12"><label class="form-label fw-semibold" for="venuePhotos">Venue photos</label><input class="form-control" type="file" id="venuePhotos" accept="image/*" multiple><div class="form-text">Add clear photos of your venue, halls and facilities.</div></div>
                            </div>
                            <div class="d-flex justify-content-end gap-2 border-top mt-4 pt-4"><button type="reset" class="btn btn-outline-secondary">Discard changes</button><button type="submit" class="btn btn-dark px-4"><i class="bi bi-check2 me-1"></i>Save profile</button></div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-4">
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3"><h6 class="fw-bold mb-0">Profile checklist</h6><span class="small fw-semibold text-success">4 of 5</span></div>
                        <div class="progress mb-3" style="height:8px"><div class="progress-bar bg-success" style="width:80%"></div></div>
                        <div class="d-flex flex-column gap-3 small"><div><i class="bi bi-check-circle-fill text-success me-2"></i>Venue details added</div><div><i class="bi bi-check-circle-fill text-success me-2"></i>Contact information added</div><div><i class="bi bi-check-circle-fill text-success me-2"></i>Facilities selected</div><div><i class="bi bi-check-circle-fill text-success me-2"></i>Pricing added</div><div><i class="bi bi-circle text-muted me-2"></i>Add at least 3 venue photos</div></div>
                    </div>
                </div>
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-header bg-white border-0 p-4 pb-0"><h6 class="fw-bold mb-1">How your venue appears</h6><p class="small text-muted">Public listing preview</p></div>
                    <div class="card-body p-4 pt-2">
                        <div class="rounded-3 overflow-hidden mb-3"><img class="w-100" style="height:160px;object-fit:cover" src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&w=700&q=80" alt="Convention centre preview"></div>
                        <div class="small text-muted mb-1"><i class="bi bi-geo-alt-fill text-warning me-1"></i>HSR Layout, Bengaluru</div>
                        <h6 class="fw-bold mb-2">Sri Krishna Grand Convention Centre</h6>
                        <div class="small text-muted"><i class="bi bi-people me-1"></i>1,500 seated <span class="mx-2">·</span>From ₹75,000 / slot</div>
                    </div>
                </div>
                <div class="alert alert-info border-0 rounded-4 mt-4 small"><i class="bi bi-info-circle-fill me-2"></i>Your profile details are available to the admin team for review and appear on the public venue listing.</div>
            </div>
        </div>
    </div>
</section>
<script>
    document.getElementById('venueProfileForm').addEventListener('submit', function (event) {
        event.preventDefault();

        const venueProfile = {
            name: document.getElementById('venueName').value.trim(),
            area: document.getElementById('venueArea').value.trim(),
            city: document.getElementById('venueCity').value.trim(),
            capacity: document.getElementById('venueCapacity').value,
            phone: document.getElementById('venuePhone').value.trim(),
            email: document.getElementById('venueEmail').value.trim(),
            advance: document.getElementById('venueAdvance').value,
        };

        localStorage.setItem('bookMySlotsOwnerProfile', JSON.stringify(venueProfile));
        alert('Venue profile updated. Your profile preview now reflects these details.');
    });

    const savedVenueProfile = localStorage.getItem('bookMySlotsOwnerProfile');

    if (savedVenueProfile) {
        const venueProfile = JSON.parse(savedVenueProfile);
        document.getElementById('venueName').value = venueProfile.name;
        document.getElementById('venueArea').value = venueProfile.area;
        document.getElementById('venueCity').value = venueProfile.city;
        document.getElementById('venueCapacity').value = venueProfile.capacity;
        document.getElementById('venuePhone').value = venueProfile.phone;
        document.getElementById('venueEmail').value = venueProfile.email;
        document.getElementById('venueAdvance').value = venueProfile.advance;
    }
</script>
@endsection
