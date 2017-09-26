<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    //
    protected $fillable = ['name','logo','email','address','phone','currency_name','currency_shortname','is_nairobi','is_central','is_coast','is_nyanza','is_western','is_eastern','is_rift','is_northeastern','mail_driver','mail_host','mail_port','mail_username','mail_password','mail_encryption','google_map_cordinates'];

}
