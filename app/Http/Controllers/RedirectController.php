<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RedirectController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $role = Auth::user()->roles;
        foreach($role as $a):
            # Admin
            if($a->name     == 'admin'):
                session()->put('admin',true);
                return Redirect::route('admin');
            # Worker
            elseif($a->name == 'worker'):
                session()->put('worker',true);
                return Redirect::route('worker');
            # Client
            elseif($a->name == 'client'):
                session()->put('client',true);
                return redirect()->to('/');
            else:
                return "LOGOUT";
            endif;
        endforeach;

    }

    /**
     * Chek route dashboard
     */
    public function dashboard(){
        if(session('admin')){
            return Redirect::route('admin');
        }elseif(session('worker')){
            return Redirect::route('worker');
        }elseif('client'){
            return Redirect::route('client');
        }
    }
}
