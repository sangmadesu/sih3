<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    /**
    * @var $table string
    */
    protected $table = 'logs';

    /**
    *  @var $fillable array
    */
    protected $fillable = [
    	'station_name',
    	'latitude',
    	'longitude',
    	'hardware_id',
    	'hardware_type',
    	'interval',
    	'time_start',
    	'time_end',
    	'measurement_start',
    	'measurement_end',
    	'sender'
    ];

}
