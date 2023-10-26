<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\Auth\EmailVerifyController;
use App\Http\Controllers\Dashboard\ReportController;
use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\AbsenDashboardController;
use App\Http\Controllers\Dashboard\Request\CutiController as RequestCutiController;
use App\Http\Controllers\Dashboard\Request\LemburController as RequestLemburController;
use App\Http\Controllers\Dashboard\Request\RegisterController as RequestRegisterController;

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

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('register');
Route::get('/register/verification', [RegisterController::class, 'verification'])->middleware('guest')->name('register.verification');
Route::post('/register', [RegisterController::class, 'store']);

Route::controller(EmailVerifyController::class)->group(function () {
    Route::get('/email/verify', 'index')
        ->middleware('auth')
        ->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'verify')
        ->middleware('auth')
        ->name('verification.verify');
    Route::post('/email/verification-notification', 'resend')
        ->middleware(['auth', 'throttle:6,1'])
        ->name('verification.send');
});

Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->middleware('guest');
Route::get('/forgot-password/verification', [ForgotPasswordController::class, 'verification'])->middleware('guest');
Route::get('/forgot-password/change-password', [ForgotPasswordController::class, 'change'])->middleware('guest');

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::get('/absen', [AbsenController::class, 'index'])->middleware(['auth', 'verified'])->name('absen');
Route::post('/absen', [AbsenController::class, 'store'])->middleware(['auth', 'verified'])->name('absen.store');
Route::get('/absen/done', [AbsenController::class, 'done'])->middleware(['auth', 'verified'])->name('absen.done');

Route::get('/document', [DocumentController::class, 'index'])->middleware(['auth', 'verified'])->name('document');
Route::post('/document', [DocumentController::class, 'store'])->middleware(['auth', 'verified'])->name('document.store');

Route::get('/document/contact', [ContactController::class, 'index'])->middleware(['auth', 'verified'])->name('contact');
Route::post('/document/contact', [ContactController::class, 'store'])->middleware(['auth', 'verified'])->name('contact.store');

Route::middleware(['auth', 'verified'])->controller(CutiController::class)->group(function () {
    Route::get('/document/cuti/harian', 'index')->name('cuti.harian');
    Route::post('/document/cuti/harian', 'store')->name('cuti.harian.store');
    Route::get('/document/cuti/perjam', 'indexCutiPerJam')->name('cuti.perjam');
    Route::post('/document/cuti/perjam', 'storeCutiPerJam')->name('cuti.perjam.store');
});

Route::get('/document/lembur', [LemburController::class, 'index'])->middleware(['auth', 'verified'])->name('lembur');
Route::post('/document/lembur', [LemburController::class, 'store'])->middleware(['auth', 'verified'])->name('lembur.store');

Route::get('/document/submit', [DocumentController::class, 'submit'])->middleware(['auth', 'verified'])->name('submit');
Route::get('/document/cetak', [DocumentController::class, 'cetak'])->middleware(['auth', 'verified'])->name('cetak');

Route::middleware(['auth', 'verified'])->controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'index')->name('profile');
    Route::get('/profile/settings', 'settings')->name('profile.settings');
    Route::get('/profile/edit', 'edit')->name('profile.edit');
    Route::post('/profile/edit', 'update')->name('profile.update');
    Route::delete('/profile/edit', 'delete')->name('profile.delete');
});

Route::middleware(['auth', 'verified'])->controller(DashboardController::class)->name('dashboard.')->group(function () {
    Route::get('/dashboard', 'index')->name('index');
});

Route::middleware(['auth', 'verified'])->controller(EmployeeController::class)->group(function () {
    Route::get('/dashboard/employees', 'index')->name('employee');
    Route::get('/dashboard/employees/add', 'add')->name('employee.add');
    Route::get('/dashboard/employees/edit/{id}', 'edit')->name('employee.edit');
    Route::post('/dashboard/employees/add', 'store')->name('employee.store');
    Route::post('/dashboard/employees/edit/{id}', 'update')->name('employee.update');
    Route::delete('/dashboard/employees/delete/{id}', 'delete')->name('employee.delete');
});

Route::middleware(['auth', 'verified'])->controller(AbsenDashboardController::class)->group(function () {
    Route::get('/dashboard/absen', 'index')->name('absenDashboard');
    Route::get('/dashboard/absen/filter', 'getFilter')->name('absenDashboard.filter');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(RequestRegisterController::class)->group(function () {
        Route::get('/dashboard/request', 'index')->name('request');
        Route::post('/dashboard/request/rejected/{user}', 'rejectedUser')->name('request.rejected');
        Route::post('/dashboard/request/approve/{user}', 'approveUser')->name('request.approve');
    });
    Route::controller(RequestCutiController::class)->group(function () {
        Route::get('/dashboard/request/cuti', 'index')->name('request.cuti');
        Route::get('/dashboard/request/cuti/filter', 'filter')->name('request.cuti.filter');
        Route::get('/dashboard/request/cuti/view/{id}', 'detail')->name('request.cuti.detail');
        Route::post('/dashboard/request/cuti/approve/{cuti}', 'approve')->name('request.cuti.approve');
        Route::post('/dashboard/request/cuti/rejected{cuti}', 'rejected')->name('request.cuti.rejected');
    });
    Route::controller(RequestLemburController::class)->group(function () {
        Route::get('/dashboard/request/lembur', 'index')->name('request.lembur');
        Route::get('/dashboard/request/lembur/filter', 'filter')->name('request.lembur.filter');
        Route::get('/dashboard/request/lembur/view/{id}', 'detail')->name('request.lembur.detail');
        Route::post('/dashboard/request/lembur/approve/{lembur}', 'approve')->name('request.lembur.approve');
        Route::post('/dashboard/request/lembur/rejected{lembur}', 'rejected')->name('request.lembur.rejected');
    });
});

Route::middleware(['auth', 'verified'])->controller(ReportController::class)->group(function () {
    Route::get('/dashboard/report', 'index')->name('report');
});
