<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
    protected $fillable = ['vehicle_id','origin_id','destination_id','departure','arrival','organization_id'];

    public static function getVehicle($id){
        $vehicle = Vehicle::find($id);
		return $vehicle;
	}
	public static function getDestination($id){
        $destination = Route::find($id);
		return $destination;
	}
}
