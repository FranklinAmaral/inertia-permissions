<?php

use App\Http\Controllers\AccessController;
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

Route::redirect('/', 'login');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('posts', \App\Http\Controllers\PostController::class);
    Route::inertia('pages/about', 'About')->name('pages.about');
    Route::resource('access', AccessController::class);
});

Route::inertia('login', 'Auth/Login')->name('login');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'store'])
->name('login.post');
Route::post('logout', [\App\Http\Controllers\Auth\LoginController::class, 'destroy'])
->name('logout');
Route::inertia('register', 'Auth/Register')->name('register');
Route::post('register', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'store'])
->name('login.register');

