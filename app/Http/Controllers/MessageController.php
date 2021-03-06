<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\MessageMap;
use App\Models\User;
use Carbon\Carbon;
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

        foreach ($messages as $message) {
            $message->is_self = $message->sender_id == $requestUserId;
        }

        $messageGroup = $messages->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('Y/m/d');
        });

        $res = [];

        foreach ($messageGroup as $key => $value) {
            array_push($res, ['messages' => $value, 'date' => $key]);
        }


        return response()->success($res);
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

        $users = User::find(array_values($ids));
        $users = $users->map(function ($user) {
            $query = MessageMap::query();
            $unread = $query->where('sender_id', $user->id)->where('unread', true)->get()->isNotEmpty();
            return ['data' => $user,'unread' => $unread];

        });

        return response()->success($users);
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

    public function unread(Request $request)
    {
        $query = MessageMap::query();
        $query->where('receiver_id', $request->user()->id);
        $query->where('unread', true);

        return response()->success(['unread' => $query->get()->isNotEmpty()]);
    }

    public function updateReadStatus(Request $request)
    {
        $query = MessageMap::query();
        $query->where('receiver_id', $request->user()->id);
        $query->where('sender_id', $request->id);
        $query->where('unread', true);
        $messageMaps = $query->get();

        foreach ($messageMaps as $messageMap) {
            $messageMap->unread = false;
            $messageMap->save();
        }

        return response()->success();
    }
}
