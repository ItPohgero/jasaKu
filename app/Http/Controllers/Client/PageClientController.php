<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Request as ModelsRequest;
use App\Models\Skill;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class PageClientController extends Controller
{
    public function request($client, $worker, $skill)
    {
        $worker = Worker::whereCode($worker)->firstOrFail();
        return view('client.request.create',[
            'dataClient' => Client::whereCode($client)->firstOrFail(),
            'dataWorker' => $worker,
            'skill'      => Skill::whereSlug($skill)->firstOrFail(),
            'skill_other'=> User::whereId($worker->user_id)->firstOrFail()
        ]);
    }

    public function order(){

        request()->validate([
            'notes'     => 'required'
        ]);

        $attr = request()->all();
        if(request('date') == null){
            $attr['date'] = date('Y-d-m H:i:s');
        }else{
            $attr['date'] = request('date') .' ' . request('time');
        }
        $attr['invoice']    = request('client_id').'c'.request('worker_id').'w'.request('skill_id').'s'.date('dmy').Str::random(7);

        ModelsRequest::create($attr);

        return Redirect::back();
    }
}
