<?php

namespace App;

use App\Vehiclename;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //
    protected $fillable = ['vehiclename_id','regno','capacity','type','has_conductor','has_chair','active','organization_id'];

    public function vehiclename(){

		return $this->belongsTo('App\Vehiclename');
	}
}
