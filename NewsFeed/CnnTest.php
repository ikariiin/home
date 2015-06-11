<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 6/12/2015
 * Time: 1:45 AM
 */
include "CnnNewsFeed.php";
$url = "http://rss.cnn.com/rss/edition_world.rss";
$cnn = new CnnNewsFeed($url);
$cnn->getArray();