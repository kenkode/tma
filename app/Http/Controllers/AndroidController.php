<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Carhire;

class AndroidController extends Controller
{
    //
    public function getCars(Request $request)
    {
    	$carhires = Carhire::where('location',$request->location)->get();
        
        return json_encode($carhires);
    }

    public function getLocations()
    {
    	$carhires = Carhire::select("location")->distinct()->get();
        
        return json_encode($carhires);
    }
}
