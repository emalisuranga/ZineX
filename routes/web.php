<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriversDetailsController;
use App\Http\Controllers\VehicleDetailsController;
use App\Http\Controllers\RentalDetailsController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('user.login');
});

Route::resource('drivers', DriversDetailsController::class);
Route::resource('vehicle', VehicleDetailsController::class);
Route::get('/drivers/{id}', [DriversDetailsController::class, 'show']);
Route::get('/drivers/{id}/delete', [DriversDetailsController::class, 'destroy']);
Route::post('/filterSearch', [UserController::class, 'filterSearch']);

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'storeUser']);

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'authenticate']);
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::get('/home', [UserController::class, 'home'])->name('home');
Route::get('/booking/{id}', [UserController::class, 'request']);
Route::post('/test', [UserController::class, 'booking']);

Route::resource('admin', RentalDetailsController::class);


