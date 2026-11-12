
@extends('layouts.user')

@section('title', 'Rate & Review | Book My Slot')

@section('content')

<style>
    .review-page {
        padding: 20px 15px 35px;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .review-title {
        color: #0A0F1D;
        font-size: 23px;
        font-weight: 800;
        margin-bottom: 5px;
    }

    .review-subtitle {
        color: #64748B;
        font-size: 14px;
        margin-bottom: 22px;
    }

    .review-card {
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 18px;
    }

    .review-venue {
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .review-venue-icon {
        width: 48px;
        height: 48px;
        min-width: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #FEF3C7;
        color: #B45309;
        border-radius: 11px;
        font-size: 21px;
    }

    .review-venue h5 {
        color: #0A0F1D;
        font-size: 15px;
        font-weight: 800;
        margin: 0 0 5px;
    }

    .review-venue p {
        color: #64748B;
        font-size: 12px;
        margin: 0;
    }

    .review-label {
        display: block;
        color: #0A0F1D;
        font-size: 14px;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .review-stars {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin: 15px 0;
    }

    .review-star {
        border: 0;
        background: transparent;
        color: #CBD5E1;
        font-size: 34px;
        padding: 2px;
        cursor: pointer;
    }

    .review-star.active {
        color: #F59E0B;
    }

    .rating-text {
        text-align: center;
        color: #B45309;
        font-size: 13px;
        font-weight: 700;
        min-height: 20px;
    }

    .review-input {
        width: 100%;
        min-height: 125px;
        border: 1px solid #CBD5E1;
        border-radius: 9px;
        padding: 12px;
        color: #0A0F1D;
        font-family: inherit;
        font-size: 13px;
        resize: vertical;
    }

    .review-input:focus {
        outline: none;
        border-color: #F59E0B;
        box-shadow: 0 0 0 3px rgba(245,158,11,.12);
    }

    .review-hint {
        color: #64748B;
        font-size: 11px;
    }

    .review-submit {
        width: 100%;
        min-height: 49px;
        border: 0;
        border-radius: 9px;
        background: #0A0F1D;
        color: #F59E0B;
        font-family: inherit;
        font-size: 14px;
        font-weight: 800;
    }

    .review-submit:disabled {
        opacity: .6;
    }

    .review-success {
        display: none;
        text-align: center;
        background: #F0FDF4;
        border: 1px solid #BBF7D0;
        border-radius: 14px;
        padding: 28px 20px;
    }

    .review-success-icon {
        width: 58px;
        height: 58px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        background: #DCFCE7;
        color: #15803D;
        border-radius: 50%;
        font-size: 25px;
    }

    .review-success h4 {
        color: #166534;
        font-size: 18px;
        font-weight: 800;
    }

    .review-success p {
        color: #166534;
        font-size: 13px;
        line-height: 1.7;
    }

    .review-back {
        display: block;
        width: 100%;
        padding: 13px;
        margin-top: 18px;
        border-radius: 9px;
        background: #0A0F1D;
        color: #F59E0B !important;
        text-align: center;
        font-size: 13px;
        font-weight: 800;
        text-decoration: none;
    }

    @media(max-width: 380px) {
        .review-star {
            font-size: 29px;
        }
    }
</style>

<div class="review-page">

    <a href="{{ route('user.bookings') }}"
       class="d-inline-flex align-items-center text-decoration-none mb-3"
       style="color:#64748B;font-size:13px;font-weight:700;">
        <i class="fas fa-arrow-left me-2"></i> Back to My Bookings
    </a>

    <h2 class="review-title">Rate & Review</h2>

    <p class="review-subtitle">
        Your feedback helps other users choose the right venue.
    </p>

    <div id="reviewFormSection">

        <div class="review-card">

            <div class="review-venue">
                <div class="review-venue-icon">
                    <i class="fas fa-landmark"></i>
                </div>

                <div>
                    <h5>Grand Palace Convention Hall</h5>
                    <p>Booking ID: BMS-1005</p>
                    <p class="mt-1">
                        <i class="fas fa-calendar-alt me-1"></i>
                        Event date: 05 November 2026
                    </p>
                </div>
            </div>

            <hr class="my-3">

            <div class="text-center">
                <label class="review-label">
                    How was your overall experience?
                </label>

                <div class="review-stars" id="reviewStars">
                    <button type="button" class="review-star" data-rating="1" aria-label="1 star">
                        <i class="fas fa-star"></i>
                    </button>
                    <button type="button" class="review-star" data-rating="2" aria-label="2 stars">
                        <i class="fas fa-star"></i>
                    </button>
                    <button type="button" class="review-star" data-rating="3" aria-label="3 stars">
                        <i class="fas fa-star"></i>
                    </button>
                    <button type="button" class="review-star" data-rating="4" aria-label="4 stars">
                        <i class="fas fa-star"></i>
                    </button>
                    <button type="button" class="review-star" data-rating="5" aria-label="5 stars">
                        <i class="fas fa-star"></i>
                    </button>
                </div>

                <div class="rating-text" id="ratingText">
                    Select your rating
                </div>

                <input type="hidden" id="ratingValue" value="">
            </div>

            <hr class="my-4">

            <div class="mb-3">
                <label class="review-label" for="reviewText">
                    Write your review <span style="color:#DC2626;">*</span>
                </label>

                <textarea
                    id="reviewText"
                    class="review-input"
                    maxlength="500"
                    placeholder="Share your experience about the venue, cleanliness, facilities, staff support and overall service..."
                    required></textarea>

                <div class="d-flex justify-content-between mt-2">
                    <small class="review-hint">Minimum 10 characters</small>
                    <small class="review-hint">
                        <span id="characterCount">0</span>/500
                    </small>
                </div>
            </div>

            <div class="p-3 mb-4"
                 style="background:#FFFBEB;border:1px solid #FDE68A;border-radius:9px;">
                <div style="color:#92400E;font-size:12px;line-height:1.6;">
                    <i class="fas fa-info-circle me-1"></i>
                    Please share an honest review based on your actual event experience.
                </div>
            </div>

            <button type="button" class="review-submit" id="submitReview">
                Submit Review
                <i class="fas fa-arrow-right ms-2"></i>
            </button>

        </div>
    </div>

    <div class="review-success" id="reviewSuccess">

        <div class="review-success-icon">
            <i class="fas fa-check"></i>
        </div>

        <h4>Thank You for Your Review!</h4>

        <p>
            Your feedback has been submitted successfully in this demo.
            Thank you for helping other users make better venue choices.
        </p>

        <div class="mt-3 p-3"
             style="background:#FFFFFF;border-radius:10px;">
            <div style="color:#64748B;font-size:12px;">Your Rating</div>
            <div id="submittedRating"
                 style="color:#D97706;font-size:22px;margin-top:5px;"></div>
            <div style="color:#0A0F1D;font-size:13px;font-weight:700;margin-top:8px;">
                Grand Palace Convention Hall
            </div>
        </div>

        <a href="{{ route('user.bookings') }}" class="review-back">
            Go to My Bookings
        </a>

    </div>

</div>

<script>
    let selectedRating = 0;

    const stars = document.querySelectorAll('.review-star');
    const ratingText = document.getElementById('ratingText');
    const ratingValue = document.getElementById('ratingValue');
    const reviewText = document.getElementById('reviewText');
    const characterCount = document.getElementById('characterCount');

    const ratingLabels = {
        1: 'Poor',
        2: 'Fair',
        3: 'Good',
        4: 'Very Good',
        5: 'Excellent'
    };

    stars.forEach(function(star) {
        star.addEventListener('click', function() {
            selectedRating = parseInt(this.dataset.rating);
            ratingValue.value = selectedRating;
            ratingText.textContent = ratingLabels[selectedRating];

            stars.forEach(function(item) {
                const value = parseInt(item.dataset.rating);
                item.classList.toggle('active', value <= selectedRating);
            });
        });
    });

    reviewText.addEventListener('input', function() {
        characterCount.textContent = this.value.length;
    });

    document.getElementById('submitReview').addEventListener('click', function() {

        const review = reviewText.value.trim();

        if (selectedRating === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Rating Required',
                text: 'Please select a star rating before submitting.'
            });
            return;
        }

        if (review.length < 10) {
            Swal.fire({
                icon: 'warning',
                title: 'Write Your Review',
                text: 'Please enter at least 10 characters in your review.'
            });
            reviewText.focus();
            return;
        }

        document.getElementById('submittedRating').textContent =
            '★'.repeat(selectedRating) + '☆'.repeat(5 - selectedRating);

        document.getElementById('reviewFormSection').style.display = 'none';
        document.getElementById('reviewSuccess').style.display = 'block';

        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>

@endsection
