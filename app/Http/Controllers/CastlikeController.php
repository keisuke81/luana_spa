<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Castlike;

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
}
