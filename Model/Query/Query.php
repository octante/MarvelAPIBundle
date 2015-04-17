<?php

/*
 * This file is part of the OctanteMarvelAPI package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\Model\Query;

class Query
{
    /**
     * @var string
     */
    protected $orderBy;

    /**
     * @var int
     */
    protected $limit;

    /**
     * @var int
     */
    protected $offset;

    /**
     * @var array
     */
    protected $filters;

    /**
     * @param $orderBy
     */
    public function setOrderBy($orderBy)
    {
        $this->filters['orderBy'] = $orderBy;
    }

    /**
     * @param $limit
     */
    public function setLimit($limit)
    {
        $this->filters['limit'] = $limit;
    }

    /**
     * @param $offset
     */
    public function setOffset($offset)
    {
        $this->filters['offset'] = $offset;
    }

    /**
     * @return string
     */
    public function getQuery()
    {
        $url = '';
        if (!empty($this->filters)) {
            foreach ($this->filters as $field => $value) {
                $url .= $field . '=' . $value . '&';
            }
            // Clear last ampersand if necessary
            $url = trim($url, '&');
        }

        if ($this->orderBy !== null) {
            $url .= '&orderBy=' . $this->orderBy;
        }

        if ($this->limit !== null) {
            $url .= '&limit=' . $this->limit;
        }

        if ($this->offset !== null) {
            $url .= '&offset=' . $this->offset;
        }

        return $url;
    }
}
