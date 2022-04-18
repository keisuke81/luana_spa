<?php

use App\Http\Controllers\CastController;
use App\Http\Controllers\OfferController;
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

Route::get('/search',[
    CastController::class,'getCastsList'
]);
Route::get('/search/{id}',[
    CastController::class,'getCastProfile'
]);
Route::post('/offer/create',[
    OfferController::class,'createOffer'
])->name('createOffer');