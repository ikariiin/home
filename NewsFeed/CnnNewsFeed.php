<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 6/12/2015
 * Time: 1:06 AM
 */

class CnnNewsFeed {
    private $url;
    private $error;
    private $simpleXmlObj;
    public function __construct($url)
    {
        $this->url = $url;
    }
    private function get_content()
    {
        $header = @get_headers($this->url);
        if($header[0] = "HTTP/1.1 404 Not Found")
        {
            $this->error = array("exist" => false);
        }
        else
        {
            $this->simpleXmlObj = simplexml_load_string(file_get_contents($this->url));
            return $this->simpleXmlObj;
        }
    }
    private function parse()
    {
        $handle = $this->get_content();

    }
}