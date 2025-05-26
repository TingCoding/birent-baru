<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RentalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/signin', function () {
    return view('signin');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/transaction', function () {
    return view('transaction');
});

Route::get('/add-car', [CarController::class, 'createCar']);
Route::post('/add-car1', [CarController::class, 'createCar1']);
Route::get('/cars', [CarController::class, 'viewCars'])->name('cars.index');
Route::get('/luxury', [CarController::class, 'luxury'])->name('luxury.index');
Route::get('/medium', [CarController::class, 'medium'])->name('medium.index');
Route::get('/family', [CarController::class, 'family'])->name('family.index');
Route::get('/electric', [CarController::class, 'electric'])->name('electric.index');
Route::get('/minibus', [CarController::class, 'minibus'])->name('minibus.index');

Route::get('/edit-car/{id}', [CarController::class, 'editCar']);
Route::patch('/update-car/{id}', [CarController::class, 'updateCar']);
Route::delete('/delete-car/{id}', [CarController::class, 'deleteCar']);

// Category routes - gunakan nama yang lebih konsisten
Route::get('/add-category', [CategoryController::class, 'add'])->name('category.add');
Route::post('/add-category', [CategoryController::class, 'store'])->name('category.store');

// Gunakan controller untuk rental routes
Route::get('/rental', [RentalController::class, 'createOrder']);
Route::post('/rental1', [RentalController::class, 'createOrder1']);