<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
})->name('welcome');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get(
    '/user',[UserController::class, 'index']
)->name('user.app');

//LINEログイン機能 男
Route::get(
    '/login/line',
    [LoginController::class, 'redirectToProvider']
)->name('linelogin');

Route::get('/linelogincallback', [LoginController::class, 'handleProviderCallback'])->name('callback');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
