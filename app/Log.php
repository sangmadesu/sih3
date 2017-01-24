<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    //
    protected $table = 'logs';

    protected $fillable = ['station_name','latitude','longitude','hardware_id','hardware_type','interval','time_start','time_end','measurement_start','measurement_end','sender'];

}
