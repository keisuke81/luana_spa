<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cast;

class CastController extends Controller
{
    public function getCastsList(){
        $items = Cast::get();

        return $items;
    }

    public function getCastProfile(Cast $id)
    {
        $cast = Cast::find($id)->last();
        return $cast;
    }
}
