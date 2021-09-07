<?php

# Role Name

use App\Models\Client;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Worker;

if (!function_exists('role')) {
    function role()
    {
        foreach(Auth::user()->roles as $item){
            return $item->name;
        }
    }
}

# Chek Id
if (!function_exists('chekId')) {
    function chekId($id)
    {
        if(Auth::user()->id != $id){
            return abort(404);
        }
    }
}

# Worker
if (!function_exists('worker')) {
    function worker()
    {
        $auth       = Auth::user()->id;
        $worker     = Worker::whereUser_id($auth)->firstOrFail();
        return $worker;
    }
}


# Client
if (!function_exists('client')) {
    function client()
    {
        $auth       = Auth::user()->id;
        $client     = Client::whereUser_id($auth)->firstOrFail();
        return $client;
    }
}

#Location client
if (!function_exists('location_client')) {
    function location_client($set)
    {
        if($set == 'province'){
            return Province::whereId(client()->province_id)->firstOrFail();
        }elseif($set == 'regency'){
            return Regency::whereId(client()->regency_id)->firstOrFail();
        }elseif($set == 'district'){
            return District::whereId(client()->district_id)->firstOrFail();
        }
    }
}
