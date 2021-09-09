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

    public function regency1($id){

        $regency = Regency::where('province_id',$id)->get();

        return view('worker.location.regency',compact('regency'));

    }
    
    public function district1($id){

        $district = District::where('regency_id',$id)->get();

        return view('worker.location.district',compact('district'));

    }

    public function search(){

        $skill          = Skill::whereSlug(request('keyword'))->first();
        $skill_user     = SkillUser::whereSkill_id($skill->id)->get();
        return view('client.search', [
            'skill_user'        => $skill_user,
            'skill'             => $skill,
        ]);
    }
}
