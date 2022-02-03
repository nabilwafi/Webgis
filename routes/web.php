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