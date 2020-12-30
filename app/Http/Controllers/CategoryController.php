<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryMap;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->success(Category::all());
    }

    public function users(Request $request)
    {
        $user_ids = CategoryMap::where('category_id',$request->id)->pluck('user_id');
        $users = User::whereIn('id',$user_ids)->get();
        return response()->success($users);
    }
}
