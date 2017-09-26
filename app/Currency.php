<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    //
    protected $fillable = ['name','shortname','organization_id'];

    public function payment(){

		return $this->hasMany('App\Payment');
	}
}
