<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Request;
use App\Models\Skill;
use App\Models\User;
use App\Models\Worker;
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
            'phone'     => 'required',
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
    public function  skill_store(){
        $user = User::whereId(worker()->user_id)->firstOrFail();
        $user->skills()->attach(request('skill_id'));

        #Menghapus soft deletes request
        Request::whereWorker_id(worker()->id)->whereSkill_id(request('skill_id'))->restore();

        return Redirect::route('worker.skill');
    }
    /**
     * Skill remove
     */
    public function skill_remove($id){
        $user = User::whereId(worker()->user_id)->firstOrFail();
        $user->skills()->detach($id);
        
        #Menghapus soft deletes request
        Request::whereWorker_id(worker()->id)->whereSkill_id($id)->delete();
        
        session()->flash('success', 'Skill berhasil diremove'); 
        return Redirect::route('worker.skill');
    }

    /**
     * Update Location
     */
    public function location_update(){
        $worker = Worker::whereUser_id(worker()->user_id)->firstOrFail();
        $worker->update(request()->all());

        session()->flash('success', 'Data berhasil diupdate');
        return Redirect::back();
    }

    /**
     * Location show
     */
    public function location_show (){
        return view('worker.location.show',[
            'p'                 => Province::whereId(worker()->province_id)->firstOrFail(),
            'r'                 => Regency::whereId(worker()->regency_id)->firstOrFail(),
            'd'                 => District::whereId(worker()->district_id)->firstOrFail(),
            'province'          => Province::get(),
            'regency'           => Regency::get(),
            'district'          => District::get()
        ]);
    }

    /**
     * Request order
     */
    public function request_order(){
         $attr = Request::whereWorker_id(worker()->id)->whereStatus(false)->get();
        return view('worker.request.order', compact('attr'));
    }

    /**
     * Cancel | Soft delete
     */
    public function cancel_order($invoice){
        
        Request::whereInvoice($invoice)->delete();
        return back();
    }

      /**
     * Request active
     */
    public function request_active(){
         $attr = Request::whereWorker_id(worker()->id)->whereStatus(true)->latest()->get();
        return view('worker.request.active', compact('attr'));
    }

    /**
     * deal | Soft delete
     */
    public function deal_order($invoice){
        
        $attr = Request::whereInvoice($invoice)->firstOrFail();
        $attr->update([
            'status'    => true
        ]);

        return Redirect::back();
    }
}
