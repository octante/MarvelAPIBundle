<?php
/*
 * This file is part of the MarvelAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\Lib;


use Octante\MarvelAPIBundle\Exceptions\CurlErrorCodeException;
use Octante\MarvelAPIBundle\Exceptions\CurlRequestErrorException;

class Client
{
    /**
     * @var Authentication
     */
    private $authenticationService;

    /**
     * @param Authentication $authenticationService
     */
    public function __construct(Authentication $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    /**
     * @param $url
     * @return array
     *
     * @throws \Octante\MarvelAPIBundle\Exceptions\CurlErrorCodeException
     * @throws \Octante\MarvelAPIBundle\Exceptions\CurlRequestErrorException
     */
    public function send($url)
    {
        $authenticatedUrl = $url . $this->authenticationService->getAuthenticationUrlParams();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $authenticatedUrl);
        curl_setopt($ch, CURLOPT_HEADER, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $body = substr($response, $headerSize);

        curl_close($ch);

        if(!$response) {
            throw new CurlRequestErrorException("An error occurred in curl request \"$url\"");
        }

        if($httpCode >= 400) {
            throw new CurlErrorCodeException("An error occurred in curl request: \"$httpCode\"");
        }

        return $body;
    }
}
