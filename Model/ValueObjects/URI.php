<?php

/*
 * This file is part of the OctanteMarvelAPI package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\Model\ValueObjects;

class URI
{
    /**
     * @var string
     */
    private $uri;

    /**
     * @param $uri
     */
    private function __construct($uri)
    {
        $this->uri = $uri;
    }

    /**
     * @param $uri
     *
     * @return URI
     */
    public static function create($uri)
    {
        return new URI($uri);
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }
}
