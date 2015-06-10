<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 6/10/2015
 * Time: 5:08 PM
 */

class yahoo {
    protected $city;
    protected $url = "http://query.yahooapis.com/v1/public/yql";
    protected $result;
    protected $boolJSON;
    protected $raw_result;
    protected $err;
    protected $curl_info;
    public function  __construct($city, $json_decode = true)
    {
        $this->city = $city;
        if($json_decode)
        {
            $this->boolJSON = true;
        }
        elseif($json_decode == false)
        {
            $this->boolJSON = false;
        }
    }
    protected function query()
    {
        $query =  "SELECT * FROM weather.forecast WHERE woeid IN  (SELECT woeid FROM geo.places(1) WHERE text = \"". $this->city . "\")";
        $final = $this->url . "?q=" . urlencode($query) . "&format=json";
        return $final;
    }
    protected function curlExec()
    {
        $curl = curl_init($this->query());
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $this->raw_result = curl_exec($curl);
        if(!curl_errno($curl))
        {
            $this->curl_info = curl_getinfo($curl);
            if ($this->boolJSON == true) {
                return json_decode($this->raw_result);
            }
            else
            {
                return $this->raw_result;
            }
        }
        elseif(curl_errno($curl))
        {
            $this->err = array
            (
                "curl_error" => true,
                "other_error" => false,
                "curl_error_no" => curl_errno($curl),
                "curl_error_sum" => curl_error($curl)
            );
        }
        else
        {
            $this->err = array
            (
                "curl_error" => false,
                "other_error" => true,
                "curl_error_no" => false,
                "curl_error_sum" => false
            );
        }
    }
    public function getRes()
    {
        return $this->curlExec();
    }
    public function get_curl_info()
    {
        return $this->curl_info;
    }
}
