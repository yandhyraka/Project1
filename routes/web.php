<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleAjaxController;
use App\Http\Controllers\ImageAjaxController;

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

Route::get('/', function () {
    return view('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
// Route::middleware(['auth:sanctum', 'verified'])->get('/article/{id}', function () {
//     return view('article');
// })->name('article');

Route::get('article/{id}', [ArticleAjaxController::class, 'show']);

Route::resource('admin',ArticleAjaxController::class);
Route::resource('image',ImageAjaxController::class);
