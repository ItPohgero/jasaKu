<?php

# Role Name

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