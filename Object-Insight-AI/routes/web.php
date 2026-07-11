<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComparisonController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ObjectAnalyseController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, "index"])->name('dashboard');

    Route::get('/upload-images', [DashboardController::class, "upload_images"])->name('upload-images.index');
    Route::post('/upload-images', [ObjectAnalyseController::class, "upload"])->name('upload-images.post');

    Route::get('/write-images', [DashboardController::class, "writePage"])->name('write-images.index');
    Route::post('/write-images', [ObjectAnalyseController::class, "writeUpload"])->name('write-images.post');

    
    Route::get('/compare-images', [DashboardController::class, "compare_images"])->name('compare-images.index');
    Route::post('/compare-images', [ComparisonController::class, "upload"])->name('compare-images.post');
    

    Route::get('/history', [DashboardController::class, "history"])->name('history.index');
    Route::get('/history-yesterday', [DashboardController::class, "history"])->name('history.yesterday');
    Route::get('/history-week', [DashboardController::class, "history"])->name('history.week');
    Route::get('/history-all', [DashboardController::class, "history"])->name('history.all');

    Route::get('/history-single-analyse/{analyse}', [DashboardController::class, "historySingleObject"])->name('history.single.object');
    Route::get('/history-single-comparison/{comparison}', [DashboardController::class, "historySingleComparison"])->name('history.single.comparison');
});


Route::get('/login', [AuthController::class, "login"])->name('login');
Route::get('/register', [AuthController::class, "register"])->name('register');
Route::get('/logout', [AuthController::class, "logout"])->name('logout');


Route::post('/login', [AuthController::class, "loginPost"])->name('login.post');
Route::post('/register', [AuthController::class, "registerPost"])->name('register.post');

