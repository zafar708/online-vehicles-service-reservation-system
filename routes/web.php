<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ServiceStationController;
use App\Http\Controllers\ServiceAdmin\StaffController;
use App\Http\Controllers\ServiceAdmin\ServiceController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\User\VehicleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');

    return "Cleared!";

});


//Admin Routes
Route::group(['prefix' => 'admin'], function () {
    Route::get('login',[LoginController::class, 'adminGetLogin'])->name('admin-get-login');
    Route::post('admin-login',[LoginController::class, 'adminPostLogin'])->name('admin-post-login');
    Route::any('forget-password' , [ForgotPasswordController::class, 'adminForgotPassword'])->name('admin-forgot-password');
    Route::get('reset-password/{token}' , [ForgotPasswordController::class, 'adminResetPassword'])->name('admin-reset-password');
    Route::post('update-password' , [ForgotPasswordController::class, 'adminUpdatePassword'])->name('admin-update-password');
});
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    //Dashboard
    Route::get('dashboard',[DashboardController::class, 'index'])->name('admin-dashboard');
    //Users
    Route::resource('users', UserController::class);
    Route::get('user-status/{id}', [UserController::class, 'updateStatus'])->name('user-status');
    //Service Station
    Route::resource('service-stations', ServiceStationController::class);
    Route::get('service-station-status/{id}', [ServiceStationController::class, 'updateStatus'])->name('service-station-status');
    //Profile
    Route::resource('profile', \App\Http\Controllers\Admin\ProfileController::class);
});

//Service Station Admin Routes

Route::group(['prefix' => 'serviceAdmin', 'middleware' => ['auth', 'serviceAdmin']], function () {
    //Dashboard
    Route::get('dashboard',[\App\Http\Controllers\ServiceAdmin\DashboardController::class, 'index'])->name('service-dashboard');
    //Users
    Route::resource('serviceStations', \App\Http\Controllers\ServiceAdmin\ServiceStationController::class);
    //Services
    Route::resource('services', ServiceController::class);
    Route::get('get-staff', [ServiceController::class, 'getStaff'])->name('get-staff');
    //Service Station
    Route::resource('staff', StaffController::class);
    //Bookings
    Route::get('bookings',[\App\Http\Controllers\ServiceAdmin\BookingController::class, 'bookings'])->name('bookings');
    Route::get('booking-show/{id}',[\App\Http\Controllers\ServiceAdmin\BookingController::class, 'show'])->name('booking-show');
    Route::get('booking-status/{id}',[\App\Http\Controllers\ServiceAdmin\BookingController::class, 'bookingStatus'])->name('booking-status');
    //Profile
    Route::resource('profile-service-admin', \App\Http\Controllers\ServiceAdmin\ProfileController::class);
});


Route::get('register',[LoginController::class, 'register'])->name('register');
Route::post('post-register',[LoginController::class, 'postRegister'])->name('post-register');
Route::get('login',[LoginController::class, 'login'])->name('login');
Route::post('post-login',[LoginController::class, 'postLogin'])->name('post-login');
Route::get('profile',[LoginController::class, 'profile'])->name('profile');
Route::get('logout',[LoginController::class, 'logout'])->name('logout');

//Start Forgot Password
    Route::any('forget-password' , [ForgotPasswordController::class, 'forgotPassword'])->name('forgot-password');
    Route::get('reset-password/{token}' , [ForgotPasswordController::class, 'resetPassword'])->name('reset-password');
    Route::post('update-password' , [ForgotPasswordController::class, 'updatePassword'])->name('update-password');
//End Forgot Password

//Frontend Routes
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::get('search', [IndexController::class, 'search'])->name('search');
    Route::get('about-us', [IndexController::class, 'aboutUs'])->name('about-us');
    Route::get('contact-us', [IndexController::class, 'contactUs'])->name('contact-us');
    Route::post('contact-mail', [IndexController::class, 'contactMail'])->name('contact-mail');
    Route::get('service-stations', [\App\Http\Controllers\Frontend\ServiceStationController::class, 'allStations'])->name('stations');
    Route::get('service-station/{slug}', [\App\Http\Controllers\Frontend\ServiceStationController::class, 'stationDetail'])->name('station-detail');
    Route::post('service-rating/{id}', [\App\Http\Controllers\Frontend\ServiceController::class, 'serviceRatings'])->name('service-rating');
    Route::get('services', [\App\Http\Controllers\Frontend\ServiceController::class, 'allServices'])->name('services');
    Route::get('service/{slug}', [\App\Http\Controllers\Frontend\ServiceController::class, 'serviceDetail'])->name('service-detail');
    Route::get('service-booking-request/{slug}', [\App\Http\Controllers\Frontend\ServiceController::class, 'serviceBooking'])->name('service-booking-request');
    Route::post('book-service', [\App\Http\Controllers\User\BookingController::class, 'serviceBooked'])->name('book-service');

//User Routes
Route::group(['prefix' => 'user', 'middleware' => ['auth', 'user']], function () {
    //Dashboard
    Route::get('dashboard',[\App\Http\Controllers\User\DashboardController::class, 'index'])->name('user-dashboard');
    Route::get('user-profile',[\App\Http\Controllers\User\ProfileController::class, 'userProfile'])->name('user-profile');
    Route::post('update-profile',[\App\Http\Controllers\User\ProfileController::class, 'updateProfile'])->name('update-profile');
    Route::get('all-bookings',[\App\Http\Controllers\User\BookingController::class, 'allBookings'])->name('all-bookings');
    Route::get('booking-details/{id}',[\App\Http\Controllers\User\BookingController::class, 'bookingDetail'])->name('booking-details');
    Route::get('booking-status/{id}',[\App\Http\Controllers\User\BookingController::class, 'bookingStatus'])->name('booking-update-status');
    Route::resource('vehicles', VehicleController::class);

});