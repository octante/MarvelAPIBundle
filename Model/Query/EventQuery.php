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

class EventQuery extends Query
{
    const ORDER_BY_NAME             = 'name';
    const ORDER_BY_START_DATE       = 'startDate';
    const ORDER_BY_MODIFIED         = 'modified';
    const ORDER_BY_MINUS_NAME       = '-name';
    const ORDER_BY_MINUS_START_DATE = '-startDate';

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->filters['name'] = $name;
    }

    /**
     * @param string $nameStartsWith
     */
    public function setNameStartsWith($nameStartsWith)
    {
        $this->filters['nameStartsWith'] = $nameStartsWith;
    }

    /**
     * @param string $modifiedSince
     */
    public function setModifiedSince($modifiedSince)
    {
        $this->filters['modifiedSince'] = $modifiedSince;
    }

    /**
     * @param string $creators
     */
    public function setCreators($creators)
    {
        $this->filters['creators'] = $creators;
    }

    /**
     * @param string $characters
     */
    public function setCharacters($characters)
    {
        $this->filters['characters'] = $characters;
    }

    /**
     * @param string $comics
     */
    public function setComics($comics)
    {
        $this->filters['comics'] = $comics;
    }

    /**
     * @param string $series
     */
    public function setSeries($series)
    {
        $this->filters['series'] = $series;
    }

    /**
     * @param string $stories
     */
    public function setStories($stories)
    {
        $this->filters['stories'] = $stories;
    }
}
