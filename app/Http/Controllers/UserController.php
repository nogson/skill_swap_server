<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function show(Request $request)
    {

        $user = $request->user();
        $user->strong = empty($user->strong) ? [] : explode(',', $user->strong);
        $user->weak = empty($user->weak) ? [] : explode(',', $user->weak);

        return $user;
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);

        $user->name = $request->name;
        $user->profile = $request->profile;
        $user->address = $request->address;
        $user->strong = implode(',', $request->strong);
        $user->strong_description = $request->strong_description;
        $user->weak = implode(',', $request->weak);
        $user->weak_description = $request->weak_description;
        $user->link = $request->link;
        $user->save();

//        // 配列で返却
//        $user = User::find($request->id);
//        $user->strong = empty($user->strong) ? [] : explode(',', $user->strong);
//        $user->weak = empty($user->weak) ? [] : explode(',', $user->weak);

        return response()->success();
    }
}
