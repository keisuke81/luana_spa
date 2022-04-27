<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;
use App\Models\Cast;
use App\Models\Level;
use App\Models\User;

class OfferController extends Controller
{

    public function createOffer(Request $request){
        $param = [
            'user_id' => $request->user_id,
            'cast_id' => $request->cast_id,
            'date'    => $request->date,
            'start_at'=> $request->start_at,
            'num_of_users' => $request->num_of_users,
            'num_of_women' => $request->num_of_women,
        ];
        
        Offer::create($param);
    }

    public function getCastOffered(Cast $id){
        $items = Offer::where('cast_id', $id->id)->where('reserved', null)->get();
        foreach($items as $item) {
            $user = User::where('id', $item->user_id)->first();
            $item->user_name = $user->nickname;
            $item->img_url = $user->img_url;
        }

        return $items;
    }

    public function getOfferedDetail($id){
        $item = Offer::where('id', $id)->first();
        $user = User::where('id',$item->user_id)->first();
        $item->user_name = $user->nickname;
        $item->img_url = $user->img_url;

        return $item;
    }

    public function RejectOffer($id){
        Offer::where('id',$id)->delete();
    }
}
