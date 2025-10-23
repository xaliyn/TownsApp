<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('index'));
Route::get('/database', fn() => view('database'));
Route::get('/contact', fn() => view('contact'));
Route::get('/graph', fn() => view('graph'));
Route::get('/crud', fn() => view('crud'));
Route::get('/admin', fn() => view('admin'));
