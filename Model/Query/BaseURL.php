<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 27/3/15
 * Time: 17:25
 */

namespace Octante\MarvelAPIBundle\Model\Query;


class BaseURL
{
    /**
     * @var string
     */
    private $filter;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $resource;

    /**
     * @param $filter
     * @param null $id
     * @param null $resource
     */
    private function __construct(
        $filter,
        $id = null,
        $resource = null
    ){
        $this->filter   = $filter;
        $this->id       = $id;
        $this->resource = $resource;
    }

    /**
     * @param $filter
     * @param null $id
     * @param null $resource
     *
     * @return BaseURL
     */
    public static function create(
        $filter,
        $id = null,
        $resource = null
    ){
        return new BaseURL(
            $filter,
            $id,
            $resource
        );
    }

    /**
     * @todo Needs the token!! Load it from configuration!!
     *
     * @return string
     */
    public function getURL()
    {
        $url = 'http://gateway.marvel.com:80/v1/public/' . $this->filter;

        if (!empty($this->id)) {
            $url .= '/' . $this->id;
        }

        if (!empty($this->resource)) {
            if (empty($this->id)) {
                throw new \InvalidArgumentException("Id can't be empty");
            }
            $url .= '/' . $this->resource;
        }

        return $url;
    }
} 