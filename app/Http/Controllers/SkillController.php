<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\SkillMap;
use App\Models\User;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        return response()->success(Skill::all());
    }

    public function skills(Request $request)
    {
        return response()->success(Skill::where('category_id', $request->id)->get());
    }

    public function users(Request $request)
    {
        $skills = Skill::where('category_id', $request->id)->get();

        foreach ($skills as $value) {
            $users = [];
            foreach (SkillMap::where('skill_id', $value->id)->get() as $map) {
                $users[] = User::find($map->user_id);
            }
            $value->users = $users;
        }

        return response()->success($skills);
    }
}
