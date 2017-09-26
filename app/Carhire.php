<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carhire extends Model
{
    //
    protected $fillable = ['image','type','capacity','price','location','organization_id'];
}
