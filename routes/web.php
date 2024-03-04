<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\auth\AuthenticateController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\UserController;

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

Route::get('/', [AuthenticateController::class, 'login']);


Route::resource('user', EmployeeController::class)->middleware('auth');
Route::resource('admin', AdminController::class)->middleware('auth');

Route::resource('user', UserController::class)->middleware('auth');



// AUTHENTICATION
Route::get('login', [AuthenticateController::class, 'login'])->name('login');
Route::post('login', [AuthenticateController::class, 'authenticate'])->name('login');
Route::post('/logout', [AuthenticateController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');