<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
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

}
