<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Route::post('/logout', [UserController::class, 'logout']);

Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');

Route::get('/books', [UserController::class, 'books'])->middleware('auth');

Route::get('/filter/{type:type}', [UserController::class, 'filter']);

Route::get('/dashboard', function() {
	return view('dashboard/index');
})->middleware('auth');

Route::get('/dashboard/trash', function() {
    return view('/dashboard/books/trash');
})->middleware('auth');

Route::resource('/dashboard/books', DashboardAdminController::class)->middleware('auth');
