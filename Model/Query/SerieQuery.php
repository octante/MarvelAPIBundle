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

class SerieQuery extends Query
{
    const ORDER_BY_NAME             = 'title';
    const ORDER_BY_MODIFIED         = 'modified';
    const ORDER_BY_START_YEAR       = 'startYear';
    const ORDER_BY_MINUS_TITLE      = '-title';

    const CONTAINS_COMIC           = 'comic';
    const CONTAINS_MAGAZINE        = 'magazine';
    const CONTAINS_TRADE_PAPERBACK = 'trade paperback';
    const CONTAINS_HARDCOVER       = 'hardcover';
    const CONTAINS_DIGEST          = 'digest';
    const CONTAINS_GRAPHIC_NOVEL   = 'graphic novel';
    const CONTAINS_DIGITAL_COMIC   = 'digital comic';
    const CONTAINS_INFINITE_COMIC  = 'infinite comic';

    const SERIES_TYPES_COLLECTION  = 'collection';
    const SERIES_TYPES_ONE_SHOT = 'one shot';
    const SERIES_TYPES_LIMITED = 'limited';
    const SERIES_TYPES_ONGOING = 'ongoing';

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->filters['title'] = $title;
    }

    /**
     * @param string $titleStartsWith
     */
    public function setTitleStartsWith($titleStartsWith)
    {
        $this->filters['titleStartsWith'] = $titleStartsWith;
    }

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
     * @param string $stories
     */
    public function setStories($stories)
    {
        $this->filters['stories'] = $stories;
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

    /**
     *
     * @param $seriesType
     */
    public function setSeriesType($seriesType)
    {
        $this->filters['seriesType'] = $seriesType;
    }

    /**
     * @param $contains
     */
    public function setContains($contains)
    {
        $this->filters['contains'] = $contains;
    }
}
