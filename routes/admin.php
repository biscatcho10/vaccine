<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ConditionController;
use App\Http\Controllers\Admin\EligapilityController;
use App\Http\Controllers\Admin\ExceptionController;
use App\Http\Controllers\Admin\IntervalController;
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

    // Vaccines
    Route::get('{vaccine}/requests', [VaccineController::class, 'getRequest'])->name('get.requestS');
    Route::get('{vaccine}/requests/{request}', [VaccineController::class, 'showRequest'])->name('show.request');

    // Questions
    Route::resource('{vaccine}/question', QuestionController::class);
    Route::post('{vaccine}/copy/questions', [QuestionController::class, 'copy'])->name('copy-questions');


    // ELIGABILITY
    Route::get('{vaccine}/eligapilities', [EligapilityController::class ,'get'])->name('eligapility');
    Route::put('{vaccine}/eligapilities', [EligapilityController::class, 'update'])->name('update-eligapility');
    Route::post('{vaccine}/copy/eligapilities', [EligapilityController::class, 'copy'])->name('copy-eligapilities');


    // Conditions
    Route::get('{vaccine}/Conditions', [ConditionController::class ,'get'])->name('conditions');
    Route::put('{vaccine}/Conditions', [ConditionController::class, 'update'])->name('update-conditions');
    Route::post('{vaccine}/copy/Conditions', [ConditionController::class, 'copy'])->name('copy-conditions');

    // Exceptions
    Route::get('{vaccine}/exceptions', [ExceptionController::class ,'get'])->name('exceptions');
    Route::put('{vaccine}/exceptions', [ExceptionController::class, 'update'])->name('update-exceptions');

    // Day intervals
    Route::get('{vaccine}/{day}/intervals', [IntervalController::class ,'get'])->name('intervals');
    Route::put('{vaccine}/{day}/intervals', [IntervalController::class, 'update'])->name('update-intervals');
    Route::post('{vaccine}/{day}/copy/intervals', [IntervalController::class, 'copy'])->name('copy-intervals');

});
