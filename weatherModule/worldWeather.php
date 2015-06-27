<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 6/24/2015
 * Time: 10:46 PM
 */

class worldWeather {
    private $lat;
    private $lon;
    private $format;
    protected $url = " http://api.worldweatheronline.com/free/v2/weather.ashx";
    public function __construct($lat, $lon, $format = "json")
    {
        $this->lat = $lat;
        $this->lon = $lon;
        $this->format = $format;
    }

    private function exec()
    {
        $final = $this->url . "?lat=" . $this->lat . "&lon=" . $this->lon . "&format=json";
        $contents = file_get_contents($final);
        return $contents;
    }
    public function getJson()
    {
        return $this->exec();
    }
}