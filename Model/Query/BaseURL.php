<?php
/*
 * This file is part of the MarvelAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
     * @todo Load authentication tokens here, not in client. It is an architecture error.
     *
     * @throws \InvalidArgumentException
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

        return $url . '?';
    }
} 