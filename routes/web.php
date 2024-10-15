<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RiwayatEventController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('landing-page');
})->name('landing-page');

Route::get('/event', function () {
    return view('event-lp');
})->name('event');


//Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

//Register
Route::get('/registrasi', [RegisterController::class, 'index'])->name('registrasi');
Route::post('/registrasi', [RegisterController::class, 'register']);

//Event-Admin
Route::post('/event', [EventController::class, 'store'])->name('event.store');
Route::get('/event-tambah', [EventController::class, 'showForm'])->name('event.tambah.form');
Route::post('/event-tambah', [EventController::class, 'tambah'])->name('event-tambah');
Route::get('/event-admin', [EventController::class, 'AdminIndex'])->name('event-admin');
Route::get('/detail-event{id}', [EventController::class, 'showDetail'])->name('detail-event');
Route::delete('/event/{id}', [EventController::class, 'destroy'])->name('event.destroy');
Route::get('/admin-edit{id}', [EventController::class, 'edit'])->name('admin-edit');
Route::put('/event/{id}', [EventController::class, 'update'])->name('event.update');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/event-lp', [EventController::class, 'eventLp'])->name('event-lp');
Route::get('/peserta/{eventId}', [EventController::class, 'showPeserta'])->name('show-peserta');
Route::put('/update-certification-status', [CertificateController::class, 'updateCertificationStatus'])->name('update-certification-status');


//Event-User 
Route::get('/dashboard-user', [DashboardController::class, 'userIndex'])->name('dashboard-user');
Route::get('/info-event{id}', [DashboardController::class, 'showInfo'])->name('info-event');
Route::get('/riwayat-event', [RiwayatEventController::class, 'showHistory'])->name('riwayat-event');
Route::get('/generate-certificate/{registrationId}', [CertificateController::class, 'generate'])->name('generate-certificate');
Route::put('/profile/update', [DashboardController::class, 'update'])->name('profile.update');

//Pendaftaran
Route::post('/daftar-event/{event}', [RegistrationController::class, 'store'])->name('daftar-event');
Route::get('/event-seminar', [RegistrationController::class, 'index'])->name('event-seminar');
Route::get('/event/{id}', [RegistrationController::class, 'show'])->name('event.show');
Route::delete('/registrations/{id}', [RegistrationController::class, 'cancel'])->name('registration.cancel');

//Payment
Route::get('/bayar/{eventId}', [PaymentController::class, 'showPaymentPage'])->name('bayar.event');
Route::post('/bayar-event/{id}', [PaymentController::class, 'processPayment'])->name('process.payment');
Route::post('/midtrans/notification', [PaymentController::class, 'handleNotification']);
Route::post('/midtrans/callback', [PaymentController::class, 'handleCallback']);


// bagian admin //

Route::get('/layout', function () {
    return view('layout');
})->name('layout');

