<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use App\Event;

class Booking extends Model
{
    //
    public static function getVehicle($id){
    	if(Auth::user()->type == 'Car Hire'){
        $vehicle = Carhire::find($id);
		return $vehicle;
    	}else{
        $vehicle = Vehicle::find($id);
		return $vehicle;
	}
	}

	public static function getEvent($id){
        $event = Event::find($id);
		return $event;
		
	}
}
