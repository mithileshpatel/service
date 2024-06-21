<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
Route::get('/', [HomeController::class, 'index']);

Route::get('/about',function()
{
    return view('about');
});
Route::get('/contact',function()
{
    return view('contact');
});

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    // Admin routes
});


Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    // Add more admin routes here as needed
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');


Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');

Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');



// Routes for Room CRUD operations


// web.php
Route::get('/services/{service}/remove-image/{image}', [ServiceController::class, 'removeImage'])->name('services.removeImage');



// Other routes
// Add your other routes here


Route::get('/services/{service}', [ServiceController::class, 'show'])->name('admin.services.show');



Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::get('categories/{id}/removeImage', [CategoryController::class, 'removeImage'])->name('categories.removeImage');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('show');
