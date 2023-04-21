<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\AppController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskContoller;
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
    //Dashboard/Board/Settigns
    Route::get('/dashboard', [AppController::class, 'index'])->middleware('auth')->name('dashboard');
    Route::get('/dashboard/board', [TaskContoller::class, 'index'])->middleware('auth')->name('board');
    //User
    Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');
    //User update E-Mail
    Route::put('/updateEmail', [UserController::class, 'updateEmail'])->middleware('auth')->name('profile.email');
    //User update Password
    Route::put('/updatePassword', [UserController::class, 'updatePassword'])->middleware('auth')->name('profile.password');
    //Update profile Picture
    Route::post('/updatePicture', [UserController::class, 'updatePicture'])->middleware('auth')->name('profile.picture');
    //Task
    Route::get('/new-task', [TaskContoller::class, 'create'])->middleware('auth')->name('addTask');
    //Store Task
    Route::post('/new-task/create', [TaskContoller::class, 'store'])->middleware('auth')->name('storeTask');
    //Marked as Done
    Route::put('/dashboard/board/{task}', [TaskContoller::class, 'done'])->middleware('auth')->name('task.done');
    //Delete Task
    Route::delete('/dashboard/board/{task}', [TaskContoller::class, 'destroy'])->middleware('auth')->name('task.destroy');
});
