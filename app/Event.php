<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Event extends Model
{
    //
    protected $fillable = ['name','image','description','address','contact','vip','normal','children','discount','organization_id'];
}
