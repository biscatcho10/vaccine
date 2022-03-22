<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ConditionController;
use App\Http\Controllers\Admin\DayController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\VaccineController;
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
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('locale/{locale}', [HomeController::class, 'changeLanguage']);
    Route::resource('admin', AdminController::class);

    // Settings
    Route::get('settings', [SettingController::class ,'showSettingsForm'])->name('settings');
    Route::post('settings', [SettingController::class, 'updateSettings'])->name('update-settings');

    // Users
    Route::resource('user', PatientController::class);

    // Vaccines
    Route::resource('vaccine', VaccineController::class);

    // Conditions
    Route::resource('{vaccine}/condition', ConditionController::class);

    // Questions
    Route::resource('{vaccine}/question', QuestionController::class);

    // Exceptions
    Route::get('{vaccine}/exceptions', [VaccineController::class ,'showexceptionsForm'])->name('exceptions');
    Route::put('{vaccine}/exceptions', [VaccineController::class, 'updateexceptions'])->name('update-exceptions');

    // Day intervals
    Route::get('{vaccine}/{day}/intervals', [DayController::class ,'intervalForm'])->name('intervals');
    Route::put('{vaccine}/{day}/intervals', [DayController::class, 'updateInterval'])->name('update-intervals');
});
