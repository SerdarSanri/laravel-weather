<?php

/**
 * A LaravelPHP package for working with the Weather Online API.
 *
 * @package    Weather
 * @author     Sebastiaan Schimmel <you@you.com>
 * @link       https://github.com/sschimmel/laravel-weather.git
 * @license    MIT License
 */

class Weather
{
	public static function free($latitude, $longtitude, $days, $format = 'json') 
	{
		// load api key
		$api_key = Config::get('weather.api_key');

		$url = "http://free.worldweatheronline.com/feed/weather.ashx?q=".$latitude.",".$longtitude."&format=".$format."&num_of_days=".$days."&key=".$api_key;
		
		//Setup curl request
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		$weather = curl_exec($ch);

		//Catch errors
		if(curl_errno($ch)) {

			//$errors = curl_error($ch);
			curl_close($ch);
			return false;
		}
		else {
			curl_close($ch);
			return $weather;
		}

	}

	public static function current($latitude, $longtitude, $format = 'json') 
	{
		
		$weather = Weather::free($latitude, $longtitude, '2', $format);
		if($weather == FALSE) {
			return false;
		}
		else {
			$weather = json_decode($weather);
			$current_conditions = $weather->data->current_condition[0];
			return $current_conditions;
		}

	}
	
}