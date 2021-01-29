<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\MessageMap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{

    public function index(Request $request)
    {
        // Message::where('sender_id',$request->id)
    }

    public function store(Request $request)
    {

        return DB::transaction(function () use ($request) {
            $messageMap = MessageMap::create([
                'sender_id' => $request->user()->id,
                'receiver_id' => $request->receiver_id
            ]);

            $message = Message::create([
                'message_map_id' => $messageMap->id,
                'sender_id' => $request->user()->id,
                'receiver_id' => $request->receiver_id,
                'message' => $request->message
            ]);

            return response()->success($message);
        });

    }
}
