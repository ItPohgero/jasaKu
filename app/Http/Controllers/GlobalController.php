<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Regency;
use Illuminate\Http\Request;

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
}
