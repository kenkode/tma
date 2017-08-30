<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable=['id','name','organization_id'];

    public function room(){

		return $this->hasMany('App\Room');
	}

	public function pricing(){

		return $this->hasMany('App\Pricing');
	}

}
