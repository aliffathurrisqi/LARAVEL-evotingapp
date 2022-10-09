<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'default']);

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('/login/auth', [LoginController::class, 'authenticate']);

Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/home', [IndexController::class, 'index'])->middleware('user');

Route::post('/votes/make', [IndexController::class, 'vote'])->middleware('user');

Route::get('/votes', [IndexController::class, 'show'])->middleware('user');

Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');

Route::get('/admin/candidate', [AdminController::class, 'candidate'])->middleware('admin');

Route::post('/admin/candidate/add', [AdminController::class, 'addCandidate'])->middleware('admin');

Route::post('/admin/candidate/edit', [AdminController::class, 'editCandidate'])->middleware('admin');

Route::post('/admin/candidate/delete', [AdminController::class, 'deleteCandidate'])->middleware('admin');

Route::get('/admin/user', [AdminController::class, 'user'])->middleware('admin');

Route::post('/admin/user/add', [AdminController::class, 'addUser'])->middleware('admin');
