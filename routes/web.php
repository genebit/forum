<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ThreadController;
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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/', [ThreadController::class, 'postThread'])->name('post-thread');

Route::get('/content/view/{id}', [ThreadController::class, 'viewContent'])->name('view-content');
Route::post('/content/post-comment', [ThreadController::class, 'postComment'])->name('post-comment');
