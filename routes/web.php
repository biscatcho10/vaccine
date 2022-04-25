<?php

use App\Http\Controllers\Frontent\VaccineController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();

// landing page
Route::get('/', [VaccineController::class, 'index'])->name('index');


// make request for vaccine
Route::post('request/vaccine', [VaccineController::class, 'makeRequest'])->name('make.request');

// make waiting list request
Route::post('waiting-list/vaccine', [VaccineController::class, 'makeRequestWl'])->name('make.request.wl');

// get vaccine data
Route::get('vaccine/data/{vaccine}', [VaccineController::class, 'vaccineData'])->name('get.vaccine');

Route::get('interval/{vaccine}/{day}', [VaccineController::class, 'dayIntervals'])->name('day.intervals');

Route::get("/thanks-page", [VaccineController::class, 'thanks'])->name('get.thanks');
