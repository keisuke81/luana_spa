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
}
