<?php

use App\Models\Location;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LocationController;
use App\Http\Middleware\RedirectIfNotAuthenticated;

Route::get('/', function () {
    return view('index');
});
Route::get('/data-wisata', [LocationController::class, 'dataWisata']);
Route::get('/detail-wisata/{id}', [LocationController::class, 'show']);
Route::get('/api/locations', [LocationController::class, 'index']);

Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::middleware([RedirectIfNotAuthenticated::class])->group(function () {
    Route::get('/admin', fn() => redirect()->route('admin.dashboard'));
    Route::get('/admin/dashboard', [LocationController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/data-wisata', function () {
        $locations = Location::all(); 
        return view('admin.data-wisata', compact('locations')); 
    })->name('admin.data-wisata');
    Route::get('/admin/tambah-data', [AdminController::class, 'tambahData'])->name('admin.tambah-data');
    Route::post('/admin/tambah-data', [LocationController::class, 'store'])->name('admin.tambah-data.submit');
});

Route::get('/admin/edit/{id}', [LocationController::class, 'edit'])->name('admin.edit');
Route::post('/admin/update/{id}', [LocationController::class, 'update'])->name('admin.update');
Route::delete('/admin/delete/{id}', [LocationController::class, 'destroy'])->name('admin.delete');
