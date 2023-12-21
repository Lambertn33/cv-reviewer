<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResumeUploadController;
use App\Http\Controllers\ResumeDownloadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumesController;
use App\Http\Controllers\User\ResumeReviewController;

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

Route::resource('resumes', ResumesController::class)->only(['index', 'show']);
Route::resource('login', LoginController::class)->only(['create', 'store', 'destroy']);
Route::resource('register', RegisterController::class)->only(['create', 'store']);

Route::middleware('auth')->group(function () {
    Route::prefix('user/resume')->group(function () {
        Route::resource('/', ResumeUploadController::class)->names('user.resume')->only(['create', 'store']);
        Route::get('/viewResume/{resume}', ResumeDownloadController::class)->name('viewResume');
        Route::prefix('reviews')->group(function () {
            Route::resource('', ResumeReviewController::class)->names('user.resume.reviews')->only(['store']);
        });
    });
});
