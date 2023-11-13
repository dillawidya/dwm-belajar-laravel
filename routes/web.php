<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);
Route::get('/hello', [App\Http\Controllers\HelloController::class, 'hello']);
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index']);
Route::get('/product', [App\Http\Controllers\ProductController::class, 'index']);