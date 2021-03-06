<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Offer;
use App\Models\Area;
use App\Models\Cast;
use App\Models\Level;
use App\Models\User;


class ReserveController extends Controller
{

    public function getUserReserve($id)
    {
        $reserves = Reserve::where('user_id', $id)->get();

        foreach ($reserves as $reserve) {
            $item = Offer::where('id', $reserve->offer_id)->first();
            $cast = Cast::where('id', $reserve->cast_id)->first();
            $reserve->cast_name = $cast->nickname;
            $reserve->img_url = $cast->img_url;
            $reserve->date = $item->date;
            $reserve->start_at = $item->start_at;
            $reserve->golf_course = $item->golf_course;
        };

        return $reserves;
    }

    public function getUserReserveContent($id){
        $offer = Offer::where('id', $id)->first();
        $cast = Cast::where('id', $offer->cast_id)->first();
        $offer->img_url = $cast->img_url;
        $offer->user_name = $cast->nickname;

        return $offer;
    }

    public function UserDeleteReserve($id)
    {
        $reserve = Reserve::where('id', $id)->first();

        Offer::where('id', $reserve->offer_id)->delete();
        Reserve::where('id', $id)->delete();
    }


//////////////////////////////////////////
/////////////キャスト
    public function AcceptOffer($id)
    {
        $item = Offer::where('id', $id)->first();
        $param = [
            'offer_id' => $item->id,
            'user_id'  => $item->user_id,
            'cast_id'  => $item->cast_id
        ];
        Reserve::create($param);

        $item->reserved =1;
        $item->save();
    }

    public function getCastReserve($id){
        $reserves = Reserve::where('cast_id', $id)->get();

        foreach($reserves as $reserve){
            $item = Offer::where('id', $reserve->offer_id)->first();
            $user = User::where('id', $reserve->user_id)->first();
            $reserve->user_name = $user->nickname;
            $reserve->img_url = $user->img_url;
            $reserve->date = $item->date;
            $reserve->start_at = $item->start_at;
            $reserve->golf_course = $item->golf_course;
        };

        return $reserves;
    }

    public function CastDeleteReserve($id){
        $reserve = Reserve::where('id', $id)->first();

        Offer::where('id', $reserve->offer_id)->delete();
        Reserve::where('id', $id)->delete();

    }

    public function getReserveContent($id){
        $offer = Offer::where('id',$id)->first();
        $user = User::where('id',$offer->user_id)->first();
        $offer->img_url = $user->img_url;
        $offer->user_name = $user->nickname;

        return $offer;
    }
}
