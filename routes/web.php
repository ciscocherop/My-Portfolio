<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortflioController;

Route::get('/', [PortflioController::class, 'index']);

// Optional resource routes for portfolio pages
Route::resource('portfolio', PortflioController::class)->only(['index','show']);
