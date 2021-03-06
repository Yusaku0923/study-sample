<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudyRecordController;

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

Route::middleware(['auth'])->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('create', [StudyRecordController::class, 'create'])->name('study_record.create');
    Route::post('store', [StudyRecordController::class, 'store'])->name('study_record.store');
    Route::get('review/{id}', [StudyRecordController::class, 'review'])->name('study_record.review');
});