<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Skill;
use App\Models\SkillUser;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PageWorkerController extends Controller
{
    /**
     * Edit Profile
     */
    public function edit(){
        // Chek ID Jika bukan miliknya maka 404
        chekId(worker()->user_id);
        return view('worker.profile.edit');
    }
    /**
     * Logic update profile
     */
    public function update(){
        $worker = Worker::whereUser_id(worker()->user_id)->firstOrFail();
        request()->validate([
            'nik'       => 'required',
            'born'      => 'required',
            'desc'      => 'required',
        ]);
        $worker->update(request()->all());
        
        return Redirect::route('worker');
    }
    /**
     * Show profile
     */
    public function show(){
        return view('worker.profile.show');
    }
    /**
     * Skill
     */
    public function skill(){
        return view('worker.skill.index',[
            'skill'     => Skill::get(),
            'worker'    => User::whereId(worker()->user_id)->firstOrFail()
        ]);
    }
    /**
     * Skill store
     */
    public function skill_store(){
        $user = User::whereId(worker()->user_id)->firstOrFail();
        $user->skills()->attach(request('skill_id'));

        return Redirect::route('worker.skill');
    }
    /**
     * Skill remove
     */
    public function skill_remove($id){
        $user = User::whereId(worker()->user_id)->firstOrFail();
        $user->skills()->detach($id);
        session()->flash('success', 'Skill berhasil diremove'); 
        return Redirect::route('worker.skill');
    }

    /**
     * Informasi location
     */
    public function location_edit(){
        return view('worker.location.edit',[
            'province'          => Province::get(),
            'regency'           => Regency::get(),
            'district'          => District::get()
        ]);
    }

    /**
     * Update Location
     */
    public function location_update(){
        $worker = Worker::whereUser_id(worker()->user_id)->firstOrFail();
        $worker->update(request()->all());
        return Redirect::route('worker');
    }

    /**
     * Location show
     */
    public function location_show (){
        return view('worker.location.show',[
            'province'      => Province::whereId(worker()->province_id)->firstOrFail(),
            'regency'       => Regency::whereId(worker()->regency_id)->firstOrFail(),
            'district'      => District::whereId(worker()->district_id)->firstOrFail()
        ]);
    }

}
