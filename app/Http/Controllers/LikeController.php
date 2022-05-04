<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Cast;
use App\Models\Castlike;
use App\Models\User;

class LikeController extends Controller
{
    public function like(Request $request, $id){
        $user_id = $request->user_id;

        Like::create([
            'user_id' => $user_id,
            'cast_id' => $id
        ]);
    }

    public function unlike(Request $request, $id){
        $user_id = $request->user_id;
        $like = Like::where('user_id', $user_id)->where('cast_id', $id)->first();

        $like->delete();
    }

    //チャット一覧の表示//
    public function getLikeEach($id)
    {
        $followers = Castlike::where('user_id', $id)->get('cast_id');

        $follows = Like::where('user_id', $id)->get('cast_id');

        $each_follows = $followers->intersect($follows);

        foreach ($each_follows as $each_follow) {
            $cast = Cast::where('id', $each_follow->cast_id)->first();
            $each_follow->nickname = $cast->nickname;
            $each_follow->id = $cast->id;
            $each_follow->img_url = $cast->img_url;
        }

        // チャットユーザ選択画面を表示
        return $each_follows;
    }

    //キャストのLikeされているユーザー表示
    public function getCastLiked($id)
    {
        $items = Like::where('cast_id', $id)->get();

        foreach ($items as $item) {
            $user = User::where('id', $item->user_id)->first();
            $item->nickname = $user->nickname;
            $item->best_score = $user->best_score;
            $item->length_of_golf = $user->length_of_golf;
            $item->id = $user->id;
            $item->img_url = $user->img_url;
        }
        return $items;
    }

}
