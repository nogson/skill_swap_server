<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


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

            // サムネイルを登録
            if ($request->thumbnail) {

                preg_match('/data:image\/(\w+);base64,/', $request->thumbnail, $matches);
                $extension = $matches[1];

                $img = preg_replace('/^data:image.*base64,/', '', $request->thumbnail);
                $img = str_replace(' ', '+', $img);
                $fileData = base64_decode($img);
                $fileData = Image::make($fileData)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->fit(300, 300)->stream($extension, 100);
                $file = 'thumbnail/' . Str::uuid()->toString() . '.' . $extension;
                $path = Storage::disk('s3')->put($file, $fileData, 'public');
                $user->thumbnail = env('APP_IMAGE_URL') . '/' . $file;

                if (!$path) {
                    throw new Exception('ファイルアップロード時にエラーが発生しました。');
                }

            }

            // カテゴリを追加
            foreach ($request->strong as $strong) {
                if (Category::where('name', '=', $strong)->count() == 0){
                    Category::create([
                        'name' => $strong
                    ]);
                }
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


            return response()->success($user);

        });

    }

    public function imageUpload(Request $request)
    {

    }
}
