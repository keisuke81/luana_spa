<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follow;
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
         'id'=> $id,
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
}
