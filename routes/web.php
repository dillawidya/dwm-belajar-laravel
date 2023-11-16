<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);
Route::get('/hello', [HomeController::class, 'hello']);
Route::get('/dashboard', function () {
    return view('pages.dashboard');
});
Route::get('/products', function () {
    return view('pages.products');
});
Route::get('/add', function () {
    return view('pages.add');
});
Route::resource('products', ProductsController::class);

    