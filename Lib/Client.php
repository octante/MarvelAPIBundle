<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 12:29
 */

namespace Octante\MarvelAPIBundle\Lib;


use Octante\MarvelAPIBundle\Exceptions\CurlErrorCodeException;
use Octante\MarvelAPIBundle\Exceptions\CurlRequestErrorException;

class Client
{
    public function send($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if(!$response) {
            throw new CurlRequestErrorException('An error occurred in curl request');
        }

        if($httpCode >= 400) {
            throw new CurlErrorCodeException("An error occurred in curl request: \"$httpCode\"");
        }

        return $response;
    }
} 