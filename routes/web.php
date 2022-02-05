<?php

use App\Http\Controllers\CoordinateController;
use App\Http\Controllers\MarkerController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MarkerController::class, 'index']);
Route::get('/coordinate/json', [MarkerController::class, 'marker_json']);
Route::get('/coordinate/bidang/{id}', [MarkerController::class, 'lokasi']);

// Put Data & Dashboard
Route::get('/dashboard', [MarkerController::class, 'admin'])->name('dashboard');
Route::get('/marker/create', [MarkerController::class, 'create']);
Route::post('/marker/store', [MarkerController::class, 'store'])->name('marker.create');
Route::get('/marker/edit/{id}', [MarkerController::class, 'edit'])->name('marker.edit');
Route::post('/marker/update/{id}', [MarkerController::class, 'update'])->name('marker.update');
Route::get('/marker/delete/{id}', [MarkerController::class, 'delete'])->name('marker.delete');