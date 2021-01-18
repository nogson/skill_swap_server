<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\SkillMap;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function categoryUsers(Request $request)
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

    public function skillUsers(Request $request)
    {
        $users = [];
        $skill_maps =SkillMap::where('skill_id', $request->id)->get();

        foreach ($skill_maps as $value) {
            $user = User::find($value->user_id);
            $user->strong = Skill::find(explode(',',$user->strong));
            $user->weak = Skill::find(explode(',',$user->weak));;
            $users[] = $user;
        }

        return response()->success($users);
    }

    public function skillsUsers(Request $request)
    {

        $user_ids =SkillMap::whereIn('skill_id', $request->ids)->pluck('user_id');
        $users = User::find($user_ids->unique());

        foreach ($users as $user) {
            $user->strong = Skill::find(explode(',',$user->strong));
            $user->weak = Skill::find(explode(',',$user->weak));
        }

        return response()->success($users);
    }

}
