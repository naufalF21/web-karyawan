<?php

use App\Http\Controllers\DocumentsController;
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
    return view('welcome.index', [
        'title' => 'Welcome'
    ]);
})->middleware('guest');

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

Route::get('/documents', [DocumentsController::class, 'index'])->middleware('auth')->name('documents');
Route::get('/documents/contact', [DocumentsController::class, 'contact'])->middleware('auth')->name('contact');
Route::get('/documents/cuti', [DocumentsController::class, 'cuti'])->middleware('auth')->name('cuti');
Route::get('/documents/lembur', [DocumentsController::class, 'lembur'])->middleware('auth')->name('lembur');
Route::get('/documents/submit', [DocumentsController::class, 'submit'])->middleware('auth')->name('submit');
