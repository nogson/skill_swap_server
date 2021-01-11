<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        return response()->success(Skill::all());
    }

    public function skills(Request $request)
    {
        return response()->success(Skill::where('category_id',$request->id)->get());
    }

    public function users(Request $request)
    {
        $users = [];
        $skills = Skill::where('category_id',$request->id)->get();


        foreach ($skills as )

        return response()->success(Skill::where('category_id',$request->id)->get());
    }
}
