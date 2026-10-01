<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello World!' ]);
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/auth', [LoginController::class, 'authenicate']);

Route::get('category', [CategoryController::class, 'index']);
Route::get('category/{id}', [CategoryController::class, 'show']);

Route::get('task/create', [TaskController::class, 'create'])->middleware('auth');
Route::get('task/destroy/{id}', [TaskController::class, 'destroy'])->middleware('auth');
Route::get('task/edit/{id}', [TaskController::class, 'edit'])->middleware('auth');
Route::post('task/update/{id}', [TaskController::class, 'update'])->middleware('auth');
Route::post('task', [TaskController::class, 'store']);
Route::get('task', [TaskController::class, 'index']);
Route::get('task/{id}', [TaskController::class, 'show']);

Route::get('/error', function () {
    return view('error', ['message' => session('message')]);
});
