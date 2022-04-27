<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cast;
use Illuminate\Support\Facades\Auth;

class CastController extends Controller
{
    public function getCastsList(){
        $items = Cast::get();

        return [
            'items' => $items
        ];
    }

    public function getCastProfile(Cast $id)
    {
        $cast = Cast::find($id)->last();
        return $cast;
    }

    public function index(){
        $cast_id = Auth::id();

        return view('cast')->with([
            'cast_id' => $cast_id
        ]);
    }

    public function getMyProfile(Cast $id)
    {
        return $id;
    }

    public function getMyProfileEdit(Cast $id)
    {
        $name = $id->name;
        $nickname = $id->nickname;
        $birthday = $id->birthday;
        $occupation = $id->occupation;
        $possible_date_round = $id->possible_date_round;
        $best_score = $id->best_score;
        $length_of_golf = $id->length_of_golf;
        $living_area = $id->living_area;
        $transportation = $id->transportation;
        $message = $id->message;

        return [
            'id' => $id,
            'name' => $name,
            'nickname' => $nickname,
            'birthday' => $birthday,
            'occupation' => $occupation,
            'possible_date_round' => $possible_date_round,
            'best_score' => $best_score,
            'length_of_golf' => $length_of_golf,
            'living_area' => $living_area,
            'transportation' => $transportation,
            'message' => $message
        ];
    }

    public function UpdateMyProfile(Request $request)
    {
        $cast_id = $request->cast_id;
        $param = [
            'name' => $request->name,
            'nickname' => $request->nickname,
            'birthday' => $request->birthday,
            'occupation' => $request->occupation,
            'possible_date_round' => $request->possible_date_round,
            'best_score' => $request->best_score,
            'length_of_golf' => $request->length_of_golf,
            'living_area' => $request->living_area,
            'transportation' => $request->transportation,
            'message' => $request->message
        ];

        Cast::where('id', $cast_id)->update($param);
    }
}
