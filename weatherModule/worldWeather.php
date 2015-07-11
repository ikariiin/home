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
    private $key = "3be20163414371b55549cb84e2e47";
    protected $url = "http://api.worldweatheronline.com/free/v2/weather.ashx";
    public function __construct($lat, $lon, $format = "json")
    {
        $this->lat = $lat;
        $this->lon = $lon;
        $this->format = $format;
    }

    private function exec()
    {
        $query = "?key=" . $this->key . "&q=" . $this->lat . ",%20" . $this->lon . "&format=" . $this->format;
        $final = $this->url . $query;
        $contents = file_get_contents($final);
        return $contents;
    }
    public function getData()
    {
        return $this->exec();
    }
}