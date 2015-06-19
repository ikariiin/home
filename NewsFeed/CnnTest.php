<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 6/12/2015
 * Time: 1:45 AM
 */
include "CnnNewsFeed.php";
$cnn = new CnnNewsFeed("asia");
$cnn->get_image();
echo "<br />";
foreach($cnn->getRss()->channel->item as $headline) {
    echo "<br />Guid: " . $headline->guid . "<br /> Title: " . $headline->title . "<br />Description: " . $headline->description . "<br />Link: " . $headline->link;
}
?>