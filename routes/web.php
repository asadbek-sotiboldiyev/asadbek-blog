<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;

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

Route::get('/', [HomeController::class, 'home']);

Route::get('/blog', [ArticleController::class, 'index'])->name('blogIndex');
Route::get('/blog/{url}', [ArticleController::class, 'show'])->name('blogShow');
Route::get('/blog/{url}/edit', [ArticleController::class, 'edit'])->name('blogEdit');
Route::post('/blog/{url}/edit', [ArticleController::class, 'update'])->name('blogUpdate');
Route::get('/blog/{url}/delete', [ArticleController::class, 'delete'])->name('blogDelete');
Route::post('/blog/{url}/delete', [ArticleController::class, 'destroy'])->name('blogDestroy');

Route::get('/write', [ArticleController::class, 'create'])->name('blogCreate');
Route::post('/write', [ArticleController::class, 'store'])->name('blogStore');

Route::get('/login-for-admin', [AuthController::class, 'loginView'])->name('loginView');
Route::post('/login-for-admin', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
