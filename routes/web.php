<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('index');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authentificate']);

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::controller(HotelController::class)->group(function () {
        Route::get('/hotels', 'index')->name('hotels.index');
        Route::get('/hotels/{hotel}', 'show')->name('hotels.show');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'index')->name('profile');
        Route::put('/profile', 'passwordUpdate')->name('password.update');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'deleteProfile')->name('profile.destroy');
        Route::post('/verification-send', 'verification')->name('verification.send');
    });

    Route::controller(BookingController::class)->group(function () {
        Route::get('/bookings', 'index')->name('bookings.index');
        Route::patch('/bookings/{id}', 'editPrice')->name('bookings.edit.price');
        Route::get('/booking/{booking}', 'show')->name('bookings.show');
        Route::post('/booking/{id}', 'store')->name('bookings.store');
    });
    Route::post('/booking-cancel/{id}', [BookingController::class, 'deleteBooking'])->name('bookings.delete');

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware('admin')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        Route::get('/admin-users', [AdminController::class, 'users'])->name('admin.users');

        Route::controller(\App\Http\Controllers\Admin\BookingController::class)->group(function () {
            Route::get('/admin-bookings/{user}', 'index')->name('admin.bookings');
            Route::delete('/admin-bookings/{id}/{user}', 'deleteBooking')->name('admin.bookings.delete');
        });

        Route::controller(\App\Http\Controllers\Admin\HotelController::class)->group(function () {
            Route::get('/admin-hotels', 'hotels')->name('admin.hotels');
            Route::post('/admin-hotels', 'store');

            Route::get('/admin-hotels/{id}', 'hotelsEdit')->name('admin.hotels.edit');
            Route::put('/admin-hotels/{id}', 'editHotel');
            Route::delete('/admin-hotels/{id}', 'deleteHotel')->name('admin.hotels.delete');
        });

        Route::controller(RoomController::class)->group(function () {
            Route::get('/admin-rooms', 'rooms')->name('admin.rooms');
            Route::post('/admin-rooms', 'store');

            Route::get('/admin-rooms/{id}', 'roomsEdit')->name('admin.rooms.edit');
            Route::put('/admin-rooms/{id}', 'editRoom');
            Route::delete('/admin-rooms/{id}', 'deleteRoom')->name('admin.rooms.delete');
        });

        Route::controller(FacilityController::class)->group(function () {
            Route::get('/admin-facilities', 'index')->name('admin.facilities');
            Route::post('/admin-facilities', 'store');
            Route::delete('/admin-facilities/{id}', 'deleteFacility')->name('admin.facilities.delete');

            Route::get('/admin-hotels-facility', 'hotelsFacility')->name('admin.hotels.facility');
            Route::post('/admin-hotels-facility', 'editHotelsFacility');
            Route::delete('/admin-hotels-facility/{hotel}/{facility}', 'delFacilityForHotel')->name('admin.hotels.facility.del');

            Route::get('/admin-rooms-facility', 'roomsFacility')->name('admin.rooms.facility');
            Route::post('/admin-rooms-facility', 'editRoomsFacility');
            Route::delete('/admin-rooms-facility/{room}/{facility}', 'delFacilityForRoom')->name('admin.rooms.facility.del');
        });
    });
});


