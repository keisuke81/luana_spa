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
}
