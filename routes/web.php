<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AppointmentStatusController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicDoctorController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PublicDoctorController::class, 'index'])->name('public.doctors');
Route::get('/doctors/appointments/show', [AppointmentController::class, 'show'])->name('public.appointments.show');
Route::get('/doctors/{doctor}/book', [AppointmentController::class, 'create']);
Route::post('/appointments/{doctor}', [AppointmentController::class, 'store']);
Route::resource('appointments', AppointmentController::class);
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('services', ServiceController::class);
    Route::resource('doctors', DoctorController::class);

    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);

    Route::resource('users', UserController::class);

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    Route::post('/cart/add/{product}', [CartController::class, 'add'])
        ->name('cart.add');

    Route::post('/cart/update', [CartController::class, 'update'])
        ->name('cart.update');

    Route::post('/cart/remove', [CartController::class, 'remove'])
        ->name('cart.remove');

    Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout.index');

    Route::post('/checkout', [CheckoutController::class, 'store'])
        ->name('checkout.store');


    // doctor & admin can update
    Route::patch('/appointments/{appointment}/status', [AppointmentStatusController::class, 'update'])->name('appointments.status.update');
});

require __DIR__ . '/auth.php';
