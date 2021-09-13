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
         if(role()     == 'admin'){
             return Redirect::route('admin');
         }
         if(role()     == 'worker'){
             return Redirect::route('worker');
         }
         if(role()     == 'client'){
             return redirect()->to('/');
         }
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
