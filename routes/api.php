<?php

use Illuminate\Http\Request;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/stations', function () {
    $stations = App\Log::select('hardware_id', 'station_name', 'latitude', 'longitude')->distinct()->get();

    return $stations;
});

Route::get('/stations/{hardwareId}', function ($hardwareId) {
    $limit = request()->get('limit', 20);

    return App\Log::where('hardware_id', $hardwareId)->orderBy('created_at', 'desc')->paginate($limit);
});

// edit
Route::get('/logs/{id}', function ($id) {
    return App\Log::find($id);
});

Route::patch('/logs/{id}', function ($id) {
    // validation goes here 
    $log = App\Log::find($id)->update(request()->except('_token'));
});