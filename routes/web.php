<?php

use App\Http\Controllers\Auth\LoginController;
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


Route::get('/user/{any}', function(){
    return view('app');
})->where('any','.*')->name('user.app');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//LINEログイン機能 男
Route::get(
    '/login/line',
    [LoginController::class, 'redirectToProvider']
)->name('linelogin');

Route::get('/linelogincallback', [LoginController::class, 'handleProviderCallback'])->name('callback');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
