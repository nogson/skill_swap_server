<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\MessageMap;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{

    public function index(Request $request)
    {

        $query = MessageMap::query();
        $requestUserId = $request->user()->id;
        $receiverUserId = $request->id;

        $query->where('sender_id', $requestUserId)->where('receiver_id', $receiverUserId);
        $query->orWhere('receiver_id', $requestUserId)->where('sender_id', $receiverUserId);

        $messages = Message::find($query->pluck('id'));

        foreach ($messages as $message){
            $message->sender_user = User::find($message->sender_id);
            $message->receiver_user = User::find($message->receiver_id);
        }

        return response()->success($messages);
    }

    public function users(Request $request)
    {

        $query = MessageMap::query();
        $requestUserId = $request->user()->id;

        $query->where('sender_id', $requestUserId);
        $query->orWhere('receiver_id', $requestUserId);

        $senderIds = $query->pluck('sender_id')->toArray();
        $receiverIds = $query->pluck('receiver_id')->toArray();
        $ids = array_merge($senderIds, $receiverIds);
        $ids = array_filter(array_unique($ids), function ($id) use ($requestUserId) {
            return $requestUserId != $id;
        });

        return response()->success(User::find(array_values($ids)));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'message' => 'required',
            'receiver_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->error(['message' => 'エラーが発生しました']);
        }

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
