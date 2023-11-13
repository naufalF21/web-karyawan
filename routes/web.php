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
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\Auth\EmailVerifyController;
use App\Http\Controllers\Dashboard\ReportController;
use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Dashboard\PresenceController;
use App\Http\Controllers\Dashboard\DashboardController;
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

Route::middleware(['auth', 'verified', 'admin'])->controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'index')->name('profile');
    Route::get('/profile/settings', 'settings')->name('profile.settings');
    Route::get('/profile/edit', 'edit')->name('profile.edit');
    Route::post('/profile/edit', 'update')->name('profile.update');
    Route::delete('/profile/edit', 'deleteProfilePhoto')->name('profile.delete.photo');
    Route::delete('/profile/settings/delete', 'delete')->name('profile.delete.user');
    Route::get('/profile/settings/change-password', 'changePassword')->name('profile.settings.password');
    Route::post('/profile/settings/change-password', 'storePassword')->name('profile.settings.password.store');
});

Route::middleware('guest')->controller(ForgotPasswordController::class)->group(function () {
    Route::get('/reset-password', 'index')->name('password.request');
    Route::post('/reset-password', 'sendEmail')->name('password.email');
    Route::get('/reset-password/change-password/{token}', 'change')->name('password.reset');
    Route::post('/reset-password/change-password', 'reset')->name('password.update');
});

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified', 'admin'])->name('home');

Route::get('/absen', [AbsenController::class, 'index'])->middleware(['auth', 'verified', 'admin'])->name('absen');
Route::post('/absen', [AbsenController::class, 'store'])->middleware(['auth', 'verified', 'admin'])->name('absen.store');
Route::get('/absen/done', [AbsenController::class, 'done'])->middleware(['auth', 'verified', 'admin'])->name('absen.done');

Route::get('/document', [DocumentController::class, 'index'])->middleware(['auth', 'verified', 'admin'])->name('document');
Route::post('/document', [DocumentController::class, 'store'])->middleware(['auth', 'verified', 'admin'])->name('document.store');

Route::get('/document/contact', [ContactController::class, 'index'])->middleware(['auth', 'verified', 'admin'])->name('contact');
Route::post('/document/contact', [ContactController::class, 'store'])->middleware(['auth', 'verified', 'admin'])->name('contact.store');

Route::middleware(['auth', 'verified', 'admin'])->controller(CutiController::class)->group(function () {
    Route::get('/document/cuti/harian', 'index')->name('cuti.harian');
    Route::post('/document/cuti/harian', 'store')->name('cuti.harian.store');
    Route::get('/document/cuti/perjam', 'indexCutiPerJam')->name('cuti.perjam');
    Route::post('/document/cuti/perjam', 'storeCutiPerJam')->name('cuti.perjam.store');
});

Route::get('/document/lembur', [LemburController::class, 'index'])->middleware(['auth', 'verified', 'admin'])->name('lembur');
Route::post('/document/lembur', [LemburController::class, 'store'])->middleware(['auth', 'verified', 'admin'])->name('lembur.store');

Route::get('/document/submit', [DocumentController::class, 'submit'])->middleware(['auth', 'verified', 'admin'])->name('submit');
Route::get('/document/cetak', [DocumentController::class, 'cetak'])->middleware(['auth', 'verified', 'admin'])->name('cetak');

Route::middleware(['auth', 'verified', 'admin'])->controller(NotifikasiController::class)->group(function () {
    Route::post('/notification/read/{userId}', 'markAsRead')->name('notification.read');
    Route::delete('/notification/delete/{userId}', 'clearAll')->name('notification.clearAll');
});

Route::middleware(['auth', 'verified', 'dashboard'])->controller(DashboardController::class)->name('dashboard.')->group(function () {
    Route::get('/dashboard', 'index')->name('index');
});

Route::middleware(['auth', 'verified', 'dashboard'])->controller(EmployeeController::class)->group(function () {
    Route::get('/dashboard/employees', 'index')->name('employee');
    Route::get('/dashboard/employees/add', 'add')->name('employee.add');
    Route::get('/dashboard/employees/edit/{id}', 'edit')->name('employee.edit');
    Route::post('/dashboard/employees/add', 'store')->name('employee.store');
    Route::post('/dashboard/employees/edit/{id}', 'update')->name('employee.update');
    Route::delete('/dashboard/employees/delete/{id}', 'delete')->name('employee.delete');
});

Route::middleware(['auth', 'verified', 'dashboard'])->controller(PresenceController::class)->group(function () {
    Route::get('/dashboard/presence', 'index')->name('presence');
    Route::post('/dashboard/presence/absent/{id}', 'absent')->name('presence.absent');
    Route::get('/dashboard/presence/attended', 'attended')->name('presence.attended');
    Route::post('/dashboard/presence/filter/{page}', 'getFilter')->name('presence.filter');
    Route::get('/dashboard/presence/export', 'export')->name('presence.export');
});

Route::middleware(['auth', 'verified', 'dashboard'])->group(function () {
    Route::controller(RequestRegisterController::class)->group(function () {
        Route::get('/dashboard/request', 'index')->name('request');
        Route::post('/dashboard/request/rejected/{user}', 'rejectedUser')->name('request.rejected');
        Route::post('/dashboard/request/approve/{user}', 'approveUser')->name('request.approve');
    });
    Route::controller(RequestCutiController::class)->group(function () {
        Route::get('/dashboard/request/cuti', 'index')->name('request.cuti');
        Route::post('/dashboard/request/cuti/filter', 'filter')->name('request.cuti.filter');
        Route::get('/dashboard/request/cuti/view/{id}', 'detail')->name('request.cuti.detail');
        Route::post('/dashboard/request/cuti/approve/{cuti}', 'approve')->name('request.cuti.approve');
        Route::post('/dashboard/request/cuti/rejected{cuti}', 'rejected')->name('request.cuti.rejected');
    });
    Route::controller(RequestLemburController::class)->group(function () {
        Route::get('/dashboard/request/lembur', 'index')->name('request.lembur');
        Route::post('/dashboard/request/lembur/filter', 'filter')->name('request.lembur.filter');
        Route::get('/dashboard/request/lembur/view/{id}', 'detail')->name('request.lembur.detail');
        Route::post('/dashboard/request/lembur/approve/{lembur}', 'approve')->name('request.lembur.approve');
        Route::post('/dashboard/request/lembur/rejected{lembur}', 'rejected')->name('request.lembur.rejected');
    });
});

Route::middleware(['auth', 'verified', 'dashboard'])->controller(ReportController::class)->group(function () {
    Route::get('/dashboard/report', 'index')->name('report');
    Route::post('/dashboard/report/filter', 'filter')->name('report.filter');
});
