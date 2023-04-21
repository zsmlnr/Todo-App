<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\AppController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\HandleInertiaRequests;

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

Route::middleware(['web', HandleInertiaRequests::class])->group(function () {
    //Website
    Route::get('/', [HomeController::class, 'index'])->middleware('guest')->name('home');
    //Application
    //Sign-Up
    Route::get('/sign-up', [UserController::class, 'register'])->middleware('guest')->name('signup');
    Route::post('/sign-up/store', [UserController::class, 'store'])->middleware('guest')->name('signup.store');
    //Auth
    Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('login');
    Route::post('/login/auth', [UserController::class, 'auth'])->middleware('guest')->name('login.auth');
    //Dashboard
    Route::get('/dashboard', [AppController::class, 'index'])->middleware('auth')->name('dashboard');
    //User
    Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');
});
