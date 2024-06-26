<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrashedBookController;
use App\Http\Controllers\DashboardAdminController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', [HomeController::class, 'about']);

Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/register', [UserController::class, 'register'])->middleware('guest');

Route::post('/register', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'login'])->middleware('guest');

Route::post('/login', [UserController::class, 'authenticate'])->name('login');

Route::get('/wishlist', [UserController::class, 'wishlist'])->middleware('auth');

Route::get('/borrowed', [UserController::class, 'borrowed'])->middleware('auth');

Route::post('/logout', [UserController::class, 'logout']);

Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');

Route::get('/books', [UserController::class, 'books'])->middleware('auth');

Route::post('/books/search', [UserController::class, 'search'])->name('books/search');

Route::get('/book/{book}', [UserController::class, 'detail']);

Route::get('/dashboard', function() {
	return view('dashboard/index');
})->middleware('admin');

Route::get('/dashboard/trash', [TrashedBookController::class, 'archive'])->middleware('admin');

Route::post('/dashboard/trash/{book}/restore', [TrashedBookController::class, 'restore'])->withTrashed()->middleware('admin');

Route::delete('/dashboard/trash/{book}', [TrashedBookController::class, 'destroy'])->withTrashed()->middleware('admin');

Route::resource('/dashboard/books', DashboardAdminController::class)->middleware('admin');
