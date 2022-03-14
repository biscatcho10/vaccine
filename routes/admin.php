<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;
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

Route::middleware(['auth:web'])->group(function () {
    Route::get('dashboard', [HomeController::class, 'dashboard']);
    Route::get('locale/{locale}', [HomeController::class, 'changeLanguage']);
    Route::resource('admin', AdminController::class);
});
