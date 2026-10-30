<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

// Redirect root URL directly to applications index
Route::get('/', [ApplicationController::class, 'index'])->name('home');

// Generate all standard 7 RESTful CRUD routes
Route::resource('applications', ApplicationController::class);