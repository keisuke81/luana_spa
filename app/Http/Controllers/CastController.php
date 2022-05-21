<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Models\Cast;
use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CastController extends Controller
{
    public function getCastsList(){
        $items = Cast::get();
        $user_id = Auth::id();

        return [
            'items' => $items
        ];
    }

    public function getCastProfile($id,$user_id)
    {
        $cast = Cast::where('id',$id)->first();
        $like = Like::where('user_id', $user_id)->where('cast_id', $id)->first();
        if($like == null){
            $currentFollowing = false;
        }else{
            $currentFollowing =true;
        }
        
        return [$cast, $currentFollowing];
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
        $img_url = $id->img_url;
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
            'img_url' => $img_url,
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

    public function fileUpload(Request $request, $id)
    {
        $file_name = $request->file->getClientOriginalName();
        $request->file->storeAs('public/', $file_name);

        $user = Cast::where('id', $id)->first();
        $user->update(['img_url' => 'https://luanaapp.herokuapp.com/storage/' . $file_name]);
    }
}
