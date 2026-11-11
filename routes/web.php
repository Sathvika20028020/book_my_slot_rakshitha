<?php

use Illuminate\Support\Facades\Route;

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

// Convention Centre Owner Portal UI
Route::prefix('owner')->name('owner.')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::get('/dashboard', function () {
        return view('vendor.dashboard');
    })->name('dashboard');
});

// Admin Routes (Themed Dashboard & Applications & Masters - Pure UI)
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/application', function () {
        return view('admin.application.index');
    })->name('admin.application.index');

    // Convention Centre Masters UI
    Route::get('/convention-centres', function () {
        return view('admin.convention-centres.index');
    })->name('admin.convention-centres.index');

    Route::get('/convention-centres/create', function () {
        return view('admin.convention-centres.create');
    })->name('admin.convention-centres.create');

    Route::get('/convention-centres/show', function () {
        return view('admin.convention-centres.show');
    })->name('admin.convention-centres.show');

    Route::get('/convention-centres/edit', function () {
        return view('admin.convention-centres.edit');
    })->name('admin.convention-centres.edit');

    // Centers (Convention Centre Onboarding & Credentials UI)
    Route::get('/centers', function () {
        return view('admin.centers.index');
    })->name('admin.centers.index');

    Route::get('/centers/create', function () {
        return view('admin.centers.create');
    })->name('admin.centers.create');

    Route::get('/centers/show', function () {
        return view('admin.centers.show');
    })->name('admin.centers.show');

    Route::get('/centers/edit', function () {
        return view('admin.centers.edit');
    })->name('admin.centers.edit');
});

// Aliases for layout compatibility
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->name('dashboard');

Route::match(['get', 'post'], '/logout', function () {
    return redirect('/');
})->name('logout');


Route::get('/convention-centres', function () {
        return view('admin.center_admin.convention-centres.index');
    })->name('admin.center_admin.convention-centres.index');

    Route::get('/convention-centres/create', function () {
        return view('admin.center_admin.convention-centres.create');
    })->name('admin.center_admin.convention-centres.create');

    Route::get('/convention-centres/show', function () {
        return view('admin.center_admin.convention-centres.show');
    })->name('admin.center_admin.convention-centres.show');

    Route::get('/convention-centres/edit', function () {
        return view('admin.center_admin.convention-centres.edit');
    })->name('admin.center_admin.convention-centres.edit');


// Book My Slot - Frontend Authentication Pages
Route::view('/user/login', 'user.auth.login')->name('user.login');

Route::view('/user/otp', 'user.auth.otp')->name('user.otp');

Route::view('/user/dashboard', 'user.dashboard')
    ->name('user.dashboard');

    Route::view('/user/center', 'user.center.index')
    ->name('user.center');

    Route::view('/user/center/details', 'user.center.show')
    ->name('user.center.details');

    Route::view('/user/center/booking', 'user.center.booking')
    ->name('user.center.booking');
    
    Route::view('/user/payments', 'user.payments.index')
    ->name('user.payments');

    Route::view('/user/bookings', 'user.bookings')
    ->name('user.bookings');