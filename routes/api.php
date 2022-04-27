<?php

use App\Http\Controllers\CastController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReserveController;
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

Route::get('/user/myprofile/{id}', [
    UserController::class, 'getMyProfile'
])->name('getMyProfile');

Route::get('/user/myprofile/{id}/edit', [
    UserController::class, 'getMyProfileEdit'
])->name('getMyProfileEdit');

Route::post('/user/myprofile/{id}/update',[
    UserController::class, 'UpdateMyProfile'
])->name('UpdateMyProfile');

Route::get('/user/reserve/{id}', [
    ReserveController::class, 'getUserReserve'
])->name('getUserReserve');

Route::get('/user/reserve/content/{id}',[
    ReserveController::class, 'getUserReserveContent'
]);

Route::post('/user/reserve/delete/{id}', [
    ReserveController::class, 'UserDeleteReserve'
])->name('UserDeleteReserve');
///////////////////////////////////
//キャスト

Route::get('/cast/myprofile/{id}', [
    CastController::class, 'getMyProfile'
])->name('getMyProfile');

Route::get('/cast/myprofile/{id}/edit', [
    CastController::class, 'getMyProfileEdit'
])->name('getMyProfileEdit');

Route::post('/cast/myprofile/{id}/update', [
    CastController::class, 'UpdateMyProfile'
])->name('UpdateMyProfile');

Route::get('/cast/offered/{id}',[
    OfferController::class, 'getCastOffered'
])->name('getCastOffered');

Route::post('/cast/offered/accept/{id}',[
    ReserveController::class, 'AcceptOffer'
])->name('AcceptOffer');

Route::post('/cast/offered/reject/{id}', [
    OfferController::class, 'RejectOffer'
])->name('RejectOffer');

Route::get('/cast/reserve/{id}',[
    ReserveController::class, 'getCastReserve'
])->name('getCastReserve');

Route::get('/cast/offered/detail/{id}',[
    OfferController::class, 'getOfferedDetail'
])->name('getOfferedDetail');

Route::post('/cast/reserve/delete/{id}',[
    ReserveController::class, 'CastDeleteReserve'
])->name('CastDeleteReserve');

Route::get('/cast/reserve/content/{id}',[
    ReserveController::class, 'getReserveContent'
])->name('getReserveContent');

