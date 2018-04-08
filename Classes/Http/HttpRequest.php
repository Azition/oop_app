<?php

namespace app\Http;

class HttpRequest implements InterfaceHttp
{
    private $curl;

    function __construct($url)
    {
        if (!empty($url)){
            $this->curl = curl_init($url);
            curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
        }
    }

    public function send()
    {
        $result = false;
        if ($this->curl !== null){
            $result = curl_exec($this->curl);
        }

        return $result;
    }
}