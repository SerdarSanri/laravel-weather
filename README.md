laravel-weather
===============

laravel-weather is a bundle that allows for easy usage of the Weather Online api in your Laravel application. Currently only the free API is supported. Future updates will include support for the Marine and Premium API.


Installation
============

To install laravel-weather just run:
    php artisan bundle:install weather

And to activate laravel-weather add the following to your bundles.php file:
    'weatheronline' => array('auto' => true),

Configuration
=============

You will need an key to work with the Weather Online API. If you don't have one yet you can get it at: http://www.worldweatheronline.com/register.aspx
In the laravel-weather directory you will find a config folder. Move the file inside it to your application/config folder. Open the file in a editor and enter your API key.

Usage
=====
Current and forecast weather
----------------------------
To get a weather forecast and current conditions for a certain location call
    Weather::free(latitude, longtitude, days, format)
Replace latitude and longtitude with the GPS coordinates of the location you want the forecast for. GPS coordinates are entered in decimal format.
Replace days with the number of days (integer) for the forecast. Valid range is between 2 and 5 days.
Replace format with xml to get the result in XML format. Leave empty for JSON format (default).

Current weather
---------------
To get the current weather conditions for a certain location call
    Weather::current(latitude, longtitude, format)
Replace latitude and longtitude with the GPS coordinates of the location you want the forecast for. GPS coordinates are entered in decimal format.
Replace format with xml to get the result in XML format. Leave empty for JSON format (default).

The current weather is also included in the free() function. When you need both the current condition and the forecast for the same location, use free(). Using both will result in two calls being made to the API. The free API has usage limit, you will want to limit the number of calls.

