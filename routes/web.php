<?php

use App\Http\Controllers\UssdController;
use App\Jobs\ProcessTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WhitelistController;

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

Route::middleware("guest")->group(function () {
    Route::get('/', function () {
        return view('layouts.app');
    });
});

Route::middleware(['web', 'auth'])->group(function () {
    // home Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Edit profile
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('profile/{user}', [ProfileController::class, 'update'])->name('profile.update');

    // change password
    Route::get('/change-password', [ProfileController::class, 'showChangePassword'])->name('changePassword');
    Route::post('/change-password', [ProfileController::class, 'changePassword'])->name('profile.changePassword');

    // users list
    Route::get('/users', [UserController::class, 'index'])->name('users');

    // Show create users
    Route::get('/show-user', [UserController::class, 'show'])->name('show-user');

    // Add Users
    Route::post('/create-user', [UserController::class, 'create'])->name('create-user');

    // Registrars
    Route::get('/registrars', [HomeController::class, 'registrars'])->name('registrars');

    Route::get('/discounts', [HomeController::class, 'discounts'])->name('discounts');
    Route::get('/check-discounts', [HomeController::class, 'checkDiscounts'])->name('check-discounts');




Route::prefix('whitelist')->group(function () {
    Route::get('/', [UssdController::class, 'index'])->name('whitelist.index');
    Route::get('/create', [UssdController::class, 'create'])->name('whitelist.create');
    Route::post('/store', [UssdController::class, 'store'])->name('whitelist.store');
    Route::post('/update/{id}',[UssdController::class, 'update' ])->name('whitelist.update');
    Route::post('/destroy/{id}',[UssdController::class, 'destroy' ])->name('whitelist.destroy');
});


Route::prefix('web')->group(function () {
    Route::get('/', [WebController::class, 'index'])->name('web.index');
    Route::get('/create', [WebController::class, 'create'])->name('web.create');
    Route::post('/store', [WebController::class, 'store'])->name('web.store');
    Route::post('/update/{id}',[WebController::class, 'update' ])->name('web.update');
    Route::post('/destroy/{id}',[WebController::class, 'destroy' ])->name('web.destroy');
});


Route::prefix('mobile')->group(function () {
    Route::get('/', [MobileController::class, 'index'])->name('mobile.index');
    Route::get('/create', [MobileController::class, 'create'])->name('mobile.create');
    Route::post( '/store', [MobileController::class, 'store'])->name('mobile.store');
    Route::post('/update/{id}',[MobileController::class, 'update' ])->name('mobile.update');
    Route::post('/destroy/{id}',[MobileController::class, 'destroy' ])->name('mobile.destroy');
});




});




