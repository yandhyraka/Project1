<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleAjaxController;
use App\Http\Controllers\ImageAjaxController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [DashboardController::class, 'index']);

// Route::get('/dashboard', [DashboardController::class, 'index']);
// Route::middleware(['auth:sanctum', 'verified'])->get('/article/{id}', function () {
//     return view('article');
// })->name('article');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('admins', [ArticleAjaxController::class, 'index'])->name('admins');
Route::get('dashboard/{id}', [DashboardController::class, 'show']);
Route::get('article/{id}', [ArticleAjaxController::class, 'show']);

Route::resource('admin',ArticleAjaxController::class);
Route::resource('image',ImageAjaxController::class);
