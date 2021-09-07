<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Regency;
use App\Models\Skill;
use App\Models\SkillUser;
use App\Models\Worker;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\each;

class GlobalController extends Controller
{
    
    public function regency($id){

        $regency = Regency::where('province_id',$id)->get();

        return view('location.regency',compact('regency'));

    }
    public function district($id){

        $district = District::where('regency_id',$id)->get();

        return view('location.district',compact('district'));

    }

    public function search(){

        $skill_user     = SkillUser::whereSkill_id(request('skill_id'))->get();
        $skill          = Skill::whereId(request('skill_id'))->firstOrFail();
        return view('search', [
            'skill_user'        => $skill_user,
            'skill'             => $skill,
        ]);
    }
}
