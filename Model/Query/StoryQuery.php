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

class StoryQuery extends Query
{
    const ORDER_BY_ID              = 'id';
    const ORDER_BY_MODIFIED        = 'modified';
    const ORDER_BY_MINUS_ID        = '-id';
    const ORDER_BY_MINUS_MODIFIED  = '-modified';

    /**
     * @param string $modifiedSince
     */
    public function setModifiedSince($modifiedSince)
    {
        $this->filters['modifiedSince'] = $modifiedSince;
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
     * @param string $events
     */
    public function setEvents($events)
    {
        $this->filters['events'] = $events;
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
}