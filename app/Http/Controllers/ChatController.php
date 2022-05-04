<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;
use App\Models\Cast;

class ChatController extends Controller
{
    //チャットルームの表示
    public function getChatRoom($id, $cast_id)
    {
        $query = Chat::where('send', $id)->where('recieve', $cast_id);

        $query->orWhere(function ($query) use ($id, $cast_id) {
            $query->where('send', $cast_id);
            $query->where('recieve', $id);
        });

        $messages = $query->get();

        foreach ($messages as $message) {
            $user = User::where('id', $id)->first();
            $message->user_icon = $user->img_url;

            $cast = Cast::where('id', $cast_id)->first();
            $message->cast_icon = $cast->img_url;
        }

        return [
            'messages' => $messages,
        ];
    }

    public function chatSend(Request $request){
        $param=[
            'send' => $request->user_id,
            'recieve' => $request->castId,
            'message' => $request->chat_text
        ];

        Chat::insert($param);
    }

    //////////////////////////////////////////////////////
    //////////////////////////////////////////////////////
    //キャスト
    public function getCastChatRoom($id, $user_id)
    {
        $query = Chat::where('send', $id)->where('recieve', $user_id);

        $query->orWhere(function ($query) use ($id, $user_id) {
            $query->where('send', $user_id);
            $query->where('recieve', $id);
        });

        $messages = $query->get();

        foreach($messages as $message){
            $cast = Cast::where('id', $id)->first();
            $message->cast_icon = $cast->img_url;
            
            $user = User::where('id', $user_id)->first();
            $message->user_icon = $user->img_url;
        }

        return [
            'messages' => $messages,
        ];
    }

    public function CastchatSend(Request $request)
    {
        $param = [
            'send' => $request->cast_id,
            'recieve' => $request->userId,
            'message' => $request->chat_text
        ];

        Chat::insert($param);
    }
}
