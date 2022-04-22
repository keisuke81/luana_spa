<?php

use App\Http\Controllers\CastController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user/search',[
    CastController::class,'getCastsList'
]);
Route::get('/user/search/{id}',[
    CastController::class,'getCastProfile'
]);

Route::post('/user/offer/create/',[
    OfferController::class,'createOffer'
])->name('createOffer');
