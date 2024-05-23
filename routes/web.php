<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PickupRequestController;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'login'])->middleware('guest');
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register')->middleware('guest');
Route::post('register', [AuthController::class, 'register'])->middleware('guest');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/admin', [DashboardController::class, 'admin'])->name('admin')->middleware('admin');


// routes/web.php

Route::middleware(['auth'])->group(function () {
    Route::get('/pickup-requests/create', [PickupRequestController::class, 'create'])->name('pickup_requests.create');
    Route::post('/pickup-requests', [PickupRequestController::class, 'store'])->name('pickup_requests.store');
    Route::get('/pickup-requests/{pickupRequest}/schedule', [PickupRequestController::class, 'schedule'])->name('pickup_requests.schedule');
    Route::put('/pickup-requests/{pickupRequest}/schedule', [PickupRequestController::class, 'updateSchedule'])->name('pickup_requests.updateSchedule');
    Route::get('/pickup-requests/{pickupRequest}/status', [PickupRequestController::class, 'status'])->name('pickup_requests.status');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/pickup-requests', [PickupRequestController::class, 'index'])->name('admin.pickup-requests.index');
    Route::get('/admin/pickup-requests/{id}', [PickupRequestController::class, 'show'])->name('admin.pickup-requests.show');
    Route::post('/admin/pickup-requests/{id}/approve', [PickupRequestController::class, 'approve'])->name('admin.pickup-requests.approve');
    Route::post('/admin/pickup-requests/{id}/reject', [PickupRequestController::class, 'reject'])->name('admin.pickup-requests.reject');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/ganti-password', [ProfileController::class, 'changePassword'])->name('profile.changePassword');
    Route::put('/profile/change-password', [ProfileController::class, 'updatePassword'])->name('profile.change-password');
});
