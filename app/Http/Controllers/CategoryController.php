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

}
