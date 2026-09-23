<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello World!' ]);
});

Route::get('category', [CategoryController::class, 'index']);
Route::get('category/{id}', [CategoryController::class, 'show']);

Route::get('task/create', [TaskController::class, 'create']);
Route::get('task/destroy/{id}', [TaskController::class, 'destroy']);
Route::get('task/edit/{id}', [TaskController::class, 'edit']);
Route::post('task', [TaskController::class, 'store']);
Route::get('task', [TaskController::class, 'index']);
Route::get('task/{id}', [TaskController::class, 'show']);
