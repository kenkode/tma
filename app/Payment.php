<?php

namespace App;

use App\Vehicle;
use App\Vehiclename;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = ['firstclass','economic','type','business','children','discount','organization_id','vehicle_id'];

    public function currency(){

		return $this->belongsTo('App\Currency');
	}

	public static function getVehicle($id){
        $vehicle = Vehicle::find($id);
        $vehiclename = Vehiclename::find($vehicle->vehiclename_id);
		return $vehicle->regno.' - '.$vehiclename->name;
	}
}
