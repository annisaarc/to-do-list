<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'register'])->middleware('guest');
Route::get('/register', [UserController::class, 'register'])->middleware('guest');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/register', [UserController::class, 'createRegister']);
Route::post('/login', [UserController::class, 'createLogin']);

Route::get('/home', [TaskController::class, 'index'])->middleware('auth');
Route::post('/task/create', [TaskController::class, 'create'])->middleware('auth');
Route::get('/task/complete/{id}', [TaskController::class, 'complete'])->middleware('auth');
Route::get('/task/delete/{id}', [TaskController::class, 'delete'])->middleware('auth');
Route::get('/task/edit/{id}', [TaskController::class, 'edit'])->middleware('auth');
Route::post('/task/edit', [TaskController::class, 'update'])->middleware('auth');

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');