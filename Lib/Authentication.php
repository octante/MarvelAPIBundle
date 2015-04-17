<?php

/*
 * This file is part of the OctanteMarvelAPI package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\Lib;

class Authentication
{
    /**
     * @var string
     */
    private $ts;

    /**
     * @var string
     */
    private $privateKey;

    /**
     * @var string
     */
    private $publicKey;

    /**
     * @param string $privateKey
     * @param string $publicKey
     * @param null   $ts
     */
    public function __construct($privateKey, $publicKey, $ts = null)
    {
        $this->privateKey = $privateKey;
        $this->publicKey = $publicKey;
        if ($ts == null) {
            $this->ts = time();
        } else {
            $this->ts = $ts;
        }
    }

    /**
     * @return string
     */
    private function getHash()
    {
        return md5($this->ts . $this->privateKey . $this->publicKey);
    }

    /**
     * @return string
     */
    public function getAuthenticationUrlParams()
    {
        return '&ts=' . $this->ts . '&apikey=' . $this->publicKey . '&hash=' . $this->getHash();
    }
}
