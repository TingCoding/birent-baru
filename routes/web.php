<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\TransactionController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('home');
});

Route::get('/tracking', function () {
    return view('tracking');
});

// Transaction routes - harus dalam middleware auth
Route::middleware('auth')->group(function () {
    Route::get('/transaction/{id}', [TransactionController::class, 'createTransaction'])->name('transaction.create');
    Route::post('/transaction/store', [TransactionController::class, 'store'])->name('transaction.store');
});

// Rental routes - harus dalam middleware auth
Route::middleware('auth')->group(function () {
    Route::get('/rental/{carId?}', [RentalController::class, 'createOrder'])->name('rental.create');
    Route::post('/rental1', [RentalController::class, 'createOrder1'])->name('rental.store');
});

Route::middleware(IsAdmin::class)->group(function () {
    Route::get('/add-car', [CarController::class, 'createCar']);
    Route::post('/add-car1', [CarController::class, 'createCar1']);
    Route::get('/edit-car/{id}', [CarController::class, 'editCar']);
    Route::patch('/update-car/{id}', [CarController::class, 'updateCar']);
    Route::delete('/delete-car/{id}', [CarController::class, 'deleteCar']);
    Route::get('/add-category', [CategoryController::class, 'add'])->name('category.add');
    Route::post('/add-category', [CategoryController::class, 'store'])->name('category.store');
});

Route::get('/view-all-cars', [CarController::class, 'viewAllCars']);

Route::get('/cars', [CarController::class, 'viewCars'])->name('cars.index');
Route::get('/luxury', [CarController::class, 'luxury'])->name('luxury.index');
Route::get('/medium', [CarController::class, 'medium'])->name('medium.index');
Route::get('/family', [CarController::class, 'family'])->name('family.index');
Route::get('/electric', [CarController::class, 'electric'])->name('electric.index');
Route::get('/minibus', [CarController::class, 'minibus'])->name('minibus.index');
