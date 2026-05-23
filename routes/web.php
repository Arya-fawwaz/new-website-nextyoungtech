<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\GoogleAuthController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/features', [HomeController::class, 'features'])->name('features');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/quotation', [QuotationController::class, 'index'])->name('quotation.index');
Route::post('/quotation', [QuotationController::class, 'store'])->name('quotation.store');

// Custom Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Google Authentication Routes (Socialite & Mode Hibrida)
Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');
Route::post('/auth/google/save-credentials', [GoogleAuthController::class, 'saveCredentials'])->name('auth.google.save-credentials');
Route::get('/auth/google/simulate', [GoogleAuthController::class, 'showSimulationPage'])->name('auth.google.simulate');
Route::post('/auth/google/callback-demo', [GoogleAuthController::class, 'handleDemoCallback'])->name('auth.google.callback-demo');

// Chatbot Assistant Routes
Route::post('/chatbot/message', [\App\Http\Controllers\ChatbotController::class, 'handleMessage'])->name('chatbot.message');

// Admin Panel Routes
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::post('/admin/inquiry/{id}/status', [AdminController::class, 'updateInquiryStatus'])->name('admin.inquiry.status');
Route::post('/admin/quotation/{id}/status', [AdminController::class, 'updateQuotationStatus'])->name('admin.quotation.status');

// CRUD Layanan Admin
Route::post('/admin/layanan', [AdminController::class, 'storeService'])->name('admin.service.store');
Route::post('/admin/layanan/{id}/update', [AdminController::class, 'updateService'])->name('admin.service.update');
Route::post('/admin/layanan/{id}/delete', [AdminController::class, 'deleteService'])->name('admin.service.delete');

// CRUD Pengguna Admin
Route::post('/admin/pengguna', [AdminController::class, 'storeUser'])->name('admin.user.store');
Route::post('/admin/pengguna/{id}/update', [AdminController::class, 'updateUser'])->name('admin.user.update');
Route::post('/admin/pengguna/{id}/delete', [AdminController::class, 'deleteUser'])->name('admin.user.delete');

// Ekspor Data
Route::get('/admin/ekspor/{type}', [AdminController::class, 'exportCsv'])->name('admin.export');

// Tutup Pembukuan
Route::post('/admin/tutup-pembukuan', [AdminController::class, 'tutupPembukuan'])->name('admin.tutup-pembukuan');

// User Profile Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::post('/profile/review', [ProfileController::class, 'storeReview'])->name('profile.review');
    Route::get('/review', [ProfileController::class, 'showReviewForm'])->name('review.create');
});

