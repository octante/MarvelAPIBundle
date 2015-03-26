<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 21/3/15
 * Time: 16:35
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