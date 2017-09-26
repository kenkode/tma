<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    //
    public function roomtype(){

		return $this->belongsTo('App\Roomtype');
	}

	public function branch(){

		return $this->belongsTo('App\Branch');
	}
}
