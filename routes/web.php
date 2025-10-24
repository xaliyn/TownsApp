<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\DatabaseController;


// Contact form – open to all visitors
Route::get('/contact', [MessageController::class, 'contact'])->name('contact');
Route::post('/contact', [MessageController::class, 'store'])->name('contact.store');

// Messages list – only logged-in users (registered + admin)
Route::get('/messages', [MessageController::class, 'index'])->middleware('auth')->name('messages');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Main Page
Route::get('/', fn() => view('index'))->name('home');

// Database Menu (Task 4)
Route::get('/database', [DatabaseController::class, 'index'])->middleware('auth');
// Graph (Task 7)
Route::get('/graph', fn() => view('graph'));

// CRUD (Task 8)
Route::get('/crud', fn() => view('crud'))->middleware('auth');

// Admin (Task 3 – visible only for role=admin)
Route::get('/admin', fn() => view('admin'))->middleware('auth');
