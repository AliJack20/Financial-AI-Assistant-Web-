<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;

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
    return view('overview');
});

Route::get('/overview', function () {
    return view('overview');
});


Route::get('/analytics', function () {
    return view('analytics');
});

Route::get('/ai-advisor', function () {
    return view('ai-advisor');
});

Route::resource('transactions', TransactionController::class);


//Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

//Dashboard
Route::get('/', [DashboardController::class, 'overview']);
Route::get('/overview', [DashboardController::class, 'overview']);
Route::get('/analytics', [DashboardController::class, 'analytics']);

//Register and Login
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::get('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);