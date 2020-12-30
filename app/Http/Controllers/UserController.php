<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryMap;
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

            foreach ($request->strong as $strong) {

                $category = Category::where('name', '=', $strong)->first();

                // カテゴリを追加
                if (empty($category)) {
                    $category = Category::create([
                        'name' => $strong
                    ]);

                    // カテゴリとユーザーIDをマッピング
                    $this->saveCategoryMap($user->id, $category->id);

                } else {
                    // カテゴリとユーザーIDをマッピング
                    $this->saveCategoryMap($user->id, $category->id);
                }
            }

            // カテゴリマップを削除
            $this->deleteCategoryMap($user, $request->strong);

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

    public function saveCategoryMap($user_id, $category_id)
    {
        $category_map = CategoryMap::where('category_id', $category_id)->where('user_id', $user_id)->first();

        if(empty($category_map)) {
            // カテゴリとユーザーIDをマッピング
            CategoryMap::create([
                'user_id' => $user_id,
                'category_id' => $category_id
            ]);
        }
    }

    public function deleteCategoryMap($user, $request_strong)
    {
        $user_strong = explode(',', $user->strong);
        $diff_strong = array_diff($user_strong, $request_strong);

        foreach ($diff_strong as $strong) {
            $category = Category::where('name', $strong)->first();
            CategoryMap::where('category_id', $category->id)->where('user_id', $user->id)->delete();
        }
    }
}
