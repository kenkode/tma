<?php

namespace App;

use App\Branch;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    public static function getBranch($id){
        $branch = Branch::find($id);
		return $branch->name;
	}

	public function roomtype(){

		return $this->belongsTo('App\Roomtype');
	}

	public function branch(){

		return $this->belongsTo('App\Branch');
	}
}
