<?php

use App\Http\Controllers\CastController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\CastlikeController;
use App\Http\Controllers\ChatController;
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
Route::get('/user/search/{id}/{user_id}',[
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

Route::post('/user/myprofile/fileupload/{id}',[
    UserController::class, 'fileUpload'
]);

Route::post('/user/like/{id}',[
    LikeController::class, 'like'
]);

Route::post('/user/unlike/{id}',[
    LikeController::class, 'unlike'
]);

Route::get('/user/chat/list/{id}',[
    LikeController::class, 'getLikeEach'
]);

Route::get('/user/chat/room/{id}/{cast_id}',[
    ChatController::class,'getChatRoom'
]);

Route::post('/user/chat/send',[
    ChatController::class, 'chatSend'
]);

Route::get('/user/liked/{id}',[
    CastlikeController::class, 'getUserLiked'
]);
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

Route::post('/cast/myprofile/fileupload/{id}', [
    CastController::class, 'fileUpload'
]);

Route::get('/cast/search', [
    UserController::class, 'getUsersList'
]);

Route::get('/cast/search/{id}/{cast_id}', [
    UserController::class, 'getUserProfile'
]);

Route::post('/cast/like/{id}', [
    CastlikeController::class, 'like'
]);

Route::post('/cast/unlike/{id}', [
    CastlikeController::class, 'unlike'
]);

Route::get('/cast/chat/list/{id}', [
    CastlikeController::class, 'getLikeEach'
]);

Route::get('/cast/chat/room/{id}/{user_id}', [
    ChatController::class, 'getCastChatRoom'
]);

Route::post('/cast/chat/send', [
    ChatController::class, 'CastchatSend'
]);
