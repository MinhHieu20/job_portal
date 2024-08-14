<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'account'], function () {

    //Guest
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', [AccountController::class, 'login'])->name('account.login');
        Route::get('/register', [AccountController::class, 'registration'])->name('account.registration');
        Route::post('/process-register', [AccountController::class, 'processRegistration'])->name('account.processRegistration');
        Route::post('/authenticate', [AccountController::class, 'authenticate'])->name('account.authenticate');
    });
    //Authentication
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/logout', [AccountController::class, 'login'])->name('account.login');
        Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile');
        Route::put('/update-profile', [AccountController::class, 'updateProfile'])->name('account.updateProfile');
        Route::post('/update-profile-pc', [AccountController::class, 'updateProfilePic'])->name('account.updateProfilePic');
    });
});
