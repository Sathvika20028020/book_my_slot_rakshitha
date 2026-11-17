<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Superadmin\ConventionController;
use App\Http\Controllers\Superadmin\ConventionUserController;
use App\Http\Controllers\Superadmin\auth\LoginController as SuperAdminLoginController;
use App\Http\Controllers\Superadmin\UserController as RegisteredUsers;
use App\Http\Controllers\Superadmin\DashboardController;

use App\Http\Controllers\ConventionCenter\auth\LoginController as ConventionCenterLoginController;
use App\Http\Controllers\ConventionCenter\DashboardController as ConventionCenterDashboardController;
use App\Http\Controllers\ConventionCenter\ConventionController as ConventionCenterController;

Route::resource('register', UserController::class)->names('register'); 

      

Route::prefix('superadmin')->group(function () {

    Route::get('/login', [SuperAdminLoginController::class, 'login'])->name('superadmin.login');
    Route::post('/login', [SuperAdminLoginController::class, 'handleLogin'])->name('superadmin.login.post');

    Route::middleware('auth:superadmin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('superadmin.dashboard');
        Route::resource('Convention/logins', ConventionUserController::class)->names('superadmin.conventionlogins');
        Route::resource('conventions', ConventionController::class)->names('superadmin.conventions');
        Route::resource('registered-users', RegisteredUsers::class)->names('superadmin.registered-users');

    });
});


Route::prefix('conventions')->group(function () {

    Route::get('/login', [ConventionCenterLoginController::class, 'login'])->name('conventions.login');
    Route::post('/login', [ConventionCenterLoginController::class, 'handleLogin'])->name('conventions.login.post');

    Route::middleware('auth:convention')->group(function () {

        Route::get('/dashboard', [ConventionCenterDashboardController::class, 'index'])->name('conventions.dashboard');
        Route::resource('venue-lists', ConventionCenterController::class)->names('conventions.venue-lists');

    });
});












// Convention Centre Owner Portal UI
Route::prefix('owner')->name('owner.')->group(function () {
 
    Route::get('/dashboard', function () {
        return view('vendor.dashboard');
    })->name('dashboard');
});

// Admin Routes (Themed Dashboard & Applications & Masters - Pure UI)
Route::prefix('admin')->group(function () {
   
    // Bookings UI
    Route::get('/bookings', function () {
        return view('admin.bookings.index');
    })->name('admin.bookings.index');

    Route::get('/bookings/show', function () {
        return view('admin.bookings.show');
    })->name('admin.bookings.show');
});

// Convention Centre Admin Portal Routes
Route::prefix('center-admin')->name('center_admin.')->group(function () {
  
    // Booking (Index & Show with CC Approve / Reject options)
    Route::get('/booking', function () {
        return view('center_admin.booking.index');
    })->name('booking.index');

    Route::get('/booking/show', function () {
        return view('center_admin.booking.show');
    })->name('booking.show');

    Route::get('/bookings', function () {
        return view('center_admin.booking.index');
    })->name('bookings.index');

    Route::get('/bookings/show', function () {
        return view('center_admin.booking.show');
    })->name('bookings.show');

    // Calendar
    Route::get('/calendar', function () {
        return view('center_admin.calendar.index');
    })->name('calendar.index');

    // Payments (Index & View)
    Route::get('/payments', function () {
        return view('center_admin.payments.index');
    })->name('payments.index');

    Route::get('/payments/view', function () {
        return view('center_admin.payments.view');
    })->name('payments.view');

    Route::get('/payments/show', function () {
        return view('center_admin.payments.view');
    })->name('payments.show');
});

// Direct top-level shortcuts for Convention Centres
Route::get('/convention-centres', function () {
    return view('center_admin.convention-centres.index');
})->name('convention-centres.index');

Route::get('/convention-centres/create', function () {
    return view('center_admin.convention-centres.create');
})->name('convention-centres.create');

Route::get('/convention-centres/show', function () {
    return view('center_admin.convention-centres.show');
})->name('convention-centres.show');

Route::get('/convention-centres/edit', function () {
    return view('center_admin.convention-centres.edit');
})->name('convention-centres.edit');

// Direct top-level calendar and booking aliases
Route::get('/calendar', function () {
    return view('center_admin.calendar.index');
})->name('calendar');

Route::get('/payments', function () {
    return view('center_admin.payments.index');
})->name('payments');

// Aliases for layout compatibility
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->name('dashboard');

Route::match(['get', 'post'], '/logout', function () {
    return redirect('/');
})->name('logout');




// Book My Slot - Frontend Authentication Pages

// Frontend Routes
Route::get('/', function () {
    return view('landing');
})->name('home');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::view('/user/login', 'user.auth.login')->name('user.login');
Route::view('/user/otp', 'user.auth.otp')->name('user.otp');
Route::view('/user/dashboard', 'user.dashboard')->name('user.dashboard');
Route::view('/user/center', 'user.center.index')->name('user.center');
Route::view('/user/center/details', 'user.center.show')->name('user.center.details');
Route::view('/user/center/booking', 'user.center.booking')->name('user.center.booking');
Route::view('/user/payments', 'user.payments.index')->name('user.payments');
Route::view('/user/bookings', 'user.bookings')->name('user.bookings');
Route::view('/user/forgot-password', 'user.auth.forgot-password')->name('user.forgot-password');
Route::view('/user/reviews/create', 'user.reviews.create')->name('user.reviews.create');
 Route::view('/user/profile', 'user.profile')
    ->name('user.profile');


Route::get('/invoice-preview', function () {
    return view('user.invoice.show', [
        'bookingId' => 'BMS-2026-001'
    ]);
})->name('user.invoice.preview');
