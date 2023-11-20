<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('beranda');
    
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    
    
    
    
});

Route::middleware('auth', 'level')->group(function () {
    Route::get('/hello', [HomeController::class, 'hello'])->name('hello');
});


// Route::get('/dashboard', function () {
//     return view('pages.dashboard');
// });
// Route::get('/products', function () {
//      return view('pages.products');
//  });
 Route::get('/add', function () {
    return view('pages.add');
 });
 Route::resource('products', HomeController::class);

require __DIR__.'/auth.php';
