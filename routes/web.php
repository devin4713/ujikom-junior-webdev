<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/emplist', [EmployeeController::class, 'showweb']);
    Route::get('/empdata', [EmployeeController::class, 'getdata']);
    Route::get('/employee/{id}', [EmployeeController::class, 'showdetail']);

    Route::delete('/employee/{id}', [EmployeeController::class, 'destroy']);

    Route::get('/empcreate', [EmployeeController::class, 'create']);
    Route::post('/empcreate', [EmployeeController::class, 'store']);

    Route::get('/empedit/{id}', [EmployeeController::class, 'edit']);
    Route::put('/empedit/{id}', [EmployeeController::class, 'update']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
