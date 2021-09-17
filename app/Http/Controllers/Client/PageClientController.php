<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Request as ModelsRequest;
use App\Models\Skill;
use App\Models\User;
use App\Models\Worker;
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

        return Redirect::route('client.invoice', $attr['invoice']);
    }

    public function invoice($invoice){
        $req = ModelsRequest::whereInvoice($invoice)->firstOrFail();
        return view('client/request/invoice', compact('req'));
    }

    public function history(){
        $attr = ModelsRequest::whereClient_id(client()->id)->whereStatus(false)->latest()->get();
        return view('client.request.history', compact('attr'));
    }
    
    public function sukses(){
        $attr = ModelsRequest::whereClient_id(client()->id)->whereStatus(true)->latest()->get();
        return view('client.request.history', compact('attr'));
    }

    public function feedback($invoice){
        $req = ModelsRequest::whereInvoice($invoice)->firstOrFail();
        $req->update([
            'point'     => request('point')
        ]);
        return back();
    }
}
