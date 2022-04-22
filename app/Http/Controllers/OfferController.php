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
}
