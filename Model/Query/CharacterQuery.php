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

class CharacterQuery extends Query
{
    const ORDER_BY_NAME           = 'name';
    const ORDER_BY_MODIFIED       = 'modified';
    const ORDER_BY_MINUS_NAME     = '-name';
    const ORDER_BY_MINUS_MODIFIED = '-modified';

    const RESOURCE_COMICS         = 'comics';

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
     * @param \DateTime $modifiedSince
     */
    public function setModifiedSince($modifiedSince)
    {
        $this->filters['modifiedSince'] = $modifiedSince;
    }

    /**
     * @param int $comics
     */
    public function setComics($comics)
    {
        $this->filters['comics'] = $comics;
    }

    /**
     * @param int $series
     */
    public function setSeries($series)
    {
        $this->filters['series'] = $series;
    }

    /**
     * @param int $events
     */
    public function setEvents($events)
    {
        $this->filters['events'] = $events;
    }

    /**
     * @param int $stories
     */
    public function setStories($stories)
    {
        $this->filters['stories'] = $stories;
    }

    public function setResource($resource)
    {
    }
}
