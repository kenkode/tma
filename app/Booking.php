<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Event;

class Booking extends Model
{
    //
    public static function getVehicle($id){
        $vehicle = Vehicle::find($id);
		return $vehicle;
	}

	public static function getEvent($id){
        $event = Event::find($id);
		return $event;
		
	}
}
