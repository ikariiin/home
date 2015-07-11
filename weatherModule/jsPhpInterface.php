<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/7/15
 * Time: 11:57 AM
 */
include "worldWeather.php";
if(isset($_POST) && !empty($_POST) && isset($_POST["lat"]) && isset($_POST["lon"]))
{
    $weather = new worldWeather(51.5072, 0.1275, "json");
    $json = $weather->getData();
    echo $json;
}
else
{
    echo "Sorry No Data Was Received";
}

