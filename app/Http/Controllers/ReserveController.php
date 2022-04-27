<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Offer;
use App\Models\Area;
use App\Models\Companion;
use App\Models\Level;
use App\Models\User;


class ReserveController extends Controller
{
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
}
