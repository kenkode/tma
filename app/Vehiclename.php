<?php

namespace App;

use App\Vehicle;
use Illuminate\Database\Eloquent\Model;

class Vehiclename extends Model
{
    //
    protected $fillable = ['name','organization_id'];

    public function vehicles(){

		return $this->hasMany('App\Vehicle');
	}
}
