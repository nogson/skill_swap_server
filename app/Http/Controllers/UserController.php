<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class UserController extends Controller
{

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->success([
            'message' => 'Successfully logged out'
        ]);

    }

    public function show(Request $request)
    {

        $user = $request->user();
        $user->strong = empty($user->strong) ? [] : explode(',', $user->strong);
        $user->weak = empty($user->weak) ? [] : explode(',', $user->weak);

        return response()->success($user);
    }

    public function update(Request $request)
    {

        return DB::transaction(function () use ($request) {
            $user = User::find($request->id);
            $image = explode(';', $request->thumbnail)[1];
            $image = explode(',', $image)[1];
            $decodedImage = base64_decode($image);
            $file = 'thumbnail/' . Str::uuid()->toString() . '.png';

            $path = Storage::disk('s3')->put($file,$decodedImage, 'public');

            if (!$path) {
                throw new Exception('ファイルアップロード時にエラーが発生しました。');
            }



            $user->name = $request->name;
            $user->profile = $request->profile;
            $user->address = $request->address;
            $user->strong = implode(',', $request->strong);
            $user->strong_description = $request->strong_description;
            $user->weak = implode(',', $request->weak);
            $user->weak_description = $request->weak_description;
            $user->link = $request->link;
            $user->save();



            return response()->success();

        });

    }

    public function imageUpload(Request $request)
    {

    }
}
