<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Castlike;
use App\Models\Like;
use App\Models\User;
use App\Models\Cast;

class CastlikeController extends Controller
{
    public function like(Request $request, $id)
    {
        $cast_id = $request->cast_id;

        Castlike::create([
            'cast_id' => $cast_id,
            'user_id' => $id
        ]);
    }

    public function unlike(Request $request, $id)
    {
        $cast_id = $request->cast_id;
        $like = Castlike::where('cast_id', $cast_id)->where('user_id', $id)->first();

        $like->delete();
    }

    //チャット一覧の表示//
    public function getLikeEach($id)
    {
        $followers = Like::where('cast_id', $id)->get('user_id');

        $follows = Castlike::where('cast_id', $id)->get('user_id');

        $each_follows = $followers->intersect($follows);

        foreach ($each_follows as $each_follow) {
            $user = User::where('id', $each_follow->user_id)->first();
            $each_follow->nickname = $user->nickname;
            $each_follow->id = $user->id;
            $each_follow->img_url = $user->img_url;
        }

        // チャットユーザ選択画面を表示
        return $each_follows;
    }

    //ユーザーのLikeされているキャスト表示
    public function getUserLiked($id){
        $items = Castlike::where('user_id', $id)->get();

        foreach($items as $item){
            $cast = Cast::where('id', $item->cast_id)->first();
            $item->nickname = $cast->nickname;
            $item->best_score = $cast->best_score;
            $item->length_of_golf = $cast->length_of_golf;
            $item->id = $cast->id;
            $item->img_url = $cast->img_url;
        }
        return $items;
    }
}
