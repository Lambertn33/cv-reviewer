<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResumeUploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumesController;

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

Route::resource('resumes', ResumesController::class)->only(['index']);
Route::resource('login', LoginController::class)->only(['create', 'store', 'destroy']);
Route::resource('register', RegisterController::class)->only(['create', 'store']);

Route::middleware('auth')->group(function () {
    Route::prefix('resume/upload')->group(function () {
        Route::resource('/', ResumeUploadController::class)->names('resume.upload')->only(['create', 'store']);
    });
});
