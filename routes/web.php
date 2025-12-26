<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AppointmentStatusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublicDoctorController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PublicDoctorController::class, 'index'])->name('public.doctors');
Route::get('/doctors/appointments/show/{appointment}', [AppointmentController::class, 'show'])->name('public.appointments.show');
Route::get('/doctors/{doctor}/book', [AppointmentController::class, 'create']);
Route::post('/appointments/{doctor}', [AppointmentController::class, 'store']);
Route::resource('appointments', AppointmentController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('services', ServiceController::class);
    Route::resource('doctors', DoctorController::class);


    // doctor & admin can update
    Route::patch('/appointments/{appointment}/status', [AppointmentStatusController::class, 'update'])->name('appointments.status.update');
});

require __DIR__ . '/auth.php';
