<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LemburController;

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

Route::get('/absen', [AbsenController::class, 'index'])->middleware('auth')->name('absen');
Route::post('/absen', [AbsenController::class, 'store'])->middleware('auth')->name('absen.store');
Route::get('/absen/done', [AbsenController::class, 'done'])->middleware('auth')->name('absen.done');

Route::get('/document', [DocumentController::class, 'index'])->middleware('auth')->name('document');
Route::post('/document', [DocumentController::class, 'store'])->middleware('auth')->name('document.store');

Route::get('/document/contact', [ContactController::class, 'index'])->middleware('auth')->name('contact');
Route::post('/document/contact', [ContactController::class, 'store'])->middleware('auth')->name('contact.store');

Route::get('/document/cuti', [CutiController::class, 'index'])->middleware('auth')->name('cuti');
Route::post('/document/cuti', [CutiController::class, 'store'])->middleware('auth')->name('cuti.store');

Route::get('/document/lembur', [LemburController::class, 'index'])->middleware('auth')->name('lembur');
Route::post('/document/lembur', [LemburController::class, 'store'])->middleware('auth')->name('lembur.store');

Route::get('/document/submit', [DocumentController::class, 'submit'])->middleware('auth')->name('submit');
Route::get('/document/cetak', [DocumentController::class, 'cetak'])->middleware('auth')->name('cetak');

Route::get('/profile', function () {
    return view('profile.index', [
        'title' => 'Profile',
    ]);
})->middleware('auth')->name('profile');

Route::get('/profile/settings', function () {
    return view('profile.settings', [
        'title' => 'Profile Settings',
    ]);
})->middleware('auth')->name('profile.settings');

Route::middleware('auth')->controller(DashboardController::class)->name('dashboard.')->group(function () {
    Route::get('/dashboard', 'index')->name('index');
    Route::get('/dashboard/absen', 'absen')->name('absen');
    Route::get('/dashboard/employees', 'employees')->name('employees');
    Route::get('/dashboard/request', 'request')->name('request');
    Route::get('/dashboard/report', 'report')->name('report');
});
