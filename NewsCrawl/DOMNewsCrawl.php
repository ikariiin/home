<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 6/11/2015
 * Time: 12:20 AM
 */

class DOMNewsCrawl {
    protected $url;
    protected $area;
    protected $noOfa;
    protected $pages;
    protected $pagesToday;
    private $pagesContent;
    // currently only supports edition.cnn.com
    public function __construct($url, $area)
    {
        $this->url = $url;
        $this->area = $area;
    }
    private function crawl()
    {
        //getting the main page of the given url
        $mainDom = new DOMDocument();
        @$mainDom->loadHTMLFile('http://'. $this->url . "/" . $this->area);
        $a = $mainDom->getElementsByTagName("a");
        foreach($a as $aS)
        {
            foreachh:
            $href = $aS->getAttribute("href");
            if(0 !== strpos($href, 'http'))
            {
                $path = '/' . ltrim($href, '/');
                $href = http_build_url($this->url, array('path' => $path));
                $href .= $path;
                $this->pages[$href] = $mainDom->saveHTML();
                goto foreachh;
            }
        }
        return $this->pages;
    }
    private function today()
    {
        $keys = array_keys($this->crawl());
        foreach($keys as $key) {
            $today = date("Y m d");
            if (strpos(str_replace(" ", "/", $today), $key) !== false) {
                $this->pagesToday[$key] = $this->pages[$key];
            }
        }
        return $this->pagesToday;
    }
    private function getNews()
    {
        $dom = new DOMDocument();
        foreach($this->today() as $html)
        {
            $dom->loadHTML($html);
            $domx = new DOMXPath($dom);
            $className = "zn-body__paragraph";
            $nodes = $domx->query("//*[contains(@class, '$className')]");
            foreach($nodes as $node)
            {
                $this->pagesContent[rand(0, 32767)] = $node;
            }
        }
        return $this->pagesContent;
    }
    public function getCrawledArray()
    {
        return $this->getNews();
    }
}