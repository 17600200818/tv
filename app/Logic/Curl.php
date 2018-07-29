<?php
namespace App\Logic;

class Curl
{
    protected $url;
    protected $curl;

    public function __construct()
    {
        $this->curl = curl_init();
    }
    public function __destruct()
    {
        //释放curl句柄
        curl_close($this->curl);
    }

    public function init()
    {
        //释放curl句柄
        curl_close($this->curl);
        $this->url = '';
        $this->curl = curl_init();
    }

    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    public function get()
    {
        curl_setopt($this->curl, CURLOPT_URL, $this->url);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->curl, CURLOPT_HEADER, 0);

        //执行并获取HTML文档内容
        $output = curl_exec($this->curl);
        return $output;
    }
}