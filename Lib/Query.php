<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 12:32
 */

namespace Octante\MarvelAPIBundle\Lib;


class Query
{
    const ORDER_BY_FOC_DATE     = 'focDate';
    const ORDER_BY_ON_SALE_DATE = 'onsaleDate';
    const ORDER_BY_TITLE        = 'title';
    const ORDER_BY_ISSUE_NUMBER = 'issueNumber';

    protected $orderBy;
    protected $limit;
    protected $offset;

    protected $filters;

    /**
     * @return string
     */
    public function getQuery()
    {
        $url = '';
        foreach ($this->filters as $field => $value) {
            $url .= $field . '=' . $value . '&';
        }

        // Clear last ampersand if necessary
        $url = trim('&', $this->url);

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