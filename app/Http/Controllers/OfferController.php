<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;

class OfferController extends Controller
{
    public function createOffer(Request $request){
        return Offer::create($request->all());
    }
}
