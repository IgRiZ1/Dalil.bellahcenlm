<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Publieke routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authenticatie routes (alleen voor guests)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');
});

// Publieke content routes
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{newsItem}', [NewsController::class, 'show'])->name('news.show');
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/profile/{username}', [ProfileController::class, 'show'])->name('profile.show');

// Beveiligde routes (alleen voor ingelogde gebruikers)
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
    Route::get('/dashboard/settings', [DashboardController::class, 'settings'])->name('dashboard.settings');
    
    // Profiel bewerken
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    
    // Admin routes (met admin middleware)
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        // Dashboard
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        
        // Gebruikersbeheer
        Route::get('/users', [AdminController::class, 'users'])->name('users');
        Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
        Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');
        Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('users.edit');
        Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('users.update');
        Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');
        Route::patch('/users/{user}/toggle-admin', [AdminController::class, 'toggleAdmin'])->name('users.toggle-admin');
        
        // Nieuws beheer
        Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
        Route::post('/news', [NewsController::class, 'store'])->name('news.store');
        Route::get('/news/{newsItem}/edit', [NewsController::class, 'edit'])->name('news.edit');
        Route::put('/news/{newsItem}', [NewsController::class, 'update'])->name('news.update');
        Route::delete('/news/{newsItem}', [NewsController::class, 'destroy'])->name('news.destroy');
        
        // FAQ beheer
        Route::get('/faq/categories/create', [FaqController::class, 'createCategory'])->name('faq.categories.create');
        Route::post('/faq/categories', [FaqController::class, 'storeCategory'])->name('faq.categories.store');
        Route::get('/faq/categories/{faqCategory}/edit', [FaqController::class, 'editCategory'])->name('faq.categories.edit');
        Route::put('/faq/categories/{faqCategory}', [FaqController::class, 'updateCategory'])->name('faq.categories.update');
        Route::delete('/faq/categories/{faqCategory}', [FaqController::class, 'destroyCategory'])->name('faq.categories.destroy');
        
        Route::get('/faq/questions/create', [FaqController::class, 'createQuestion'])->name('faq.questions.create');
        Route::post('/faq/questions', [FaqController::class, 'storeQuestion'])->name('faq.questions.store');
        Route::get('/faq/questions/{faqQuestion}/edit', [FaqController::class, 'editQuestion'])->name('faq.questions.edit');
        Route::put('/faq/questions/{faqQuestion}', [FaqController::class, 'updateQuestion'])->name('faq.questions.update');
        Route::delete('/faq/questions/{faqQuestion}', [FaqController::class, 'destroyQuestion'])->name('faq.questions.destroy');
        
        // Contact berichten beheer
        Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
        Route::get('/contact/{contact}', [ContactController::class, 'showMessage'])->name('contact.show-message');
        Route::delete('/contact/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy');
    });
});