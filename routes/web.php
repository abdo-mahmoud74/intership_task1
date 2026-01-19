<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Admin Routes with CheckAdmin Middleware
Route::group(['middleware'=>'CheckAdmin'], function(){

    Route::get('/dashboard', [DashboardController::class, "index"])->name('admin.dashboard');
    Route::get('/users', [UserController::class, "index"])->name('admin.users');
    // users crud routes
    Route::get('/users/delete/{id}', [UserController::class, "destroy"])->middleware(['auth', 'verified'])->name('admin.users.delete');
    Route::get('/users/create', [UserController::class, "create"])->middleware(['auth', 'verified'])->name('admin.users.create');
    Route::post('/users/store', [UserController::class, "store"])->middleware(['auth', 'verified'])->name('admin.users.store');
    Route::get('/users/edit/{id}', [UserController::class, "edit"])->middleware(['auth', 'verified'])->name('admin.users.edit');
    Route::post('/users/update/{id}', [UserController::class, "update"])->middleware(['auth', 'verified'])->name('admin.users.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
