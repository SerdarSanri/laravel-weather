<?php
// /bundles/weatheronline/start.php
Autoloader::map(array(
    'Weather' => Bundle::path('weatheronline').'/libraries/weather.php'
));