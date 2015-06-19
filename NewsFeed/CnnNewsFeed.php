<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 6/12/2015
 * Time: 1:06 AM
 */

class CnnNewsFeed {
    /*
     * The variable area will contain one of the following values:
     * 1. world
     * 2. africa
     * 3. americas
     * 4. asia
     * 5. europe
     * 6. middle east
     * 7. u s
     */
    private $area;
    private $sx;
    private $value;
    public function __construct($area)
    {
        $this->area = $area;
    }
    public function getRss()
    {
        $file = file_get_contents("http://rss.cnn.com/rss/edition_" . $this->area . ".rss");
        $this->sx = simplexml_load_string($file);
        return $this->sx;
    }
    public function get_image()
    {
        foreach($this->sx->channel->image as $image)
        {
            $this->value = "<a href=\""
                . $image->link
                . "\" title=\""
                . $image->title
                . "\"><img src=\""
                . $image->url
                . "\" width=\""
                . $image->width
                . "\" height==\""
                . $image->height
                . "\"/></a>";
        }
        return $this->value;
    }
}