<?php

// front view
Route::get('/', function () {
    return view('contents');
});

// get query string in public ip
Route::get('/log.php', function () {

	/**
	* handle convert data type string to datetime
	* @param string
	*/
	function convertStringToDateTime($timeString) {
		$year = substr($timeString, 0, 4);
		$month = substr($timeString, 4, 2);
		$date =  substr($timeString, 6, 2);
		$time = substr($timeString, 8, 4);
		$time = substr($time, 0, 2).':'.substr($time, 2, 4);
		return "{$year}-{$month}-{$date} {$time}";
	}

	try {
		$log = App\Log::create([
			'station_name' => request('pos'),
			'latitude' => request('lat'),
			'longitude' => request('lng'),
			'hardware_id' => request('hwid'),
			'hardware_type' => request('dev'),
			'interval' => request('int'),
			'time_start' => convertStringToDateTime(request('w1')),
			'time_end' => convertStringToDateTime(request('w2')),
			'measurement_start' => request('d1'),
			'measurement_end' => request('d2'),
			'sender' => request()->ip()  
		]);
	} catch (\Exception $e) {
 		return "log is not recorded. error has been occured";
	}
	return "log has been successfully recorded";
});