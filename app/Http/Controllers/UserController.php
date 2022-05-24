<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Like;
use App\Models\Follow;
use App\Models\Castlike;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ClientRequest;
use App\Models\CastFollow;

class UserController extends Controller
{
    public function index(){
        $user_id = Auth::id();

        return view('app')->with([
            'user_id'=> $user_id
        ]);
    }

    public function getMyProfile(User $id){

        return $id;
    }

    public function getMyProfileEdit(User $id)
    {
        $user_id = $id->id;
        $img_url = $id->img_url;
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
         'img_url' => $img_url,
         'user_id'=> $user_id,
         'name'=>$name,
         'nickname'=> $nickname,
         'birthday' =>$birthday,
         'occupation' =>$occupation,
         'possible_date_round' =>$possible_date_round,
         'best_score' =>$best_score,
         'length_of_golf' => $length_of_golf,
         'living_area' => $living_area,
         'transportation' => $transportation,
         'message' => $message
        ];
    }

    public function UpdateMyProfile(Request $request){
        $user_id = $request->user_id;
        $param=[
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

        User::where('id', $user_id)->update($param);
    }

    public function fileUpload(Request $request, $id){
        $file_name = $request->file->getClientOriginalName();
        $request->file->storeAs('public/',$file_name);
        
        $user = User::where('id',$id)->first();
        $user->update(['img_url' => 'https://luanaapp.herokuapp.com/storage/'.$file_name]);

    }

    public function getUsersList()
    {
        $items = User::get();

        return [
            'items' => $items
        ];
    }

    public function getUserProfile($id, $cast_id)
    {
        $user = User::where('id', $id)->first();
        $like = Castlike::where('cast_id', $cast_id)->where('user_id', $id)->first();
        if ($like == null) {
            $currentFollowing = false;
        } else {
            $currentFollowing = true;
        }

        return [$user, $currentFollowing];
    }
}
