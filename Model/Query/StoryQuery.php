<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 21/3/15
 * Time: 17:19
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