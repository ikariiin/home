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
    private $format_res;
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
            return false;
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
        if($handle === false) {
            foreach ($handle->item as $content) {
                $this->format_res = array(
                    "guid" => $content->guid,
                    "content" => array(
                        "headline" => $content->title,
                        "desc" => $content->description,
                        "pubDate" => $content->pubDate,
                        "link" => $content->link
                    )
                );
            }
            return $this->format_res;
        }
        else
        {
            return false;
        }
    }
    public function getArray()
    {
        if($this->parse() === false)
        {
            $error = "You Have an Error, please check! To get the details please call \$CNN->getError()";
        }
        else{
            return $this->parse();
        }
    }
}