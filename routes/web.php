<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPasswordController;

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

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::get('/register/verification', [RegisterController::class, 'verification'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->middleware('guest');
Route::get('/forgot-password/verification', [ForgotPasswordController::class, 'verification'])->middleware('guest');
Route::get('/forgot-password/change-password', [ForgotPasswordController::class, 'change'])->middleware('guest');

Route::get('/home', function () {
    return view('home.index', [
        'title' => 'Home',
    ]);
})->middleware('auth')->name('home');

Route::get('/absen', function () {
    return view('absen.index', [
        'title' => 'Absen',
    ]);
})->middleware('auth')->name('absen');
