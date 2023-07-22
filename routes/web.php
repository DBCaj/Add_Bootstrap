<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/add', [UserController::class, 'add'])->name('user.add_form');

Route::post('/add-auth', [UserController::class, 'addAuth'])->name('user.add.auth');