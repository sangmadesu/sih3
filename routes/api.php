<?php

use Illuminate\Http\Request;

/**
* get all stations
* @return array
*/
Route::get('/stations', function () {
    $stations = App\Log::select('hardware_id', 'station_name', 'latitude', 'longitude')->distinct()->get();

    return $stations;
});

/**
* get station with hardware id
* @param $hardwareId number
* @return object
*/
Route::get('/stations/{hardwareId}', function ($hardwareId) {
    $limit = request()->get('limit', 20);

    return App\Log::where('hardware_id', $hardwareId)->orderBy('created_at', 'desc')->paginate($limit);
});

/**
* get all logs with id
* @param $id number
* @return object
*/
Route::get('/logs/{id}', function ($id) {
    return App\Log::find($id);
});

/**
* update logs
* @param $id number
* @return object
*/
Route::patch('/logs/{id}', function ($id) {
    // validation goes here 
    $log = App\Log::find($id)->update(request()->except('_token'));
});