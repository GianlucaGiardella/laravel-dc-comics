<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\Guest\ComicController;

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

Route::get('/', [PageController::class, "home"])->name("home");
Route::get('/about', [PageController::class, "about"])->name("about");

Route::get('/comics/trashed', [ComicController::class, 'trashed'])->name('comics.trashed');
Route::post('/comics/{comic}/restore', [ComicController::class, 'restore'])->name('comics.restore');
Route::delete('/comics/{comic}/hard_delete', [ComicController::class, 'hard_delete'])->name('comics.hard_delete');

Route::resource('comics', ComicController::class);